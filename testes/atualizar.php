<?php
// Configuração do banco de dados
include '../database/databaseconnect.php';

// Recupera os dados enviados via POST
$id = $_POST['id'];
$campo = $_POST['campo'];
$novoValor = $_POST['novoValor'];

// Cria a conexão com o banco de dados


// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Atualiza o valor no banco de dados
$sql = "UPDATE tabela_exemplo SET $campo = '$novoValor' WHERE id = '$id'";
if ($conn->query($sql) === TRUE) {
    echo "Atualização realizada com sucesso.";
} else {
    echo "Erro ao atualizar o registro: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
