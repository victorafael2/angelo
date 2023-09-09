<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



require '../../mail/PHPMailer/src/Exception.php';
require '../../mail/PHPMailer/src/PHPMailer.php';
require '../../mail/PHPMailer/src/SMTP.php';

// Função para enviar e-mail
function enviarEmail($name, $email, $telefone, $group, $password) {
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor de e-mail (substitua com as suas configurações)
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // Substitua pelo seu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'victor.rafael@betterconsultoria.com'; // Substitua pelo seu endereço de e-mail
        $mail->Password = 'ftC35kxnt%aHhcr1'; // Substitua pela sua senha
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // A porta pode variar dependendo das configurações do seu servidor

        // Destinatário e assunto
        $mail->setFrom('victor.rafael@betterconsultoria.com', 'BETTER');
        $mail->addAddress($email, $name);
        $mail->Subject = 'Cadastro de Usuário';

        // Corpo do e-mail
        $message = "Seu cadastro foi realizado com sucesso!\n\n";
        $message .= "Nome: " . $name . "\n";
        $message .= "E-mail: " . $email . "\n";
        $message .= "Telefone: " . $telefone . "\n";
        $message .= "Grupo de Usuário: " . $group . "\n";
        $message .= "Senha: " . $password . "\n"; // Inclui a senha gerada no e-mail
        $mail->Body = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

?>
