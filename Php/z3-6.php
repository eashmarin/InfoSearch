<html>
<head>
    <title> Листинг 9-10. Сортировка ассоциативного массива
        по именам полей </title></head>
<body>

<?php
$cust = array(
    'cnum' => 2001,
    'cname' => 'Hoffman',
    'city' => 'London',
    'snum' => 1001,
    'rating' => 100
);

print "Массив \$cust с ключами:<br>";
foreach ($cust as $key => $value) {
    print "$key: $value<br>";
}

asort($cust);
print "<br>Массив \$cust после сортировки по значениям:<br>";
foreach ($cust as $key => $value) {
    print "$key: $value<br>";
}

ksort($cust);
print "<br>Массив \$cust после сортировки по ключам:<br>";
foreach ($cust as $key => $value) {
    print "$key: $value<br>";
}

sort($cust);
print "<br>Массив \$cust после сортировки с помощью функции sort():<br>";
foreach ($cust as $key => $value) {
    print "$key: $value<br>";
}
?>
</body>
</html>