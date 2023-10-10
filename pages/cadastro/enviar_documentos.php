<?php
// Verifica se um arquivo foi enviado
if (
  $_FILES['arquivoCPF']['error'] === UPLOAD_ERR_OK &&
  $_FILES['arquivoRG']['error'] === UPLOAD_ERR_OK &&
  $_FILES['arquivoEndereco']['error'] === UPLOAD_ERR_OK
) {

  // Obter o ID do usuário enviado pelo formulário
  $id_usuario = $_POST['idFuncionario']; // Fix the typo here - 'idFuncionario'

  // Pasta para salvar os arquivos do usuário
  $pastaUsuario = "uploads/" . $id_usuario . "/";
  if (!is_dir($pastaUsuario)) {
    // Check and create the directory with proper permissions
    if (!mkdir($pastaUsuario, 0755, true)) {
      die("Falha ao criar a pasta do usuário.");
    }
  }

  include '../../database/databaseconnect.php';

  if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
  }

  // Função para mover o arquivo e inserir no banco de dados
  function moverArquivo($arquivo, $pasta, $id_usuario, $conn, $campoTexto)
  {
    $nomeArquivo = $arquivo['name'];
    $tamanhoArquivo = $arquivo['size'];
    $extensaoArquivo = pathinfo($nomeArquivo, PATHINFO_EXTENSION);

    // Gera um nome único para o arquivo usando o ID do usuário e o timestamp atual
    $novoNomeArquivo = $id_usuario . "_" . time() . $campoTexto . "."  . $extensaoArquivo;
    $caminhoArquivo = $pasta . $novoNomeArquivo;

    // Move o arquivo para a pasta de upload
    if (move_uploaded_file($arquivo['tmp_name'], $caminhoArquivo)) {
      // Insere as informações na tabela do banco de dados
      $id_usuario = $_POST['idFuncionario'];
      $sql = "INSERT INTO arquivos_usuario (id_usuario, caminho, nome, tamanho, extensao, texto)
              VALUES ('$id_usuario', '$caminhoArquivo', '$nomeArquivo', '$tamanhoArquivo', '$extensaoArquivo', '$campoTexto')";

      if ($conn->query($sql) === TRUE) {
        echo "Arquivo enviado com sucesso!";
      } else {
        echo "Erro ao enviar o arquivo: " . $conn->error;
      }
    } else {
      echo "Erro ao mover o arquivo.";
    }
  }

  // Chama a função para mover cada arquivo and pass the corresponding name for the 'texto' column
  moverArquivo($_FILES['arquivoCPF'], $pastaUsuario, $id_usuario, $conn, 'CPF');
  moverArquivo($_FILES['arquivoRG'], $pastaUsuario, $id_usuario, $conn, 'RG');
  moverArquivo($_FILES['arquivoEndereco'], $pastaUsuario, $id_usuario, $conn, 'Comprovante de Endereço');

  $conn->close();
}
?>
