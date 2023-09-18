<style>
#cadastro {
    display: none;
}
</style>


<div style="display: flex; justify-content: space-between;" class="mb-2">
    <h3 style="margin: 0;">Cargos</h3>
    <button id="adicionarBtn" class="btn btn-sm btn-phoenix-success">Adicionar Cargos</button>
</div>




<div class="d-flex flex-wrap">
    <div class="row flex-fill">
        <div class="col-md-12 mb-2" id="cadastro">
            <div class="card">
                <div class="card-header">
                    Formulário cargos

                </div>
                <div class="card-body">
                    <form id="cargos">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_area_cargos" class="form-label">AREA:</label>
                                    <select type="text" class="form-control" id="id_area_cargos" name="id_area_cargos"
                                        data-choices="data-choices"
                                        data-options='{"removeItemButton":true,"placeholder":true}'>
                                        <option value="">Selecione</option>
                                        <?php
                                                // Executar a consulta para obter os dados
                                                $sql_vt = "SELECT id_area, nome_area FROM aux_areas"; // Substitua "tabela" pelo nome correto da sua tabela
                                                $result_vt = $conn->query($sql_vt);

                                                // Verificar se há resultados e criar as opções
                                                if ($result_vt->num_rows > 0) {
                                                    while ($row = $result_vt->fetch_assoc()) {
                                                        $id_area = $row["id_area"];
                                                        $nome_area = $row["nome_area"];
                                                        // $visibilidade_vt = ($idVt == $id_vt) ? "selected" : "";
                                                        echo "<option value='$id_area'>$nome_area</option>";
                                                    }
                                                } else {
                                                    // echo "<option value=''>Nenhum resultado encontrado</option>";
                                                }
                                                ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cargo_nome" class="form-label">Nome do Cargo:</label>
                                    <input type="text" class="form-control" id="cargo_nome">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cargo_grupo" class="form-label">Grupo do Cargo:</label>
                                    <input type="text" class="form-control" id="cargo_grupo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cargo_nivel" class="form-label">Nivel do Cargo:</label>
                                    <input type="text" class="form-control" id="cargo_nivel">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cargo_description" class="form-label">Descrição do Cargo:</label>
                                    <textarea class="form-control" id="cargo_description"></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input mt-2" id="habilitado"
                                        class="form-label">
                                    <label class="form-check-label" for="habilitado">Habilitado?</label>
                                </div>
                                <div class="form-group d-none">
                                    <label for="sys_user" class="form-label">SYS_USER:</label>
                                    <input type="text" class="form-control" id="sys_user"
                                        value="<?php echo $id_user ?>">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>
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

                                        <th class="sort border-top">AREA</th>
                                        <th class="sort border-top">CARGO_NOME</th>
                                        <th class="sort border-top">CARGO_GRUPO</th>
                                        <th class="sort border-top">CARGO_NIVEL</th>
                                        <th class="sort border-top">CARGO_DESCRIPTION</th>
                                        <th class="sort border-top">HABILITADO</th>
                                        <th class="sort border-top">APAGAR</th>



                                    </tr>
                                </thead>
                                <tbody id="table_body_cargos" class="list">

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
                <h5 class="modal-title" id="editModalLabel">Editar Informações de Cargos </h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <div class="modal-body">
                <!-- Coloque os campos de edição aqui -->
                <form id="editForm">
                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_area_cargos_modal" class="form-label">AREA:</label>
                                <select type="text" class="form-control" id="id_area_cargos_modal"
                                    name="id_area_cargos_modal">
                                    <option value="">Selecione</option>
                                    <?php
                                                // Executar a consulta para obter os dados
                                                $sql_vt = "SELECT id_area, nome_area FROM aux_areas"; // Substitua "tabela" pelo nome correto da sua tabela
                                                $result_vt = $conn->query($sql_vt);

                                                // Verificar se há resultados e criar as opções
                                                if ($result_vt->num_rows > 0) {
                                                    while ($row = $result_vt->fetch_assoc()) {
                                                        $id_area = $row["id_area"];
                                                        $nome_area = $row["nome_area"];
                                                        // $visibilidade_vt = ($idVt == $id_vt) ? "selected" : "";
                                                        echo "<option value='$id_area'>$nome_area</option>";
                                                    }
                                                } else {
                                                    // echo "<option value=''>Nenhum resultado encontrado</option>";
                                                }
                                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cargo_nome_modal" class="form-label">Nome do Cargo:</label>
                                <input type="text" class="form-control" id="cargo_nome_modal" name="cargo_nome_modal">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cargo_grupo_modal" class="form-label">Grupo do Cargo:</label>
                                <input type="text" class="form-control" id="cargo_grupo_modal" name="cargo_grupo_modal">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cargo_nivel_modal" class="form-label">Nivel do Cargo:</label>
                                <input type="text" class="form-control" id="cargo_nivel_modal" name="cargo_nivel_modal">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cargo_description_modal" class="form-label">Descrição do Cargo:</label>
                                <textarea class="form-control" id="cargo_description_modal" name="cargo_description_modal"></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group d-none">
                                <label for="sys_user" class="form-label">SYS_USER:</label>
                                <input type="text" class="form-control" id="sys_user" value="<?php echo $id_user ?>">
                            </div>
                        </div>
                    </div>



                    <div class="form-group d-none">
                        <label for="id_modal" class="form-label">id:</label>
                        <input type="text" class="form-control" name="id_modal" id="id_modal">
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
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
// Função para carregar os itens cadastrados na inicialização da página - Formulário 2
$(document).ready(function() {
    loadItems();

    function loadItems() {
        $.ajax({
            url: 'pages/config/insert/get_cargos.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr>";

                    tableData += "<td>" + item.nome_area + "</td>";
                    tableData += "<td>" + item.cargo_nome + "</td>";
                    tableData += "<td>" + item.cargo_grupo + "</td>";
                    tableData += "<td>" + item.cargo_nivel + "</td>";
                    tableData += "<td>" + item.cargo_description + "</td>";
                    // Lógica JavaScript para adicionar a estrela com base em algum valor da variável 'item'
                    tableData += "<td><span class='status-icon' data-id='" + item.id_cargo +
                        "'>";
                    if (item.habilitado == 1) {
                        tableData += "<i class='fa-solid fa-check text-success'></i>";
                    } else {
                        tableData += "<i class='fa-solid fa-xmark text-danger'></i>";
                    }
                    tableData += "</span></td>";

                    tableData +=
                        "<td><button class='edit-btn-operacoes btn btn-phoenix-primary btn-sm' data-id='" +
                        item.id_cargo +
                        "'><i class='fa-regular fa-pen-to-square'></i></button></td>";
                    tableData += "</tr>";
                });
                $("#table_body_cargos").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".delete-btn-cargos", function() {
        var id_cargo = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_cargo);
            }
        });
    });

    function deleteItem(id_cargo) {
        $.ajax({
            url: 'pages/config/insert/delete_cargos.php',
            type: 'POST',
            data: {
                id_cargo: id_cargo
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

    document.getElementById("cargos").addEventListener("submit", function(event) {
        event.preventDefault();


        var idArea_cargos = document.getElementById("id_area_cargos").value;
        var cargoNome = document.getElementById("cargo_nome").value;
        var cargoGrupo = document.getElementById("cargo_grupo").value;
        var cargoNivel = document.getElementById("cargo_nivel").value;
        var cargoDescription = document.getElementById("cargo_description").value;
        var habilitado = document.getElementById("habilitado").checked;
        var sysUser = document.getElementById("sys_user").value;

        $.ajax({
            url: 'pages/config/insert/salve_cargos.php',
            type: 'POST',
            data: {
                id_area: idArea_cargos,
                cargo_nome: cargoNome,
                cargo_grupo: cargoGrupo,
                cargo_nivel: cargoNivel,
                cargo_description: cargoDescription,
                habilitado: habilitado,
                sys_user: sysUser
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
                    document.getElementById("cargos").reset();
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
        url: 'pages/cadastro/update/update_cargo.php',
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
        url: 'pages/config/insert/get_cargos.php', // Substitua pelo URL correto
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
                $("#id_area_cargos_modal").val(item.id_area);
                $("#cargo_nome_modal").val(item.cargo_nome);
                $("#cargo_grupo_modal").val(item.cargo_grupo);
                $("#cargo_nivel_modal").val(item.cargo_nivel);
                $("#cargo_description_modal").val(item.cargo_description);
                $("#id_modal").val(item.id_cargo);


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
        url: 'pages/config/insert/update_cargos_info.php', // Substitua pelo URL correto
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
            url: 'pages/config/insert/get_cargos.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr>";

                    tableData += "<td>" + item.nome_area + "</td>";
                    tableData += "<td>" + item.cargo_nome + "</td>";
                    tableData += "<td>" + item.cargo_grupo + "</td>";
                    tableData += "<td>" + item.cargo_nivel + "</td>";
                    tableData += "<td>" + item.cargo_description + "</td>";
                    // Lógica JavaScript para adicionar a estrela com base em algum valor da variável 'item'
                    tableData += "<td><span class='status-icon' data-id='" + item.id_cargo +
                        "'>";
                    if (item.habilitado == 1) {
                        tableData += "<i class='fa-solid fa-check text-success'></i>";
                    } else {
                        tableData += "<i class='fa-solid fa-xmark text-danger'></i>";
                    }
                    tableData += "</span></td>";

                    tableData +=
                        "<td><button class='edit-btn-operacoes btn btn-phoenix-primary btn-sm' data-id='" +
                        item.id_cargo +
                        "'><i class='fa-regular fa-pen-to-square'></i></button></td>";
                    tableData += "</tr>";
                });
                $("#table_body_cargos").html(tableData);
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