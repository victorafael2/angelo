<div class="row align-items-center justify-content-between g-3 mb-4">
    <div class="col-12 col-md-auto">
        <h2 class="mb-0">Cadastros não Finalizados</h2>
    </div>
    <div class="col-12 col-md-auto">
        <a href="content_pages.php?id=10" class="btn btn-phoenix-secondary px-3 px-sm-5 me-2"><span
                class="fa-solid fa-plus me-sm-2"></span><span class="d-none d-sm-inline">Adicionar Usuário </span></a>
                <a href="content_pages.php?id=2" class="btn btn-phoenix-secondary px-3 px-sm-5 me-2"><span
                class="fa-solid fa-user me-sm-2"></span><span class="d-none d-sm-inline">Lista de Colaboradores</span></a>
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

                    <th class="sort border-top " data-sort="id_funcionario">ID</th>
                    <th class="sort border-top " data-sort="cpf">CPF/CNPJ</th>
                    <th class="sort border-top " data-sort="nome_social">Data de Cadastro</th>
                    <th class="sort border-top " data-sort="nome_registro">Data de Admissão</th>
                    <th class="sort border-top " data-sort="sexo">Data de Nascimento</th>
                    <th class="sort border-top " data-sort="sexo">Aceitar cadastro</th>


                    <th class="sort text-end align-middle pe-0 border-top" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="list">
                            <?php
                            // Recupere os dados do MySQL
                                        $sql = "SELECT
                                        ROW_NUMBER() OVER (ORDER BY subquery.idFuncionario) AS numero_da_linha,
                                        subquery.idFuncionario,
                                        subquery.cpf,
                                        subquery.dataCadastro,
                                        subquery.dataAdmissao,
                                        subquery.dataNascimento,
                                        subquery.tipo,
                                        h.id_funcionario AS tipo_registro
                                    FROM (
                                        SELECT DISTINCT fcnpj.id AS idFuncionario, fcnpj.cnpj AS cpf, fcnpj.dataCadastro, fcnpj.dataAdmissao, fcnpj.dataNascimento, 'cnpj' AS tipo
                                        FROM funcionarios_cnpj AS fcnpj
                                        WHERE fcnpj.ativo_cad = 0

                                        UNION ALL

                                        SELECT DISTINCT f.idFuncionario, f.cpf, f.dataCadastro, f.dataAdmissao, f.dataNascimento, 'cpf' AS tipo
                                        FROM funcionarios AS f
                                        WHERE f.ativo_cad = 0
                                    ) AS subquery
                                    LEFT JOIN tb_history_cadastro h
                                    ON subquery.idFuncionario = h.id_funcionario AND subquery.tipo = h.tipo_registro;
                                    ";
                                        $result = $conn->query($sql);

                        // Preencha a tabela com os dados
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {


                                echo '<tr>';

                                echo '<td class="align-middle cpf">' . $row['numero_da_linha'] . '</td>';
                                echo '<td class="align-middle">' . $row['cpf'] . '</td>';
                                echo '<td class="align-middle">' . $row['dataCadastro'] . '</td>';
                                echo '<td class="align-middle">' . $row['dataAdmissao'] . '</td>';
                                echo '<td class="align-middle">' . $row['dataNascimento'] . '</td>';

                                echo '<td class="align-middle white-space-nowrap  pe-0">';
                                if ($row['tipo_registro'] > 0) {
                                    echo '<button class="btn btn-sm btn-phoenix-success update-button" data-id="' . $row['idFuncionario'] . '" data-tipo="' . $row['tipo'] . '">Aceitar Cadastro <i class="fa-solid fa-circle-check"></i></button>';
                                } else {
                                    echo '<button class="btn btn-sm btn-phoenix-danger update-button-negado" data-id="' . $row['idFuncionario'] . '" data-tipo="' . $row['tipo'] . '">Cadastro Incompleto <i class="fa-solid fa-ban"></i></button>';
                                }
                                echo '</td>';


                                echo '<td class="align-middle white-space-nowrap text-end pe-0">';
                                echo '<div class="font-sans-serif btn-reveal-trigger position-static">';
                                echo '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>';
                                echo '<div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="content_pages.php?id=10&id_func='.$row['idFuncionario'] . '&tipo='.$row['tipo'].'">Ver/editar</a><a class="dropdown-item" href="#!">Export</a>';
                                echo '<div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</td>';
                                echo '</tr>';
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




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>



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
    const url = "pages/cadastro/update/update-ativar.php"; // Substitua pelo URL do seu script de atualização

    const formData = new FormData();
    formData.append("id", id);
    formData.append("tipo", tipo);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                if (data.success) {
                    // Mostra uma mensagem de sucesso
                    Swal.fire({
                        icon: "success",
                        title: "Colaborador Ativo",
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
                icon: 'error',
                title: 'Cadastro Incompleto',
                text: 'O cadastro está incompleto e não pode ser aceito.',
                confirmButtonText: 'OK'
            });
        });
    });
</script>