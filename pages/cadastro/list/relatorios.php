<?php
// Configuração da conexão com o banco de dados (substitua com suas próprias informações)
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta os relatórios no banco de dados
$sql = "SELECT id, nome, link, ativo,SUBSTRING(link, 1, 40) AS short_link, descricao FROM relatorios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Monta a tabela HTML com os relatórios
    echo ' <div class="table-responsive">';
    echo '<table class="table">';
    echo '<thead><tr><th>ID</th><th>Nome</th><th>Descricao</th><th>Ativo</th><th>Ações</th></tr></thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["nome"] . '</td>';
        // echo '<td>' . $row["short_link"] . '</td>';
        echo '<td>' . $row["descricao"] . '</td>';
        echo '<td>' . ($row["ativo"] ? 'Sim' : 'Não') . '</td>';
        echo '<td>';
        echo '<div class="btn-group" role="group" >';
        echo '<a href="content_pages.php?id=43&id_relatorio=' . $row["id"] . '" class="btn btn-sm btn-soft-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Relatório"><i class="fa-regular fa-eye"></i></a>';
        echo '<button class="btn btn-sm btn-soft-primary edit-button" data-id="' . $row["id"] . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Relatório"><i class="fa-regular fa-pen-to-square"></i></button> ';
        echo '<button class="btn btn-sm btn-soft-danger delete-button" data-id="' . $row["id"] . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Apagar Relatório"><i class="fa-regular fa-trash-can"></i></button></td>';
        echo '</div>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div';
} else {
    echo '<p>Nenhum relatório encontrado.</p>';
}

// Fecha a conexão
$conn->close();
?>
