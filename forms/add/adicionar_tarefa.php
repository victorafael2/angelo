<?php
// Conexão com o banco de dados
include ("../../database/databaseconnect.php");

if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

// Adiciona a nova tarefa à tabela de tarefas
$tarefa = $_POST["tarefa"];
$descricao = $_POST["descricao"];
$inicio = $_POST["inicio"];
$fim = $_POST["fim"];
$id_rel = $_POST["id_rel"];
$sql = "INSERT INTO tarefas (tarefa, descricao, inicio, fim, id_rel) VALUES ('$tarefa', '$descricao', '$inicio', '$fim', '$id_rel')";
if ($conn->query($sql) === TRUE) {
  echo "Tarefa adicionada com sucesso!";
} else {
  echo "Erro ao adicionar a tarefa: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
