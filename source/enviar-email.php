<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (!count($_POST)) header('Location: /');

$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$subject = filter_input(INPUT_POST, "subject");
$message = filter_input(INPUT_POST, "message");

$mail = new PHPMailer(true);

try {
    $mail->Encoding   = 'base64';
    $mail->CharSet    = 'UTF-8';
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = MAIL_USERNAME;
    $mail->Password   = MAIL_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->setFrom('andrehenriquetech@gmail.com', 'Portfólio');
    $mail->addAddress('andrehenriquetech@gmail.com');
    $mail->isHTML(true);
    $mail->Subject    = "Contato - $subject";
    $mail->Body       = "<p>$message</p><p>Nome Remetente: $name</p><p>Email Remetente: $email</p>";
    $mail->AltBody    = "$message\nNome Remetente: $name\nEmail Remetente: $email";
    $mail->send();
    header('Location: /');
} catch (Exception $e) {
    require $path . "template-header.html";
    echo "<div class='py-3 bg-white'><section class='container'><h2 class='mb-3'>Ops!</h2><p>Houve um problema no envio do email.</p><p><a href='/'>Clique aqui</a> para voltar para a página inicial.</p></section></div>";
    require $path . "template-footer.html";
}
