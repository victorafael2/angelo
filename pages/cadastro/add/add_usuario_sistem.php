<?php
// Conexão com o banco de dados (substitua as informações)
include '../../../database/databaseconnect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



require '../../../mail/PHPMailer/src/Exception.php';
require '../../../mail/PHPMailer/src/PHPMailer.php';
require '../../../mail/PHPMailer/src/SMTP.php';

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

// Verifique a conexão
if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

// Coleta os dados do formulário
$name = $_POST['name'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$group = $_POST['group'];

// Gere uma senha aleatória forte
$length = 12; // Define o comprimento da senha (pode ajustar conforme necessário)
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=[]{}|;:,.<>?'; // Caracteres válidos
$password = substr(str_shuffle($characters), 0, $length); // Gere a senha aleatória

// Hash seguro da senha
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insira os dados na tabela de usuários
$sql = "INSERT INTO user (name, email, telefone, grupo_acesso, senha) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $telefone, $group, $hashedPassword);

 // Envie o e-mail com as informações
 if (enviarEmail($name, $email, $telefone, $group, $password)) {
    $response['success'] = true;
    $response['message'] = "Informações salvas com sucesso! Um e-mail foi enviado com os detalhes e senha.";
} else {
    $response['success'] = false;
    $response['message'] = "Ocorreu um erro ao enviar o e-mail.";
}

$response = array();

if ($stmt->execute()) {
    $response['success'] = true;
    $response['message'] = "Informações salvas com sucesso! A senha é: " . $password;
} else {
    $response['success'] = false;
    $response['message'] = "Ocorreu um erro ao salvar as informações: " . $conn->error;
}

$stmt->close();
$conn->close();

// Retorna a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

