<?php
// Configuração do banco de dados
include '../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta SQL para recuperar os dados
$sql = "SELECT id, nome, campo1, campo2 FROM tabela_exemplo";
$result = $conn->query($sql);

// Cria o array de dados para o Bootstrap Table
$rows = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}

// Retorna os dados como JSON para o Bootstrap Table
echo json_encode($rows);

// Fecha a conexão com o banco de dados
$conn->close();
?>
