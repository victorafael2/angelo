

<?php
include ("../../database/databaseconnect.php");

// Verifica se a conexão foi realizada com sucesso
if (!$conn) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define as variáveis com os valores enviados pelo formulário
    $tipo = isset($_POST['hide-fields-checkbox']) ?  'PARTICULAR' : 'SEBRAE';
    $id_rel = $_POST["id_rel"];
    $empresa = isset($_POST["empresa"]) ? $_POST["empresa"] : '';
    $ramo = isset($_POST["ramo"]) ? $_POST["ramo"] : '';
    $contato = isset($_POST["contato"]) ? $_POST["contato"] : '';
    $tipo_consultoria_serializadas = isset($_POST["tipo_consultoria"]) ? $_POST["tipo_consultoria"] : '';// Serializar as opções selecionadas para salvar no banco de dados
    $tipo_consultoria =implode(',', $tipo_consultoria_serializadas);
    $carga_horaria = isset($_POST["carga_horaria"]) ? $_POST["carga_horaria"] : '';
    $valor_hora = isset($_POST["valor_hora"]) ? $_POST["valor_hora"] : '';
    $valor_total = isset($_POST["valor_total"]) ? $_POST["valor_total"] : '';
    $valor_liquido = isset($_POST["valor_liquido"]) ? $_POST["valor_liquido"] : '';
    $status_cliente = isset($_POST["status_cliente"]) ? $_POST["status_cliente"] : '';
    $status_proposta_sebrae = isset($_POST["status_proposta_sebrae"]) ? $_POST["status_proposta_sebrae"] : '';
    $responsavel_sebrae = isset($_POST["responsavel_sebrae"]) ? $_POST["responsavel_sebrae"] : '';
    $status_pagamento = isset($_POST["status_pagamento"]) ? $_POST["status_pagamento"] : '';
    $status_consultoria = isset($_POST["status_consultoria"]) ? $_POST["status_consultoria"] : '';
    $inicio = isset($_POST["inicio"]) ? $_POST["inicio"] : '';
    $fim = isset($_POST["fim"]) ? $_POST["fim"] : '';
    $inicio_real = isset($_POST["inicio_real"]) ? $_POST["inicio_real"] : '';
    $fim_real = isset($_POST["fim_real"]) ? $_POST["fim_real"] : '';
    $responsavel = isset($_POST["responsavel"]) ? $_POST["responsavel"] : '';
    $codigo_contratacao = isset($_POST["codigo_contratacao"]) ? $_POST["codigo_contratacao"] : '';
    $relatorio = isset($_POST["relatorio"]) ? $_POST["relatorio"] : '';
    $data_envio = isset($_POST["data_envio"]) ? $_POST["data_envio"] : '';
    $competencia = isset($_POST["competencia"]) ? $_POST["competencia"] : '';
    $situacao = isset($_POST["situacao"]) ? $_POST["situacao"] : '';
    $criado_por = isset($_POST["usuario"]) ? $_POST["usuario"] : '';


    // Define a query de inserção
    $query = "INSERT INTO consultoria (id_rel,tipo,empresa, ramo, contato, tipo_consultoria, carga_horaria, valor_hora, valor_total, valor_liquido, status_cliente, status_proposta_sebrae, responsavel_sebrae, status_pagamento, status_consultoria, inicio, fim, inicio_real, fim_real, responsavel, codigo_contratacao, relatorio, data_envio, competencia, situacao,criado_por)
    VALUES ('$id_rel','$tipo','$empresa', '$ramo', '$contato', '$tipo_consultoria', $carga_horaria, $valor_hora, $valor_total, '$valor_liquido', '$status_cliente', '$status_proposta_sebrae', '$responsavel_sebrae', '$status_pagamento', '$status_consultoria', '$inicio', '$fim', '$inicio_real', '$fim_real', $responsavel, '$codigo_contratacao', '$relatorio', '$data_envio', '$competencia', '$situacao','$criado_por')";

  // echo $query;

  }

if ($conn->query($query) === TRUE) {
    echo "Tarefa adicionada com sucesso!";
  } else {
    echo "Erro ao adicionar a tarefa: " . $conn->error;
  }


?>




