-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 24, 2024 lúc 03:16 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopthoitrang3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `pty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status_id` bigint(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `customer_id`, `product_id`, `size_id`, `pty`, `price`, `status_id`, `created_at`, `updated_at`) VALUES
(2, 4, 1, 1, 1, 1, 500000, 1, '2024-12-08 17:32:33', NULL),
(3, 4, 1, 1, 1, 1, 500000, 1, '2024-12-09 04:20:05', NULL),
(4, 4, 2, 18, 3, 1, 174000, 1, '2024-12-12 11:34:01', NULL),
(5, 4, 2, 19, 2, 1, 100000, 1, '2024-12-01 11:34:09', NULL),
(6, 7, 3, 14, 4, 1, 275998, 1, '2024-12-05 11:34:14', NULL),
(7, 7, 4, 16, 1, 2, 228999, 1, '2024-12-16 11:34:18', NULL),
(8, 7, 5, 17, 4, 1, 215998, 1, '2024-12-07 11:34:22', NULL),
(9, 7, 6, 8, 2, 1, 179997, 1, '2024-12-02 11:34:27', NULL),
(10, 7, 7, 8, 4, 1, 179997, 1, '2024-12-12 03:57:22', '2024-12-12 03:57:22'),
(11, 7, 9, 19, 2, 1, 100000, 1, '2024-12-12 04:25:31', '2024-12-12 04:25:31'),
(12, 7, 12, 19, 3, 19, 100000, 1, '2024-12-12 04:29:56', '2024-12-12 04:29:56'),
(13, 7, 13, 38, 1, 1, 188998, 1, '2024-12-13 00:42:39', '2024-12-13 00:42:39'),
(14, 7, 14, 40, 2, 1, 67000, 2, '2024-12-13 01:43:33', '2024-12-20 12:01:10'),
(15, 7, 15, 34, 3, 1, 64000, 4, '2024-12-13 02:23:01', '2024-12-20 11:55:03'),
(16, 4, 23, 51, 2, 5, 5000000, 1, '2024-12-20 12:55:58', '2024-12-20 12:55:58'),
(17, 4, 25, 51, 2, 1, 5000000, 4, '2024-12-20 13:07:59', '2024-12-22 16:57:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `email`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Thanh Thảo ', '1234567890', 'aaaaa', 'admin@gmail.com', 'hi', NULL, NULL),
(2, 'Nguyen Van A', '012345678', 'Đà Nẵng', 'nganphan1514@gmail.com', 'Nhớ giao', '2024-12-10 13:54:01', '2024-12-10 13:54:01'),
(3, 'test', '1234567890', 'daklak', 'test@gmail.com', 'good', '2024-12-12 03:14:32', '2024-12-12 03:14:32'),
(4, 'demo', '1234567890', 'Đà Nẵng', 'demo@gmail.com', 'dbshbf', '2024-12-12 03:47:47', '2024-12-12 03:47:47'),
(5, 'duy', '0398389726', 'Đà Nẵng', 'thao@gmail.com', 'qưe3r4t5yrtjy', '2024-12-12 03:50:43', '2024-12-12 03:50:43'),
(6, 'duy', '1234567890', 'daklak', 'thao@gmail.com', '123454wun u', '2024-12-12 03:55:07', '2024-12-12 03:55:07'),
(7, 'Thanh Thảo', '1234567890', 'daklak', 'thao@gmail.com', 'kjbukyg', '2024-12-12 03:57:22', '2024-12-12 03:57:22'),
(9, 'test2', '0123456789', 'Đà Nẵng', 'test2@gmail.com', 'ok', '2024-12-12 04:25:31', '2024-12-12 04:25:31'),
(12, 'test2', '0123456789', 'Đà Nẵng', 'test2@gmail.com', NULL, '2024-12-12 04:29:56', '2024-12-12 04:29:56'),
(13, 'test2', '0123456789', 'Đà Nẵng', 'test2@gmail.com', 'giao nhanh', '2024-12-13 00:42:39', '2024-12-13 00:42:39'),
(14, 'test2', '0123456789', 'Đà Nẵng', 'test2@gmail.com', 'giao nhanh', '2024-12-13 01:43:33', '2024-12-13 01:43:33'),
(15, 'test2', '0123456789', 'Đà Nẵng', 'test2@gmail.com', 'giao nhanh', '2024-12-13 02:23:01', '2024-12-13 02:23:01'),
(23, 'Thắm', '123456789023', 'Đà Nẵng', 'admin@localhost.com', '', '2024-12-20 12:55:58', '2024-12-20 12:55:58'),
(25, 'Thắm', '123456789023', 'Đà Nẵng', 'admin@localhost.com', '', '2024-12-20 13:07:59', '2024-12-20 13:07:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Bộ Sưu Tập Mùa Đông', 0, 'Bộ sưu tập mùa đông dành cho nam', '<p><strong>B</strong>ộ sưu tập m&ugrave;a đ&ocirc;ng <strong>d&agrave;nh cho nam </strong>năm nay mang đến sự kết hợp ho&agrave;n hảo giữa sự ấm &aacute;p v&agrave; phong c&aacute;ch hiện đại. Với c&aacute;c m&oacute;n đồ chủ đạo như &aacute;o kho&aacute;c d&agrave;y, &aacute;o len cao cổ, v&agrave; những chiếc quần d&agrave;i d&agrave;y dặn, bộ sưu tập n&agrave;y kh&ocirc;ng chỉ gi&uacute;p ph&aacute;i mạnh giữ ấm trong những ng&agrave;y lạnh gi&aacute; m&agrave; c&ograve;n t&ocirc;n l&ecirc;n vẻ lịch l&atilde;m, năng động. Chất liệu cao cấp như len, da, v&agrave; vải chống gi&oacute; đảm bảo mang lại sự thoải m&aacute;i v&agrave; bảo vệ tối ưu trước thời tiết khắc nghiệt. M&agrave;u sắc trung t&iacute;nh như đen, x&aacute;m, n&acirc;u v&agrave; xanh qu&quoin đội dễ d&agrave;ng phối hợp, tạo n&ecirc;n phong c&aacute;ch thời trang nam t&iacute;nh, mạnh mẽ m&agrave; vẫn đầy tinh tế.</p>', 1, '2024-11-13 19:10:12', '2024-11-13 19:10:12'),
(2, 'Hàng Chính Hãng', 0, 'Hàng Chính Hãng Dành Cho Nam và Nữ', '<p>Bộ sưu tập h&agrave;ng ch&iacute;nh h&atilde;ng cho nam v&agrave; nữ mang đến những sản phẩm chất lượng vượt trội với thiết kế tinh tế, thời thượng. D&agrave;nh cho những ai y&ecirc;u th&iacute;ch sự ho&agrave;n hảo, từng m&oacute;n đồ trong bộ sưu tập đều được chọn lọc kỹ lưỡng từ những thương hiệu uy t&iacute;n, đảm bảo chất lượng v&agrave; độ bền l&acirc;u d&agrave;i. C&aacute;c sản phẩm d&agrave;nh cho nam bao gồm những chiếc &aacute;o kho&aacute;c da, &aacute;o sơ mi lịch l&atilde;m, quần jeans tối giản nhưng đầy mạnh mẽ, ph&ugrave; hợp cho cả c&ocirc;ng việc lẫn những dịp đặc biệt. Trong khi đ&oacute;, bộ sưu tập nữ giới lại mang đến vẻ đẹp thanh lịch với c&aacute;c mẫu đầm, &aacute;o blouse mềm mại, c&ugrave;ng phụ kiện đi k&egrave;m t&ocirc;n l&ecirc;n n&eacute;t nữ t&iacute;nh v&agrave; sang trọng. Chắc chắn rằng, h&agrave;ng ch&iacute;nh h&atilde;ng sẽ l&agrave; sự lựa chọn ho&agrave;n hảo cho những ai đề cao sự tinh tế v&agrave; chất lượng trong từng sản phẩm.</p>', 1, '2024-11-13 19:12:17', '2024-11-13 19:12:17'),
(3, 'Flash Sale ', 0, 'Săn sale ngay và luôn !', '<p>Flash Sale l&agrave; sự kiện mua sắm hấp dẫn với c&aacute;c sản phẩm chất lượng được giảm gi&aacute; mạnh trong một khoảng thời gian ngắn, tạo cơ hội tuyệt vời để sở hữu những m&oacute;n đồ y&ecirc;u th&iacute;ch với mức gi&aacute; ưu đ&atilde;i. Những đợt Flash Sale thường c&oacute; số lượng sản phẩm giới hạn, v&agrave; c&aacute;c chương tr&igrave;nh giảm gi&aacute; chỉ k&eacute;o d&agrave;i từ v&agrave;i giờ đến một v&agrave;i ng&agrave;y, khiến người mua kh&ocirc;ng thể bỏ lỡ cơ hội &quot;săn sale&quot; n&agrave;y. Được tổ chức v&agrave;o c&aacute;c dịp đặc biệt hoặc trong m&ugrave;a mua sắm, Flash Sale mang đến kh&ocirc;ng kh&iacute; mua sắm s&ocirc;i động, hấp dẫn v&agrave; l&agrave; cơ hội tuyệt vời để tiết kiệm chi ph&iacute; cho những sản phẩm chất lượng cao từ c&aacute;c thương hiệu nổi tiếng.</p>', 1, '2024-11-13 19:14:26', '2024-11-30 06:44:47'),
(4, 'test', 0, 'tesst', '<p>test</p>', 0, '2024-12-13 02:19:37', '2024-12-13 02:19:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2021_05_26_121348_create_menus_table', 1),
(16, '2021_05_29_085033_create_products_table', 1),
(17, '2021_05_29_085458_update_table_product', 1),
(18, '2021_05_30_091352_create_sliders_table', 1),
(19, '2021_06_07_115343_create_customers_table', 1),
(20, '2021_06_07_115353_create_carts_table', 1),
(21, '2021_06_11_035047_create_jobs_table', 1),
(22, '2024_11_20_073539_create_user01_table', 1),
(23, '2024_11_28_051033_create_roles_table', 1),
(24, '2024_11_29_163832_create_users_table', 1),
(25, '2024_11_28_162228_create_orders_table', 2),
(26, '2024_12_15_000923_create_sizes_table', 2),
(28, '2024_12_15_000938_create_product_size_table', 3),
(29, '2024_12_20_174555_create_statusorder_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment_status` enum('pending','paid','failed') NOT NULL DEFAULT 'pending',
  `payment_transaction_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `menu_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumb` varchar(255) NOT NULL,
  `Made_in` varchar(100) DEFAULT 'VN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `menu_id`, `price`, `price_sale`, `active`, `created_at`, `updated_at`, `thumb`, `Made_in`) VALUES
(1, 'Bộ nỉ nam thể thao DC', 'Bộ nỉ nam thể thao DC diof set quần áo nam thu đông, áo hoodie mũ 2 lớp, chất nỉ dầy dặn không xù', '<p>Bộ nỉ nam thể thao DC diof set quần &aacute;o nam thu đ&ocirc;ng, &aacute;o hoodie mũ 2 lớp, chất nỉ dầy dặn kh&ocirc;ng x&ugrave;</p>', 1, 180500, NULL, 1, '2024-11-13 19:26:22', '2024-12-12 16:21:44', '/storage/uploads/2024/12/12/462585867_552053390767570_6012041273200139888_n.png', 'VN'),
(2, 'Bộ Quần Áo Nỉ Nam UMA STORE', 'Bộ Quần Áo Nỉ Nam UMA STORE Phối Màu Basic, Chất Nỉ Da Cá Cao Cấp Siêu Đẹp Kiểu Dáng Thể Thao SPB22', '<p>Bộ Quần &Aacute;o Nỉ Nam UMA STORE Phối M&agrave;u Basic, Chất Nỉ Da C&aacute; Cao Cấp Si&ecirc;u Đẹp Kiểu D&aacute;ng Thể Thao SPB22</p>', 1, 460000, 258000, 1, '2024-11-13 19:27:20', '2024-12-12 16:22:21', '/storage/uploads/2024/12/12/462561654_8739147662836472_3771301393207915661_n.png', 'VN'),
(3, 'Bộ quần áochống nước chống gió cao cấp', 'Bộ quần áo chất vải gió 2 lớp chống nước chống gió cao cấp 2024 KJ Vua Quần Jeans', '<p>Bộ quần &aacute;o chất vải gi&oacute; 2 lớp chống nước chống gi&oacute; cao cấp 2024 KJ Vua Quần Jeans</p>', 1, 300000, 209000, 1, '2024-11-13 19:28:19', '2024-12-12 16:21:27', '/storage/uploads/2024/12/12/product-detail-03.jpg', 'VN'),
(4, 'Bộ Quần Áo Nam Pa Rít Đỏ', 'Bộ Quần Áo Nam Pa Rít Đỏ Thêu Logo Khóa Chuẩn Siêu Hót - Bộ Quần Áo Nam Pa Rít Thêu Siêu Đẹp', '<p>Bộ Quần &Aacute;o Nam Pa R&iacute;t Đỏ Th&ecirc;u Logo Kh&oacute;a Chuẩn Si&ecirc;u H&oacute;t - Bộ Quần &Aacute;o Nam Pa R&iacute;t Th&ecirc;u Si&ecirc;u Đẹp</p>', 1, 390000, 319000, 1, '2024-11-13 19:29:15', '2024-12-12 16:21:11', '/storage/uploads/2024/12/12/462565000_1348511236557517_3830954426165221490_n.png', 'VN'),
(5, 'Áo thun nam dài tay', 'Áo thun nam dài tay kiểu dáng Hàn Quốc vải nỉ cao cấp mềm mại co giãn KJ Vua Quần Jeans', '<p>&Aacute;o thun nam d&agrave;i tay kiểu d&aacute;ng H&agrave;n Quốc vải nỉ cao cấp mềm mại co gi&atilde;n KJ Vua Quần Jeans</p>', 1, 249998, 154, 1, '2024-11-13 19:30:03', '2024-12-12 16:19:30', '/storage/uploads/2024/12/12/462566361_1113055487071063_8175671033992231798_n.png', 'VN'),
(6, 'Quần áo nam quần tây nam kèm áo sơ mi tay', 'Combo quần áo nam quần tây nam kèm áo sơ mi tay dài cao cấp GEN ALPHA , set âu phục GEN145', '<p>Combo quần &aacute;o nam quần t&acirc;y nam k&egrave;m &aacute;o sơ mi tay d&agrave;i cao cấp GEN ALPHA , set &acirc;u phục GEN145</p>', 1, 350000, 187000, 1, '2024-11-13 19:30:48', '2024-12-12 16:19:59', '/storage/uploads/2024/12/12/462558813_1573231739943314_9148598884067754727_n.png', 'VN'),
(7, 'Hoodie Zip Nam Pariiisss', 'Bộ Quần Áo Hoodie Zip Nam Pariiisss Thêu Logo Siêu Đẹp - Bộ Quần Áo Nam Hoodie Pariiiss Khoá Logo Thêu Siêu Nét', '<p>B&ocirc;̣ Qu&acirc;̀n Áo Hoodie Zip Nam Pariiisss Th&ecirc;u Logo Si&ecirc;u Đẹp - B&ocirc;̣ Qu&acirc;̀n Áo Nam Hoodie Pariiiss Khoá Logo Th&ecirc;u Si&ecirc;u Nét</p>', 1, 290000, 199000, 1, '2024-11-13 19:31:31', '2024-12-12 16:19:44', '/storage/uploads/2024/12/12/462570189_1229114442222275_6953810358076403270_n.png', 'VN'),
(8, 'Bộ Nỉ Nam Paaa Ríttt Dệt Chữ Cổ Áo Siêu Chất', 'Bộ Nỉ Nam Paaa Ríttt Dệt Chữ Cổ Áo Siêu Chất - Bộ Quần Áo Nam Paarriss Thêu Logo Siêu Đẹp', '<p>B&ocirc;̣ Nỉ Nam Paaa Ríttt D&ecirc;̣t Chữ C&ocirc;̉ Áo Si&ecirc;u Ch&acirc;́t - B&ocirc;̣ Qu&acirc;̀n Áo Nam Paarriss Th&ecirc;u Logo Si&ecirc;u Đẹp</p>', 1, 209900, 179997, 1, '2024-11-13 19:32:23', '2024-12-12 16:20:59', '/storage/uploads/2024/12/12/462562796_1971673463334106_5984781265525132188_n (1).png', 'VN'),
(9, 'Bộ nỉ nam đen dài tay có cổ cao cấp', 'Bộ thu đông nam thêu chữ, bộ nỉ nam đen dài tay có cổ cao cấp - Dino store', '<p>Bộ thu đ&ocirc;ng nam th&ecirc;u chữ, bộ nỉ nam đen d&agrave;i tay c&oacute; cổ cao cấp - Dino store</p>', 1, 175000, 145998, 1, '2024-11-13 19:33:23', '2024-12-12 16:19:18', '/storage/uploads/2024/12/12/462573134_1241852657024821_825534558195978408_n.png', 'VN'),
(10, 'Quần áo nam trung niên', 'Quần áo nam trung niên , Bộ đồ cổ tàu thêu họa tiết đối xứng chất liệu thô đũi nhẹ mát món quà ý nghĩa tặng ông và bố', '<p>Quần &aacute;o nam trung ni&ecirc;n , Bộ đồ cổ t&agrave;u th&ecirc;u họa tiết đối xứng chất liệu th&ocirc; đũi nhẹ m&aacute;t m&oacute;n qu&agrave; &yacute; nghĩa tặng &ocirc;ng v&agrave; bố</p>', 1, 275000, 186000, 1, '2024-11-13 19:34:21', '2024-12-12 16:18:55', '/storage/uploads/2024/12/12/462566353_542281348558327_6136301878490397739_n.png', 'VN'),
(11, 'Set áo sơ mi đũi phối dây buộc hai bên', 'Set áo sơ mi đũi phối dây buộc hai bên eo kèm quần short cạp chun xixeoshop - S160', '<p>Set &aacute;o sơ mi đũi phối d&acirc;y buộc hai b&ecirc;n eo k&egrave;m quần short cạp chun xixeoshop - S160</p>', 2, 256000, 128000, 1, '2024-11-13 19:48:01', '2024-12-12 16:18:37', '/storage/uploads/2024/12/12/462538730_500802322945065_2471318686973897998_n.png', 'VN'),
(12, 'Set Áo Sơ Mi Chéo Ý Nơ Thome', 'Set Áo Sơ Mi Chéo Ý Nơ Thome Tháo Rời Kèm Độn Vai Đứng Form Mix Quần Váy Quả Bí Bồng 2 Lớp', '<p>Set &Aacute;o Sơ Mi Ch&eacute;o &Yacute; Nơ Thome Th&aacute;o Rời K&egrave;m Độn Vai Đứng Form Mix Quần V&aacute;y Quả B&iacute; Bồng 2 Lớp</p>', 2, 205000, 142999, 1, '2024-11-13 19:48:52', '2024-12-12 16:17:22', '/storage/uploads/2024/12/12/462576719_8649842325131769_2952600129982138275_n.png', 'VN'),
(13, 'Bộ nỉ áo Sweater Form', 'Bộ Nỉ Cotton Thu Đông Cao Cấp Set Short Vegetanian, Bộ Đồ Thu Đông Quần Shorts Áo Sweater Form Rộng Dài Tay Cá Tính', '<p>Bộ Nỉ Cotton Thu Đ&ocirc;ng Cao Cấp Set Short Vegetanian, Bộ Đồ Thu Đ&ocirc;ng Quần Shorts &Aacute;o Sweater Form Rộng D&agrave;i Tay C&aacute; T&iacute;nh</p>', 2, 543000, 299000, 1, '2024-11-13 19:51:06', '2024-12-12 16:18:09', '/storage/uploads/2024/12/12/462551589_1602657523659796_8455975834193708451_n.png', 'VN'),
(14, 'Chân Váy Xoè Xếp Ly', 'Set Dạ 3 Món Chân Váy Xoè Xếp Ly + Áo 2 Dây + Quần Bí (kèm kẹp hoa) HH86 HaLuu Store', '<p>Set Dạ 3 M&oacute;n Ch&acirc;n V&aacute;y Xo&egrave; Xếp Ly + &Aacute;o 2 D&acirc;y + Quần B&iacute; (k&egrave;m kẹp hoa) HH86 HaLuu Store</p>', 2, 320000, 275998, 1, '2024-11-13 19:52:00', '2024-12-12 16:17:07', '/storage/uploads/2024/12/12/462544068_459332217180470_1720616737959418019_n.png', 'VN'),
(15, 'Áo Trễ Vai Cổ Thuyền', 'Sét Váy Mùa Thu Gồm Áo Trễ Vai Cổ Thuyền + Chân Váy Tầng Có Quần Trong', '<p>S&eacute;t V&aacute;y M&ugrave;a Thu Gồm &Aacute;o Trễ Vai Cổ Thuyền + Ch&acirc;n V&aacute;y Tầng C&oacute; Quần Trong</p>\r\n\r\n<p>&nbsp;</p>', 2, 320000, 204998, 1, '2024-11-13 19:54:16', '2024-12-12 16:16:52', '/storage/uploads/2024/12/12/462566977_1260182038317101_2275112789189197490_n.png', 'VN'),
(16, 'Set bộ đồ nữ áo sơ mi phối gile', 'Set bộ đồ nữ áo sơ mi phối gile đen kèm quần ống suông, sét bộ đồ nữ áo tay dài chiết eo mix quần ống rộng kèm đai S993', '<p>Set bộ đồ nữ &aacute;o sơ mi phối gile đen k&egrave;m quần ống su&ocirc;ng, s&eacute;t bộ đồ nữ &aacute;o tay d&agrave;i chiết eo mix quần ống rộng k&egrave;m đai S993</p>', 2, 486000, 228999, 1, '2024-11-13 19:55:02', '2024-12-12 16:16:33', '/storage/uploads/2024/12/12/462575557_569887922360333_7551804701555586635_n.png', 'VN'),
(17, 'Áo sơ mi cổ vest phối Cavat', 'Sét váy nữ kẻ sọc gồm áo sơ mi cổ vest phối Cavat + chân váy xếp ly có quần bảo hộ chất kẻ thô HB300 !', '<p>S&eacute;t v&aacute;y nữ kẻ sọc gồm &aacute;o sơ mi cổ vest phối Cavat + ch&acirc;n v&aacute;y xếp ly c&oacute; quần bảo hộ chất kẻ th&ocirc; HB300 !</p>', 2, 289000, 215998, 1, '2024-11-13 19:56:09', '2024-12-12 16:16:08', '/storage/uploads/2024/12/12/462550232_1640451676903153_6022650750065692007_n.png', 'VN'),
(18, 'Set dạ nữ tiểu thư', 'Set váy tiểu thư Set dạ nữ Chất vải dạ lông Quảng Châu may 2 lớp Chân váy có sẵn quần bảo hộ Áo khoác có đệm vai HK Shop', '<p>Set v&aacute;y tiểu thư Set dạ nữ Chất vải dạ l&ocirc;ng Quảng Ch&acirc;u may 2 lớp Ch&acirc;n v&aacute;y c&oacute; sẵn quần bảo hộ &Aacute;o kho&aacute;c c&oacute; đệm vai HK Shop</p>', 2, 299000, 174000, 1, '2024-11-13 19:56:52', '2024-12-12 16:15:49', '/storage/uploads/2024/12/12/462561596_593498393120536_8044450597711570090_n.png', 'VN'),
(20, 'Váy xinh dự tiệc', 'Váy xinh dự tiệc Cổ Yếm - Hở Vai - Tay Bồng Thiết Kế Lucido Fashion S42', '<p>V&aacute;y xinh dự tiệc Cổ Yếm - Hở Vai - Tay Bồng Thiết Kế Lucido Fashion S42</p>', 2, 690000, 550000, 1, '2024-12-12 17:14:48', '2024-12-12 17:14:48', '/storage/uploads/2024/12/13/462578407_503411039424727_5410924602494243135_n.png', 'VN'),
(21, 'Váy trắng viền ren nàng thơ', 'Muse Dress - Váy trắng viền ren nàng thơ by Thematrix', '<p>Muse Dress - V&aacute;y trắng viền ren n&agrave;ng thơ by Thematrix</p>', 2, 400000, 399000, 1, '2024-12-12 17:16:43', '2024-12-12 17:22:11', '/storage/uploads/2024/12/13/458760724_535831502283178_167917307242946725_n.png', 'VN'),
(22, 'Váy Maxi Thô Trắng', 'Váy Maxi Thô Trắng Nhúm Eo Ly Ngực Siêu Xinh', '<p>V&aacute;y Maxi Th&ocirc; Trắng Nh&uacute;m Eo Ly Ngực Si&ecirc;u Xinh</p>', 2, 250000, 111000, 1, '2024-12-12 17:17:51', '2024-12-12 17:17:51', '/storage/uploads/2024/12/13/467477759_923143039462231_5512633434615906990_n.png', 'VN'),
(23, 'Váy bầu công sở', 'Váy bầu công sở , váy bầu xinh babydoll đuôi cá cổ bèo trắng cách điệu phong cách tiểu thư thanh lịch nhã nhặn', '<p>V&aacute;y bầu c&ocirc;ng sở , v&aacute;y bầu xinh babydoll đu&ocirc;i c&aacute; cổ b&egrave;o trắng c&aacute;ch điệu phong c&aacute;ch tiểu thư thanh lịch nh&atilde; nhặn</p>', 2, 341800, 245000, 1, '2024-12-12 17:18:58', '2024-12-12 17:18:58', '/storage/uploads/2024/12/13/462565507_2367320323613781_4758147753206003877_n.png', 'VN'),
(24, 'Đầm quây Nữ Cổ Lông Vũ', 'Kans Đầm quây Nữ Cổ Lông Vũ Đính Hạt Tiệc Sinh Nhật Bọc Váy Chic váy nữ Đầm Body vn', '<p>Kans Đầm qu&acirc;y Nữ Cổ L&ocirc;ng Vũ Đ&iacute;nh Hạt Tiệc Sinh Nhật Bọc V&aacute;y Chic v&aacute;y nữ Đầm Body vn</p>', 2, 280000, 120000, 1, '2024-12-12 17:20:06', '2024-12-12 17:21:53', '/storage/uploads/2024/12/13/462575810_1632420550820116_7441475184407570835_n.png', 'VN'),
(25, 'Sét váy bánh bèo tiểu', 'Sét váy bánh bèo tiểu thư thời trang nữ chất tằm gãy in hoa trễ vai có mút váy xoè tầng có lót QC', '<p>S&eacute;t v&aacute;y b&aacute;nh b&egrave;o tiểu thư thời trang nữ chất tằm g&atilde;y in hoa trễ vai c&oacute; m&uacute;t v&aacute;y xo&egrave; tầng c&oacute; l&oacute;t QC</p>', 2, 169000, 144999, 1, '2024-12-12 17:20:54', '2024-12-12 17:20:54', '/storage/uploads/2024/12/13/467331081_558953053698012_762705327136712168_n.png', 'VN'),
(26, 'Váy Bigsize Cao Cấp', 'Thời Trang váy Bigsize Cao Cấp Kiểu Dáng Đẹp Diện Cực Thích - A.1086', '<p>Thời Trang v&aacute;y Bigsize Cao Cấp Kiểu D&aacute;ng Đẹp Diện Cực Th&iacute;ch - A.1086</p>', 2, 360000, 269000, 1, '2024-12-12 17:21:39', '2024-12-12 17:21:39', '/storage/uploads/2024/12/13/467480253_1755912535154601_7701805877099144238_n.png', 'VN'),
(27, 'Áo Sơ Mi Dài Tay Quần Kaki', 'Bộ Quần Áo Nam Áo Sơ Mi Dài Tay Quần Kaki Basic Có Túi Trẻ Trung Thời Trang Zenkonu SO MI NAM 023 + QUAN NAM 060', '<p>Bộ Quần &Aacute;o Nam &Aacute;o Sơ Mi D&agrave;i Tay Quần Kaki Basic C&oacute; T&uacute;i Trẻ Trung Thời Trang Zenkonu SO MI NAM 023 + QUAN NAM 060</p>', 1, 400000, 249000, 1, '2024-12-12 17:27:22', '2024-12-12 17:27:22', '/storage/uploads/2024/12/13/467397129_1105918797645064_8217784690228149964_n.png', 'VN'),
(28, 'Áo sweater dệt kim', 'Áo sweater dệt kim cổ tròn dáng rộng họa tiết đường kẻ thời trang nam', '<p>&Aacute;o sweater dệt kim cổ tr&ograve;n d&aacute;ng rộng họa tiết đường kẻ thời trang nam</p>', 3, 245000, 189998, 1, '2024-12-12 17:28:15', '2024-12-12 17:28:15', '/storage/uploads/2024/12/13/470053476_934220398229261_4228943888505282706_n.png', 'VN'),
(29, 'Áo len tay dài cổ tròn sọc', 'Áo len tay dài cổ tròn sọc trắng đen  lông mềm phong cách Hàn quốc dành cho nam cá tính năng động mùa thu đông', '<p>&Aacute;o len tay d&agrave;i cổ tr&ograve;n sọc trắng đen &nbsp;l&ocirc;ng mềm phong c&aacute;ch H&agrave;n quốc d&agrave;nh cho nam c&aacute; t&iacute;nh năng động m&ugrave;a thu đ&ocirc;ng</p>', 3, 250000, 188998, 1, '2024-12-12 17:30:29', '2024-12-12 17:48:13', '/storage/uploads/2024/12/13/466442132_620429333883046_1152623117878753095_n.png', 'VN'),
(30, 'Quần Ống Suông + Áo Hoodie', 'Sét Bộ Thu Đông chất vải Nỉ Bông, Quần Ống Suông Dây Bản To + Mix Áo Hoodie Mèo Máy Form Unisex', '<p>S&eacute;t Bộ Thu Đ&ocirc;ng chất vải Nỉ B&ocirc;ng, Quần Ống Su&ocirc;ng D&acirc;y Bản To + Mix &Aacute;o Hoodie M&egrave;o M&aacute;y Form Unisex</p>', 3, 230000, 145000, 1, '2024-12-12 17:31:35', '2024-12-12 17:47:55', '/storage/uploads/2024/12/13/470053585_939148244265606_7387171982147215380_n.png', 'VN'),
(31, 'Quần áo teen trẻ trung', 'Quần áo teen trẻ trung thời trang là một trong các sản phẩm bán chạy trong mùa này , thoải mái khi vận động, không thể nào phù hợp hơn khi lựa chọn cho thời trang ở nhà, dạo phố cùng bạn bè.', '<p>Quần &aacute;o teen trẻ trung thời trang l&agrave; một trong c&aacute;c sản phẩm b&aacute;n chạy trong m&ugrave;a n&agrave;y , thoải m&aacute;i khi vận động, kh&ocirc;ng thể n&agrave;o ph&ugrave; hợp hơn khi lựa chọn cho thời trang ở nh&agrave;, dạo phố c&ugrave;ng bạn b&egrave;.</p>', 3, 145000, 66997, 1, '2024-12-12 17:32:17', '2024-12-12 17:32:17', '/storage/uploads/2024/12/13/470053543_1142199820868541_4236095133004095349_n.png', 'VN'),
(32, 'Set áo đỏ kèm quần noel-tết', 'Set áo đỏ kèm quần suôn diện noel-tết .Màu Đỏ Đi với màu đen là bộ đôi không thể nào hoàn hảo hơn , Set đồ che được bắp tay to , quần suôn tạo cảm giác chân thẳng hơn che được nhiều khuyết điểm', '<p>M&agrave;u Đỏ Đi với m&agrave;u đen l&agrave; bộ đ&ocirc;i kh&ocirc;ng thể n&agrave;o ho&agrave;n hảo hơn , Set đồ che được bắp tay to , quần su&ocirc;n tạo cảm gi&aacute;c ch&acirc;n thẳng hơn che được nhiều khuyết điểm</p>', 3, 189700, 98998, 1, '2024-12-12 17:33:45', '2024-12-12 17:33:45', '/storage/uploads/2024/12/13/462575838_930217871910430_5769878976328629631_n.png', 'VN'),
(33, 'Áo Thun Regular 5136', 'Áo Thun Regular 5136 là mẫu áo khoác dáng vừa, chất liệu len pha, thiết kế tối giản với ve chữ V, một hàng khuy, và có lớp lót. Màu sắc thường là xám đậm hoặc trung tính, phù hợp với phong cách thường ngày và công sở', '<p>&Aacute;o Thun Regular 5136 l&agrave; mẫu &aacute;o kho&aacute;c d&aacute;ng vừa, chất liệu len pha, thiết kế tối giản với ve chữ V, một h&agrave;ng khuy, v&agrave; c&oacute; lớp l&oacute;t. M&agrave;u sắc thường l&agrave; x&aacute;m đậm hoặc trung t&iacute;nh, ph&ugrave; hợp với phong c&aacute;ch thường ng&agrave;y v&agrave; c&ocirc;ng sở</p>', 3, 157000, 98997, 1, '2024-12-12 17:35:15', '2024-12-12 17:35:15', '/storage/uploads/2024/12/13/466792447_1451433009234945_6023070573527801871_n.jpg', 'VN'),
(34, 'Váy trắng xòe mix với áo nỉ lệch vai', 'Sét bộ nữ váy trắng xòe mix với áo nỉ lệch vai thích hợp lễ tết\r\nChất liệu váy thun lạnh mềm mại co dãn tốt mix thô lụa kẻ  . Sét bộ nữ váy trắng xòe mix với áo nỉ lệch vai thích hợp lễ tết', '<p>S&eacute;t bộ nữ v&aacute;y trắng x&ograve;e mix với &aacute;o nỉ lệch vai th&iacute;ch hợp lễ tết Chất liệu v&aacute;y thun lạnh mềm mại co d&atilde;n tốt mix th&ocirc; lụa kẻ ///S&eacute;t bộ nữ v&aacute;y trắng x&ograve;e mix với &aacute;o nỉ lệch vai th&iacute;ch hợp lễ tết</p>', 3, 126000, 64000, 1, '2024-12-12 17:37:19', '2024-12-13 02:23:01', '/storage/uploads/2024/12/13/470053537_1970234646830964_102825830616331868_n (1).png', 'VN'),
(35, 'Quần Cargo Pant Kaki', 'Quần Cargo Pant Kaki 300gsm DINOMAN , Quần Túi Hộp Nam Nữ Ống Rộng Basic QTH01', '<p>Quần Cargo Pant Kaki 300gsm DINOMAN , Quần T&uacute;i Hộp Nam Nữ Ống Rộng Basic QTH01</p>', 3, 349000, 239999, 1, '2024-12-12 17:42:16', '2024-12-12 17:42:16', '/storage/uploads/2024/12/13/462575903_932119602198233_8226236580683328677_n.png', 'VN'),
(36, 'Quần bò baggy nam jean', 'quần bò baggy nam jean', '<p>quần b&ograve; baggy nam jean</p>', 3, 239000, 125000, 1, '2024-12-12 17:43:26', '2024-12-12 17:43:26', '/storage/uploads/2024/12/13/467473201_895808262670161_1455885330339275741_n.png', 'VN'),
(37, 'Ống rộng dáng suông', 'ống rộng dáng suông chất bò cao cấp 005', '<p>ống rộng d&aacute;ng su&ocirc;ng chất b&ograve; cao cấp 005</p>', 3, 249000, 20000, 1, '2024-12-12 17:44:03', '2024-12-12 17:47:08', '/storage/uploads/2024/12/13/467475711_3098723266945444_4889871207087840135_n.png', 'VN'),
(38, 'Quần dài thể thao nam', 'Quần dài thể thao nam ống suông nhẹ chất poly co giãn', '<p>Quần d&agrave;i thể thao nam ống su&ocirc;ng nhẹ chất poly co gi&atilde;n</p>', 3, 264000, 188998, 1, '2024-12-12 17:44:36', '2024-12-13 00:42:39', '/storage/uploads/2024/12/13/458799894_2100127640382188_334738448050193886_n.png', 'VN'),
(39, 'Áo Thun Nam Nữ Form Rộng', 'Áo Thun AM Nam Nữ Form Rộng THIÊN THẦN', '<p>&Aacute;o Thun AM Nam Nữ Form Rộng THI&Ecirc;N THẦN</p>', 3, 126000, 79000, 1, '2024-12-12 17:45:21', '2024-12-12 17:45:21', '/storage/uploads/2024/12/13/462563001_406224709209459_3669808828997108776_n.png', 'VN'),
(40, 'Áo Sơ Mi  Kẻ Sọc 2 Tay', 'Áo Sơ Mi cộc tay nam nữ Kẻ Sọc 2 Tay Thời Trang Unisex', '<p>&Aacute;o Sơ Mi cộc tay nam nữ Kẻ Sọc 2 Tay Thời Trang Unisex</p>', 3, 132000, 67000, 1, '2024-12-12 17:46:08', '2024-12-13 01:43:33', '/storage/uploads/2024/12/13/466838434_1101202341478706_7206940336000345774_n.png', 'VN'),
(41, 'test', 'wrwhreh', '<p>htrhj</p>', 2, 123000, 34000, 1, '2024-12-13 02:20:41', '2024-12-13 02:20:41', '/storage/uploads/2024/12/13/Red Gradient Flash Sale Landscape Banner.png', 'VN'),
(42, 'Áo ấm lông cừu', 'ok ok ok', '<p>1234567</p>', 1, 600000, 500000, 1, '2024-12-18 13:00:43', '2024-12-18 13:00:43', '/storage/uploads/2024/12/18/Screenshot 2024-11-20 233626.png', 'VN'),
(43, 'Áo ấm lông cừu Loại mới', 'okok', '<p>okok</p>', 1, 600000, 500000, 1, '2024-12-18 13:02:59', '2024-12-18 13:02:59', '/storage/uploads/2024/12/18/Screenshot 2023-10-18 000257.png', 'VN'),
(44, 'Áo ấm lông cừu Loại mới', 'mmmmmmm', '<p>ppppppppppppp</p>', 1, 600000, 500000, 1, '2024-12-18 13:03:37', '2024-12-18 13:03:37', '/storage/uploads/2024/12/18/Screenshot 2024-02-20 121040.png', 'VN'),
(45, 'Áo ấm lông cừu Loại mới', 'mmmmmmm', '<p>ppppppppppppp</p>', 1, 600000, 500000, 1, '2024-12-18 13:12:50', '2024-12-18 13:12:50', '/storage/uploads/2024/12/18/Screenshot 2024-02-20 121040.png', 'VN'),
(46, 'Áo ấm lông cừu Loại cao cấp', 'Dòng sản phẩm cao cấp', '<p>Thời thượng</p>', 1, 600000, 500000, 1, '2024-12-18 13:19:27', '2024-12-18 13:19:27', '/storage/uploads/2024/12/18/Screenshot 2024-02-20 121040.png', 'VN'),
(47, 'Áo ấm bông', 'okokok', '<p>tốt tốt&nbsp;</p>', 1, 600000, 500000, 1, '2024-12-18 13:22:50', '2024-12-18 13:22:50', '/storage/uploads/2024/12/18/Screenshot 2024-03-03 145736.png', 'VN'),
(48, 'Áo ấm lông dê', 'mmmmmmmm', '<p>ddddd</p>', 1, 600000, 500000, 1, '2024-12-18 13:30:04', '2024-12-18 13:30:04', '/storage/uploads/2024/12/18/Screenshot 2024-01-09 140630.png', 'VN'),
(49, 'Áo ấm lông dê 2', 'jjjjjjjjjjjj', '<p>mmmmmmmmmm</p>', 1, 600000, 500000, 1, '2024-12-18 13:32:55', '2024-12-18 13:32:55', '/storage/uploads/2024/12/18/Screenshot 2023-10-18 000140.png', 'VN'),
(51, 'Áo', 'okok', '<p>kkkkkk</p>', 3, 5000000, NULL, 1, '2024-12-19 15:36:26', '2024-12-22 15:22:33', '/storage/uploads/2024/12/19/Screenshot 2024-02-20 121040.png', 'VN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `product_id` bigint(255) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(100) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, '2024-12-22 16:26:55', NULL),
(2, 1, 2, 2, NULL, NULL),
(3, 1, 3, 0, '2024-12-22 16:27:45', NULL),
(4, 1, 4, 90, '2024-12-21 16:28:14', NULL),
(401, 2, 1, 67, '2024-12-22 16:54:59', NULL),
(402, 2, 2, 18, '2024-12-22 16:54:59', NULL),
(403, 2, 3, 91, '2024-12-22 16:54:59', NULL),
(404, 2, 4, 2, '2024-12-22 16:54:59', NULL),
(405, 3, 1, 38, '2024-12-22 16:54:59', NULL),
(406, 3, 2, 86, '2024-12-22 16:54:59', NULL),
(407, 3, 3, 14, '2024-12-22 16:54:59', NULL),
(408, 3, 4, 13, '2024-12-22 16:54:59', NULL),
(409, 4, 1, 23, '2024-12-22 16:54:59', NULL),
(410, 4, 2, 77, '2024-12-22 16:54:59', NULL),
(411, 4, 3, 18, '2024-12-22 16:54:59', NULL),
(412, 4, 4, 57, '2024-12-22 16:54:59', NULL),
(413, 5, 1, 34, '2024-12-22 16:54:59', NULL),
(414, 5, 2, 98, '2024-12-22 16:54:59', NULL),
(415, 5, 3, 89, '2024-12-22 16:54:59', NULL),
(416, 5, 4, 49, '2024-12-22 16:54:59', NULL),
(417, 6, 1, 81, '2024-12-22 16:54:59', NULL),
(418, 6, 2, 60, '2024-12-22 16:54:59', NULL),
(419, 6, 3, 55, '2024-12-22 16:54:59', NULL),
(420, 6, 4, 95, '2024-12-22 16:54:59', NULL),
(421, 7, 1, 10, '2024-12-22 16:54:59', NULL),
(422, 7, 2, 68, '2024-12-22 16:54:59', NULL),
(423, 7, 3, 11, '2024-12-22 16:54:59', NULL),
(424, 7, 4, 51, '2024-12-22 16:54:59', NULL),
(425, 8, 1, 23, '2024-12-22 16:54:59', NULL),
(426, 8, 2, 63, '2024-12-22 16:54:59', NULL),
(427, 8, 3, 47, '2024-12-22 16:54:59', NULL),
(428, 8, 4, 45, '2024-12-22 16:54:59', NULL),
(429, 9, 1, 86, '2024-12-22 16:54:59', NULL),
(430, 9, 2, 97, '2024-12-22 16:54:59', NULL),
(431, 9, 3, 25, '2024-12-22 16:54:59', NULL),
(432, 9, 4, 37, '2024-12-22 16:54:59', NULL),
(433, 10, 1, 10, '2024-12-22 16:54:59', NULL),
(434, 10, 2, 38, '2024-12-22 16:54:59', NULL),
(435, 10, 3, 62, '2024-12-22 16:54:59', NULL),
(436, 10, 4, 97, '2024-12-22 16:54:59', NULL),
(437, 11, 1, 99, '2024-12-22 16:54:59', NULL),
(438, 11, 2, 4, '2024-12-22 16:54:59', NULL),
(439, 11, 3, 25, '2024-12-22 16:54:59', NULL),
(440, 11, 4, 11, '2024-12-22 16:54:59', NULL),
(441, 12, 1, 82, '2024-12-22 16:54:59', NULL),
(442, 12, 2, 78, '2024-12-22 16:54:59', NULL),
(443, 12, 3, 45, '2024-12-22 16:54:59', NULL),
(444, 12, 4, 92, '2024-12-22 16:54:59', NULL),
(445, 13, 1, 26, '2024-12-22 16:54:59', NULL),
(446, 13, 2, 52, '2024-12-22 16:54:59', NULL),
(447, 13, 3, 83, '2024-12-22 16:54:59', NULL),
(448, 13, 4, 62, '2024-12-22 16:54:59', NULL),
(449, 14, 1, 60, '2024-12-22 16:54:59', NULL),
(450, 14, 2, 14, '2024-12-22 16:54:59', NULL),
(451, 14, 3, 90, '2024-12-22 16:54:59', NULL),
(452, 14, 4, 10, '2024-12-22 16:54:59', NULL),
(453, 15, 1, 81, '2024-12-22 16:54:59', NULL),
(454, 15, 2, 77, '2024-12-22 16:54:59', NULL),
(455, 15, 3, 39, '2024-12-22 16:54:59', NULL),
(456, 15, 4, 65, '2024-12-22 16:54:59', NULL),
(457, 16, 1, 11, '2024-12-22 16:54:59', NULL),
(458, 16, 2, 58, '2024-12-22 16:54:59', NULL),
(459, 16, 3, 59, '2024-12-22 16:54:59', NULL),
(460, 16, 4, 20, '2024-12-22 16:54:59', NULL),
(461, 17, 1, 24, '2024-12-22 16:54:59', NULL),
(462, 17, 2, 62, '2024-12-22 16:54:59', NULL),
(463, 17, 3, 36, '2024-12-22 16:54:59', NULL),
(464, 17, 4, 97, '2024-12-22 16:54:59', NULL),
(465, 18, 1, 77, '2024-12-22 16:54:59', NULL),
(466, 18, 2, 94, '2024-12-22 16:54:59', NULL),
(467, 18, 3, 38, '2024-12-22 16:54:59', NULL),
(468, 18, 4, 10, '2024-12-22 16:54:59', NULL),
(469, 20, 1, 36, '2024-12-22 16:54:59', NULL),
(470, 20, 2, 50, '2024-12-22 16:54:59', NULL),
(471, 20, 3, 41, '2024-12-22 16:54:59', NULL),
(472, 20, 4, 58, '2024-12-22 16:54:59', NULL),
(473, 21, 1, 65, '2024-12-22 16:54:59', NULL),
(474, 21, 2, 53, '2024-12-22 16:54:59', NULL),
(475, 21, 3, 72, '2024-12-22 16:54:59', NULL),
(476, 21, 4, 99, '2024-12-22 16:54:59', NULL),
(477, 22, 1, 81, '2024-12-22 16:54:59', NULL),
(478, 22, 2, 7, '2024-12-22 16:54:59', NULL),
(479, 22, 3, 92, '2024-12-22 16:54:59', NULL),
(480, 22, 4, 41, '2024-12-22 16:54:59', NULL),
(481, 23, 1, 27, '2024-12-22 16:54:59', NULL),
(482, 23, 2, 15, '2024-12-22 16:54:59', NULL),
(483, 23, 3, 92, '2024-12-22 16:54:59', NULL),
(484, 23, 4, 18, '2024-12-22 16:54:59', NULL),
(485, 24, 1, 13, '2024-12-22 16:54:59', NULL),
(486, 24, 2, 11, '2024-12-22 16:54:59', NULL),
(487, 24, 3, 16, '2024-12-22 16:54:59', NULL),
(488, 24, 4, 46, '2024-12-22 16:54:59', NULL),
(489, 25, 1, 85, '2024-12-22 16:54:59', NULL),
(490, 25, 2, 87, '2024-12-22 16:54:59', NULL),
(491, 25, 3, 79, '2024-12-22 16:54:59', NULL),
(492, 25, 4, 36, '2024-12-22 16:54:59', NULL),
(493, 26, 1, 44, '2024-12-22 16:54:59', NULL),
(494, 26, 2, 13, '2024-12-22 16:54:59', NULL),
(495, 26, 3, 31, '2024-12-22 16:54:59', NULL),
(496, 26, 4, 18, '2024-12-22 16:54:59', NULL),
(497, 27, 1, 96, '2024-12-22 16:54:59', NULL),
(498, 27, 2, 29, '2024-12-22 16:54:59', NULL),
(499, 27, 3, 55, '2024-12-22 16:54:59', NULL),
(500, 27, 4, 88, '2024-12-22 16:54:59', NULL),
(501, 28, 1, 75, '2024-12-22 16:54:59', NULL),
(502, 28, 2, 12, '2024-12-22 16:54:59', NULL),
(503, 28, 3, 36, '2024-12-22 16:54:59', NULL),
(504, 28, 4, 43, '2024-12-22 16:54:59', NULL),
(505, 29, 1, 9, '2024-12-22 16:54:59', NULL),
(506, 29, 2, 16, '2024-12-22 16:54:59', NULL),
(507, 29, 3, 52, '2024-12-22 16:54:59', NULL),
(508, 29, 4, 14, '2024-12-22 16:54:59', NULL),
(509, 30, 1, 14, '2024-12-22 16:54:59', NULL),
(510, 30, 2, 29, '2024-12-22 16:54:59', NULL),
(511, 30, 3, 5, '2024-12-22 16:54:59', NULL),
(512, 30, 4, 38, '2024-12-22 16:54:59', NULL),
(513, 31, 1, 75, '2024-12-22 16:54:59', NULL),
(514, 31, 2, 62, '2024-12-22 16:54:59', NULL),
(515, 31, 3, 87, '2024-12-22 16:54:59', NULL),
(516, 31, 4, 49, '2024-12-22 16:54:59', NULL),
(517, 32, 1, 85, '2024-12-22 16:54:59', NULL),
(518, 32, 2, 79, '2024-12-22 16:54:59', NULL),
(519, 32, 3, 40, '2024-12-22 16:54:59', NULL),
(520, 32, 4, 62, '2024-12-22 16:54:59', NULL),
(521, 33, 1, 92, '2024-12-22 16:54:59', NULL),
(522, 33, 2, 74, '2024-12-22 16:54:59', NULL),
(523, 33, 3, 96, '2024-12-22 16:54:59', NULL),
(524, 33, 4, 58, '2024-12-22 16:54:59', NULL),
(525, 34, 1, 1, '2024-12-22 16:54:59', NULL),
(526, 34, 2, 34, '2024-12-22 16:54:59', NULL),
(527, 34, 3, 64, '2024-12-22 16:54:59', NULL),
(528, 34, 4, 21, '2024-12-22 16:54:59', NULL),
(529, 35, 1, 13, '2024-12-22 16:54:59', NULL),
(530, 35, 2, 2, '2024-12-22 16:54:59', NULL),
(531, 35, 3, 73, '2024-12-22 16:54:59', NULL),
(532, 35, 4, 60, '2024-12-22 16:54:59', NULL),
(533, 36, 1, 80, '2024-12-22 16:54:59', NULL),
(534, 36, 2, 21, '2024-12-22 16:54:59', NULL),
(535, 36, 3, 66, '2024-12-22 16:54:59', NULL),
(536, 36, 4, 68, '2024-12-22 16:54:59', NULL),
(537, 37, 1, 43, '2024-12-22 16:54:59', NULL),
(538, 37, 2, 11, '2024-12-22 16:54:59', NULL),
(539, 37, 3, 25, '2024-12-22 16:54:59', NULL),
(540, 37, 4, 95, '2024-12-22 16:54:59', NULL),
(541, 38, 1, 2, '2024-12-22 16:54:59', NULL),
(542, 38, 2, 22, '2024-12-22 16:54:59', NULL),
(543, 38, 3, 4, '2024-12-22 16:54:59', NULL),
(544, 38, 4, 54, '2024-12-22 16:54:59', NULL),
(545, 39, 1, 60, '2024-12-22 16:54:59', NULL),
(546, 39, 2, 39, '2024-12-22 16:54:59', NULL),
(547, 39, 3, 17, '2024-12-22 16:54:59', NULL),
(548, 39, 4, 67, '2024-12-22 16:54:59', NULL),
(549, 40, 1, 86, '2024-12-22 16:54:59', NULL),
(550, 40, 2, 29, '2024-12-22 16:54:59', NULL),
(551, 40, 3, 86, '2024-12-22 16:54:59', NULL),
(552, 40, 4, 43, '2024-12-22 16:54:59', NULL),
(553, 41, 1, 59, '2024-12-22 16:54:59', NULL),
(554, 41, 2, 67, '2024-12-22 16:54:59', NULL),
(555, 41, 3, 57, '2024-12-22 16:54:59', NULL),
(556, 41, 4, 87, '2024-12-22 16:54:59', NULL),
(557, 42, 1, 62, '2024-12-22 16:54:59', NULL),
(558, 42, 2, 52, '2024-12-22 16:54:59', NULL),
(559, 42, 3, 75, '2024-12-22 16:54:59', NULL),
(560, 42, 4, 16, '2024-12-22 16:54:59', NULL),
(561, 43, 1, 59, '2024-12-22 16:54:59', NULL),
(562, 43, 2, 44, '2024-12-22 16:54:59', NULL),
(563, 43, 3, 46, '2024-12-22 16:54:59', NULL),
(564, 43, 4, 98, '2024-12-22 16:54:59', NULL),
(565, 44, 1, 51, '2024-12-22 16:54:59', NULL),
(566, 44, 2, 62, '2024-12-22 16:54:59', NULL),
(567, 44, 3, 56, '2024-12-22 16:54:59', NULL),
(568, 44, 4, 96, '2024-12-22 16:54:59', NULL),
(569, 45, 1, 13, '2024-12-22 16:54:59', NULL),
(570, 45, 2, 78, '2024-12-22 16:54:59', NULL),
(571, 45, 3, 53, '2024-12-22 16:54:59', NULL),
(572, 45, 4, 29, '2024-12-22 16:54:59', NULL),
(573, 46, 1, 85, '2024-12-22 16:54:59', NULL),
(574, 46, 2, 42, '2024-12-22 16:54:59', NULL),
(575, 46, 3, 54, '2024-12-22 16:54:59', NULL),
(576, 46, 4, 44, '2024-12-22 16:54:59', NULL),
(577, 47, 1, 58, '2024-12-22 16:54:59', NULL),
(578, 47, 2, 57, '2024-12-22 16:54:59', NULL),
(579, 47, 3, 13, '2024-12-22 16:54:59', NULL),
(580, 47, 4, 95, '2024-12-22 16:54:59', NULL),
(581, 48, 1, 35, '2024-12-22 16:54:59', NULL),
(582, 48, 2, 92, '2024-12-22 16:54:59', NULL),
(583, 48, 3, 54, '2024-12-22 16:54:59', NULL),
(584, 48, 4, 95, '2024-12-22 16:54:59', NULL),
(585, 49, 1, 17, '2024-12-24 07:43:27', NULL),
(586, 49, 2, 80, '2024-12-24 07:43:27', NULL),
(587, 49, 3, 46, '2024-12-24 07:43:27', NULL),
(588, 49, 4, 93, '2024-12-24 07:43:27', NULL),
(589, 51, 1, 27, '2024-12-24 07:43:27', NULL),
(590, 51, 2, 58, '2024-12-24 07:43:27', NULL),
(591, 51, 3, 10, '2024-12-24 07:43:27', NULL),
(592, 51, 4, 75, '2024-12-24 07:43:27', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reviews_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reply` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `replies`
--

INSERT INTO `replies` (`id`, `reviews_id`, `user_id`, `reply`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'okok', '2024-12-22 16:05:37', '2024-12-22 16:05:37'),
(2, 1, 6, 'nkmk', '2024-12-22 16:08:32', '2024-12-22 16:08:32'),
(3, 1, 4, 'nknknk', '2024-12-22 16:16:27', '2024-12-22 16:16:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reply` text DEFAULT NULL,
  `reply_user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `comment`, `created_at`, `updated_at`, `reply`, `reply_user_id`) VALUES
(1, 49, 6, 'nksnca', '2024-12-22 16:05:16', '2024-12-22 16:05:16', NULL, NULL),
(2, 49, 6, 'nlkn', '2024-12-22 16:08:43', '2024-12-22 16:08:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `brand`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Quản lý', NULL, NULL),
(2, 'Client', 'Khách hàng', NULL, NULL),
(3, 'NV', 'Nhan vien', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'S', NULL, NULL),
(2, 'M', NULL, NULL),
(3, 'L', NULL, NULL),
(4, 'XL', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL,
  `sort_by` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `thumb`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(4, 'OFF 50%', 'http://127.0.0.1:8000/danh-muc/2-hang-chinh-hang.html', '/storage/uploads/2024/12/13/banner2.png', 1, 1, '2024-12-11 18:45:31', '2024-12-12 19:18:05'),
(5, 'Sale', 'http://127.0.0.1:8000/danh-muc/1-bo-suu-tap-mua-dong.html', '/storage/uploads/2024/12/12/banner1.png', 1, 1, '2024-12-11 18:45:31', '2024-12-11 18:45:31'),
(7, 'Sale', 'http://127.0.0.1:8000/danh-muc/3-flash-sale.html', '/storage/uploads/2024/12/13/banner3.png', 1, 1, '2024-12-12 19:07:23', '2024-12-12 19:11:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statusorder`
--

CREATE TABLE `statusorder` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `statusorder`
--

INSERT INTO `statusorder` (`id`, `name`) VALUES
(1, 'Chờ duyệt'),
(2, 'Đơn bị từ chối'),
(3, 'Đã duyệt'),
(4, 'Đang giao'),
(5, 'Đã giao'),
(6, 'Giao hàng thất bại');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `SĐT` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `created_at`, `updated_at`, `status`, `SĐT`, `address`) VALUES
(4, 'Thắm', 'admin@localhost.com', NULL, '$2y$10$yh/ejMNMdhLpo8w1aHdGtumkYCdPw8PTPxSClyihL3bi0udW59Vbm', NULL, 1, '2024-11-29 23:48:56', '2024-12-11 09:22:33', 1, '123456789023', 'Đà Nẵng'),
(6, 'Phast', 'thambtl.23it@vku.udn.vn', NULL, '$2y$10$vkbCFRATXu0N30MvB5Cw2u.p9fao3WhfqLUC0rpsPOHvXmTVaO7Ua', NULL, 3, '2024-12-11 09:01:00', '2024-12-22 14:02:49', 1, NULL, NULL),
(7, 'test2', 'test2@gmail.com', NULL, '$2y$10$TpSQSj1JKQgM/VryCyrNyuLWEIvm0F/QUxdPz4zW9O9cMmR2vhmjm', NULL, 2, '2024-12-12 03:13:27', '2024-12-13 02:26:34', 1, '0123456789', 'quang trij');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_size_product_id_size_id_unique` (`product_id`,`size_id`),
  ADD KEY `product_size_size_id_foreign` (`size_id`);

--
-- Chỉ mục cho bảng `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reviews_id` (`reviews_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_ibfk_1` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `reply_user_id` (`reply_user_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_name_unique` (`name`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statusorder`
--
ALTER TABLE `statusorder`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=593;

--
-- AUTO_INCREMENT cho bảng `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `statusorder`
--
ALTER TABLE `statusorder`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statusorder` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`reviews_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`reply_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
