<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$dataHoraAtual = date("Y-m-d H:i:s");
// echo $dataHoraAtual;

$id_area = $_POST["id_area"];
$cargo_nome = $_POST["cargo_nome"];
$cargo_grupo = $_POST["cargo_grupo"];
$cargo_nivel = $_POST["cargo_nivel"];
$cargo_description = $_POST["cargo_description"];
$habilitado = ($_POST['habilitado'] == "true") ? 1 : 0;
$sys_user = $_POST["sys_user"];

// Insere os dados na tabela AUX_VT
$sql = "INSERT INTO aux_cargos (id_area, cargo_nome, cargo_grupo, cargo_nivel, cargo_description, habilitado, sys_user, sys_data)
VALUES ('$id_area', '$cargo_nome', '$cargo_grupo', '$cargo_nivel', '$cargo_description', '$habilitado', '$sys_user', '$dataHoraAtual')";
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
