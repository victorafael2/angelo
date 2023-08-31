<style>
#cadastro {
    display: none;
}
</style>


<div style="display: flex; justify-content: space-between;" class="mb-2">
    <h3 style="margin: 0;">Sistemas</h3>
    <button id="adicionarBtn" class="btn btn-sm btn-phoenix-success">Adicionar Sistema</button>
</div>


    <div class="d-flex flex-wrap">
        <div class="row flex-fill">
            <div class="col-md-12 mb-2" id="cadastro">
                <div class="card">
                    <div class="card-header">

                        Formulário Sistemas

                    </div>
                    <div class="card-body">
                        <form id="sistemas">
                            <div class="form-group">
                                <label for="nome_sistema" class="form-label">Nome do Sistema:</label>
                                <input type="text" class="form-control" id="nome_sistema" name="nome_sistema" required>
                            </div>
                            <div class="form-group">
                                <label for="habilitado_sistemas" class="form-label">Habilitado:</label>
                                <select class="form-control" id="habilitado_sistemas" name="habilitado_sistemas"
                                    required>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
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
                                    <tbody id="table_body_sistemas" class="list">

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
            url: 'pages/config/insert/get_sistemas.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr>";
                    tableData += "<td>" + item.id_sistema + "</td>";
                    tableData += "<td>" + item.nome_sistema + "</td>";

                    tableData += "<td>" + item.habilitado_icon + "</td>";
                    tableData +=
                        "<td><button class='delete-btn-sistemas btn btn-danger btn-sm' data-id='" +
                        item.id_sistema + "'>Excluir</button></td>";
                    tableData += "</tr>";
                });
                $("#table_body_sistemas").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".delete-btn-sistemas", function() {
        var id_sistema = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_sistema);
            }
        });
    });

    function deleteItem(id_sistema) {
        $.ajax({
            url: 'pages/config/insert/delete_sistemas.php',
            type: 'POST',
            data: {
                id_sistema: id_sistema
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

    document.getElementById("sistemas").addEventListener("submit", function(event) {
        event.preventDefault();
        var nome_sistema = document.getElementById("nome_sistema").value;
        var habilitado = document.getElementById("habilitado_sistemas").value;

        $.ajax({
            url: 'pages/config/insert/salve_sistemas.php',
            type: 'POST',
            data: {
                nome_sistema: nome_sistema,
                habilitado: habilitado,

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


<script>
$(document).ready(function() {
    // ... your existing code ...

    // Event listener for the "adicionar" button
    $("#adicionarBtn").on("click", function() {
        $("#cadastro").toggle(); // This will toggle the visibility of the "cadastro" div
    });
});
</script>