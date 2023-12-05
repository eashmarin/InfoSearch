<html>
<head>
    <title> Листинг 8-3. Функция-переменная </title>
</head>
<body>

<?php

function Ru($color)
{
    print "<p style='color: $color'>Здравствуйте!</p>";
}

function En($color)
{
    print "<p style='color: $color'>Hello!</p>";
}

function Fr($color)
{
    print "<p style='color: $color'>Bonjour!</p>";
}

function De($color)
{
    print "<p style='color: $color'>Guten Tag!</p>";
}

$lang = isset($_GET['lang']) ? $_GET['lang'] : '';
$color = isset($_GET['color']) ? $_GET['color'] : '';

if ($lang === 'Ru') {
    Ru($color);
} elseif ($lang === 'En') {
    En($color);
} elseif ($lang === 'Fr') {
    Fr($color);
} elseif ($lang === 'De') {
    De($color);
} else {
    print "<p>Приветствие неизвестно</p>";
}
?>
</body>
</html>