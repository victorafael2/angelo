<div class="tab-pane fade " id="tab-contato" role="tabpanel" aria-labelledby="contato-tab">
    <div class="d-flex flex-wrap">
        <div class="row flex-fill">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">

                        Formulário Contato

                    </div>
                    <div class="card-body">
                        <form id="contato">
                            <!-- <div class="form-group">
                                <label class="form-label" for="id_contatos">ID Contatos:</label>
                                <input type="text" class="form-control" id="id_contatos" name="id_contatos" required>
                            </div> -->
                            <div class="form-group">
                                <label class="form-label" for="id_funcionario">ID Funcionário:</label>
                                <!-- <input type="text" class="form-control" id="id_funcionario" name="id_funcionario"
                                    required> -->
                                    <select class="form-control" id="id_funcionario" name="id_funcionario"
                                    data-choices="data-choices"
                                    data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Selecione</option>
                                            <?php
                                            // Executar a consulta para obter os dados
                                            $sql_vt = "SELECT id_funcionario, id_history AS max_id, nome_social
                                            FROM tb_history_cadastro
                                            WHERE (id_funcionario, id_history) IN (
                                            SELECT id_funcionario, MAX(id_history)
                                            FROM tb_history_cadastro
                                            GROUP BY id_funcionario
                                            );"; // Substitua "tabela" pelo nome correto da sua tabela
                                            $result_vt = $conn->query($sql_vt);

                                            // Verificar se há resultados e criar as opções
                                            if ($result_vt->num_rows > 0) {
                                            while ($row = $result_vt->fetch_assoc()) {
                                                $id_funcionario = $row["id_funcionario"];
                                                $nome_social = $row["nome_social"];
                                                echo "<option value='$id_funcionario'>$nome_social</option>";
                                            }
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="data">Data:</label>
                                <input type="date" class="form-control" id="data" name="data" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="contato_tipo">Contato Tipo:</label>
                                <input type="text" class="form-control" id="contato_tipo" name="contato_tipo" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="contato_identificacao">Contato Identificação:</label>
                                <input type="text" class="form-control" id="contato_identificacao"
                                    name="contato_identificacao" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="habilitado">Habilitado:</label>
                                <input type="checkbox" id="habilitado" name="habilitado">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="preferencial">Preferencial:</label>
                                <input type="checkbox" id="preferencial" name="preferencial">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Itens Cadastrados
                    </div>
                    <div class="card-body">
                        <div id="tableExample2"
                            data-list='{"valueNames":["id","email","age"],"page":5,"pagination":true}'>
                            <div class="table-responsive ms-n1 ps-1 scrollbar">
                                <table class="table table-striped table-sm fs--1 mb-0">
                                    <thead>
                                        <tr>

                                            <th class="sort border-top " data-sort="id">ID</th>
                                            <th class="sort border-top " data-sort="nome_sistema">Funcionario</th>
                                            <th class="sort border-top " data-sort="habilitado">Tipo de Contato</th>
                                            <th class="sort border-top " data-sort="habilitado">Contato</th>
                                            <th class="sort border-top " data-sort="habilitado">Habilitado</th>
                                            <th class="sort border-top " data-sort="habilitado">Preferencial</th>
                                            <th class="sort border-top ">Apagar</th>


                                        </tr>
                                    </thead>
                                    <tbody id="table_body_contato" class="list">

                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button class="page-link" data-list-pagination="prev"><span
                                        class="fas fa-chevron-left"></span></button>
                                <ul class="mb-0 pagination"></ul>
                                <button class="page-link pe-0" data-list-pagination="next"><span
                                        class="fas fa-chevron-right"></span></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
// Função para carregar os itens cadastrados na inicialização da página - Formulário 2
$(document).ready(function() {
    loadItems();

    function loadItems() {
        $.ajax({
            url: 'pages/config/insert/get_contato.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr>";
                    tableData += "<td>" + item.id_contatos + "</td>";
                    tableData += "<td>" + item.nome_social + "</td>";

                    tableData += "<td>" + item.contato_tipo + "</td>";
                    tableData += "<td>" + item.contato_identificacao + "</td>";
                    tableData += "<td>" + item.habilitado_icon + "</td>";
                    tableData += "<td>" + item.preferencial_icon + "</td>";
                    tableData +=
                        "<td><button class='delete-btn-contato btn btn-danger btn-sm' data-id='" +
                        item.id_contatos + "'>Excluir</button></td>";
                    tableData += "</tr>";
                });
                $("#table_body_contato").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".delete-btn-contato", function() {
        var id_contatos = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_contatos);
            }
        });
    });

    function deleteItem(id_contatos) {
        $.ajax({
            url: 'pages/config/insert/delete_contato.php',
            type: 'POST',
            data: {
                id_contatos: id_contatos
            },
            dataType: 'json',
            success: function(response) {
                var message = response.message;

                // Se existir um erro SQL, adiciona-o à mensagem
                if (response.sql_error) {
                    message += " Detalhes do erro: " + response.sql_error;
                }
                Swal.fire({
                    icon: response.status ? 'success' : 'error',
                    title: response.status ? 'Sucesso!' : 'Erro!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                if (response.status) {
                    loadItems();

                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    document.getElementById("contato").addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        // Crie um objeto com os dados do formulário


        $.ajax({
            url: 'pages/config/insert/salve_contato.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                console.log(response);
                Swal.fire({
                    icon: response.status ? 'success' : 'error',
                    title: response.status ? 'Sucesso!' : 'Erro!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                if (response.status) {
                    loadItems();
                    document.getElementById("contato").reset();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    });
});
</script>