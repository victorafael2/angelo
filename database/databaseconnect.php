<?php

// Seleciona as configurações do banco de dados com base no ambiente

if ($_SERVER['SERVER_NAME'] === 'localhost') {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "katrina_dev";
} else {


    $servidor = "89.116.186.150";
    $usuario = "katrina_dev";
    $senha = "katrina!#10devBetter10";
    $dbname = "katrina_dev";
}



//Criar a conexao
// Define o fuso horário após a conexão

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
mysqli_set_charset($conn, "utf8");
date_default_timezone_set('America/Fortaleza');
if (!$conn) {
    die("Falha na conexao: " . mysqli_connect_error());
} else {
    //echo "Conexao realizada com sucesso";
    mysqli_query($conn, "SET time_zone = '+03:00'");
};
