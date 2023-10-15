<?php
// Conecte-se ao banco de dados (substitua com suas credenciais)
include '../../../database/databaseconnect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifique a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receba o nome da filial do formulário
if (isset($_POST['filial_nome']) && !empty($_POST['filial_nome'])) {
    $filial_nome = $_POST['filial_nome'];
} elseif (isset($_POST['filial_nome_modal']) && !empty($_POST['filial_nome_modal'])) {
    $filial_nome = $_POST['filial_nome_modal'];
} else {
    // Lide com o caso em que nenhum dos campos está definido
    $response = array('status' => 'error', 'message' => 'O nome da filial não foi fornecido.');
    echo json_encode($response);
    exit; // Saia do script, pois não há um nome de filial válido
}

// Verifique se o ID do modal foi passado
if (isset($_POST['id_filial_modal']) && !empty($_POST['id_filial_modal'])) {
    $id_filial_modal = $_POST['id_filial_modal'];
    // Consulta SQL para verificar se o nome da filial já existe com exceção do ID fornecido
    $sql = "SELECT * FROM aux_filiais WHERE filial_nome = '$filial_nome' AND id_filial != $id_filial_modal";
} else {
    // Consulta SQL para verificar se o nome da filial já existe
    $sql = "SELECT * FROM aux_filiais WHERE filial_nome = '$filial_nome'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // O nome da filial já existe, retorne uma mensagem de erro
    $response = array('status' => 'error', 'message' => 'O nome da filial já existe no banco de dados.');
} else {
    // O nome da filial não existe, retorne uma mensagem de sucesso
    $response = array('status' => 'success', 'message' => 'Nome da filial disponível.');
}

// Feche a conexão com o banco de dados
$conn->close();

// Retorne a resposta como JSON
echo json_encode($response);
?>
