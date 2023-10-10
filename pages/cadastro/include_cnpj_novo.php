<div class="tab-pane fade  show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
    <h3>Cadastro Pessoa Jurídica</h3>
    <form id="form_cnpj" class="fs--1">

        <div class="row row-cols-3 g-2 align-items-center ">

            <div class="form-group col-md-8 mb-2">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="xx.xxx.xxx/xxxx-xx"
                    value="<?php echo $cnpj; ?>">
            </div>

            <button type="button" id="edit_button" class="btn btn-secondary mt-4">Editar Campos</button>


        </div>
        <div class="row mb-2">

            <div class="form-group col-md-4">
                <label for="nome_fantasia">Nome Fantasia</label>
                <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia"
                    placeholder="Nome Fantasia" value="<?php echo $nome_fantasia; ?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="razao_social">Razão Social</label>
                <input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="Razão Social"
                    value="<?php echo $razao_social; ?>" disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="abertura">Abertura</label>
                <input type="text" class="form-control" id="abertura" name="abertura" placeholder="Abertura"
                    value="<?php echo $abertura; ?>" disabled>
            </div>

        </div>
        <div class="row mb-2">

            <div class="form-group col-md-12">
                <label for="atividade_principal">Atividade Principal</label>
                <input type="text" class="form-control" id="atividade_principal" name="atividade_principal"
                    placeholder="Atividade Principal" value="<?php echo $atividade_principal; ?>" disabled>
            </div>
        </div>

        <div class="row mb-2">
            <div class="form-group col-md-6">
                <label for="logradouro">Logradouro</label>
                <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro"
                    value="<?php echo $logradouro; ?>" disabled>
            </div>

            <div class="form-group col-md-4">
                <label for="municipio">Município</label>
                <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Município"
                    value="<?php echo $municipio; ?>" disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="situacao">Situação</label>
                <input type="text" class="form-control" id="situacao" name="situacao" placeholder="Situação"
                    value="<?php echo $situacao; ?>" disabled>
            </div>
        </div>
        <div class="row mb-2">
            <div class="form-group col-md-4">
                <label for="porte">Porte</label>
                <input type="text" class="form-control" id="porte" name="porte" placeholder="Porte"
                    value="<?php echo $porte; ?>" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="uf">UF</label>
                <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" value="<?php echo $uf; ?>"
                    disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="tipo">Matriz?</label>
                <input type="text" class="form-control" id="tipo_matriz" name="tipo_matriz" placeholder="tipo_matriz"
                    value="<?php echo $tipo_cnpj; ?>" disabled>
            </div>
        </div>
        <div class="row mb-2">

            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                    value="<?php echo $email; ?>" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone"
                    value="<?php echo $telefone; ?>" disabled>
            </div>

        </div>


        <div class="position-relative">
            <hr class="bg-200 mt-5 mb-4">
            <div class="divider-content-center">Informações da Contratação</div>
        </div>


        <div class="row mb-2">
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="dataAdmissao">Data de Admissão:</label>
                        <input type="date" class="form-control" id="dataAdmissao" name="dataAdmissao"
                            value="<?php echo $dataAdmissao; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="dataDemissao">Data de Demissão:</label>
                        <input type="date" class="form-control" id="dataDemissao" name="dataDemissao"
                            value="<?php echo $dataDemissao; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="dataNascimento">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento"
                            value="<?php echo $dataNascimento; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cnhNumero">Número da CNH:</label>
                        <input type="text" class="form-control" id="cnhNumero" name="cnhNumero"
                            value="<?php echo $cnhNumero; ?>">
                    </div>
                </div>

            </div>

        </div>

        <div class="row mb-2">

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="cnhTipo">CNH Tipo:</label>
                    <!-- <div class="checkbox-group">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="cnhTipo" value="A"
                                    <?php if($cnhTipo == "A") echo "checked"; ?>> Categoria A
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="cnhTipo" value="B"
                                    <?php if($cnhTipo == "B") echo "checked"; ?>> Categoria B
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="cnhTipo" value="C"
                                    <?php if($cnhTipo == "C") echo "checked"; ?>> Categoria C
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="cnhTipo" value="D"
                                    <?php if($cnhTipo == "D") echo "checked"; ?>> Categoria D
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="cnhTipo" value="E"
                                    <?php if($cnhTipo == "E") echo "checked"; ?>> Categoria E
                            </label>
                        </div>
                    </div> -->
                    <div class="checkbox-group">
    <?php
    $categorias = array("A", "B", "C", "D", "E");

    foreach ($categorias as $categoria) {
        $checked = in_array($categoria, $cnhTipoArray) ? "checked" : "";
    ?>
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="cnhTipo[]" value="<?= $categoria ?>" <?= $checked ?>>
                Categoria <?= $categoria ?>
            </label>
        </div>
    <?php
    }
    ?>
</div>

                </div>
            </div>


        </div>

        <div class="position-relative">
            <hr class="bg-200 mt-5 mb-4">
            <div class="divider-content-center">Informações do Representante Legal</div>
        </div>

        <div class="row mb-2">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf; ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="rg">RG:</label>
                    <input type="text" class="form-control" id="rg" name="rg" value="<?php echo $rg; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome_resp">Nome:</label>
                    <input type="text" class="form-control" id="nome_resp" name="nome_resp"
                        value="<?php echo $nome_resp; ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="endereco_resp">Endereço:</label>
                    <input type="text" class="form-control" id="endereco_resp" name="endereco_resp"
                        value="<?php echo $endereco_resp; ?>">
                </div>
            </div>


        </div>

        <button type="submit" class="btn btn-success mt-2 mb -2">Cadastrar</button>
    </form>
</div>



<script>
function formatarCNPJ(cnpj) {
    cnpj = cnpj.replace(/\D/g, "");
    return cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");
}
</script>


<script>
$(document).ready(function() {
    $('#cnpj').on('change', function(e) {
        var cnpj = $(this).val();
        $.ajax({
            url: 'pages/config/buscar_cnpj.php',
            type: 'post',
            data: {
                cnpj: cnpj
            },
            success: function(response) {
                var data = JSON.parse(response);
                $('#cnpj').val(formatarCNPJ(cnpj)).attr('title', formatarCNPJ(cnpj));
                $('#nome_fantasia').val(data.fantasia).attr('title', data.fantasia);
                $('#abertura').val(data.abertura).attr('title', data.abertura);
                $('#atividade_principal').val(data.atividade_principal[0].text).attr(
                    'title', data.atividade_principal[0].text);
                $('#municipio').val(data.municipio).attr('title', data.municipio);
                $('#situacao').val(data.situacao).attr('title', data.situacao);
                $('#email').val(data.email).attr('title', data.email);
                $('#uf').val(data.uf).attr('title', data.uf);
                $('#tipo').val(data.tipo).attr('title', data.tipo);
                $('#porte').val(data.porte).attr('title', data.porte);
                $('#telefone').val(data.telefone).attr('title', data.telefone);
                $('#logradouro').val(data.logradouro).attr('title', data.logradouro);
                $('#razao_social').val(data.nome).attr('title', data.nome);
                var qsa = '';
                for (var i = 0; i < data.qsa.length; i++) {
                    qsa += data.qsa[i].nome + ' - ' + data.qsa[i].qual + '\n';
                }
                $('#qsa').val(qsa).attr('title', qsa);
                $('#edit_button').show();
                // Ativar os tooltips do Bootstrap em todos os inputs
                $('input').tooltip({
                    trigger: 'hover'
                });
            }

        });
    });
    $('#edit_button').click(function() {
        $('input').prop('disabled', false);
    });
});
</script>

<!-- Add an event listener to the form submit button -->
<script>
$(document).ready(function() {
    $('#form_cnpj').submit(function(event) {
        event.preventDefault(); // Evita o envio normal do formulário

        // Serialize form data (including disabled fields)
        var formData = $(this).serializeArray();

        // Add disabled fields to the serialized data
        $(':disabled', this).each(function() {
            formData.push({
                name: this.name,
                value: $(this).val()
            });
        });

        // Convert the serialized data into an object
        var formDataObject = {};
        $.map(formData, function(n, i) {
            if (formDataObject[n['name']]) {
                if (!Array.isArray(formDataObject[n['name']])) {
                    formDataObject[n['name']] = [formDataObject[n['name']]];
                }
                formDataObject[n['name']].push(n['value']);
            } else {
                formDataObject[n['name']] = n['value'];
            }
        });

        // Fazer a chamada AJAX
        $.ajax({
            type: 'POST',
            url: 'pages/cadastro/add/add_usuario_cnpj.php', // Substitua pelo seu endpoint da API
            data: formDataObject,
            success: function(response) {
                // Obter o ID inserido do response retornado pelo servidor
                var insertedId = response.inserted_id;

                // Exibir mensagem de sucesso usando SweetAlert2
                Swal.fire({
                    title: 'Sucesso',
                    text: 'Dados salvos com sucesso!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    // Limpar os campos do formulário
                    // $('#form')[0].reset();
                    location.href = 'content_pages.php?tipo=cnpj&id=10&tipo=cnpj&id_func=' +
                        insertedId;
                });
            },
            error: function() {
                // Exibir mensagem de erro usando SweetAlert2
                Swal.fire({
                    title: 'Erro',
                    text: 'Falha ao salvar os dados!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>