<?php
// Verifique se a solicitação POST foi enviada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecte-se ao banco de dados (substitua as credenciais com as suas)
    // Conecte-se ao seu banco de dados
    include '../../../database/databaseconnect.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
    }

    // Obtenha os valores da solicitação POST
    $id = $_POST['id']; // Suponha que 'id' seja o nome do campo no seu formulário
    $justificativa = $_POST['justificativa']; // O nome do campo da caixa de texto no formulário

    // Atualize o banco de dados com os valores
    $sql = "UPDATE justificativa SET aprovado = 0, justificativa = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $justificativa, $id);

    if ($stmt->execute()) {
        echo "Dados atualizados com sucesso.";
    } else {
        echo "Erro ao atualizar os dados: " . $stmt->error;
    }

    // Feche a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>
