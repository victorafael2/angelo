<?php
// Handle the AJAX request and update the data
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"]) ) {
    $id = $_POST["id"];


    // Conecte-se ao seu banco de dados
    include '../../../database/databaseconnect.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Aqui você pode realizar a atualização com base nos valores de $id e $tipo
    // Por exemplo, você pode executar uma consulta SQL para atualizar os dados no banco de dados

        // Atualize a tabela "funcionarios"
        $sql = "UPDATE justificativa SET aprovado = 1 WHERE id = $id";


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
