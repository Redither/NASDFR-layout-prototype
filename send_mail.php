<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];
$theme = $_POST['theme'];
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@nasdfr.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '$#2%Ea73@LcF?R-.'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                             // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('info@nasdfr.ru'); // от кого будет уходить письмо?
$mail->addAddress('slavonchik68@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта: '.$theme ;
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $to = "slavonchik68@yandex.ru"; // Замените на ваш email

    $name = $data['name'];
    $email = $data['email'];
    $message = $data['message'];
    $subject = "Новое сообщение от $name";
    $messageBody = "Имя: $name\nEmail: $email\nСообщение: $message";

    
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.yandex.ru';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'noreply@nasdfr.com';                     //SMTP username
    $mail->Password   = 'onosrgsjbevpflqm';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@nasdfr.ru', 'NASDFR');
    $mail->addAddress('slavonchik68@yandex.ru');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    
    // тема письма
    $mail->Subject = 'Сообщение с формы обратной связи';


    // тело письма
    $body = '<h2>Сообщение с формы обратной связи</h2><br><br>';

    if (!empty($_POST['name'])) {
        $body.= '<p><b>Имя:</b> '. $_POST['name']. '</p><br>';
    }
    if (!empty($_POST['email'])) {
        $body.= '<p><b>Email:</b> '. $_POST['email']. '</p><br>';
    }
    if (!empty($_POST['phone'])) {
        $body.= '<p><b>Телефон:</b> '. $_POST['phone']. '</p><br>';
    }
    if (!empty($_POST['advantage'])) {
        $body.= '<p><b>Тема:</b> '. $_POST['message']. '</p><br>';
    }

    $mail->Body = $body;


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    // $mail->CharSet = 'UTF-8';
    // $mail->setLanguage('ru', 'phpmailer/language/');
    // $mail->IsHTML(true);

    // от кого письмо
    // $mail->setFrom('info@nasdfr.ru', 'NASDFR');
    // кому необходимо отправить письмо
    // $mail->addAddress('slavonchik68@yandex.ru');
    // // тема письма
    // $mail->Subject = 'Сообщение с формы обратной связи';


    // // тело письма
    // $body = '<h2>Сообщение с формы обратной связи</h2><br><br>';

    // if (!empty($_POST['name'])) {
    //     $body.= '<p><b>Имя:</b> '. $_POST['name']. '</p><br>';
    // }
    // if (!empty($_POST['email'])) {
    //     $body.= '<p><b>Email:</b> '. $_POST['email']. '</p><br>';
    // }
    // if (!empty($_POST['phone'])) {
    //     $body.= '<p><b>Телефон:</b> '. $_POST['phone']. '</p><br>';
    // }
    // if (!empty($_POST['advantage'])) {
    //     $body.= '<p><b>Тема:</b> '. $_POST['message']. '</p><br>';
    // }

    // $mail->Body = $body;

    // Send
        // if(!$mail->send();) {
        //     $message = 'Ошибка отправки';
        // } else {
        //     $message = 'Письмо отправлено';
        // }

        // $response = ['message' => $message];

        // header('Content-Type: application/json');
        // echo json_encode($response);
?>