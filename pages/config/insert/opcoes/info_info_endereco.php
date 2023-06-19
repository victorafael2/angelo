<div class="tab-pane fade " id="tab-endereco" role="tabpanel" aria-labelledby="endereco-tab">
    <div class="d-flex flex-wrap">
        <div class="row flex-fill">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">

                        Formulário endereco

                    </div>
                    <div class="card-body">
                    <form action="insert.php" method="POST">
      <div class="form-group">
        <label for="id_funcionario">ID Funcionário:</label>
        <input type="text" class="form-control" id="id_funcionario" name="id_funcionario" required>
      </div>
      <div class="form-group">
        <label for="data">Data:</label>
        <input type="date" class="form-control" id="data" name="data" required>
      </div>
      <div class="form-group">
        <label for="endereco_rua">Endereço Rua:</label>
        <input type="text" class="form-control" id="endereco_rua" name="endereco_rua" required>
      </div>
      <div class="form-group">
        <label for="endereco_numero">Endereço Número:</label>
        <input type="text" class="form-control" id="endereco_numero" name="endereco_numero" required>
      </div>
      <div class="form-group">
        <label for="endereco_comp">Endereço Complemento:</label>
        <input type="text" class="form-control" id="endereco_comp" name="endereco_comp">
      </div>
      <div class="form-group">
        <label for="endereco_bairro">Endereço Bairro:</label>
        <input type="text" class="form-control" id="endereco_bairro" name="endereco_bairro" required>
      </div>
      <div class="form-group">
        <label for="endereco_cidade">Endereço Cidade:</label>
        <input type="text" class="form-control" id="endereco_cidade" name="endereco_cidade" required>
      </div>
      <div class="form-group">
        <label for="endereco_uf">Endereço UF:</label>
        <input type="text" class="form-control" id="endereco_uf" name="endereco_uf" required>
      </div>
      <div class="form-group">
        <label for="endereco_cep">Endereço CEP:</label>
        <input type="text" class="form-control" id="endereco_cep" name="endereco_cep" required>
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
                                            <th class="sort border-top " data-sort="habilitado">Pix Tipo</th>
                                            <th class="sort border-top " data-sort="habilitado">Pix identificação</th>
                                            <th class="sort border-top " data-sort="habilitado">Banco</th>
                                            <th class="sort border-top " data-sort="habilitado">tipode Conta</th>
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
                    tableData += "<td>" + item.id_funcionario + "</td>";

                    tableData += "<td>" + item.pix_tipo + "</td>";
                    tableData += "<td>" + item.pix_identificacao + "</td>";
                    tableData += "<td>" + item.banco_nome + "</td>";
                    tableData += "<td>" + item.banco_tipo_conta + "</td>";
                    tableData +=
                        "<td><button class='delete-btn-acesso btn btn-danger btn-sm' data-id='" +
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