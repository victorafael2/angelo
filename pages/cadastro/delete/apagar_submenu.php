<?php
// Conexão com o banco de dados (substitua pelas suas configurações)
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submenu_id = $_POST['submenu_id'];

    // Prepara e executa a exclusão do submenu
    $sql = "DELETE FROM submenu WHERE submenu_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $submenu_id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
