<?php
// Estabeleça a conexão com o banco de dados
include 'databaseconnect.php';

// Verifique se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado

    // Verifica se os campos de usuário e senha foram preenchidos

        $email = 'admin@admin.com';
        $senha = md5('admin'); // Hash MD5 da senha

        // Atualiza a senha no banco de dados (exemplo fictício)
        // Substitua esta parte com a lógica adequada para o seu banco de dados
        $sql = "UPDATE user SET senha = '$senha' WHERE email = '$email'";

        if ($conn->query($sql) === TRUE) {
            // Senha atualizada com sucesso
            echo 'Senha atualizada com sucesso.';
        } else {
            // Ocorreu um erro ao atualizar a senha
            echo 'Erro ao atualizar a senha: ' . $conn->error;
        }



// Feche a conexão com o banco de dados
$conn->close();
?>
