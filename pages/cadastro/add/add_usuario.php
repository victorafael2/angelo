<?php
include '../../../database/databaseconnect.php';
date_default_timezone_set('America/Fortaleza');
// Criar a conexão
// $conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Processar os dados do formulário e inserir no banco de dados
// $dataCadastro = $_POST['dataCadastro'];
$cpf = $_POST['cpf'];
$dataAdmissao = $_POST['dataAdmissao'];
// $dataDemissao = $_POST['dataDemissao'];
$dataNascimento = $_POST['dataNascimento'];
$rgNumero = $_POST['rgNumero'];
$rgEmissor = $_POST['rgEmissor'];
$rgUF = $_POST['rgUF'];
$rgDataEmissao = $_POST['rgDataEmissao'];
$cnhNumero = $_POST['cnhNumero'];
// $cnhTipo = $_POST['cnhTipo'];
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
// $ctpsNumero = $_POST['ctpsNumero'];
// $ctpsSerie = $_POST['ctpsSerie'];
// $ctpsDataEmissao = $_POST['ctpsDataEmissao'];
// $ctpsUF = $_POST['ctpsUF'];
// $pisNumero = $_POST['pisNumero'];
$eSocial = $_POST['eSocial'];
$sigilo = $_POST['sigilo'];
$eleitor = $_POST['eleitor'];
$user = $_POST['user'];

$sql = "INSERT INTO funcionarios ( cpf, dataAdmissao, dataNascimento, rgNumero, rgEmissor, rgUF, rgDataEmissao, cnhNumero, cnhTipo,  eSocial,eleitor, sigilo,user)
        VALUES ( '$cpf', '$dataAdmissao', '$dataNascimento', '$rgNumero', '$rgEmissor', '$rgUF', '$rgDataEmissao', '$cnhNumero', '$cnhTipo',  '$eSocial','$eleitor', '$sigilo', '$user')";

if ($conn->query($sql) === TRUE) {
    $lastInsertedId = $conn->insert_id;
    echo $lastInsertedId;

} else {
    echo "Erro ao inserir os dados: " . $conn->error;
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
