
-- Users table
CREATE TABLE users (
    user_id CHAR(8) PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15) UNIQUE,
    password VARCHAR(255),
    otp CHAR(4),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Drivers table (user_id reused as driver_id)
CREATE TABLE drivers (
    driver_id CHAR(6) PRIMARY KEY,
    user_id CHAR(8),
    license_number VARCHAR(50),
    vehicle_number VARCHAR(50),
    vehicle_type VARCHAR(50),
    availability BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Rides table
CREATE TABLE rides (
    ride_id CHAR(10) PRIMARY KEY,
    rider_id CHAR(8),
    driver_id CHAR(6),
    pickup_location VARCHAR(255),
    drop_location VARCHAR(255),
    fare DECIMAL(10,2),
    ride_status ENUM('requested', 'ongoing', 'completed', 'cancelled') DEFAULT 'requested',
    ride_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (rider_id) REFERENCES users(user_id),
    FOREIGN KEY (driver_id) REFERENCES drivers(driver_id)
);

-- Example insert with random IDs (from earlier sample)
-- INSERT INTO users (user_id, name, email, phone, password, otp)
-- VALUES ('14940551', 'John Doe', 'john@example.com', '1234567890', 'hashed_password', '9912');
