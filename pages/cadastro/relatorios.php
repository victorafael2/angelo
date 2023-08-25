<style>
#cadastro {
    display: none;
}
</style>


<div style="display: flex; justify-content: space-between;" class="mb-2">
    <h3 style="margin: 0;">Relatórios</h3>
    <button id="adicionarBtn" class="btn btn-sm btn-phoenix-success">Adicionar Relatório</button>
</div>



<div class="d-flex flex-wrap">
    <div class="row flex-fill">
        <div class="col-md-12 mb-2" id="cadastro">
            <div class="card">
                <div class="card-header">
                    Formulário Relatório

                </div>
                <div class="card-body">
                    <form id="reportForm">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="reportName">Nome do Relatório</label>
                                    <input type="text" class="form-control" id="reportName" name="reportName" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="reportLink">Link do Relatório PowerBi</label>
                                    <input type="text" class="form-control" id="reportLink" name="reportLink" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="d-block">Ativar Relatório</label>
                                    <input type="checkbox" class="form-check-input" id="activateReport"
                                        name="activateReport">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-phoenix-primary mt-2">Salvar</button>
                    </form>


                </div>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header">

                    Relatórios

                </div>
                <div class="card-body">
                    <div id="relatorios-lista" class="col-md-12"></div>
                </div>
            </div>

        </div>

    </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script>
$(document).ready(function() {
    $("#reportForm").submit(function(e) {
        e.preventDefault();

        // Obter os valores dos campos do formulário
        var reportName = $("#reportName").val();
        var reportLink = $("#reportLink").val();
        var activateReport = $("#activateReport").is(":checked");

        // Simular o envio dos dados via AJAX
        $.ajax({
            type: "POST",
            url: "pages/cadastro/add/add_relatorio.php",
            data: {
                reportName: reportName,
                reportLink: reportLink,
                activateReport: activateReport
            },
            success: function() {
                // Exibir mensagem de sucesso usando o SweetAlert2
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Relatório salvo com sucesso!',
                });

                // Limpar os campos do formulário
                $("#reportForm")[0].reset();
            },
            error: function() {
                // Exibir mensagem de erro usando o SweetAlert2
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'Ocorreu um erro ao salvar o relatório.',
                });
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
$(document).ready(function() {
    // Carrega a lista de relatórios
    loadRelatorios();

    // Função para carregar a lista de relatórios via AJAX
    function loadRelatorios() {
        $.ajax({
            type: "GET",
            url: "pages/cadastro/list/relatorios.php",
            success: function(data) {
                $("#relatorios-lista").html(data);
            }
        });
    }

    // Delega o evento de exclusão do relatório
    $(document).on("click", ".delete-button", function() {
        var id = $(this).data("id");
        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, apagar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Envia a requisição para apagar o relatório
                $.ajax({
                    type: "POST",
                    url: "salvar_relatorio.php",
                    data: {
                        action: "delete",
                        id: id
                    },
                    success: function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sucesso',
                            text: 'Relatório apagado com sucesso!',
                        });
                        loadRelatorios(); // Recarrega a lista de relatórios
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: 'Ocorreu um erro ao apagar o relatório.',
                        });
                    }
                });
            }
        });
    });



     // Delega o evento de edição do relatório
     $(document).on("click", ".edit-button", function () {
            var id = $(this).data("id");

            // Envia a requisição para obter os detalhes do relatório
            $.ajax({
                type: "GET",
                url: "pages/cadastro/list/list_relatorios.php",
                data: { id: id },
                success: function (data) {
                    $("#relatorios-lista").html(data);

                    // Adiciona o evento de salvar ao botão "Salvar"
                    $(".save-button").click(function () {
                        var formData = $(".edit-form").serialize();

                        // Envia a requisição para salvar as alterações
                        $.ajax({
                            type: "POST",
                            url: "pages/cadastro/update/update_relatorio.php",
                            data: formData,
                            success: function (response) {
                                var result = JSON.parse(response);
                                if (result.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Sucesso',
                                        text: 'Alterações salvas com sucesso!',
                                    });
                                    loadRelatorios(); // Recarrega a lista de relatórios
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro',
                                        text: result.error,
                                    });
                                }
                            }
                        });
                    });
                }
            });
        });

});
</script>