<div class="tab-pane fade " id="tab-filiais" role="tabpanel" aria-labelledby="filiais-tab">
    <div class="d-flex flex-wrap">
        <div class="row flex-fill">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Formulário filiais

                    </div>
                    <div class="card-body">
                        <form id="filiais">
                            <!-- <div class="form-group">
                                <label for="id_filial" class="form-label">ID Filial:</label>
                                <input type="text" class="form-control" id="id_filial" name="id_filial">
                            </div> -->
                            <div class="form-group">
                                <label for="filial_nome" class="form-label">Nome da Filial:</label>
                                <input type="text" class="form-control" id="filial_nome" name="filial_nome">
                            </div>
                            <div class="form-group">
                                <label for="filial_cnpj" class="form-label">CNPJ:</label>
                                <input type="text" class="form-control" id="filial_cnpj" name="filial_cnpj">
                            </div>
                            <div class="form-group">
                                <label for="endereco_rua" class="form-label">Rua:</label>
                                <input type="text" class="form-control" id="endereco_rua" name="endereco_rua">
                            </div>
                            <div class="form-group">
                                <label for="endereco_numero" class="form-label">Número:</label>
                                <input type="text" class="form-control" id="endereco_numero" name="endereco_numero">
                            </div>
                            <div class="form-group">
                                <label for="endereco_comp" class="form-label">Complemento:</label>
                                <input type="text" class="form-control" id="endereco_comp" name="endereco_comp">
                            </div>
                            <div class="form-group">
                                <label for="endereco_bairro" class="form-label">Bairro:</label>
                                <input type="text" class="form-control" id="endereco_bairro" name="endereco_bairro">
                            </div>
                            <div class="form-group">
                                <label for="endereco_cidade" class="form-label">Cidade:</label>
                                <input type="text" class="form-control" id="endereco_cidade" name="endereco_cidade">
                            </div>
                            <div class="form-group">
                                <label for="endereco_uf" class="form-label">UF:</label>
                                <input type="text" class="form-control" id="endereco_uf" name="endereco_uf">
                            </div>
                            <div class="form-group">
                                <label for="endereco_cep" class="form-label">CEP:</label>
                                <input type="text" class="form-control" id="endereco_cep" name="endereco_cep">
                            </div>
                            <div class="form-group">
                                <label for="nome_responsavel" class="form-label">Nome do Responsável:</label>
                                <input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel">
                            </div>
                            <div class="form-group">
                                <label for="cpf_responsavel" class="form-label">CPF do Responsável:</label>
                                <input type="text" class="form-control" id="cpf_responsavel" name="cpf_responsavel">
                            </div>
                            <div class="form-group">
                                <label for="id_contatos" class="form-label">ID Contatos:</label>
                                <input type="text" class="form-control" id="id_contatos" name="id_contatos">
                            </div>
                            <div class="form-group">
                                <label for="habilitado" class="form-label">Habilitado:</label>
                                <input type="checkbox" class="form-check-input" id="habilitado" name="habilitado">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
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

                    tableData += "<td>" + item.habilitado + "</td>";
                    tableData += "<td><button class='delete-btn-filiais btn btn-danger btn-sm' data-id='" + item.id_filial + "'>Excluir</button></td>";
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

    document.getElementById("filiais").addEventListener("submit", function(event) {
        event.preventDefault();

        var idFilial = document.getElementById("id_filial").value;
        var filialNome = document.getElementById("filial_nome").value;
        var filialCNPJ = document.getElementById("filial_cnpj").value;
        var enderecoRua = document.getElementById("endereco_rua").value;
        var enderecoNumero = document.getElementById("endereco_numero").value;
        var enderecoComp = document.getElementById("endereco_comp").value;
        var enderecoBairro = document.getElementById("endereco_bairro").value;
        var enderecoCidade = document.getElementById("endereco_cidade").value;
        var enderecoUF = document.getElementById("endereco_uf").value;
        var enderecoCEP = document.getElementById("endereco_cep").value;
        var nomeResponsavel = document.getElementById("nome_responsavel").value;
        var cpfResponsavel = document.getElementById("cpf_responsavel").value;
        var idContatos = document.getElementById("id_contatos").value;
        var habilitado = document.getElementById("habilitado").checked;

        $.ajax({
            url: 'pages/config/insert/salve_filiais.php',
            type: 'POST',
            data: {
                id_filial: idFilial,
                filial_nome: filialNome,
                filial_cnpj: filialCNPJ,
                endereco_rua: enderecoRua,
                endereco_numero: enderecoNumero,
                endereco_comp: enderecoComp,
                endereco_bairro: enderecoBairro,
                endereco_cidade: enderecoCidade,
                endereco_uf: enderecoUF,
                endereco_cep: enderecoCEP,
                nome_responsavel: nomeResponsavel,
                cpf_responsavel: cpfResponsavel,
                id_contatos: idContatos,
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
                    document.getElementById("filiais").reset();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    });
});
</script>