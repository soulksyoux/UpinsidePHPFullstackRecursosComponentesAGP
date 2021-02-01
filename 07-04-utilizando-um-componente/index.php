<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.04 - Utilizando um componente");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ instance ] https://packagist.org/packages/phpmailer/phpmailer
 */
fullStackPHPClassSession("instance", __LINE__);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

$phpMailer = new PHPMailer();
var_dump($phpMailer instanceof PHPMailer);

/*
 * [ configure ]
 */
fullStackPHPClassSession("configure", __LINE__);

try {
    $mail = new PHPMailer(true);

    //Config
    $mail->isSMTP();
    $mail->setLanguage("PT");
    $mail->isHTML(true);
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->CharSet = "utf-8";

    //Auth
    $mail->Host = "";
    $mail->Username = "";
    $mail->Password = "";
    $mail->Port = "";

    //Mail
    $mail->setFrom("", "Andre");
    $mail->Subject = "Este é meu envio via componente no FSPHP";
    $mail->msgHTML("<h1>Olá mundo</h1><p>Esse é meu primeiro disparo de email.</p>");

    //Send
    $mail->addAddress("", "Andre");
    $send = $mail->send();
    var_dump($send);



} catch (MailException $exception) {
    echo helper_get_message()->error($exception->getMessage());
}