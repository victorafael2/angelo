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
    $vt_nome_modal = $_POST['vr_nome_modal'];
    $vt_valor_modal = $_POST['vr_valor_modal'];


   $id_vr = $_POST['id_modal'];

    // Atualize os dados no banco de dados
    $sql = "UPDATE aux_vr SET
            vr_nome = '$vt_nome_modal',
            vr_valor = '$vt_valor_modal'



            WHERE id_vr = $id_vr"; // Substitua 'sua_tabela' e 'seu_id' pelos valores corretos

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

