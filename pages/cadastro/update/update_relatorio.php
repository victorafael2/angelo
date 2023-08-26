<?php
// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário de edição
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $link = $_POST["link"];
    $desc = $_POST["desc"];
    $ativo = isset($_POST["ativo"]) ? 1 : 0;

    // Configuração da conexão com o banco de dados (substitua com suas próprias informações)
    include '../../../database/databaseconnect.php';

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Prepara a instrução SQL
    $sql = "UPDATE relatorios SET nome='$nome', link='$link', ativo='$ativo', descricao = '$desc' WHERE id='$id'";

    // Executa a instrução SQL
    if ($conn->query($sql) === TRUE) {
        // Retorna uma resposta de sucesso para o AJAX
        echo json_encode(["success" => true]);
    } else {
        // Retorna uma resposta de erro para o AJAX
        echo json_encode(["success" => false, "error" => "Erro ao salvar as alterações no relatório: " . $conn->error]);
    }

    // Fecha a conexão
    $conn->close();
} else {
    // Retorna uma resposta de erro para o AJAX
    echo json_encode(["success" => false, "error" => "Método não permitido"]);
}
?>
