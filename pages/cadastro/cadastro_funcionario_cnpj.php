<?php
$date = date("Y-m-d"); // Obtém a data atual no formato ano-mês-dia
?>
<style>
#edit_button {
    display: none;
}
</style>
<h3>Cadastro de Funcionários CNPJ</h3>



<form id="form" class="fs--1">

    <div class="row row-cols-3 g-2 align-items-center ">

        <div class="form-group col-md-6 mb-2">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="xx.xxx.xxx/xxxx-xx">
        </div>

        <button type="button" id="edit_button" class="btn btn-secondary mt-4">Editar Campos</button>


    </div>
    <div class="row mb-2">

        <div class="form-group col-md-4">
            <label for="nome_fantasia">Nome Fantasia</label>
            <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" placeholder="Nome Fantasia"
                disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="razao_social">Razão Social</label>
            <input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="Razão Social"
                disabled>
        </div>
        <div class="form-group col-md-2">
            <label for="abertura">Abertura</label>
            <input type="text" class="form-control" id="abertura" name="abertura" placeholder="Abertura" disabled>
        </div>

    </div>
    <div class="row mb-2">

        <div class="form-group col-md-12">
            <label for="atividade_principal">Atividade Principal</label>
            <input type="text" class="form-control" id="atividade_principal" name="atividade_principal"
                placeholder="Atividade Principal" disabled>
        </div>
    </div>

    <div class="row mb-2">
        <div class="form-group col-md-6">
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro" disabled>
        </div>

        <div class="form-group col-md-4">
            <label for="municipio">Município</label>
            <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Município" disabled>
        </div>
        <div class="form-group col-md-2">
            <label for="situacao">Situação</label>
            <input type="text" class="form-control" id="situacao" name="situacao" placeholder="Situação" disabled>
        </div>
    </div>
    <div class="row mb-2">
        <div class="form-group col-md-4">
            <label for="porte">Porte</label>
            <input type="text" class="form-control" id="porte" name="porte" placeholder="Porte" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="uf">UF</label>
            <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo" disabled>
        </div>
    </div>
    <div class="row mb-2">

        <div class="form-group col-md-4">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" disabled>
        </div>

    </div>



    <div class="row mb-2">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dataCadastro">Data de Cadastro:</label>
                    <input type="date" class="form-control" id="dataCadastro" name="dataCadastro">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dataAdmissao">Data de Admissão:</label>
                    <input type="date" class="form-control" id="dataAdmissao" name="dataAdmissao">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dataDemissao">Data de Demissão:</label>
                    <input type="date" class="form-control" id="dataDemissao" name="dataDemissao">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dataNascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="dataNascimento" name="dataNascimento">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cnhNumero">Número da CNH:</label>
                    <input type="text" class="form-control" id="cnhNumero" name="cnhNumero">
                </div>
            </div>

        </div>

    </div>

    <div class="row mb-2">

        <div class="col-sm-12">
            <div class="form-group">
                <label for="cnhTipo">CNH Tipo:</label>
                <div class="checkbox-group">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="cnhTipo" value="A"> Categoria A
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="cnhTipo" value="B"> Categoria B
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="cnhTipo" value="C"> Categoria C
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="cnhTipo" value="D"> Categoria D
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="cnhTipo" value="E"> Categoria E
                        </label>
                    </div>
                </div>
            </div>
        </div>


    </div>







    <br>



    <button type="submit" class="btn btn-success mt-5">Cadastrar</button>
</form>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>






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
    $('#form').submit(function(event) {
      event.preventDefault(); // Evita o envio normal do formulário

      // Serialize form data (including disabled fields)
      var formData = $(this).serializeArray();

      // Add disabled fields to the serialized data
      $(':disabled', this).each(function() {
        formData.push({ name: this.name, value: $(this).val() });
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
          // Exibir mensagem de sucesso usando SweetAlert2
          Swal.fire({
            title: 'Sucesso',
            text: 'Dados salvos com sucesso!',
            icon: 'success',
            confirmButtonText: 'OK'
          }).then(function() {
            // Limpar os campos do formulário
            $('#form')[0].reset();
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
