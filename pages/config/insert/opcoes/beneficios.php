<div class="tab-pane fade " id="tab-beneficios" role="tabpanel" aria-labelledby="beneficios-tab">
    <div class="d-flex flex-wrap">
        <div class="row flex-fill">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">

                        Formulário Beneficios

                    </div>
                    <div class="card-body">
                        <form id="beneficios" >

                            <div class="form-group">
                                <label for="data" class="form-label">DATA:</label>
                                <input type="date" class="form-control" id="data" name="data">
                            </div>
                            <div class="form-group">
                                <label for="beneficio_tipo" class="form-label">BENEFICIO_TIPO:</label>
                                <input type="text" class="form-control" id="beneficio_tipo" name="beneficio_tipo">
                            </div>
                            <div class="form-group">
                                <label for="beneficio_periodicidade" class="form-label">BENEFICIO_PERIODICIDADE:</label>
                                <input type="text" class="form-control" id="beneficio_periodicidade"
                                    name="beneficio_periodicidade">
                            </div>
                            <div class="form-group">
                                <label for="beneficio_valor" class="form-label">BENEFICIO_VALOR:</label>
                                <input type="text" class="form-control" id="beneficio_valor" name="beneficio_valor">
                            </div>
                            <div class="form-group">
                                <label for="habilitado" class="form-label">HABILITADO:</label>
                                <select class="form-control" id="habilitado" name="habilitado">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <input type="text" class="form-control d-none" id="sys_user" name="sys_user" value="<?php echo $id_user ?>" >
                            </div>

                            <br>

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
                                            <th class="sort border-top " data-sort="nome_sistema">Nome do Sitema</th>
                                            <th class="sort border-top " data-sort="habilitado">Habilitado</th>
                                            <th class="sort border-top ">Apagar</th>


                                        </tr>
                                    </thead>
                                    <tbody id="table_body_beneficios" class="list">

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
            url: 'pages/config/insert/get_beneficios.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr>";
                    tableData += "<td>" + item.id_beneficio + "</td>";
                    tableData += "<td>" + item.beneficio_tipo + "</td>";

                    tableData += "<td>" + item.beneficio_periodicidade + "</td>";
                    tableData +=
                        "<td><button class='delete-btn-beneficios btn btn-danger btn-sm' data-id='" +
                        item.id_beneficio + "'>Excluir</button></td>";
                    tableData += "</tr>";
                });
                $("#table_body_beneficios").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".delete-btn-beneficios", function() {
        var id_beneficio = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_beneficio);
            }
        });
    });

    function deleteItem(id_beneficio) {
        $.ajax({
            url: 'pages/config/insert/delete_beneficios.php',
            type: 'POST',
            data: {
                id_beneficio: id_beneficio
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

    document.getElementById("beneficios").addEventListener("submit", function(event) {
        event.preventDefault();
        var data = document.getElementById("data").value;
        var beneficio_tipo = document.getElementById("beneficio_tipo").value;
        var beneficio_periodicidade = document.getElementById("beneficio_periodicidade").value;
        var beneficio_valor = document.getElementById("beneficio_valor").value;
        var habilitado = document.getElementById("habilitado").value;
        var sys_user = document.getElementById("sys_user").value;

        $.ajax({
            url: 'pages/config/insert/salve_beneficios.php',
            type: 'POST',
            data: {
                data: data,
                beneficio_tipo: habilitado,
                beneficio_periodicidade: beneficio_periodicidade,
                beneficio_valor: beneficio_valor,
                habilitado: habilitado,
                sys_user: sys_user


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
                    document.getElementById("beneficios").reset();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    });
});
</script>