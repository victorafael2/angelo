<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se existem arquivos enviados
    if (isset($_FILES["documentos"]["name"]) && count($_FILES["documentos"]["name"]) > 0) {
        $targetDir = "uploads/"; // Diretório onde os documentos serão salvos
        $uploadOk = true;

        // Agora, para criar a pasta com o ID do funcionário (supondo que você tem o ID do funcionário disponível)
        $id_funcionario = 123; // Substitua pela lógica para obter o ID do funcionário

        // Diretório base onde as pastas do funcionário serão criadas
        $baseDirectory = $targetDir . $id_funcionario . "/";

        // Crie o diretório do funcionário se ele não existir
        if (!file_exists($baseDirectory)) {
            mkdir($baseDirectory, 0777, true);
        }

        // Loop através de cada arquivo enviado
        for ($i = 0; $i < count($_FILES["documentos"]["name"]); $i++) {
            $targetFile = $baseDirectory . basename($_FILES["documentos"]["name"][$i]);

            // Verifique se o arquivo é realmente um documento (opcional)
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
                echo "Apenas arquivos PDF, DOC e DOCX são permitidos.";
                $uploadOk = false;
                break;
            }

            // Verifique se o arquivo não é muito grande (opcional)
            if ($_FILES["documentos"]["size"][$i] > 5000000) { // Limite de 5 MB
                echo "Desculpe, o arquivo é muito grande.";
                $uploadOk = false;
                break;
            }

            // Se todas as verificações passarem, mova o arquivo para o diretório de upload
            if ($uploadOk) {
                if (move_uploaded_file($_FILES["documentos"]["tmp_name"][$i], $targetFile)) {
                    echo "O arquivo " . $_FILES["documentos"]["name"][$i] . " foi enviado com sucesso e salvo no diretório do funcionário.<br>";

                    // Conexão com o banco de dados (substitua as credenciais pelos seus dados)
                    include 'database/databaseconnect.php';
                    $conn->set_charset("utf8"); // Define a codificação UTF-8

                    // Verifique a conexão
                    if ($conn->connect_error) {
                        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
                    }

                    // Preparar a declaração SQL com um espaço reservado (?) para cada valor
                    $stmt = $conn->prepare("INSERT INTO documentos (nome_arquivo, tipo_arquivo, tamanho_arquivo, caminho_arquivo, data_upload, id_funcionario)
                                           VALUES (?, ?, ?, ?, ?, ?)");

                    // Obter os valores para inserir no banco de dados
                    $nome_arquivo = $_FILES["documentos"]["name"][$i];
                    $tipo_arquivo = $_FILES["documentos"]["type"][$i];
                    $tamanho_arquivo = $_FILES["documentos"]["size"][$i];
                    $caminho_arquivo = $targetFile;
                    $data_upload = date("Y-m-d H:i:s"); // Data e hora atual

                    // Vincular os valores ao espaço reservado (?) na declaração SQL
                    $stmt->bind_param("ssisss", $nome_arquivo, $tipo_arquivo, $tamanho_arquivo, $caminho_arquivo, $data_upload, $id_funcionario);

                    // Executar a declaração preparada
                    if ($stmt->execute()) {
                        echo "O registro do arquivo " . $_FILES["documentos"]["name"][$i] . " foi salvo no banco de dados.<br>";
                    } else {
                        echo "Ocorreu um erro ao salvar o registro do arquivo " . $_FILES["documentos"]["name"][$i] . ": " . $conn->error . "<br>";
                    }

                    // Feche a declaração preparada
                    $stmt->close();
                    // Feche a conexão com o banco de dados
                    $conn->close();
                } else {
                    echo "Ocorreu um erro ao enviar o arquivo " . $_FILES["documentos"]["name"][$i] . ".<br>";
                }
            }
        }
    } else {
        echo "Nenhum arquivo foi enviado.";
    }
}
?>
