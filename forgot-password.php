<?php
require 'mail/PHPMailer/src/PHPMailer.php';
require 'mail/PHPMailer/src/SMTP.php';
require 'mail/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'database/databaseconnect.php';

if (isset($_POST["email"])) {
    $email = $_POST["email"];

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

        // Verificar se o servidor não é localhost
            if ($_SERVER['SERVER_NAME'] !== 'localhost') {
                $currentServer = 'https://191.96.31.197:8090/preview/xpeer.com';
            } else {
                $currentServer = 'localhost/angelo';
            }



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
            // Forçar a codificação UTF-8 no assunto
            $subject = 'Redefinição de Senha';
            $mail->Subject = utf8_encode($subject);

            // Construir o link de redefinição de senha
            $resetLink = 'http://' . $currentServer . '/reset-password.php?token=' . $token . '&email=' . $email;
            $emailBody = 'Clique no link a seguir para redefinir sua senha: <a href="' . $resetLink . '">Redefinir Senha</a>';
            $emailBody = utf8_encode($emailBody);

            $mail->Body = $emailBody;

            // Enviar o e-mail
            $mail->send();
            $response = array("success" => true, "message" => "Email de recuperação de senha enviado com sucesso!");
        } else {
            $response = array("success" => false, "message" => "Erro ao enviar o email.");

        }

        // Feche a conexão e o statement
        $stmt->close();
        $conn->close();

        header("Content-Type: application/json");
        echo json_encode($response);
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }
} else {
    echo "Por favor, preencha o campo de e-mail.";
}
?>
