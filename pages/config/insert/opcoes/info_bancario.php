<div class="tab-pane fade " id="tab-banco" role="tabpanel" aria-labelledby="banco-tab">
    <div class="d-flex flex-wrap">
        <div class="row flex-fill">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">

                        Formulário banco

                    </div>
                    <div class="card-body">
                        <form id="banco">
                            <div class="form-group">
                                <label class="form-label" for="id_funcionario">Funcionário:</label>
                                <!-- <input type="text" class="form-control" id="id_funcionario" name="id_funcionario"
                                    required> -->
                                    <select type="text" class="form-control" id="id_funcionario" name="id_funcionario"
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
                                            );
                                            "; // Substitua "tabela" pelo nome correto da sua tabela
                                            $result_vt = $conn->query($sql_vt);

                                            // Verificar se há resultados e criar as opções
                                            if ($result_vt->num_rows > 0) {
                                                while ($row = $result_vt->fetch_assoc()) {
                                                    $id_funcionario = $row["id_funcionario"];
                                                    $nome_social = $row["nome_social"];
                                                    // $visibilidade_vt = ($idVt == $id_vt) ? "selected" : "";

                                                    echo "<option value='$id_funcionario' >$nome_social</option>";
                                                }
                                            } else {
                                                // echo "<option value=''>Nenhum resultado encontrado</option>";
                                            }
                                            ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="data">Data:</label>
                                <input type="date" class="form-control" id="data" name="data" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pix_tipo">PIX Tipo:</label>
                                <input type="text" class="form-control" id="pix_tipo" name="pix_tipo" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pix_identificacao">PIX Identificação:</label>
                                <input type="text" class="form-control" id="pix_identificacao" name="pix_identificacao"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="banco_numero">Banco Número:</label>
                                <input type="text" class="form-control" id="banco_numero" name="banco_numero" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="banco_nome">Banco Nome:</label>
                                <input type="text" class="form-control" id="banco_nome" name="banco_nome" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="banco_tipo_conta">Banco Tipo de Conta:</label>
                                <input type="text" class="form-control" id="banco_tipo_conta" name="banco_tipo_conta"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="banco_agencia">Banco Agência:</label>
                                <input type="text" class="form-control" id="banco_agencia" name="banco_agencia"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="banco_dv_agencia">Banco DV Agência:</label>
                                <input type="text" class="form-control" id="banco_dv_agencia" name="banco_dv_agencia"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="banco_conta">Banco Conta:</label>
                                <input type="text" class="form-control" id="banco_conta" name="banco_conta" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="banco_dv_conta">Banco DV Conta:</label>
                                <input type="text" class="form-control" id="banco_dv_conta" name="banco_dv_conta"
                                    required>
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
                                            <th class="sort border-top " data-sort="habilitado">Pix Tipo</th>
                                            <th class="sort border-top " data-sort="habilitado">Pix identificação</th>
                                            <th class="sort border-top " data-sort="habilitado">Banco</th>
                                            <th class="sort border-top " data-sort="habilitado">Tipo de Conta</th>
                                            <th class="sort border-top " data-sort="habilitado">Habilitado</th>
                                            <th class="sort border-top " data-sort="habilitado">Preferencial</th>
                                            <th class="sort border-top ">Apagar</th>


                                        </tr>
                                    </thead>
                                    <tbody id="table_body_bancos" class="list">

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
            url: 'pages/config/insert/get_bancos.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr>";
                    tableData += "<td>" + item.id + "</td>";
                    tableData += "<td>" + item.nome_social + "</td>";
                    tableData += "<td>" + item.pix_tipo + "</td>";
                    tableData += "<td>" + item.pix_identificacao + "</td>";
                    tableData += "<td>" + item.banco_nome + "</td>";
                    tableData += "<td>" + item.banco_tipo_conta + "</td>";
                    tableData += "<td>" + item.habilitado_icon + "</td>";
                    tableData += "<td>" + item.preferencial_icon + "</td>";
                    tableData +=
                        "<td><button class='delete-btn-banco btn btn-danger btn-sm' data-id='" +
                        item.id + "'>Excluir</button></td>";
                    tableData += "</tr>";
                });
                $("#table_body_bancos").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".delete-btn-banco", function() {
        var id = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id);
            }
        });
    });

    function deleteItem(id) {
        $.ajax({
            url: 'pages/config/insert/delete_bancos.php',
            type: 'POST',
            data: {
                id: id
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

    document.getElementById("banco").addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        // Crie um objeto com os dados do formulário


        $.ajax({
            url: 'pages/config/insert/salve_bancos.php',
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
                    document.getElementById("sistemas").reset();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    });
});
</script>