<?php
$date = date("Y-m-d"); // Obtém a data atual no formato ano-mês-dia
?>
<h3>Cadastro de Funcionários</h3>

<form id="form" class="mb-3">
    <div class="row mb-2">
        <!-- <div class="col-sm-4">
            <div class="form-group">
                <label for="idFuncionario">ID Funcionário:</label>
                <input type="text" class="form-control" id="idFuncionario" name="idFuncionario">
            </div>
        </div> -->

        <div class="col-sm-4">
            <div class="form-group">
                <label for="dataCadastro">Data de Cadastro:</label>
                <input type="date" class="form-control datetimepicker" id="dataCadastro" name="dataCadastro"
                    placeholder="aaaa-mm-dd"
                    data-options='{"disableMobile":true,"dateFormat":"Y-m-d","defaultDate":"<?php echo $date ?>"}'>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" oninput="formatarCPF(this)">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="dataAdmissao">Data de Admissão:</label>
                <input type="date" class="form-control datetimepicker" id="dataAdmissao" name="dataAdmissao"
                    placeholder="aaaa-mm-dd" data-options='{"disableMobile":true,"dateFormat":"Y-m-d"}'>
            </div>
        </div>
    </div>
    <div class="row mb-2">

        <!-- <div class="col-sm-4">
            <div class="form-group">
                <label for="dataDemissao">Data de Demissão:</label>
                <input type="date" class="form-control" id="dataDemissao" name="dataDemissao">
            </div>
        </div> -->
        <div class="col-sm-4">
            <div class="form-group">
                <label for="dataNascimento">Data de Nascimento:</label>
                <input type="date" class="form-control datetimepicker" id="dataNascimento" name="dataNascimento"
                    placeholder="aaaa-mm-dd" data-options='{"disableMobile":true,"dateFormat":"Y-m-d"}'>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="rgNumero">RG Número:</label>
                <input type="text" class="form-control" id="rgNumero" name="rgNumero">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="rgEmissor">RG Emissor:</label>
                <input type="text" class="form-control" id="rgEmissor" name="rgEmissor">
            </div>
        </div>
    </div>
    <div class="row mb-2">

        <div class="col-sm-4">
            <div class="form-group">
                <label for="rgUF">RG UF:</label>
                <select class="form-control" id="rgUF" name="rgUF">
                    <option value="">Selecione um estado</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="rgDataEmissao"> RG Data de Emissão:</label>
                <input type="date" class="form-control datetimepicker" id="rgDataEmissao" name="rgDataEmissao"
                    placeholder="aaaa-mm-dd" data-options='{"disableMobile":true,"dateFormat":"Y-m-d"}'>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="cnhNumero">CNH Número:</label>
                <input type="text" class="form-control" id="cnhNumero" name="cnhNumero">
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
    <div class="row mb-2">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="ctpsNumero">CTPS Número:</label>
                <input type="text" class="form-control" id="ctpsNumero" name="ctpsNumero">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="ctpsSerie">CTPS Série:</label>
                <input type="text" class="form-control" id="ctpsSerie" name="ctpsSerie">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="ctpsDataEmissao">CTPS Data de Emissão:</label>
                <input type="date" class="form-control datetimepicker" id="ctpsDataEmissao" name="ctpsDataEmissao"
                    placeholder="aaaa-mm-dd" data-options='{"disableMobile":true,"dateFormat":"Y-m-d"}'>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="ctpsUF">CTPS UF:</label>
                <select class="form-control" id="ctpsUF" name="ctpsUF">
                    <option value="">Selecione um estado</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="pisNumero">PIS Número:</label>
                <input type="text" class="form-control" id="pisNumero" name="pisNumero">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="eSocial">eSocial:</label>
                <input type="text" class="form-control" id="eSocial" name="eSocial">
            </div>
        </div>
    </div>
    <div class="row  mb-3">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="sigilo">Sigilo:</label>
                <select class="form-control" id="sigilo" name="sigilo">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  $(document).ready(function() {
    $("#form").submit(function(e) {
      e.preventDefault(); // Impede que o formulário seja enviado normalmente

      // Verifica se todos os campos estão preenchidos
      var allFieldsFilled = true;
      $("#form input, #form select").each(function() {
        if ($(this).val() === "") {
          allFieldsFilled = false;
          return false; // Interrompe o loop quando um campo vazio é encontrado
        }
      });

      if (!allFieldsFilled) {
        Swal.fire({
          title: 'Campos vazios',
          text: 'Por favor, preencha todos os campos do formulário.',
          icon: 'error',
          confirmButtonText: 'OK'
        });
        return; // Interrompe a submissão do formulário
      }

      var formData = $(this).serializeArray(); // Serializa os dados do formulário

      // Adiciona os campos desabilitados aos dados serializados
      $(':disabled', this).each(function() {
        formData.push({ name: this.name, value: $(this).val() });
      });

      // Converte os dados serializados em um objeto
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

      $.ajax({
        type: "POST",
        url: "pages/cadastro/add/add_usuario.php",
        data: formDataObject,
        success: function(response) {
          if (response == "success") {
            Swal.fire({
              title: 'Erro',
              text: 'Ocorreu um erro ao salvar os dados!',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          } else {
            Swal.fire({
              title: 'Parabéns',
              text: 'Usuário cadastrado com sucesso!',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.isConfirmed) {
                // location.href = 'palitagens.php';
                // Obter referência ao formulário
                var form = document.getElementById('form');

                // Iterar sobre os campos do formulário
                for (var i = 0; i < form.elements.length; i++) {
                  var field = form.elements[i];

                  // Verificar se o campo não é o campo de ID "dataCadastro"
                  if (field.id !== 'dataCadastro') {
                    // Limpar o valor do campo
                    field.value = '';
                  }
                }
              }
            });
          }
        }
      });
    });
  });
</script>


<script>
function formatarCPF(campo) {
    // Remove qualquer caractere que não seja dígito
    var cpf = campo.value.replace(/\D/g, '');

    // Aplica a formatação
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

    // Atualiza o valor do campo
    campo.value = cpf;
}
</script>