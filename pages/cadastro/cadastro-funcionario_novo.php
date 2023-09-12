<?php

$id_funci = isset($_GET['id_func']) ? $_GET['id_func'] : '';

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';


// Query SQL para obter os dados existentes no banco de dados
// $query_history = "SELECT * FROM tb_history_cadastro where id_funcionario = $id_funci ORDER BY id_history DESC LIMIT 1";
// $result_history = mysqli_query($conn, $query_history);
// $row = mysqli_fetch_assoc($result_history);







if ($tipo == 'cpf') {
    // Verifica se o parâmetro 'id_func' está presente na URL
if (isset($_GET['id_func'])) {
    $id_funci = $_GET['id_func'];
    // Executa a query somente se o valor de '$id_funci' existir
    $query_cadastro = "SELECT * FROM funcionarios WHERE idfuncionario = $id_funci";
    $result_cadastro = mysqli_query($conn, $query_cadastro);
    if ($result_cadastro) {
        // A consulta foi executada com sucesso, você pode usar os resultados aqui
        $row = mysqli_fetch_assoc($result_cadastro);
        // ...
    } else {
        // Ocorreu um erro na consulta
        // echo "Erro na consulta: " . mysqli_error($conn);
    }
} else {
    // Caso '$id_funci' não esteja presente, você pode lidar com a situação aqui
    // echo "ID de funcionário não fornecido ou inválido.";
    // Ou redirecionar o usuário para outra página:
    // header("Location: pagina_de_erro.php");
}

    // Preenche os campos com os dados existentes no banco, se houver
    $idFuncionario = $row["idFuncionario"] ?? "";
$dataCadastro = $row["dataCadastro"] ?? "";
$cpf = $row["cpf"] ?? "";
$dataAdmissao = $row["dataAdmissao"] ?? "";
$dataDemissao = $row["dataDemissao"] ?? "";
$dataNascimento = $row["dataNascimento"] ?? "";
$rgNumero = $row["rgNumero"] ?? "";
$rgEmissor = $row["rgEmissor"] ?? "";
$rgUF = $row["rgUF"] ?? "";
$rgDataEmissao = $row["rgDataEmissao"] ?? "";
$cnhNumero = $row["cnhNumero"] ?? "";
$cnhTipo = $row["cnhTipo"] ?? "";
$ctpsNumero = $row["ctpsNumero"] ?? "";
$ctpsSerie = $row["ctpsSerie"] ?? "";
$ctpsDataEmissao = $row["ctpsDataEmissao"] ?? "";
$ctpsUF = $row["ctpsUF"] ?? "";
$pisNumero = $row["pisNumero"] ?? "";
$eSocial = $row["eSocial"] ?? "";
$sigilo = $row["sigilo"] ?? "";
$created = $row["created"] ?? "";
$eleitor = $row["eleitor"] ?? "";

} else {
    // Use a different variable name for the else block
    if (isset($_GET['id_func'])) {
        $id_funci = $_GET['id_func'];
    $query_cadastro_cnpj = "SELECT * FROM funcionarios_cnpj WHERE id = $id_funci";
    $result_cadastro_cnpj = mysqli_query($conn, $query_cadastro_cnpj);
    if ($result_cadastro_cnpj) {
    $row_cnpj = mysqli_fetch_assoc($result_cadastro_cnpj);
    // echo "Erro na consulta: " . mysqli_error($conn);
}

else {
    // Caso '$id_funci' não esteja presente, você pode lidar com a situação aqui
    // echo "ID de funcionário não fornecido ou inválido.";
    // Ou redirecionar o usuário para outra página:
    // header("Location: pagina_de_erro.php");
}
}



        // Preenche as variáveis com os dados existentes no banco, se houver
$id = $row_cnpj["id"] ?? "";
$cnpj = $row_cnpj["cnpj"] ?? "";
$nome_fantasia = $row_cnpj["nome_fantasia"] ?? "";
$razao_social = $row_cnpj["razao_social"] ?? "";
$abertura = $row_cnpj["abertura"] ?? "";
$atividade_principal = $row_cnpj["atividade_principal"] ?? "";
$logradouro = $row_cnpj["logradouro"] ?? "";
$municipio = $row_cnpj["municipio"] ?? "";
$situacao = $row_cnpj["situacao"] ?? "";
$porte = $row_cnpj["porte"] ?? "";
$uf = $row_cnpj["uf"] ?? "";
$tipo_cnpj = $row_cnpj["tipo"] ?? "";
$email = $row_cnpj["email"] ?? "";
$telefone = $row_cnpj["telefone"] ?? "";
$dataCadastro = $row_cnpj["dataCadastro"] ?? "";
$dataAdmissao = $row_cnpj["dataAdmissao"] ?? "";
$dataDemissao = $row_cnpj["dataDemissao"] ?? "";
$dataNascimento = $row_cnpj["dataNascimento"] ?? "";
$cnhNumero = $row_cnpj["cnhNumero"] ?? "";
$cnhTipo = $row_cnpj["cnhTipo"] ?? "";
// Supondo que $cnhTipo seja uma string contendo os valores separados por vírgula
$cnhTipo = $row_cnpj["cnhTipo"] ?? "";

// Separar os valores por vírgula e criar um array
$cnhTipoArray = explode(",", $cnhTipo);

// Remover espaços em branco ao redor de cada valor (opcional)
$cnhTipoArray = array_map('trim', $cnhTipoArray);

// Unir os valores do array em uma string separada por vírgulas
$cnhTipoSeparated = implode(", ", $cnhTipoArray);


$cpf = $row_cnpj["cpf"] ?? "";
$rg = $row_cnpj["rg"] ?? "";
$nome_resp = $row_cnpj["nome_resp"] ?? "";
$endereco_resp = $row_cnpj["endereco_resp"] ?? "";


}





// agora query de atualizccao
// First, check if the 'id_func' parameter exists in the $_GET array and is not empty
if (isset($_GET['id_func']) && !empty($_GET['id_func'])) {
    // Sanitize the input to prevent SQL injection (assuming you're using mysqli)
    $id_funci = mysqli_real_escape_string($conn, $_GET['id_func']);

    // Now, construct and execute the query
    $query_atualizacao = "SELECT * FROM tb_history_cadastro WHERE id_funcionario =  $id_funci AND id_history = (SELECT MAX(id_history) AS max_id FROM tb_history_cadastro WHERE id_funcionario =  $id_funci) AND tipo_registro = '$tipo'";
    $result_atualizacao = mysqli_query($conn, $query_atualizacao);

    // Check if the query executed successfully
    if ($result_atualizacao) {
        // Your code to fetch and process the results goes here
        // Fetch the data and store it in variables
    $row = mysqli_fetch_assoc($result_atualizacao);

    // Preenche os campos com os dados existentes no banco, se houver
$nomeSocial = $row["nome_social"] ?? "";
$nomeRegistro = $row["nome_registro"] ?? "";
$sexo = $row["sexo"] ?? "";
$genero = $row["genero"] ?? "";
$estadoCivil = $row["estado_civil"] ?? "";
$idCargo = $row["id_cargo"] ?? "";
$idVt = $row["id_vt"] ?? "";
$idVr = $row["id_vr"] ?? "";
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

    } else {
        // Handle the query execution error, if any
        // echo "Error executing the query: " . mysqli_error($conn);
    }
} else {
    // Handle the case when 'id_func' parameter is missing or empty
    // echo "Invalid or missing 'id_func' parameter";

    $nomeSocial = $row["nome_social"] ?? "";
$nomeRegistro = $row["nome_registro"] ?? "";
$sexo = $row["sexo"] ?? "";
$genero = $row["genero"] ?? "";
$estadoCivil = $row["estado_civil"] ?? "";
$idCargo = $row["id_cargo"] ?? "";
$idVt = $row["id_vt"] ?? "";
$idVr = $row["id_vr"] ?? "";
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
}















?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<div class="row align-items-center justify-content-between g-3 mb-4">
    <div class="col-12 col-md-auto">
        <h2 class="mb-0">Cadastro de Colaboradores <?php echo $tipo ?></h2>
    </div>
    <div class="col-12 col-md-auto">
        <a href="content_pages.php?id=10" class="btn btn-phoenix-secondary px-3 px-sm-5 me-2"><span
                class="fa-solid fa-plus me-sm-2"></span><span class="d-none d-sm-inline">Novo Cadastro </span></a>
        <a href="content_pages.php?id=2" class="btn btn-phoenix-secondary px-3 px-sm-5 me-2"><span
                class="fa-solid fa-user me-sm-2"></span><span class="d-none d-sm-inline">Lista de
                Colaboradores</span></a>
        <a href="content_pages.php?id=4" class="btn btn-phoenix-secondary me-2"><i
                class="fa-solid fa-user-clock me-2"></i><span>Cadastros não Finalizados</span></a>
        <!-- <button class="btn px-3 btn-phoenix-secondary" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fa-solid fa-ellipsis"></span></button>
                <ul class="dropdown-menu dropdown-menu-end p-0" style="z-index: 9999;">
                  <li><a class="dropdown-item" href="#!">View profile</a></li>
                  <li><a class="dropdown-item" href="#!">Report</a></li>
                  <li><a class="dropdown-item" href="#!">Manage notifications</a></li>
                  <li><a class="dropdown-item text-danger" href="#!">Delete Lead</a></li>
                </ul> -->
    </div>
</div>
<div class="container mt-5">
    <ul class="nav nav-tabs nav-underline mb-3" id="myTabs" role="tablist">

        <li class="nav-item">
            <a class="nav-link active" id="tab-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1"
                aria-selected="false">1. Cadastro</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " id="tab1-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2"
                aria-selected="true">2. Cadastrar Atualização</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " id="docs-tab" data-toggle="tab" href="#docs" role="tab" aria-controls="docs"
                aria-selected="true">3. Documentos</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " id="filhos-tab" data-toggle="tab" href="#filhos" role="tab" aria-controls="filhos"
                aria-selected="true">4. Filhos</a>
        </li>


        <li class="nav-item">
            <a class="nav-link " id="conjuge-tab" data-toggle="tab" href="#conjuge" role="tab" aria-controls="conjuge"
                aria-selected="true">5. Cônjuge</a>
        </li>


        <li class="nav-item">
            <a class="nav-link " id="banco-tab" data-toggle="tab" href="#banco" role="tab" aria-controls="banco"
                aria-selected="true">6. Inf. Bancaria</a>
        </li>


        <li class="nav-item">
            <a class="nav-link " id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login"
                aria-selected="true">7. Logins</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " id="linha-tab" data-toggle="tab" href="#linha" role="tab" aria-controls="linha"
                aria-selected="true">8. Status</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " id="historico-tab" data-toggle="tab" href="#historico" role="tab"
                aria-controls="historico" aria-selected="true">9. Histórico</a>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link " id="docs-tab" data-toggle="tab" href="#docs" role="tab" aria-controls="docs"
                aria-selected="true">9. Adicionais</a>
        </li> -->




    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade mb-2" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <h3>Cadastrar Atualização de funcionários</h3>

            <form id="form">
                <div class="row">
                    <div class="col-md-4 d-none">
                        <label for="idFuncioanrio" class="form-label">Id Funcioanrio</label>
                        <input type="text" class="form-control" id="idFuncioanrio" name="idFuncioanrio"
                            value="<?php echo $id_funci; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="nomeSocial" class="form-label">Nome Social</label>
                        <input type="text" class="form-control" id="nomeSocial" name="nomeSocial"
                            value="<?php echo $nomeSocial; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="nomeRegistro" class="form-label">Nome de Registro</label>
                        <input type="text" class="form-control" id="nomeRegistro" name="nomeRegistro"
                            value="<?php echo $nomeRegistro; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select class="form-select" id="sexo" name="sexo" data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>
                            <option value="Masculino" <?php if ($sexo == "Masculino") echo " selected"; ?>>Masculino
                            </option>
                            <option value="Feminino" <?php if ($sexo == "Feminino") echo " selected"; ?>>Feminino
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="genero" class="form-label">Gênero</label>
                        <select class="form-select" id="genero" name="genero" data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>
                            <option value="Masculino" <?php if ($genero == "Masculino") echo " selected"; ?>>Masculino
                            </option>
                            <option value="Feminino" <?php if ($genero == "Feminino") echo " selected"; ?>>Feminino
                            </option>
                            <option value="Outro" <?php if ($genero == "Outro") echo " selected"; ?>>Outro</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="estadoCivil" class="form-label">Estado Civil</label>
                        <select class="form-select" id="estadoCivil" name="estadoCivil" data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>
                            <option value="Solteiro(a)" <?php if ($estadoCivil == "Solteiro(a)") echo " selected"; ?>>
                                Solteiro(a)</option>
                            <option value="Casado(a)" <?php if ($estadoCivil == "Casado(a)") echo " selected"; ?>>
                                Casado(a)</option>
                            <option value="Divorciado(a)"
                                <?php if ($estadoCivil == "Divorciado(a)") echo " selected"; ?>>Divorciado(a)</option>
                            <option value="Viúvo(a)" <?php if ($estadoCivil == "Viúvo(a)") echo " selected"; ?>>Viúvo(a)
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="idCargo" class="form-label">Cargo</label>
                        <select type="text" class="form-control" id="idCargo" name="idCargo" data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>



                            <?php
                                // Executar a consulta para obter os dados
                                $sql_cargo = "SELECT id_cargo, cargo_nome FROM aux_cargos"; // Substitua "tabela" pelo nome correto da sua tabela
                                $result_cargo = $conn->query($sql_cargo);

                                // Verificar se há resultados e criar as opções
                                if ($result_cargo->num_rows > 0) {
                                    while ($row = $result_cargo->fetch_assoc()) {
                                        $id_cargo = $row["id_cargo"];
                                        $nome_cargo = $row["cargo_nome"];
                                        $visibilidade_cargo = ($idCargo == $id_cargo) ? "selected" : "";

                                        echo "<option value='$id_cargo' $visibilidade_cargo>$nome_cargo</option>";
                                    }
                                } else {
                                    // echo "<option value=''>Nenhum resultado encontrado</option>";
                                }
                                ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="idVt" class="form-label">Auxilio Transporte</label>
                        <!-- <input type="text" class="form-control" id="idVt" name="idVt" value="<?php echo $idVt; ?>"> -->
                        <select type="text" class="form-control" id="idVt" name="idVt" data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>



                            <?php
                                    // Executar a consulta para obter os dados
                                    $sql_vt = "SELECT id_vt, vt_nome FROM aux_vt"; // Substitua "tabela" pelo nome correto da sua tabela
                                    $result_vt = $conn->query($sql_vt);

                                    // Verificar se há resultados e criar as opções
                                    if ($result_vt->num_rows > 0) {
                                        while ($row = $result_vt->fetch_assoc()) {
                                            $id_vt = $row["id_vt"];
                                            $vt_nome = $row["vt_nome"];
                                            $visibilidade_vt = ($idVt == $id_vt) ? "selected" : "";

                                            echo "<option value='$id_vt' $visibilidade_vt>$vt_nome</option>";
                                        }
                                    } else {
                                        // echo "<option value=''>Nenhum resultado encontrado</option>";
                                    }
                                    ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="idVt" class="form-label">Auxilio Alimentação</label>
                        <!-- <input type="text" class="form-control" id="idVt" name="idVt" value="<?php echo $idVt; ?>"> -->
                        <select type="text" class="form-control" id="idvr" name="idvr" data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>



                            <?php
                                    // Executar a consulta para obter os dados
                                    $sql_vr = "SELECT id_vr, vr_nome FROM aux_vr"; // Substitua "tabela" pelo nome correto da sua tabela
                                    $result_vr = $conn->query($sql_vr);

                                    // Verificar se há resultados e criar as opções
                                    if ($result_vr->num_rows > 0) {
                                        while ($row = $result_vr->fetch_assoc()) {
                                            $id_vr = $row["id_vr"];
                                            $vr_nome = $row["vr_nome"];
                                            $visibilidade_vr = ($idVr == $id_vr) ? "selected" : "";

                                            echo "<option value='$id_vr' $visibilidade_vr>$vr_nome</option>";
                                        }
                                    } else {
                                        // echo "<option value=''>Nenhum resultado encontrado</option>";
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="idSuperior" class="form-label">Superior</label>
                        <!-- <input type="text" class="form-control" id="idSuperior" name="idSuperior"
                            value="<?php echo $idSuperior; ?>"> -->
                        <select type="text" class="form-control" id="idSuperior" name="idSuperior"
                            data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true,"shouldSort":false}'>
                            <option value="">Selecione</option>
                            <option value="sem_superior">Sem Superior</option>



                            <?php
                                                // Executar a consulta para obter os dados
                                                $sql_vt = "SELECT id_funcionario, id_history AS max_id, nome_social
                                                FROM tb_history_cadastro
                                                WHERE (id_funcionario, id_history) IN (
                                                SELECT id_funcionario, MAX(id_history)
                                                FROM tb_history_cadastro
                                                GROUP BY id_funcionario
                                                );
                                                "; // Substitua "tabela" pelo nome correto da sua tabela
                                                $result_vt = $conn->query($sql_vt);

                                                // Verificar se há resultados e criar as opções
                                                if ($result_vt->num_rows > 0) {
                                                    while ($row = $result_vt->fetch_assoc()) {
                                                        $id_funcionario = $row["id_funcionario"];
                                                        $nome_social = $row["nome_social"];
                                                        // $visibilidade_vt = ($idVt == $id_vt) ? "selected" : "";

                                                        echo "<option value='$id_funcionario' >$id_funcionario - $nome_social</option>";
                                                    }
                                                } else {
                                                    // echo "<option value=''>Nenhum resultado encontrado</option>";
                                                }
                                                ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="idArea" class="form-label">Área</label>
                        <select type="text" class="form-control" id="idArea" name="idArea" data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>

                            <?php
                                    // Executar a consulta para obter os dados
                                    $sql_areas = "SELECT id_area, nome_area FROM aux_areas"; // Substitua "tabela" pelo nome correto da sua tabela
                                    $result_areas = $conn->query($sql_areas);

                                    // Verificar se há resultados e criar as opções
                                    if ($result_areas->num_rows > 0) {
                                        while ($row = $result_areas->fetch_assoc()) {
                                            $id_area = $row["id_area"];
                                            $nome_area = $row["nome_area"];
                                            $visibilidade_area = ($idArea == $id_area) ? "selected" : "";

                                            echo "<option value='$id_area' $visibilidade_area>$nome_area</option>";
                                        }
                                    } else {
                                        // echo "<option value=''>Nenhum resultado encontrado</option>";
                                    }
                                    ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="idOperacao" class="form-label">Operação</label>
                        <!-- <input type="text" class="form-control" id="idOperacao" name="idOperacao"
                            value="<?php echo $idOperacao; ?>"> -->
                        <select type="text" class="form-control" id="idOperacao" name="idOperacao"
                            data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>

                            <?php
                                    // Executar a consulta para obter os dados
                                    $sql_areas = "SELECT id_operacao, nome_operacao FROM aux_operacoes"; // Substitua "tabela" pelo nome correto da sua tabela
                                    $result_areas = $conn->query($sql_areas);

                                    // Verificar se há resultados e criar as opções
                                    if ($result_areas->num_rows > 0) {
                                        while ($row = $result_areas->fetch_assoc()) {
                                            $id_area = $row["id_operacao"];
                                            $nome_area = $row["nome_operacao"];
                                            $visibilidade_area = ($idOperacao == $id_area) ? "selected" : "";

                                            echo "<option value='$id_area' $visibilidade_area>$nome_area</option>";
                                        }
                                    } else {
                                        // echo "<option value=''>Nenhum resultado encontrado</option>";
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="idFilial" class="form-label">Filial</label>
                        <!-- <input type="text" class="form-control" id="idFilial" name="idFilial"
                            value="<?php echo $idFilial; ?>"> -->
                        <select type="text" class="form-control" id="idFilial" name="idFilial"
                            data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>

                            <?php
                                    // Executar a consulta para obter os dados
                                    $sql_areas = "SELECT id_filial, filial_nome FROM aux_filiais"; // Substitua "tabela" pelo nome correto da sua tabela
                                    $result_areas = $conn->query($sql_areas);

                                    // Verificar se há resultados e criar as opções
                                    if ($result_areas->num_rows > 0) {
                                        while ($row = $result_areas->fetch_assoc()) {
                                            $id_area = $row["id_filial"];
                                            $nome_area = $row["filial_nome"];
                                            $visibilidade_area = ($idFilial == $id_area) ? "selected" : "";

                                            echo "<option value='$id_area' $visibilidade_area>$nome_area</option>";
                                        }
                                    } else {
                                        // echo "<option value=''>Nenhum resultado encontrado</option>";
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="col-md-4">

                        <label for="tipoContrato" class="form-label">Tipo Contrato</label>
                        <!-- <input type="text" class="form-control" id="tipoContrato" name="tipoContrato"
                            value="<?php echo $tipoContrato; ?>"> -->
                        <select class="form-select" id="tipoContrato" name="tipoContrato" data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>
                            <option value="Indeterminado"
                                <?php if ($tipoContrato == "Indeterminado") echo "selected"; ?>>Indeterminado</option>
                            <option value="Determinado" <?php if ($tipoContrato == "Determinado") echo "selected"; ?>>
                                Determinado</option>
                            <option value="Temporário" <?php if ($tipoContrato == "Temporário") echo "selected"; ?>>
                                Temporário</option>
                            <option value="Home Office" <?php if ($tipoContrato == "Home Office") echo "selected"; ?>>
                                Home Office</option>
                            <option value="Estágio" <?php if ($tipoContrato == "Estágio") echo "selected"; ?>>Estágio
                            </option>
                            <option value="Experiência" <?php if ($tipoContrato == "Experiência") echo "selected"; ?>>
                                Experiência</option>
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">


                        <label for="tipoRegime" class="form-label">Tipo Regime</label>
                        <!-- <input type="text" class="form-control" id="tipoRegime" name="tipoRegime"
                            value="<?php echo $tipoRegime; ?>"> -->
                        <select class="form-select" id="tipoRegime" name="tipoRegime" data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>
                            <option value="CLT" <?php if ($tipoRegime == "CLT") echo "selected"; ?>>CLT</option>
                            <option value="PJ" <?php if ($tipoRegime == "PJ") echo "selected"; ?>>PJ</option>
                            <option value="Estágio" <?php if ($tipoRegime == "Estágio") echo "selected"; ?>>Estágio
                            </option>
                            <option value="Jovem Aprendiz"
                                <?php if ($tipoRegime == "Jovem Aprendiz") echo "selected"; ?>>
                                Jovem Aprendiz</option>
                            <option value="Temporária" <?php if ($tipoRegime == "Temporária") echo "selected"; ?>>
                                Temporária
                            </option>
                            <option value="Terceirização" <?php if ($tipoRegime == "Terceirização") echo "selected"; ?>>
                                Terceirização</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="tipoPonto" class="form-label">Tipo Ponto</label>
                        <!-- <input type="text" class="form-control" id="tipoPonto" name="tipoPonto"
                            value="<?php echo $tipoPonto; ?>"> -->
                        <select class="form-select" id="tipoPonto" name="tipoPonto" data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>
                            <option value="Manual" <?php if ($tipoPonto == "Manual") echo "selected"; ?>>Manual</option>
                            <option value="Mecânico" <?php if ($tipoPonto == "Mecânico") echo "selected"; ?>>Mecânico
                            </option>
                            <option value="Eletrônico " <?php if ($tipoPonto == "Eletrônico") echo "selected"; ?>>
                                Eletrônico </option>
                            <option value="Digital" <?php if ($tipoPonto == "Digital") echo "selected"; ?>>Digital
                            </option>


                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="sistemaPonto" class="form-label">Sistema Ponto</label>
                        <input type="text" class="form-control" id="sistemaPonto" name="sistemaPonto"
                            value="<?php echo $sistemaPonto; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="vlrSalario" class="form-label">Valor do Salário</label>
                        <input type="text" class="form-control" id="vlrSalario" name="vlrSalario"
                            value="<?php echo $vlrSalario; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="status" class="form-label">Status</label>
                        <!-- <input type="text" class="form-control" id="status" name="status"
                            value="<?php echo $status; ?>"> -->
                        <select class="form-select" id="status" name="status" data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                            <option value="">Selecione</option>
                            <option value="Ativo" <?php if ($status == "Ativo") echo "selected"; ?>>Ativo</option>
                            <option value="Férias" <?php if ($status == "Férias") echo "selected"; ?>>Férias</option>
                            <option value="Afastado" <?php if ($status == "Afastado") echo "selected"; ?>>Afastado
                            </option>
                            <option value="Desligado" <?php if ($status == "Desligado") echo "selected"; ?>>Desligado
                            </option>


                        </select>
                    </div>

                    <div class="col-md-4 d-none">
                        <label for="tipo_registro" class="form-label">tipo_registro</label>
                        <input type="text" class="form-control" id="tipo_registro" name="tipo_registro"
                            value="<?php echo $tipo; ?>">
                    </div>

                    <div class="col-md-4 d-none">
                        <label for="tipo_registro" class="form-label">tipo_registro</label>
                        <input type="text" class="form-control" id="tipo_registro" name="tipo_registro"
                            value="<?php echo $tipo; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="submitBtn_atualizacao_cadastral">Salvar
                    Atualização</button>
                <div id="message">Cadastre um funcionário primeiro.</div>

            </form>
        </div>

        <div class="tab-pane fade  show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">

            <form id="tipoForm" action="" method="GET" class="mt-0 mb-3">
                <div class="form-group d-inline-block align-middle">
                    <label for="tipoSelect">Selecione o tipo de cadastro</label>
                    <select id="tipoSelect" name="tipo" class="form-control">
                        <option value="cpf" <?php if ($tipo === 'cpf') echo 'selected'; ?>>CPF</option>
                        <option value="cnpj" <?php if ($tipo === 'cnpj') echo 'selected'; ?>>CNPJ</option>
                    </select>
                </div>
                <!-- <button type="submit" class="btn btn-primary align-middle">Enviar</button> -->
            </form>

            <?php if ($tipo == 'cpf')  {
                                    include 'include_cpf_novo.php';
                                } else {
                                    include 'include_cnpj_novo.php';
                                }



                                ?>
        </div>

        <div class="tab-pane fade" id="docs" role="tabpanel" aria-labelledby="docs-tab">
            <h3>Formulário para Anexar Documentos</h3>
            <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="documentos">Selecione os Documentos:</label>
                    <input type="file" class="form-control-file" id="documentos" name="documentos[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form> -->

            <form id="form_docs" action="pages/cadastro/enviar_documentos.php" method="post"
                enctype="multipart/form-data" class="mb-2 border-bottom">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="arquivoCPF">CPF:</label>
                        <input type="file" class="form-control" id="arquivoCPF" name="arquivoCPF" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="arquivoRG">RG:</label>
                        <input type="file" class="form-control" id="arquivoRG" name="arquivoRG" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="arquivoEndereco">Endereço:</label>
                        <input type="file" class="form-control" id="arquivoEndereco" name="arquivoEndereco" required>
                    </div>

                    <div class="col-md-4 d-none">
                        <label for="idFuncionario" class="form-label">Id Funcioanrio</label>
                        <input type="text" class="form-control" id="idFuncionario" name="idFuncionario"
                            value="<?php echo $id_funci; ?>" readonly>
                    </div>



                    <div class="col-md-3">

                        <button type="submit" class="btn btn-primary mt-4">Enviar</button>
                    </div>
                </div>
            </form>


            <h3>Outros Anexos</h3>

            <form id="form_docs" action="pages/cadastro/enviar_documentos.php" method="post"
                enctype="multipart/form-data" class="mb-2 border-bottom">
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="nomeArquivo">Nome do Arquivo:</label>
                        <input type="text" class="form-control" id="nomeArquivo" name="nomeArquivo" required>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label for="arquivoUpload">Arquivo:</label>
                        <input type="file" class="form-control" id="arquivoUpload" name="arquivoUpload" required>
                    </div>

                    <div class="col-md-4 d-none">
                        <label for="idFuncionario" class="form-label">Id Funcioanrio</label>
                        <input type="text" class="form-control" id="idFuncionario" name="idFuncionario"
                            value="<?php echo $id_funci; ?>" readonly>
                    </div>

                    <!-- Additional fields, if needed -->

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary mt-4">Enviar</button>
                    </div>
                </div>
            </form>




            <div class="mt-3" id="fileList"></div>

        </div>

        <div class="tab-pane fade" id="filhos" role="tabpanel" aria-labelledby="filhos-tab">

            <h3>Cadastro de Filhos</h3>
            <form class="form-inline" id="childForm" action="pages/cadastro/add/add_filho.php">
                <div class="row">
                <div class="col-md-5 d-none">
                        <label for="nome">tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $tipo ?>" required>
                    </div>
                    <div class="col-md-5">
                        <label for="nome">Nome do Filho:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="col-md-5">
                        <label for="data_nascimento">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                    </div>
                    <div class="col-md-5">
                        <label for="cpf">CPF do Filho:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>
                    <div class="col-md-5">
                        <label for="nome_mae">Nome da Mãe:</label>
                        <input type="text" class="form-control" id="nome_mae" name="nome_mae" required>
                    </div>
                    <!-- Adicione outros campos relevantes para o cadastro dos filhos aqui, como gênero, informações adicionais, etc. -->
                    <div class="col-md-4 d-none">
                        <label for="idFuncionario" class="form-label">Id Funcioanrio</label>
                        <input type="text" class="form-control" id="idFuncionario" name="idFuncionario"
                            value="<?php echo $id_funci; ?>" readonly>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary ml-2">Adicionar Filho</button>
                    </div>
                </div>
            </form>

            <div id="childList" class="mt-5"></div>


        </div>

        <div class="tab-pane fade" id="conjuge" role="tabpanel" aria-labelledby="conjuge-tab">
            <h3>Dados do Cônjuge</h3>
            <form class="form-inline" id="conjugeform" action="pages/cadastro/add/add_conjuge.php" method="post">
                <div class="row">
                <div class="col-md-5 d-none">
                        <label for="nome">tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $tipo ?>" required>
                    </div>
                    <div class="col-md-5">
                        <label for="nome_completo">Nome Completo:</label>
                        <input type="text" class="form-control" id="nome_completo" name="nome_completo" required>
                    </div>
                    <div class="col-md-5">
                        <label for="data_nascimento">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                    </div>
                    <div class="col-md-5">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>
                    <div class="col-md-5">
                        <label for="telefone_contato">Telefone de Contato:</label>
                        <input type="tel" class="form-control" id="telefone_contato" name="telefone_contato" required>
                    </div>
                    <div class="col-md-5">
                        <label for="email_contato">E-mail de Contato:</label>
                        <input type="email" class="form-control" id="email_contato" name="email_contato" required>
                    </div>
                    <!-- Add other relevant fields for the child's registration here, like gender, additional information, etc. -->
                    <div class="col-md-4 d-none">
                        <label for="idFuncionario" class="form-label">Id Funcionario</label>
                        <input type="text" class="form-control" id="idFuncionario" name="idFuncionario"
                            value="<?php echo $id_funci; ?>" readonly>
                    </div>
                    <div class="col-md-2 mt-4">
                        <button type="submit" class="btn btn-primary ml-2">Adicionar Cônjuge</button>
                    </div>
                </div>
            </form>

            <div id="conjugeList" class="mt-5"></div>

            <!-- <div class="mt-5">
                <h2>Cônjuge</h2>
                <ul class="list-group">
                    <li class="list-group-item">Cônjuge: João Silva - Data de Nascimento: 01/01/1980</li>


                </ul>
            </div> -->

        </div>

        <div class="tab-pane fade " id="banco" role="tabpanel" aria-labelledby="banco-tab">
            <div class="d-flex flex-wrap">
                <div class="row flex-fill">
                    <div class="col-md-12 mb-2">



                        <h3> Formulário banco</h3>



                        <form id="banco_user" action="pages/cadastro/add/add_banco.php" method="post">
                            <div class="row">
                                <div class="col-md-4 d-none">
                                    <div class="form-group">
                                        <label for="idFuncionario" class="form-label">Id Funcionario</label>
                                        <input type="text" class="form-control" id="idFuncionario" name="idFuncionario"
                                            value="<?php echo $id_funci; ?>" readonly>
                                    </div>

                                    <div class="col-md-5 d-none">
                        <label for="nome">tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $tipo ?>" required>
                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="pix_tipo">PIX Tipo:</label>
                                        <select class="form-control" id="pix_tipo" name="pix_tipo" required>
                                            <option value="">Selecionar tipo de Chave</option>
                                            <option value="CPF">CPF</option>
                                            <option value="CNPJ">CNPJ</option>
                                            <option value="Email">E-mail</option>
                                            <option value="Telefone">Número de telefone celular</option>
                                            <option value="ChaveAleatoria">Chave aleatória</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="pix_identificacao">PIX
                                            Identificação:</label>
                                        <input type="text" class="form-control" id="pix_identificacao"
                                            name="pix_identificacao" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="banco_tipo_conta">Banco Tipo de
                                            Conta:</label>
                                        <select class="form-control" id="banco_tipo_conta" name="banco_tipo_conta"
                                            required>
                                            <option value="">Selecione um tipo de conta</option>
                                            <option value="Conta Corrente">Conta Corrente</option>
                                            <option value="Conta Poupança">Conta Poupança</option>
                                            <option value="Conta Salário">Conta Salário</option>
                                            <option value="Conta Conjunta">Conta Conjunta</option>
                                            <option value="Conta de Investimento">Conta de Investimento</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="banco_numero">Banco Número:</label>
                                        <input type="text" class="form-control" id="banco_numero" name="banco_numero"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="banco_nome">Banco Nome:</label>
                                        <input type="text" class="form-control" id="banco_nome" name="banco_nome"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="banco_agencia">Banco Agência:</label>
                                        <input type="text" class="form-control" id="banco_agencia" name="banco_agencia"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="banco_dv_agencia">Banco DV
                                            Agência:</label>
                                        <input type="text" class="form-control" id="banco_dv_agencia"
                                            name="banco_dv_agencia" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="banco_conta">Banco Conta:</label>
                                        <input type="text" class="form-control" id="banco_conta" name="banco_conta"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="banco_dv_conta">Banco DV Conta:</label>
                                        <input type="text" class="form-control" id="banco_dv_conta"
                                            name="banco_dv_conta" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label mt-4" for="habilitado">Habilitado:</label>
                                        <input type="checkbox" id="habilitado" name="habilitado">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label mt-4" for="preferencial">Preferencial:</label>
                                        <input type="checkbox" id="preferencial" name="preferencial">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>




                    </div>
                    <div id="bancolist" class="mt-5"></div>


                </div>
            </div>
        </div>

        <div class="tab-pane fade " id="login" role="tabpanel" aria-labelledby="login-tab">
            <h3>Login</h3>
            <form id="login_user" action="pages/cadastro/add/add_login.php" method="post">
                <div class="col-md-4 d-none">
                    <div class="form-group">
                        <label for="idFuncionario" class="form-label">Id Funcionario</label>
                        <input type="text" class="form-control" id="idFuncionario" name="idFuncionario"
                            value="<?php echo $id_funci; ?>" readonly>
                    </div>

                    <div class="col-md-5">
                        <label for="nome">tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $tipo ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Login" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="selectSistemas">Select de Sistemas</label>
                        <select class="form-control" id="selectSistemas" name="selectSistemas" required>
                            <option value="">Selecione um sistema</option>
                            <?php
                                            // Executar a consulta para obter os dados
                                            $sql_sistemas = "SELECT id_sistema, nome_sistema
                                            FROM aux_sistemas

                                            ;
                                            "; // Substitua "tabela" pelo nome correto da sua tabela
                                            $result_sistemas = $conn->query($sql_sistemas);

                                            // Verificar se há resultados e criar as opções
                                            if ($result_sistemas->num_rows > 0) {
                                                while ($row = $result_sistemas->fetch_assoc()) {
                                                    $id_funcionario = $row["id_sistema"];
                                                    $nome_social = $row["nome_sistema"];
                                                    // $visibilidade_vt = ($idVt == $id_vt) ? "selected" : "";

                                                    echo "<option value='$id_funcionario' >$nome_social</option>";
                                                }
                                            } else {
                                                // echo "<option value=''>Nenhum resultado encontrado</option>";
                                            }
                                            ?>
                        </select>
                    </div>
                    <!-- Adicione aqui o terceiro input da mesma maneira -->
                    <!-- Por exemplo, um campo de e-mail -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label mt-4" for="habilitado">Habilitado:</label>
                            <input type="checkbox" id="habilitado" name="habilitado">
                        </div>
                    </div>

                </div>
                <!-- Adicione mais form-row aqui para mais linhas de inputs, se necessário -->
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>
            <div id="loginList" class="mt-5"></div>
        </div>

        <div class="tab-pane fade " id="linha" role="tabpanel" aria-labelledby="linha-tab">
            <h3>Status</h3>
            <form id="form_status" action="pages/cadastro/add/add_status.php" method="post">

            <div class="row mb-2">
            <div class="form-group d-none">
                        <label for="idFuncionario" class="form-label">Id Funcionario</label>
                        <input type="text" class="form-control" id="idFuncionario" name="idFuncionario"
                            value="<?php echo $id_funci; ?>" readonly>
                    </div>

                    <div class="col-md-5 d-none">
                        <label for="nome">tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $tipo ?>" required>
                    </div>

                <div class="col-md-4">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                    <option value="Ativo" <?php if ($status == "Ativo") echo "selected"; ?>>Ativo</option>
                            <option value="Férias" <?php if ($status == "Férias") echo "selected"; ?>>Férias</option>
                            <option value="Afastado" <?php if ($status == "Afastado") echo "selected"; ?>>Afastado
                            </option>
                            <option value="Treinamento" <?php if ($status == "Treinamento") echo "selected"; ?>>Treinamento
                            </option>
                            <option value="Desligado" <?php if ($status == "Desligado") echo "selected"; ?>>Desligado
                            </option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="data_inicio">Data de Início:</label>
                    <input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
                </div>

                <div class="col-md-4">
                    <label for="data_fim">Data de Término:</label>
                    <input type="date" class="form-control" id="data_fim" name="data_fim">
                </div>


            </div>

            <button class="btn btn-primary" type="submit">Enviar</button>
            </form>
            <div id="statuslist" class="mt-5"></div>
        </div>

        <div class="tab-pane fade " id="historico" role="tabpanel" aria-labelledby="historico-tab">

            <div class="d-flex pb-4 mt-3 border-bottom border-dashed border-300 align-items-end">
                <h3 class="flex-1 mb-0">Histórico</h3>
            </div>
            <div class="py-3 border-bottom border-dashed">
                <div id="tableExample2" data-list='{"valueNames":["cpf","email","age"],"page":10,"pagination":true}'>
                    <div class="table-responsive ms-n1 ps-1 scrollbar">
                        <table class="table table-striped table-sm fs--1 mb-0">
                            <thead>
                                <tr>

                                    <th class="sort border-top " data-sort="id_funcionario">Funcionário</th>
                                    <th class="sort border-top " data-sort="cpf">CPF</th>
                                    <th class="sort border-top " data-sort="nome_social">Nome Social</th>
                                    <th class="sort border-top " data-sort="nome_registro">Nome Registro</th>
                                    <th class="sort border-top " data-sort="sexo">Sexo</th>
                                    <th class="sort border-top " data-sort="genero">Gênero</th>
                                    <th class="sort border-top " data-sort="estado_civil">Estado Civil</th>
                                    <th class="sort border-top " data-sort="id_cargo">Cargo</th>
                                    <th class="sort border-top " data-sort="id_vt">VT</th>
                                    <th class="sort border-top " data-sort="id_superior">Superior</th>
                                    <th class="sort border-top " data-sort="id_area">Área</th>
                                    <th class="sort border-top " data-sort="id_operacao">Operação</th>
                                    <th class="sort border-top " data-sort="id_filial">Filial</th>

                                </tr>
                            </thead>
                            <tbody class="list fs--1">
                            <!-- <?php echo $tipo ?> -->
                                <?php
                                // echo $id_funci;
                                    // if (isset($id_funci)) {
                                        // Recupere os dados do MySQL
                                        $sql_tab2 = "SELECT *, ac.cargo_nome, vt.vt_nome, aa.nome_area, ao.nome_operacao, af.filial_nome FROM tb_history_cadastro AS thc
                                        LEFT JOIN  funcionarios AS f ON f.idFuncionario = thc.id_funcionario
                                        LEFT JOIN aux_cargos AS ac ON ac.id_cargo = thc.id_cargo
                                        LEFT join aux_vt AS vt ON vt.id_vt = thc.id_vt
                                        LEFT JOIN aux_areas AS aa ON aa.id_area = thc.id_area
                                        LEFT JOIN aux_operacoes AS ao ON ao.id_operacao = thc.id_operacao
                                        LEFT JOIN aux_filiais AS af ON af.id_filial = thc.id_filial




                                        WHERE id_funcionario = $id_funci and tipo_registro = '$tipo'";

                                        // echo $sql_tab2;

                                        $result_tab2 = $conn->query($sql_tab2);

                                        // Preencha a tabela com os dados
                                        if ($result_tab2->num_rows > 0) {
                                            while ($row = $result_tab2->fetch_assoc()) {
                                                echo '<tr>';

                                                echo '<td class="align-middle cpf">' . $row['nome_social'] . '</td>';
                                                echo '<td class="align-middle">' . $row['cpf'] . '</td>';
                                                echo '<td class="align-middle">' . $row['nome_social'] . '</td>';
                                                echo '<td class="align-middle">' . $row['nome_registro'] . '</td>';
                                                echo '<td class="align-middle">' . $row['sexo'] . '</td>';
                                                echo '<td class="align-middle">' . $row['genero'] . '</td>';
                                                echo '<td class="align-middle">' . $row['estado_civil'] . '</td>';
                                                echo '<td class="align-middle">' . $row['cargo_nome'] . '</td>';
                                                echo '<td class="align-middle">' . $row['vt_nome'] . '</td>';
                                                echo '<td class="align-middle">' . $row['id_superior'] . '</td>';
                                                echo '<td class="align-middle">' . $row['nome_area'] . '</td>';
                                                echo '<td class="align-middle">' . $row['nome_operacao'] . '</td>';
                                                echo '<td class="align-middle">' . $row['filial_nome'] . '</td>';

                                                echo '</tr>';
                                            }
                                        } else {
                                            echo '<tr><td colspan="4">Nenhum registro encontrado.</td></tr>';
                                        }
                                    // }
                                    ?>


                            </tbody>

                        </table>
                    </div>

                </div>

            </div>

        </div>




    </div>
</div>








<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



<script>
$(document).ready(function() {
    $("#form").submit(function(e) {
        e.preventDefault(); // Impede que o formulário seja enviado normalmente

        // Verifica se todos os campos estão preenchidos
        var allFieldsFilled = true;
        var emptyFields = "";

        $("#form input, #form select").each(function() {
            if ($(this).val() === "" && !$(this).hasClass("choices__input")) {
                allFieldsFilled = false;
                emptyFields += $(this).attr("name") + ", ";
            }
        });

        if (!allFieldsFilled) {
            emptyFields = emptyFields.slice(0, -2);
            Swal.fire({
                title: 'Campos vazios',
                text: 'Por favor, preencha todos os campos do formulário. Campos vazios: ' +
                    emptyFields,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        var formData = $(this).serialize();

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
                    var id_funci = <?php echo $id_funci ?>;
                    var tipo = <?php echo json_encode($tipo) ?>;
                    Swal.fire({
                        title: 'Parabéns',
                        text: 'Usuário Atualizado com sucesso!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirecionar para a página 'palitagens.php' após sucesso
                            location.href = 'content_pages.php?id=10&id_func=' +
                                id_funci + '&tipo=' + tipo;
                        }
                    });
                }
            }
        });
    });
});
</script>



<script>
document.getElementById('tipoForm').addEventListener('change', function(event) {
    event.preventDefault(); // Impede o envio do formulário padrão
    var tipo = document.getElementById('tipoSelect').value;
    var currentUrl = window.location.href;
    var separator = currentUrl.includes('?') ? '&' : '?';
    var newUrl = currentUrl + separator + 'tipo=' + tipo;
    window.location.href = newUrl;
});
</script>

<?php
// Your PHP code that sets the value of $id_funci
 // Replace this with your actual PHP code

// Echo the value of $id_funci so that JavaScript can access it
echo '<script>var $id_funci = ' . json_encode($id_funci) . ';</script>';
?>

<script>
$(document).ready(function() {
    // The value of $id_funci is now accessible here
    if ($id_funci === null || $id_funci === "" || $id_funci === "invalid") {
        // Show the message
        $("#message").show();

        // Disable the button
        $("#submitBtn_atualizacao_cadastral").prop("disabled", true);
    } else if ($id_funci > 0) {
        // If id_funci is greater than 0, hide the message and enable the button
        $("#message").hide();
        $("#submitBtn_atualizacao_cadastral").prop("disabled", false);
    }
});
</script>




<script>
$(document).ready(function() {
    // Function to handle form submission
    $("#form_docs").submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Get form data

        $.ajax({
            url: $(this).attr("action"), // URL to handle form submission
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                // On success, update the file list
                updateFileList();
            },
            error: function(xhr, status, error) {
                // Handle error if necessary
                console.error(error);
            }
        });
    });

    // Function to update the file list after form submission
    function updateFileList() {
        var idUsuario = $("#idFuncionario")
            .val(); // Get the ID of the user (assuming it's stored in #idFuncioanrio)
        var fileListContainer = $("#fileList");

        // Make an AJAX request to get the related files based on the user ID
        $.ajax({
            url: "pages/cadastro/list/get_user_files.php", // Replace with the PHP script to fetch user files based on ID
            type: "POST",
            data: {
                id_usuario: idUsuario
            },
            success: function(data) {
                // On success, update the file list container
                fileListContainer.html(data);
            },
            error: function(xhr, status, error) {
                // Handle error if necessary
                console.error(error);
            }
        });
    }

    // Initial file list update (if needed)
    updateFileList();
});
</script>

<script>
$(document).ready(function() {
    // Function to handle form submission
    $("#childForm").submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Get form data

        $.ajax({
            url: $(this).attr("action"), // URL to handle form submission
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                // On success, update the file list
                updateFilhoList();
            },
            error: function(xhr, status, error) {
                // Handle error if necessary
                console.error(error);
            }
        });
    });

    // Function to update the file list after form submission
    function updateFilhoList() {
        var idUsuario = $("#idFuncionario").val(); // Get the ID of the user (assuming it's stored in #idFuncioanrio)

        var tipo = $("#tipo").val()
        var fileListContainer = $("#childList");

        // Make an AJAX request to get the related files based on the user ID
        $.ajax({
            url: "pages/cadastro/list/filhos.php", // Replace with the PHP script to fetch user files based on ID
            type: "POST",
            data: {
                id_usuario: idUsuario,
                tipo: tipo // Aqui, estamos passando o valor de "tipo" como parte dos dados
            },
            success: function(data) {
                // On success, update the file list container
                fileListContainer.html(data);
            },
            error: function(xhr, status, error) {
                // Handle error if necessary
                console.error(error);
            }
        });
    }

    // Initial file list update (if needed)
    updateFilhoList();
});
</script>


<script>
$(document).ready(function() {
    // Function to handle form submission
    $("#conjugeform").submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Get form data

        $.ajax({
            url: $(this).attr("action"), // URL to handle form submission
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                // On success, update the file list
                updateConjugeList();
            },
            error: function(xhr, status, error) {
                // Handle error if necessary
                console.error(error);
            }
        });
    });

    // Function to update the file list after form submission
    function updateConjugeList() {
        var idUsuario = $("#idFuncionario")
            .val(); // Get the ID of the user (assuming it's stored in #idFuncioanrio)
            var tipo = $("#tipo").val()
        var fileListContainer = $("#conjugeList");

        // Make an AJAX request to get the related files based on the user ID
        $.ajax({
            url: "pages/cadastro/list/conjuge.php", // Replace with the PHP script to fetch user files based on ID
            type: "POST",
            data: {
                id_usuario: idUsuario,
                tipo: tipo
            },
            success: function(data) {
                // On success, update the file list container
                fileListContainer.html(data);
            },
            error: function(xhr, status, error) {
                // Handle error if necessary
                console.error(error);
            }
        });
    }

    // Initial file list update (if needed)
    updateConjugeList();
});
</script>



<script>
$(document).ready(function() {
    // Function to handle form submission
    $("#banco_user").submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Get form data

        $.ajax({
            url: $(this).attr("action"), // URL to handle form submission
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                // On success, update the file list
                updateBancoList();
            },
            error: function(xhr, status, error) {
                // Handle error if necessary
                console.error(error);
            }
        });
    });

    // Function to update the file list after form submission
    function updateBancoList() {
        var idUsuario = $("#idFuncionario")
            .val(); // Get the ID of the user (assuming it's stored in #idFuncioanrio)
            var tipo = $("#tipo").val()
        var fileListContainer = $("#bancolist");

        // Make an AJAX request to get the related files based on the user ID
        $.ajax({
            url: "pages/cadastro/list/banco.php", // Replace with the PHP script to fetch user files based on ID
            type: "POST",
            data: {
                id_usuario: idUsuario,
                tipo:tipo
            },
            success: function(data) {
                // On success, update the file list container
                fileListContainer.html(data);
            },
            error: function(xhr, status, error) {
                // Handle error if necessary
                console.error(error);
            }
        });
    }

    // Initial file list update (if needed)
    updateBancoList();
});
</script>


<script>
$(document).ready(function() {
    // Function to handle form submission
    $("#login_user").submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Get form data

        $.ajax({
            url: $(this).attr("action"), // URL to handle form submission
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                // On success, update the file list
                updateLoginList();
            },
            error: function(xhr, status, error) {
                // Handle error if necessary
                console.error(error);
            }
        });
    });

    // Function to update the file list after form submission
    function updateLoginList() {
        var idUsuario = $("#idFuncionario")
            .val(); // Get the ID of the user (assuming it's stored in #idFuncioanrio)
            var tipo = $("#tipo").val()
        var fileListContainer = $("#loginList");

        // Make an AJAX request to get the related files based on the user ID
        $.ajax({
            url: "pages/cadastro/list/login.php", // Replace with the PHP script to fetch user files based on ID
            type: "POST",
            data: {
                id_usuario: idUsuario,
                tipo: tipo
            },
            success: function(data) {
                // On success, update the file list container
                fileListContainer.html(data);
            },
            error: function(xhr, status, error) {
                // Handle error if necessary
                console.error(error);
            }
        });
    }

    // Initial file list update (if needed)
    updateLoginList();
});
</script>




<script>
$(document).ready(function() {
    // Function to handle form submission
    $("#form_status").submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Get form data

        $.ajax({
            url: $(this).attr("action"), // URL to handle form submission
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                // On success, update the file list
                updateStatusList();
            },
            error: function(xhr, status, error) {
                // Handle error if necessary
                console.error(error);
            }
        });
    });

    // Function to update the file list after form submission
    function updateStatusList() {
        var idUsuario = $("#idFuncionario")
            .val(); // Get the ID of the user (assuming it's stored in #idFuncioanrio)
            var tipo = $("#tipo").val()
        var fileListContainer = $("#statuslist");

        // Make an AJAX request to get the related files based on the user ID
        $.ajax({
            url: "pages/cadastro/list/status.php", // Replace with the PHP script to fetch user files based on ID
            type: "POST",
            data: {
                id_usuario: idUsuario,
                tipo: tipo
            },
            success: function(data) {
                // On success, update the file list container
                fileListContainer.html(data);
            },
            error: function(xhr, status, error) {
                // Handle error if necessary
                console.error(error);
            }
        });
    }

    // Initial file list update (if needed)
    updateStatusList();
});
</script>