<div class="tab-pane fade " id="tab-areas" role="tabpanel" aria-labelledby="areas-tab">
    <div class="d-flex flex-wrap">
        <div class="row flex-fill">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Formulário Areas

                    </div>
                    <div class="card-body">
                        <form id="areas">
                            <!-- <div class="form-group">
                                <label for="id_area" class="form-label">ID_AREA:</label>
                                <input type="text" class="form-control" id="id_area" name="id_area">
                            </div> -->
                            <div class="form-group">
                                <label for="nome_area" class="form-label">NOME_AREA:</label>
                                <input type="text" class="form-control" id="nome_area" name="nome_area">
                            </div>
                            <div class="form-group">
                                <label for="habilitado_areas" class="form-label">HABILITADO:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="habilitado_areas" name="habilitado_areas">
                                    <label class="form-check-label" for="habilitado_areas">
                                        Ativo
                                    </label>
                                </div>
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

                                            <th class="sort border-top " data-sort="id">Nome</th>
                                            <th class="sort border-top " data-sort="vt_nome">Habilitado</th>
                                            <th class="sort border-top " data-sort="vt_valor">Apagar</th>



                                        </tr>
                                    </thead>
                                    <tbody id="table_body_areas" class="list">

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
            url: 'pages/config/insert/get_areas.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr>";

                    tableData += "<td>" + item.nome_area + "</td>";


                    tableData += "<td>" + item.habilitado_icon + "</td>";
                    tableData +=
                        "<td><button class='delete-btn btn btn-danger btn-sm apagar_areas' data-id='" +
                        item.id_area + "'>Excluir</button></td>";
                    tableData += "</tr>";
                });
                $("#table_body_areas").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".apagar_areas", function() {
        var id_area = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_area);
            }
        });
    });

    function deleteItem(id_area) {
        $.ajax({
            url: 'pages/config/insert/delete_areas.php',
            type: 'POST',
            data: {
                id_area: id_area
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

    document.getElementById("areas").addEventListener("submit", function(event) {
        event.preventDefault();


            var nomeArea = document.getElementById("nome_area").value;
            var habilitado = document.getElementById("habilitado_areas").checked;

        $.ajax({
            url: 'pages/config/insert/salve_areas.php',
            type: 'POST',
            data: {
                nome_area: nomeArea,
                habilitado: habilitado
            },
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    icon: response.status ? 'success' : 'error',
                    title: response.status ? 'Sucesso!' : 'Erro!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                if (response.status) {
                    loadItems();
                    document.getElementById("areas").reset();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    });
});
</script>