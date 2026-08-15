<?php
// includes/db.php

$host = 'localhost';
$db   = 'taxiyatri_v1'; // Ensure this matches the name in the script
$user = 'root';      // Update if you set a specific user
$pass = 'hello'; // Use the password you set during the MySQL setup

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>