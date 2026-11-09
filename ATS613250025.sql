CREATE DATABASE IF NOT EXISTS ATS613250025;
USE ATS613250025;

-- 1. Tabel member_001
CREATE TABLE IF NOT EXISTS member_001 (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(34) NOT NULL,
    password VARCHAR(32) NOT NULL,
    nama VARCHAR(50) NOT NULL,
    aktive ENUM('1', '0') DEFAULT '1'
);

-- Insert User Demo (Password: admin123 -> MD5: 0192023a7bbd73250516f069df18b500)
INSERT INTO member_001 (email, password, nama, aktive) VALUES 
('admin@gmail.com', MD5('admin123'), 'Nama Anda', '1');

-- 2. Tabel mobil_001
CREATE TABLE IF NOT EXISTS mobil_001 (
    no_id INT(10) AUTO_INCREMENT PRIMARY KEY,
    nomor_kendaraan VARCHAR(12) NOT NULL,
    jenis_kendaraan ENUM('Sedan', 'Pickup', 'Truk', 'Bemo') NOT NULL,
    pemilik VARCHAR(50) NOT NULL,
    tahun_pembuatan CHAR(4) NOT NULL
);

-- Insert minimal 3 Data (Nama Anda, Teman Kiri, Teman Kanan)
INSERT INTO mobil_001 (nomor_kendaraan, jenis_kendaraan, pemilik, tahun_pembuatan) VALUES 
('D 1234 ABC', 'Sedan', 'Nama Lengkap Anda', '2022'),
('B 5678 XYZ', 'Pickup', 'Teman Sebelah Kiri', '2020'),
('F 9101 EFG', 'Truk', 'Teman Sebelah Kanan', '2021');