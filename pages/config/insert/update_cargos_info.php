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
    $cargo_description = $_POST['cargo_description_modal'];
    $cargo_grupo = $_POST['cargo_grupo_modal'];
    $cargo_nivel = $_POST['cargo_nivel_modal'];
    $cargo_nome = $_POST['cargo_nome_modal'];

    $id_cargo = $_POST['id_area_cargos_modal'];
    $id_area = $_POST['id_modal'];





   $id_area = $_POST['id_modal'];

    // Atualize os dados no banco de dados
    $sql = "UPDATE aux_cargos SET
            cargo_nome = '$cargo_nome',
            cargo_grupo = '$cargo_grupo',
            cargo_nivel = '$cargo_nivel',
            cargo_description = '$cargo_description',
            id_area = '$id_cargo'


            WHERE id_cargo = $id_area"; // Substitua 'sua_tabela' e 'seu_id' pelos valores corretos

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

