<?php
// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $reportName = $_POST["reportName"];
    $reportLink = $_POST["reportLink"];
    $reporDesc = $_POST["reporDesc"];
    $activateReport = isset($_POST["activateReport"]) ? 1 : 0;

    // Configuração da conexão com o banco de dados (substitua com suas próprias informações)
    include '../../../database/databaseconnect.php';

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Prepara a instrução SQL
    $sql = "INSERT INTO relatorios (nome, link, ativo,descricao) VALUES ('$reportName', '$reportLink', '$activateReport', '$reporDesc')";

    // Executa a instrução SQL
    if ($conn->query($sql) === TRUE) {
        // Retorna uma resposta de sucesso para o AJAX
        echo json_encode(["success" => true]);
    } else {
        // Retorna uma resposta de erro para o AJAX
        echo json_encode(["success" => false, "error" => "Erro ao salvar no banco de dados: " . $conn->error]);
    }

    // Fecha a conexão
    $conn->close();
} else {
    // Retorna uma resposta de erro para o AJAX
    echo json_encode(["success" => false, "error" => "Método não permitido"]);
}
?>
