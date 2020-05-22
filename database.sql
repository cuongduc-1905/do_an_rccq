CREATE DATABASE `rcq` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use ban_rau;
CREATE TABLE IF NOT EXISTS `banner` (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  link_href VARCHAR(255) NOT NULL COMMENT 'Link liên kêt tới bài viets quản cáo',
  link_image VARCHAR(255) NOT NULL,
  status tinyint(1) DEFAULT '1' COMMENT '1 là hiển thị, 0 là ẩn',
  ordering INT DEFAULT '0'
) ENGINE = InnoDB;

-- bảng loại rau
CREATE TABLE IF NOT EXISTS `category` (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL UNIQUE,
  parent_id INT NOT NULL DEFAULT '0' COMMENT '0 là danh mục cha',
  status tinyint(1) DEFAULT '1' COMMENT '1 là hiển thị, 0 là ẩn'
) ENGINE = InnoDB;




-- bảng sản phẩm rau
CREATE TABLE IF NOT EXISTS `product` (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(200) NOT NULL,
  image VARCHAR(200) NOT NULL,
  image_list text NULL,
  price float NOT NULL,
  sale_price float NOT NULL,
  category_id int NOT NULL,
  status tinyint(1) DEFAULT '1' COMMENT '1 là hiển thị, 0 là ẩn',
  created_date timestamp DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE = InnoDB;




-- bảng loại rau
CREATE TABLE IF NOT EXISTS `customer` (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  phone VARCHAR(100) NOT NULL,
  address VARCHAR(200) NOT NULL,
  password VARCHAR(100) NOT NULL,
  type tinyint DEFAULT '0' COMMENT '0 la trung bình, 1 quen, 2 VIP',
  status tinyint(1) DEFAULT '1' COMMENT '1 là hoạt động, 0 là ẩn'
) ENGINE = InnoDB;

-- bảng loại rau
CREATE TABLE IF NOT EXISTS `orders` (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  customer_id VARCHAR(100) NULL,
  email VARCHAR(100) NULL,
  phone VARCHAR(100) NULL,
  address VARCHAR(200) NULL,
  created_date timestamp DEFAULT CURRENT_TIMESTAMP,
  status tinyint(1) DEFAULT '1' COMMENT '0 mới đặt, 1 đã giao hàng'
) ENGINE = InnoDB;

-- bảng loại rau
CREATE TABLE IF NOT EXISTS `order_detail` (
  order_id int NOT NULL,
  pro_id int NOT NULL,
  quantity int NOT NULL,
  price float NOT NULL,
  promotion float NOT NULL,
  PRIMARY KEY (pro_id, order_id),
  FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  FOREIGN KEY (`pro_id`) REFERENCES `product` (`id`)
) ENGINE = InnoDB;

-- bảng loại rau
CREATE TABLE IF NOT EXISTS `admin` (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(100) NOT NULL
) ENGINE = InnoDB;
-- thêm 

-- bảng sản phẩm rau
-- bảng loại rau
CREATE TABLE IF NOT EXISTS `ward` (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL UNIQUE
) ENGINE = InnoDB;

-- bảng loại rau
CREATE TABLE IF NOT EXISTS `comment` (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  customer_id int NOT NULL,
  pro_id int NOT NULL,
  content int NOT NULL,
  created_date timestamp DEFAULT CURRENT_TIMESTAMP,
  status tinyint(1) DEFAULT '0'
) ENGINE = InnoDB;
