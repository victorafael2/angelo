<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$dataHoraAtual = date("Y-m-d H:i:s");
// echo $dataHoraAtual;

    $cnpj = $_POST['cnpj'];
    $nome_fantasia = $_POST['nome_fantasia'];
    $razao_social = $_POST['razao_social'];
    $abertura = $_POST['abertura'];
    $atividade_principal = $_POST['atividade_principal'];
    $logradouro = $_POST['logradouro'];
    $municipio = $_POST['municipio'];
    $situacao = $_POST['situacao'];
    $porte = $_POST['porte'];
    $uf = $_POST['uf'];
    $tipo = $_POST['tipo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $dataCadastro = $_POST['dataCadastro'];
    $dataAdmissao = $_POST['dataAdmissao'];
    $dataDemissao = $_POST['dataDemissao'];
    $dataNascimento = $_POST['dataNascimento'];
    $cnhNumero = $_POST['cnhNumero'];
    // $cnhTipo = isset($_POST['cnhTipo']) ? implode(',', $_POST['cnhTipo']) : '';
    $usuariosString = $_POST['modal-usuarios']; // String JSON dos valores selecionados do campo "mySelect"
$usuarios = json_decode($usuariosString); // Decodifica o JSON em um array

// Verifica se $usuarios é um array antes de continuar
if (is_array($usuarios)) {
    $usuariosString = implode(', ', $usuarios); // Converte o array em uma string separada por vírgulas
} else {
    // Trate o caso em que $usuarios não é um array, se necessário
}

// Insere os dados na tabela AUX_VT
$sql = "INSERT INTO funcionarios_cnpj (cnpj, nome_fantasia, razao_social, abertura, atividade_principal, logradouro, municipio, situacao, porte, uf, tipo, email, telefone, dataCadastro, dataAdmissao, dataDemissao, dataNascimento, cnhNumero, cnhTipo)
VALUES ('$cnpj', '$nome_fantasia', '$razao_social', '$abertura', '$atividade_principal', '$logradouro', '$municipio', '$situacao', '$porte', '$uf', '$tipo', '$email', '$telefone', '$dataCadastro', '$dataAdmissao', '$dataDemissao', '$dataNascimento', '$cnhNumero', '$cnhTipo')";
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
