<?php
include '../../../database/databaseconnect.php';
date_default_timezone_set('America/Fortaleza');
// Criar a conexão
// $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
    // Recupera os dados do formulário
    $nomeSocial = $_POST["nomeSocial"];
    $nomeRegistro = $_POST["nomeRegistro"];
    $sexo = $_POST["sexo"];
    $genero = $_POST["genero"];
    $estadoCivil = $_POST["estadoCivil"];
    $idCargo = $_POST["idCargo"];
    $idVt = $_POST["idVt"];
    $idvr = $_POST["idvr"];
    $idSuperior = $_POST["idSuperior"];
    $idArea = $_POST["idArea"];
    $idOperacao = $_POST["idOperacao"];
    $idFilial = $_POST["idFilial"];
    $tipoRegime = $_POST["tipoRegime"];
    $tipoContrato = $_POST["tipoContrato"];
    $tipoPonto = $_POST["tipoPonto"];
    $sistemaPonto = $_POST["sistemaPonto"];
    $vlrSalario = $_POST["vlrSalario"];
    $status = $_POST["status"];
    $idFuncionario = $_POST["idFuncioanrio"];
    $tipo_registro = $_POST["tipo_registro"];

    // Query SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO tb_history_cadastro (nome_social, nome_registro, sexo, genero, estado_civil, id_cargo, id_vt,id_vr, id_superior, id_area, id_operacao, id_filial, tipo_regime, tipo_contrato, tipo_ponto, sistema_ponto, vlr_salario, status, id_funcionario, tipo_registro)
    VALUES ('$nomeSocial', '$nomeRegistro', '$sexo', '$genero', '$estadoCivil', '$idCargo', '$idVt','$idvr', '$idSuperior', '$idArea', '$idOperacao', '$idFilial', '$tipoRegime', '$tipoContrato', '$tipoPonto', '$sistemaPonto', '$vlrSalario', '$status', '$idFuncionario','$tipo_registro')";

// Certifique-se de substituir "$idFuncionario" pela variável que contém o valor do funcionário associado a este registro.

// Em seguida, você pode executar a consulta no banco de dados.


    // Executa a query no banco de dados
    if (mysqli_query($conn, $sql)) {
        echo $idFuncionario;
    } else {
        echo "Erro ao salvar os dados: " . mysqli_error($conn);
    }
    mysqli_close($conn);


?>
