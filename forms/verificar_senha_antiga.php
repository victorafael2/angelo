<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexão com o banco de dados (substitua pelas suas próprias credenciais)
   include '../database/databaseconnect.php';

    // Verifique a conexão com o banco de dados
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $email = $_POST['email']; // Supondo que o email do usuário seja enviado via POST
    $novaSenha = $_POST['novaSenha']; // Supondo que a nova senha seja enviada via POST

    // Consulta para recuperar a senha antiga do banco de dados
    $sql = "SELECT senha FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($senhaHash);
        $stmt->fetch();

        // Verifica se a nova senha é diferente da senha antiga
        if (password_verify($novaSenha, $senhaHash)) {
            echo "mesma_senha";
        } else {
            echo "senha_diferente";
        }
    } else {
        echo "usuario_nao_encontrado"; // Caso o usuário não seja encontrado no banco de dados
    }

    // Fechando a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>
