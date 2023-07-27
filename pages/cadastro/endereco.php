<style>
#cadastro {
    display: none;
}
</style>


<div style="display: flex; justify-content: space-between;" class="mb-2">
    <h3 style="margin: 0;">Endereços</h3>
    <button id="adicionarBtn" class="btn btn-sm btn-phoenix-success">Adicionar Endereço</button>
</div>


<div class="d-flex flex-wrap">
    <div class="row flex-fill">
        <div class="col-md-12 mb-2" id="cadastro">
            <div class="card">
                <div class="card-header">

                    Formulário Endereço

                </div>
                <div class="card-body">
                    <form id="endereco">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_funcionario">Funcionário:</label>
                                    <select class="form-control" id="id_funcionario" name="id_funcionario"
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
                                    );"; // Substitua "tabela" pelo nome correto da sua tabela
                                    $result_vt = $conn->query($sql_vt);

                                    // Verificar se há resultados e criar as opções
                                    if ($result_vt->num_rows > 0) {
                                    while ($row = $result_vt->fetch_assoc()) {
                                        $id_funcionario = $row["id_funcionario"];
                                        $nome_social = $row["nome_social"];
                                        echo "<option value='$id_funcionario'>$nome_social</option>";
                                    }
                                    }
                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data">Data:</label>
                                    <input type="date" class="form-control" id="data" name="data">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_rua">Rua:</label>
                                    <input type="text" class="form-control" id="endereco_rua" name="endereco_rua"
                                        placeholder="Informe a rua">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_numero">Número:</label>
                                    <input type="text" class="form-control" id="endereco_numero" name="endereco_numero"
                                        placeholder="Informe o número">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_comp">Complemento:</label>
                                    <input type="text" class="form-control" id="endereco_comp" name="endereco_comp"
                                        placeholder="Informe o complemento">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_bairro">Bairro:</label>
                                    <input type="text" class="form-control" id="endereco_bairro" name="endereco_bairro"
                                        placeholder="Informe o bairro">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_cidade">Cidade:</label>
                                    <input type="text" class="form-control" id="endereco_cidade" name="endereco_cidade"
                                        placeholder="Informe a cidade">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_uf">Estado:</label>
                                    <input type="text" class="form-control" id="endereco_uf" name="endereco_uf"
                                        placeholder="Informe o estado">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_cep">CEP:</label>
                                    <input type="text" class="form-control" id="endereco_cep" name="endereco_cep"
                                        placeholder="Informe o CEP">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="habilitado" name="habilitado">
                                    <label class="form-check-label" for="habilitado">Habilitado</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="preferencial"
                                        name="preferencial">
                                    <label class="form-check-label" for="preferencial">Preferencial</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary">Enviar</button>
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
                                        <th>ID</th>
                                        <th>ID do Funcionário</th>

                                        <th>Rua</th>
                                        <th>Número</th>
                                        <th>Complemento</th>
                                        <th>Bairro</th>
                                        <th>Cidade</th>
                                        <th>Estado</th>
                                        <th>CEP</th>
                                        <th>Habilitado</th>
                                        <th>Preferencial</th>
                                        <th></th>


                                    </tr>
                                </thead>
                                <tbody id="table_body_endereco" class="list">

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
            url: 'pages/config/insert/get_endereco.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr>";
                    tableData += "<td>" + item.id_endereco + "</td>";
                    tableData += "<td>" + item.nome_social + "</td>";
                    // tableData += "<td>" + item.nome_social + "</td>";

                    tableData += "<td>" + item.endereco_rua + "</td>";
                    tableData += "<td>" + item.endereco_numero + "</td>";
                    tableData += "<td>" + item.endereco_comp + "</td>";
                    tableData += "<td>" + item.endereco_bairro + "</td>";
                    tableData += "<td>" + item.endereco_cidade + "</td>";
                    tableData += "<td>" + item.endereco_uf + "</td>";
                    tableData += "<td>" + item.endereco_cep + "</td>";
                    tableData += "<td>" + item.habilitado_icon + "</td>";
                    tableData += "<td>" + item.preferencial_icon + "</td>";
                    tableData +=
                        "<td><button class='delete-btn-endereco btn btn-danger btn-sm' data-id='" +
                        item.id_endereco + "'>Excluir</button></td>";
                    tableData += "</tr>";
                });
                $("#table_body_endereco").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".delete-btn-endereco", function() {
        var id_endereco = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_endereco);
            }
        });
    });

    function deleteItem(id_endereco) {
        $.ajax({
            url: 'pages/config/insert/delete_endereco.php',
            type: 'POST',
            data: {
                id_endereco: id_endereco
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

    document.getElementById("endereco").addEventListener("submit", function(event) {
        event.preventDefault();

        var formData_endereco = $(this).serialize();

        // Crie um objeto com os dados do formulário


        $.ajax({
            url: 'pages/config/insert/salve_endereco.php',
            type: 'POST',
            data: formData_endereco,
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
                    document.getElementById("endereco").reset();
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