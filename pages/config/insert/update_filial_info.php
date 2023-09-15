<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $id_filial = $_POST["id_filial_modal"];
    $filial_nome = $_POST["filial_nome_modal"];
    $filial_cnpj = $_POST["filial_cnpj_modal"];
    $endereco_rua = $_POST["endereco_rua_modal"];
    $endereco_numero = $_POST["endereco_numero_modal"];
    $endereco_comp = $_POST["endereco_comp_modal"];
    $endereco_bairro = $_POST["endereco_bairro_modal"];
    $endereco_cidade = $_POST["endereco_cidade_modal"];
    $endereco_uf = $_POST["endereco_uf_modal"];

    // Atualize os dados da filial no banco de dados
    $sql = "UPDATE aux_filiais SET
            filial_nome = ?,
            filial_cnpj = ?,
            endereco_rua = ?,
            endereco_numero = ?,
            endereco_comp = ?,
            endereco_bairro = ?,
            endereco_cidade = ?,
            endereco_uf = ?
            WHERE id_filial = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $filial_nome, $filial_cnpj, $endereco_rua, $endereco_numero, $endereco_comp, $endereco_bairro, $endereco_cidade, $endereco_uf, $id_filial);

    if ($stmt->execute()) {
        // Sucesso na atualização
        $response = array("status" => true, "message" => "Informações da filial atualizadas com sucesso.");
    } else {
        // Erro na atualização
        $response = array("status" => false, "message" => "Erro ao atualizar informações da filial: " . $conn->error);
    }

    // Feche a conexão
    $stmt->close();
    $conn->close();

    // Envie a resposta como JSON
    echo json_encode($response);
} else {
    // Se os dados não foram enviados via POST
    echo json_encode(array("status" => false, "message" => "Requisição inválida."));
}
?>
