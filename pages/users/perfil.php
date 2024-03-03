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

    <form id="userForm" method="POST" enctype="multipart/form-data">


        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome"
                value="<?php echo $name ?>">
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email"
                    value="<?php echo $email ?>" disabled>
            </div>



        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone"
                value="<?php echo $telefone ?>">
        </div>


        <div class="form-group">
            <label for="cpf">CPF:</label>
            <!-- <input type="text" class="form-control" id="cpf" placeholder="Digite o CPF" value="<?php echo $cpf ?>"> -->
            <select class="form-control" id="cpf" name="cpf" data-choices="data-choices"
                data-options='{"removeItemButton":true,"placeholder":true}' readonly>
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
        <div class="form-group mt-3">
            <label class="form-label" for="imagem">Imagem de Perfil:</label>
            <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*"
                onchange="previewImage(event)">
            <img class="mt-2" id="preview" src="#" alt="Pré-visualização da Imagem" style="max-width: 200px; display: none;">



        </div>

        <br>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>



    <form id="trocarSenhaForm" action="pages/users/processar_troca_senha.php" method="POST" class="mt-5">
        <div class="form-group">
            <label for="senhaAntiga">Senha Antiga:</label>
            <div class="input-group">
                <input type="password" class="form-control" id="senhaAntiga" name="senhaAntiga"
                    placeholder="Digite a senha antiga">
                <div class="input-group-append">
                    <span class="input-group-text toggle-password" data-target="senhaAntiga">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="novaSenha">Nova Senha:</label>
            <div class="input-group">
                <input type="password" class="form-control" id="novaSenha" name="novaSenha"
                    placeholder="Digite a nova senha">
                <div class="input-group-append">
                    <span class="input-group-text toggle-password" data-target="novaSenha">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="confirmNovaSenha">Confirmar Nova Senha:</label>
            <div class="input-group">
                <input type="password" class="form-control" id="confirmNovaSenha" name="confirmNovaSenha"
                    placeholder="Confirme a nova senha">
                <div class="input-group-append">
                    <span class="input-group-text toggle-password" data-target="confirmNovaSenha">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group d-none">
            <label for="login">Nome:</label>
            <input type="text" class="form-control" id="login" placeholder="Digite o nome"
                value="<?php echo $_SESSION['email'] ?>">
        </div>
        <button type="submit" class="btn btn-primary mt-2 mb-2">Trocar Senha</button>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



<script>
    // Função para converter a imagem em Base64 e enviar para o servidor
    // function uploadImage(formData) {
    //     $.ajax({
    //         type: 'POST',
    //         url: 'pages/cadastro/update/update_usuario_perfil.php',
    //         data: formData,
    //         processData: false, // Evita que o jQuery processe os dados
    //         contentType: false, // Evita que o jQuery defina o cabeçalho Content-Type
    //         success: function(response) {
    //             if (response.status === 'success') {
    //                 Swal.fire({
    //                     title: 'Sucesso',
    //                     text: response.message,
    //                     icon: 'success'
    //                 });
    //             } else {
    //                 Swal.fire({
    //                     title: 'Erro',
    //                     text: response.message,
    //                     icon: 'error'
    //                 });
    //             }
    //         },
    //         error: function() {
    //             Swal.fire({
    //                 title: 'Erro',
    //                 text: 'Ocorreu um erro ao comunicar com o servidor.',
    //                 icon: 'error'
    //             });
    //         }
    //     });
    // }

    // // Função para pré-visualizar a imagem selecionada
    // function previewImage(event) {
    //     var reader = new FileReader();
    //     reader.onload = function() {
    //         var preview = document.getElementById('preview');
    //         preview.src = reader.result;
    //         preview.style.display = 'block'; // Exibe a imagem

    //         // Cria um objeto FormData e adiciona a imagem como um campo de arquivo
    //         var formData = new FormData();
    //         formData.append('name', document.getElementById('name').value);
    //         formData.append('email', document.getElementById('email').value);
    //         formData.append('telefone', document.getElementById('telefone').value);
    //         formData.append('cpf', document.getElementById('cpf').value);
    //         formData.append('imagem', event.target.files[0]); // Adiciona a imagem como arquivo

    //         // Envia a imagem para o servidor
    //         uploadImage(formData);
    //     }
    //     reader.readAsDataURL(event.target.files[0]);
    // }

    $(document).ready(function() {
    $('#userForm').submit(function(event) {
        event.preventDefault(); // Impede o envio tradicional do formulário

        // Cria um objeto FormData para enviar os dados do formulário
        var formData = new FormData($(this)[0]);

         // Adiciona manualmente o valor do campo de e-mail ao FormData
         formData.append('email', $('#email').val());

        // Envia a solicitação Ajax
        $.ajax({
            type: 'POST',
            url: 'pages/cadastro/update/update_usuario_perfil.php',
            data: formData,
            processData: false, // Não processar os dados
            contentType: false, // Não definir o tipo de conteúdo
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        title: 'Sucesso',
                        text: response.message,
                        icon: 'success'
                    });
                } else {
                    Swal.fire({
                        title: 'Erro',
                        text: response.message,
                        icon: 'error'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Erro',
                    text: 'Ocorreu um erro ao comunicar com o servidor.',
                    icon: 'error'
                });
            }
        });
    });
});

</script>



<script>
    // Função para pré-visualizar a imagem selecionada
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.style.display = 'block'; // Exibe a imagem
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>


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
</script>

<script>
$(document).ready(function() {
    // Quando o formulário for enviado
    $("#trocarSenhaForm").submit(function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        // Recupere os valores dos campos
        var senhaAntiga = $("#senhaAntiga").val();
        var novaSenha = $("#novaSenha").val();
        var confirmNovaSenha = $("#confirmNovaSenha").val();
        var idUsuario = $("#login").val(); // Substitua pelo ID do usuário que deseja buscar

        // Verifique se os campos estão preenchidos
        if (!senhaAntiga || !novaSenha || !confirmNovaSenha) {
            // Pelo menos um dos campos está vazio, exiba uma mensagem de erro
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Por favor, preencha todos os campos.',
            });
            return; // Impede o envio do formulário
        }

        // Verifique se a senha nova e a confirmação de senha nova são iguais
        if (novaSenha !== confirmNovaSenha) {
            // As senhas não coincidem, exiba uma mensagem de erro
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'A senha nova e a confirmação de senha não coincidem. Por favor, tente novamente.',
            });
            return; // Impede o envio do formulário
        }

        // Verifique se a senha nova atende aos critérios (pelo menos uma letra maiúscula, mínimo de seis caracteres e caracteres especiais)
        var regexUpperCase = /[A-Z]/;
        var regexSpecialChars = /[^a-zA-Z0-9]/;

        if (novaSenha.length < 6 || !regexUpperCase.test(novaSenha) || !regexSpecialChars.test(
                novaSenha)) {
            // A senha não atende aos critérios, exiba uma mensagem de erro
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'A senha nova deve ter pelo menos uma letra maiúscula, seis caracteres e caracteres especiais.',
            });
            return; // Impede o envio do formulário
        }

        // Faça a solicitação AJAX para buscar o hash da senha
        $.ajax({
            type: "POST",
            url: "pages/users/processar_troca_senha.php", // O arquivo PHP que faz a consulta ao banco de dados
            data: {
                senhaAntiga: senhaAntiga,
                idUsuario: idUsuario,
                novaSenha: novaSenha
            },
            success: function(response) {
                console.log(response);

                // Manipule a resposta aqui
                if (response === "SenhaAtualizada") {
                    // A senha antiga está correta, você pode prosseguir com a troca de senha
                    // Exiba um SweetAlert2 de sucesso ou redirecione o usuário para uma página de sucesso
                    Swal.fire({
                        icon: 'success',
                        title: 'Senha alterada com sucesso!',
                    });
                } else {
                    // A senha antiga está incorreta
                    // Exiba um SweetAlert2 de erro
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: 'Senha antiga incorreta. Por favor, tente novamente.',
                    });
                }
            },
            error: function() {
                // Manipule os erros aqui
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'Ocorreu um erro ao processar a solicitação.',
                });
            },
        });
    });
});
</script>






<script>
const togglePasswordIcons = document.querySelectorAll('.toggle-password');

togglePasswordIcons.forEach(icon => {
    icon.addEventListener('click', function() {
        const targetId = icon.getAttribute('data-target');
        const passwordInput = document.getElementById(targetId);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
});
</script>