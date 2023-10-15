<?php
// Conectar ao banco de dados
include '../../database/databaseconnect.php';

if ($_POST['action'] == 'open') {
    // Gere um ID único para o registro


    // Registre a abertura da página no banco de dados
    $page = $_POST['page_id'];
    $unique_id = $_POST['uniqueID'];

    $start_time = date('Y-m-d H:i:s');
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : $_SESSION['email'];

    $sql = "INSERT INTO logs (unique_id, user_id, page_name, start_time) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $unique_id, $user_id, $page, $start_time);
    $stmt->execute();
    $stmt->close();

    // Formate o SQL com valores
    $formattedSql = vsprintf(str_replace('?', '"%s"', $sql), [$unique_id, $user_id, $page, $start_time]);

    $response = [
        "message" => "Registro de abertura salvo com sucesso.",
        "sql" => $formattedSql
    ];

    echo json_encode($response);
} elseif ($_POST['action'] == 'close') {
    // Registre o fechamento da página no banco de dados
    $page = $_POST['page_id'];
    $duration = $_POST['duration'];
    $end_time = date('Y-m-d H:i:s');
    $unique_id = $_POST['uniqueID']; // Obtém o ID único do registro

    $sql = "UPDATE logs SET end_time=?, duration_seconds=? WHERE unique_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $end_time, $duration, $unique_id);
    $stmt->execute();
    $stmt->close();

    // Formate o SQL com valores
    $formattedSql = vsprintf(str_replace('?', '"%s"', $sql), [$end_time, $duration, $unique_id]);

    $response = [
        "message" => "Registro de fechamento salvo com sucesso.",
        "sql" => $formattedSql
    ];

    echo json_encode($response);
}

// Feche a conexão com o banco de dados
$conn->close();
?>
