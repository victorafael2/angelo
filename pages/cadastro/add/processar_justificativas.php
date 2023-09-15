<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados (substitua com suas credenciais)
   include '../../../database/databaseconnect.php';

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Configurar o conjunto de caracteres para utf8
    $conn->set_charset("utf8mb4");

    // Usar funções de escape para evitar injeção de SQL e tratar caracteres especiais
    $funcionarioData = explode('|', $conn->real_escape_string($_POST["funcionario"])); // Separa o valor do select
    $id_funcionario = $funcionarioData[0];
    $tipo = $funcionarioData[1];
    $data = $conn->real_escape_string($_POST["data"]);
    $descricao = $conn->real_escape_string($_POST["descricao"]);
    $inicio = $conn->real_escape_string($_POST["hora_inicio"]);
    $fim = $conn->real_escape_string($_POST["hora_fim"]);
    $user = $conn->real_escape_string($_POST["user"]);

    // Processar outros campos conforme necessário

    if ($_FILES["anexo"]["error"] == UPLOAD_ERR_OK) {
        $anexo_nome = $conn->real_escape_string($_FILES["anexo"]["name"]);
        $anexo_temp = $_FILES["anexo"]["tmp_name"];

        // Diretório onde serão armazenados os anexos
        $diretorio_anexos = "../../../uploads_justificativas/$id_funcionario/$tipo/";

        if (!is_dir($diretorio_anexos)) {
            // Se o diretório não existir, crie-o
            mkdir($diretorio_anexos, 0777, true);
        }

        $anexo_destino = $diretorio_anexos . $anexo_nome; // Caminho completo do anexo

        move_uploaded_file($anexo_temp, $anexo_destino);
    }

    // Inserir dados no banco de dados em colunas separadas
    $sql = "INSERT INTO justificativa (id_funcionario, tipo, data, descricao, anexo,inicio,fim,user) VALUES ('$id_funcionario', '$tipo', '$data', '$descricao', '$anexo_nome', '$inicio', '$fim','$user')";

    if ($conn->query($sql) === TRUE) {
        $response = array("status" => "success");
    } else {
        $response = array("status" => "error", "message" => "Erro ao inserir dados: " . $conn->error);
    }

    $conn->close();

    // Enviar resposta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);

    // Redirecionar ou fornecer feedback ao usuário
}
?>
