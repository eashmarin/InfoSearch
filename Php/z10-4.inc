<?php
$host = "localhost";
$user = "postgres";
$password = "password";
$dbname = "php_db";

global $conn;

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname;user=$user;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>
