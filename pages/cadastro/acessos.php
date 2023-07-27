<style>
#cadastro {
    display: none;
}
</style>


<div style="display: flex; justify-content: space-between;" class="mb-2">
    <h3 style="margin: 0;">Acessos</h3>
    <button id="adicionarBtn" class="btn btn-sm btn-phoenix-success">Adicionar Acesso</button>
</div>

    <div class="d-flex flex-wrap">
        <div class="row flex-fill">
            <div class="col-md-12 mb-2" id="cadastro">
                <div class="card">
                    <div class="card-header">

                        Formulário Acessos

                    </div>
                    <div class="card-body">
                        <form id="acessos">
                            <div class="form-group">
                                <label for="id_funcionario" class="form-label">Funcionário:</label>
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
                                <label for="data" class="form-label">Data:</label>
                                <input type="date" class="form-control" id="data_acesso" name="data_acesso" required>
                            </div>
                            <div class="form-group">
                                <label for="id_sistema" class="form-label">ID Sistema:</label>
                                <!-- <input type="text" class="form-control" id="id_sistema_acesso" name="id_sistema_acesso" required> -->
                                <select type="text" class="form-control" id="id_sistema_acesso" name="id_sistema_acesso"
                                        data-choices="data-choices"
                                        data-options='{"removeItemButton":true,"placeholder":true}'>
                                        <option value="">Selecione</option>



                                        <?php
                                        // Executar a consulta para obter os dados
                                        $sql_vt = "SELECT * from aux_sistemas";

                                       // Substitua "tabela" pelo nome correto da sua tabela
                                        $result_vt = $conn->query($sql_vt);

                                        // Verificar se há resultados e criar as opções
                                        if ($result_vt->num_rows > 0) {
                                            while ($row = $result_vt->fetch_assoc()) {
                                                $id_sistema = $row["id_sistema"];
                                                $nome_sistema = $row["nome_sistema"];
                                                // $visibilidade_vt = ($idVt == $id_vt) ? "selected" : "";

                                                echo "<option value='$id_sistema' >$nome_sistema</option>";
                                            }
                                        } else {
                                            // echo "<option value=''>Nenhum resultado encontrado</option>";
                                        }
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username_acesso" name="username_acesso" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password_acesso" name="password_acesso" required>
                            </div>
                            <!-- <div class="form-group">
                                <label for="habilitado">Habilitado:</label>
                                <input type="checkbox" class="form-control" id="habilitado" name="habilitado">
                            </div> -->
                            <div class="form-check mt-2">

                                <input class="form-check-input" id="habilitado_acesso" name="habilitado_acesso" type="checkbox" value="" />

                                <label class="form-check-label" for="habilitado_acesso">Habilitado</label>
                            </div>
                            <div class="form-group d-none">
                                <label for="sys_user">Sys User:</label>
                                <input type="text" class="form-control" id="sys_user_acesso" name="sys_user_acesso"
                                    value="<?php echo $id_user ?>" required>
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
                    tableData += "<td>" + item.habilitado_icon + "</td>";
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

<script>
$(document).ready(function() {
    // ... your existing code ...

    // Event listener for the "adicionar" button
    $("#adicionarBtn").on("click", function() {
        $("#cadastro").toggle(); // This will toggle the visibility of the "cadastro" div
    });
});
</script>