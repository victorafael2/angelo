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
$pix_tipo = $_POST['pix_tipo'];
$pix_identificacao = $_POST['pix_identificacao'];
$banco_numero = $_POST['banco_numero'];
$banco_nome = $_POST['banco_nome'];
$banco_tipo_conta = $_POST['banco_tipo_conta'];
$banco_agencia = $_POST['banco_agencia'];
$banco_dv_agencia = $_POST['banco_dv_agencia'];
$banco_conta = $_POST['banco_conta'];
$banco_dv_conta = $_POST['banco_dv_conta'];
$habilitado = isset($_POST['habilitado']) ? 1 : 0;
$preferencial = isset($_POST['preferencial']) ? 1 : 0;


    // Prepara a consulta SQL de inserção

$sql = "insert into aux_info_bancario (id_funcionario, data, pix_tipo, pix_identificacao, banco_numero, banco_nome, banco_tipo_conta, banco_agencia, banco_dv_agencia, banco_conta, banco_dv_conta, habilitado, preferencial)
values ('$id_funcionario', '$data', '$pix_tipo', '$pix_identificacao', '$banco_numero', '$banco_nome', '$banco_tipo_conta', '$banco_agencia', '$banco_dv_agencia', '$banco_conta', '$banco_dv_conta', '$habilitado', '$preferencial')";
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
