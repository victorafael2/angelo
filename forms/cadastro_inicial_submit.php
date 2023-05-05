<?php
include_once("../database/databaseconnect.php");


    // Get the form data
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $cnpj = $_POST["cnpj"];
    $responsavel = $_POST["responsavel"];
    $localizacao = $_POST["localizacao"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $mercado = $_POST["mercado"];
    $necessidade = $_POST["necessidade"];
    $ramo = $_POST["ramo"];

    // Insert the data into the database
    $sql = "INSERT INTO cadastro_inicial (nome, telefone,email,cnpj, responsavel, localizacao, cidade, estado, mercado, necessidade,ramo) VALUES ('$nome','$telefone','$email','$cnpj','$responsavel','$localizacao','$cidade','$estado','$mercado','$necessidade','$ramo')";
    if (mysqli_query($conn, $sql)) {
        echo "Data saved successfully";
        // header('Location: ../');

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
