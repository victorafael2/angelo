
  <div class="container">
    <h1>Formulário de Usuário</h1>
    <form id="user-form" method="POST" action="processar_formulario.php">
      <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome">
      </div>
      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail">
      </div>
      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone">
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
      <button type="submit" class="btn btn-primary mt-2">Enviar</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>

$(document).ready(function () {
  // Manipula o envio do formulário
  $("#user-form").submit(function (e) {
    e.preventDefault(); // Impede o envio padrão do formulário

    // Coleta os dados do formulário
    var formData = {
      name: $("#name").val(),
      email: $("#email").val(),
      telefone: $("#telefone").val(),
      group: $("#grupo_acesso option:selected").val(),
    };

    // Envia os dados para o servidor via Ajax
    $.ajax({
      type: "POST",
      url: "pages/cadastro/add/add_usuario_sistem.php",
      data: formData,
      dataType: "json",
      success: function (response) {
        // Verifica a resposta do servidor
        if (response.success) {
          // Exibe um SweetAlert2 de sucesso
          Swal.fire({
            icon: "success",
            title: "Sucesso",
            text: response.message, // Use a mensagem do servidor
          });

          // Limpa o formulário após o sucesso
          $("#user-form")[0].reset();
        } else {
          // Exibe um SweetAlert2 de erro com a mensagem do servidor
          Swal.fire({
            icon: "error",
            title: "Erro",
            text: response.message, // Use a mensagem do servidor
          });
        }
      },
      error: function () {
        // Exibe um SweetAlert2 de erro em caso de falha na solicitação Ajax
        Swal.fire({
          icon: "error",
          title: "Erro",
          text: "Ocorreu um erro na solicitação Ajax.",
        });
      },
    });
  });
});


</script>

