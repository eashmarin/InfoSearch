<html>
<head>
    <title> Листинг 11-2. Добавление в базу данных
        информации, введенной пользователем
    </title>
</head>
<body>

<?php

function Add_to_database($name, $city, $address, $birthday, $mail, &$dberror): bool
{
    $host = "localhost";
    $user = "postgres";
    $password = "password";
    $dbname = "php_db";

    global $conn;

    try {
        $conn = new PDO("pgsql:host=$host;dbname=$dbname;user=$user;password=$password");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $dberror = $e->getMessage();
        return false;
    }

    $query = "INSERT INTO notebook (name, city, address, birthday, mail) VALUES('$name', '$city', '$address', '$birthday', '$mail')";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    return true;
}
function Write_form(): void
{
    print "<form action='{$_SERVER['PHP_SELF']}' method='post'>";
    print "<p>Введите имя и фамилию [*]: \n";
    print "<input type='text' name='full_name'> ";
    print "<p>Введите город: \n";
    print "<input type='text' name='city'> ";
    print "<p>Введите адрес: \n";
    print "<input type='text' name='address'> ";
    print "<p>Введите дату рождения в формате ММ-ДД-ГГГГ: \n";
    print "<input type='date' name='birth_date'> ";
    print "<p>Введите e-mail [*]: \n";
    print "<input type='email' name='email'> ";
    print "<p><input type='submit' value='Записать! '>\n
           </form>\n";

    print "<p>Поля помеченные [*], являются обязательными для заполнения! \n";
}

if (!empty($_POST['full_name']) && !empty($_POST['email'])) {
    $dberror = "";
    $ret = Add_to_database($_POST['full_name'], $_POST['city'], $_POST['address'], $_POST['birth_date'], $_POST['email'], $dberror);
    if (!$ret) {
        print "Ошибка: $dberror<br>";
    } else {
        print "Спасибо";
    }
}
else Write_form();
?>
</body>
</html>

