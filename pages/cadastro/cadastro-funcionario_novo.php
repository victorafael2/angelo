<?php

// $id_funci = $_GET['id_func'];

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 'cpf';


// Query SQL para obter os dados existentes no banco de dados
// $query_history = "SELECT * FROM tb_history_cadastro where id_funcionario = $id_funci ORDER BY id_history DESC LIMIT 1";
// $result_history = mysqli_query($conn, $query_history);
// $row = mysqli_fetch_assoc($result_history);

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




if ($tipo == 'cpf') {
    // Query SQL para obter os dados existentes no banco de dados
    // $query_cadastro = "SELECT * FROM funcionarios WHERE idfuncionario = $id_funci";
    // $result_cadastro = mysqli_query($conn, $query_cadastro);
    // $row = mysqli_fetch_assoc($result_cadastro);

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

} else {
    // Use a different variable name for the else block
    // $query_cadastro_cnpj = "SELECT * FROM funcionarios_cnpj WHERE id = $id_funci";
    // $result_cadastro_cnpj = mysqli_query($conn, $query_cadastro_cnpj);
    // $row_cnpj = mysqli_fetch_assoc($result_cadastro_cnpj);


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


}


?>

<form id="tipoForm" action="" method="GET" class="mt-4">
    <div class="form-group d-inline-block align-middle">
        <label for="tipoSelect">Selecione o tipo de cadastro</label>
        <select id="tipoSelect" name="tipo" class="form-control">
            <option value="cpf" <?php if ($tipo === 'cpf') echo 'selected'; ?>>CPF</option>
            <option value="cnpj" <?php if ($tipo === 'cnpj') echo 'selected'; ?>>CNPJ</option>
        </select>
    </div>
    <!-- <button type="submit" class="btn btn-primary align-middle">Enviar</button> -->
</form>

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
            <a class="nav-link " id="docs-tab" data-toggle="tab" href="#docs" role="tab" aria-controls="docs"
                aria-selected="true">8. Acessos</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " id="docs-tab" data-toggle="tab" href="#docs" role="tab" aria-controls="docs"
                aria-selected="true">9. Adicionais</a>
        </li>




    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
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
                        <label for="idCargo" class="form-label">ID Cargo</label>
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
                    <div class="col-md-4">
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

                    <div class="col-md-4">
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
                    <div class="col-md-4">
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
                    <div class="col-md-4">
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
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>



        <?php if ($tipo == 'cpf')  {
                            include 'include_cpf_novo.php';
                        } else {
                            include 'include_cnpj_novo.php';
                        }



                        ?>



        <div class="tab-pane fade" id="docs" role="tabpanel" aria-labelledby="docs-tab">
            <h2>Formulário para Anexar Documentos</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="documentos">Selecione os Documentos:</label>
                    <input type="file" class="form-control-file" id="documentos" name="documentos[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>



        </div>


        <div class="tab-pane fade" id="filhos" role="tabpanel" aria-labelledby="filhos-tab">

            <h1>Cadastro de Filhos</h1>
            <form>
                <div class="form-group">
                    <label for="nome">Nome do Filho:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                </div>
                <!-- Adicione outros campos relevantes para o cadastro dos filhos aqui, como gênero, informações adicionais, etc. -->

                <button type="submit" class="btn btn-primary">Adicionar Filho</button>
            </form>
            <!-- Lista de filhos adicionados (substitua esse exemplo pelo código que gerencia a exibição dos filhos cadastrados) -->
            <div class="mt-5">
                <h2>Lista de Filhos Cadastrados:</h2>
                <ul class="list-group">
                    <li class="list-group-item">Filho 1 - Data de Nascimento: 01/01/2010</li>
                    <li class="list-group-item">Filho 2 - Data de Nascimento: 05/06/2015</li>
                    <!-- Use JavaScript para exibir dinamicamente a lista de filhos cadastrados -->
                </ul>
            </div>
        </div>


        <div class="tab-pane fade" id="conjuge" role="tabpanel" aria-labelledby="conjuge-tab">
            <h2>Dados do Cônjuge</h2>
            <form>
                <div class="form-group">
                    <label for="nome_conjuge">Nome do Cônjuge:</label>
                    <input type="text" class="form-control" id="nome_conjuge" name="nome_conjuge" required>
                </div>
                <div class="form-group">
                    <label for="data_nascimento_conjuge">Data de Nascimento do Cônjuge:</label>
                    <input type="date" class="form-control" id="data_nascimento_conjuge" name="data_nascimento_conjuge"
                        required>
                </div>
                <div class="form-group">
                    <label for="genero_conjuge">Gênero do Cônjuge:</label>
                    <select class="form-control" id="genero_conjuge" name="genero_conjuge" required>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>
            </form>

            <div class="mt-5">
                <h2>Cônjuge</h2>
                <ul class="list-group">
                    <li class="list-group-item">Cônjuge: João Silva - Data de Nascimento: 01/01/1980</li>

                    <!-- Use JavaScript para exibir dinamicamente a lista de famílias cadastradas -->
                </ul>
            </div>

        </div>


        <div class="tab-pane fade " id="banco" role="tabpanel" aria-labelledby="banco-tab">
            <div class="d-flex flex-wrap">
                <div class="row flex-fill">
                    <div class="col-md-12 mb-2">
                        <div class="card">
                            <div class="card-header">

                                Formulário banco

                            </div>
                            <div class="card-body">
                                <form id="banco">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="id_funcionario">Funcionário:</label>
                                                <select type="text" class="form-control" id="id_funcionario"
                                                    name="id_funcionario" data-choices="data-choices"
                                                    data-options='{"removeItemButton":true,"placeholder":true}'>
                                                    <option value="">Selecione</option>
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

                                                    echo "<option value='$id_funcionario' >$nome_social</option>";
                                                }
                                            } else {
                                                // echo "<option value=''>Nenhum resultado encontrado</option>";
                                            }
                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="data">Data:</label>
                                                <input type="date" class="form-control" id="data" name="data" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="pix_tipo">PIX Tipo:</label>
                                                <input type="text" class="form-control" id="pix_tipo" name="pix_tipo"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="pix_identificacao">PIX
                                                    Identificação:</label>
                                                <input type="text" class="form-control" id="pix_identificacao"
                                                    name="pix_identificacao" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="banco_numero">Banco Número:</label>
                                                <input type="text" class="form-control" id="banco_numero"
                                                    name="banco_numero" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="banco_nome">Banco Nome:</label>
                                                <input type="text" class="form-control" id="banco_nome"
                                                    name="banco_nome" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="banco_tipo_conta">Banco Tipo de
                                                    Conta:</label>
                                                <input type="text" class="form-control" id="banco_tipo_conta"
                                                    name="banco_tipo_conta" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="banco_agencia">Banco Agência:</label>
                                                <input type="text" class="form-control" id="banco_agencia"
                                                    name="banco_agencia" required>
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
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="banco_conta">Banco Conta:</label>
                                                <input type="text" class="form-control" id="banco_conta"
                                                    name="banco_conta" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="banco_dv_conta">Banco DV Conta:</label>
                                                <input type="text" class="form-control" id="banco_dv_conta"
                                                    name="banco_dv_conta" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="habilitado">Habilitado:</label>
                                                <input type="checkbox" id="habilitado" name="habilitado">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="preferencial">Preferencial:</label>
                                                <input type="checkbox" id="preferencial" name="preferencial">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <!-- Empty div to offset the last row and keep the button centered -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Itens Cadastrados
                            </div>
                            <div class="card-body">
                                <div id="tableExample2"
                                    data-list='{"valueNames":["id","email","age"],"page":5,"pagination":true}'>
                                    <div class="table-responsive ms-n1 ps-1 scrollbar">
                                        <table class="table table-striped table-sm fs--1 mb-0">
                                            <thead>
                                                <tr>

                                                    <th class="sort border-top " data-sort="id">ID</th>
                                                    <th class="sort border-top " data-sort="nome_sistema">Funcionario
                                                    </th>
                                                    <th class="sort border-top " data-sort="habilitado">Pix Tipo</th>
                                                    <th class="sort border-top " data-sort="habilitado">Pix
                                                        identificação</th>
                                                    <th class="sort border-top " data-sort="habilitado">Banco</th>
                                                    <th class="sort border-top " data-sort="habilitado">Tipo de Conta
                                                    </th>
                                                    <th class="sort border-top " data-sort="habilitado">Habilitado</th>
                                                    <th class="sort border-top " data-sort="habilitado">Preferencial
                                                    </th>
                                                    <th class="sort border-top ">Apagar</th>


                                                </tr>
                                            </thead>
                                            <tbody id="table_body_bancos" class="list">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button class="page-link" data-list-pagination="prev"><span
                                                class="fas fa-chevron-left"></span></button>
                                        <ul class="mb-0 pagination"></ul>
                                        <button class="page-link pe-0" data-list-pagination="next"><span
                                                class="fas fa-chevron-right"></span></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="tab-pane fade " id="login" role="tabpanel" aria-labelledby="login-tab">

            <form>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="campoTexto">Login</label>
                        <input type="text" class="form-control" id="campoTexto" placeholder="Login" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="selectSistemas">Select de Sistemas</label>
                        <select class="form-control" id="selectSistemas" required>
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
                    <div class="col-md-12 mb-3">
                        <label for="campoEmail">Campo de E-mail</label>
                        <input type="email" class="form-control" id="campoEmail" placeholder="Digite seu e-mail"
                            required>
                    </div>
                </div>
                <!-- Adicione mais form-row aqui para mais linhas de inputs, se necessário -->
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>

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
        var emptyFields = ""; // Variável para armazenar os nomes dos campos vazios

        $("#form input, #form select").each(function() {
            if ($(this).val() === "" && !$(this).hasClass("choices__input")) {
                allFieldsFilled = false;
                emptyFields += $(this).attr("name") +
                    ", "; // Adiciona o nome do campo vazio à variável
            }
        });

        if (!allFieldsFilled) {
            emptyFields = emptyFields.slice(0, -2); // Remove a vírgula e o espaço no final da string
            Swal.fire({
                title: 'Campos vazios',
                text: 'Por favor, preencha todos os campos do formulário. Campos vazios: ' +
                    emptyFields,
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
                            window.location.reload(); // Recarrega a página
                        }
                    });
                }
            }
        });
    });
});
</script>


<script>
$(document).ready(function() {
    $("#form_2").submit(function(e) {
        e.preventDefault(); // Impede que o formulário seja enviado normalmente

        // Verifica se todos os campos estão preenchidos
        var allFieldsFilled = true;
        var emptyFields = ""; // Variável para armazenar os nomes dos campos vazios

        $("#form_2 input, #form_2 select").each(function() {
            if ($(this).val() === "" && !$(this).hasClass("choices__input")) {
                allFieldsFilled = false;
                emptyFields += $(this).attr("name") +
                    ", "; // Adiciona o nome do campo vazio à variável
            }
        });

        if (!allFieldsFilled) {
            emptyFields = emptyFields.slice(0, -2); // Remove a vírgula e o espaço no final da string
            Swal.fire({
                title: 'Campos vazios',
                text: 'Por favor, preencha todos os campos do formulário. Campos vazios: ' +
                    emptyFields,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return; // Interrompe a submissão do formulário
        }

        var formData = $(this).serialize(); // Serializa os dados do formulário
        console.log(formData); // Exibe os dados serializados no console

        $.ajax({
            type: "POST",
            url: "pages/cadastro/update/update_usuario.php",
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
                            window.location.reload(); // Recarrega a página
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