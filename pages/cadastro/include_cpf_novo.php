
    <h3>Cadastro Pessoa Fisica</h3>
    <form id="form_2" class="mb-3">
        <div class="row">
            <!--
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="dataCadastro">Data de Cadastro:</label>
                    <input type="date" class="form-control" id="dataCadastro" name="dataCadastro"
                        value="<?php echo $dataCadastro; ?>">
                </div>
            </div> -->
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <?php
                                function formatarCPF($cpf) {
                                    // Remover caracteres não numéricos
                                    $cpf = preg_replace('/[^0-9]/', '', $cpf);

                                    // Verificar se o CPF possui 11 dígitos
                                    if (strlen($cpf) == 11) {
                                        // Formatar CPF (XXX.XXX.XXX-XX)
                                        $cpf_formatado = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
                                        return $cpf_formatado;
                                    }

                                    // Se o CPF não possuir 11 dígitos, retorna o valor original
                                    return $cpf;
                                }
                                ?>
                    <!-- <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo formatarCPF($cpf); ?>"> -->
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf; ?>"
                        maxlength="14" oninput="formatarCPF(this)">

                    <script>
                    function formatarCPF(input) {
                        // Remove caracteres não numéricos
                        var cpf = input.value.replace(/\D/g, '');

                        // Verifica se o CPF possui 11 dígitos
                        if (cpf.length === 11) {
                            // Formata CPF (XXX.XXX.XXX-XX)
                            cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
                        }

                        // Atualiza o valor do input com a formatação
                        input.value = cpf;
                    }
                    </script>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="eSocial">eSocial:</label>
                    <input type="text" class="form-control" id="eSocial" name="eSocial" value="<?php echo $eSocial; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="dataAdmissao">Data de Admissão:</label>
                    <input type="date" class="form-control" id="dataAdmissao" name="dataAdmissao"
                        value="<?php echo $dataAdmissao; ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="dataDemissao">Data de Demissão:</label>
                    <input type="date" class="form-control" id="dataDemissao" name="dataDemissao"
                        value="<?php echo $dataDemissao; ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="dataNascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="dataNascimento" name="dataNascimento"
                        value="<?php echo $dataNascimento; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="rgNumero">RG Número:</label>
                    <input type="text" class="form-control" id="rgNumero" name="rgNumero"
                        value="<?php echo $rgNumero; ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="rgEmissor">RG Emissor:</label>
                    <input type="text" class="form-control" id="rgEmissor" name="rgEmissor"
                        value="<?php echo $rgEmissor; ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="rgUF">RG UF:</label>
                    <input type="text" class="form-control" id="rgUF" name="rgUF" value="<?php echo $rgUF; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="rgDataEmissao"> RG Data de Emissão:</label>
                    <input type="date" class="form-control" id="rgDataEmissao" name="rgDataEmissao"
                        value="<?php echo $rgDataEmissao; ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="cnhNumero">CNH Número:</label>
                    <input type="text" class="form-control" id="cnhNumero" name="cnhNumero"
                        value="<?php echo $cnhNumero; ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="cnhTipo">CNH Tipo:</label>
                    <input type="text" class="form-control" id="cnhTipo" name="cnhTipo" value="<?php echo $cnhTipo; ?>">
                </div>
            </div>
        </div>
        <!-- <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="ctpsNumero">CTPS Número:</label>
                            <input type="text" class="form-control" id="ctpsNumero" name="ctpsNumero"
                                value="<?php echo $ctpsNumero; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="ctpsSerie">CTPS Série:</label>
                            <input type="text" class="form-control" id="ctpsSerie" name="ctpsSerie"
                                value="<?php echo $ctpsSerie; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="ctpsDataEmissao">CTPS Data de Emissão:</label>
                            <input type="date" class="form-control" id="ctpsDataEmissao" name="ctpsDataEmissao"
                                value="<?php echo $ctpsDataEmissao; ?>">
                        </div>
                    </div>
                </div>-->
        <div class="row">
            <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label for="ctpsUF">CTPS UF:</label>
                            <input type="text" class="form-control" id="ctpsUF" name="ctpsUF"
                                value="<?php echo $ctpsUF; ?>">
                        </div>
                    </div> -->
            <div class="col-sm-4 d-none">
                <div class="form-group">
                    <label for="user">User:</label>
                    <input type="text" class="form-control" id="user" name="user" value="<?php echo $email; ?>"
                        readonly>
                </div>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="eleitor">Titulo de Eleitor:</label>
                    <input type="text" class="form-control" id="eleitor" name="eleitor" value="<?php echo $eleitor; ?>">
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="sigilo">Sigilo:</label>
                    <select class="form-control" id="sigilo" name="sigilo">
                        <option value="1" <?php if($sigilo == 1) echo "selected"; ?>>Sim</option>
                        <option value="0" <?php if($sigilo == 0) echo "selected"; ?>>Não</option>
                    </select>
                </div>
                <div class="col-md-4 d-none">
                    <label for="idFuncioanrio" class="form-label">Id Funcioanrio</label>
                    <input type="text" class="form-control" id="idFuncioanrio" name="idFuncioanrio"
                        value="<?php echo $id_funci; ?>" readonly>
                </div>
                <div class="col-md-4 d-none">
                    <label for="tipo_registro" class="form-label">tipo_registro</label>
                    <input type="text" class="form-control" id="tipo_registro" name="tipo_registro"
                        value="<?php echo $tipo; ?>">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>





<script>
$(document).ready(function() {
    $("#form_2").submit(function(e) {
        e.preventDefault(); // Impede que o formulário seja enviado normalmente

        // Verifica se todos os campos estão preenchidos
        var allFieldsFilled = true;
        var emptyFields = ""; // Variável para armazenar os nomes dos campos vazios

        $("#form_2 input, #form_2 select").each(function() {
            if ($(this).val() === "" && !$(this).hasClass("choices__input") && $(this).attr(
                    "name") !== "dataDemissao" && $(this).attr("name") !== "idFuncionario") {
                allFieldsFilled = false;
                emptyFields += $(this).attr("name") +
                    ", "; // Adiciona o nome do campo vazio à variável
            }
        });

        if (!allFieldsFilled) {
            emptyFields = emptyFields.slice(0, -2); // Remove a vírgula e o espaço no final da string
            Swal.fire({
                title: 'Campos vazios',
                text: 'Por favor, preencha todos os campos do formulário. Campos vazios: ' +
                    emptyFields,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return; // Interrompe a submissão do formulário
        }

        var formData = $(this).serialize(); // Serializa os dados do formulário
        console.log(formData); // Exibe os dados serializados no console
        var url =
            <?php echo isset($id_funci) ? "'pages/cadastro/update/update_usuario.php'" : "'pages/cadastro/add/add_usuario.php'"; ?>;
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            success: function(response) {
                if (response == "success") {
                    Swal.fire({
                        title: 'Erro',
                        text: 'Ocorreu um erro ao salvar os dados!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    // Assuming the response contains the ID of the inserted record
                    var insertedId =
                    response; // Response should be the ID, adjust accordingly

                    Swal.fire({
                        title: 'Parabéns',
                        text: 'Usuário Atualizado com sucesso!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to the destination URL with the inserted ID
                            location.href = 'content_pages.php?id=10&id_func=' +
                                insertedId;
                            // Or if you want to redirect to a page without any query parameters
                            // location.href = 'palitagens.php';
                        }
                    });
                }
            }
        });
    });
});
</script>