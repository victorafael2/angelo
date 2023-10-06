<!-- <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.css">
<script src="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/locale/bootstrap-table-pt-BR.min.js"></script>
<div class="row align-items-center justify-content-between g-3 mb-4">
    <div class="col-12 col-md-auto">
        <h2 class="mb-0">Usuários</h2>
    </div>
    <div class="col-12 col-md-auto">
        <a href="content_pages.php?id=10" class="btn btn-phoenix-secondary px-3 px-sm-5 me-2"><span
                class="fa-solid fa-plus me-sm-2"></span><span class="d-none d-sm-inline">Adicionar Usuário </span></a>
        <a href="content_pages.php?id=4" class="btn btn-phoenix-secondary me-2"><i
                class="fa-solid fa-user-clock me-2"></i><span>Cadastros não Finalizados</span></a>
        <!-- <button class="btn px-3 btn-phoenix-secondary" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-ellipsis"></span></button>
                <ul class="dropdown-menu dropdown-menu-end p-0" style="z-index: 9999;">
                  <li><a class="dropdown-item" href="#!">View profile</a></li>
                  <li><a class="dropdown-item" href="#!">Report</a></li>
                  <li><a class="dropdown-item" href="#!">Manage notifications</a></li>
                  <li><a class="dropdown-item text-danger" href="#!">Delete Lead</a></li>
                </ul> -->
    </div>
</div>




<div id="tableExample2" data-list='{"valueNames":["cpf","email","age"],"page":20,"pagination":true}'>
    <div class="table-responsive ms-n1 ps-1 scrollbar">
        <!-- Botão para abrir o modal -->
        <button id="updateSelectedBtn" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#selectedIdsModal">Atualizar Selecionados</button>

        <table id="table" data-toggle="table" data-flat="true" data-search="true" data-url="pages/cadastro/list/api.php"
            class="table table-sm fs--2" data-locale="pt-BR">
            <thead>
                <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="ver" data-sortable="true">Ver</th>
                    <th data-field="id_funcionario" data-sortable="true">ID</th>
                    <th data-field="tipo" data-sortable="true">Tipo</th>
                    <th data-field="cpf" data-sortable="true">CPF/CNPJ</th>
                    <th data-field="nome_social" data-sortable="true">Nome Social</th>
                    <th data-field="nome_registro" data-sortable="true">Nome de Registro</th>
                    <th data-field="sexo" data-sortable="true">Sexo</th>
                    <th data-field="genero" data-sortable="true">Gênero</th>
                    <th data-field="estado_civil" data-sortable="true">Estado Civil</th>
                    <th data-field="cargo_nome" data-sortable="true">Cargo</th>
                    <th data-field="vt_nome" data-sortable="true">VT</th>
                    <th data-field="superior_nome" data-sortable="true">Superior</th>
                    <th data-field="nome_area" data-sortable="true">Área</th>
                    <th data-field="nome_operacao" data-sortable="true">Operação</th>
                    <th data-field="filial_nome" data-sortable="true">Filial</th>


                </tr>
            </thead>
        </table>
    </div>

</div>
















 <script>
        $(document).ready(function () {
            // Inicializa a tabela Bootstrap
            $('#table').bootstrapTable();

            // Rastreia as linhas selecionadas e exibe os IDs no modal
            $('#updateSelectedBtn').click(function () {
                var selectedRows = $('#table').bootstrapTable('getSelections');
                var selectedIds = [];

                // Obtém os IDs das linhas selecionadas
                selectedRows.forEach(function (row) {
                    selectedIds.push(row.id); // Substitua 'id' pelo campo apropriado que contém o ID
                });

                // Atualiza o input e a lista no modal
                $('#selectedIdsInput').val(selectedIds.join(', '));
                $('#selectedIdsList').empty();
                selectedIds.forEach(function (id) {
                    $('#selectedIdsList').append('<li>' + id + '</li>');
                });

                // Abre o modal
                $('#selectedIdsModal').modal('show');
            });
        });
    </script>







<!-- Modal para exibir os IDs selecionados -->
<div class="modal fade" id="selectedIdsModal" tabindex="-1" aria-labelledby="selectedIdsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectedIdsModalLabel">IDs Selecionados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="fieldSelect" class="form-label">Campo para atualização:</label>
                    <select class="form-select" id="fieldSelect">
                        <option value="">Selecione uma opção</option>
                        <option value="id_cargo">Cargo</option>
                        <option value="id_area">Área</option>
                        <option value="id_superior">Supervisor</option>
                        <option value="id_operacao">Operação</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="optionsSelect" class="form-label">Opções:</label>
                    <select class="form-select" id="optionsSelect"></select>
                </div>
                <ul class="hidden" id="selectedIdsList"></ul>
                <input type="text" id="selectedIdsInput" class="form-control" placeholder="IDs selecionados" readonly>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button id="updateFieldBtn" type="button" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    // Redirecionar para a outra página com os IDs selecionados
    $('#updateSelectedBtn').on('click', function() {
        var selectedRows = $('#table').bootstrapTable('getSelections');
        var selectedIds = selectedRows.map(function(row) {
            return row.id_funcionario;
        });

        // Preencher a lista de IDs no modal
        var selectedIdsList = $('#selectedIdsList');
        selectedIdsList.empty();
        selectedIds.forEach(function(id) {
            selectedIdsList.append('<li>' + id + '</li>');
        });

        // Preencher o campo de entrada com os IDs selecionados
        $('#selectedIdsInput').val(selectedIds.join(', '));
    });

    // Carregar opções do segundo campo de seleção com base na seleção do primeiro campo
    $('#fieldSelect').on('change', function() {
        var selectedField = $(this).val();
        // Fazer a requisição AJAX para buscar as opções no banco de dados
        $.ajax({
            url: 'pages/cadastro/list/opcoes.php', // Substitua pelo seu arquivo PHP que busca as opções
            method: 'POST',
            data: {
                field: selectedField
            },
            success: function(response) {
                // Atualizar as opções do segundo campo de seleção
                var optionsSelect = $('#optionsSelect');
                optionsSelect.empty();
                optionsSelect.append(response);
            },
            error: function(xhr, status, error) {
                console.log('Erro na requisição AJAX:', error);
            }
        });
    });

    // Atualizar o campo selecionado
    $('#updateFieldBtn').on('click', function() {
        var selectedField = $('#fieldSelect').val();
        var selectedOption = $('#optionsSelect').val();
        var selectedIds = [];
        $('#selectedIdsList li').each(function() {
            selectedIds.push($(this).text());
        });

        // Realizar uma requisição AJAX para atualizar o campo selecionado no banco de dados
        $.ajax({
            url: 'atualizar_registro.php',
            method: 'POST',
            data: {
                field: selectedField,
                option: selectedOption,
                ids: selectedIds.join(',')
            },
            success: function(response) {
                console.log('Atualização concluída com sucesso!');
            },
            error: function(xhr, status, error) {
                console.log('Erro na requisição AJAX:', error);
            }
        });
    });
});
</script>