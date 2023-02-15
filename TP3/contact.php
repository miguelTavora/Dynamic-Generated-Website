<!DOCTYPE html>
<?php
require_once('classes/Indice.php');
//require_once('classes/DebugConsole.php');

$title = Indice::$title;

$submit_text = '';
$submit_error = '';

$senderEmail = 'smitrabalhooo94344@gmail.com';
$to = $user . " <" . $senderEmail . ">";



if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    if (strlen($subject) > 3 && strlen($message) > 20 && strlen($subject) < 40 && strlen($message) < 400 && $user != '') {
        $message = wordwrap($message, 70, "\r\n");//chega a 70 caracteres na mesma linha passa para a proxima
        //cabeçalho da mensagem
        $headerFields = array("From: {$email_user}","MIME-Version: 1.0","Content-Type: text/html;charset=utf-8");
        if (mail($to, $subject, $message,implode("\r\n", $headerFields))) {
            $submit_text = '<h1 style="padding-bottom: 10px; color:#7f7fff;">Message submited with sucess</h1>';
            $submit_error = '';
        } else {
            $submit_text = '';
            $submit_error = '<h3 style="text-align: center;color:#DC143C">Error sending the message</h3>';
        }
    } else {
        $submit_error = '<h3 style="text-align: center;color:#DC143C">Error Checking data</h3>';
        $submit_text = '';
    }
}

include 'templates/TemplateContact.php';
