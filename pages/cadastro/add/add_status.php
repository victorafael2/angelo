<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["idFuncionario"];
    $data_inicio = $_POST["data_inicio"];
    $data_fim = $_POST["data_fim"];
    $status = $_POST["status"];

    include '../../../database/databaseconnect.php';

    $sql = "INSERT INTO status_funcionario (nome, data_inicio, data_fim, status)
            VALUES ('$nome', '$data_inicio', '$data_fim', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}
?>
