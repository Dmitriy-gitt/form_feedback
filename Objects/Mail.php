<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Mail
{
    protected $adress = 'toMail';
    protected $adress_two = '';

    protected function notify()
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->CharSet = "UTF-8";

        // Настройки сервера
        $mail->isSMTP();
        $mail->Host = 'smtp.yandex.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'mail';
        $mail->Password = 'pass';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Настройки сообщения
        $mail->setFrom('mail', 'Автоуведомление rscon');
        $mail->addAddress($this->adress != null ? $this->adress : 'tomail', 'Имя получателя');
        ($this->adress_two !=null ? $mail->addAddress($this->adress_two, 'Имя получателя') : '');
        /* $mail->addAttachment( __DIR__ .'/loc/edited_file.csv'); */
        $mail->Subject = 'Автоуведомление';
        $mail->Body = "Вам пришло сообщение на";

        // Отправка сообщения
        $mail->send();
    }
}