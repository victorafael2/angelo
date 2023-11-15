<?php
// Verifica se um arquivo foi enviado
if (
  $_FILES['arquivoCPF']['error'] === UPLOAD_ERR_OK &&
  $_FILES['arquivoRG']['error'] === UPLOAD_ERR_OK &&
  $_FILES['arquivoEndereco']['error'] === UPLOAD_ERR_OK
) {
  // Obter o ID do usuário enviado pelo formulário
  $id_usuario = $_POST['idFuncionario'];


  include '../../database/databaseconnect.php';

  if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
  }

  // Função para converter o arquivo em base64 e inserir no banco de dados
  function salvarArquivoBase64($arquivo, $id_usuario, $conn, $campoTexto) {
    $nomeArquivo = $arquivo['name'];
    $tamanhoArquivo = $arquivo['size'];
    $extensaoArquivo = pathinfo($nomeArquivo, PATHINFO_EXTENSION);

    // Ler o conteúdo do arquivo
    $conteudoArquivo = file_get_contents($arquivo['tmp_name']);
    // Converter o conteúdo para base64
    $base64 = base64_encode($conteudoArquivo);
    $tipo_cadastro = $_POST['tipo'];
    // Insere as informações na tabela do banco de dados
    $sql = "INSERT INTO arquivos_usuario (id_usuario, caminho, nome, tamanho, extensao, texto, tipo)
            VALUES ('$id_usuario', '$base64', '$nomeArquivo', '$tamanhoArquivo', '$extensaoArquivo', '$campoTexto', '$tipo_cadastro')";

if ($conn->query($sql) === TRUE) {
  echo "Arquivo enviado com sucesso!";
  echo "<script>console.log('Arquivo enviado com sucesso!');</script>"; // Log no console do navegador
} else {
  echo "Erro ao enviar o arquivo: " . $conn->error;
  echo "<script>console.log('Erro ao enviar o arquivo: " . $conn->error . "');</script>"; // Log no console do navegador
}
  }

  // Chama a função para cada arquivo
  salvarArquivoBase64($_FILES['arquivoCPF'], $id_usuario, $conn, 'CPF');
  salvarArquivoBase64($_FILES['arquivoRG'], $id_usuario, $conn, 'RG');
  salvarArquivoBase64($_FILES['arquivoEndereco'], $id_usuario, $conn, 'Comprovante de Endereço');

  $conn->close();
}
?>
