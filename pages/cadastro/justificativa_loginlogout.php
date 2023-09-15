
  <div class="container">
    <h1>Formulário de Justificativa</h1>
    <form id="formulario" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <label for="funcionario">Colaborador</label>
                    <select class="form-control" id="funcionario" name="funcionario">
        <?php

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Query SQL para obter os funcionários
        $query = "SELECT f.cpf, h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history, aux_cargos.cargo_nome, aux_vt.vt_nome, tb_sup.nome_social as superior_nome, aux_areas.nome_area, aux_operacoes.nome_operacao, aux_filiais.filial_nome, 'cpf' AS tipo
        FROM funcionarios f
        LEFT JOIN tb_history_cadastro h ON f.idFuncionario = h.id_funcionario AND h.tipo_registro = 'cpf'
        LEFT JOIN aux_cargos ON aux_cargos.id_cargo = h.id_cargo
        LEFT JOIN aux_vt ON aux_vt.id_vt = h.id_vt
        LEFT JOIN tb_history_cadastro tb_sup ON tb_sup.id_funcionario = h.id_superior
        LEFT JOIN aux_areas ON aux_areas.id_area = h.id_area
        LEFT JOIN aux_operacoes ON aux_operacoes.id_operacao = h.id_operacao
        LEFT JOIN aux_filiais ON aux_filiais.id_filial = h.id_filial
        WHERE h.id_history IN (
            SELECT MAX(id_history)
            FROM tb_history_cadastro
            WHERE ativo_cad = 1  -- Filtre por ativo_cad igual a 1
            GROUP BY id_funcionario
        )

        UNION ALL

        SELECT f_cnpj.cnpj AS 'cpf', h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history, aux_cargos.cargo_nome, aux_vt.vt_nome, tb_sup.nome_social as superior_nome, aux_areas.nome_area, aux_operacoes.nome_operacao, aux_filiais.filial_nome, 'cnpj' AS tipo
        FROM funcionarios_cnpj AS f_cnpj
        INNER JOIN tb_history_cadastro h ON f_cnpj.id = h.id_funcionario AND h.tipo_registro = 'cnpj'
        LEFT JOIN aux_cargos ON aux_cargos.id_cargo = h.id_cargo
        LEFT JOIN aux_vt ON aux_vt.id_vt = h.id_vt
        LEFT JOIN tb_history_cadastro tb_sup ON tb_sup.id_funcionario = h.id_superior
        LEFT JOIN aux_areas ON aux_areas.id_area = h.id_area
        LEFT JOIN aux_operacoes ON aux_operacoes.id_operacao = h.id_operacao
        LEFT JOIN aux_filiais ON aux_filiais.id_filial = h.id_filial
        WHERE h.id_history IN (
            SELECT MAX(id_history)
            FROM tb_history_cadastro
            WHERE ativo_cad = 1  -- Filtre por ativo_cad igual a 1
            GROUP BY id_funcionario
        );"; // Substitua pela sua consulta SQL

        $result = $conn->query($query);
        echo "<option value=''>Escolher Colaborador</option>";
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
                    <label for="hora_inicio">Hora inicio</label>
                    <input type="time" class="form-control" id="hora_inicio" name="hora_inicio">
                </div>
                <div class="col-md-4">
                    <label for="hora_fim">Hora fim</label>
                    <input type="time" class="form-control" id="hora_fim" name="hora_fim">
                </div>
                <div class="col-md-4">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao">
                </div>
                <div class="col-md-4">
                    <label for="user">Adicionado por</label>
                    <input type="text" class="form-control" id="user" name="user" value=<?php echo $email ?>>
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


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const formulario = document.getElementById("formulario");

        formulario.addEventListener("submit", function(event) {
            event.preventDefault();

            // Validar se todos os campos obrigatórios estão preenchidos
            const funcionario = document.getElementById("funcionario");
            const data = document.getElementById("data");
            const hora_inicio = document.getElementById("hora_inicio");
            const hora_fim = document.getElementById("hora_fim");
            const descricao = document.getElementById("descricao");
            const anexo = document.getElementById("anexo");
            const user = document.getElementById("user");

            if (!funcionario.value || !data.value || !hora_inicio.value || !hora_fim.value || !descricao.value || !anexo.value || !user.value) {
                Swal.fire({
                    icon: "error",
                    title: "Erro",
                    text: "Por favor, preencha todos os campos.",
                    confirmButtonText: "OK"
                });
                return;
            }

            const formData = new FormData(formulario);

            // Enviar o formulário via Ajax
            fetch("pages/cadastro/add/processar_justificativas.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    // Limpar o formulário
                    formulario.reset();

                    // Exibir a mensagem de sucesso
                    Swal.fire({
                        icon: "success",
                        title: "Sucesso",
                        text: "Dados enviados com sucesso!",
                        confirmButtonText: "OK"
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Erro",
                        text: data.message || "Ocorreu um erro ao enviar os dados.",
                        confirmButtonText: "OK"
                    });
                }
            })
            .catch(error => {
                console.error("Erro:", error);
                Swal.fire({
                    icon: "error",
                    title: "Erro",
                    text: "Ocorreu um erro ao enviar os dados.",
                    confirmButtonText: "OK"
                });
            });
        });
    });
</script>
