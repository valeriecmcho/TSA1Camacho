<?php
// Database setup script for tasks and users tables

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'tsa1camacho';

// Create connection
$conn = new mysqli($hostname, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "<br>Please ensure XAMPP MySQL service is running.");
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select database
$conn->select_db($database);

// Drop existing tables if they exist to ensure clean schema
$conn->query("DROP TABLE IF EXISTS tasks");
$conn->query("DROP TABLE IF EXISTS users");
echo "Existing tables dropped successfully<br>";

// Create tasks table
$sql = "CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    status ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
    task_date DATE NOT NULL,
    created_at DATETIME NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tasks table created successfully<br>";
} else {
    die("Error creating tasks table: " . $conn->error);
}

// Create users table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Users table created successfully<br>";
} else {
    die("Error creating users table: " . $conn->error);
}

// Insert sample tasks (including today's date)
$today = date('Y-m-d');
$sql = "INSERT INTO tasks (title, status, task_date, created_at) VALUES
('Complete project documentation', 'in_progress', '$today', NOW()),
('Review code changes', 'pending', '$today', NOW()),
('Database optimization', 'pending', DATE_ADD('$today', INTERVAL 1 DAY), NOW()),
('User interface updates', 'pending', DATE_ADD('$today', INTERVAL 2 DAY), NOW()),
('Security audit', 'pending', DATE_ADD('$today', INTERVAL 3 DAY), NOW()),
('Performance testing', 'pending', DATE_ADD('$today', INTERVAL 4 DAY), NOW()),
('API integration', 'pending', DATE_ADD('$today', INTERVAL 5 DAY), NOW()),
('Deployment preparation', 'pending', DATE_ADD('$today', INTERVAL 6 DAY), NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Sample tasks inserted successfully (8 records)<br>";
} else {
    die("Error inserting sample tasks: " . $conn->error);
}

// Insert demo user
$sql = "INSERT INTO users (id, username, full_name, email, created_at) VALUES
(202310616, 'valerie_camacho', 'Ann Valerie L. Camacho', 'valerie.camacho@gmail.com', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Demo user inserted successfully<br>";
} else {
    die("Error inserting demo user: " . $conn->error);
}

$conn->close();
echo "Database setup completed successfully! <br>";
echo "Database: $database<br>";
echo "Tables: tasks, users<br>";
echo "Sample data: 8 tasks, 1 user";
