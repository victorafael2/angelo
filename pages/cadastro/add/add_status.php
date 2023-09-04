<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["idFuncionario"];
    $data_inicio = $_POST["data_inicio"];
    $data_fim = $_POST["data_fim"];
    $status = $_POST["status"];
    $tipo = $_POST["tipo"];

    include '../../../database/databaseconnect.php';

    $sql = "INSERT INTO status_funcionario (nome, data_inicio, data_fim, status,tipo)
            VALUES ('$nome', '$data_inicio', '$data_fim', '$status','$tipo')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}
?>
