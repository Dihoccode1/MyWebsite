/*! auth.js — Client-side auth (localStorage) — no server required */
(function (w, d) {
  "use strict";

  // ======================= KEYS & FLAGS =======================
  const LS_USERS = "sv_users_v1"; // [{name,email,passHash,createdAt}]
  const LS_AUTH = "sv_auth_user_v1"; // {name,email,loginAt}

  // Cờ chống auto-login DEMO: chỉ được set khi đăng nhập qua form/hàm AUTH.login
  const LOGIN_INTENT_FLAG = "sv_auth_via_login"; // sessionStorage flag
  const DEMO_EMAIL = "khachhang1@demo.local"; // email tài khoản DEMO

  // ======================= HELPERS =======================
  function qs(sel, root) {
    return (root || d).querySelector(sel);
  }
  function qsa(sel, root) {
    return Array.prototype.slice.call((root || d).querySelectorAll(sel));
  }

  function makeBackParam() {
    try {
      var href = w.location.pathname + w.location.search + w.location.hash;
      return encodeURIComponent(href);
    } catch (e) {
      return "";
    }
  }
  function redirectToLogin() {
    const back = makeBackParam();
    w.location.href = "/login.html" + (back ? "?redirect=" + back : "");
  }
  function escapeHtml(s) {
    return String(s == null ? "" : s).replace(/[&<>"']/g, function (m) {
      return {
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': "&quot;",
        "'": "&#39;",
      }[m];
    });
  }

  function loadUsers() {
    try {
      return JSON.parse(localStorage.getItem(LS_USERS) || "[]");
    } catch {
      return [];
    }
  }
  function saveUsers(list) {
    localStorage.setItem(LS_USERS, JSON.stringify(list || []));
  }
  function getAuth() {
    try {
      return JSON.parse(localStorage.getItem(LS_AUTH) || "null");
    } catch {
      return null;
    }
  }
  function setAuth(obj) {
    if (obj) localStorage.setItem(LS_AUTH, JSON.stringify(obj));
    else localStorage.removeItem(LS_AUTH);
    d.dispatchEvent(new Event("auth:changed"));
  }

  // Tiny hash (NOT secure; for demo only)
  function hash(s) {
    s = String(s || "");
    let h = 2166136261 >>> 0;
    for (let i = 0; i < s.length; i++) {
      h ^= s.charCodeAt(i);
      h = Math.imul(h, 16777619);
    }
    return (h >>> 0).toString(16);
  }

  /* ===================== DEMO BUYER (GIẢ LẬP) ===================== */
  // Chỉ phục vụ đăng nhập mua hàng cho tài khoản cố định khachhang1 / 123456
  const DEMO_BUYER = Object.freeze({
    username: "khachhang1",
    email: DEMO_EMAIL,
    name: "Khách hàng 1",
    passHash: hash("123456"),
  });
  /* ================================================================ */

  const AUTH = {
    ready: false,
    loggedIn: false,
    user: null,
    _queue: [],

    check: function () {
      const cur = getAuth();

      const current = getAuth();
      AUTH.loggedIn = !!current;
      AUTH.user = current ? { name: current.name, email: current.email } : null;
      AUTH.ready = true;

      AUTH.updateAuthUI();

      try {
        while (AUTH._queue.length) {
          var fn = AUTH._queue.shift();
          if (typeof fn === "function") fn();
        }
      } catch (_) {}

      d.dispatchEvent(new Event("auth:ready"));
      return Promise.resolve();
    },

    ensureReady: function (cb) {
      if (AUTH.ready) return cb && cb();
      AUTH._queue.push(cb);
    },

    requireLoginOrRedirect: function () {
      if (!AUTH.loggedIn) {
        redirectToLogin();
        return false;
      }
      return true;
    },

    updateAuthUI: function () {
      qsa("[data-auth-show]").forEach(function (el) {
        var want = (el.getAttribute("data-auth-show") || "").toLowerCase();
        var shouldShow = want === "logged-in" ? AUTH.loggedIn : !AUTH.loggedIn;
        el.style.display = shouldShow ? "" : "none";
      });

      var nameEl = qs("[data-auth-name]");
      if (nameEl)
        nameEl.textContent =
          (AUTH.user && (AUTH.user.name || AUTH.user.email)) || "";

      var chip = qs("#auth-chip");
      if (chip) {
        if (AUTH.loggedIn) {
          chip.innerHTML =
            "Xin chào, <strong>" +
            escapeHtml((AUTH.user && AUTH.user.name) || "") +
            '</strong> · <a href="#" data-logout>Đăng xuất</a>';
        } else {
          chip.innerHTML =
            '<a href="/login.html">Đăng nhập</a> / <a href="/register.html">Đăng ký</a>';
        }
      }
    },

    register: function (name, email, password) {
      name = String(name || "").trim();
      email = String(email || "")
        .trim()
        .toLowerCase();
      password = String(password || "");
      if (!name || !email || !password)
        throw new Error("Vui lòng nhập đầy đủ thông tin.");
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email))
        throw new Error("Email không hợp lệ.");

      const users = loadUsers();
      if (users.some((u) => u.email === email))
        throw new Error("Email đã tồn tại.");

      users.push({
        name,
        email,
        passHash: hash(password),
        createdAt: new Date().toISOString(),
      });
      saveUsers(users);

      setAuth({ name, email, loginAt: new Date().toISOString() });
      try {
        sessionStorage.setItem(LOGIN_INTENT_FLAG, "1");
      } catch (_) {}
      return { name, email };
    },

    login: function (emailOrUsername, password) {
      // ===== Nhánh DEMO: cho phép khachhang1 / 123456 =====
      var id = String(emailOrUsername || "")
        .trim()
        .toLowerCase();
      var pwd = String(password || "");
      var isDemoUser =
        id === DEMO_BUYER.username || id === DEMO_BUYER.email.toLowerCase();
      if (!id || !pwd) throw new Error("Vui lòng nhập email và mật khẩu.");

      if (isDemoUser && hash(pwd) === DEMO_BUYER.passHash) {
        setAuth({
          name: DEMO_BUYER.name,
          email: DEMO_BUYER.email,
          loginAt: new Date().toISOString(),
        });
        try {
          sessionStorage.setItem(LOGIN_INTENT_FLAG, "1");
        } catch (_) {}
        return { name: DEMO_BUYER.name, email: DEMO_BUYER.email };
      }

      // ===== Login LocalStorage bình thường =====
      const email = id; // chuẩn hoá ở trên
      const users = loadUsers();
      const u = users.find((u) => u.email === email);
      if (!u || u.passHash !== hash(pwd))
        throw new Error("Thông tin đăng nhập không đúng.");

      setAuth({
        name: u.name,
        email: u.email,
        loginAt: new Date().toISOString(),
      });
      try {
        sessionStorage.setItem(LOGIN_INTENT_FLAG, "1");
      } catch (_) {}
      return { name: u.name, email: u.email };
    },

    logout: function () {
      setAuth(null);
      try {
        sessionStorage.removeItem(LOGIN_INTENT_FLAG);
      } catch (_) {}
    },
  };

  // ======================= GUARDS =======================
  function installGuards() {
    // Chặn nút Thêm vào giỏ nếu chưa đăng nhập
    d.addEventListener(
      "click",
      function (e) {
        var btn =
          e.target &&
          e.target.closest(
            ".btn-add-cart, [data-add-to-cart], .js-add-to-cart"
          );
        if (!btn) return;
        if (!AUTH.loggedIn) {
          e.preventDefault();
          e.stopImmediatePropagation && e.stopImmediatePropagation();
          redirectToLogin();
        }
      },
      true
    );

    // Chặn form mua nhanh nếu chưa đăng nhập
    d.addEventListener(
      "submit",
      function (e) {
        var form = e.target && e.target.closest("#buyForm, .js-buy-form");
        if (!form) return;
        if (!AUTH.loggedIn) {
          e.preventDefault();
          e.stopImmediatePropagation && e.stopImmediatePropagation();
          redirectToLogin();
        }
      },
      true
    );

    // Đăng xuất
    d.addEventListener("click", function (e) {
      var out = e.target && e.target.closest("[data-logout]");
      if (!out) return;
      e.preventDefault();
      AUTH.logout();
      AUTH.check();
      // Ở lại trang; UI sẽ tự cập nhật
    });
  }

  // ======================= EXPORT & INIT =======================
  w.AUTH = AUTH;

  d.addEventListener("DOMContentLoaded", function () {
    installGuards();
    AUTH.check();
  });
})(window, document);
