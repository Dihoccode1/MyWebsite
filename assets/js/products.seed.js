// /assets/js/products.seed.js
// Seed dữ liệu chuẩn cho list + trang chi tiết
// Trường chung: id, name, brand, category, price, original_price?, image, images?, badge, featured?,
// short_desc?, long_desc?, specs?(object), stock?(number), rating?(0-5), reviews_count?(int), tags?(array)

window.SV_PRODUCT_SEED = [
    // ===== Hair spray =====
    {
        id: "spray-davines-extra-strong",
        name: "Gôm xịt tóc Davines Extra Strong Hairspray",
        brand: "Davines",
        category: "hair_spray",
        price: 550000,
        original_price: 690000,
        image: "/assets/images/product/Hair_spray/Davines_Extra_Strong_Hairspray/gom-xit-toc-davines-extra-strong-hairspray-400ml.webp",
        images: [
            "/assets/images/product/Hair_spray/Davines_Extra_Strong_Hairspray/gom-xit-toc-davines-extra-strong-hairspray-400ml.webp"
        ],
        badge: "sale",
        featured: false,
        short_desc: "Giữ nếp cực mạnh, ít bết dính, khô nhanh.",
        long_desc: "Davines Extra Strong Hairspray cho độ giữ nếp rất mạnh nhưng không tạo cảm giác khô cứng. Phù hợp tạo kiểu cần form ổn định lâu trong ngày. Dễ chải lại, ít để lại cặn.",
        specs: {
            "Dung tích": "400ml",
            "Độ giữ nếp": "Rất mạnh",
            "Hoàn thiện": "Tự nhiên",
            "Xuất xứ": "Italy"
        },
        stock: 24,
        rating: 4.7,
        reviews_count: 112,
        tags: ["gôm xịt", "siêu cứng", "dễ gội"]
    },
    {
        id: "spray-2vee",
        name: "Gôm xịt tóc 2Vee",
        brand: "2Vee",
        category: "hair_spray",
        price: 270000,
        image: "/assets/images/product/Hair_spray/2Vee/1552806056-gom-xit-2vee-01.webp",
        images: [
            "/assets/images/product/Hair_spray/2Vee/1552806056-gom-xit-2vee-01.webp"
        ],
        badge: "",
        featured: false,
        short_desc: "Giữ nếp vừa, mùi hương dễ chịu.",
        long_desc: "2Vee thích hợp tóc mỏng đến trung bình, cần độ giữ nếp vừa phải và độ bóng thấp.",
        specs: {
            "Dung tích": "300ml",
            "Độ giữ nếp": "Vừa",
            "Hoàn thiện": "Mờ nhẹ"
        },
        stock: 50,
        rating: 4.3,
        reviews_count: 38,
        tags: ["phổ thông", "dễ dùng"]
    },
    {
        id: "spray-tigi-bed-head",
        name: "Gôm xịt tóc Tigi Bed Head",
        brand: "TIGI",
        category: "hair_spray",
        price: 300000,
        original_price: 550000,
        image: "/assets/images/product/Hair_spray/Bed_head/gom-tigi-bead-head-2-700.webp",
        images: [
            "/assets/images/product/Hair_spray/Bed_head/gom-tigi-bead-head-2-700.webp"
        ],
        badge: "sale",
        featured: false,
        short_desc: "Giữ nếp khá mạnh, mùi thơm đặc trưng.",
        long_desc: "Dòng Bed Head quen thuộc của TIGI cho khả năng khóa nếp tốt, phù hợp nhiều kiểu tóc phổ biến.",
        specs: {
            "Dung tích": "400ml",
            "Độ giữ nếp": "Mạnh",
            "Hoàn thiện": "Tự nhiên"
        },
        stock: 12,
        rating: 4.5,
        reviews_count: 76,
        tags: ["sale-hot"]
    },
    {
        id: "spray-kevin-murphy-session",
        name: "Gôm xịt Kevin Murphy Session Spray",
        brand: "Kevin Murphy",
        category: "hair_spray",
        price: 690000,
        image: "/assets/images/product/Hair_spray/Kevin Murphy Session Spray/1468319756-session-spray-1.webp",
        images: [
            "/assets/images/product/Hair_spray/Kevin Murphy Session Spray/1468319756-session-spray-1.webp"
        ],
        badge: "",
        featured: true,
        short_desc: "Giữ nếp tự nhiên, không khô cứng.",
        long_desc: "Session Spray cho độ giữ nếp linh hoạt, tóc vẫn mềm mại, thích hợp tạo kiểu layer và texture.",
        specs: {
            "Dung tích": "400ml",
            "Độ giữ nếp": "Vừa",
            "Hoàn thiện": "Tự nhiên"
        },
        stock: 18,
        rating: 4.8,
        reviews_count: 55,
        tags: ["premium", "clean-beauty"]
    },

    // ===== Hair wax =====
    {
        id: "wax-apestomen-nitro",
        name: "Sáp Vuốt Tóc Apestomen Nitro Wax",
        brand: "Apestomen",
        category: "hair_wax",
        price: 250000,
        original_price: 350000,
        image: "/assets/images/product/Hair_wax/Apestomen_Nitro_Wax/apestomen-nitro-wax-compressed-1-600x600.webp",
        images: [
            "/assets/images/product/Hair_wax/Apestomen_Nitro_Wax/apestomen-nitro-wax-compressed-1-600x600.webp"
        ],
        badge: "sale",
        featured: true,
        short_desc: "Giữ nếp mạnh, thơm dịu, dễ gội.",
        long_desc: "Nitro Wax cho độ giữ nếp mạnh và độ bóng mờ. Chất sáp mịn, dễ xoa đều, phù hợp kiểu tóc cần form chắc.",
        specs: {
            "Thể tích": "80g",
            "Độ giữ nếp": "Mạnh",
            "Độ bóng": "Mờ"
        },
        stock: 41,
        rating: 4.6,
        reviews_count: 139,
        tags: ["best-seller", "giá tốt"]
    },
    {
        id: "wax-by-vilain-gold-digger",
        name: "Sáp Vuốt Tóc By Vilain Gold Digger",
        brand: "By Vilain",
        category: "hair_wax",
        price: 250000,
        original_price: 350000,
        image: "/assets/images/product/Hair_wax/By_Vilain_Gold_Digger/by-vilain-gold-digger-travel-open.webp",
        images: [
            "/assets/images/product/Hair_wax/By_Vilain_Gold_Digger/by-vilain-gold-digger-travel-open.webp",
            "/assets/images/product/Hair_wax/By_Vilain_Gold_Digger/by-vilain-1.webp",
            "/assets/images/product/Hair_wax/By_Vilain_Gold_Digger/by-vilain-2.webp"
        ],
        badge: "",
        featured: false,
        short_desc: "Strong hold, matte finish – dễ gội.",
        long_desc: "Gold Digger nổi tiếng với độ giữ nếp mạnh nhưng không nặng tóc. Phù hợp nhiều chất tóc châu Á.",
        specs: {
            "Thể tích": "70ml",
            "Độ giữ nếp": "Mạnh",
            "Độ bóng": "Mờ",
            "Xuất xứ": "Đan Mạch"
        },
        stock: 22,
        rating: 4.7,
        reviews_count: 210,
        tags: ["matte", "định hình tốt"]
    },
    {
        id: "wax-hanz-de-fuko-quicksand",
        name: "Sáp Vuốt Tóc Hanz De Fuko Quicksand",
        brand: "Hanz de Fuko",
        category: "hair_wax",
        price: 500000,
        image: "/assets/images/product/Hair_wax/Hanz_de_Fuko_Quicksand/untitled-1-425eb329-c3d1-4be6-b6f8-b687c916e2d2.webp",
        images: [
            "/assets/images/product/Hair_wax/Hanz_de_Fuko_Quicksand/untitled-1-425eb329-c3d1-4be6-b6f8-b687c916e2d2.webp"
        ],
        badge: "",
        featured: true,
        short_desc: "Tạo phồng tốt, hút dầu, finish mờ.",
        long_desc: "Quicksand chứa diatomaceous earth giúp hút dầu, tạo texture và volume mạnh mẽ cho tóc mỏng.",
        specs: {
            "Thể tích": "56g",
            "Độ giữ nếp": "Mạnh",
            "Độ bóng": "Mờ",
            "Tạo phồng": "Rất tốt"
        },
        stock: 9,
        rating: 4.6,
        reviews_count: 88,
        tags: ["texture", "tóc mỏng"]
    },
    {
        id: "wax-kevin-murphy-night-rider",
        name: "Sáp Vuốt Tóc Kevin Murphy Night Rider",
        brand: "Kevin Murphy",
        category: "hair_wax",
        price: 650000,
        image: "/assets/images/product/Hair_wax/Kevin_Murphy_Night_Rider/kevin-murphy-night-rider-2.jpg",
        images: [
            "/assets/images/product/Hair_wax/Kevin_Murphy_Night_Rider/kevin-murphy-night-rider-2.jpg"
        ],
        badge: "",
        featured: true,
        short_desc: "Giữ nếp mạnh, mờ hoàn toàn, mùi sạch.",
        long_desc: "Night Rider cho độ giữ nếp rất chắc, hoàn thiện mờ sâu. Phù hợp tóc dày, cần form khoẻ.",
        specs: {
            "Thể tích": "100g",
            "Độ giữ nếp": "Rất mạnh",
            "Độ bóng": "Mờ hoàn toàn"
        },
        stock: 15,
        rating: 4.8,
        reviews_count: 64,
        tags: ["premium", "mờ sâu"]
    },
    {
        id: "wax-patricks-m3",
        name: "Patricks M3 Matte Finish | Strong Hold Styling Product",
        brand: "Patricks",
        category: "hair_wax",
        price: 1200000,
        image: "/assets/images/product/Hair_wax/Patricks_M3_Matte_Finish_Strong_Hold_Styling_Product/patricks-m3-matte-finish-1.webp",
        images: [
            "/assets/images/product/Hair_wax/Patricks_M3_Matte_Finish_Strong_Hold_Styling_Product/patricks-m3-matte-finish-1.webp"
        ],
        badge: "new",
        featured: true,
        short_desc: "Luxury wax – giữ nếp mạnh, mùi sang.",
        long_desc: "Dòng cao cấp của Patricks với độ giữ nếp mạnh, texture đẹp, cảm giác dùng mịn và mùi hương cao cấp.",
        specs: {
            "Thể tích": "75g",
            "Độ giữ nếp": "Mạnh",
            "Độ bóng": "Mờ"
        },
        stock: 7,
        rating: 4.9,
        reviews_count: 21,
        tags: ["luxury", "new"]
    },

    // ===== Conditioner / Oil =====
    {
        id: "oil-blumaan-hydrating",
        name: "Tinh dầu dưỡng tóc Blumaan Hydrating Hair Oil",
        brand: "BluMaan",
        category: "hair_conditioner",
        price: 550000,
        original_price: 689000,
        image: "/assets/images/product/Hair_conditioner/Blumaan_Hydrating_Hair_Oil/00-hydrating-hair-oil-2000.webp",
        images: [
            "/assets/images/product/Hair_conditioner/Blumaan_Hydrating_Hair_Oil/00-hydrating-hair-oil-2000.webp"
        ],
        badge: "sale",
        featured: true,
        short_desc: "Dưỡng ẩm, chống xơ rối, bóng nhẹ.",
        long_desc: "Hydrating Hair Oil giúp phục hồi tóc khô xơ, giảm frizz và tăng độ mềm mượt mà không nặng tóc.",
        specs: {
            "Dung tích": "50ml",
            "Finish": "Bóng nhẹ",
            "Phù hợp": "Tóc khô/xơ"
        },
        stock: 28,
        rating: 4.6,
        reviews_count: 44,
        tags: ["dưỡng tóc", "repair"]
    },
    {
        id: "oil-moroccanoil-treatment",
        name: "Tinh dầu dưỡng tóc Moroccanoil Treatment",
        brand: "Moroccanoil",
        category: "hair_conditioner",
        price: 300000,
        image: "/assets/images/product/Hair_conditioner/Moroccanoil_Treatment/tinh-dau-duong-toc-moroccanoil-25ml-1.webp",
        images: [
            "/assets/images/product/Hair_conditioner/Moroccanoil_Treatment/tinh-dau-duong-toc-moroccanoil-25ml-1.webp"
        ],
        badge: "",
        featured: true,
        short_desc: "Dưỡng mềm, giảm xơ rối tức thì.",
        long_desc: "Công thức Argan Oil nổi tiếng giúp tóc mềm mại, bóng khoẻ và dễ chải.",
        specs: {
            "Dung tích": "25ml",
            "Finish": "Bóng",
            "Thành phần": "Argan Oil"
        },
        stock: 33,
        rating: 4.7,
        reviews_count: 101,
        tags: ["argan", "classic"]
    },

    // ===== Volumizing powder =====
    {
        id: "powder-reuzel-matte",
        name: "Bột tạo phồng Reuzel Matte Texture Powder",
        brand: "Reuzel",
        category: "volumizing_powder",
        price: 450000,
        image: "/assets/images/product/Volumizing_powder/Reuzel_Matte_Texture_Powder/reuzel-matte-texture-powder-4.webp",
        images: [
            "/assets/images/product/Volumizing_powder/Reuzel_Matte_Texture_Powder/reuzel-matte-texture-powder-4.webp"
        ],
        badge: "out_of_stock",
        featured: false,
        short_desc: "Bột siêu nhẹ, tăng volume tức thì.",
        long_desc: "Cho độ phồng nhanh, giữ texture khô ráo. Dùng tốt cho tóc mỏng/đổ dầu.",
        specs: {
            "Khối lượng": "15g",
            "Hoàn thiện": "Mờ",
            "Phù hợp": "Tóc mỏng/dầu"
        },
        stock: 0,
        rating: 4.5,
        reviews_count: 60,
        tags: ["hết hàng", "volumizing"]
    },
    {
        id: "powder-roug-textured",
        name: "Bột tạo phồng Roug Textured Power",
        brand: "ROUG",
        category: "volumizing_powder",
        price: 200000,
        image: "/assets/images/product/Volumizing_powder/Roug_Textured Power_60ml/roug-textured-hair-power-3.webp",
        images: [
            "/assets/images/product/Volumizing_powder/Roug_Textured Power_60ml/roug-textured-hair-power-3.webp"
        ],
        badge: "",
        featured: false,
        short_desc: "Tạo phồng khô, giá dễ chịu.",
        long_desc: "Giải pháp nhanh cho tóc mỏng cần volume. Bám tóc tốt, dễ gội.",
        specs: {
            "Khối lượng": "20g",
            "Finish": "Mờ",
            "Độ phồng": "Tốt"
        },
        stock: 70,
        rating: 4.2,
        reviews_count: 19,
        tags: ["budget"]
    },
    {
        id: "powder-volcanic-ash",
        name: "Bột tạo phồng Volcanic Ash Styling Powder",
        brand: "Apestomen",
        category: "volumizing_powder",
        price: 250000,
        image: "/assets/images/product/Volumizing_powder/Volcanic_Ash_Styling_Powder/bot-tao-phong-apestomen-ash.webp",
        images: [
            "/assets/images/product/Volumizing_powder/Volcanic_Ash_Styling_Powder/bot-tao-phong-apestomen-ash.webp"
        ],
        badge: "",
        featured: false,
        short_desc: "Hạt mịn, hút dầu tốt, tăng texture.",
        long_desc: "Tạo hiệu ứng phồng khô, sạch da đầu, giữ form tự nhiên cả ngày.",
        specs: {
            "Khối lượng": "25g",
            "Hoàn thiện": "Mờ",
            "Phù hợp": "Tóc dầu"
        },
        stock: 36,
        rating: 4.4,
        reviews_count: 52,
        tags: ["texture", "clean"]
    },
    {
        id: "powder-volcanic-ash-featured",
        name: "Bột tạo phồng Volcanic Ash (Featured)",
        brand: "Apestomen",
        category: "volumizing_powder",
        price: 450000,
        original_price: 750000,
        image: "/assets/images/product/Volumizing_powder/Volcanic_Ash_Styling_Powder/bot-tao-phong-apestomen-ash.webp",
        images: [
            "/assets/images/product/Volumizing_powder/Volcanic_Ash_Styling_Powder/bot-tao-phong-apestomen-ash.webp"
        ],
        badge: "sale",
        featured: true,
        short_desc: "Phiên bản ưu đãi – giá tốt.",
        long_desc: "Tính năng như bản thường, ưu đãi giá cho chương trình nổi bật.",
        specs: {
            "Khối lượng": "25g",
            "Hoàn thiện": "Mờ"
        },
        stock: 14,
        rating: 4.4,
        reviews_count: 18,
        tags: ["featured", "sale"]
    },
    {
        id: "powder-dapper-dan-ultra-matte-dust",
        name: "Bột tạo phồng Dapper Dan Ultra Matte Texture Dust",
        brand: "Dapper Dan",
        category: "volumizing_powder",
        price: 400000,
        original_price: 450000,
        image: "/assets/images/product/Volumizing_powder/Dapper_Dan_ULTRA_MATTE_TEXTURE_DUST/texture-dust-front-2048x.webp",
        images: [
            "/assets/images/product/Volumizing_powder/Dapper_Dan_ULTRA_MATTE_TEXTURE_DUST/texture-dust-front-2048x.webp"
        ],
        badge: "sale",
        featured: true,
        short_desc: "Ultra matte – volume cao, sạch tóc.",
        long_desc: "Hạt bột mịn siêu khô, tạo cảm giác tóc dày lên rõ rệt, không bết.",
        specs: {
            "Khối lượng": "20g",
            "Finish": "Siêu mờ",
            "Độ phồng": "Rất cao"
        },
        stock: 20,
        rating: 4.6,
        reviews_count: 33,
        tags: ["ultra-matte", "texture"]
    },
    {
        id: "spray-butterfly-shadow-600ml", // đổi id cho đúng loại
        name: "Gôm xịt tóc Butterfly Shadow 600ml",
        brand: "Butterfly Shadow",
        category: "hair_spray", // đổi từ hair_wax -> hair_spray
        price: 1100000, // giữ nguyên theo bạn set
        original_price: 1290000, // giữ nguyên
        image: "/assets/images/product/Hair_spray/Butterfly_shadow_600ml/1426968buter-fly.webp",
        images: [
            "/assets/images/product/Hair_spray/Butterfly_shadow_600ml/1426968buter-fly.webp" // fix: thêm đúng file, không để thư mục trống
        ],
        badge: "new",
        featured: true,
        short_desc: "Giữ nếp vừa–mạnh, khô nhanh, ít bết.",
        long_desc: "Butterfly Shadow 600ml cho độ giữ nếp ổn định, phun tơi mịn, khô nhanh, phù hợp set form cả ngày.",
        specs: {
            "Dung tích": "600ml",
            "Độ giữ nếp": "Mạnh",
            "Hoàn thiện": "Tự nhiên",
            "Xuất xứ": "Trung Quốc"
        },
        stock: 10,
        rating: 4.8,
        reviews_count: 17,
        tags: ["hair_spray", "new"]
    },
    {
        id: "spray-luxurious-hold-10", // đổi id cho đúng loại
        name: "Gôm xịt tóc Luxurious – Hold 10",
        brand: "Luxurious",
        category: "hair_spray", // đổi từ hair_wax -> hair_spray
        price: 390000, // giữ nguyên theo bạn set
        original_price: 480000, // giữ nguyên
        image: "/assets/images/product/Hair_spray/Luxurious/gom-luxurious-10-c4ce5ee0-3663-4526-befa-79e4952930a0.webp",
        images: [
            "/assets/images/product/Hair_spray/Luxurious/gom-luxurious-10-c4ce5ee0-3663-4526-befa-79e4952930a0.webp"
        ],
        badge: "new",
        featured: false,
        short_desc: "Giữ nếp rất mạnh (Hold 10), phun mịn, khô nhanh.",
        long_desc: "Luxurious Hold 10 cho khả năng khóa nếp mạnh mẽ, kiểm soát tóc tốt, phù hợp tạo kiểu cần form chắc.",
        specs: {
            "Dung tích": "600ml",
            "Độ giữ nếp": "Rất mạnh (10)",
            "Hoàn thiện": "Tự nhiên/khô",
            "Xuất xứ": "—"
        },
        stock: 26,
        rating: 4.6,
        reviews_count: 142,
        tags: ["hair_spray", "sale"]
    }


];