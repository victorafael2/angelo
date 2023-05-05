<?php

include ("../../database/databaseconnect.php");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}




if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $concluido = $_POST['concluido'];
}

$sql = "UPDATE tarefas SET concluido = '$concluido' WHERE id = '$id'";
$resultado = mysqli_query($conn, $sql);


if ($resultado) {
    echo 'success';
} else {
    echo 'error';
}


?>
