<?php

$rus_name = array(
    'cnum' => 'номер покупателя',
    'cname' => 'имя покапателя',
    'city' => 'город',
    'rating' => 'рейтинг покупателя',
    'snum' => 'номер продавца',
    'sname' => 'имя продавца',
    'comm' => 'комисионные',
    'onum' => 'номер заказа',
    'amt' => 'стоимость заказа',
    'odate' => 'дата заказа',
);

if (isset($_GET["structure"])) {
    $selectedStructures = $_GET["structure"];

    foreach ($selectedStructures as $table) {
        vid_structure($table);
    }
}

if (isset($_GET["content"])) {
    $selectedContents = $_GET["content"];

    foreach ($selectedContents as $table) {
        vid_content($table);
    }
}
function vid_structure($table_name): void
{
    global $conn;
    $query = "SELECT column_name, data_type FROM information_schema.columns WHERE table_name = :table_name";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':table_name', $table_name);
    $stmt->execute();

    print "<h4>Структура таблицы $table_name</h4>";
    print "<dl><dd>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print "<b>" . $row['column_name'] . "</b> ";
        print "<i>" . $row['data_type'] . "</i><br>";
    }

    print "</dl>";
}

function vid_content($table_name): void
{
    global $conn, $rus_name;
    $query = "SELECT * FROM $table_name";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    print "<h4>Содержимое таблицы $table_name</h4>";

    print "<table border='1'>";
    for ($i = 0; $i < $stmt->columnCount(); $i++) {
        $column = $stmt->getColumnMeta($i);
        print "<th>{$rus_name[$column['name']]}<br>{$column['name']}</th>";
    }
    print "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print "<tr>";
        foreach ($row as $value) {
            print "<td>$value</td>";
        }
        print "</tr>";
    }

    print "</table>";

}

print "<a href='z10-1.html'>Возврат к выбору таблицы</a>";
?>
