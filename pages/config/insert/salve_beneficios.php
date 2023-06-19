<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$dataHoraAtual = date("Y-m-d H:i:s");
// echo $dataHoraAtual;
$data = $_POST['data'];
$beneficio_tipo = $_POST['beneficio_tipo'];
$beneficio_periodicidade = $_POST['beneficio_periodicidade'];
$beneficio_valor = $_POST['beneficio_valor'];
$habilitado = $_POST['habilitado'];
$sys_user = $_POST['sys_user'];

    // Prepara a consulta SQL de inserção
    $sql = "INSERT INTO aux_beneficio (data, beneficio_tipo, beneficio_periodicidade, beneficio_valor, habilitado,sys_user,sys_data) VALUES ('$data', '$beneficio_tipo', '$beneficio_periodicidade', '$beneficio_valor', '$habilitado','$sys_user','$dataHoraAtual')";

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
