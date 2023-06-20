<div class="container">
    <h2>Informações do Usuário</h2>

    <?php
    // Busca os dados do usuário no banco de dados
    $sql = "SELECT * FROM user WHERE email = '$email'"; // Substitua o '$email' pelo valor desejado
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $email = $row["email"];
        $telefone = $row["telefone"];
        $senha = $row["senha"];
        $grupo_acesso = $row["grupo_acesso"];
        $cpf = $row["cpf"];
    }
    ?>

    <form id="userForm">
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" placeholder="Digite o nome" value="<?php echo $name ?>">
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Digite o email"
                    value="<?php echo $email ?>" disabled>
            </div>

            <div class="form-group col">
                <label for="senha">Senha:</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="senha" placeholder="Digite a senha"
                        value="<?php echo $senha ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <input type="checkbox" id="mostrarSenha"> Mostrar senha
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" placeholder="Digite o telefone"
                value="<?php echo $telefone ?>">
        </div>

        <div class="form-group">
            <label for="grupo_acesso">Grupo de Acesso:</label>
            <select class="form-control" id="grupo_acesso" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                <?php
                // Busca os grupos de acesso no banco de dados
                $sql_grupos = "SELECT id, nome_do_grupo FROM user_group";
                $result_grupos = $conn->query($sql_grupos);

                if ($result_grupos->num_rows > 0) {
                    while ($row_grupo = $result_grupos->fetch_assoc()) {
                        $grupo_id = $row_grupo['id'];
                        $grupo_nome = $row_grupo['nome_do_grupo'];
                        $selected = ($grupo_acesso == $grupo_id) ? "selected" : "";
                        echo "<option value='$grupo_id' $selected>$grupo_nome</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="cpf">CPF:</label>
            <!-- <input type="text" class="form-control" id="cpf" placeholder="Digite o CPF" value="<?php echo $cpf ?>"> -->
            <select class="form-control" id="cpf" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                <?php
                // Busca os grupos de acesso no banco de dados
                $sql_grupos = "SELECT f.cpf, h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history
                FROM funcionarios f
                INNER JOIN tb_history_cadastro h ON f.idFuncionario = h.id_funcionario
                WHERE h.id_history IN (
                    SELECT MAX(id_history)
                    FROM tb_history_cadastro
                    GROUP BY id_funcionario
                )
                GROUP BY f.cpf, h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history";
                $result_grupos = $conn->query($sql_grupos);

                if ($result_grupos->num_rows > 0) {
                    while ($row_grupo = $result_grupos->fetch_assoc()) {
                        $grupo_id_cpf = $row_grupo['cpf'];
                        $grupo_id_nome = $row_grupo['nome_social'];
                        $grupo_nome_cpf = $row_grupo['cpf'];
                        $selected_cpf = ($grupo_acesso_cpf == $grupo_id_cpf) ? "selected" : "";
                        echo "<option value='$grupo_id_cpf' $selected>$grupo_nome_cpf - $grupo_id_nome</option>";
                    }
                }
                ?>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    var senhaInput = document.getElementById('senha');
    var mostrarSenhaCheckbox = document.getElementById('mostrarSenha');

    mostrarSenhaCheckbox.addEventListener('change', function() {
        if (mostrarSenhaCheckbox.checked) {
            senhaInput.type = 'text';
        } else {
            senhaInput.type = 'password';
        }
    });

    var form = document.getElementById('userForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Obtém os valores dos campos do formulário
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var telefone = document.getElementById('telefone').value;
        var senha = document.getElementById('senha').value;
        var grupo_acesso = document.getElementById('grupo_acesso').value;
        var cpf = document.getElementById('cpf').value;

        // Cria um objeto FormData para enviar os dados via Ajax
        var formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('telefone', telefone);
        formData.append('senha', senha);
        formData.append('grupo_acesso', grupo_acesso);
        formData.append('cpf', cpf);

        // Envia a solicitação Ajax
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'pages/cadastro/update/update_usuario_perfil.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                Swal.fire({
                    title: 'Dados salvos com sucesso!',
                    icon: 'success'
                }).then(function() {
                    location.reload(); // Recarrega a página após o salvamento
                });
            } else {
                Swal.fire({
                    title: 'Erro ao salvar os dados.',
                    icon: 'error'
                });
            }
        };
        xhr.send(formData);
    });
</script>
