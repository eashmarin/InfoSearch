<html>
<head>
    <title> Листинг 9-2. Просмотр массива
    </title></head>
<body>

<?php
$treug = [];
for ($n = 1; $n <= 10; $n++) {
    $treug[] = $n * ($n + 1) / 2;
}

print "Массив треугольных чисел: " . implode("  ", $treug) . "<br>";

$kvd = [];
for ($i = 1; $i <= 10; $i++) {
    $kvd[] = $i * $i;
}

print "Массив квадратов натуральных чисел: " . implode("  ", $kvd) . "<br>";

$rez = array_merge($treug, $kvd);

print "Объединенный массив: " . implode("  ", $rez) . "<br>";

sort($rez);

print "Отсортированный массив: " . implode("  ", $rez) . "<br>";

array_shift($rez);

print "Массив после удаления первого элемента: " . implode("  ", $rez) . "<br>";

$rez1 = array_unique($rez);

print "Массив без повторяющихся элементов: " . implode("  ", $rez1) . "<br>";

?>
</body>
</html>

