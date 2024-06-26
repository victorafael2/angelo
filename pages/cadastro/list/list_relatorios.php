<?php
// Verifica se a requisição é do tipo GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Configuração da conexão com o banco de dados (substitua com suas próprias informações)
    include '../../../database/databaseconnect.php';

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Consulta o relatório no banco de dados
    $sql = "SELECT * FROM relatorios WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Monta o formulário de edição
        echo '<form class="edit-form">';
        echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
        echo '<div class="mb-3">';
        echo '<label for="nome" class="form-label">Nome</label>';
        echo '<input type="text" class="form-control" name="nome" value="' . $row["nome"] . '">';
        echo '</div>';
        echo '<div class="col-md-3">';
        echo ' <label for="">Tipo de Link</label>';
        echo '<select class="form-select" id="tipolink" name="tipolink" >';
        echo '<option value="" disabled selected>URL ou Embed</option>';
        echo '<option value="url"' . ($row["tipolink"] == 'url' ? ' selected' : '') . '>Url</option>';
        echo '<option value="embed"' . ($row["tipolink"] == 'embed' ? ' selected' : '') . '>Embed</option>';

        echo '</select>';

        echo ' </div>';
        echo '<div class="mb-3">';
        echo '<label for="link" class="form-label">Link</label>';
        echo '<input type="text" class="form-control" name="link" value="' . $row["link"] . '">';
        echo '</div>';
        echo '<div class="mb-3">';
        echo '<label for="desc" class="form-label">Descrição</label>';
        echo '<input type="text" class="form-control" name="desc" value="' . $row["descricao"] . '">';
        echo '</div>';
        echo '<div class="mb-3 form-check">';
        echo '<input type="checkbox" class="form-check-input" name="ativo" ' . ($row["ativo"] ? "checked" : "") . '>';
        echo '<label class="form-check-label">Ativar Relatório</label>';
        echo '</div>';
        echo '<button type="button" class="btn btn-primary save-button">Salvar</button>';
        echo '<a href="content_pages.php?id=33" class="btn btn-secondary">Voltar</a>'; // Adicione o botão de voltar
        echo '</form>';
    }


    // Fecha a conexão
    $conn->close();
} else {
    echo "Erro ao obter o relatório.";
}
