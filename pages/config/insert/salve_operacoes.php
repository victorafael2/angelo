<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$dataHoraAtual = date("Y-m-d H:i:s");

// Obtém os dados do formulário
$id_area = $_POST['id_area'];
$nome_operacao = $_POST['nome_operacao'];
$hr_ini_seg = $_POST['hr_ini_seg'];
$hr_fim_seg = $_POST['hr_fim_seg'];
$hr_ini_ter = $_POST['hr_ini_ter'];
$hr_fim_ter = $_POST['hr_fim_ter'];
$hr_ini_qua = $_POST['hr_ini_qua'];
$hr_fim_qua = $_POST['hr_fim_qua'];
$hr_ini_qui = $_POST['hr_ini_qui'];
$hr_fim_qui = $_POST['hr_fim_qui'];
$hr_ini_sex = $_POST['hr_ini_sex'];
$hr_fim_sex = $_POST['hr_fim_sex'];
$hr_ini_sab = $_POST['hr_ini_sab'];
$hr_fim_sab = $_POST['hr_fim_sab'];
$hr_ini_dom = $_POST['hr_ini_dom'];
$hr_fim_dom = $_POST['hr_fim_dom'];
$habilitado = isset($_POST['habilitado']) ? 1 : 0;

// Insere os dados na tabela AUX_OPERACOES
$sql = "INSERT INTO aux_operacoes (id_area, nome_operacao, hr_ini_seg, hr_fim_seg, hr_ini_ter, hr_fim_ter, hr_ini_qua, hr_fim_qua, hr_ini_qui, hr_fim_qui, hr_ini_sex, hr_fim_sex, hr_ini_sab, hr_fim_sab, hr_ini_dom, hr_fim_dom, habilitado) VALUES ('$id_area', '$nome_operacao', '$hr_ini_seg', '$hr_fim_seg', '$hr_ini_ter', '$hr_fim_ter', '$hr_ini_qua', '$hr_fim_qua', '$hr_ini_qui', '$hr_fim_qui', '$hr_ini_sex', '$hr_fim_sex', '$hr_ini_sab', '$hr_fim_sab', '$hr_ini_dom', '$hr_fim_dom', '$habilitado')";

if ($conn->query($sql) === TRUE) {
    $response = array(
        'status' => true,
        'message' => 'As informações foram salvas com sucesso.'
    );
} else {
    $response = array(
        'status' => false,
        'message' => 'Erro ao salvar as informações.'
    );
}

// Fecha a conexão com o banco de dados
$conn->close();

// Retorna a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

