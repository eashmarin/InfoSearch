<html>
<head>
    <title> Листинг 10-2. Чтение данных формы из листинга 10-1 </title>
    <style>
        body {
            background-color: silver;
            color: black;
        }

        a:link {
            color: white;
        }

        a:active {
            color: maroon;
        }
    </style>

</head>

<body>

<?php
$align = isset($_POST['align']) ? $_POST['align'] : '';
$valign = isset($_POST['valign']) ? $_POST['valign'] : [];

print '<table border="1">';
print '<tr>';
print '<td align="' . $align . '" valign="' . implode(' ', $valign) . '" height="100" width="100">Текст</td>';
print '</tr>';
print '</table>';

print '<br>';
print '<a href="z4-1a.html">Назад</a>';
?>

</body>

</html>