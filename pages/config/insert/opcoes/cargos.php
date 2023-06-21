<div class="tab-pane fade " id="tab-cargos" role="tabpanel" aria-labelledby="cargos-tab">
    <div class="d-flex flex-wrap">
        <div class="row flex-fill">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Formulário cargos

                    </div>
                    <div class="card-body">
                        <form id="cargos">

                            <div class="form-group">
                                <label for="id_area_cargos" class="form-label">AREA:</label>
                                <!-- <input type="text" class="form-control" id="id_area"> -->
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

                                                echo "<option value='$id_area' >$nome_area</option>";
                                            }
                                        } else {
                                            // echo "<option value=''>Nenhum resultado encontrado</option>";
                                        }
                                        ?>
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="cargo_nome" class="form-label">CARGO_NOME:</label>
                                <input type="text" class="form-control" id="cargo_nome">
                            </div>
                            <div class="form-group">
                                <label for="cargo_grupo" class="form-label">CARGO_GRUPO:</label>
                                <input type="text" class="form-control" id="cargo_grupo">
                            </div>
                            <div class="form-group">
                                <label for="cargo_nivel" class="form-label">CARGO_NIVEL:</label>
                                <input type="text" class="form-control" id="cargo_nivel">
                            </div>
                            <div class="form-group">
                                <label for="cargo_description" class="form-label">CARGO_DESCRIPTION:</label>
                                <textarea class="form-control" id="cargo_description"></textarea>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="habilitado" class="form-label">
                                <label class="form-check-label" for="habilitado">HABILITADO</label>
                            </div>
                            <div class="form-group d-none">
                                <label for="sys_user" class="form-label">SYS_USER:</label>
                                <input type="text" class="form-control" id="sys_user" value="<?php echo $id_user ?>">
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
                    tableData += "<td>" + item.habilitado + "</td>";

                    tableData +=
                        "<td><button class='delete-btn-cargos btn btn-danger btn-sm' data-id='" +
                        item.id_cargo + "'>Excluir</button></td>";
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