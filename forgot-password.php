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

    // Verificar se o e-mail existe no banco de dados
$checkEmailQuery = $conn->prepare("SELECT * FROM user WHERE email = ?");
$checkEmailQuery->bind_param('s', $email);
$checkEmailQuery->execute();
$result = $checkEmailQuery->get_result();

if ($result->num_rows == 0) {
    // E-mail não encontrado
    $response = array("success" => false, "message" => "E-mail não cadastrado.");
    echo json_encode($response);
    exit;
}

    // Criar uma instância do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurar o servidor de e-mail
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // Substitua pelo seu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'resetpassword@betterconsultoria.com'; // Substitua pelo seu endereço de e-mail
        $mail->Password = 'mailC98k32xnt%ahcrpassreset'; // Substitua pela sua senha
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // A porta pode variar dependendo das configurações do seu servidor

        // Configurar o remetente e o destinatário
        $mail->setFrom('resetpassword@betterconsultoria.com', 'BETTER');
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

            // Construir o link de redefinição de senha
            $resetLink =  $currentServer . '/reset-password.php?token=' . $token . '&email=' . $email;

           // Corpo do e-mail formatado em HTML com estilos CSS inline
                $emailBody = '
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Redefinir Senha</title>
                </head>
                <body>
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td bgcolor="#151f42" style="padding: 10px;">
                                <h1 style="color: #fff;">Recuperação de Senha</h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 20px;">
                                <p>Clique no link abaixo para redefinir sua senha:</p>
                                <p><a href="' . $resetLink . '" style="background-color: #4568dc; color: #fff; padding: 10px; text-decoration: none; border-radius: 5px;">Redefinir Senha</a></p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#f0f0f0" style="padding: 10px; text-align: center;">
                                <p>Este é um e-mail automático. Por favor, não responda a este e-mail.</p>
                                <img src="https://i.imgur.com/9AP4teq.png" alt="BETTER" width="110">

                            </td>
                        </tr>
                    </table>
                </body>
                </html>


                ';



            $mail->Subject = 'Redefinir Senha';
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
