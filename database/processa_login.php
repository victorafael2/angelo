<?php
include_once("databaseconnect.php");
$email = $_POST['email'];
$senha = $_POST['senha'];

// Execute a consulta SQL para buscar o usuário e senha na tabela de usuários
$sql = "SELECT * FROM user WHERE email='$email' AND senha='$senha'";
$result = mysqli_query($conn, $sql);

// Verifique se a consulta retornou algum resultado
if (mysqli_num_rows($result) > 0) {
    // Login bem sucedido
    session_start();
    $_SESSION['email'] = $email;
    echo "Login bem sucedido!";
    header('Location: ../home.php');
} else {
    // Login falhou
    // echo "Usuário ou senha incorretos.";
    echo $sql;
}

// Feche a conexão com o banco de dados
mysqli_close($conn);

?>
