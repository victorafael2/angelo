<?php
// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Faça a conexão com o banco de dados (substitua com suas próprias credenciais)
    include '../../../database/databaseconnect.php';

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Recupera os dados do formulário
    $id_area_modal = $_POST['id_area_modal'];
    $nome_operacao_modal = $_POST['nome_operacao_modal'];
    $hr_ini_seg_modal = $_POST['hr_ini_seg_modal'];
    $hr_fim_seg_modal = $_POST['hr_fim_seg_modal'];
    $hr_ini_ter_modal = $_POST['hr_ini_ter_modal'];
    $hr_fim_ter_modal = $_POST['hr_fim_ter_modal'];
    $hr_ini_qua_modal = $_POST['hr_ini_qua_modal'];
    $hr_fim_qua_modal = $_POST['hr_fim_qua_modal'];
    $hr_ini_qui_modal = $_POST['hr_ini_qui_modal'];
    $hr_fim_qui_modal = $_POST['hr_fim_qui_modal'];
    $hr_ini_sex_modal = $_POST['hr_ini_sex_modal'];
    $hr_fim_sex_modal = $_POST['hr_fim_sex_modal'];
    $hr_ini_sab_modal = $_POST['hr_ini_sab_modal'];
    $hr_fim_sab_modal = $_POST['hr_fim_sab_modal'];
    $hr_ini_dom_modal = $_POST['hr_ini_dom_modal'];
    $hr_fim_dom_modal = $_POST['hr_fim_dom_modal'];
   $id_operacao = $_POST['id_modal'];

    // Atualize os dados no banco de dados
    $sql = "UPDATE aux_operacoes SET
            id_area = '$id_area_modal',
            nome_operacao = '$nome_operacao_modal',
            hr_ini_seg = '$hr_ini_seg_modal',
            hr_fim_seg = '$hr_fim_seg_modal',
            hr_ini_ter = '$hr_ini_ter_modal',
            hr_fim_ter = '$hr_fim_ter_modal',
            hr_ini_qua = '$hr_ini_qua_modal',
            hr_fim_qua = '$hr_fim_qua_modal',
            hr_ini_qui = '$hr_ini_qui_modal',
            hr_fim_qui = '$hr_fim_qui_modal',
            hr_ini_sex = '$hr_ini_sex_modal',
            hr_fim_sex = '$hr_fim_sex_modal',
            hr_ini_sab = '$hr_ini_sab_modal',
            hr_fim_sab = '$hr_fim_sab_modal',
            hr_ini_dom = '$hr_ini_dom_modal',
            hr_fim_dom = '$hr_fim_dom_modal'
            WHERE id_operacao = $id_operacao"; // Substitua 'sua_tabela' e 'seu_id' pelos valores corretos

    if ($conn->query($sql) === TRUE) {
        // Resposta de sucesso
        $response = array('success' => true);
    } else {
        // Resposta de erro
        $response = array('success' => false, 'error' => $conn->error);
    }

    // Fecha a conexão com o banco de dados
    $conn->close();

    // Retorna a resposta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Se a requisição não for do tipo POST, retorna um erro
    header('HTTP/1.1 405 Method Not Allowed');
    echo 'Método não permitido';
}
?>

