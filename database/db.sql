-- Create database
CREATE DATABASE IF NOT EXISTS nursery;

-- Use the database
USE nursery;

-- Table for user details (signup and login combined)
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    state VARCHAR(100) NOT NULL,
    postal_code VARCHAR(20) NOT NULL,
    last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for admin details
CREATE TABLE IF NOT EXISTS admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    admin_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for student orders
CREATE TABLE IF NOT EXISTS orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    payment_method ENUM('Cash on Delivery', 'Online Payment') NOT NULL,
    order_status ENUM('Pending', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending',
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    delivery_address VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Insert dummy data for users
INSERT INTO users (first_name, last_name, email, password, phone, address, city, state, postal_code)
VALUES 
('John', 'Doe', 'john.doe@example.com', SHA2('password123', 256), '1234567890', '123 Main St', 'Cityville', 'Stateville', '12345');

-- Insert dummy data for admin
INSERT INTO admin (admin_name, email, password, phone)
VALUES 
('Admin User', 'admin@example.com', SHA2('adminpassword', 256), '9876543210');

-- Insert dummy order
INSERT INTO orders (user_id, product_name, quantity, price, total_amount, payment_method, delivery_address)
VALUES 
(1, 'Apple Tree', 2, 150.00, 300.00, 'Cash on Delivery', '123 Main St, Cityville, Stateville, 12345');
