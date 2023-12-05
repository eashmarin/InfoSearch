<html>
<head>
    <title> Листинг 11-1. Добавление записи в таблицу
    </title>
</head>
<body>

<?php
$host = "localhost";
$user = "postgres";
$password = "password";
$dbname = "php_db";

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname;user=$user;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DROP TABLE IF EXISTS notebook";
    $conn->exec($sql);

    $sql = "CREATE TABLE notebook (
        id SERIAL PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        city VARCHAR(50),
        address VARCHAR(50),
        birthday DATE,
        mail VARCHAR(20)
    )";

    $conn->exec($sql);
} catch (PDOException $e) {
    print "Нельзя создать таблицу notebook: " . $e->getMessage();
}

$conn = null;
?>
</body>
</html>