<?php
include '../../../database/databaseconnect.php';

// Verifique se o ID do arquivo foi passado corretamente via parâmetros GET
if (isset($_POST['file_id'])) {
    $fileId = $_POST['file_id'];

    // Verifique se o ID do arquivo é um número inteiro
    if (filter_var($fileId, FILTER_VALIDATE_INT)) {
        // Supondo que você já tenha uma conexão com o banco de dados $conn

        // Consulta SQL para excluir o registro com base no ID do arquivo
        $sql = "DELETE FROM arquivos_usuario WHERE id = '$fileId'";

        // Execute a consulta
        if ($conn->query($sql) === TRUE) {
            // A exclusão foi bem-sucedida
            // Você pode redirecionar de volta para a página anterior ou exibir uma mensagem de sucesso, etc.
            echo "success";
        } else {
            // A exclusão falhou, você pode exibir uma mensagem de erro, se necessário
          //  echo "Erro ao excluir o arquivo: " . $conn->error;
            echo $sql;
        }
    } else {
        // O ID do arquivo não é válido, exiba uma mensagem de erro
        echo "ID de arquivo inválido.";
    }
} else {
    // Se o ID do arquivo não foi passado corretamente, redirecione ou exiba uma mensagem de erro.
    // echo "ID de arquivo ausente.";
    echo $sql;
}
?>
