<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#">Item 1</a></li>
        <li class="breadcrumb-item"><a href="#">Item 2</a></li>
        <li class="breadcrumb-item"><a href="#">Item 3</a></li>
        <li class="breadcrumb-item active" aria-current="page">Item 4</li>
    </ol>
</nav>


<h3>Usuários</h3>


<div id="tableExample2" data-list='{"valueNames":["cpf","email","age"],"page":20,"pagination":true}'>
    <div class="table-responsive">
        <table class="table table-striped table-sm fs--1 mb-0">
            <thead>
                <tr>

                    <th class="sort border-top " data-sort="id_funcionario">ID Funcionário</th>
                    <th class="sort border-top " data-sort="cpf">CPF</th>
                    <th class="sort border-top " data-sort="nome_social">Nome Social</th>
                    <th class="sort border-top " data-sort="nome_registro">Nome Registro</th>
                    <th class="sort border-top " data-sort="sexo">Sexo</th>
                    <th class="sort border-top " data-sort="genero">Gênero</th>
                    <th class="sort border-top " data-sort="estado_civil">Estado Civil</th>
                    <th class="sort border-top " data-sort="id_cargo">ID Cargo</th>
                    <th class="sort border-top " data-sort="id_vt">ID VT</th>
                    <th class="sort border-top " data-sort="id_superior">ID Superior</th>
                    <th class="sort border-top " data-sort="id_area">ID Área</th>
                    <th class="sort border-top " data-sort="id_operacao">ID Operação</th>
                    <th class="sort border-top " data-sort="id_filial">ID Filial</th>
                    <th class="sort text-end align-middle pe-0 border-top" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="list">
                <?php
                // Recupere os dados do MySQL
            $sql = "SELECT f.cpf,h.id_funcionario, h.nome_social,h.nome_registro, h.sexo, h.genero,h.estado_civil,h.id_cargo,h.id_vt,h.id_superior,h.id_area, h.id_operacao,h.id_filial
            FROM funcionarios f
            INNER JOIN tb_history_cadastro h ON f.idFuncionario = h.id_funcionario
            WHERE h.id_history = (
              SELECT MAX(id_history)
              FROM tb_history_cadastro
              WHERE idFuncionario = h.id_funcionario
            )";
            $result = $conn->query($sql);

            // Preencha a tabela com os dados
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';

                    echo '<td class="align-middle cpf">' . $row['cpf'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_funcionario'] . '</td>';
                    echo '<td class="align-middle">' . $row['nome_social'] . '</td>';
                    echo '<td class="align-middle">' . $row['nome_registro'] . '</td>';
                    echo '<td class="align-middle">' . $row['sexo'] . '</td>';
                    echo '<td class="align-middle">' . $row['genero'] . '</td>';
                    echo '<td class="align-middle">' . $row['estado_civil'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_cargo'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_vt'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_superior'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_area'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_operacao'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_filial'] . '</td>';

                    echo '<td class="align-middle white-space-nowrap text-end pe-0">';
                    echo '<div class="font-sans-serif btn-reveal-trigger position-static">';
                    echo '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>';
                    echo '<div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="content_pages.php?id=3&id_func='.$row['id_funcionario'] . '">Ver/editar</a><a class="dropdown-item" href="#!">Export</a>';
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