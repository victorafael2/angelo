<?php
// Conexão com o banco de dados (substitua pelas suas configurações)
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Coleta os dados do formulário
$menu_name = $_POST['menu_name'];
$icone = $_POST['icone'];
$breve = $_POST['breve'];

// Prepara e executa a inserção na tabela de menu
$sql = "INSERT INTO menu (menu_name, icone, breve) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $menu_name, $icone, $breve);

if ($stmt->execute()) {
    echo "success"; // Envie uma resposta de sucesso de volta para o AJAX
} else {
    echo "error"; // Envie uma resposta de erro de volta para o AJAX
}

// Fecha a conexão com o banco de dados
$stmt->close();
$conn->close();
?>
