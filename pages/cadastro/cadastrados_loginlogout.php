<style>
/* Estilos CSS para a miniatura */
.thumbnail {
    max-width: 200px;
    /* Defina o tamanho máximo da miniatura */
    cursor: pointer;
    /* Transforma o cursor em uma mãozinha quando passar sobre a miniatura */
}

/* Centraliza o formulário */
.center-form {
    text-align: center;
    margin: 0 auto;
    max-width: 600px; /* Define a largura máxima do formulário */
}

/* Estilo para a miniatura da imagem */
.thumbnail {
    display: block;
    margin: 0 auto;
}

/* Estilo para a imagem completa */
#imagemCompleta {
    text-align: center;
    display: none;
    max-width: 100%; /* Garante que a imagem completa não seja maior que o formulário */
}
#img_grande {
    max-width: 100%;
    height: auto;
}

</style>

<div class="row align-items-center justify-content-between g-3 mb-4">
    <div class="col-12 col-md-auto">
        <h2 class="mb-0">Justificativas</h2>
    </div>
    <div class="col-12 col-md-auto">
        <a href="content_pages.php?id=38" class="btn btn-phoenix-secondary px-3 px-sm-5 me-2"><span
                class="fa-solid fa-plus me-sm-2"></span><span class="d-none d-sm-inline">Adicionar Justificativa
            </span></a>

        <!-- <button class="btn px-3 btn-phoenix-secondary" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-ellipsis"></span></button>
                <ul class="dropdown-menu dropdown-menu-end p-0" style="z-index: 9999;">
                  <li><a class="dropdown-item" href="#!">View profile</a></li>
                  <li><a class="dropdown-item" href="#!">Report</a></li>
                  <li><a class="dropdown-item" href="#!">Manage notifications</a></li>
                  <li><a class="dropdown-item text-danger" href="#!">Delete Lead</a></li>
                </ul> -->
    </div>
</div>


<div id="tableExample2" data-list='{"valueNames":["cpf","email","age"],"page":20,"pagination":true}'>
    <div class="table-responsive ms-n1 ps-1 scrollbar">
        <table class="table table-striped table-sm fs--1 mb-0">
            <thead>
                <tr>

                    <th class=" border-top "></th>
                    <th class="sort border-top " data-sort="cpf">Funcionário</th>
                    <th class="sort border-top " data-sort="cpf">Descrição</th>
                    <th class="sort border-top " data-sort="nome_social">Data</th>
                    <th class="sort border-top " data-sort="nome_registro">Inicio</th>
                    <th class="sort border-top " data-sort="sexo">Fim</th>
                    <th class="sort border-top " data-sort="sexo">Ver justificativa</th>
                    <th class="sort border-top " data-sort="sexo">Aprovado?</th>



                    <!-- <th class="sort text-end align-middle pe-0 border-top" scope="col">Ações</th> -->
                </tr>
            </thead>
            <tbody class="list">
                <?php
                            // Recupere os dados do MySQL
                                        $sql = "SELECT * FROM justificativa AS j

                                        LEFT JOIN (SELECT hc.*
                                        FROM tb_history_cadastro hc
                                        INNER JOIN (
                                            SELECT id_funcionario, MAX(id_history) AS max_id_history
                                            FROM tb_history_cadastro
                                            GROUP BY id_funcionario
                                        ) AS max_ids
                                        ON hc.id_funcionario = max_ids.id_funcionario AND hc.id_history = max_ids.max_id_history) AS h ON j.id_funcionario = h.id_funcionario";
                                        $result = $conn->query($sql);

                                        // Preencha a tabela com os dados
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {


                                                echo '<tr>';

                                                echo '<td class="align-middle cpf">' . $row['id'] . '</td>';
                                                echo '<td class="align-middle">' . $row['nome_registro'] . '</td>';
                                                echo '<td class="align-middle">' . $row['descricao'] . '</td>';
                                                echo '<td class="align-middle">' . $row['data'] . '</td>';
                                                echo '<td class="align-middle">' . $row['inicio'] . '</td>';
                                                echo '<td class="align-middle">' . $row['fim'] . '</td>';

                                                echo '<td class="align-middle white-space-nowrap pe-0">
                                                <button class="btn btn-sm btn-phoenix-info edit-btn-operacoes" data-id="' . $row['id'] . '" data-toggle="modal" data-target="#justificativaModal">
                                                    Ver Justificativa <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </td>';


                                                echo '<td class="align-middle white-space-nowrap  pe-0">';
                                                if ($row['aprovado'] != 1) {
                                                    echo '<button class="btn btn-sm btn-phoenix-info update-button" data-id="' . $row['id'] . '" data-tipo="' . $row['tipo'] . '">Aceitar Justificativa? <i class="fa-solid fa-hourglass-half"></i></button>';
                                                } else {
                                                    echo '<button class="btn btn-sm btn-phoenix-success update-button-negado" data-id="' . $row['id'] . '" data-tipo="' . $row['tipo'] . '">Solicitação Aceita <i class="fa-solid fa-circle-check"></i></button>';
                                                }
                                                echo '</td>';


                                                // echo '<td class="align-middle white-space-nowrap text-end pe-0">';
                                                // echo '<div class="font-sans-serif btn-reveal-trigger position-static">';
                                                // echo '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>';
                                                // echo '<div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="content_pages.php?id=10&id_func='.$row['id_funcionario'] . '&tipo='.$row['tipo'].'">Ver/editar</a><a class="dropdown-item" href="#!">Export</a>';
                                                // echo '<div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>';
                                                // echo '</div>';
                                                // echo '</div>';
                                                // echo '</td>';
                                                // echo '</tr>';
                                            }
                                        } else {
                                            echo '<tr><td colspan="4">Nenhum registro encontrado.</td></tr>';
                                        }

                                        ?>

            </tbody>

        </table>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
        <ul class="mb-0 pagination"></ul>
        <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Informações da Justificativa</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <div class="modal-body">
                <!-- Coloque os campos de edição aqui -->
                <form id="editForm">

                    <div class="row">
                        <div class="form-group">
                            <label for="funcionario" class="form-label">Colaborador:</label>
                            <input type="text" class="form-control" id="funcionario" name="funcionario" required
                                readonly>
                        </div>


                        <div class="col-md-4">
                            <label for="data" class="form-label">Data</label>
                            <input type="date" class="form-control" id="data" name="data" readonly>
                        </div>
                        <div class="col-md-4" class="form-label">
                            <label for="hora_inicio">Hora inicio</label>
                            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" readonly>
                        </div>
                        <div class="col-md-4" class="form-label">
                            <label for="hora_fim">Hora fim</label>
                            <input type="time" class="form-control" id="hora_fim" name="hora_fim" readonly>
                        </div>
                        <div class="col-md-12" class="form-label">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" readonly>
                        </div>
                        <div class="col-md-4 d-none" class="form-label">
                            <label for="user">Adicionado por</label>
                            <input type="text" class="form-control" id="user" name="user" value=<?php echo $email ?>
                                readonly>
                        </div>





                    </div>

                    <!-- Miniatura da imagem -->
                    <img class="thumbnail mt-2 text-center" id="thumbnail" src="" alt="Miniatura da Imagem">

                    <!-- Div para exibir a imagem completa -->
                    <div id="imagemCompleta" style="display: none;">
                        <img src="" alt="Imagem Completa" id="img_grande">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>


<!-- JavaScript para exibir a imagem completa ao clicar na miniatura -->
<script>
// Obtém a miniatura e a div da imagem completa
var thumbnail = document.getElementById("thumbnail");
var imagemCompleta = document.getElementById("imagemCompleta");

// Adiciona um evento de clique à miniatura
thumbnail.addEventListener("click", function() {
    // Exibe a imagem completa ao clicar na miniatura
    imagemCompleta.style.display = "block";
});
</script>


<script>
$(document).on("click", ".edit-btn-operacoes", function() {
    var id_filial = $(this).data("id");

    // Aqui você pode realizar uma chamada AJAX para buscar as informações da filial com o ID específico
    // e preencher os campos do formulário de edição no modal.

    // Exemplo de chamada AJAX (substitua pelo seu código real):
    $.ajax({
        url: 'pages/cadastro/list/get_justificativa.php', // Substitua pelo URL correto
        type: 'POST',
        data: {
            id: id_filial
        },
        dataType: 'json',
        success: function(data) {
            // Preencha os campos do modal com as informações retornadas
            console.log(data);
            console.log("Dados recebidos para filial_nome:", data.filial_nome);

            // Preencha outros campos aqui
            data.forEach(function(item) {
                $("#funcionario").val(item.nome_registro);
                $("#data").val(item.data);
                $("#hora_inicio").val(item.inicio);
                $("#hora_fim").val(item.fim);
                $("#descricao").val(item.descricao);
                $("#user").val(item.user);
            });

            // Suponhamos que você queira criar uma URL de arquivo com base em algum valor do item
            var arquivoUrl = 'uploads_justificativas/' + data[0].id_funcionario + '/' + data[0]
                .tipo + '/' + data[0].anexo; // Substitua 'nome_do_arquivo' pelo campo correto

            // Defina a URL do arquivo como src em um elemento HTML (por exemplo, uma tag <img> ou <iframe>)
            $("#thumbnail").attr('src', arquivoUrl);

            $("#img_grande").attr('src', arquivoUrl);

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
        url: 'pages/config/insert/update_sistema_info.php', // Substitua pelo URL correto
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
                    url: 'pages/config/insert/get_sistemas.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var tableData = "";
                        data.forEach(function(item) {
                            tableData += "<tr>";
                            tableData += "<td>" + item.id_sistema + "</td>";
                            tableData += "<td>" + item.nome_sistema + "</td>";

                            // Lógica JavaScript para adicionar a estrela com base em algum valor da variável 'item'
                            tableData +=
                                "<td><span class='status-icon' data-id='" + item
                                .id_sistema + "'>";
                            if (item.habilitado == 1) {
                                tableData +=
                                    "<i class='fa-solid fa-check text-success'></i>";
                            } else {
                                tableData +=
                                    "<i class='fa-solid fa-xmark text-danger'></i>";
                            }
                            tableData += "</span></td>";

                            tableData +=
                                "<td><button class='edit-btn-operacoes btn btn-primary btn-sm' data-id='" +
                                item.id_sistema + "'>Editar</button></td>";
                            tableData += "</tr>";
                        });
                        $("#table_body_sistemas").html(tableData);
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

<script>
$(document).ready(function() {
    $('#formulario').DataTable({
        searching: true,
        ordering: true,
        lengthChange: false,
        info: false,
        language: {
            searchPlaceholder: "Pesquisar...",
            search: "",
            paginate: {
                next: "Próximo",
                previous: "Anterior"
            }
        },
    });
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function() {
    // Listen for button clicks
    document.querySelectorAll(".update-button").forEach(button => {
        button.addEventListener("click", function() {
            const id = button.getAttribute("data-id");
            const tipo = button.getAttribute("data-tipo");

            // Send AJAX request to update data
            updateData(id, tipo);
        });
    });
});

function updateData(id, tipo) {
    const url =
    "pages/cadastro/update/update-ativar_justificativa.php"; // Substitua pelo URL do seu script de atualização

    const formData = new FormData();
    formData.append("id", id);


    const xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                if (data.success) {
                    // Mostra uma mensagem de sucesso
                    Swal.fire({
                        icon: "success",
                        title: "Justificativa Aceita",
                    });
                } else {
                    // Mostra uma mensagem de erro com o SQL gerado
                    Swal.fire({
                        icon: "error",
                        title: "Erro",
                        text: "Ocorreu um erro ao atualizar os dados. SQL gerado: " + data.sql,
                    });
                }
            } else {
                // Trate erros de rede ou de servidor aqui
                console.error("Erro de rede ou do servidor:", xhr.status, xhr.statusText);
            }
        }
    };

    xhr.send(formData);
}
</script>


<script>
// Selecione todos os botões com a classe "update-button-negado"
const buttonsNegados = document.querySelectorAll('.update-button-negado');

// Adicione um ouvinte de eventos de clique a cada botão
buttonsNegados.forEach(button => {
    button.addEventListener('click', () => {
        // Exiba o SweetAlert2 informando que o cadastro está incompleto
        Swal.fire({
            icon: 'info',
            title: 'Justificativa Aceita',
            text: 'Justificativa já aceita',
            confirmButtonText: 'OK'
        });
    });
});
</script>