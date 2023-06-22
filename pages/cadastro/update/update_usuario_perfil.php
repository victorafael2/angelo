<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os valores dos campos do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = md5($_POST['senha']);
    $grupo_acesso = $_POST['grupo_acesso'];
    $cpf = $_POST['cpf'];

    // Atualize os dados do usuário no banco de dados
    $sql = "UPDATE user SET name='$name', email='$email', telefone='$telefone', senha='$senha', grupo_acesso='$grupo_acesso', cpf='$cpf' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        // Exibe uma mensagem de sucesso usando o SweetAlert2
        echo $sql;
    } else {
        // Exibe uma mensagem de erro usando o SweetAlert2
        echo "<script>
                Swal.fire({
                    title: 'Erro',
                    text: 'Ocorreu um erro ao salvar as informações do usuário.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              </script>";
    }
}
?>
