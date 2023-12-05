<html>
<head>
    <title> Листинг 11-3. Вывод всех записей таблицы
    </title>
</head>
<body>

<?php
include('z10-4.inc');

global $conn;
$query = "SELECT * FROM notebook ORDER BY id";
$stmt = $conn->prepare($query);
$stmt->execute();

$num_rows = $stmt->rowCount();

print "<P>В таблице notebook содержится $num_rows строк";
$num_fields = $stmt->columnCount();

print "<p><table border='1'>\n";
print "<tr>\n";
for ($x = 0; $x < $num_fields; $x++) {
    $column = $stmt->getColumnMeta($x);
    print "\t<th>{$column['name']}</th>\n";
}
print "</tr>\n";
while ($a_row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print "<tr>\n";
    foreach ($a_row as $field)
        print "\t<td>$field</td>\n";
    print "</tr>\n";
}
print "</table>\n";

include('z10-6.inc');

?> </body>
</html>