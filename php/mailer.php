<?php
require '../vendor/autoload.php';

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    // Проверяем результат капчи
    $recaptcha_response = $_POST['g-recaptcha-response'];
    $recaptcha_secret = '6LezXL0mAAAAADNWik8BcHw3CyyvIZlKeQA8F6x0';
    $recaptcha_verify_url = 'https://www.google.com/recaptcha/api/siteverify';
    
    $recaptcha_request_data = array(
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response
    );
    
    $recaptcha_verify_response = file_get_contents($recaptcha_verify_url . '?' . http_build_query($recaptcha_request_data));
    $recaptcha_verify_result = json_decode($recaptcha_verify_response, true);
    
    if ($recaptcha_verify_result['success']) {
        // Прошли проверку капчи, продолжаем с отправкой письма

        // Создаем транспорт для отправки писем через SMTP
        $transport = new \Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl');
        $transport->setUsername('mooonnight@bk.ru'); // Укажите ваш адрес электронной почты на mail.ru
        $transport->setPassword('Pxmy95CHzSSS4dhmEnqu'); // Укажите пароль от вашего почтового ящика на mail.ru

        // Создаем объект SwiftMailer с использованием созданного транспорта
        $mailer = new \Swift_Mailer($transport);

        // Создаем сообщение
        $message = new \Swift_Message('Новое сообщение с формы');
        $message->setFrom(['mooonnight@bk.ru' => 'Your Name']); // Укажите ваш адрес электронной почты и имя отправителя
        $message->setTo(['mooonnight@bk.ru']); // Укажите адрес электронной почты получателя
        $message->setBody("Имя: $name\nТелефон: $phone\nСообщение: $message");

        // Отправляем сообщение
        if ($mailer->send($message)) {
            echo '<script>alert("Сообщение отправлено!"); window.location.href = "contact.php";</script>';
        } else {
            echo '<script>alert("Ошибка отправки сообщения. Попробуйте еще раз позже.");</script>';
        }
    } else {
        // Не прошли проверку капчи
        echo '<script>alert("Проверка капчи не пройдена. Пожалуйста, повторите попытку."); window.location.href = "contact.php";</script>';
    }
}
