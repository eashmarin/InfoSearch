<?php
$list_sites = array(
    "http://www.yandex.ru",
    "http://www.rambler.ru",
    "http://www.google.com",
    "http://www.yahoo.com",
    "http://www.altavista.com"
);

if (isset($_POST["bg"])) {
    $site = $_POST["day"];
    header("Location: $site");
    exit;
} else {
    ?>
    <html>
    <head>
        <title>Листинг 10-9. Посылка заголовка с помощью функции header()</title>
    </head>
    <body>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
        <select name="day">
            <option value="">Поисковые сайты:</option>
            <?php
            $count = count($list_sites);
            $i = 0;
            while ($i < $count) {
                print "<option value='{$list_sites[$i]}'>{$list_sites[$i]}</option>";
                $i++;
            }
            ?>
        </select>
        <input type="submit" name="bg" value="Перейти">
    </body>
    </html>
    <?php
}
?>
