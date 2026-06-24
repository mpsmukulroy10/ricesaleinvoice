-- মেসার্স সাহা ট্রেডার্স - ডেটাবেস সেটআপ
CREATE DATABASE IF NOT EXISTS saha_traders CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE saha_traders;

-- People Table
CREATE TABLE IF NOT EXISTS people (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address TEXT,
    mobile VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Items Table
CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    default_rate DECIMAL(10,2) DEFAULT 0,
    unit VARCHAR(50) DEFAULT 'পিস',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Invoices Table
CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    person_id INT,
    invoice_date DATE NOT NULL,
    subtotal DECIMAL(12,2) DEFAULT 0,
    previous_balance DECIMAL(12,2) DEFAULT 0,
    total_due DECIMAL(12,2) DEFAULT 0,
    driver_name VARCHAR(100),
    vehicle_number VARCHAR(50),
    driver_mobile VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (person_id) REFERENCES people(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Invoice Items Table
CREATE TABLE IF NOT EXISTS invoice_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT NOT NULL,
    item_id INT,
    item_name VARCHAR(255),
    quantity DECIMAL(10,2) DEFAULT 0,
    rate DECIMAL(10,2) DEFAULT 0,
    total DECIMAL(12,2) DEFAULT 0,
    FOREIGN KEY (invoice_id) REFERENCES invoices(id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample Data
INSERT INTO people (name, address, mobile) VALUES
('সনজিৎ রাইস এজেন্সি', 'নীলফামারী', '01700000001'),
('করিম ট্রেডার্স', 'রংপুর', '01700000002');

INSERT INTO items (name, default_rate, unit) VALUES
('মায়া মিনিকেট চাউল ২৫ কেজি', 1485, 'বস্তা'),
('নতুন মিনিকেট চাউল ২৫ কেজি', 1485, 'বস্তা'),
('নতুন মায়া ২৮ চাউল ২৫ কেজি', 1310, 'বস্তা');
