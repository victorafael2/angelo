<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta os dados da tabela AUX_VT
$sql = "SELECT *
FROM aux_acessos
LEFT JOIN (
  SELECT id_funcionario, id_history AS max_id, nome_social
  FROM tb_history_cadastro
  WHERE (id_funcionario, id_history) IN (
    SELECT id_funcionario, MAX(id_history)
    FROM tb_history_cadastro
    GROUP BY id_funcionario
  )
) AS h ON aux_acessos.id_funcionario = h.id_funcionario

LEFT JOIN aux_sistemas AS s ON s.id_sistema = aux_acessos.id_sistema";
$result = $conn->query($sql);

// Array para armazenar os dados
$items = array();

// Verifica se há resultados e os adiciona ao array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Verifica o valor da coluna "HABILITADO" e define o ícone correspondente
        if ($row['habilitado'] == 1) {
            $row['habilitado_icon'] = '<i class="fas fa-check text-success"></i>'; // Ícone "ok" do Font Awesome
        } else {
            $row['habilitado_icon'] = '<i class="fas fa-times text-danger"></i>'; // Ícone "não ok" do Font Awesome
        }
        // echo $row['habilitado_icon'];
        $items[] = $row;

    }
}



// Fecha a conexão com o banco de dados
$conn->close();

// Retorna os dados como JSON
echo json_encode($items);
?>
