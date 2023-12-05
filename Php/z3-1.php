<html>
<head>
    <title> Листинг 7-2. Цикл do..while </title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
<table>
    <?php
    $diagonalColor = 'brown';

    $backgroundColor = '';
    for ($i = 1; $i <= 10; $i++) {
        print "<tr>";
        for ($j = 1; $j <= 10; $j++) {
            if ($i === $j) {
                $backgroundColor = $diagonalColor;
            } else {
                $backgroundColor = '';
            }
            print "<td style='background-color: $backgroundColor'>" . $i * $j . "</td>";
        }
        print "</tr>";
    }
    ?>
</table>

</body>
</html>