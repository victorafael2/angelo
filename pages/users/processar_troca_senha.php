<?php
// Conexão com o banco de dados (substitua essas informações pelas suas)
include '../../database/databaseconnect.php';

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Recupere os valores enviados via AJAX
$senhaAntiga = $_POST['senhaAntiga'];
$idUsuario = $_POST['idUsuario'];
$novaSenha = $_POST['novaSenha'];

// Construa a consulta SQL para buscar a senha do usuário
$sql = "SELECT senha FROM user WHERE email = '$idUsuario'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // O usuário foi encontrado no banco de dados, agora verificaremos a senha
    $row = $result->fetch_assoc();
    $senhaNoBanco = $row["senha"];

    // Verificação da senha antiga
    if (password_verify($senhaAntiga, $senhaNoBanco)) {
        // A senha antiga está correta

        // Gerar um hash para a nova senha
        $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

        // Atualizar a senha do usuário no banco de dados
        $updateSql = "UPDATE user SET senha = '$novaSenhaHash' WHERE email = '$idUsuario'";

        if ($conn->query($updateSql) === TRUE) {
            echo "SenhaAtualizada";
        } else {
            echo "ErroAtualizacaoSenha";
        }
    } else {
        // A senha antiga está incorreta
        echo "SenhaIncorreta";
    }
} else {
    // O usuário não foi encontrado no banco de dados
    echo "UsuarioNaoEncontrado";
}

// Feche a conexão com o banco de dados
$conn->close();
?>
