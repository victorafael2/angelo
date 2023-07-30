<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $idFuncionario = $_POST["idFuncionario"];
    $sistema = $_POST["selectSistemas"];
    $login = $_POST["login"];
    $habilitado = isset($_POST["habilitado"]) ? 1 : 0;


    // Assuming you have already established a database connection
    // Replace 'your_db_username', 'your_db_password', 'your_db_name', and 'your_table_name' with appropriate values
 include '../../../database/databaseconnect.php';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the database insertion query
    $sql = "INSERT INTO aux_acessos (id_funcionario, id_sistema,username,habilitado)
            VALUES ('$idFuncionario', '$sistema','$login','$habilitado')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
