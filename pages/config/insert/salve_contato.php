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
$data = $_POST['data'];
$contato_tipo = $_POST['contato_tipo'];
$contato_identificacao = $_POST['contato_identificacao'];
$habilitado = isset($_POST['habilitado']) ? 1 : 0;
$preferencial = isset($_POST['preferencial']) ? 1 : 0;


    // Prepara a consulta SQL de inserção

    $sql = "INSERT INTO aux_contatos ( id_funcionario, data, contato_tipo, contato_identificacao, habilitado, preferencial)
    VALUES ( '$id_funcionario', '$data', '$contato_tipo', '$contato_identificacao', '$habilitado', '$preferencial')";
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
