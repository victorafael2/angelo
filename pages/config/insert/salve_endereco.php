<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$dataHoraAtual = date("Y-m-d H:i:s");
// echo $dataHoraAtual;
// Pegar dados do formulário
$idFuncionario = $_POST['id_funcionario'];
$dataAcesso = $_POST['data'];
$enderecoRua = $_POST['endereco_rua'];
$enderecoNumero = $_POST['endereco_numero'];
$enderecoComp = $_POST['endereco_comp'];
$enderecoBairro = $_POST['endereco_bairro'];
$enderecoCidade = $_POST['endereco_cidade'];
$enderecoUf = $_POST['endereco_uf'];
$enderecoCep = $_POST['endereco_cep'];
$habilitadoAcesso = isset($_POST['habilitado']) ? 1 : 0;
$preferencial = isset($_POST['preferencial']) ? 1 : 0;


    // Prepara a consulta SQL de inserção

$sql = "insert into aux_info_endereco (id_funcionario, data, endereco_rua, endereco_numero, endereco_comp, endereco_bairro, endereco_cidade, endereco_uf, endereco_cep, habilitado, preferencial)
values ('$idFuncionario', '$dataAcesso', '$enderecoRua', '$enderecoNumero', '$enderecoComp', '$enderecoBairro', '$enderecoCidade', '$enderecoUf', '$enderecoCep', '$habilitadoAcesso', '$preferencial' )";
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
