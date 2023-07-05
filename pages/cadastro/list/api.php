<?php
// Configurações do banco de dados
include '../../../database/databaseconnect.php';

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$id_tarefa = isset($_GET['dado']) ? $_GET['dado'] : 18;

// Consulta para obter os dados da tabela
$sql = "SELECT f.cpf, h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history, aux_cargos.cargo_nome, aux_vt.vt_nome, tb_sup.nome_social as superior_nome, aux_areas.nome_area, aux_operacoes.nome_operacao, aux_filiais.filial_nome, 'cpf' AS tipo
FROM funcionarios f
INNER JOIN tb_history_cadastro h ON f.idFuncionario = h.id_funcionario
LEFT JOIN aux_cargos ON aux_cargos.id_cargo = h.id_cargo
LEFT JOIN aux_vt ON aux_vt.id_vt = h.id_vt
LEFT JOIN tb_history_cadastro tb_sup ON tb_sup.id_funcionario = h.id_superior
LEFT JOIN aux_areas ON aux_areas.id_area = h.id_area
LEFT JOIN aux_operacoes ON aux_operacoes.id_operacao = h.id_operacao
LEFT JOIN aux_filiais ON aux_filiais.id_filial = h.id_filial
WHERE h.id_history IN (
    SELECT MAX(id_history)
    FROM tb_history_cadastro
    GROUP BY id_funcionario
)

UNION ALL

SELECT f_cnpj.cnpj AS 'cpf', h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history, aux_cargos.cargo_nome, aux_vt.vt_nome, tb_sup.nome_social as superior_nome, aux_areas.nome_area, aux_operacoes.nome_operacao, aux_filiais.filial_nome, 'cnpj' AS tipo
FROM funcionarios_cnpj AS f_cnpj
INNER JOIN tb_history_cadastro h ON f_cnpj.id = h.id_funcionario
LEFT JOIN aux_cargos ON aux_cargos.id_cargo = h.id_cargo
LEFT JOIN aux_vt ON aux_vt.id_vt = h.id_vt
LEFT JOIN tb_history_cadastro tb_sup ON tb_sup.id_funcionario = h.id_superior
LEFT JOIN aux_areas ON aux_areas.id_area = h.id_area
LEFT JOIN aux_operacoes ON aux_operacoes.id_operacao = h.id_operacao
LEFT JOIN aux_filiais ON aux_filiais.id_filial = h.id_filial
WHERE h.id_history IN (
    SELECT MAX(id_history)
    FROM tb_history_cadastro
    GROUP BY id_funcionario
);
";

$result = $conn->query($sql);

// Verifica se houve algum erro na consulta
if (!$result) {
    die("Erro na consulta: " . $conn->error);
}

// Array para armazenar os dados
$dados = array();

// Popula o array com os dados do resultado da consulta
// Popula o array com os dados do resultado da consulta
while ($row = $result->fetch_assoc()) {



    $row['ver'] = '<a class="dropdown-item" href="content_pages.php?id=3&id_func='.$row['id_funcionario'] . '&tipo='.$row['tipo'] . '"><i class="fa-regular fa-eye"></i></a>';



    $dados[] = $row;
}

// Libera a memória do resultado da consulta
$result->free_result();

// Fecha a conexão com o banco de dados
$conn->close();

// Converte os dados para o formato JSON
$jsonData = json_encode($dados);

// Define o cabeçalho da resposta como JSON
header('Content-Type: application/json');

// Envia os dados como resposta
echo $jsonData;
?>
