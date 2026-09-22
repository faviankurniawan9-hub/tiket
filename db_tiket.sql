CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(100)
);
INSERT INTO users (username, password)
VALUES ('admin', '12345');
CREATE TABLE tiket (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_tiket VARCHAR(100),
    harga INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO tiket (nama_tiket, harga)
VALUES
('Tiket A', 5000),
('Tiket B', 10000),
('Tiket C', 15000);
CREATE TABLE penjualan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pembeli VARCHAR(100),
    tiket_id INT,
    harga INT,
    jumlah INT,
    total INT,
    bayar INT,
    kembalian INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);