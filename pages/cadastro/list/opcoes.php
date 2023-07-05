<?php
// busca_opcoes.php
include '../../../database/databaseconnect.php';
// Receber o valor do campo selecionado
$field = $_POST['field'];

// Verificar o campo selecionado e executar a consulta correspondente
if ($field === 'id_cargo') {
  // Realizar a consulta no banco de dados para buscar os campos id_cargo e cargo_nome na tabela aux_cargos
  // Substitua 'seu_host', 'seu_usuario', 'sua_senha' e 'seu_banco' pelas informações do seu banco de dados


  // Verificar se houve erro na conexão
  if ($conn->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conn->connect_error);
  }

  // Executar a consulta
  $sql = "SELECT id_cargo, cargo_nome FROM aux_cargos";
  $result = $conn->query($sql);

  // Montar o HTML das opções
  $optionsHTML = '';
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $optionsHTML .= '<option value="' . $row['id_cargo'] . '">' . $row['cargo_nome'] . '</option>';
    }
  }

  // Fechar a conexão com o banco de dados
  $conn->close();

  // Retornar o HTML das opções como resposta AJAX
  echo $optionsHTML;
} elseif ($field === 'id_area') {
  // Realizar a consulta no banco de dados para buscar os campos id_area e nome_area na tabela aux_areas
  // Substitua 'seu_host', 'seu_usuario', 'sua_senha' e 'seu_banco' pelas informações do seu banco de dados


  // Verificar se houve erro na conexão
  if ($conn->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conn->connect_error);
  }

  // Executar a consulta
  $sql = "SELECT id_area, nome_area FROM aux_areas";
  $result = $conn->query($sql);

  // Montar o HTML das opções
  $optionsHTML = '';
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $optionsHTML .= '<option value="' . $row['id_area'] . '">' . $row['nome_area'] . '</option>';
    }
  }

  // Fechar a conexão com o banco de dados
  $conn->close();

  // Retornar o HTML das opções como resposta AJAX
  echo $optionsHTML;
} elseif ($field === 'id_superior') {
 // Realizar a consulta no banco de dados para buscar os campos id_area e nome_area na tabela aux_areas
  // Substitua 'seu_host', 'seu_usuario', 'sua_senha' e 'seu_banco' pelas informações do seu banco de dados


  // Verificar se houve erro na conexão
  if ($conn->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conn->connect_error);
  }

  // Executar a consulta
  $sql = "SELECT id_funcionario, id_history AS max_id, nome_social
  FROM tb_history_cadastro
  WHERE (id_funcionario, id_history) IN (
  SELECT id_funcionario, MAX(id_history)
  FROM tb_history_cadastro
  GROUP BY id_funcionario
  );";
  $result = $conn->query($sql);

  // Montar o HTML das opções
  $optionsHTML = '';
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $optionsHTML .= '<option value="' . $row['id_funcionario'] . '">' . $row['nome_social'] . '</option>';
    }
  }

  // Fechar a conexão com o banco de dados
  $conn->close();

  // Retornar o HTML das opções como resposta AJAX
  echo $optionsHTML;
} elseif ($field === 'id_operacao') {
    // Realizar a consulta no banco de dados para buscar os campos id_area e nome_area na tabela aux_areas
     // Substitua 'seu_host', 'seu_usuario', 'sua_senha' e 'seu_banco' pelas informações do seu banco de dados


     // Verificar se houve erro na conexão
     if ($conn->connect_error) {
       die('Erro na conexão com o banco de dados: ' . $conn->connect_error);
     }

     // Executar a consulta
     $sql = "SELECT id_operacao, nome_operacao FROM aux_operacoes";
     $result = $conn->query($sql);

     // Montar o HTML das opções
     $optionsHTML = '';
     if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
         $optionsHTML .= '<option value="' . $row['aux_operacoes'] . '">' . $row['nome_operacao'] . '</option>';
       }
     }

     // Fechar a conexão com o banco de dados
     $conn->close();

     // Retornar o HTML das opções como resposta AJAX
     echo $optionsHTML;
   }
?>
