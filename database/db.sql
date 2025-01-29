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
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY, -- Auto increment for the order ID
    username VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    payment_method ENUM('cash_on_delivery', 'credit_card', 'debit_card', 'paypal') DEFAULT 'cash_on_delivery',
    order_status ENUM('pending', 'completed', 'shipped', 'cancelled') DEFAULT 'pending',
    order_date DATE DEFAULT CURRENT_DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Stores the time when the order was placed
    items TEXT NOT NULL, -- A column to store the items in the order, could be a JSON or a serialized string
    quantity INT NOT NULL, -- Quantity of the items ordered
    price DECIMAL(10, 2) NOT NULL -- Price of the order, with 2 decimal places for cents
);

INSERT INTO orders (username, address, payment_method, order_status, order_date)
VALUES 
('John Doe', '123 Main St, Springfield', 'credit_card', 'pending', CURRENT_DATE),
('Jane Smith', '456 Elm St, Springfield', 'cash_on_delivery', 'completed', CURRENT_DATE),
('Alice Johnson', '789 Oak St, Springfield', 'paypal', 'shipped', CURRENT_DATE);


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
