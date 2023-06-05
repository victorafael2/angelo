<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$dataHoraAtual = date("Y-m-d H:i:s");
// echo $dataHoraAtual;

$idFilial = $_POST["id_filial"];
$filialNome = $_POST["filial_nome"];
$filialCNPJ = $_POST["filial_cnpj"];
$enderecoRua = $_POST["endereco_rua"];
$enderecoNumero = $_POST["endereco_numero"];
$enderecoComp = $_POST["endereco_comp"];
$enderecoBairro = $_POST["endereco_bairro"];
$enderecoCidade = $_POST["endereco_cidade"];
$enderecoUF = $_POST["endereco_uf"];
$enderecoCEP = $_POST["endereco_cep"];
$nomeResponsavel = $_POST["nome_responsavel"];
$cpfResponsavel = $_POST["cpf_responsavel"];
$idContatos = $_POST["id_contatos"];
$habilitado = $_POST["habilitado"];

// Insere os dados na tabela AUX_VT
$sql = "insert into aux_filiais (id_filial, filial_nome, filial_cnpj, endereco_rua, endereco_numero, endereco_comp, endereco_bairro, endereco_cidade, endereco_uf, endereco_cep, nome_responsavel, cpf_responsavel, id_contatos, habilitado)
          values ('$idFilial', '$filialNome', '$filialCNPJ', '$enderecoRua', '$enderecoNumero', '$enderecoComp', '$enderecoBairro', '$enderecoCidade', '$enderecoUF', '$enderecoCEP', '$nomeResponsavel', '$cpfResponsavel', '$idContatos', '$habilitado')";
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
