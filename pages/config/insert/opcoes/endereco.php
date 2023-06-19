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
                                <label for="id_funcionario">ID Funcionário:</label>
                                <input type="text" class="form-control" id="id_funcionario" name="id_funcionario"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="data">Data:</label>
                                <input type="date" class="form-control" id="data" name="data" required>
                            </div>
                            <div class="form-group">
                                <label for="pix_tipo">PIX Tipo:</label>
                                <input type="text" class="form-control" id="pix_tipo" name="pix_tipo" required>
                            </div>
                            <div class="form-group">
                                <label for="pix_identificacao">PIX Identificação:</label>
                                <input type="text" class="form-control" id="pix_identificacao" name="pix_identificacao"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="banco_numero">Banco Número:</label>
                                <input type="text" class="form-control" id="banco_numero" name="banco_numero" required>
                            </div>
                            <div class="form-group">
                                <label for="banco_nome">Banco Nome:</label>
                                <input type="text" class="form-control" id="banco_nome" name="banco_nome" required>
                            </div>
                            <div class="form-group">
                                <label for="banco_tipo_conta">Banco Tipo de Conta:</label>
                                <input type="text" class="form-control" id="banco_tipo_conta" name="banco_tipo_conta"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="banco_agencia">Banco Agência:</label>
                                <input type="text" class="form-control" id="banco_agencia" name="banco_agencia"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="banco_dv_agencia">Banco DV Agência:</label>
                                <input type="text" class="form-control" id="banco_dv_agencia" name="banco_dv_agencia"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="banco_conta">Banco Conta:</label>
                                <input type="text" class="form-control" id="banco_conta" name="banco_conta" required>
                            </div>
                            <div class="form-group">
                                <label for="banco_dv_conta">Banco DV Conta:</label>
                                <input type="text" class="form-control" id="banco_dv_conta" name="banco_dv_conta"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="habilitado">Habilitado:</label>
                                <input type="checkbox" id="habilitado" name="habilitado">
                            </div>
                            <div class="form-group">
                                <label for="preferencial">Preferencial:</label>
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
                                            <th class="sort border-top " data-sort="habilitado">Sistema</th>
                                            <th class="sort border-top " data-sort="habilitado">Habilitado</th>
                                            <th class="sort border-top ">Apagar</th>


                                        </tr>
                                    </thead>
                                    <tbody id="table_body_acessos" class="list">

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
            url: 'pages/config/insert/get_acessos.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr>";
                    tableData += "<td>" + item.id_acesso + "</td>";
                    tableData += "<td>" + item.nome_social + "</td>";

                    tableData += "<td>" + item.nome_sistema + "</td>";
                    tableData += "<td>" + item.habilitado + "</td>";
                    tableData +=
                        "<td><button class='delete-btn-acesso btn btn-danger btn-sm' data-id='" +
                        item.id_acesso + "'>Excluir</button></td>";
                    tableData += "</tr>";
                });
                $("#table_body_acessos").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".delete-btn-acesso", function() {
        var id_acesso = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_acesso);
            }
        });
    });

    function deleteItem(id_acesso) {
        $.ajax({
            url: 'pages/config/insert/delete_acessos.php',
            type: 'POST',
            data: {
                id_acesso_apagar: id_acesso
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

    document.getElementById("acessos").addEventListener("submit", function(event) {
        event.preventDefault();

        var idFuncionario = document.getElementById("id_funcionario").value;
        var dataAcesso = document.getElementById("data_acesso").value;
        var idSistemaAcesso = document.getElementById("id_sistema_acesso").value;
        var usernameAcesso = document.getElementById("username_acesso").value;
        var passwordAcesso = document.getElementById("password_acesso").value;
        var habilitadoAcesso = document.getElementById("habilitado_acesso").checked;
        var sysUserAcesso = document.getElementById("sys_user_acesso").value;

        // Crie um objeto com os dados do formulário


        $.ajax({
            url: 'pages/config/insert/salve_acessos.php',
            type: 'POST',
            data: {
                id_funcionario: idFuncionario,
                data_acesso: dataAcesso,
                id_sistema_acesso: idSistemaAcesso,
                username_acesso: usernameAcesso,
                password_acesso: passwordAcesso,
                habilitado_acesso: habilitadoAcesso,
                sys_user_acesso: sysUserAcesso
            },
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