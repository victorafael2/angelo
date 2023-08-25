<?php
// Conexão com o banco de dados (substitua pelas suas configurações)
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submenu_id = $_POST['submenu_id'];
    $submenu_name = $_POST['submenu_name'];
    $submenu_link = $_POST['submenu_link'];
    $menu_id = $_POST['menu_id'];
    $mostrar = $_POST['mostrar'];
    $tipo = $_POST['tipo'];
    $icone = $_POST['icone'];

    // Prepara e executa a atualização dos dados do submenu
    $sql = "UPDATE submenu SET submenu_name = ?, submenu_link = ?, menu_id = ?, mostrar = ?, tipo = ?, icone = ? WHERE submenu_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssissi", $submenu_name, $submenu_link, $menu_id, $mostrar, $tipo, $icone, $submenu_id);

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
