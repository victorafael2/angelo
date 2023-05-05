<?php
include_once ("../../database/databaseconnect.php");



// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se o parâmetro "id" foi enviado
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Executar consulta DELETE SQL
    $sql = "DELETE FROM user WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "O item foi deletado com sucesso!";
        header('Location: ../../default.php?url=2');
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
