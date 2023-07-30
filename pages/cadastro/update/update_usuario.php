<?php
include '../../../database/databaseconnect.php';
date_default_timezone_set('America/Fortaleza');
// Criar a conexão
// $conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Processar os dados do formulário e atualizar no banco de dados
// $funcionarioId = $_POST['funcionarioId']; // ID do funcionário que será atualizado

$cpf = $_POST['cpf'];
$dataAdmissao = $_POST['dataAdmissao'];
$dataDemissao = $_POST['dataDemissao'];
$dataNascimento = $_POST['dataNascimento'];
$rgNumero = $_POST['rgNumero'];
$rgEmissor = $_POST['rgEmissor'];
$rgUF = $_POST['rgUF'];
$rgDataEmissao = $_POST['rgDataEmissao'];
$cnhNumero = $_POST['cnhNumero'];
$cnhTipo = $_POST['cnhTipo'];

$eSocial = $_POST['eSocial'];
$sigilo = $_POST['sigilo'];
$eleitor = $_POST['eleitor'];

$idFuncionario = $_POST['idFuncioanrio'];

$sql = "UPDATE funcionarios SET

        cpf = '$cpf',
        dataAdmissao = '$dataAdmissao',
        dataDemissao = '$dataDemissao',
        dataNascimento = '$dataNascimento',
        rgNumero = '$rgNumero',
        rgEmissor = '$rgEmissor',
        rgUF = '$rgUF',
        rgDataEmissao = '$rgDataEmissao',
        cnhNumero = '$cnhNumero',
        cnhTipo = '$cnhTipo',

        eSocial = '$eSocial',
        sigilo = '$sigilo',
        eleitor = '$eleitor'
        WHERE idFuncionario = $idFuncionario";

if ($conn->query($sql) === TRUE) {
    // $lastInsertedId = $conn->insert_id;
    echo $idFuncionario;
} else {
    echo "Erro ao atualizar os dados: " . $conn->error;
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
