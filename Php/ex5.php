<?php
include('z10-4.inc');

global $conn;

$query = "INSERT INTO notebook (name, city, address, birthday, mail) VALUES 
    ('Иван Иванов', 'Москва', 'ул. Примерная, д. 10', '1980-05-25', 'ivan@mail.ru'),
    ('Евгения Петрова', 'Санкт-Петербург', 'пр. Удачный, д. 15', '1992-10-12', 'epetrova@yandex.ru'),
    ('Алексей Смирнов', 'Новосибирск', 'пр. Первый, д. 5', '1975-07-31', 'alexsmirnov@ya.ru')";

$result = $conn->query($query);

if ($result) {
    print "Записи успешно добавлены в таблицу notebook.";
} else {
    print "Ошибка добавления записей: " . $conn->errorInfo();
}
?>
