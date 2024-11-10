<?php
$servername = "localhost";
$username = "root"; // Default username
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully<br>";
}

// Use database or select newly created database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS COLLEGE";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database created successfully<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select the database
if ($conn->select_db("COLLEGE")) {
    echo "Database selected successfully<br>";
} else {
    die("Error selecting database: " . $conn->error);
}

// Create table department
$sql_create_table = "CREATE TABLE IF NOT EXISTS department (Dno INT PRIMARY KEY, Dname VARCHAR(255))";
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

// Redirect to phpMyAdmin
$phpmyadmin_url = "http://localhost/phpmyadmin";
header("Location: $phpmyadmin_url");
exit;
?>