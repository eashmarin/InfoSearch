<html>
<head>
    <title> ex4.php
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

print "<p><form action='{$_SERVER['PHP_SELF']}' method='post'>\n";
print "<table border='1'>\n";
print "<tr>\n";
for ($x = 0; $x < $num_fields; $x++) {
    $column = $stmt->getColumnMeta($x);
    print "\t<th>{$column['name']}</th>\n";
}
print "<th>Исправить</th></tr>\n";

while ($a_row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print "<tr>\n";
    foreach ($a_row as $field) {
        print "\t<td>$field</td>\n";
    }
    $id = $a_row['id'];
    print "<td><input type='radio' name='id' value='$id'></td></tr>\n";
}
print "</table>\n";

print "<input type='submit' value='Выбрать'></form>\n";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM notebook WHERE id = :id ORDER BY ID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $a_row = $stmt->fetch(PDO::FETCH_ASSOC);

    print "<form action='{$_SERVER['PHP_SELF']}' method='post'>\n";
    print "<input type='hidden' name='id' value='$id'>\n";
    print "<select name='field_name'>\n";
    foreach ($a_row as $key => $value) {
        print "<option value='$key'>$value</option>\n";
    }
    print "</select>\n";
    print "<input type='text' name='field_value' placeholder='Введите новое значение'>\n";
    print "<input type='submit' value='Заменить'></form>\n";
}

if (isset($_POST['field_value'])) {
    $id = $_POST['id'];
    $field_name = $_POST['field_name'];
    $field_value = $_POST['field_value'];

    if (!empty($id) && !empty($field_name) && !empty($field_value)) {
        $query = "UPDATE notebook SET $field_name = :field_value WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':field_value', $field_value);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: ex3.php");
        exit;
    }
}
?>

</body>
</html>