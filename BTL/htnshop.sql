-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2019 at 10:51 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `htnshop`
--
create database if not exists `htnshop` default character set utf8;
use `htnshop`;
-- --------------------------------------------------------

--
-- Stand-in structure for view `capnhatma`
-- (See below for the actual view)
--
CREATE TABLE `capnhatma` (
`machitietMA` int(11)
,`maSP` int(11)
,`tenSP` varchar(255)
,`hinhanh` varchar(255)
,`maNCC` int(11)
,`maloai` int(11)
,`trangthai` int(11)
,`giagoc` double
,`gia` double
,`km` int(11)
,`ghichu` text
,`dophangia` varchar(255)
,`bocambien` varchar(255)
,`manhinh` varchar(255)
,`hinhanh_2` varchar(255)
,`hinhanh_3` varchar(255)
,`hinhanh_4` varchar(255)
,`anh_5` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `capnhatmt`
-- (See below for the actual view)
--
CREATE TABLE `capnhatmt` (
`machitietSP` int(11)
,`maSP` int(11)
,`tenSP` varchar(255)
,`hinhanh` varchar(255)
,`maNCC` int(11)
,`maloai` int(11)
,`trangthai` int(11)
,`giagoc` double
,`gia` double
,`km` int(11)
,`ghichu` text
,`manhinh` text
,`cpu` varchar(100)
,`ram` varchar(100)
,`hinhanh_2` varchar(255)
,`hinhanh_3` varchar(255)
,`hinhanh_4` varchar(255)
,`anh_5` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `chitiethd`
--

CREATE TABLE `chitiethd` (
  `machitietHD` int(11) NOT NULL,
  `maHD` int(11) DEFAULT NULL,
  `maSP` int(11) DEFAULT NULL,
  `gia` double DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `tongtien` double DEFAULT NULL,
  `ngaylapcthd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiethd`
--

INSERT INTO `chitiethd` (`machitietHD`, `maHD`, `maSP`, `gia`, `soluong`, `tongtien`, `ngaylapcthd`) VALUES
(1, 1, 14, 5600000, 2, 11200000, '2019-06-17 04:50:25'),
(2, 1, 15, 9290000, 10, 92900000, '2019-06-17 04:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `chitietma`
--

CREATE TABLE `chitietma` (
  `machitietMA` int(11) NOT NULL,
  `maSP` int(11) DEFAULT NULL,
  `dophangia` varchar(255) DEFAULT NULL,
  `bocambien` varchar(255) DEFAULT NULL,
  `manhinh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietma`
--

INSERT INTO `chitietma` (`machitietMA`, `maSP`, `dophangia`, `bocambien`, `manhinh`) VALUES
(1, 24, '24.6 MP', 'CMOS+', 'LCD 3.2 inch'),
(2, 25, '20 MP', 'DIGIT 4+', 'LCD 2.7 inch'),
(3, 26, '16.3 MP', 'CCD', 'LCD 3.0 inch'),
(4, 27, '18 MP', 'DIGIT 4+', 'LCD 3.0 inch'),
(5, 28, '24 MP', 'CMOS', 'LCD 3.0 inch'),
(6, 29, '23 MP', 'DIGIT 4+', 'LCD 3.0 inch'),
(7, 30, '20.1 MP', 'CCD', 'TFT LCD 3.0 inch'),
(8, 31, '26.2 MP', 'DIGIT 7', 'LCD 2.0 inch'),
(9, 32, '20 MP', 'CCD', 'TFT LCD 3.0 inch'),
(10, 33, '20 MP', 'DIGIT 4+', 'LCD 2.7 inch'),
(11, 34, '20.1 MP', 'Super HAD CCD', 'LCD 2.7 inch'),
(12, 35, '24.1 MP', 'APS-C CMOS', 'LCD 3.0 inch'),
(13, 36, '24.2 MP', 'Exmor CMOS', 'TFT LCD 3.0 inch'),
(14, 37, '20 MP', 'APS-C CMOS', 'LCD 2.7 inch'),
(15, 38, '24.2 MP', 'CCD', 'LCD 3.0 inch'),
(16, 47, '5', '6', '7'),
(17, 52, '5', '6', '7');

-- --------------------------------------------------------

--
-- Table structure for table `chitietmt`
--

CREATE TABLE `chitietmt` (
  `machitietSP` int(11) NOT NULL,
  `maSP` int(11) NOT NULL,
  `manhinh` text NOT NULL,
  `CPU` varchar(100) NOT NULL,
  `RAM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietmt`
--

INSERT INTO `chitietmt` (`machitietSP`, `maSP`, `manhinh`, `CPU`, `RAM`) VALUES
(1, 3, '13.0 inchs LED Backlit', 'Intel Core i5 8130U', '4 GB DDR4 2400 MHz'),
(2, 4, '15.6 inchs LED Backlit', 'Intel Core i5 8250U', '4 GB DDR4 2400 MHz'),
(3, 5, '15.6 inchs LED Backlit', 'Intel Core i5 8250U', '4 GB DDR4 2400 MHz'),
(4, 6, '15.6 inchs FHD IPS', 'Intel Core i5 8300H', '8 GB DDR4 2666 MHz'),
(5, 7, '15.6 inchs LED Backlit', 'Intel Core i3 7020U', '4 GB DDR4 2400 MHz'),
(6, 8, '14.0 inchs Anti - Glare', 'Intel Core i3 7020U', '4GB + 16GB Optane DDR4'),
(7, 9, '15.6 inchs Anti-Glare LED Backlit', 'Intel Pentium N5000', '4 GB DDR4 2400 MHz'),
(8, 10, '15.6 inchs FHD Anti-Glare', 'Intel Core i3 8130U', '4 GB DDR4 2400 MHz'),
(9, 11, '15.6 inchs FHD WV 250nits', 'Intel Core i5 8250U', '4 GB DDR4 2400 MHz'),
(10, 12, '15.6 inchs FHD Anti-Glare', 'Intel Core i5 8250U', '4 GB DDR4 2400 MHz'),
(11, 13, '15.6 inches HD LED', 'Intel Core i7 8130U', '8 GB DDR4 2400 MHz'),
(12, 14, '15.6 inchs FHD Anti-Glare', 'Intel Core i3 5005U', '4 GB DDR4 2400 MHz'),
(13, 15, '15.6 inchs', 'Intel Core i3 8130U', '4 GB DDR4 2400 MHz'),
(14, 16, '15.6 inchs LED Backlit', 'Intel Core i7 8130U', '8 GB DDR4 2400 MHz'),
(15, 17, '14.0 inchs FHD IPS', 'AMD Ryzen R5 2600', '4 GB DDR4 2400 MHz'),
(16, 18, '15.6 inchs LED Backlit', 'AMD Ryzen™ 5', '8 GB DDR4'),
(17, 19, '15.6 inchs FHD IPS', 'AMD Ryzen™ 3 ', '8 GB DDR4 2666 MHz'),
(18, 20, '15.6 inchs LED Backlit', 'AMD Ryzen 7 2700x', '16 GB DDR4 2400 MHz'),
(20, 22, '15.6 inchs Anti-Glare LED Backlit', 'Intel Pentium', '4 GB DDR4 2400 MHz'),
(22, 45, '14.0 inch', 'Intel core i3 5005U', '4GB'),
(24, 48, '5326hsh', '262aaaaaaaaaaa', 'utwyywy'),
(25, 51, '7', '8', '9');

-- --------------------------------------------------------

--
-- Table structure for table `dacdiemma`
--

CREATE TABLE `dacdiemma` (
  `maDDNBMA` int(11) NOT NULL,
  `maSP` int(11) DEFAULT NULL,
  `thietke` text,
  `chupanh` text,
  `ongkinh` text,
  `cambien` text,
  `khac_1` text,
  `khac_2` text,
  `anh_1` varchar(255) DEFAULT NULL,
  `anh_2` varchar(255) DEFAULT NULL,
  `anh_3` varchar(255) DEFAULT NULL,
  `anh_4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dacdiemma`
--

INSERT INTO `dacdiemma` (`maDDNBMA`, `maSP`, `thietke`, `chupanh`, `ongkinh`, `cambien`, `khac_1`, `khac_2`, `anh_1`, `anh_2`, `anh_3`, `anh_4`) VALUES
(1, 24, 'Máy được thiết kế nhỏ gọn bạn có thể dễ dàng mang theo trong quá trình di chuyển, đi xa và thoải mái chụp ảnh, quay phim. Sản phẩm có vỏ ngoài cứng cáp, bền bỉ cùng báng cầm tay có độ bám, giúp hạn chế trơn trượt và hỗ trợ cầm nắm chắc chắn khi sử dụng', 'Độ phân giải cao mang tới những hình ảnh chất lượng với sự tái tạo các đối tượng cực trung thực và sắc nét. Các chi tiết được hiển thị rõ ràng và độ tương phản màu gần với thực tế nhờ bộ xử lý hiện đại. Tốc độ xử lý ảnh được nâng cao và chú trọng phân tích kỹ từng điểm ảnh cho phép chụp trong điều kiện ánh sáng yếu tốt hơn bởi độ nhạy sáng ISO 800-1600', 'Máy được trang bị ống kính zoom góc rộng, có thiết kế gọn nhẹ, sử dụng cho hệ thống máy ảnh định dạng full-frame E-mount. Tuy nhiên, ống kính này cũng tương thích với máy ảnh định dạng APS-C, trên định dạng này nó cung cấp tiêu cự là 42-105mm.', 'Được trang bị bộ cảm biến CMOS 24.2MP Exmor R BSI cùng với bộ xử lý hình ảnh BIONZ X, máy có thể cung cấp tính năng chụp ảnh sắc nét. Chip xử lý BIONZ X đã được tăng cường kết hợp với chip ngoại vi front-end LSI tăng khả năng đọc/ghi dữ liệu lớn. Qua đó, người dùng thoải mái tận dụng tốc độ chụp liên tục 10 khung hình/giây (và con số này là 8 ảnh/giây với chế độ chụp LiveView) để bắt gọn mọi khoảng khắc. Bên cạnh đó, bộ nhớ đệm hỗ trợ lưu ảnh tới 177 ảnh liên tục ở định dạng JPEG và 89 ảnh ở định dạng RAW – một sức mạnh đáng giá cho mọi tay máy chụp ảnh thể thao chuyên nghiệp', NULL, NULL, 'canon2_1.jpg', 'chupanh.jpg', 'cambien.jpg', 'ongkinh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dacdiemmt`
--

CREATE TABLE `dacdiemmt` (
  `maDDNBMT` int(11) NOT NULL,
  `maSP` int(11) DEFAULT NULL,
  `thietke` text,
  `manhinh` text,
  `cauhinh` text,
  `baomat` text,
  `khac_1` text,
  `khac_2` text,
  `anh_1` varchar(255) DEFAULT NULL,
  `anh_2` varchar(255) DEFAULT NULL,
  `anh_3` varchar(255) NOT NULL,
  `anh_4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dacdiemmt`
--

INSERT INTO `dacdiemmt` (`maDDNBMT`, `maSP`, `thietke`, `manhinh`, `cauhinh`, `baomat`, `khac_1`, `khac_2`, `anh_1`, `anh_2`, `anh_3`, `anh_4`) VALUES
(1, 12, ' được thiết kế hiện đại, tinh tế với chất liệu vỏ nhựa giả kim loại. Các cạnh được bo cong nhẹ với độ dày máy chỉ 21,9 mm, trọng lượng 1,8 kg tiện lợi việc mang vác, di chuyển đến công sở.', 'Được trang bị màn hình lớn 15.6 inch Full HD (1920 x 1080) kết hợp công nghệ màn hình LED Backlight - AntiGlare cho chất lượng hình ảnh xem phim chân thật, sắc nét.', 'Là một chiếc laptop đồ hoạ - kĩ thuật, được trang bị cấu hình mạnh trong phân khúc với chip xử lý core i5 thế hệ 8, kết hợp cùng 4GB RAM DDR4 và card đồ hoạ rời NVIDIA Geforce MX130 2GB các thao tác kéo thả trong photoshop cho phản hồi nhanh chóng, chơi PUBG chỉnh ở mức medium, game chạy khá tốt không giật lag.', 'Hướng tới sự bảo mật, nên máy được trang bị tính năng mở khoá vân tay, chỉ cần chạm nhẹ là có thể mở khóa máy tính một cách nhanh chóng.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(2, 3, 'Máy tính sử dụng bộ khung được làm từ chất liệu nhựa nhưng được hoàn thiện tốt nên vẫn đảm bảo sự bền bỉ, chắc chắn. Kết hợp với tông màu đen huyền bí, bạn sẽ thấy máy trông thực sự hiện đại và thanh lịch. Ngoài ra, máy tính có trọng lượng chỉ khoảng 2.3kg giúp người dùng có thể mang theo để sử dụng mọi nơi.', 'Màn hình của có kích thước lên tới 15.6 inch với tỷ lệ khung hình tiêu chuẩn rất thích hợp để lướt web, xem phim. Với tấm nền IPS LCD và độ phân giải HD, bạn sẽ thấy mọi hình ảnh hiển thị trên máy tính đều sắc nét, sống động mà lại tiết kiệm điện năng hơn so với màn Full HD.', 'Hướng tới học sinh, sinh viên và dân văn phòng, máy không quá chạy đua về cấu hình như các laptop gaming. Tuy nhiên, máy tính vẫn được trang bị dòng chip Intel rất phù hợp để xử lý các nhiệm vụ học tập hay văn phòng. Bên cạnh đó, bạn sẽ có bộ nhớ RAM lên đến 4GB, có khả năng nâng cấp lên 16GB cùng với ổ cứng HDD có dung lượng đến 1 TB để thoải mái lưu trữ và chạy đa nhiệm nhiều chương trình cùng một lúc mà không có vấn đề gì.', 'Bạn có thể mở máy và đăng nhập nhanh chóng thông qua cảm biến vân tay tích hợp sẵn. Sẽ không còn mối lo mất mật khẩu hay bị người khác “nhìn trộm” mật khẩu nhờ sự kết hợp giữa vân tay và tính năng nhận dạng sinh trắc học Windows Hello. Chỉ cần một lần chạm, máy tính sẽ đăng nhập một cách tiện lợi và an toàn.', NULL, NULL, 'dell5_2.png', 'dell4_3.png', 'mtdell_1.png', 'mtdell_4.png'),
(3, 10, 'sở hữu vẻ ngoài ấn tượng với độ mỏng chỉ 17.6 mm cùng trọng lượng 1.22 kg vô cùng gọn nhẹ, bạn có thể dễ dàng mang máy theo bên mình suốt ngày một cách mái.', 'Máy được trang bị màn hình 14.0 inch và độ phân giải (1366 x 769) pixels vào một khung máy có kích cỡ khiêm tốn. Màn hình với công nghệ Ultra Slim 200nits có tỉ lệ hiển thị màn hình lên đến 75.4%. Cho bạn cảm giác trải nghiệm tốt hơn, chân thật và sống động hơn cùng góc nhìn rộng và thoáng hơn. ', 'Máy được trang bị bộ vi xử lý intel Celeron N3060 cùng bộ nhớ RAM DDR3 2 GB  phù hợp cho nhân viên cũng như sinh viên trong nhu cầu làm việc,  giải trí và xử lý điện toán cơ bản thường ngày. Đặc biệt, với hệ điều hành Win 10 được tích hợp sẳn giúp máy chạy đa nhiệm một cách mượt mà, ổn định hơn bao giờ hết.', 'Máy được trang bị vân tay kết hợp cùng Windows Hello giúp tăng độ bảo mật, và mở khóa màn hình vô cùng nhanh.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(4, 11, ' sở hữu vẻ ngoài ấn tượng với độ mỏng chỉ 17.6 mm cùng trọng lượng 1.22 kg vô cùng gọn nhẹ, bạn có thể dễ dàng mang máy theo bên mình suốt ngày một cách mái.', 'Máy được trang bị màn hình 15.6 inch và độ phân giải (1366 x 769) pixels vào một khung máy có kích cỡ khiêm tốn. Màn hình với công nghệ Ultra Slim 200nits có tỉ lệ hiển thị màn hình lên đến 75.4%. Cho bạn cảm giác trải nghiệm tốt hơn, chân thật và sống động hơn cùng góc nhìn rộng và thoáng hơn.\r\n\r\n', 'Máy được trang bị bộ vi xử lý intel cùng bộ nhớ RAM DDR3 4 GB phù hợp cho nhân viên cũng như sinh viên trong nhu cầu làm việc, giải trí và xử lý điện toán cơ bản thường ngày. Đặc biệt, với hệ điều hành Win 10 được tích hợp sẳn giúp máy chạy đa nhiệm một cách mượt mà, ổn định hơn bao giờ hết', 'Máy được trang bị vân tay kết hợp cùng Windows Hello giúp tăng độ bảo mật, và mở khóa màn hình vô cùng nhanh.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(5, 13, ' sở hữu vẻ ngoài ấn tượng với độ mỏng chỉ 17.6 mm cùng trọng lượng 1.22 kg vô cùng gọn nhẹ, bạn có thể dễ dàng mang máy theo bên mình suốt ngày một cách mái.', 'Máy được trang bị màn hình 15.6 inch và độ phân giải (1366 x 769) pixels vào một khung máy có kích cỡ khiêm tốn. Màn hình với công nghệ Ultra Slim 200nits có tỉ lệ hiển thị màn hình lên đến 75.4%. Cho bạn cảm giác trải nghiệm tốt hơn, chân thật và sống động hơn cùng góc nhìn rộng và thoáng hơn.\r\n\r\n', 'Máy được trang bị bộ vi xử lý intel cùng bộ nhớ RAM DDR3 4 GB phù hợp cho nhân viên cũng như sinh viên trong nhu cầu làm việc, giải trí và xử lý điện toán cơ bản thường ngày. Đặc biệt, với hệ điều hành Win 10 được tích hợp sẳn giúp máy chạy đa nhiệm một cách mượt mà, ổn định hơn bao giờ hết', 'Máy được trang bị vân tay kết hợp cùng Windows Hello giúp tăng độ bảo mật, và mở khóa màn hình vô cùng nhanh.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(6, 14, ' sở hữu vẻ ngoài ấn tượng với độ mỏng chỉ 17.6 mm cùng trọng lượng 1.22 kg vô cùng gọn nhẹ, bạn có thể dễ dàng mang máy theo bên mình suốt ngày một cách mái.', 'Máy được trang bị màn hình 15.6 inch và độ phân giải (1366 x 769) pixels vào một khung máy có kích cỡ khiêm tốn. Màn hình với công nghệ Ultra Slim 200nits có tỉ lệ hiển thị màn hình lên đến 75.4%. Cho bạn cảm giác trải nghiệm tốt hơn, chân thật và sống động hơn cùng góc nhìn rộng và thoáng hơn.\r\n\r\n', 'Máy được trang bị bộ vi xử lý intel cùng bộ nhớ RAM DDR3 4 GB phù hợp cho nhân viên cũng như sinh viên trong nhu cầu làm việc, giải trí và xử lý điện toán cơ bản thường ngày. Đặc biệt, với hệ điều hành Win 10 được tích hợp sẳn giúp máy chạy đa nhiệm một cách mượt mà, ổn định hơn bao giờ hết', 'Máy được trang bị vân tay kết hợp cùng Windows Hello giúp tăng độ bảo mật, và mở khóa màn hình vô cùng nhanh.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(7, 15, ' sở hữu vẻ ngoài ấn tượng với độ mỏng chỉ 17.6 mm cùng trọng lượng 1.22 kg vô cùng gọn nhẹ, bạn có thể dễ dàng mang máy theo bên mình suốt ngày một cách mái.', 'Máy được trang bị màn hình 15.6 inch và độ phân giải (1366 x 769) pixels vào một khung máy có kích cỡ khiêm tốn. Màn hình với công nghệ Ultra Slim 200nits có tỉ lệ hiển thị màn hình lên đến 75.4%. Cho bạn cảm giác trải nghiệm tốt hơn, chân thật và sống động hơn cùng góc nhìn rộng và thoáng hơn.\r\n\r\n', 'Máy được trang bị bộ vi xử lý intel cùng bộ nhớ RAM DDR3 4 GB phù hợp cho nhân viên cũng như sinh viên trong nhu cầu làm việc, giải trí và xử lý điện toán cơ bản thường ngày. Đặc biệt, với hệ điều hành Win 10 được tích hợp sẳn giúp máy chạy đa nhiệm một cách mượt mà, ổn định hơn bao giờ hết', 'Máy được trang bị vân tay kết hợp cùng Windows Hello giúp tăng độ bảo mật, và mở khóa màn hình vô cùng nhanh.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(8, 16, ' sở hữu vẻ ngoài ấn tượng với độ mỏng chỉ 17.6 mm cùng trọng lượng 1.22 kg vô cùng gọn nhẹ, bạn có thể dễ dàng mang máy theo bên mình suốt ngày một cách mái.', 'Máy được trang bị màn hình 15.6 inch và độ phân giải (1366 x 769) pixels vào một khung máy có kích cỡ khiêm tốn. Màn hình với công nghệ Ultra Slim 200nits có tỉ lệ hiển thị màn hình lên đến 75.4%. Cho bạn cảm giác trải nghiệm tốt hơn, chân thật và sống động hơn cùng góc nhìn rộng và thoáng hơn.\r\n\r\n', 'Máy được trang bị bộ vi xử lý intel cùng bộ nhớ RAM DDR3 4 GB phù hợp cho nhân viên cũng như sinh viên trong nhu cầu làm việc, giải trí và xử lý điện toán cơ bản thường ngày. Đặc biệt, với hệ điều hành Win 10 được tích hợp sẳn giúp máy chạy đa nhiệm một cách mượt mà, ổn định hơn bao giờ hết', 'Máy được trang bị vân tay kết hợp cùng Windows Hello giúp tăng độ bảo mật, và mở khóa màn hình vô cùng nhanh.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(9, 17, ' sở hữu vẻ ngoài ấn tượng với độ mỏng chỉ 17.6 mm cùng trọng lượng 1.22 kg vô cùng gọn nhẹ, bạn có thể dễ dàng mang máy theo bên mình suốt ngày một cách mái.', 'Máy được trang bị màn hình 15.6 inch và độ phân giải (1366 x 769) pixels vào một khung máy có kích cỡ khiêm tốn. Màn hình với công nghệ Ultra Slim 200nits có tỉ lệ hiển thị màn hình lên đến 75.4%. Cho bạn cảm giác trải nghiệm tốt hơn, chân thật và sống động hơn cùng góc nhìn rộng và thoáng hơn.\r\n\r\n', 'Máy được trang bị bộ vi xử lý intel cùng bộ nhớ RAM DDR3 4 GB phù hợp cho nhân viên cũng như sinh viên trong nhu cầu làm việc, giải trí và xử lý điện toán cơ bản thường ngày. Đặc biệt, với hệ điều hành Win 10 được tích hợp sẳn giúp máy chạy đa nhiệm một cách mượt mà, ổn định hơn bao giờ hết', 'Máy được trang bị vân tay kết hợp cùng Windows Hello giúp tăng độ bảo mật, và mở khóa màn hình vô cùng nhanh.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(10, 18, ' sở hữu vẻ ngoài ấn tượng với độ mỏng chỉ 17.6 mm cùng trọng lượng 1.22 kg vô cùng gọn nhẹ, bạn có thể dễ dàng mang máy theo bên mình suốt ngày một cách mái.', 'Máy được trang bị màn hình 15.6 inch và độ phân giải (1366 x 769) pixels vào một khung máy có kích cỡ khiêm tốn. Màn hình với công nghệ Ultra Slim 200nits có tỉ lệ hiển thị màn hình lên đến 75.4%. Cho bạn cảm giác trải nghiệm tốt hơn, chân thật và sống động hơn cùng góc nhìn rộng và thoáng hơn.\r\n\r\n', 'Máy được trang bị bộ vi xử lý intel cùng bộ nhớ RAM DDR3 4 GB phù hợp cho nhân viên cũng như sinh viên trong nhu cầu làm việc, giải trí và xử lý điện toán cơ bản thường ngày. Đặc biệt, với hệ điều hành Win 10 được tích hợp sẳn giúp máy chạy đa nhiệm một cách mượt mà, ổn định hơn bao giờ hết', 'Máy được trang bị vân tay kết hợp cùng Windows Hello giúp tăng độ bảo mật, và mở khóa màn hình vô cùng nhanh.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(11, 19, ' sở hữu vẻ ngoài ấn tượng với độ mỏng chỉ 17.6 mm cùng trọng lượng 1.22 kg vô cùng gọn nhẹ, bạn có thể dễ dàng mang máy theo bên mình suốt ngày một cách mái.', 'Máy được trang bị màn hình 15.6 inch và độ phân giải (1366 x 769) pixels vào một khung máy có kích cỡ khiêm tốn. Màn hình với công nghệ Ultra Slim 200nits có tỉ lệ hiển thị màn hình lên đến 75.4%. Cho bạn cảm giác trải nghiệm tốt hơn, chân thật và sống động hơn cùng góc nhìn rộng và thoáng hơn.\r\n\r\n', 'Máy được trang bị bộ vi xử lý intel cùng bộ nhớ RAM DDR3 4 GB phù hợp cho nhân viên cũng như sinh viên trong nhu cầu làm việc, giải trí và xử lý điện toán cơ bản thường ngày. Đặc biệt, với hệ điều hành Win 10 được tích hợp sẳn giúp máy chạy đa nhiệm một cách mượt mà, ổn định hơn bao giờ hết', 'Máy được trang bị vân tay kết hợp cùng Windows Hello giúp tăng độ bảo mật, và mở khóa màn hình vô cùng nhanh.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(12, 20, ' sở hữu vẻ ngoài ấn tượng với độ mỏng chỉ 17.6 mm cùng trọng lượng 1.22 kg vô cùng gọn nhẹ, bạn có thể dễ dàng mang máy theo bên mình suốt ngày một cách mái.', 'Máy được trang bị màn hình 15.6 inch và độ phân giải (1366 x 769) pixels vào một khung máy có kích cỡ khiêm tốn. Màn hình với công nghệ Ultra Slim 200nits có tỉ lệ hiển thị màn hình lên đến 75.4%. Cho bạn cảm giác trải nghiệm tốt hơn, chân thật và sống động hơn cùng góc nhìn rộng và thoáng hơn.\r\n\r\n', 'Máy được trang bị bộ vi xử lý intel cùng bộ nhớ RAM DDR3 4 GB phù hợp cho nhân viên cũng như sinh viên trong nhu cầu làm việc, giải trí và xử lý điện toán cơ bản thường ngày. Đặc biệt, với hệ điều hành Win 10 được tích hợp sẳn giúp máy chạy đa nhiệm một cách mượt mà, ổn định hơn bao giờ hết', 'Máy được trang bị vân tay kết hợp cùng Windows Hello giúp tăng độ bảo mật, và mở khóa màn hình vô cùng nhanh.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(13, 21, ' sở hữu vẻ ngoài ấn tượng với độ mỏng chỉ 17.6 mm cùng trọng lượng 1.22 kg vô cùng gọn nhẹ, bạn có thể dễ dàng mang máy theo bên mình suốt ngày một cách mái.', 'Máy được trang bị màn hình 15.6 inch và độ phân giải (1366 x 769) pixels vào một khung máy có kích cỡ khiêm tốn. Màn hình với công nghệ Ultra Slim 200nits có tỉ lệ hiển thị màn hình lên đến 75.4%. Cho bạn cảm giác trải nghiệm tốt hơn, chân thật và sống động hơn cùng góc nhìn rộng và thoáng hơn.\r\n\r\n', 'Máy được trang bị bộ vi xử lý intel cùng bộ nhớ RAM DDR3 4 GB phù hợp cho nhân viên cũng như sinh viên trong nhu cầu làm việc, giải trí và xử lý điện toán cơ bản thường ngày. Đặc biệt, với hệ điều hành Win 10 được tích hợp sẳn giúp máy chạy đa nhiệm một cách mượt mà, ổn định hơn bao giờ hết', 'Máy được trang bị vân tay kết hợp cùng Windows Hello giúp tăng độ bảo mật, và mở khóa màn hình vô cùng nhanh.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(14, 22, ' sở hữu vẻ ngoài ấn tượng với độ mỏng chỉ 17.6 mm cùng trọng lượng 1.22 kg vô cùng gọn nhẹ, bạn có thể dễ dàng mang máy theo bên mình suốt ngày một cách mái.', 'Máy được trang bị màn hình 15.6 inch và độ phân giải (1366 x 769) pixels vào một khung máy có kích cỡ khiêm tốn. Màn hình với công nghệ Ultra Slim 200nits có tỉ lệ hiển thị màn hình lên đến 75.4%. Cho bạn cảm giác trải nghiệm tốt hơn, chân thật và sống động hơn cùng góc nhìn rộng và thoáng hơn.\r\n\r\n', 'Máy được trang bị bộ vi xử lý intel cùng bộ nhớ RAM DDR3 4 GB phù hợp cho nhân viên cũng như sinh viên trong nhu cầu làm việc, giải trí và xử lý điện toán cơ bản thường ngày. Đặc biệt, với hệ điều hành Win 10 được tích hợp sẳn giúp máy chạy đa nhiệm một cách mượt mà, ổn định hơn bao giờ hết', 'Máy được trang bị vân tay kết hợp cùng Windows Hello giúp tăng độ bảo mật, và mở khóa màn hình vô cùng nhanh.', NULL, NULL, 'asus1.png', 'asus2_2.png', 'asus1_1.png', 'asus3_3.jpg'),
(15, 4, 'Máy tính sử dụng bộ khung được làm từ chất liệu nhựa nhưng được hoàn thiện tốt nên vẫn đảm bảo sự bền bỉ, chắc chắn. Kết hợp với tông màu đen huyền bí, bạn sẽ thấy máy trông thực sự hiện đại và thanh lịch. Ngoài ra, máy tính có trọng lượng chỉ khoảng 2.3kg giúp người dùng có thể mang theo để sử dụng mọi nơi.', 'Màn hình của có kích thước lên tới 15.6 inch với tỷ lệ khung hình tiêu chuẩn rất thích hợp để lướt web, xem phim. Với tấm nền IPS LCD và độ phân giải HD, bạn sẽ thấy mọi hình ảnh hiển thị trên máy tính đều sắc nét, sống động mà lại tiết kiệm điện năng hơn so với màn Full HD.', 'Hướng tới học sinh, sinh viên và dân văn phòng, máy không quá chạy đua về cấu hình như các laptop gaming. Tuy nhiên, máy tính vẫn được trang bị dòng chip Intel rất phù hợp để xử lý các nhiệm vụ học tập hay văn phòng. Bên cạnh đó, bạn sẽ có bộ nhớ RAM lên đến 4GB, có khả năng nâng cấp lên 16GB cùng với ổ cứng HDD có dung lượng đến 1 TB để thoải mái lưu trữ và chạy đa nhiệm nhiều chương trình cùng một lúc mà không có vấn đề gì.\r\n', 'Bạn có thể mở máy và đăng nhập nhanh chóng thông qua cảm biến vân tay tích hợp sẵn. Sẽ không còn mối lo mất mật khẩu hay bị người khác “nhìn trộm” mật khẩu nhờ sự kết hợp giữa vân tay và tính năng nhận dạng sinh trắc học Windows Hello. Chỉ cần một lần chạm, máy tính sẽ đăng nhập một cách tiện lợi và an toàn.\r\n', NULL, NULL, 'dell5_2.png', 'dell4_3.png', 'mtdell_1.png', 'mtdell_4.png'),
(16, 5, 'Máy tính sử dụng bộ khung được làm từ chất liệu nhựa nhưng được hoàn thiện tốt nên vẫn đảm bảo sự bền bỉ, chắc chắn. Kết hợp với tông màu đen huyền bí, bạn sẽ thấy máy trông thực sự hiện đại và thanh lịch. Ngoài ra, máy tính có trọng lượng chỉ khoảng 2.3kg giúp người dùng có thể mang theo để sử dụng mọi nơi.', 'Màn hình của có kích thước lên tới 15.6 inch với tỷ lệ khung hình tiêu chuẩn rất thích hợp để lướt web, xem phim. Với tấm nền IPS LCD và độ phân giải HD, bạn sẽ thấy mọi hình ảnh hiển thị trên máy tính đều sắc nét, sống động mà lại tiết kiệm điện năng hơn so với màn Full HD.', 'Hướng tới học sinh, sinh viên và dân văn phòng, máy không quá chạy đua về cấu hình như các laptop gaming. Tuy nhiên, máy tính vẫn được trang bị dòng chip Intel rất phù hợp để xử lý các nhiệm vụ học tập hay văn phòng. Bên cạnh đó, bạn sẽ có bộ nhớ RAM lên đến 4GB, có khả năng nâng cấp lên 16GB cùng với ổ cứng HDD có dung lượng đến 1 TB để thoải mái lưu trữ và chạy đa nhiệm nhiều chương trình cùng một lúc mà không có vấn đề gì.\r\n', 'Bạn có thể mở máy và đăng nhập nhanh chóng thông qua cảm biến vân tay tích hợp sẵn. Sẽ không còn mối lo mất mật khẩu hay bị người khác “nhìn trộm” mật khẩu nhờ sự kết hợp giữa vân tay và tính năng nhận dạng sinh trắc học Windows Hello. Chỉ cần một lần chạm, máy tính sẽ đăng nhập một cách tiện lợi và an toàn.\r\n', NULL, NULL, 'dell5_2.png', 'dell4_3.png', 'mtdell_1.png', 'mtdell_4.png'),
(17, 6, 'Máy tính sử dụng bộ khung được làm từ chất liệu nhựa nhưng được hoàn thiện tốt nên vẫn đảm bảo sự bền bỉ, chắc chắn. Kết hợp với tông màu đen huyền bí, bạn sẽ thấy máy trông thực sự hiện đại và thanh lịch. Ngoài ra, máy tính có trọng lượng chỉ khoảng 2.3kg giúp người dùng có thể mang theo để sử dụng mọi nơi.', 'Màn hình của có kích thước lên tới 15.6 inch với tỷ lệ khung hình tiêu chuẩn rất thích hợp để lướt web, xem phim. Với tấm nền IPS LCD và độ phân giải HD, bạn sẽ thấy mọi hình ảnh hiển thị trên máy tính đều sắc nét, sống động mà lại tiết kiệm điện năng hơn so với màn Full HD.', 'Hướng tới học sinh, sinh viên và dân văn phòng, máy không quá chạy đua về cấu hình như các laptop gaming. Tuy nhiên, máy tính vẫn được trang bị dòng chip Intel rất phù hợp để xử lý các nhiệm vụ học tập hay văn phòng. Bên cạnh đó, bạn sẽ có bộ nhớ RAM lên đến 4GB, có khả năng nâng cấp lên 16GB cùng với ổ cứng HDD có dung lượng đến 1 TB để thoải mái lưu trữ và chạy đa nhiệm nhiều chương trình cùng một lúc mà không có vấn đề gì.\r\n', 'Bạn có thể mở máy và đăng nhập nhanh chóng thông qua cảm biến vân tay tích hợp sẵn. Sẽ không còn mối lo mất mật khẩu hay bị người khác “nhìn trộm” mật khẩu nhờ sự kết hợp giữa vân tay và tính năng nhận dạng sinh trắc học Windows Hello. Chỉ cần một lần chạm, máy tính sẽ đăng nhập một cách tiện lợi và an toàn.\r\n', NULL, NULL, 'dell5_2.png', 'dell4_3.png', 'mtdell_1.png', 'mtdell_4.png'),
(18, 7, 'Máy tính sử dụng bộ khung được làm từ chất liệu nhựa nhưng được hoàn thiện tốt nên vẫn đảm bảo sự bền bỉ, chắc chắn. Kết hợp với tông màu đen huyền bí, bạn sẽ thấy máy trông thực sự hiện đại và thanh lịch. Ngoài ra, máy tính có trọng lượng chỉ khoảng 2.3kg giúp người dùng có thể mang theo để sử dụng mọi nơi.', 'Màn hình của có kích thước lên tới 15.6 inch với tỷ lệ khung hình tiêu chuẩn rất thích hợp để lướt web, xem phim. Với tấm nền IPS LCD và độ phân giải HD, bạn sẽ thấy mọi hình ảnh hiển thị trên máy tính đều sắc nét, sống động mà lại tiết kiệm điện năng hơn so với màn Full HD.', 'Hướng tới học sinh, sinh viên và dân văn phòng, máy không quá chạy đua về cấu hình như các laptop gaming. Tuy nhiên, máy tính vẫn được trang bị dòng chip Intel rất phù hợp để xử lý các nhiệm vụ học tập hay văn phòng. Bên cạnh đó, bạn sẽ có bộ nhớ RAM lên đến 4GB, có khả năng nâng cấp lên 16GB cùng với ổ cứng HDD có dung lượng đến 1 TB để thoải mái lưu trữ và chạy đa nhiệm nhiều chương trình cùng một lúc mà không có vấn đề gì.\r\n', 'Bạn có thể mở máy và đăng nhập nhanh chóng thông qua cảm biến vân tay tích hợp sẵn. Sẽ không còn mối lo mất mật khẩu hay bị người khác “nhìn trộm” mật khẩu nhờ sự kết hợp giữa vân tay và tính năng nhận dạng sinh trắc học Windows Hello. Chỉ cần một lần chạm, máy tính sẽ đăng nhập một cách tiện lợi và an toàn.\r\n', NULL, NULL, 'dell5_2.png', 'dell4_3.png', 'mtdell_1.png', 'mtdell_4.png'),
(19, 8, 'Máy tính sử dụng bộ khung được làm từ chất liệu nhựa nhưng được hoàn thiện tốt nên vẫn đảm bảo sự bền bỉ, chắc chắn. Kết hợp với tông màu đen huyền bí, bạn sẽ thấy máy trông thực sự hiện đại và thanh lịch. Ngoài ra, máy tính có trọng lượng chỉ khoảng 2.3kg giúp người dùng có thể mang theo để sử dụng mọi nơi.', 'Màn hình của có kích thước lên tới 15.6 inch với tỷ lệ khung hình tiêu chuẩn rất thích hợp để lướt web, xem phim. Với tấm nền IPS LCD và độ phân giải HD, bạn sẽ thấy mọi hình ảnh hiển thị trên máy tính đều sắc nét, sống động mà lại tiết kiệm điện năng hơn so với màn Full HD.', 'Hướng tới học sinh, sinh viên và dân văn phòng, máy không quá chạy đua về cấu hình như các laptop gaming. Tuy nhiên, máy tính vẫn được trang bị dòng chip Intel rất phù hợp để xử lý các nhiệm vụ học tập hay văn phòng. Bên cạnh đó, bạn sẽ có bộ nhớ RAM lên đến 4GB, có khả năng nâng cấp lên 16GB cùng với ổ cứng HDD có dung lượng đến 1 TB để thoải mái lưu trữ và chạy đa nhiệm nhiều chương trình cùng một lúc mà không có vấn đề gì.\r\n', 'Bạn có thể mở máy và đăng nhập nhanh chóng thông qua cảm biến vân tay tích hợp sẵn. Sẽ không còn mối lo mất mật khẩu hay bị người khác “nhìn trộm” mật khẩu nhờ sự kết hợp giữa vân tay và tính năng nhận dạng sinh trắc học Windows Hello. Chỉ cần một lần chạm, máy tính sẽ đăng nhập một cách tiện lợi và an toàn.\r\n', NULL, NULL, 'dell5_2.png', 'dell4_3.png', 'mtdell_1.png', 'mtdell_4.png'),
(20, 9, 'Máy tính sử dụng bộ khung được làm từ chất liệu nhựa nhưng được hoàn thiện tốt nên vẫn đảm bảo sự bền bỉ, chắc chắn. Kết hợp với tông màu đen huyền bí, bạn sẽ thấy máy trông thực sự hiện đại và thanh lịch. Ngoài ra, máy tính có trọng lượng chỉ khoảng 2.3kg giúp người dùng có thể mang theo để sử dụng mọi nơi.', 'Màn hình của có kích thước lên tới 15.6 inch với tỷ lệ khung hình tiêu chuẩn rất thích hợp để lướt web, xem phim. Với tấm nền IPS LCD và độ phân giải HD, bạn sẽ thấy mọi hình ảnh hiển thị trên máy tính đều sắc nét, sống động mà lại tiết kiệm điện năng hơn so với màn Full HD.', 'Hướng tới học sinh, sinh viên và dân văn phòng, máy không quá chạy đua về cấu hình như các laptop gaming. Tuy nhiên, máy tính vẫn được trang bị dòng chip Intel rất phù hợp để xử lý các nhiệm vụ học tập hay văn phòng. Bên cạnh đó, bạn sẽ có bộ nhớ RAM lên đến 4GB, có khả năng nâng cấp lên 16GB cùng với ổ cứng HDD có dung lượng đến 1 TB để thoải mái lưu trữ và chạy đa nhiệm nhiều chương trình cùng một lúc mà không có vấn đề gì.\r\n', 'Bạn có thể mở máy và đăng nhập nhanh chóng thông qua cảm biến vân tay tích hợp sẵn. Sẽ không còn mối lo mất mật khẩu hay bị người khác “nhìn trộm” mật khẩu nhờ sự kết hợp giữa vân tay và tính năng nhận dạng sinh trắc học Windows Hello. Chỉ cần một lần chạm, máy tính sẽ đăng nhập một cách tiện lợi và an toàn.\r\n', NULL, NULL, 'dell5_2.png', 'dell4_3.png', 'mtdell_1.png', 'mtdell_4.png'),
(21, 45, 'ấn tượng', 'đẹp', 'ngon', 'tốt', NULL, NULL, 'Doi_mat_thien_than_1.png', '22-1459237157398.jpg', '781313.png', '269462e9-c146-4e25-bf81-49f309327eb7.png');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `maDM` int(11) NOT NULL,
  `tenDM` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`maDM`, `tenDM`) VALUES
(1, 'Máy tính'),
(2, 'Máy ảnh');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ddmayanh`
-- (See below for the actual view)
--
CREATE TABLE `ddmayanh` (
`maDDNBMA` int(11)
,`maSP` int(11)
,`tenSP` varchar(255)
,`anh_1` varchar(255)
,`anh_2` varchar(255)
,`anh_3` varchar(255)
,`anh_4` varchar(255)
,`thietke` text
,`chupanh` text
,`cambien` text
,`ongkinh` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ddmaytinh`
-- (See below for the actual view)
--
CREATE TABLE `ddmaytinh` (
`maDDNBMT` int(11)
,`maSP` int(11)
,`tenSP` varchar(255)
,`anh_1` varchar(255)
,`anh_2` varchar(255)
,`anh_3` varchar(255)
,`anh_4` varchar(255)
,`thietke` text
,`manhinh` text
,`cauhinh` text
,`baomat` text
);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `maHD` int(11) NOT NULL,
  `maND` int(11) NOT NULL,
  `ngaydathang` datetime NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `hinhthucnhanhang` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachinhanhang` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`maHD`, `maND`, `ngaydathang`, `trangthai`, `email`, `hinhthucnhanhang`, `hoten`, `sdt`, `diachinhanhang`) VALUES
(1, 2, '2019-06-17 04:50:25', 1, 'bienbang2017@gmail.com', 'Nhận tại cửa hàng', 'Thái', 393724111, 'Số 141 Chiến Thắng, Thanh Trì, Tân Triều, Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `maLH` int(11) NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `noidung` text CHARACTER SET utf8 NOT NULL,
  `ngaylh` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`maLH`, `hoten`, `email`, `noidung`, `ngaylh`) VALUES
(1, 'Thái', 'bienbang2017@gmail.com', 'khè khè', '0000-00-00 00:00:00'),
(2, 'Thanh', 'hoangvan181198@gmail.com', 'he he hu hu', '2019-06-18 19:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`maloai`, `tenloai`) VALUES
(1, 'Mới'),
(2, 'Nổi bật'),
(3, 'Thường');

-- --------------------------------------------------------

--
-- Table structure for table `ncc`
--

CREATE TABLE `ncc` (
  `maNCC` int(11) NOT NULL,
  `tenNCC` varchar(255) CHARACTER SET utf8 NOT NULL,
  `diachi` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` char(11) NOT NULL,
  `maDM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ncc`
--

INSERT INTO `ncc` (`maNCC`, `tenNCC`, `diachi`, `sdt`, `maDM`) VALUES
(1, 'Asus', 'Đà Nẵng', '0987382323', 1),
(2, 'DELL', 'Hà Nội', '0393724111', 1),
(3, 'Canon', 'TP.Hồ Chí Minh', '0393724111', 2),
(4, 'Sony', 'Hà Nội', '0393724111', 2),
(5, 'Lenovo', 'Hà Nội', '0393724222', 1),
(6, 'Nikon', 'Đà Nẵng', '0966380917', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `maND` int(11) NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phanquyen` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`maND`, `hoten`, `password`, `ngaysinh`, `gioitinh`, `email`, `phanquyen`) VALUES
(2, 'Hoàng Văn Thái', 'abc', '1999-11-17', 'nam', 'thai@gmail.com', 1),
(3, 'Hoang Van', '123', '1999-01-14', 'nam', 'bienbang2017@gmail.com', 0),
(4, 'Hoang Van', '1', '2017-02-02', 'Nam', 't2017@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(11) NOT NULL,
  `tenSP` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hinhanh` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ghichu` text CHARACTER SET utf8 NOT NULL,
  `gia` double NOT NULL,
  `km` int(11) NOT NULL DEFAULT '0',
  `trangthai` int(11) NOT NULL,
  `maDM` int(11) NOT NULL,
  `maNCC` int(11) NOT NULL,
  `giagoc` double NOT NULL,
  `maloai` int(11) NOT NULL,
  `hinhanh_2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hinhanh_3` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hinhanh_4` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `anh_5` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `tenSP`, `hinhanh`, `ghichu`, `gia`, `km`, `trangthai`, `maDM`, `maNCC`, `giagoc`, `maloai`, `hinhanh_2`, `hinhanh_3`, `hinhanh_4`, `anh_5`) VALUES
(3, 'Dell Vostro 3578AB', 'dell2.jpg', ' là chiếc laptop tối ưu cho những người làm văn phòng và sinh viên với cấu hình tầm trung cùng với thiết kế cứng cắp, chắc chắn, và thời lượng pin đảm bảo cho khả năng sử dụng trong khoảng 1 ngày.', 15100000, 3, 1, 1, 2, 15200000, 1, 'dell2_2.jpg', 'dell2_3.jpg', 'dell2_4.jpg', 'dell2_5.jpg'),
(4, 'Dell Vostro 3568', 'dell3.jpg', ' là chiếc laptop tối ưu cho những người làm văn phòng và sinh viên với cấu hình tầm trung cùng với thiết kế cứng cắp, chắc chắn, và thời lượng pin đảm bảo cho khả năng sử dụng trong 1 ngày.', 10200000, 0, 1, 1, 2, 10200000, 2, 'dell3_2.png', 'dell3_3.png', 'dell3_4.png', 'dell2_5.jpg'),
(5, 'Dell N3576', 'dell3.jpg', ' là chiếc laptop tối ưu cho những người làm văn phòng và sinh viên với cấu hình tầm trung cùng với thiết kế cứng cắp, chắc chắn, và thời lượng pin đảm bảo cho khả năng sử dụng trong 1 ngày.', 8900000, 0, 1, 1, 2, 10200000, 2, 'dell4_2.png', 'dell4_3.png', 'dell4_4.png', 'dell2_5.jpg'),
(6, 'Dell Inspiron N34768', 'dell3.jpg', ' là chiếc laptop tối ưu cho những người làm văn phòng và sinh viên với cấu hình tầm trung cùng với thiết kế cứng cắp, chắc chắn, và thời lượng pin đảm bảo cho khả năng sử dụng trong 1 ngày.', 8900000, 0, 1, 1, 2, 10200000, 2, 'dell5_2.jpg', 'dell5_3.png', 'dell5_4.png', 'dell2_5.jpg'),
(7, 'Inspiron N3576F', 'dell3.jpg', ' là chiếc laptop tối ưu cho những người làm văn phòng và sinh viên với cấu hình tầm trung cùng với thiết kế cứng cắp, chắc chắn, và thời lượng pin đảm bảo cho khả năng sử dụng trong 1 ngày.', 8900000, 0, 1, 1, 2, 10200000, 2, 'dell6_2.jpg', 'dell6_3.png', 'dell6_4.png', 'dell2_5.jpg'),
(8, 'Dell N5570A', 'dell3.jpg', ' là chiếc laptop tối ưu cho những người làm văn phòng và sinh viên với cấu hình tầm trung cùng với thiết kế cứng cắp, chắc chắn, và thời lượng pin đảm bảo cho khả năng sử dụng trong 1 ngày.', 8900000, 0, 1, 1, 2, 10200000, 3, 'dell3_2.png', 'dell7_2.png', 'dell7_3.png', 'dell2_5.jpg'),
(9, 'Dell Vostro 3568', 'dell3.jpg', ' là chiếc laptop tối ưu cho những người làm văn phòng và sinh viên với cấu hình tầm trung cùng với thiết kế cứng cắp, chắc chắn, và thời lượng pin đảm bảo cho khả năng sử dụng trong 1 ngày.', 8900000, 0, 1, 1, 2, 10200000, 1, 'dell3_4.png', 'dell5_4.png', 'dell3_4.png', 'dell2_5.jpg'),
(10, 'Asus Vivobook E406SA-BV001T', 'mt2.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 5290000, 0, 1, 1, 1, 6000000, 3, 'asus8_2.png', 'asus8_3.png', 'asus8_4.png', 'asustskt.jpg'),
(11, 'Asus X541UA-GO1372T', 'mt3.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 9790000, 0, 1, 1, 1, 10000000, 3, 'asus9_2.jpg', 'asus9_3.jpg', 'asus9_4.png', 'asustskt.jpg'),
(12, 'Asus Zenbook UX333FA-A4011T', 'mt4.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 22990000, 0, 1, 1, 1, 24500000, 3, 'asus10_2.jpg', 'asus10_3.png', 'asus10_4.png', 'asustskt.jpg'),
(13, 'Asus Vivobook X507UA-BR167T', 'mt5.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 10390000, 0, 1, 1, 1, 11200000, 3, 'asus10_2.png', 'asus8_3.png', 'asus8_4.png', 'asustskt.jpg'),
(14, 'Asus Vivobook X507MA-BR316T', 'mt6.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 5600000, 0, 1, 1, 1, 6400000, 3, 'asus8_2.png', 'asus3.jpg', 'asus4.jpg', 'asustskt.jpg'),
(15, 'Asus Vivobook X507MA-BR317T', 'mt7.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 9290000, 0, 1, 1, 1, 10800000, 3, 'asus12_2.png', 'asus2.jpg', 'asus3.jpg', 'asustskt.jpg'),
(16, 'Asus F560UD-BQ327T', 'mt8.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 16990000, 0, 1, 1, 1, 18000000, 3, 'asus13_2.jpg', 'asus13_3.jpg', 'asus13_4.png', 'asustskt.jpg'),
(17, 'Asus Vivobook X407UA-BV489T', 'mt9.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 12790000, 0, 1, 1, 1, 13200000, 1, 'asus14_2.jpg', 'asus14_3.png', 'asus14_4.png', 'asustskt.jpg'),
(18, 'Asus TUF FX505GE-BQ308T-G', 'mt10.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 23890000, 0, 1, 1, 1, 24200000, 1, 'asus15_2.png', 'asus14_3.png', 'asus14_4.png', 'asustskt.jpg'),
(19, 'Asus Vivobook X507UF-EJ257T', 'mt11.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 17790000, 0, 1, 1, 1, 18350000, 3, 'asus8_2.png', 'asus8_3.png', 'asus8_3.png', 'asustskt.jpg'),
(20, 'Asus Vivobook S530UA-BQ072T', 'mt12.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 13790000, 0, 1, 1, 1, 14000000, 3, 'asus9_2.jpg', 'asus9_3.jpg', 'asus9_4.png', 'asustskt.jpg'),
(21, 'Asus Vivobook X507MA-BR208T', 'mt1.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 6390000, 0, 1, 1, 1, 7000000, 3, 'asus8_2.png', 'asus10_2.png', 'asus12_2.png', 'asustskt.jpg'),
(22, 'Asus VIVOBOOK X507UA-EJ234T', 'mt1.png', ' thuộc dòng laptop mới của Asus được thiết kế gọn nhẹ phù hợp với nhu cầu làm việc và di chuyển thường xuyên. Điểm cộng của dòng dòng laptop này là viền màn hình mỏng và cấu hình tầm trung.', 10590000, 0, 1, 1, 1, 10590000, 1, 'asus9_2.jpg', 'asus9_3.jpg', 'asus9_4.png', 'asustskt.jpg'),
(23, 'Dell Inspiron N3567S', 'dell1.jpg', ' là chiếc laptop tối ưu cho những người làm văn phòng và sinh viên với cấu hình tầm trung cùng với thiết kế cứng cắp, chắc chắn, và thời lượng pin đảm bảo cho khả năng sử dụng trong 1 ngày.', 10990000, 0, 1, 1, 2, 11200000, 2, 'dell4_2.png', 'dell4_3.png', 'dell4_4.png', 'asustskt.jpg'),
(24, 'CANON EOS 750DC', 'canon5.jpg', ' mang đến hình ảnh ưu việt với độ phân giải lên đến cao, vượt trội hơn các dòng máy ảnh trước đó dành cho người mới sử dụng. Kết hợp cùng khả năng lấy nét nhanh, làm tăng chất lượng trên mỗi khung nhìn...', 12700000, 5, 1, 2, 3, 15700000, 2, 'canon2_1.jpg', 'canon2_2.jpg', 'canon2_3.jpg', 'cntskt.jpg'),
(25, 'CANON EOS RP KIT 24-105', 'canon1.jpg', ' mang đến hình ảnh ưu việt với độ phân giải lên đến cao, vượt trội hơn các dòng máy ảnh trước đó dành cho người mới sử dụng. Kết hợp cùng khả năng lấy nét nhanh, làm tăng chất lượng trên mỗi khung nhìn.', 59900000, 0, 1, 2, 3, 62000000, 2, 'canon3_1.jpg', 'canon3_2.jpg', 'canon3_3.jpg', NULL),
(26, 'CANON EOS RP BODY', 'canon2.jpg', ' mang đến hình ảnh ưu việt với độ phân giải lên đến cao, vượt trội hơn các dòng máy ảnh trước đó dành cho người mới sử dụng. Kết hợp cùng khả năng lấy nét nhanh, làm tăng chất lượng trên mỗi khung nhìn.', 39900000, 0, 1, 2, 3, 42000000, 2, 'canon4_1.jpg', 'canon4_2.jpg', 'canon4_3.jpg', NULL),
(27, 'Canon 5D Mark III', 'ma1.jpg', ' mang đến hình ảnh ưu việt với độ phân giải lên đến cao, vượt trội hơn các dòng máy ảnh trước đó dành cho người mới sử dụng. Kết hợp cùng khả năng lấy nét nhanh, làm tăng chất lượng trên mỗi khung nhìn.', 71000000, 0, 1, 2, 3, 72500000, 3, 'canon5_1.jpg', 'canon5_2.jpg', 'canon5_3.jpg', NULL),
(28, 'Sony Alpha Full Frame ILCE-7M3K', 'ma2.jpg', ' được thiết kế chuyên nghiệp cao cấp, với vẻ ngoài cứng cáp, giúp bạn cảm thấy thoải mái khi sử dụng, cùng độ phân giải cao và cảm biến mới nhất đem đến những bức ảnh sắc nét. Hơn nữa, tốc độ chụp ảnh nhanh giúp bạn không bỏ lỡ bất cứ khoảnh khắc thú vị trong cuộc sống.', 51000000, 0, 1, 2, 4, 51250000, 3, 'sony1_3.jpg', 'sony1_2.jpg', 'sony1_1.jpg', NULL),
(29, 'Sony Alpha Full Frame ILCE-7RM3', 'ma3.jpg', ' được thiết kế chuyên nghiệp cao cấp, với vẻ ngoài cứng cáp, giúp bạn cảm thấy thoải mái khi sử dụng, cùng độ phân giải cao và cảm biến mới nhất đem đến những bức ảnh sắc nét. Hơn nữa, tốc độ chụp ảnh nhanh giúp bạn không bỏ lỡ bất cứ khoảnh khắc thú vị trong cuộc sống.', 7790000, 0, 1, 2, 4, 80000000, 3, 'sony1_1.jpg', 'sony1_2.jpg', 'sony1_3.jpg', NULL),
(30, 'Sony Alpha 7R II', 'ma4.jpg', ' được thiết kế chuyên nghiệp cao cấp, với vẻ ngoài cứng cáp, giúp bạn cảm thấy thoải mái khi sử dụng, cùng độ phân giải cao và cảm biến mới nhất đem đến những bức ảnh sắc nét. Hơn nữa, tốc độ chụp ảnh nhanh giúp bạn không bỏ lỡ bất cứ khoảnh khắc thú vị trong cuộc sống..', 32000000, 0, 1, 2, 4, 32840000, 3, 'sony1_3.jpg', 'sony1_1.jpg', 'sony1_2.jpg', NULL),
(31, 'Sony Alpha 7R I', 'sony1_3.jpg', ' được thiết kế chuyên nghiệp cao cấp, với vẻ ngoài cứng cáp, giúp bạn cảm thấy thoải mái khi sử dụng, cùng độ phân giải cao và cảm biến mới nhất đem đến những bức ảnh sắc nét. Hơn nữa, tốc độ chụp ảnh nhanh giúp bạn không bỏ lỡ bất cứ khoảnh khắc thú vị trong cuộc sống.', 32000000, 0, 1, 2, 4, 32540000, 3, 'sony2_1.jpg', 'sony2_2.jpg', 'sony2_3.jpg', NULL),
(32, 'Sony ILCE-6000L, 24.3MP', 'ma6.jpg', ' được thiết kế chuyên nghiệp cao cấp, với vẻ ngoài cứng cáp, giúp bạn cảm thấy thoải mái khi sử dụng, cùng độ phân giải cao và cảm biến mới nhất đem đến những bức ảnh sắc nét. Hơn nữa, tốc độ chụp ảnh nhanh giúp bạn không bỏ lỡ bất cứ khoảnh khắc thú vị trong cuộc sống.', 13490000, 0, 1, 2, 4, 14440000, 3, 'sony3_1.jpg', 'sony3_2.jpg', 'sony3_3.jpg', NULL),
(33, 'Sony ALPHA ILCE-6000 24.3MP', 'sony3_1.jpg', ' được thiết kế chuyên nghiệp cao cấp, với vẻ ngoài cứng cáp, giúp bạn cảm thấy thoải mái khi sử dụng, cùng độ phân giải cao và cảm biến mới nhất đem đến những bức ảnh sắc nét. Hơn nữa, tốc độ chụp ảnh nhanh giúp bạn không bỏ lỡ bất cứ khoảnh khắc thú vị trong cuộc sống.', 10990000, 0, 1, 2, 4, 11440000, 3, 'sony4_1.jpg', 'sony4_2.jpg', 'sony4_3.jpg', NULL),
(34, 'Canon Compact SX60HS', 'ma7.png', ' mang đến hình ảnh ưu việt với độ phân giải lên đến cao, vượt trội hơn các dòng máy ảnh trước đó dành cho người mới sử dụng. Kết hợp cùng khả năng lấy nét nhanh, làm tăng chất lượng trên mỗi khung nhìn.', 11934000, 0, 1, 2, 3, 13240000, 3, 'canon1_3.jpg', 'canon1_4.jpg', 'canon1_2.jpg', NULL),
(35, 'Canon PowerShot SX540 HS', 'sony1.jpg', ' mang đến hình ảnh ưu việt với độ phân giải lên đến cao, vượt trội hơn các dòng máy ảnh trước đó dành cho người mới sử dụng. Kết hợp cùng khả năng lấy nét nhanh, làm tăng chất lượng trên mỗi khung nhìn.', 8290000, 0, 1, 2, 3, 9000000, 3, 'canon2_2.jpg', 'canon2_1.jpg', 'canon2_3.jpg', NULL),
(36, 'Canon Powershot G3 X', 'ma9.jpg', ' mang đến hình ảnh ưu việt với độ phân giải lên đến cao, vượt trội hơn các dòng máy ảnh trước đó dành cho người mới sử dụng. Kết hợp cùng khả năng lấy nét nhanh, làm tăng chất lượng trên mỗi khung nhìn.', 17090000, 0, 1, 2, 3, 20000000, 1, 'canon3_2.jpg', 'canon3_1.jpg', 'canon3_3.jpg', NULL),
(37, 'Canon Powershot SX620 HS', 'ma10.jpg', ' mang đến hình ảnh ưu việt với độ phân giải lên đến cao, vượt trội hơn các dòng máy ảnh trước đó dành cho người mới sử dụng. Kết hợp cùng khả năng lấy nét nhanh, làm tăng chất lượng trên mỗi khung nhìn.', 5600000, 0, 1, 2, 3, 6200000, 1, 'canon4_1.jpg', 'canon4_2.jpg', 'canon4_3.jpg', NULL),
(38, 'Canon Powershot SX740HS', 'ma11.jpg', ' mang đến hình ảnh ưu việt với độ phân giải lên đến cao, vượt trội hơn các dòng máy ảnh trước đó dành cho người mới sử dụng. Kết hợp cùng khả năng lấy nét nhanh, làm tăng chất lượng trên mỗi khung nhìn.', 8700000, 0, 1, 2, 3, 9000000, 1, 'canon5_1.jpg', 'canon5_2.jpg', 'canon5_3.jpg', NULL),
(43, 'Sony ALPHA ILCE-6000 24.3MP', '2.jpg', '4', 2, 3, 1, 2, 4, 1, 3, NULL, NULL, NULL, NULL),
(44, 'Sony ALPHA ILCE-6000 24.3MP', '1424416488-petc4_idpl.jpg', '4', 2, 3, 1, 2, 4, 1, 2, NULL, NULL, NULL, NULL),
(45, 'Asus X454LAB', 'Doi_mat_thien_than_1.png', 'máy tính tầm trung', 8590000, 5, 1, 1, 1, 9000000, 3, NULL, NULL, NULL, NULL),
(47, 'Sony ALPHA ILCE-6000 24.3MP', 'heyphim_Drama_AngelEyes_bc1_1.jpg', '4', 2, 3, 1, 2, 3, 1, 1, '781313.png', '2032626_l.jpg', 'sa7d80b0294156i000400006a2ff020.jpg', NULL),
(48, 'Lenovo Test', '2.jpg', '525gs', 3435, 4, 1, 1, 5, 123, 3, '22-1459237157398.jpg', '269462e9-c146-4e25-bf81-49f309327eb7.png', '269462e9-c146-4e25-bf81-49f309327eb7.png', NULL),
(51, 'Dell Vostro test', 'asus4.jpg', '6', 12345, 5, 1, 1, 1, 1234, 3, 'asus8_2.png', 'asus2.jpg', 'asus13_4.png', NULL),
(52, 'matest', 'asus1.png', '4', 2, 3, 1, 2, 3, 1, 1, 'asus8_2.png', 'asus3.jpg', 'asus4.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tsktma`
--

CREATE TABLE `tsktma` (
  `ID` int(11) NOT NULL,
  `maSP` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `mausac` varchar(255) DEFAULT NULL,
  `nhasanxuat` varchar(255) DEFAULT NULL,
  `xuatxu` varchar(255) DEFAULT NULL,
  `dophangiai` varchar(255) DEFAULT NULL,
  `boxuly` varchar(255) DEFAULT NULL,
  `tudonglaynet` varchar(255) DEFAULT NULL,
  `nhandienkhuonmat` varchar(255) DEFAULT NULL,
  `loaimanhinh` varchar(255) DEFAULT NULL,
  `kichthuoc` varchar(255) DEFAULT NULL,
  `canbangtrang` text,
  `ISO` varchar(255) DEFAULT NULL,
  `loaiongkinh` varchar(255) DEFAULT NULL,
  `tieucu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tsktma`
--

INSERT INTO `tsktma` (`ID`, `maSP`, `model`, `mausac`, `nhasanxuat`, `xuatxu`, `dophangiai`, `boxuly`, `tudonglaynet`, `nhandienkhuonmat`, `loaimanhinh`, `kichthuoc`, `canbangtrang`, `ISO`, `loaiongkinh`, `tieucu`) VALUES
(1, 24, 'Canon eos 750dc', 'Đen', 'Canon', 'Nhật Bản', '24.2 MP', 'DIGIC 6', 'Có', 'Có', 'TFT LCD', '3.2 inch', 'Auto / Daylight / Shade / Cloudy / Tungsten / White Fluorescent light / Flash / Custom', 'Auto / 100 tới 6400 (có thể mở rộng tới 25600)', 'Canon EF', '18 - 55 mm'),
(3, 26, '11', '21', '31', '41', '51', '61', '71', '71', '81', '91', '101', '111', '121', '131');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tsktmaa`
-- (See below for the actual view)
--
CREATE TABLE `tsktmaa` (
`tenSP` varchar(255)
,`ID` int(11)
,`maSP` int(11)
,`model` varchar(255)
,`mausac` varchar(255)
,`nhasanxuat` varchar(255)
,`xuatxu` varchar(255)
,`dophangiai` varchar(255)
,`boxuly` varchar(255)
,`tudonglaynet` varchar(255)
,`nhandienkhuonmat` varchar(255)
,`loaimanhinh` varchar(255)
,`kichthuoc` varchar(255)
,`canbangtrang` text
,`ISO` varchar(255)
,`loaiongkinh` varchar(255)
,`tieucu` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tsktmt`
-- (See below for the actual view)
--
CREATE TABLE `tsktmt` (
`tenSP` varchar(255)
,`maSP` int(11)
,`kichthuoc` varchar(255)
,`dophangiai` varchar(255)
,`congnghe` varchar(255)
,`camung` varchar(255)
,`tencpu` varchar(255)
,`loaicpu` varchar(255)
,`tocdocpu` varchar(100)
,`tocdotoida` varchar(100)
,`congkn` varchar(255)
,`bluetooth` varchar(255)
,`odia` varchar(255)
,`webcam` varchar(255)
,`ram` varchar(255)
,`tocdoram` varchar(255)
,`loairam` varchar(100)
,`ocung` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `tskt_cpu`
--

CREATE TABLE `tskt_cpu` (
  `ID` int(11) NOT NULL,
  `maSP` int(11) DEFAULT NULL,
  `tencpu` varchar(255) DEFAULT NULL,
  `loaicpu` varchar(255) DEFAULT NULL,
  `tocdocpu` varchar(100) DEFAULT NULL,
  `tocdotoida` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tskt_cpu`
--

INSERT INTO `tskt_cpu` (`ID`, `maSP`, `tencpu`, `loaicpu`, `tocdocpu`, `tocdotoida`) VALUES
(1, 3, 'Intel Core i3', '7020U', '2.30 GHz', '2.30 GHz'),
(2, 4, 'Intel Core i5', '5000U', '2.40 GHz', '2.40 GHz'),
(3, 10, 'Intel Celeron', 'N3060', '1.60 GHz', '1.60 GHz'),
(4, 13, 'Intel Core i7', '8005U', '2.4 GHz', '2.4 GHz'),
(5, 5, 'Intel Core i3', '8130U', '2.20 GHz', '3.40 GHz'),
(6, 6, 'Intel Core i3', '5005U', '2.20 GHz', '2.40 GHz'),
(7, 7, 'AMD Ryzen', '5000', '2.40 GHz', '3.40 GHz'),
(8, 8, 'Intel Core i5', '5005U', '2.20 GHz', '2.40 GHz'),
(9, 9, 'Intel Core i7', '5005U', '2.20 GHz', '2.40 GHz'),
(10, 11, 'Intel Core i3', '7100U', '2.20 GHz', '2.40 GHz'),
(11, 12, 'Intel Core i5', '7100U', '2.40 GHz', '2.40 GHz'),
(12, 14, 'Intel Core i3', '7100U', '2.20 GHz', '2.40 GHz'),
(13, 12, 'Intel Core i5', '7100U', '2.40 GHz', '2.40 GHz'),
(14, 15, 'Intel Core i3', '7100U', '2.20 GHz', '2.40 GHz'),
(15, 12, 'Intel Core i5', '7100U', '2.40 GHz', '2.40 GHz'),
(16, 16, 'Intel Core i3', '7100U', '2.20 GHz', '2.40 GHz'),
(17, 12, 'Intel Core i5', '7100U', '2.40 GHz', '2.40 GHz'),
(18, 17, 'Intel Core i3', '7100U', '2.20 GHz', '2.40 GHz'),
(19, 12, 'Intel Core i5', '7100U', '2.40 GHz', '2.40 GHz'),
(20, 18, 'Intel Core i3', '7100U', '2.20 GHz', 'tocdotoidacpu'),
(21, 12, 'Intel Core i5', '7100U', '2.40 GHz', '2.40 GHz'),
(22, 19, 'Intel Core i3', '7100U', '2.20 GHz', '2.40 GHz'),
(23, 12, 'Intel Core i5', '7100U', '2.40 GHz', '2.40 GHz'),
(24, 20, 'Intel Core i3', '7100U', '2.20 GHz', '2.40 GHz'),
(25, 12, 'Intel Core i5', '7100U', '2.40 GHz', '2.40 GHz'),
(26, 21, 'Intel Core i3', '7100U', '2.20 GHz', '2.40 GHz'),
(27, 12, 'Intel Core i5', '7100U', '2.40 GHz', '2.40 GHz'),
(28, 22, 'Intel Core i3', '7100U', '2.20 GHz', '2.40 GHz'),
(29, 12, 'Intel Core i5', '7100U', '2.40 GHz', '2.40 GHz'),
(30, 23, '5gdg', '6gsg', '7sgs', 'tocdotoidacpu');

-- --------------------------------------------------------

--
-- Table structure for table `tskt_ketnoi`
--

CREATE TABLE `tskt_ketnoi` (
  `ID` int(11) NOT NULL,
  `maSP` int(11) DEFAULT NULL,
  `congkn` varchar(255) DEFAULT NULL,
  `bluetooth` varchar(255) DEFAULT NULL,
  `odia` varchar(255) DEFAULT NULL,
  `webcam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tskt_ketnoi`
--

INSERT INTO `tskt_ketnoi` (`ID`, `maSP`, `congkn`, `bluetooth`, `odia`, `webcam`) VALUES
(1, 3, '1 x HDMI™ 1.4a, 2 x USB 3.1 gen 1, 1 x USB 2.0', 'Bluetooth 4.0', 'Không', '2.0'),
(2, 4, '1 x HDMI™ 1.4a, 2 x USB 3.1 gen 1, 1 x USB 2.0', 'Không', 'Không', '3.0'),
(3, 10, '2 x USB 3.0', 'v4.0', 'Có', '3.0'),
(4, 13, '2 x USB 3.0', 'v4.0', 'Không', '2.0'),
(5, 11, '1 giắc cắm âm thanh COMBO; 1 x USB 2.0; 1 x LAN; 1 x HDMI; 2 x USB 3.0', 'v4.0', 'Không', '3.0'),
(6, 12, '2 x USB 2.0; 1 x LAN; 1 x HDMI', 'Bluetooth 4.0', 'Có', '3.0'),
(7, 14, '1 giắc cắm âm thanh COMBO; 1 x USB 2.0; 1 x LAN; 1 x HDMI; 2 x USB 3.0', 'v4.0', 'Không', '3.0'),
(8, 15, '2 x USB 2.0; 1 x LAN; 1 x HDMI', 'Bluetooth 4.0', 'Có', '3.0'),
(9, 16, '1 giắc cắm âm thanh COMBO; 1 x USB 2.0; 1 x LAN; 1 x HDMI; 2 x USB 3.0', 'v4.0', 'Không', '3.0'),
(10, 17, '2 x USB 2.0; 1 x LAN; 1 x HDMI', 'Bluetooth 4.0', 'Có', '3.0'),
(11, 18, '1 giắc cắm âm thanh COMBO; 1 x USB 2.0; 1 x LAN; 1 x HDMI; 2 x USB 3.0', 'v4.0', 'Có', '3.0'),
(12, 19, '2 x USB 2.0; 1 x LAN; 1 x HDMI', 'Bluetooth 4.0', 'Có', '3.0'),
(13, 20, '1 giắc cắm âm thanh COMBO; 1 x USB 2.0; 1 x LAN; 1 x HDMI; 2 x USB 3.0', 'v4.0', 'Không', '3.0'),
(14, 21, '2 x USB 2.0; 1 x LAN; 1 x HDMI', 'Bluetooth 4.0', 'Có', '3.0'),
(15, 22, '1 giắc cắm âm thanh COMBO; 1 x USB 2.0; 1 x LAN; 1 x HDMI; 2 x USB 3.0', 'v4.0', 'Không', '3.0'),
(16, 5, '2 x USB 3.1 Gen 1 Type-A ,1 x USB 2.0', 'v4.0', 'Không', '3.0'),
(17, 6, '2 x USB 2.0 Gen 1 Type-A ,1 x USB 3.0', 'v4.0', 'Có', '2.0'),
(18, 7, '2 x USB 3.1 Gen 1 Type-A ,1 x USB 2.0', 'v4.0', 'Không', '3.0'),
(19, 8, '2 x USB 2.0 Gen 1 Type-A ,1 x USB 3.0', 'v4.0', 'Có', '2.0'),
(20, 9, '2 x USB 3.1 Gen 1 Type-A ,1 x USB 2.0', 'v4.0', 'Không', '3.0'),
(21, 23, '9gsg', '10sgs', '11gsg', '12bbx');

-- --------------------------------------------------------

--
-- Table structure for table `tskt_manhinh`
--

CREATE TABLE `tskt_manhinh` (
  `ID` int(11) NOT NULL,
  `maSP` int(11) DEFAULT NULL,
  `kichthuoc` varchar(255) DEFAULT NULL,
  `dophangiai` varchar(255) DEFAULT NULL,
  `congnghe` varchar(255) DEFAULT NULL,
  `camung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tskt_manhinh`
--

INSERT INTO `tskt_manhinh` (`ID`, `maSP`, `kichthuoc`, `dophangiai`, `congnghe`, `camung`) VALUES
(1, 3, '15.6', '1366 x 768 Pixels', 'HD Anti-Glare LED-Backlit Display', 'Không'),
(2, 4, '15.6', 'FULL HD', 'HD Anti-Glare LED-Backlit Display', 'Không'),
(3, 10, '15.6', '1366 x 769 Pixels', 'Ultra Slim 200nits', 'Không'),
(4, 13, '14', '1366 x 769 Pixels', 'Ultra HD', 'Không'),
(5, 5, '13.3', '1920 x 1080 Pixels', 'Anti -glare LED-Backlit Display', 'Không'),
(6, 6, '14', '1920 x 1080 Pixels', 'Anti -glare LED-Backlit Display', 'Không'),
(7, 7, '15.6', '1920 x 1080 Pixels', 'Anti -glare LED-Backlit Display', 'Không'),
(8, 8, '13', '1920 x 1080 Pixels', 'Anti -glare LED-Backlit Display', 'Không'),
(9, 9, '13.3', '1920 x 1080 Pixels', 'Anti -glare LED-Backlit Display', 'Không'),
(10, 11, '15.6', '1920 x 1080 Pixels', 'FHD IPS Non-Glare LED Backlit', 'Không'),
(11, 12, '15.6', '1366 x 780 Pixels', 'HD', 'Không'),
(12, 14, '15.6', '1920 x 1080 Pixels', 'FHD IPS Non-Glare LED Backlit', 'Không'),
(13, 15, '14', '1366 x 780 Pixels', 'HD', 'Không'),
(14, 17, '15.6', '1920 x 1080 Pixels', 'FHD IPS Non-Glare LED Backlit', 'Không'),
(15, 16, '15.6', '1366 x 780 Pixels', 'HD', 'Không'),
(16, 18, '15.6', '1920 x 1080 Pixels', 'FHD IPS Non-Glare LED Backlit', 'Không'),
(17, 19, '15.6', '1366 x 780 Pixels', 'HD', 'Không'),
(18, 20, '15.6', '1920 x 1080 Pixels', 'FHD IPS Non-Glare LED Backlit', 'Không'),
(19, 21, '15.6', '1366 x 780 Pixels', 'HD', 'Không'),
(20, 22, '15.6', '1920 x 1080 Pixels', 'FHD IPS Non-Glare LED Backlit', 'Không'),
(21, 23, '1111', '222', '3424', '45edg');

-- --------------------------------------------------------

--
-- Table structure for table `tskt_ramoc`
--

CREATE TABLE `tskt_ramoc` (
  `ID` int(11) NOT NULL,
  `maSP` int(11) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `tocdoram` varchar(255) DEFAULT NULL,
  `loairam` varchar(100) DEFAULT NULL,
  `ocung` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tskt_ramoc`
--

INSERT INTO `tskt_ramoc` (`ID`, `maSP`, `ram`, `tocdoram`, `loairam`, `ocung`) VALUES
(1, 3, '4', '2133', 'DDR4', 'HDD 1TB'),
(2, 4, '4', '2133', 'DDR4', 'HDD 500GB'),
(3, 10, '4', '1600', 'DDR3', 'HDD 500 GB'),
(4, 13, '8', '2133', 'DDR4', 'HDD 1 TB'),
(5, 5, '4', '2400', 'DDR4', 'HDD: 1 TB SATA3, Hỗ trợ khe SSD M2 PCIe'),
(6, 6, '4', '2133', 'DDR3', 'HDD 500GB'),
(7, 7, '4', '2400', 'DDR4', 'HDD: 1 TB SATA3, Hỗ trợ khe SSD M2 PCIe'),
(8, 8, '4', '2133', 'DDR3', 'HDD 500GB'),
(9, 9, '4', '2400', 'DDR4', 'HDD: 1 TB SATA3, Hỗ trợ khe SSD M2 PCIe'),
(10, 11, '4', '1600', 'DDR2', 'HDD 512GB'),
(11, 12, '4', '2400', 'DDR4', 'HDD: 1 TB SATA3'),
(12, 14, '4', '1600', 'DDR2', 'HDD 512GB'),
(13, 15, '4', '2400', 'DDR4', 'HDD: 1 TB SATA3'),
(14, 16, '4', '1600', 'DDR2', 'HDD 512GB'),
(15, 17, '4', '2400', 'DDR4', 'HDD: 1 TB SATA3'),
(16, 18, '4', '1600', 'DDR2', 'HDD 512GB'),
(17, 19, '4', '2400', 'DDR4', 'HDD: 1 TB SATA3'),
(18, 21, '4', '1600', 'DDR2', 'HDD 512GB'),
(19, 20, '4', '2400', 'DDR4', 'HDD: 1 TB SATA3'),
(20, 22, '4', '1600', 'DDR2', 'HDD 512GB'),
(21, 23, '13xx', '15sbs', '14xbx', '16xbxb');

-- --------------------------------------------------------

--
-- Structure for view `capnhatma`
--
DROP TABLE IF EXISTS `capnhatma`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `capnhatma`  AS  select `ctma`.`machitietMA` AS `machitietMA`,`sp`.`maSP` AS `maSP`,`sp`.`tenSP` AS `tenSP`,`sp`.`hinhanh` AS `hinhanh`,`sp`.`maNCC` AS `maNCC`,`sp`.`maloai` AS `maloai`,`sp`.`trangthai` AS `trangthai`,`sp`.`giagoc` AS `giagoc`,`sp`.`gia` AS `gia`,`sp`.`km` AS `km`,`sp`.`ghichu` AS `ghichu`,`ctma`.`dophangia` AS `dophangia`,`ctma`.`bocambien` AS `bocambien`,`ctma`.`manhinh` AS `manhinh`,`sp`.`hinhanh_2` AS `hinhanh_2`,`sp`.`hinhanh_3` AS `hinhanh_3`,`sp`.`hinhanh_4` AS `hinhanh_4`,`sp`.`anh_5` AS `anh_5` from (`sanpham` `sp` join `chitietma` `ctma`) where (`sp`.`maSP` = `ctma`.`maSP`) ;

-- --------------------------------------------------------

--
-- Structure for view `capnhatmt`
--
DROP TABLE IF EXISTS `capnhatmt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `capnhatmt`  AS  select `ctmt`.`machitietSP` AS `machitietSP`,`sp`.`maSP` AS `maSP`,`sp`.`tenSP` AS `tenSP`,`sp`.`hinhanh` AS `hinhanh`,`sp`.`maNCC` AS `maNCC`,`sp`.`maloai` AS `maloai`,`sp`.`trangthai` AS `trangthai`,`sp`.`giagoc` AS `giagoc`,`sp`.`gia` AS `gia`,`sp`.`km` AS `km`,`sp`.`ghichu` AS `ghichu`,`ctmt`.`manhinh` AS `manhinh`,`ctmt`.`CPU` AS `cpu`,`ctmt`.`RAM` AS `ram`,`sp`.`hinhanh_2` AS `hinhanh_2`,`sp`.`hinhanh_3` AS `hinhanh_3`,`sp`.`hinhanh_4` AS `hinhanh_4`,`sp`.`anh_5` AS `anh_5` from (`sanpham` `sp` join `chitietmt` `ctmt`) where (`sp`.`maSP` = `ctmt`.`maSP`) ;

-- --------------------------------------------------------

--
-- Structure for view `ddmayanh`
--
DROP TABLE IF EXISTS `ddmayanh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ddmayanh`  AS  select distinct `ddma`.`maDDNBMA` AS `maDDNBMA`,`sp`.`maSP` AS `maSP`,`sp`.`tenSP` AS `tenSP`,`ddma`.`anh_1` AS `anh_1`,`ddma`.`anh_2` AS `anh_2`,`ddma`.`anh_3` AS `anh_3`,`ddma`.`anh_4` AS `anh_4`,`ddma`.`thietke` AS `thietke`,`ddma`.`chupanh` AS `chupanh`,`ddma`.`cambien` AS `cambien`,`ddma`.`ongkinh` AS `ongkinh` from (`sanpham` `sp` join `dacdiemma` `ddma`) where (`sp`.`maSP` = `ddma`.`maSP`) ;

-- --------------------------------------------------------

--
-- Structure for view `ddmaytinh`
--
DROP TABLE IF EXISTS `ddmaytinh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ddmaytinh`  AS  select `ddmt`.`maDDNBMT` AS `maDDNBMT`,`sp`.`maSP` AS `maSP`,`sp`.`tenSP` AS `tenSP`,`ddmt`.`anh_1` AS `anh_1`,`ddmt`.`anh_2` AS `anh_2`,`ddmt`.`anh_3` AS `anh_3`,`ddmt`.`anh_4` AS `anh_4`,`ddmt`.`thietke` AS `thietke`,`ddmt`.`manhinh` AS `manhinh`,`ddmt`.`cauhinh` AS `cauhinh`,`ddmt`.`baomat` AS `baomat` from (`sanpham` `sp` join `dacdiemmt` `ddmt`) where (`sp`.`maSP` = `ddmt`.`maSP`) ;

-- --------------------------------------------------------

--
-- Structure for view `tsktmaa`
--
DROP TABLE IF EXISTS `tsktmaa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tsktmaa`  AS  select `sp`.`tenSP` AS `tenSP`,`tsktma`.`ID` AS `ID`,`sp`.`maSP` AS `maSP`,`tsktma`.`model` AS `model`,`tsktma`.`mausac` AS `mausac`,`tsktma`.`nhasanxuat` AS `nhasanxuat`,`tsktma`.`xuatxu` AS `xuatxu`,`tsktma`.`dophangiai` AS `dophangiai`,`tsktma`.`boxuly` AS `boxuly`,`tsktma`.`tudonglaynet` AS `tudonglaynet`,`tsktma`.`nhandienkhuonmat` AS `nhandienkhuonmat`,`tsktma`.`loaimanhinh` AS `loaimanhinh`,`tsktma`.`kichthuoc` AS `kichthuoc`,`tsktma`.`canbangtrang` AS `canbangtrang`,`tsktma`.`ISO` AS `ISO`,`tsktma`.`loaiongkinh` AS `loaiongkinh`,`tsktma`.`tieucu` AS `tieucu` from (`sanpham` `sp` join `tsktma`) where (`sp`.`maSP` = `tsktma`.`maSP`) ;

-- --------------------------------------------------------

--
-- Structure for view `tsktmt`
--
DROP TABLE IF EXISTS `tsktmt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tsktmt`  AS  select distinct `sp`.`tenSP` AS `tenSP`,`sp`.`maSP` AS `maSP`,`mh`.`kichthuoc` AS `kichthuoc`,`mh`.`dophangiai` AS `dophangiai`,`mh`.`congnghe` AS `congnghe`,`mh`.`camung` AS `camung`,`cpu`.`tencpu` AS `tencpu`,`cpu`.`loaicpu` AS `loaicpu`,`cpu`.`tocdocpu` AS `tocdocpu`,`cpu`.`tocdotoida` AS `tocdotoida`,`kn`.`congkn` AS `congkn`,`kn`.`bluetooth` AS `bluetooth`,`kn`.`odia` AS `odia`,`kn`.`webcam` AS `webcam`,`ram`.`ram` AS `ram`,`ram`.`tocdoram` AS `tocdoram`,`ram`.`loairam` AS `loairam`,`ram`.`ocung` AS `ocung` from ((((`sanpham` `sp` join `tskt_manhinh` `mh`) join `tskt_cpu` `cpu`) join `tskt_ketnoi` `kn`) join `tskt_ramoc` `ram`) where ((`sp`.`maSP` = `mh`.`maSP`) and (`mh`.`maSP` = `cpu`.`maSP`) and (`cpu`.`maSP` = `kn`.`maSP`) and (`kn`.`maSP` = `ram`.`maSP`)) order by `sp`.`maSP` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD PRIMARY KEY (`machitietHD`),
  ADD KEY `maHD` (`maHD`),
  ADD KEY `maSP` (`maSP`);

--
-- Indexes for table `chitietma`
--
ALTER TABLE `chitietma`
  ADD PRIMARY KEY (`machitietMA`),
  ADD KEY `maSP` (`maSP`);

--
-- Indexes for table `chitietmt`
--
ALTER TABLE `chitietmt`
  ADD PRIMARY KEY (`machitietSP`),
  ADD KEY `maSP` (`maSP`);

--
-- Indexes for table `dacdiemma`
--
ALTER TABLE `dacdiemma`
  ADD PRIMARY KEY (`maDDNBMA`),
  ADD KEY `maSP` (`maSP`);

--
-- Indexes for table `dacdiemmt`
--
ALTER TABLE `dacdiemmt`
  ADD PRIMARY KEY (`maDDNBMT`),
  ADD KEY `maSP` (`maSP`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`maDM`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHD`),
  ADD KEY `maND` (`maND`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`maLH`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`maloai`),
  ADD UNIQUE KEY `tenloai` (`tenloai`);

--
-- Indexes for table `ncc`
--
ALTER TABLE `ncc`
  ADD PRIMARY KEY (`maNCC`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`maND`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD KEY `maDM` (`maDM`),
  ADD KEY `maNCC` (`maNCC`),
  ADD KEY `maloai` (`maloai`);

--
-- Indexes for table `tsktma`
--
ALTER TABLE `tsktma`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `maSP` (`maSP`);

--
-- Indexes for table `tskt_cpu`
--
ALTER TABLE `tskt_cpu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `maSP` (`maSP`);

--
-- Indexes for table `tskt_ketnoi`
--
ALTER TABLE `tskt_ketnoi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `maSP` (`maSP`);

--
-- Indexes for table `tskt_manhinh`
--
ALTER TABLE `tskt_manhinh`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `maSP` (`maSP`);

--
-- Indexes for table `tskt_ramoc`
--
ALTER TABLE `tskt_ramoc`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `maSP` (`maSP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiethd`
--
ALTER TABLE `chitiethd`
  MODIFY `machitietHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chitietma`
--
ALTER TABLE `chitietma`
  MODIFY `machitietMA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chitietmt`
--
ALTER TABLE `chitietmt`
  MODIFY `machitietSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dacdiemma`
--
ALTER TABLE `dacdiemma`
  MODIFY `maDDNBMA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dacdiemmt`
--
ALTER TABLE `dacdiemmt`
  MODIFY `maDDNBMT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `maDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `maLH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ncc`
--
ALTER TABLE `ncc`
  MODIFY `maNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `maND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tsktma`
--
ALTER TABLE `tsktma`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tskt_cpu`
--
ALTER TABLE `tskt_cpu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tskt_ketnoi`
--
ALTER TABLE `tskt_ketnoi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tskt_manhinh`
--
ALTER TABLE `tskt_manhinh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tskt_ramoc`
--
ALTER TABLE `tskt_ramoc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `chitiethd_ibfk_1` FOREIGN KEY (`maHD`) REFERENCES `hoadon` (`maHD`),
  ADD CONSTRAINT `chitiethd_ibfk_2` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);

--
-- Constraints for table `chitietma`
--
ALTER TABLE `chitietma`
  ADD CONSTRAINT `chitietma_ibfk_1` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);

--
-- Constraints for table `chitietmt`
--
ALTER TABLE `chitietmt`
  ADD CONSTRAINT `chitietmt_ibfk_1` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);

--
-- Constraints for table `dacdiemma`
--
ALTER TABLE `dacdiemma`
  ADD CONSTRAINT `dacdiemma_ibfk_1` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);

--
-- Constraints for table `dacdiemmt`
--
ALTER TABLE `dacdiemmt`
  ADD CONSTRAINT `dacdiemmt_ibfk_1` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`maND`) REFERENCES `nguoidung` (`maND`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maDM`) REFERENCES `danhmuc` (`maDM`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`maNCC`) REFERENCES `ncc` (`maNCC`),
  ADD CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`maloai`) REFERENCES `loaisp` (`maloai`);

--
-- Constraints for table `tsktma`
--
ALTER TABLE `tsktma`
  ADD CONSTRAINT `tsktma_ibfk_1` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);

--
-- Constraints for table `tskt_cpu`
--
ALTER TABLE `tskt_cpu`
  ADD CONSTRAINT `tskt_cpu_ibfk_1` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);

--
-- Constraints for table `tskt_ketnoi`
--
ALTER TABLE `tskt_ketnoi`
  ADD CONSTRAINT `tskt_ketnoi_ibfk_1` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);

--
-- Constraints for table `tskt_manhinh`
--
ALTER TABLE `tskt_manhinh`
  ADD CONSTRAINT `tskt_manhinh_ibfk_1` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);

--
-- Constraints for table `tskt_ramoc`
--
ALTER TABLE `tskt_ramoc`
  ADD CONSTRAINT `tskt_ramoc_ibfk_1` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
