
-- Database: eventify_db
CREATE DATABASE IF NOT EXISTS eventify_db;
USE eventify_db;

-- Table: users
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, password, role) VALUES
('Admin Eventify', 'admin@eventify.com', '$2y$10$z4GdkflPmyL2d2o9qQO16u4j8ZC0yO2KjYI1AgZJt8Fe0RQcRZf7C', 'admin'),
('Gita Sipayung', 'gita@gmail.com', '$2y$10$6bFw7w9Y6Y7QHQ.8Ch7xeuYo4q8YqHkwh/YOvAg3dXYm2z6uFfK6W', 'user'),
('Rizky Pratama', 'rizky@gmail.com', '$2y$10$6bFw7w9Y6Y7QHQ.8Ch7xeuYo4q8YqHkwh/YOvAg3dXYm2z6uFfK6W', 'user'),
('Luna Maharani', 'luna@gmail.com', '$2y$10$6bFw7w9Y6Y7QHQ.8Ch7xeuYo4q8YqHkwh/YOvAg3dXYm2z6uFfK6W', 'user'),
('Dimas Nugraha', 'dimas@gmail.com', '$2y$10$6bFw7w9Y6Y7QHQ.8Ch7xeuYo4q8YqHkwh/YOvAg3dXYm2z6uFfK6W', 'user');

-- Table: events
CREATE TABLE events (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100) NOT NULL,
    event_date DATE NOT NULL,
    price INT(11) NOT NULL,
    image VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT(11),
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
);

INSERT INTO events (title, description, location, event_date, price, image, created_by) VALUES
('Seminar Teknologi 2025', 'Seminar membahas perkembangan AI dan IoT di dunia modern.', 'Aula UPN', '2025-11-10', 25000, 'seminar.jpg', 1),
('Festival Musik Kampus', 'Acara musik tahunan dengan berbagai band kampus ternama.', 'Lapangan Merdeka', '2025-12-05', 50000, 'musicfest.jpg', 1),
('Workshop Desain UI/UX', 'Pelatihan dasar desain aplikasi dan web bagi pemula.', 'Lab Multimedia', '2025-11-20', 30000, 'uiux.jpg', 1),
('Pentas Seni Mahasiswa', 'Pertunjukan seni dan teater karya mahasiswa FISIP.', 'Gedung Serbaguna', '2025-12-15', 20000, 'pentas.jpg', 1),
('Kompetisi Esports 2025', 'Turnamen Mobile Legends dan Valorant tingkat kampus.', 'Auditorium UPN', '2025-12-25', 40000, 'esports.jpg', 1);

-- Table: tickets
CREATE TABLE tickets (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11),
    event_id INT(11),
    quantity INT(3) NOT NULL,
    total_price INT(11) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);

INSERT INTO tickets (user_id, event_id, quantity, total_price) VALUES
(2, 1, 2, 50000),
(3, 2, 1, 50000),
(4, 3, 3, 90000),
(5, 4, 1, 20000),
(2, 5, 2, 80000);

-- Table: contacts
CREATE TABLE contacts (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO contacts (name, email, message) VALUES
('Gita Sipayung', 'gita@gmail.com', 'Halo, apakah tiket seminar masih tersedia?'),
('Rizky Pratama', 'rizky@gmail.com', 'Bagaimana cara cetak ulang tiket yang sudah dibeli?'),
('Luna Maharani', 'luna@gmail.com', 'Saya ingin menjadi panitia Eventify tahun depan.'),
('Dimas Nugraha', 'dimas@gmail.com', 'Apakah pembayaran bisa dilakukan via e-wallet?'),
('Ocha Lestari', 'ocha@gmail.com', 'Mohon info detail untuk acara Workshop UI/UX.');







