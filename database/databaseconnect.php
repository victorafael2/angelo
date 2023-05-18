<?php

$servidor = "45.152.44.103";
$usuario = "u358437276_angelo";
$senha = "Angelo01";
$dbname = "u358437276_angelo";

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




// // Gere alguns dados de exemplo
// $nomes = ['João', 'Maria', 'Pedro', 'Ana', 'Carlos'];
// $qtdRegistros = 20; // Quantidade de registros a serem gerados

// for ($i = 0; $i < $qtdRegistros; $i++) {
//     $dataCadastro = date('Y-m-d', strtotime('-' . mt_rand(0, 365) . ' days'));
//     $cpf = mt_rand(10000000000, 99999999999);
//     $dataAdmissao = date('Y-m-d', strtotime('-' . mt_rand(0, 365) . ' days'));
//     $dataDemissao = date('Y-m-d', strtotime('-' . mt_rand(0, 365) . ' days'));
//     $dataNascimento = date('Y-m-d', strtotime('-' . mt_rand(18, 60) . ' years'));
//     $rgNumero = mt_rand(100000000, 999999999);
//     $rgEmissor = 'SSP';
//     $rgUF = 'CE';
//     $rgDataEmissao = date('Y-m-d', strtotime('-' . mt_rand(365, 1825) . ' days'));
//     $cnhNumero = mt_rand(10000000000, 99999999999);
//     $cnhTipo = 'A';
//     $ctpsNumero = mt_rand(10000000000, 99999999999);
//     $ctpsSerie = mt_rand(1000000, 9999999);
//     $ctpsDataEmissao = date('Y-m-d', strtotime('-' . mt_rand(365, 1825) . ' days'));
//     $ctpsUF = 'CE';
//     $pisNumero = mt_rand(10000000000, 99999999999);
//     $eSocial = mt_rand(10000000000, 99999999999);
//     $sigilo = mt_rand(0, 1);

//     // Insira os dados na tabela
//     $sql = "INSERT INTO funcionarios (dataCadastro, cpf, dataAdmissao, dataDemissao, dataNascimento, rgNumero, rgEmissor, rgUF, rgDataEmissao, cnhNumero, cnhTipo, ctpsNumero, ctpsSerie, ctpsDataEmissao, ctpsUF, pisNumero, eSocial, sigilo)
//             VALUES ('$dataCadastro', '$cpf', '$dataAdmissao', '$dataDemissao', '$dataNascimento', '$rgNumero', '$rgEmissor', '$rgUF', '$rgDataEmissao', '$cnhNumero', '$cnhTipo', '$ctpsNumero', '$ctpsSerie', '$ctpsDataEmissao', '$ctpsUF', '$pisNumero', '$eSocial', '$sigilo')";

//     if ($conn->query($sql) !== TRUE) {
//         echo "Erro ao inserir registro: " . $conn->error;
//     }
// }




?>