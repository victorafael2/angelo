<?php
// Handle the AJAX request and update the data
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"]) && isset($_POST["tipo"])) {
    $id = $_POST["id"];
    $tipo = $_POST["tipo"];

    // Conecte-se ao seu banco de dados
    include '../../../database/databaseconnect.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Aqui você pode realizar a atualização com base nos valores de $id e $tipo
    // Por exemplo, você pode executar uma consulta SQL para atualizar os dados no banco de dados

    if ($tipo === "cpf") {
        // Atualize a tabela "funcionarios"
        $sql = "UPDATE funcionarios SET ativo_cad = 1 WHERE idFuncionario = $id";
    } elseif ($tipo === "cnpj") {
        // Atualize a tabela "funcionarios_cnpj"
        $sql = "UPDATE funcionarios_cnpj SET ativo_cad = 1 WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "error" => $conn->error));
    }

    $conn->close();
} else {
    echo json_encode(array("success" => false, "error" => "Invalid POST request"));
}
?>
