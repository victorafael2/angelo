<?php
include '../../../database/databaseconnect.php';

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Processar os dados do formulário e inserir no banco de dados
$dataCadastro = $_POST['dataCadastro'];
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
$ctpsNumero = $_POST['ctpsNumero'];
$ctpsSerie = $_POST['ctpsSerie'];
$ctpsDataEmissao = $_POST['ctpsDataEmissao'];
$ctpsUF = $_POST['ctpsUF'];
$pisNumero = $_POST['pisNumero'];
$eSocial = $_POST['eSocial'];
$sigilo = $_POST['sigilo'];

$sql = "INSERT INTO funcionarios (dataCadastro, cpf, dataAdmissao, dataDemissao, dataNascimento, rgNumero, rgEmissor, rgUF, rgDataEmissao, cnhNumero, cnhTipo, ctpsNumero, ctpsSerie, ctpsDataEmissao, ctpsUF, pisNumero, eSocial, sigilo)
        VALUES ('$dataCadastro', '$cpf', '$dataAdmissao', '$dataDemissao', '$dataNascimento', '$rgNumero', '$rgEmissor', '$rgUF', '$rgDataEmissao', '$cnhNumero', '$cnhTipo', '$ctpsNumero', '$ctpsSerie', '$ctpsDataEmissao', '$ctpsUF', '$pisNumero', '$eSocial', '$sigilo')";

if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir os dados: " . $conn->error;
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
