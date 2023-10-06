<?php
// Conectar ao banco de dados
include '../../database/databaseconnect.php';

if ($_POST['action'] == 'open') {
    // Registre a abertura da página no banco de dados
    $page = $_POST['page'];

    $start_time = date('Y-m-d H:i:s');
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : $_SESSION['email'];

    $sql = "INSERT INTO logs (user_id, page_name, start_time) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iss', $user_id, $page, $start_time);
    $stmt->execute();
    $stmt->close();
} elseif ($_POST['action'] == 'close') {
    // Registre o fechamento da página no banco de dados
    $page = $_POST['page'];
    $duration = $_POST['duration'];
    $end_time = date('Y-m-d H:i:s');

    $sql = "UPDATE logs SET end_time=?, duration_seconds=? WHERE user_id=? AND page_name=? AND end_time IS NULL";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sdss', $end_time, $duration, $user_id, $page);
    $stmt->execute();
    $stmt->close();
}

// Feche a conexão com o banco de dados
$conn->close();
?>
