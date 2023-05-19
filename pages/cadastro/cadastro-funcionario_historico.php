<?php

$id_funci = $_GET['id_func'];


// Query SQL para obter os dados existentes no banco de dados
$query = "SELECT * FROM tb_history_cadastro where id_funcionario = $id_funci";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Preenche os campos com os dados existentes no banco, se houver
$nomeSocial = $row["nome_social"] ?? "";
$nomeRegistro = $row["nome_registro"] ?? "";
$sexo = $row["sexo"] ?? "";
$genero = $row["genero"] ?? "";
$estadoCivil = $row["estado_civil"] ?? "";
$idCargo = $row["id_cargo"] ?? "";
$idVt = $row["id_vt"] ?? "";
$idSuperior = $row["id_superior"] ?? "";
$idArea = $row["id_area"] ?? "";
$idOperacao = $row["id_operacao"] ?? "";
$idFilial = $row["id_filial"] ?? "";
$tipoRegime = $row["tipo_regime"] ?? "";
$tipoContrato = $row["tipo_contrato"] ?? "";
$tipoPonto = $row["tipo_ponto"] ?? "";
$sistemaPonto = $row["sistema_ponto"] ?? "";
$vlrSalario = $row["vlr_salario"] ?? "";
$status = $row["status"] ?? "";


?>

<h3>Cadastro Histórico de funcionários</h3>

<form id="form">
  <div class="row">
  <div class="col-md-4">
          <label for="idFuncioanrio" class="form-label">Id Funcioanrio</label>
          <input type="text" class="form-control" id="idFuncioanrio" name="idFuncioanrio" value="<?php echo $id_funci; ?>">
      </div>
      <div class="col-md-4">
          <label for="nomeSocial" class="form-label">Nome Social</label>
          <input type="text" class="form-control" id="nomeSocial" name="nomeSocial" value="<?php echo $nomeSocial; ?>">
      </div>
      <div class="col-md-4">
          <label for="nomeRegistro" class="form-label">Nome de Registro</label>
          <input type="text" class="form-control" id="nomeRegistro" name="nomeRegistro" value="<?php echo $nomeRegistro; ?>">
      </div>
      <div class="col-md-4">
          <label for="sexo" class="form-label">Sexo</label>
          <select class="form-select" id="sexo" name="sexo">
              <option value="">Selecione</option>
              <option value="Masculino"<?php if ($sexo == "Masculino") echo " selected"; ?>>Masculino</option>
              <option value="Feminino"<?php if ($sexo == "Feminino") echo " selected"; ?>>Feminino</option>
          </select>
      </div>
  </div>
  <div class="row">
      <div class="col-md-4">
          <label for="genero" class="form-label">Gênero</label>
          <select class="form-select" id="genero" name="genero">
              <option value="">Selecione</option>
              <option value="Masculino"<?php if ($genero == "Masculino") echo " selected"; ?>>Masculino</option>
              <option value="Feminino"<?php if ($genero == "Feminino") echo " selected"; ?>>Feminino</option>
              <option value="Outro"<?php if ($genero == "Outro") echo " selected"; ?>>Outro</option>
          </select>
      </div>
      <div class="col-md-4">
          <label for="estadoCivil" class="form-label">Estado Civil</label>
          <select class="form-select" id="estadoCivil" name="estadoCivil">
              <option value="">Selecione</option>
              <option value="Solteiro(a)"<?php if ($estadoCivil == "Solteiro(a)") echo " selected"; ?>>Solteiro(a)</option>
              <option value="Casado(a)"<?php if ($estadoCivil == "Casado(a)") echo " selected"; ?>>Casado(a)</option>
              <option value="Divorciado(a)"<?php if ($estadoCivil == "Divorciado(a)") echo " selected"; ?>>Divorciado(a)</option>
              <option value="Viúvo(a)"<?php if ($estadoCivil == "Viúvo(a)") echo " selected"; ?>>Viúvo(a)</option>
          </select>
      </div>
      <div class="col-md-4">
          <label for="idCargo" class="form-label">ID Cargo</label>
          <input type="text" class="form-control" id="idCargo" name="idCargo" value="<?php echo $idCargo; ?>">
      </div>
  </div>
  <div class="row">
      <div class="col-md-4">
          <label for="idVt" class="form-label">ID VT</label>
          <input type="text" class="form-control" id="idVt" name="idVt" value="<?php echo $idVt; ?>">
      </div>
      <div class="col-md-4">
          <label for="idSuperior" class="form-label">ID Superior</label>
          <input type="text" class="form-control" id="idSuperior" name="idSuperior" value="<?php echo $idSuperior; ?>">
      </div>
      <div class="col-md-4">
          <label for="idArea" class="form-label">ID Área</label>
          <input type="text" class="form-control" id="idArea" name="idArea" value="<?php echo $idArea; ?>">
      </div>
  </div>
  <div class="row">
      <div class="col-md-4">
          <label for="idOperacao" class="form-label">ID Operação</label>
          <input type="text" class="form-control" id="idOperacao" name="idOperacao" value="<?php echo $idOperacao; ?>">
      </div>
      <div class="col-md-4">
          <label for="idFilial" class="form-label">ID Filial</label>
          <input type="text" class="form-control" id="idFilial" name="idFilial" value="<?php echo $idFilial; ?>">
      </div>
      <div class="col-md-4">
          <label for="tipoRegime" class="form-label">Tipo Regime</label>
          <input type="text" class="form-control" id="tipoRegime" name="tipoRegime" value="<?php echo $tipoRegime; ?>">
      </div>
  </div>
  <div class="row">
      <div class="col-md-4">
          <label for="tipoContrato" class="form-label">Tipo Contrato</label>
          <input type="text" class="form-control" id="tipoContrato" name="tipoContrato" value="<?php echo $tipoContrato; ?>">
      </div>
      <div class="col-md-4">
          <label for="tipoPonto" class="form-label">Tipo Ponto</label>
          <input type="text" class="form-control" id="tipoPonto" name="tipoPonto" value="<?php echo $tipoPonto; ?>">
      </div>
      <div class="col-md-4">
          <label for="sistemaPonto" class="form-label">Sistema Ponto</label>
          <input type="text" class="form-control" id="sistemaPonto" name="sistemaPonto" value="<?php echo $sistemaPonto; ?>">
      </div>
  </div>
  <div class="row mb-3">
      <div class="col-md-4">
          <label for="vlrSalario" class="form-label">Valor do Salário</label>
          <input type="text" class="form-control" id="vlrSalario" name="vlrSalario" value="<?php echo $vlrSalario; ?>">
      </div>
      <div class="col-md-4">
          <label for="status" class="form-label">Status</label>
          <input type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>">
      </div>
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
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

    var formData = $(this).serialize(); // Serializa os dados do formulário


    $.ajax({
      type: "POST",
      url: "pages/cadastro/add/add_usuario_historico.php",
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
          Swal.fire({
            title: 'Parabéns',
            text: 'Usuário Atualizado com sucesso!',
            icon: 'success',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.isConfirmed) {
              // location.href = 'palitagens.php';
            }
          });
        }
      }
    });
  });
});
</script>