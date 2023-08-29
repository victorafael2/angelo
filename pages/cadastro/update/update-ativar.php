<?php
// Handle the AJAX request and update the data
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"]) && isset($_POST["tipo"])) {
    $id = $_POST["id"];
    $tipo = $_POST["tipo"];

    // Connect to your database
 include '../../../database/databaseconnect.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update based on $tipo
    if ($tipo === "cpf") {
        // Update funcionarios table
        $sql = "UPDATE funcionarios SET ativo_cad = 1 WHERE idFuncionario = $id";
    } elseif ($tipo === "cnpj") {
        // Update funcionarios_cnpj table
        $sql = "UPDATE funcionarios_cnpj SET ativo_cad = 1 WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "error" => $conn->error));
    }

    $conn->close();
} else {
    echo json_encode(array("success" => false));
}
?>
