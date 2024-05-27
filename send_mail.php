<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    
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