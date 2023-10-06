<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


// Inicializa a variável para armazenar o ID da solicitação POST
$id = null;

// Verifica se foi enviado um ID via POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

// Consulta os dados da tabela AUX_VT
$sql = "SELECT *, j.`data` AS data_jus FROM justificativa AS j

LEFT JOIN (SELECT hc.*
FROM tb_history_cadastro hc
INNER JOIN (
    SELECT id_funcionario, MAX(id_history) AS max_id_history
    FROM tb_history_cadastro
    GROUP BY id_funcionario
) AS max_ids
ON hc.id_funcionario = max_ids.id_funcionario AND hc.id_history = max_ids.max_id_history) AS h ON j.id_funcionario = h.id_funcionario  WHERE j.id = $id;";

$result = $conn->query($sql);

// Array para armazenar os dados
$items = array();

// Verifica se há resultados e os adiciona ao array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Verifica o valor da coluna "HABILITADO" e define o ícone correspondente

        // echo $row['habilitado_icon'];
        $items[] = $row;

    }
}



// Fecha a conexão com o banco de dados
$conn->close();

// Retorna os dados como JSON
echo json_encode($items);
?>
