<html>

<head>
    <title> Листинг 10-8. HTML-форма, вызывающая саму себя
    </title>
</head>
<body>

<?php
$align = isset($_POST['align']) ? $_POST['align'] : 'left';
$valign = isset($_POST['valign']) ? $_POST['valign'] : ['top'];

print '<table border="1">';
print '<tr>';
print '<td align="' . $align . '" valign="' . implode(' ', $valign) . '" height="100" width="100">Текст</td>';
print '</tr>';
print '</table>';

?>
<form action="z4-2.php" method="post">
    <b>Выберите горизонтальное расположение:</b><br>
    <input type="radio" id="left" name="align" value="left">
    <label for="left">слева</label><br>
    <input type="radio" id="center" name="align" value="center">
    <label for="center">по центру</label><br>
    <input type="radio" id="right" name="align" value="right">
    <label for="right">справа</label><br>

    <br>

    <b>Выберите вертикальное расположение:</b><br>
    <input type="checkbox" id="top" name="valign[]" value="top">
    <label for="top">сверху</label><br>
    <input type="checkbox" id="middle" name="valign[]" value="middle">
    <label for="middle">по середине</label><br>
    <input type="checkbox" id="bottom" name="valign[]" value="bottom">
    <label for="bottom">внизу</label><br>

    <br>

    <input type="submit" value="Выполнить">
</form>
</body>

</html>