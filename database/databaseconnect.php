<?php

    // Seleciona as configurações do banco de dados com base no ambiente

    if ($_SERVER['SERVER_NAME'] === 'localhost') {
        $servidor = "45.152.44.103";
        $usuario = "u358437276_angelo";
        $senha = "Angelo01";
        $dbname = "u358437276_angelo";
} else {
//     require('../ssh/phpseclib-master/phpseclib/Net/SSH2.php');


//     $ssh = new Net_SSH2('191.96.31.197'); // Substitua 'localhost' pelo endereço do servidor SSH remoto
// if (!$ssh->login('victorrafael', 'victor001@2023')) {
//     exit('Falha na autenticação SSH');
// }

    $servidor = "89.116.186.150";
    $usuario = "root";
    $senha = "root";
    $dbname = "katrina_dev";
            // $servidor = "localhost";
            // $usuario = "xpeer_adm";
            // $senha = "xpeer_adm_victor";
            // $dbname = "xpeer_adm";

}



//Criar a conexao
// Define o fuso horário após a conexão

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
mysqli_set_charset($conn,"utf8");
date_default_timezone_set('America/Fortaleza');
if(!$conn){
    die("Falha na conexao: " . mysqli_connect_error());
}else{
    //echo "Conexao realizada com sucesso";
    mysqli_query($conn, "SET time_zone = '+03:00'");
}  ;







?>