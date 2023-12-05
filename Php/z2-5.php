<html> <head>
    <title> Листинг 6-2. Использование блоков else и elseif </title> </head> <body>

<?php
$lang = isset($_GET['lang']) ? $_GET['lang'] : '';

if ($lang === 'ru') {
    print 'Русский';
} elseif ($lang === 'en') {
    print 'Английский';
} elseif ($lang === 'fr') {
    print 'Французский';
} elseif ($lang === 'de') {
    print 'Немецкий';
} else {
    print 'Язык неизвестен';
}
?>
</body> </html>