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

// Receba o nome da área do formulário
if (isset($_POST['ps_nome']) && !empty($_POST['ps_nome'])) {
    $nome_sistema = $_POST['ps_nome'];

} elseif (isset($_POST['vr_nome_modal']) && !empty($_POST['vr_nome_modal'])) {
    $nome_sistema = $_POST['vr_nome_modal'];

} else {
    // Lide com o caso em que nenhum dos campos está definido
    $response = array('status' => 'error', 'message' => 'O nome do VA não foi fornecido.');
    echo json_encode($response);
    exit; // Saia do script, pois não há um nome de área válido
}

// Verifique se o ID do modal foi passado
if (isset($_POST['id_modal']) && !empty($_POST['id_modal'])) {
    $id_modal = $_POST['id_modal'];
    // Consulta SQL para verificar se o nome da área já existe com exceção do ID fornecido
    $sql = "SELECT * FROM aux_plano_saude WHERE ps_nome = '$nome_sistema' AND  id_ps != $id_modal";
} else {
    // Consulta SQL para verificar se o nome da área já existe
    $sql = "SELECT * FROM aux_plano_saude WHERE ps_nome = '$nome_sistema' ";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // O nome da área já existe, retorne uma mensagem de erro
    $response = array('status' => 'error', 'message' => 'O nome do VA já existe no banco de dados.');
} else {
    // O nome da área não existe, retorne uma mensagem de sucesso
    $response = array('status' => 'success', 'message' => 'Nome do VA disponível.');
}

// Feche a conexão com o banco de dados
$conn->close();

// Retorne a resposta como JSON
echo json_encode($response);
?>
