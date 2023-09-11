<style>
#cadastro {
    display: none;
}
</style>


<div style="display: flex; justify-content: space-between;" class="mb-2">
    <h3 style="margin: 0;">Filiais</h3>
    <button id="adicionarBtn" class="btn btn-sm btn-phoenix-success">Adicionar Filial</button>
</div>



<div class="d-flex flex-wrap">
    <div class="row flex-fill">
        <div class="col-md-12 mb-2" id="cadastro">
            <div class="card">
                <div class="card-header">
                    Formulário filiais

                </div>
                <div class="card-body">
                    <form id="filiais">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="filial_nome" class="form-label">Nome da Filial:</label>
                                    <input type="text" class="form-control" id="filial_nome" name="filial_nome">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="filial_cnpj" class="form-label">CNPJ:</label>
                                    <input type="number" class="form-control" id="filial_cnpj" name="filial_cnpj">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_rua" class="form-label">Rua:</label>
                                    <input type="text" class="form-control" id="endereco_rua" name="endereco_rua">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_numero" class="form-label">Número:</label>
                                    <input type="number" class="form-control" id="endereco_numero" name="endereco_numero">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_comp" class="form-label">Complemento:</label>
                                    <input type="text" class="form-control" id="endereco_comp" name="endereco_comp">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_bairro" class="form-label">Bairro:</label>
                                    <input type="text" class="form-control" id="endereco_bairro" name="endereco_bairro">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="endereco_cidade" name="endereco_cidade">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_uf" class="form-label">UF</label>
                                    <select class="form-control" id="endereco_uf" name="endereco_uf">
                                        <option value=""></option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_cep" class="form-label">CEP</label>
                                    <input type="number" class="form-control" id="endereco_cep" name="endereco_cep">
                                </div>
                            </div>
                        </div>

                        <!-- Add other form rows in the same way -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nome_responsavel" class="form-label">Nome do Responsável:</label>
                                    <input type="text" class="form-control" id="nome_responsavel"
                                        name="nome_responsavel">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cpf_responsavel" class="form-label">CPF do Responsável:</label>
                                    <input type="number" class="form-control" id="cpf_responsavel" name="cpf_responsavel">
                                </div>
                            </div>
                            <div class="col-md-4 d-none">
                                <div class="form-group">
                                    <label for="id_contatos" class="form-label">ID Contatos:</label>
                                    <input type="text" class="form-control" id="id_contatos" name="id_contatos">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="habilitado" class="form-label">Habilitado:</label>
                                    <input type="checkbox" class="form-check-input" id="habilitado" name="habilitado">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>


                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Filiais Cadastrados
                </div>
                <div class="card-body">
                    <div id="tableExample2" data-list='{"valueNames":["id","email","age"],"page":5,"pagination":true}'>
                        <div class="table-responsive ms-n1 ps-1 scrollbar">
                            <table class="table table-striped table-sm fs--1 mb-0">
                                <thead>
                                    <tr>

                                        <th class="sort border-top " data-sort="id">ID</th>
                                        <th class="sort border-top " data-sort="vt_nome">Nome Filial</th>
                                        <th class="sort border-top " data-sort="vt_valor">CNPJ</th>
                                        <th class="sort border-top ">Rua</th>
                                        <th class="sort border-top ">Numero</th>
                                        <th class="sort border-top ">Complemento</th>
                                        <th class="sort border-top ">Bairro</th>
                                        <th class="sort border-top ">Cidade</th>
                                        <th class="sort border-top ">UF</th>
                                        <th class="sort border-top ">CEP</th>
                                        <th class="sort border-top ">Nome Responsável</th>
                                        <th class="sort border-top ">Habilitado</th>
                                        <th class="sort border-top ">Apagar</th>


                                    </tr>
                                </thead>
                                <tbody id="table_body_filial" class="list">

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
            url: 'pages/config/insert/get_filiais.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr>";
                    tableData += "<td>" + item.id_filial + "</td>";
                    tableData += "<td>" + item.filial_nome + "</td>";
                    tableData += "<td>" + item.filial_cnpj + "</td>";
                    tableData += "<td>" + item.endereco_rua + "</td>";
                    tableData += "<td>" + item.endereco_numero + "</td>";
                    tableData += "<td>" + item.endereco_comp + "</td>";
                    tableData += "<td>" + item.endereco_bairro + "</td>";
                    tableData += "<td>" + item.endereco_cidade + "</td>";
                    tableData += "<td>" + item.endereco_uf + "</td>";
                    tableData += "<td>" + item.endereco_cep + "</td>";
                    tableData += "<td>" + item.nome_responsavel + "</td>";

                    tableData += "<td>" + item.habilitado_icon + "</td>";
                    tableData +=
                        "<td><button class='delete-btn-filiais btn btn-danger btn-sm' data-id='" +
                        item.id_filial + "'>Excluir</button></td>";
                    tableData += "</tr>";
                });
                $("#table_body_filial").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".delete-btn-filiais", function() {
        var id_filial = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_filial);
            }
        });
    });

    function deleteItem(id_filial) {
        $.ajax({
            url: 'pages/config/insert/delete_filiais.php',
            type: 'POST',
            data: {
                id_filial: id_filial
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

    // Evento de escuta para o botão "Salvar" dentro do formulário
    $("#filiais").on("submit", function(event) {
        event.preventDefault();

        // Pegar os dados do formulário
        var formData = {
            filial_nome: $("#filial_nome").val(),
            filial_cnpj: $("#filial_cnpj").val(),
            endereco_rua: $("#endereco_rua").val(),
            endereco_numero: $("#endereco_numero").val(),
            endereco_comp: $("#endereco_comp").val(),
            endereco_bairro: $("#endereco_bairro").val(),
            endereco_cidade: $("#endereco_cidade").val(),
            endereco_uf: $("#endereco_uf").val(),
            endereco_cep: $("#endereco_cep").val(),
            nome_responsavel: $("#nome_responsavel").val(),
            cpf_responsavel: $("#cpf_responsavel").val(),
            id_contatos: $("#id_contatos").val(),
            habilitado: $("#habilitado").is(":checked")
        };

        // Verifying if all required fields are filled
        if (
            !formData.filial_nome ||
            !formData.filial_cnpj ||
            !formData.endereco_rua ||
            !formData.endereco_numero ||
            !formData.endereco_bairro ||
            !formData.endereco_cidade ||
            !formData.endereco_uf ||
            !formData.endereco_cep ||
            !formData.nome_responsavel ||
            !formData.cpf_responsavel
        ) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Todos os campos são obrigatórios, exceto o de "Habilitado"!',
            });
            return; // Exit the function if any required field is empty
        }

        // Mostrar o diálogo de confirmação do SweetAlert2
        Swal.fire({
            title: 'Tem certeza?',
            text: "Deseja salvar as informações da filial?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, salvar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // O usuário confirmou, prosseguir com o envio do formulário
                salvarFormulario(formData);
            }
        });
    });

    function salvarFormulario(formData) {
        $.ajax({
            url: 'pages/config/insert/salve_filiais.php',
            type: 'POST',
            data: formData,
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
                    $("#filiais")[0].reset();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

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