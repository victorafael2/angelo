<style>
#cadastro {
    display: none;
}
</style>


<div style="display: flex; justify-content: space-between;" class="mb-2">
    <h3 style="margin: 0;">Vale Alimentação</h3>
    <button id="adicionarBtn" class="btn btn-sm btn-phoenix-success">Adicionar Alimentação</button>
</div>



<div class="d-flex flex-wrap">
    <div class="row flex-fill">
        <div class="col-md-12 mb-2" id="cadastro">
            <div class="card">
                <div class="card-header">
                    Formulário Auxilio Alimentação

                </div>
                <div class="card-body">
                    <form id="aux_ali_form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vt_nome" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" id="vr_nome" name="vr_nome">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vt_valor" class="form-label">Valor:</label>
                                    <input type="number" class="form-control" id="vr_valor" name="vr_valor">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="habilitado" class="form-label">HABILITADO:</label>
                                    <select class="form-control" id="habilitado" name="habilitado">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control d-none" id="sys_user" name="sys_user"
                                        value="<?php echo $id_user ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-2">Cadastrar Vale Alimentação</button>
                            </div>
                        </div>
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
                    <div id="tableExample2" data-list='{"valueNames":["id","email","age"],"page":5,"pagination":true}'>
                        <div class="table-responsive ms-n1 ps-1 scrollbar">
                            <table class="table table-striped table-sm fs--1 mb-0">
                                <thead>
                                    <tr>

                                        <th class="sort border-top " data-sort="id">ID</th>
                                        <th class="sort border-top " data-sort="vt_nome">Nome</th>
                                        <th class="sort border-top " data-sort="vt_valor">Valor R$</th>
                                        <th class="sort border-top text-center">Habilitado</th>

                                        <th class="sort border-top ">Apagar</th>
                                    </tr>
                                </thead>
                                <tbody id="table_body_ali" class="list">

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
            url: 'pages/config/insert/get_ali.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr><td>" + item.id_vr + "</td><td>" + item.vr_nome +
                        "</td><td>" + item.vr_valor + "</td><td class='text-center'>" + item
                        .habilitado_icon +
                        "</td><td><button class='delete-btn btn btn-danger btn-sm apagar_va' data-id='" +
                        item.id_vr + "'>Excluir</button></td></tr></tr>";
                });
                $("#table_body_ali").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".apagar_va", function() {
        var id_vr = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_vr);
            }
        });
    });

    function deleteItem(id_vr) {
        $.ajax({
            url: 'pages/config/insert/delete_ali.php',
            type: 'POST',
            data: {
                id_vr: id_vr
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
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    document.getElementById("aux_ali_form").addEventListener("submit", function(event) {
        event.preventDefault();

        var vr_nome = document.getElementById("vr_nome").value;
        var vr_valor = document.getElementById("vr_valor").value;
        var habilitado = document.getElementById("habilitado").value;
        var sys_user = document.getElementById("sys_user").value;

        $.ajax({
            url: 'pages/config/insert/salve_ali.php',
            type: 'POST',
            data: {
                vr_nome: vr_nome,
                vr_valor: vr_valor,
                habilitado: habilitado,
                sys_user: sys_user
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
                    document.getElementById("aux_ali_form").reset();
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