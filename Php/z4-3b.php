<html>
<head>
    <title> Листинг 10-4. Обработка данных формы из листинга 10-3
    </title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otv = array(6, 9, 4, 1, 3, 2, 5, 8, 7);

    $answers = $_POST['answers'];

    $name = $_POST['name'];

    $correct = 0;
    foreach ($otv as $key => $value) {
        if ($value == $answers[$key]) {
            $correct++;
        }
    }

    switch ($correct) {
        case 9:
            $grade = "великолепно знаете географию";
            break;
        case 8:
            $grade = "отлично знаете географию";
            break;
        case 7:
            $grade = "очень хорошо знаете географию";
            break;
        case 6:
            $grade = "хорошо знаете географию";
            break;
        case 5:
            $grade = "удовлетворительно знаете географию";
            break;
        case 4:
            $grade = "терпимо знаете географию";
            break;
        case 3:
            $grade = "плохо знаете географию";
            break;
        case 2:
            $grade = "очень плохо знаете географию";
            break;
        default:
            $grade = "вообще не знаете географию";
    }

    print "<p>Здравствуйте, $name! Ваша оценка: $grade.</p>";
}
?>
<p><a href="z4-3a.html">Назад</a></p>
</body>
</html> 