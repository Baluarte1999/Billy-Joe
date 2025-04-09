CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE contact_messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255),
  message TEXT
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  total DECIMAL(10, 2),
  shipping_address TEXT,
  status VARCHAR(255) DEFAULT 'Processing',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT,
  product_id INT,
  quantity INT,
  price DECIMAL(10, 2),
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE user_activity (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  activity VARCHAR(255),
  timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  stock INT DEFAULT 0,
  image_url VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, price, stock, image_url) VALUES
('Gaming Laptop', 'High-performance laptop with an Intel i7 processor, 16GB RAM, and NVIDIA GTX 1660 Ti graphics card. Perfect for gaming and heavy workloads.', 1200.00, 50, 'images/gaming_laptop.jpg'),
('Wireless Mouse', 'Ergonomic wireless mouse with adjustable DPI settings, perfect for both work and gaming.', 30.00, 150, 'images/wireless_mouse.jpg'),
('Mechanical Keyboard', 'RGB backlit mechanical keyboard with customizable keys and tactile switches. Great for gamers and typists.', 85.00, 100, 'images/mechanical_keyboard.jpg'),
('27-inch 4K Monitor', 'A 27-inch UHD monitor with IPS technology and a 144Hz refresh rate, ideal for gaming and content creation.', 350.00, 30, 'images/27_inch_monitor.jpg'),
('Solid State Drive (SSD) 1TB', '1TB solid-state drive with SATA III interface for fast data transfer speeds and improved system performance.', 100.00, 200, 'images/ssd_1tb.jpg'),
('Wireless Headphones', 'Noise-cancelling wireless headphones with Bluetooth connectivity and up to 20 hours of battery life.', 120.00, 75, 'images/wireless_headphones.jpg'),
('Gaming Desktop PC', 'Custom-built desktop with Intel i9 processor, 32GB RAM, 1TB SSD, and NVIDIA RTX 3080 graphics card. Ready for high-end gaming and productivity.', 2500.00, 20, 'images/gaming_pc.jpg'),
('Laptop Cooling Pad', 'Cooling pad for laptops up to 17 inches, with adjustable fan speeds to prevent overheating.', 35.00, 120, 'images/laptop_cooling_pad.jpg');
