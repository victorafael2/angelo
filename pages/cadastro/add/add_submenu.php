<?php
// Conexão com o banco de dados (substitua pelas suas configurações)
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submenu_name = $_POST['submenu_name'];
    $submenu_link = $_POST['submenu_link'];
    $menu_id = $_POST['menu_id'];
    $mostrar = $_POST['mostrar'];
    $tipo = $_POST['tipo'];
    $icone = $_POST['icone'];

    // Prepara e executa a inserção na tabela de submenu
    $sql = "INSERT INTO submenu (submenu_name, submenu_link, menu_id, mostrar, tipo, icone) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiss", $submenu_name, $submenu_link, $menu_id, $mostrar, $tipo, $icone);

    if ($stmt->execute()) {
        echo "success"; // Envie uma resposta de sucesso de volta para o AJAX
    } else {
        echo "error"; // Envie uma resposta de erro de volta para o AJAX
    }

    $stmt->close();
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
