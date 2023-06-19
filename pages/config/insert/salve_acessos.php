<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$dataHoraAtual = date("Y-m-d H:i:s");
// echo $dataHoraAtual;
// Pegar dados do formulário
$id_funcionario = $_POST['id_funcionario'];
$data = $_POST['data_acesso'];
$id_sistema = $_POST['id_sistema_acesso'];
$username = $_POST['username_acesso'];
$password = $_POST['password_acesso'];
$habilitado = isset($_POST['habilitado_acesso']) ? 1 : 0;  // Isso vai ser 1 se a checkbox estiver marcada, 0 caso contrário
$sys_user = $_POST['sys_user_acesso'];

    // Prepara a consulta SQL de inserção
    $sql = "INSERT INTO aux_acessos (id_funcionario, data, id_sistema, username, password, habilitado, sys_user,sys_data)
    VALUES ('$id_funcionario', '$data', '$id_sistema', '$username', '$password', '$habilitado', '$sys_user','$dataHoraAtual')";
// Insere os dados na tabela AUX_VT
if ($conn->query($sql) === TRUE) {
    $response = array(
        'status' => true,
        'message' => 'As informações foram salvas com sucesso.'
    );
} else {
    $response = array(
        'status' => false,
        'message' => 'Erro ao salvar as informações.'
    );
}

// Fecha a conexão com o banco de dados
// $conn->close();

// Retorna a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
