<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký dùng thử</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2b7cff;
            --text: #1f2937;
            --muted: #6b7280;
            --bg: #f5f7fb;
            --card: #ffffff;
            --ring: #e5e7eb;
            --radius: 28px;
        }

        * {
            box-sizing: border-box
        }

        html,
        body {
            height: 100%
        }

        h1 {
            font-size: 28px;
            font-weight: 800;
            color: #1f2937;
            /* đậm */
            margin-bottom: 8px;
            text-align: center;
        }

        .sub {
            font-size: 16px;
            color: #6b7280;
            /* xám nhạt */
            text-align: center;
            margin-bottom: 24px;
        }

        body {
            margin: 0;
            font-family: Inter, system-ui, Arial, sans-serif;
            background: var(--bg);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px
        }

        .card {
            width: 100%;
            max-width: 720px;
            background: var(--card);
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(16, 24, 40, .08);
            padding: 32px 28px
        }

        .brand {
            display: flex;
            justify-content: center;
            margin-bottom: 8px
        }

        .brand .logo {
            width: 88px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #00d084, #2b7cff);
            display: inline-block
        }

        h2 {
            margin: 8px 0 4px;
            font-size: 28px;
            line-height: 1.2;
            text-align: center;
            color: var(--text);
            font-weight: 800
        }

        .sub {
            color: var(--muted);
            text-align: center;
            margin-bottom: 24px
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px
        }

        .row-2 {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px
        }

        @media (min-width:640px) {
            .row-2 {
                grid-template-columns: 1fr 1fr
            }
        }

        .input {
            width: 100%;
            height: 54px;
            border-radius: var(--radius);
            border: 1px solid var(--ring);
            background: #fff;
            padding: 0 18px;
            font-size: 15px;
            outline: none;
            transition: .2s border-color, .2s box-shadow
        }

        .input::placeholder {
            color: #9ca3af
        }

        .input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(43, 124, 255, .12)
        }

        .check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 14px;
            color: var(--muted);
            margin-top: 2px
        }

        .check input {
            margin-top: 3px
        }

        .submit {
            margin-top: 6px;
            height: 56px;
            border: none;
            width: 100%;
            border-radius: 40px;
            font-weight: 700;
            font-size: 16px;
            cursor: not-allowed;
            background: #cfd5dd;
            color: #fff;
            position: relative;
            transition: .2s
        }

        .submit .arrow {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #b9c1cb;
            display: grid;
            place-items: center;
            font-size: 18px
        }

        .submit.enabled {
            cursor: pointer;
            background: #202020;
        }

        .submit.enabled .arrow {
            background: #fff;
            color: var(--primary)
        }

        .submit.enabled:hover {
            filter: brightness(.95)
        }

        .or {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 12px 0 4px
        }

        .or::before,
        .or::after {
            content: "";
            flex: 1;
            height: 1px;
            background: var(--ring)
        }

        .or span {
            color: #9ca3af;
            font-size: 13px
        }

        .social {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap
        }

        .btn-soc {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            border-radius: 999px;
            border: 1px solid var(--ring);
            background: #fff;
            color: var(--text);
            text-decoration: none;
            font-weight: 600
        }

        .btn-soc img {
            width: 18px;
            height: 18px
        }

        .back {
            position: fixed;
            /* luôn dính trên màn hình */
            top: 20px;
            left: 20px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            /* khoảng cách giữa icon và chữ */
            font-size: 15px;
            font-weight: 500;
            color: #1a73e8;
            /* xanh giống Google */
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .back:hover {
            color: #0c59cf;
            text-decoration: underline;
        }

        .card .logo-shop img {
            display: block;
            margin: 0 auto 16px;
            /* căn giữa + cách dưới */
            max-width: 160px;
            /* giới hạn chiều rộng */
            height: auto;
            /* tự co tỉ lệ */
            border-radius: 12px;
            /* bo nhẹ 4 góc (nếu muốn tròn hơn thì tăng số px) */
            object-fit: contain;
            /* giữ nguyên tỉ lệ hình */
        }

        .card .logo-shop img {
            display: block;
            margin: 0 auto 16px;
            /* căn giữa + cách dưới */
            max-width: 200px;
            /* tăng chiều rộng tối đa lên */
            height: auto;
            /* tự co tỉ lệ */
            border-radius: 12px;
            /* bo nhẹ 4 góc */
            object-fit: contain;
            /* giữ nguyên tỉ lệ hình */
        }
    </style>
</head>

<body>
    <!-- Nút quay lại màn hình -->
    <a href="../trangchu.php" class="back">⬅ Quay lại</a>

    <div class="card">
        <div class="logo-shop">
            <img src="/assets/images/z7061937653390_e6213ea683fd91ea0ed97f089da6101c.jpg" alt="logo">
        </div>
        <h2>Mua sắm dễ dàng – Ưu đãi hấp dẫn mỗi ngày </h2>
        <div class="sub">Khám phá hàng ngàn sản phẩm chất lượng được khách hàng tin dùng</div>

        <form id="registerForm">
            <!-- 1. Họ tên -->
            <input class="input" type="text" name="fullname" placeholder="Họ tên của bạn" autocomplete="name"
                required />

            <!-- 2-3. Email & SĐT (2 cột) -->
            <div class="row-2">
                <input class="input" type="email" name="email" placeholder="Email của bạn" autocomplete="email"
                    required />
                <input class="input" type="tel" name="phone" placeholder="Số điện thoại của bạn" autocomplete="tel"
                    required />
            </div>

            <!-- 4. Mật khẩu -->
            <input class="input" type="password" name="password" placeholder="Mật khẩu" autocomplete="new-password"
                required />


            <label class="check">
                <input type="checkbox" id="agree">
                <span>Tôi đã đọc, đồng ý với <a href="#" target="_blank">Chính sách bảo vệ dữ liệu cá nhân</a> &amp; <a
                        href="#" target="_blank">Quy định sử dụng</a>.</span>
            </label>

            <button type="submit" class="submit" id="submitBtn" disabled>
                Đăng ký
                <span class="arrow">➜</span>
            </button>

            <div class="or"><span>hoặc đăng ký bằng</span></div>
            <div class="social">
                <a class="btn-soc" href="#" id="loginFacebook">
                    <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" alt="">Facebook
                </a>

                <a class="btn-soc" href="#" id="loginGoogle">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="">Google
                </a>

        </form>
    </div>

    <script>
        const agree = document.getElementById('agree');
        const submitBtn = document.getElementById('submitBtn');
        agree.addEventListener('change', () => {
            submitBtn.disabled = !agree.checked;
            submitBtn.classList.toggle('enabled', agree.checked);
        });
        document.getElementById('registerForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Đăng ký thành công (demo)!');
            // window.location.href = 'index.html'; // mở redirect nếu cần
        });
        document.getElementById("loginFacebook").addEventListener("click", (e) => {
            e.preventDefault();
            alert("Đăng ký bằng Facebook (demo)");
            window.location.href = "../index.html"; // quay về trang chính
        });

        document.getElementById("loginGoogle").addEventListener("click", (e) => {
            e.preventDefault();
            alert("Đăng ký bằng Google (demo)");
            window.location.href = "../index.html"; // quay về trang chính
        });
    </script>
</body>

</html>