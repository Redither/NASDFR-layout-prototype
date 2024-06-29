<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
// $message = $_POST['message'];
$theme = $_POST['advantage'];
// $mail->SMTPDebug = 3;                                   // Enable verbose debug output

$mail->isSMTP();                                        // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';  					    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                 // Enable SMTP authentication
$mail->Username = 'noreply@nasdfr.ru';                  // Ваш логин от почты с которой будут отправляться письма
// $mail->Password = '$#2%Ea73@LcF?R-.';                // Ваш пароль от почты с которой будут отправляться письма
$mail->Password = 'pzdwkelslbzpgmye';                   // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('noreply@nasdfr.ru'); // от кого будет уходить письмо?
$mail->addAddress('slavonchik68@yandex.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта: '.$theme ;
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email. '<br>Тема обращения: ' .$theme;
$mail->AltBody = '';

if(!$mail->send()):
    // echo 'Message could not be sent.';
    // echo 
    $response = 'Mailer Error: ' . $mail->ErrorInfo;
else: 
    // http_response_code(200);
    // header("HTTP/1.1 200 OK");
    $response = 'Success';
endif;

// header('Content-type: application.json');
echo json_encode($response);
?>

