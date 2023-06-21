<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$dataHoraAtual = date("Y-m-d H:i:s");
// echo $dataHoraAtual;

$nome_area = $_POST["nome_area"];

// $habilitado = isset($_POST['habilitado']) ? 1 : 0;
$habilitado = ($_POST['habilitado'] == "true") ? 1 : 0;
// Insere os dados na tabela AUX_VT
$sql = "insert into aux_areas (nome_area,habilitado)
          values ( '$nome_area','$habilitado')";
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
$conn->close();

// Retorna a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
