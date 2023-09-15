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
                                        <th class="sort border-top ">Editar</th>


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



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Informações da Filial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Coloque os campos de edição aqui -->
                <form id="editForm">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="filial_nome_modal" class="form-label">Nome da Filial:</label>
                                    <input type="text" class="form-control" id="filial_nome_modal" name="filial_nome_modal">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="filial_cnpj_modal" class="form-label">CNPJ:</label>
                                    <input type="number" class="form-control" id="filial_cnpj_modal" name="filial_cnpj_modal">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_rua_modal" class="form-label">Rua:</label>
                                    <input type="text" class="form-control" id="endereco_rua_modal" name="endereco_rua_modal">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_numero_modal" class="form-label">Número:</label>
                                    <input type="number" class="form-control" id="endereco_numero_modal" name="endereco_numero_modal">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_comp_modal" class="form-label">Complemento:</label>
                                    <input type="text" class="form-control" id="endereco_comp_modal" name="endereco_comp_modal">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_bairro_modal" class="form-label">Bairro:</label>
                                    <input type="text" class="form-control" id="endereco_bairro_modal" name="endereco_bairro_modal">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_cidade_modal" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="endereco_cidade_modal" name="endereco_cidade_modal">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="endereco_uf_modal" class="form-label">UF</label>
                                    <select class="form-control" id="endereco_uf_modal" name="endereco_uf_modal">
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
                                    <label for="endereco_cep_modal" class="form-label">CEP</label>
                                    <input type="number" class="form-control" id="endereco_cep_modal" name="endereco_cep_modal">
                                </div>
                            </div>
                        </div>

                        <!-- Add other form rows in the same way -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nome_responsavel_modal" class="form-label">Nome do Responsável:</label>
                                    <input type="text" class="form-control" id="nome_responsavel_modal"
                                        name="nome_responsavel_modal">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cpf_responsavel_modal" class="form-label">CPF do Responsável:</label>
                                    <input type="number" class="form-control" id="cpf_responsavel_modal" name="cpf_responsavel_modal">
                                </div>
                            </div>
                            <div class="col-md-4 d-none">
                                <div class="form-group">
                                    <label for="id_filial_modal" class="form-label">ID filial</label>
                                    <input type="text" class="form-control" id="id_filial_modal" name="id_filial_modal">
                                </div>
                            </div>
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

                    // tableData += "<td>" + item.habilitado_icon + "</td>";

                  // Lógica JavaScript para adicionar a estrela com base em algum valor da variável 'item'
                        tableData += "<td><span class='status-icon' data-id='" + item.id_filial + "'>";
                        if (item.habilitado == 1) {
                            tableData += "<i class='fa-solid fa-check text-success'></i>";
                        } else {
                            tableData += "<i class='fa-solid fa-xmark text-danger'></i>";
                        }
                        tableData += "</span></td>";


                    // Substitua o código que gera o botão "Excluir" pelo botão "Editar"
                    tableData +=
                    "<td><button class='edit-btn-filiais btn btn-primary btn-sm' data-id='" +
                    item.id_filial + "'>Editar</button></td>";
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
        url: 'pages/cadastro/update/update_filiais.php',
        data: { id: id },
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
$(document).on("click", ".edit-btn-filiais", function() {
    var id_filial = $(this).data("id");

    // Aqui você pode realizar uma chamada AJAX para buscar as informações da filial com o ID específico
    // e preencher os campos do formulário de edição no modal.

    // Exemplo de chamada AJAX (substitua pelo seu código real):
    $.ajax({
        url: 'pages/config/insert/get_filiais.php', // Substitua pelo URL correto
        type: 'POST',
        data: { id: id_filial },
        dataType: 'json',
        success: function(data) {
            // Preencha os campos do modal com as informações retornadas
            console.log(data);
            console.log("Dados recebidos para filial_nome:", data.filial_nome);

            data.forEach(function(item) {
                console.log("Dados recebidos para filial_nome 2:", item.filial_nome);
                $("#filial_nome_modal").val(item.filial_nome);
                $("#filial_cnpj_modal").val(item.filial_cnpj);
                $("#endereco_rua_modal").val(item.endereco_rua);
                $("#endereco_numero_modal").val(item.endereco_numero);
                $("#endereco_comp_modal").val(item.endereco_comp);
                $("#endereco_bairro_modal").val(item.endereco_bairro);
                $("#endereco_cidade_modal").val(item.endereco_cidade);
                $("#endereco_uf_modal").val(item.endereco_uf);
                $("#endereco_cep_modal").val(item.endereco_cep);
                $("#nome_responsavel_modal").val(item.nome_responsavel);
                $("#cpf_responsavel_modal").val(item.cpf_responsavel);
                $("#id_filial_modal").val(item.id_filial);

            })

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
        url: 'pages/config/insert/update_filial_info.php', // Substitua pelo URL correto
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

                    // tableData += "<td>" + item.habilitado_icon + "</td>";

                  // Lógica JavaScript para adicionar a estrela com base em algum valor da variável 'item'
                        tableData += "<td><span class='status-icon' data-id='" + item.id_filial + "'>";
                        if (item.habilitado == 1) {
                            tableData += "<i class='fa-solid fa-check text-success'></i>";
                        } else {
                            tableData += "<i class='fa-solid fa-xmark text-danger'></i>";
                        }
                        tableData += "</span></td>";


                    // Substitua o código que gera o botão "Excluir" pelo botão "Editar"
                    tableData +=
                    "<td><button class='edit-btn-filiais btn btn-primary btn-sm' data-id='" +
                    item.id_filial + "'>Editar</button></td>";
                tableData += "</tr>";
                });
                $("#table_body_filial").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }
    loadItems();
        },
        error: function(xhr, status, error) {
            console.log("Erro na solicitação AJAX: " + error);
        }
    });
});



</script>