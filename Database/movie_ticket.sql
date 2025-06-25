-- Step 1: Database Create karo
CREATE DATABASE IF NOT EXISTS movie_ticket_booking;
USE movie_ticket_booking;

-- Step 2: Users Table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Step 3: Movies Table
CREATE TABLE movies (
    movie_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    duration_min INT,
    genre VARCHAR(50),
    language VARCHAR(50),
    release_date DATE
);

-- Step 4: Theaters Table
CREATE TABLE theaters (
    theater_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(50),
    address TEXT
);

-- Step 5: Screens Table
CREATE TABLE screens (
    screen_id INT AUTO_INCREMENT PRIMARY KEY,
    theater_id INT,
    name VARCHAR(50),
    total_seats INT,
    FOREIGN KEY (theater_id) REFERENCES theaters(theater_id)
);

-- Step 6: Seats Table
CREATE TABLE seats (
    seat_id INT AUTO_INCREMENT PRIMARY KEY,
    screen_id INT,
    seat_number VARCHAR(10),
    seat_type VARCHAR(50),
    FOREIGN KEY (screen_id) REFERENCES screens(screen_id)
);

-- Step 7: Shows Table
CREATE TABLE shows (
    show_id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT,
    screen_id INT,
    show_time DATETIME,
    ticket_price DECIMAL(10, 2),
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id),
    FOREIGN KEY (screen_id) REFERENCES screens(screen_id)
);

-- Step 8: Bookings Table
CREATE TABLE bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    show_id INT,
    booking_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2),
    status VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (show_id) REFERENCES shows(show_id)
);

-- Step 9: Booking_Seats Table
CREATE TABLE booking_seats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT,
    seat_id INT,
    FOREIGN KEY (booking_id) REFERENCES bookings(booking_id),
    FOREIGN KEY (seat_id) REFERENCES seats(seat_id)
);

-- Step 10: Payments Table
CREATE TABLE payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT,
    amount DECIMAL(10, 2),
    payment_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    payment_method VARCHAR(50),
    status VARCHAR(50),
    FOREIGN KEY (booking_id) REFERENCES bookings(booking_id)
);