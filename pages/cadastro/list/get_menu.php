<?php
// Conexão com o banco de dados (substitua pelas suas configurações)
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta SQL para buscar informações dos menus
$sql = "SELECT menu_id, menu_name FROM menu";
$result = $conn->query($sql);

$menus = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menus[] = $row;
    }
}

// Fecha a conexão com o banco de dados
$conn->close();

// Retorna os resultados como JSON
header('Content-Type: application/json');
echo json_encode($menus);
?>
