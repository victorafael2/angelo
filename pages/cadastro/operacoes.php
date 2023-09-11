<style>
#cadastro {
    display: none;
}
</style>


<div style="display: flex; justify-content: space-between;" class="mb-2">
    <h3 style="margin: 0;">Operações</h3>
    <button id="adicionarBtn" class="btn btn-sm btn-phoenix-success">Adicionar Operação</button>
</div>



<div class="d-flex flex-wrap">
    <div class="row flex-fill">
        <div class="col-md-12 mb-2" id="cadastro">
            <div class="card">
                <div class="card-header">
                    Formulário Cadastro Operações

                </div>
                <div class="card-body">
                    <form id="operacoes">
                        <div class="form-group">
                            <!-- <label for="id_area">ID Área:</label> -->
                            <!-- <input type="text" class="form-control" name="id_area" id="id_area" required> -->
                            <!-- <div class=""> -->
                            <label for="id_area" class="form-label" >Area</label>
                            <!-- <input type="text" class="form-control" id="idVt" name="idVt" value="<?php echo $idVt; ?>"> -->
                            <select type="text" class="form-control" id="id_area" name="id_area"
                                 >
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
                            <!-- </div> -->
                        </div>

                        <div class="form-group">
                            <label for="nome_operacao" class="form-label">Nome Operação:</label>
                            <input type="text" class="form-control" name="nome_operacao" id="nome_operacao"
                                >
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="hr_ini_seg" class="form-label">Hora Início Segunda:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_ini_seg"
                                        id="hr_ini_seg" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="hr_fim_seg" class="form-label">Hora Fim Segunda:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_fim_seg"
                                        id="hr_fim_seg" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-soft-secondary btn-block mt-2 mb-1"
                                        onclick="copiarHorarios()">Copiar Horários para os demais dias</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hr_ini_ter">Hora Início Terça:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_ini_ter"
                                        id="hr_ini_ter" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hr_fim_ter">Hora Fim Terça:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_fim_ter"
                                        id="hr_fim_ter" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hr_ini_qua">Hora Início Quarta:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_ini_qua"
                                        id="hr_ini_qua" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hr_fim_qua">Hora Fim Quarta:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_fim_qua"
                                        id="hr_fim_qua" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hr_ini_qui">Hora Início Quinta:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_ini_qui"
                                        id="hr_ini_qui" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hr_fim_qui">Hora Fim Quinta:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_fim_qui"
                                        id="hr_fim_qui" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hr_ini_sex">Hora Início Sexta:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_ini_sex"
                                        id="hr_ini_sex" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hr_fim_sex">Hora Fim Sexta:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_fim_sex"
                                        id="hr_fim_sex" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hr_ini_sab">Hora Início Sábado:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_ini_sab"
                                        id="hr_ini_sab" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hr_fim_sab">Hora Fim Sábado:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_fim_sab"
                                        id="hr_fim_sab" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hr_ini_dom">Hora Início Domingo:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_ini_dom"
                                        id="hr_ini_dom" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hr_fim_dom">Hora Fim Domingo:</label>
                                    <input type="text" class="form-control datetimepicker" name="hr_fim_dom"
                                        id="hr_fim_dom" type="text" placeholder="hora : minuto"
                                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-check mt-2">
                            <input class="form-check-input" type="checkbox" class="form-check-input"
                                name="habilitado" id="habilitado">
                            <label class="form-check-label" for="habilitado">Habilitado</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
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
                    <div id="tableExample23"
                        data-list='{"valueNames":["id","email","age"],"page":5,"pagination":true}'>
                        <div class="table-responsive ms-n1 ps-1 scrollbar">
                            <table class="table table-striped table-sm fs--1 mb-0">
                                <thead>
                                    <tr>

                                        <!-- <th>ID Área</th>
                                        <th>ID Operação</th> -->
                                        <th>Nome Operação</th>
                                        <th>Hora Início Segunda</th>
                                        <th>Hora Fim Segunda</th>
                                        <th>Hora Início Terça</th>
                                        <th>Hora Fim Terça</th>
                                        <th>Hora Início Quarta</th>
                                        <th>Hora Fim Quarta</th>
                                        <th>Hora Início Quinta</th>
                                        <th>Hora Fim Quinta</th>
                                        <th>Hora Início Sexta</th>
                                        <th>Hora Fim Sexta</th>
                                        <th>Hora Início Sábado</th>
                                        <th>Hora Fim Sábado</th>
                                        <th>Hora Início Domingo</th>
                                        <th>Hora Fim Domingo</th>
                                        <th>Habilitado</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="table_body_operacoes" class="list">

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
            url: 'pages/config/insert/get_operacoes.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr><td>" + item.nome_operacao + "</td><td>" + item.hr_ini_seg +
                        "</td><td>" + item.hr_fim_seg + "</td><td>" + item.hr_ini_ter +
                        "</td><td>" + item.hr_fim_ter + "</td><td>" + item.hr_ini_qua +
                        "</td><td>" + item.hr_fim_qua + "</td><td>" + item.hr_ini_qui +
                        "</td><td>" + item.hr_fim_qui + "</td><td>" + item.hr_ini_sex +
                        "</td><td>" + item.hr_fim_sex + "</td><td>" + item.hr_ini_sab +
                        "</td><td>" + item.hr_fim_sab + "</td><td>" + item.hr_ini_dom +
                        "</td><td>" + item.hr_fim_dom + "</td><td>" + item.habilitado_icon +
                        "</td><td><button class='delete-btn btn btn-danger btn-sm apagar_operacoes' data-id='" +
                        item.id_operacao + "'>Excluir</button></td></tr>";


                });
                $("#table_body_operacoes").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".apagar_operacoes", function() {
        var id_operacao = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_operacao);
            }
        });
    });

    function deleteItem(id_operacao) {
        $.ajax({
            url: 'pages/config/insert/delete_operacoes.php',
            type: 'POST',
            data: {
                id_operacao: id_operacao
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


});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('operacoes');
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Impede o envio do formulário padrão

            // Inicializa uma variável para armazenar o nome do campo vazio
            let campoVazio = '';

            // Verifica se o campo id_area foi selecionado
            const id_area = document.getElementById('id_area');
            if (id_area.selectedIndex === 0) {
                campoVazio = 'Área';
            }

            // Seleciona todos os campos de entrada e selects, exceto o campo de checkbox
            const inputs = form.querySelectorAll('input:not([type="checkbox"]), select');

            // Verifica se todos os campos, exceto o checkbox, estão preenchidos
            const camposVazios = Array.from(inputs).filter(input => input.value.trim() === '');

            if ( camposVazios.length > 0) {
                // Se o campo id_area não foi selecionado ou outros campos estão vazios
                // Mostra um SweetAlert2 com a mensagem indicando qual campo está vazio
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: campoVazio ? `O campo ${campoVazio} deve ser selecionado.` : 'Todos os campos devem ser preenchidos.',
                });
            } else {
                // Se todos os campos, exceto o checkbox, estiverem preenchidos, você pode enviar o formulário aqui
                enviarFormulario();
            }
        });

        function enviarFormulario() {
            // ... (código para enviar o formulário)
            var id_area = document.getElementById("id_area").value;
            var nome_operacao = document.getElementById("nome_operacao").value;
            var hr_ini_seg = document.getElementById("hr_ini_seg").value;
            var hr_fim_seg = document.getElementById("hr_fim_seg").value;
            var hr_ini_ter = document.getElementById("hr_ini_ter").value;
            var hr_fim_ter = document.getElementById("hr_fim_ter").value;
            var hr_ini_qua = document.getElementById("hr_ini_qua").value;
            var hr_fim_qua = document.getElementById("hr_fim_qua").value;
            var hr_ini_qui = document.getElementById("hr_ini_qui").value;
            var hr_fim_qui = document.getElementById("hr_fim_qui").value;
            var hr_ini_sex = document.getElementById("hr_ini_sex").value;
            var hr_fim_sex = document.getElementById("hr_fim_sex").value;
            var hr_ini_sab = document.getElementById("hr_ini_sab").value;
            var hr_fim_sab = document.getElementById("hr_fim_sab").value;
            var hr_ini_dom = document.getElementById("hr_ini_dom").value;
            var hr_fim_dom = document.getElementById("hr_fim_dom").value;
            var habilitado = document.getElementById("habilitado").checked;

            $.ajax({
                url: 'pages/config/insert/salve_operacoes.php',
                type: 'POST',
                data: {
                    // ... (dados do formulário)
                    id_area: id_area,
                    nome_operacao: nome_operacao,
                    hr_ini_seg: hr_ini_seg,
                    hr_fim_seg: hr_fim_seg,
                    hr_ini_ter: hr_ini_ter,
                    hr_fim_ter: hr_fim_ter,
                    hr_ini_qua: hr_ini_qua,
                    hr_fim_qua: hr_fim_qua,
                    hr_ini_qui: hr_ini_qui,
                    hr_fim_qui: hr_fim_qui,
                    hr_ini_sex: hr_ini_sex,
                    hr_fim_sex: hr_fim_sex,
                    hr_ini_sab: hr_ini_sab,
                    hr_fim_sab: hr_fim_sab,
                    hr_ini_dom: hr_ini_dom,
                    hr_fim_dom: hr_fim_dom,
                    habilitado: habilitado
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status) {

                        // Exibe uma mensagem de sucesso usando SweetAlert2
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: 'O formulário foi enviado com sucesso.',
                confirmButtonText: 'OK'
            });


                        loadItems();
                                                function loadItems() {
                                $.ajax({
                                    url: 'pages/config/insert/get_operacoes.php',
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(data) {
                                        var tableData = "";
                                        data.forEach(function(item) {
                                            tableData += "<tr><td>" + item.nome_operacao + "</td><td>" + item.hr_ini_seg +
                                                "</td><td>" + item.hr_fim_seg + "</td><td>" + item.hr_ini_ter +
                                                "</td><td>" + item.hr_fim_ter + "</td><td>" + item.hr_ini_qua +
                                                "</td><td>" + item.hr_fim_qua + "</td><td>" + item.hr_ini_qui +
                                                "</td><td>" + item.hr_fim_qui + "</td><td>" + item.hr_ini_sex +
                                                "</td><td>" + item.hr_fim_sex + "</td><td>" + item.hr_ini_sab +
                                                "</td><td>" + item.hr_fim_sab + "</td><td>" + item.hr_ini_dom +
                                                "</td><td>" + item.hr_fim_dom + "</td><td>" + item.habilitado_icon +
                                                "</td><td><button class='delete-btn btn btn-danger btn-sm apagar_operacoes' data-id='" +
                                                item.id_operacao + "'>Excluir</button></td></tr>";


                                        });
                                        $("#table_body_operacoes").html(tableData);
                                    },
                                    error: function(xhr, status, error) {
                                        console.log("Erro na solicitação AJAX: " + error);
                                    }
                                });
                            }
                        document.getElementById("operacoes").reset();
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
function copiarHorarios() {
    var hrIniSeg = document.getElementById("hr_ini_seg").value;
    var hrFimSeg = document.getElementById("hr_fim_seg").value;

    document.getElementById("hr_ini_ter").value = hrIniSeg;
    document.getElementById("hr_fim_ter").value = hrFimSeg;

    document.getElementById("hr_ini_qua").value = hrIniSeg;
    document.getElementById("hr_fim_qua").value = hrFimSeg;

    document.getElementById("hr_ini_qui").value = hrIniSeg;
    document.getElementById("hr_fim_qui").value = hrFimSeg;

    document.getElementById("hr_ini_sex").value = hrIniSeg;
    document.getElementById("hr_fim_sex").value = hrFimSeg;

    document.getElementById("hr_ini_sab").value = hrIniSeg;
    document.getElementById("hr_fim_sab").value = hrFimSeg;

    document.getElementById("hr_ini_dom").value = hrIniSeg;
    document.getElementById("hr_fim_dom").value = hrFimSeg;
}
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