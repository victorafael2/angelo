<?php
// Conexão com o banco de dados
include ("../../database/databaseconnect.php");


// verifica se a conexão foi bem sucedida
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());


}

// $id = $_GET["id"];
// $id_rel = $_GET["id_rel"];

$id_rel = isset($_POST['id_rel']) ? intval($_POST['id_rel']) : 0;
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

// verifica se o checkbox foi selecionado
// if (isset($_POST['campo1'])) {
//     $campo1 = $_POST['campo1'];
// } else {
//     $campo1 = 0;
// }

// atualiza o registro correspondente no banco de dados
$sql = "UPDATE tarefas SET concluido='concluido' WHERE id=$id and id_rel=$id_rel";

if (mysqli_query($conn, $sql)) {
    echo "Registro atualizado com sucesso";
    header("Location: ../../default.php?url=10&&id=" . $id_rel . "");
    exit;

} else {
    echo "Erro ao atualizar registro: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

