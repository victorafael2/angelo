<style>
#cadastro {
    display: none;
}
</style>


<div style="display: flex; justify-content: space-between;" class="mb-2">
    <h3 style="margin: 0;">Vale Transporte</h3>
    <button id="adicionarBtn" class="btn btn-sm btn-phoenix-success">Adicionar VT</button>
</div>

<div class="d-flex flex-wrap">
    <div class="row flex-fill">
        <div class="col-md-12 mb-2" id="cadastro">
            <div class="card">
                <div class="card-header">
                    Formulário Auxilio VT

                </div>
                <div class="card-body">
                    <form id="aux_vt_form">
                        <!-- <div class="form-group">
                                    <label for="id_vt">ID_VT:</label>
                                    <input type="text" class="form-control" id="id_vt" name="id_vt">
                                </div> -->
                        <div class="form-group">
                            <label for="vt_nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="vt_nome" name="vt_nome">
                        </div>
                        <div class="form-group">
                            <label for="vt_valor" class="form-label">Valor:</label>
                            <input type="number" class="form-control" id="vt_valor" name="vt_valor">
                        </div>
                        <div class="form-group">
                            <label for="vt_habilitado" class="form-label">HABILITADO:</label>
                            <select class="form-control" id="habilitado" name="habilitado">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <!-- <label for="sys_user">SYS_USER:</label> -->
                            <input type="text" class="form-control d-none" id="sys_user" name="sys_user"
                                value="<?php echo $id_user ?>">
                        </div>
                        <!-- <div class="form-group">
                                    <label for="sys_data">SYS_DATA:</label>
                                    <input type="date" class="form-control" id="sys_data" name="sys_data">
                                </div> -->
                        <button type="submit" class="btn btn-primary mt-2">Cadastrar Vale Transporte</button>
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
                                        <th class="sort border-top ">Habilitado</th>

                                        <th class="sort border-top ">Editar</th>
                                    </tr>
                                </thead>
                                <tbody id="table_body_vt" class="list">

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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Informações de Benefícios </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Coloque os campos de edição aqui -->
                <form id="editForm">
                    <div class="form-group">
                        <label for="vt_nome_modal" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="vt_nome_modal" name="vt_nome_modal">
                    </div>
                    <div class="form-group">
                        <label for="vt_valor_modal" class="form-label">Valor:</label>
                        <input type="number" class="form-control" id="vt_valor_modal" name="vt_valor_modal">
                    </div>

                    <div class="form-group d-none">
                        <label for="id_modal" class="form-label">id:</label>
                        <input type="text" class="form-control" name="id_modal" id="id_modal">
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Salvar Alterações</button>
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
// Função para carregar os itens cadastrados na inicialização da página - Formulário 1
$(document).ready(function() {
    loadItems();

    function loadItems() {
        $.ajax({
            url: 'pages/config/insert/get_vt.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr><td>" + item.id_vt + "</td><td>" + item.vt_nome +
                        "</td><td>" + item.vt_valor + "</td>";
                    // Lógica JavaScript para adicionar a estrela com base em algum valor da variável 'item'
                    tableData += "<td><span class='status-icon' data-id='" + item.id_vt +
                        "'>";
                    if (item.habilitado == 1) {
                        tableData += "<i class='fa-solid fa-check text-success'></i>";
                    } else {
                        tableData += "<i class='fa-solid fa-xmark text-danger'></i>";
                    }
                    tableData += "</span></td>";

                    tableData +=
                        "<td><button class='edit-btn-operacoes btn btn-phoenix-primary btn-sm' data-id='" +
                        item.id_vt +
                        "'><i class='fa-regular fa-pen-to-square'></i></button></td>";
                    tableData += "</tr>";
                });
                $("#table_body_vt").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".apagar_vt", function() {
        var id_vt = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_vt);
            }
        });
    });

    function deleteItem(id_vt) {
        $.ajax({
            url: 'pages/config/insert/delete_vt.php',
            type: 'POST',
            data: {
                id_vt: id_vt
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

    document.getElementById("aux_vt_form").addEventListener("submit", function(event) {
        event.preventDefault();

        var vt_nome = document.getElementById("vt_nome").value;
        var vt_valor = document.getElementById("vt_valor").value;
        var habilitado = document.getElementById("habilitado").value;
        var sys_user = document.getElementById("sys_user").value;

        $.ajax({
            url: 'pages/config/insert/salve_vt.php',
            type: 'POST',
            data: {
                vt_nome: vt_nome,
                vt_valor: vt_valor,
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
                    document.getElementById("aux_vt_form").reset();
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



<script>
// Adicione esta parte ao seu código JavaScript
$(document).on("click", ".status-icon", function() {
    var icon = $(this);
    var id = icon.data('id');

    // Adicione um alert para verificar se a função está sendo chamada
    /* The above code appears to be written in PHP. However, the code itself is commented out, as
    indicated by the "//" at the beginning of each line. Therefore, the code is not being executed
    and does not perform any specific action. The commented line "// alert("Clique no ícone com o
    ID: " + id);" suggests that it may have been intended to display an alert message in JavaScript,
    but it is not valid PHP syntax. */
    // alert("Clique no ícone com o ID: " + id);

    $.ajax({
        type: 'POST',
        url: 'pages/cadastro/update/update_vt.php',
        data: {
            id: id
        },
        dataType: 'json',
        success: function(response) {
            icon.html(response.icon);

            // Exiba um toast com base no novo status
            var toastMessage = (response.status == 1) ? 'Status atualizado para Ativo' :
                'Status atualizado para Inativo';

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: toastMessage
            })
        },
        error: function(xhr, status, error) {
            console.log("Erro na solicitação AJAX: " + error);
        }
    });
});
</script>

<script>
$(document).on("click", ".edit-btn-operacoes", function() {
    var id_filial = $(this).data("id");

    // Aqui você pode realizar uma chamada AJAX para buscar as informações da filial com o ID específico
    // e preencher os campos do formulário de edição no modal.

    // Exemplo de chamada AJAX (substitua pelo seu código real):
    $.ajax({
        url: 'pages/config/insert/get_vt.php', // Substitua pelo URL correto
        type: 'POST',
        data: {
            id: id_filial
        },
        dataType: 'json',
        success: function(data) {
            // Preencha os campos do modal com as informações retornadas
            console.log(data);
            console.log("Dados recebidos para filial_nome:", data.filial_nome);

            data.forEach(function(item) {
                $("#vt_nome_modal").val(item.vt_nome);
                $("#vt_valor_modal").val(item.vt_valor);
                $("#id_modal").val(item.id_vt);


            });


            // Preencha outros campos aqui

            // Abra o modal
            $("#editModal").modal("show");

        },
        error: function(xhr, status, error) {
            console.log("Erro na solicitação AJAX: " + error);
        }
    });
});

// Evento de clique no botão "Salvar Alterações" dentro do modal
$("#saveChanges").click(function() {
    // Colete os dados do formulário de edição
    var formData = $("#editForm").serialize();

    // Realize uma chamada AJAX para enviar os dados ao servidor e atualizar as informações da filial
    $.ajax({
        url: 'pages/config/insert/update_vt_info.php', // Substitua pelo URL correto
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
            // Verifique a resposta do servidor e lide com ela (por exemplo, exiba uma mensagem de sucesso)

            // Feche o modal após salvar as alterações
            $("#editModal").modal("hide");

            loadItems();

            function loadItems() {
                $.ajax({
                    url: 'pages/config/insert/get_vt.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var tableData = "";
                        data.forEach(function(item) {
                            tableData += "<tr><td>" + item.id_vt + "</td><td>" +
                                item.vt_nome + "</td><td>" + item.vt_valor +
                                "</td>";
                            // Lógica JavaScript para adicionar a estrela com base em algum valor da variável 'item'
                            tableData +=
                                "<td><span class='status-icon' data-id='" + item
                                .id_vt +
                                "'>";
                            if (item.habilitado == 1) {
                                tableData +=
                                    "<i class='fa-solid fa-check text-success'></i>";
                            } else {
                                tableData +=
                                    "<i class='fa-solid fa-xmark text-danger'></i>";
                            }
                            tableData += "</span></td>";

                            tableData +=
                                "<td><button class='edit-btn-operacoes btn btn-phoenix-primary btn-sm' data-id='" +
                                item.id_vt +
                                "'><i class='fa-regular fa-pen-to-square'></i></button></td>";
                            tableData += "</tr>";
                        });
                        $("#table_body_vt").html(tableData);
                    },
                    error: function(xhr, status, error) {
                        console.log("Erro na solicitação AJAX: " + error);
                    }
                });
            }
            loadItems();

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Atualizado com Sucesso!'
            })
        },
        error: function(xhr, status, error) {
            console.log("Erro na solicitação AJAX: " + error);
        }
    });
});
</script>