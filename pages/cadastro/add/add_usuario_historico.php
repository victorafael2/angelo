<?php
include '../../../database/databaseconnect.php';
date_default_timezone_set('America/Fortaleza');
// Criar a conexão
// $conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nomeSocial = $_POST["nomeSocial"];
    $nomeRegistro = $_POST["nomeRegistro"];
    $sexo = $_POST["sexo"];
    $genero = $_POST["genero"];
    $estadoCivil = $_POST["estadoCivil"];
    $idCargo = $_POST["idCargo"];
    $idVt = $_POST["idVt"];
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

    // Query SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO tb_history_cadastro (nome_social, nome_registro, sexo, genero, estado_civil, id_cargo, id_vt, id_superior, id_area, id_operacao, id_filial, tipo_regime, tipo_contrato, tipo_ponto, sistema_ponto, vlr_salario, status)
            VALUES ('$nomeSocial', '$nomeRegistro', '$sexo', '$genero', '$estadoCivil', '$idCargo', '$idVt', '$idSuperior', '$idArea', '$idOperacao', '$idFilial', '$tipoRegime', '$tipoContrato', '$tipoPonto', '$sistemaPonto', '$vlrSalario', '$status')";

    // Executa a query no banco de dados
    if (mysqli_query($conn, $sql)) {
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro ao salvar os dados: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>
