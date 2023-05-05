<?php
    // Connect to the database
include ("../database/databaseconnect.php");

    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];

    // Insert the data into the database
    $sql = "INSERT INTO user (name, email,senha,telefone) VALUES ('$name', '$email','$senha','$telefone')";
    if (mysqli_query($conn, $sql)) {
        echo "Data saved successfully";
        // header("Location: http://www.exemplo.com/obrigado.html");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
