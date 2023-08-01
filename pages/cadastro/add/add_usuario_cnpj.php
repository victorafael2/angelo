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
    $dataCadastro =date("Y-m-d H:i:s");
    $dataAdmissao = $_POST['dataAdmissao'];
    $dataDemissao = $_POST['dataDemissao'];
    $dataNascimento = $_POST['dataNascimento'];
    $cnhNumero = $_POST['cnhNumero'];
    $cnhTipos = $_POST['cnhTipo']; // $cnhTipos é um array contendo os valores recebidos

// Transforma $cnhTipos em um array, mesmo que contenha apenas um valor
$cnhTipos = (array) $cnhTipos;

// Remove os valores nulos do array $cnhTipos
$cnhTipos = array_filter($cnhTipos, function ($value) {
    return $value !== null;
});

// Verificar se o array $cnhTipos não está vazio após remover os nulos
if (!empty($cnhTipos)) {
  // Juntar os valores do campo cnhTipo em um único valor separado por vírgulas
  $cnhTipo = implode(',', $cnhTipos);

  // Agora você pode usar a variável $cnhTipo como o valor desejado no banco de dados

  // Exemplo de exibição dos valores
//   echo $cnhTipo;
}

    $cpf = $_POST['cpf'];

    $rg = $_POST['rg'];

    $nome_resp = $_POST['nome_resp'];

    $endereco_resp = $_POST['endereco_resp'];

    // $usuariosString = $_POST['modal-usuarios']; // String JSON dos valores selecionados do campo "mySelect"
// $usuarios = json_decode($usuariosString); // Decodifica o JSON em um array

// Verifica se $usuarios é um array antes de continuar
// if (is_array($usuarios)) {
//     $usuariosString = implode(', ', $usuarios); // Converte o array em uma string separada por vírgulas
// } else {
//     // Trate o caso em que $usuarios não é um array, se necessário
// }

// Insere os dados na tabela AUX_VT
$sql = "INSERT INTO funcionarios_cnpj (cnpj, nome_fantasia, razao_social, abertura, atividade_principal, logradouro, municipio, situacao, porte, uf, tipo, email, telefone, dataCadastro, dataAdmissao, dataDemissao, dataNascimento, cnhNumero, cnhTipo,cpf,rg,nome_resp,endereco_resp)
VALUES ('$cnpj', '$nome_fantasia', '$razao_social', '$abertura', '$atividade_principal', '$logradouro', '$municipio', '$situacao', '$porte', '$uf', '$tipo', '$email', '$telefone', '$dataCadastro', '$dataAdmissao', '$dataDemissao', '$dataNascimento', '$cnhNumero', '$cnhTipo','$cpf','$rg','$nome_resp','$endereco_resp')";

if ($conn->query($sql) === TRUE) {
    $lastInsertedId = $conn->insert_id; // Usando insert_id para obter o ID inserido
    $response = array(
        'status' => true,
        'message' => 'As informações foram salvas com sucesso.',
        'inserted_id' => $lastInsertedId
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
