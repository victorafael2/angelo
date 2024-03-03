<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Inicializa um array para armazenar a resposta
$response = array();

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os valores dos campos do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    // Verifica se a imagem foi enviada
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        // Obtem o conteúdo do arquivo
        $imagem_temp = $_FILES['imagem']['tmp_name'];

        // Lê o conteúdo do arquivo e codifica para base64
        $imagem_base64 = base64_encode(file_get_contents($imagem_temp));
    }

    // Atualiza o registro no banco de dados com os dados e a imagem, se disponível
    $sql = "UPDATE user SET name=?, telefone=?";
    $bind_types = "ss";
    $bind_params = array($name, $telefone);

    // Se a imagem estiver disponível, atualize o campo de imagem também
    if(isset($imagem_base64)) {
        $sql .= ", picture_profile=?";
        $bind_types .= "s";
        $bind_params[] = $imagem_base64;
    }

    $sql .= " WHERE email=?";
    $bind_types .= "s";
    $bind_params[] = $email;

    $stmt = $conn->prepare($sql);

    // Verifica se a preparação da consulta foi bem-sucedida
    if ($stmt) {
        // Faz o binding dos parâmetros
        $stmt->bind_param($bind_types, ...$bind_params);

        // Executa a consulta
        if ($stmt->execute()) {
            // Configura a resposta para sucesso
            $response['status'] = 'success';
            $response['message'] = 'Dados atualizados com sucesso!';
        } else {
            // Configura a resposta para erro
            $response['status'] = 'error';
            $response['message'] = 'Ocorreu um erro ao atualizar as informações do usuário.';
        }

        // Fecha o statement
        $stmt->close();
    } else {
        // Se a preparação da consulta falhou, configura a resposta para erro
        $response['status'] = 'error';
        $response['message'] = 'Ocorreu um erro ao preparar a consulta.';
    }
} else {
    // Se a requisição não for do tipo POST, configura a resposta para erro
    $response['status'] = 'error';
    $response['message'] = 'Requisição inválida.';
}

// Envia a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
