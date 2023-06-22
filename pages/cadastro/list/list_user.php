


<div class="row align-items-center justify-content-between g-3 mb-4">
              <div class="col-12 col-md-auto">
                <h2 class="mb-0">Usuários</h2>
              </div>
              <div class="col-12 col-md-auto">
                <a href="content_pages.php?id=1" class="btn btn-phoenix-secondary px-3 px-sm-5 me-2"><span class="fa-solid fa-plus me-sm-2"></span><span class="d-none d-sm-inline">Adicionar Usuário		</span></a>
                <a href="content_pages.php?id=4" class="btn btn-phoenix-secondary me-2"><i class="fa-solid fa-user-clock me-2"></i><span>Usuários sem relação</span></a>
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
            $sql = "SELECT f.cpf, h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history, aux_cargos.cargo_nome,aux_vt.vt_nome, tb_history_cadastro.nome_social as superior_nome, aux_areas.nome_area, aux_operacoes.nome_operacao, aux_filiais.filial_nome



            FROM funcionarios f
            INNER JOIN tb_history_cadastro h ON f.idFuncionario = h.id_funcionario
            left JOIN aux_cargos ON aux_cargos.id_cargo = h.id_cargo
            left JOIN aux_vt ON aux_vt.id_vt = h.id_vt
            left JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = h.id_superior
            left JOIN aux_areas ON aux_areas.id_area = h.id_area
            left JOIN aux_operacoes ON aux_operacoes.id_operacao = h.id_operacao
            left JOIN aux_filiais ON aux_filiais.id_filial = h.id_filial
            WHERE h.id_history IN (
                SELECT MAX(id_history)
                FROM tb_history_cadastro
                GROUP BY id_funcionario
            );

            ";
            $result = $conn->query($sql);

            // Preencha a tabela com os dados
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';

                    echo '<td class="align-middle cpf">' . $row['id_funcionario'] . '</td>';
                    echo '<td class="align-middle">' . $row['cpf'] . '</td>';
                    echo '<td class="align-middle">' . $row['nome_social'] . '</td>';
                    echo '<td class="align-middle">' . $row['nome_registro'] . '</td>';
                    echo '<td class="align-middle">' . $row['sexo'] . '</td>';
                    echo '<td class="align-middle">' . $row['genero'] . '</td>';
                    echo '<td class="align-middle">' . $row['estado_civil'] . '</td>';
                    echo '<td class="align-middle">' . $row['cargo_nome'] . '</td>';
                    echo '<td class="align-middle">' . $row['vt_nome'] . '</td>';
                    echo '<td class="align-middle">' . $row['superior_nome'] . '</td>';
                    echo '<td class="align-middle">' . $row['nome_area'] . '</td>';
                    echo '<td class="align-middle">' . $row['nome_operacao'] . '</td>';
                    echo '<td class="align-middle">' . $row['filial_nome'] . '</td>';

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