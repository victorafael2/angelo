<?php
// Verifica se um arquivo foi enviado
if ($_FILES['arquivoUpload']['error'] === UPLOAD_ERR_OK) {
    // Obter o ID do usuário enviado pelo formulário
    $id_usuario = $_POST['idFuncionario'];
    $tipo = $_POST['tipo'];

    // Pasta para salvar os arquivos do usuário
    $pastaUsuario = "uploads/" . $tipo . "/" . $id_usuario . "/";
    if (!is_dir($pastaUsuario)) {
        // Verifica e cria o diretório com permissões adequadas
        if (!mkdir($pastaUsuario, 0755, true)) {
            die("Falha ao criar a pasta do usuário.");
        }
    }

    include '../../database/databaseconnect.php';

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Função para converter e salvar o arquivo no banco de dados
    function salvarArquivoBase64($arquivo, $pasta, $id_usuario, $conn, $campoTexto, $tipo) {
        $nomeArquivo = $arquivo['name'];
        $tamanhoArquivo = $arquivo['size'];
        $extensaoArquivo = pathinfo($nomeArquivo, PATHINFO_EXTENSION);

        // Gera um nome único para o arquivo usando o ID do usuário e o timestamp atual
        $novoNomeArquivo = $id_usuario . "_" . time() . "_" . $campoTexto . "."  . $extensaoArquivo;
        $caminhoArquivo = $pasta . $novoNomeArquivo;

        // Converte o arquivo para Base64
        $conteudoArquivo = file_get_contents($arquivo['tmp_name']);
        $conteudoBase64 = base64_encode($conteudoArquivo);

        // Insere as informações na tabela do banco de dados
        $sql = "INSERT INTO arquivos_usuario (id_usuario, caminho, nome, tamanho, extensao, texto, tipo)
                VALUES ('$id_usuario', '$conteudoBase64', '$nomeArquivo', '$tamanhoArquivo', '$extensaoArquivo', '$campoTexto', '$tipo')";

        if ($conn->query($sql) === TRUE) {
            echo "Arquivo enviado com sucesso!";
        } else {
            echo "Erro ao enviar o arquivo: " . $conn->error;
        }
    }

    // Chama a função para converter e salvar o arquivo
    salvarArquivoBase64($_FILES['arquivoUpload'], $pastaUsuario, $id_usuario, $conn, $_POST['nomeArquivo'], $tipo);

    $conn->close();
}
?>
