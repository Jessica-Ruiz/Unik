CREATE DATABASE IF NOT EXISTS unik CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE unik;

CREATE TABLE IF NOT EXISTS users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('buyer','provider','admin') NOT NULL DEFAULT 'buyer',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS products (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  description TEXT,
  category VARCHAR(60) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  stock INT NOT NULL DEFAULT 0,
  active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS orders (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  total DECIMAL(10,2) NOT NULL,
  status VARCHAR(40) NOT NULL DEFAULT 'Recibido',
  shipping_address VARCHAR(255) NOT NULL,
  payment_method VARCHAR(60) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_orders_user FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS order_items (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  order_id INT UNSIGNED NOT NULL,
  product_id INT UNSIGNED NOT NULL,
  quantity INT NOT NULL,
  unit_price DECIMAL(10,2) NOT NULL,
  CONSTRAINT fk_items_order FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
  CONSTRAINT fk_items_product FOREIGN KEY (product_id) REFERENCES products(id)
) ENGINE=InnoDB;

INSERT INTO products (name,description,category,price,stock) VALUES
('Camiseta personalizada','Camiseta para expresar tus ideas con diseños propios.','Camisas',30000,25),
('Gorra urbana','Gorra ajustable que puedes personalizar a tu estilo.','Gorras',70000,18),
('Taza creativa','Taza personalizada para acompañar tus mejores momentos.','Tazas',40000,30),
('Buso esencial','Buso cómodo para crear un diseño que te represente.','Busos',70000,12),
('Bolso tote','Accesorio práctico con espacio para tu creatividad.','Accesorios',50000,20),
('Stickers únicos','Set de stickers para darle personalidad a tus objetos.','Stickers',15000,50);
