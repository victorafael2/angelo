<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $idFuncionario = $_POST["idFuncionario"];
    $pixTipo = $_POST["pix_tipo"];
    $pixIdentificacao = $_POST["pix_identificacao"];
    $bancoTipoConta = $_POST["banco_tipo_conta"];
    $bancoNumero = $_POST["banco_numero"];
    $bancoNome = $_POST["banco_nome"];
    $bancoAgencia = $_POST["banco_agencia"];
    $bancoDvAgencia = $_POST["banco_dv_agencia"];
    $bancoConta = $_POST["banco_conta"];
    $bancoDvConta = $_POST["banco_dv_conta"];
    $habilitado = isset($_POST["habilitado"]) ? 1 : 0;
    $preferencial = isset($_POST["preferencial"]) ? 1 : 0;
    $tipo = $_POST["tipo"];

    // Assuming you have already established a database connection
    // Replace 'your_db_username', 'your_db_password', 'your_db_name', and 'your_table_name' with appropriate values
 include '../../../database/databaseconnect.php';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the database insertion query
    $sql = "INSERT INTO aux_info_bancario (id_funcionario, pix_tipo, pix_identificacao, banco_tipo_conta, banco_numero, banco_nome, banco_agencia, banco_dv_agencia, banco_conta, banco_dv_conta, habilitado, preferencial,tipo)
            VALUES ('$idFuncionario', '$pixTipo', '$pixIdentificacao', '$bancoTipoConta', '$bancoNumero', '$bancoNome', '$bancoAgencia', '$bancoDvAgencia', '$bancoConta', '$bancoDvConta', $habilitado, $preferencial,'$tipo')";
            echo $sql;

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
