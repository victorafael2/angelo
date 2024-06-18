<?php
// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $reportName = $_POST["reportName"];
    $reportTipoLInk = $_POST["reportTipoLInk"];
    $reportLink = $_POST["reportLink"];
    $escaped_iframe_code = htmlspecialchars($reportLink, ENT_QUOTES, 'UTF-8');
    $reporDesc = $_POST["reporDesc"];
    $activateReport = isset($_POST["activateReport"]) ? 1 : 0;
    $reporAltura = $_POST["reporAltura"];

    // Configuração da conexão com o banco de dados (substitua com suas próprias informações)
    include '../../../database/databaseconnect.php';

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Prepara a instrução SQL
    $sql = "INSERT INTO relatorios (nome, link, ativo,descricao,tipolink,altura) VALUES ('$reportName', '$escaped_iframe_code', '$activateReport', '$reporDesc','$reportTipoLInk','$reporAltura')";

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
