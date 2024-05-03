<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $name = $data['name'];
    $email = $data['email'];
    $message = $data['message'];

    $to = "slavonchik68@yandex.ru"; // Замените на ваш email
    $subject = "Новое сообщение от $name";
    $messageBody = "Имя: $name\nEmail: $email\nСообщение: $message";

    if (mail($to, $subject, $messageBody)) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
} else {
    http_response_code(405);
}
?>