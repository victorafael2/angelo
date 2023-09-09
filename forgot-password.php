<?php
require 'mail/PHPMailer/src/PHPMailer.php';
require 'mail/PHPMailer/src/SMTP.php';
require 'mail/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'database/databaseconnect.php';

if (isset($_GET["email"])) {
    $email = $_GET["email"];

    // Criar uma instância do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurar o servidor de e-mail
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // Substitua pelo seu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'victor.rafael@betterconsultoria.com'; // Substitua pelo seu endereço de e-mail
        $mail->Password = 'ftC35kxnt%aHhcr1'; // Substitua pela sua senha
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // A porta pode variar dependendo das configurações do seu servidor

        // Configurar o remetente e o destinatário
        $mail->setFrom('victor.rafael@betterconsultoria.com', 'BETTER');
        $mail->addAddress($email);

        // Gerar um token
        $token = bin2hex(random_bytes(16));

        // Inserir o token no banco de dados MySQL


        if ($conn->connect_error) {
            die('Erro de conexão com o banco de dados: ' . $conn->connect_error);
        }

        // Prepare a consulta SQL
        $stmt = $conn->prepare("INSERT INTO token (token, email) VALUES (?, ?)");

        if ($stmt === false) {
            die('Erro na preparação da consulta: ' . $conn->error);
        }

        // Vincule os parâmetros e execute a consulta
        $stmt->bind_param('ss', $token, $email);

        if ($stmt->execute()) {
            // O token foi inserido com sucesso na tabela token
            // Configurar o conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Redefinição de Senha';
            $mail->Body = 'Clique no link a seguir para redefinir sua senha: <a href="http://localhost/angelo/reset-password.php?token=' . $token . '&email='.$email.'">Redefinir Senha</a>';

            // Enviar o e-mail
            $mail->send();

            echo "Um e-mail de redefinição de senha foi enviado para o seu endereço de e-mail.";
        } else {
            echo "Erro ao inserir o token no banco de dados: " . $stmt->error;
        }

        // Feche a conexão e o statement
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
} else {
    echo "Por favor, preencha o campo de e-mail.";
}
?>
