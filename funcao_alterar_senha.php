<?php

$token = $_POST['token'];
$novaSenha = $_POST['password'];
$email = $_POST['email'];



        // Conecte-se ao banco de dados (substitua pelas suas configurações de conexão)
        include 'database/databaseconnect.php';

        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Hash a nova senha (recomendado para segurança)
        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

      // Atualize a senha do usuário na tabela de usuários (substitua pelos seus próprios campos)
$sql = "UPDATE user SET senha = '$senhaHash' WHERE email = '$email'";

if ($conn->query($sql) === TRUE) {

    $response = array("status" => "success");
    echo json_encode($response);
} else {

    $response = array("status" => "error");
    echo json_encode($response);
}


//       // Remova o token da tabela de tokens
// $sql = "DELETE FROM token WHERE token = '$token'";

// if ($conn->query($sql) === TRUE) {
//     $logMessage = "Token removido com sucesso para o token: " . $token;
// } else {
//     $logMessage = "Erro ao remover o token do banco de dados: " . $conn->error;
// }

// // Registre a mensagem no log
// error_log($logMessage);


//         $conn->close();

//         return true; // Senha atualizada com sucesso





?>