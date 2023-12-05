<html>
<head>
    <title> Листинг 7-6. Вложенные циклы for </title>
    <style>
        td {
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php

print "<table border=1>\n";
// Цвет цифр в верхней строке и левом столбце
$color = 'blue';

print "<tr>";
print "<td style='color: red'>+</td>";
for ($i = 1; $i <= 10; $i++) {
    print "<td style='color: $color'>$i</td>";
}
print "</tr>";

for ($i = 1; $i <= 10; $i++) {
    print "<tr>";
    print "<td style='color: $color'>$i</td>";
    for ($j = 1; $j <= 10; $j++) {
        print "<td>" . ($i + $j) . "</td>";
    }
    print "</tr>";
}
print "</table>";

?>
</body>
</html>