
  <div class="container">
    <h1>Formulário de Justificativa</h1>
    <form action="pages/cadastro/add/processar_justificativas.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <label for="funcionario">Funcionário</label>
                    <select class="form-control" id="funcionario" name="funcionario">
        <?php

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Query SQL para obter os funcionários
        $query = "SELECT f.cpf, h.id_funcionario, h.nome_social, h.nome_registro, aux_filiais.filial_nome, 'cpf' AS tipo
        FROM funcionarios f
        INNER JOIN tb_history_cadastro h ON f.idFuncionario = h.id_funcionario
        LEFT JOIN aux_cargos ON aux_cargos.id_cargo = h.id_cargo
        LEFT JOIN aux_vt ON aux_vt.id_vt = h.id_vt
        LEFT JOIN tb_history_cadastro tb_sup ON tb_sup.id_funcionario = h.id_superior
        LEFT JOIN aux_areas ON aux_areas.id_area = h.id_area
        LEFT JOIN aux_operacoes ON aux_operacoes.id_operacao = h.id_operacao
        LEFT JOIN aux_filiais ON aux_filiais.id_filial = h.id_filial
        WHERE h.id_history IN (
            SELECT MAX(id_history)
            FROM tb_history_cadastro
            GROUP BY id_funcionario
        )

        UNION ALL

        SELECT f_cnpj.cnpj AS 'cpf', h.id_funcionario, h.nome_social, h.nome_registro, aux_filiais.filial_nome, 'cnpj' AS tipo
        FROM funcionarios_cnpj AS f_cnpj
        INNER JOIN tb_history_cadastro h ON f_cnpj.id = h.id_funcionario
        LEFT JOIN aux_cargos ON aux_cargos.id_cargo = h.id_cargo
        LEFT JOIN aux_vt ON aux_vt.id_vt = h.id_vt
        LEFT JOIN tb_history_cadastro tb_sup ON tb_sup.id_funcionario = h.id_superior
        LEFT JOIN aux_areas ON aux_areas.id_area = h.id_area
        LEFT JOIN aux_operacoes ON aux_operacoes.id_operacao = h.id_operacao
        LEFT JOIN aux_filiais ON aux_filiais.id_filial = h.id_filial
        WHERE h.id_history IN (
            SELECT MAX(id_history)
            FROM tb_history_cadastro
            GROUP BY id_funcionario
        )"; // Substitua pela sua consulta SQL

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $value = $row["id_funcionario"] . '|' . $row["tipo"];
                $nome_social = $row["nome_social"];
                echo "<option value='$value'>$nome_social</option>";
            }
        } else {
            echo "<option value='' disabled>Nenhum funcionário encontrado</option>";
        }


        ?>
    </select>
                </div>
                <div class="col-md-4">
                    <label for="data">Data</label>
                    <input type="date" class="form-control" id="data" name="data">
                </div>
                <div class="col-md-4">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="anexo">Anexo</label>
                    <input type="file" class="form-control-file" id="anexo" name="anexo">
                </div>
            </div>

            <!-- Repita os blocos de código acima para adicionar mais linhas de itens -->

            <button type="submit" class="btn btn-primary mt-3">Enviar</button>
        </form>
  </div>

