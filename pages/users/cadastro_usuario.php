
  <div class="container">
    <h1>Formulário de Usuário</h1>
    <form method="POST" action="processar_formulario.php">
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
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha">
      </div>
      <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF">
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>

