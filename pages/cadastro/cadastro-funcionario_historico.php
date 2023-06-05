<?php

$id_funci = $_GET['id_func'];


// Query SQL para obter os dados existentes no banco de dados
$query_history = "SELECT * FROM tb_history_cadastro where id_funcionario = $id_funci ORDER BY id_history DESC LIMIT 1";
$result_history = mysqli_query($conn, $query_history);
$row = mysqli_fetch_assoc($result_history);

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






// Query SQL para obter os dados existentes no banco de dados
$query_cadastro = "SELECT * FROM funcionarios where idfuncionario = $id_funci ";
$result_cadastro = mysqli_query($conn, $query_cadastro);
$row = mysqli_fetch_assoc($result_cadastro);

// Preenche os campos com os dados existentes no banco, se houver
$idFuncionario = $row["idFuncionario"];
$dataCadastro = $row["dataCadastro"];
$cpf = $row["cpf"];
$dataAdmissao = $row["dataAdmissao"];
$dataDemissao = $row["dataDemissao"];
$dataNascimento = $row["dataNascimento"];
$rgNumero = $row["rgNumero"];
$rgEmissor = $row["rgEmissor"];
$rgUF = $row["rgUF"];
$rgDataEmissao = $row["rgDataEmissao"];
$cnhNumero = $row["cnhNumero"];
$cnhTipo = $row["cnhTipo"];
$ctpsNumero = $row["ctpsNumero"];
$ctpsSerie = $row["ctpsSerie"];
$ctpsDataEmissao = $row["ctpsDataEmissao"];
$ctpsUF = $row["ctpsUF"];
$pisNumero = $row["pisNumero"];
$eSocial = $row["eSocial"];
$sigilo = $row["sigilo"];
$created = $row["created"];


?>

<div class="container mt-5">
    <ul class="nav nav-tabs" id="myTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1"
                aria-selected="true">Cadastrar Atualização</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2"
                aria-selected="false">Cadastro</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
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
                        <label for="idSuperior" class="form-label">ID Superior</label>
                        <input type="text" class="form-control" id="idSuperior" name="idSuperior"
                            value="<?php echo $idSuperior; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="idArea" class="form-label">ID Área</label>
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
                        <label for="idOperacao" class="form-label">ID Operação</label>
                        <input type="text" class="form-control" id="idOperacao" name="idOperacao"
                            value="<?php echo $idOperacao; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="idFilial" class="form-label">ID Filial</label>
                        <input type="text" class="form-control" id="idFilial" name="idFilial"
                            value="<?php echo $idFilial; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="tipoRegime" class="form-label">Tipo Regime</label>
                        <input type="text" class="form-control" id="tipoRegime" name="tipoRegime"
                            value="<?php echo $tipoRegime; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="tipoContrato" class="form-label">Tipo Contrato</label>
                        <input type="text" class="form-control" id="tipoContrato" name="tipoContrato"
                            value="<?php echo $tipoContrato; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="tipoPonto" class="form-label">Tipo Ponto</label>
                        <input type="text" class="form-control" id="tipoPonto" name="tipoPonto"
                            value="<?php echo $tipoPonto; ?>">
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
                        <input type="text" class="form-control" id="status" name="status"
                            value="<?php echo $status; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>


        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <h3>Cadastro </h3>
            <form id="form_2" class="mb-3" >
                <div class="row">
                    <!-- <div class="col-sm-4">
            <div class="form-group">
                <label for="idFuncionario">ID Funcionário:</label>
                <input type="text" class="form-control" id="idFuncionario" name="idFuncionario" value="<?php echo $idFuncionario; ?>">
            </div>
        </div> -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="dataCadastro">Data de Cadastro:</label>
                            <input type="date" class="form-control" id="dataCadastro" name="dataCadastro"
                                value="<?php echo $dataCadastro; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <?php
                                function formatarCPF($cpf) {
                                    // Remover caracteres não numéricos
                                    $cpf = preg_replace('/[^0-9]/', '', $cpf);

                                    // Verificar se o CPF possui 11 dígitos
                                    if (strlen($cpf) == 11) {
                                        // Formatar CPF (XXX.XXX.XXX-XX)
                                        $cpf_formatado = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
                                        return $cpf_formatado;
                                    }

                                    // Se o CPF não possuir 11 dígitos, retorna o valor original
                                    return $cpf;
                                }
                                ?>
                            <!-- <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo formatarCPF($cpf); ?>"> -->
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf; ?>" maxlength="14" oninput="formatarCPF(this)">

                            <script>
                                function formatarCPF(input) {
                                    // Remove caracteres não numéricos
                                    var cpf = input.value.replace(/\D/g, '');

                                    // Verifica se o CPF possui 11 dígitos
                                    if (cpf.length === 11) {
                                        // Formata CPF (XXX.XXX.XXX-XX)
                                        cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
                                    }

                                    // Atualiza o valor do input com a formatação
                                    input.value = cpf;
                                }
                                </script>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="dataAdmissao">Data de Admissão:</label>
                            <input type="date" class="form-control" id="dataAdmissao" name="dataAdmissao"
                                value="<?php echo $dataAdmissao; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="dataDemissao">Data de Demissão:</label>
                            <input type="date" class="form-control" id="dataDemissao" name="dataDemissao"
                                value="<?php echo $dataDemissao; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="dataNascimento">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="dataNascimento" name="dataNascimento"
                                value="<?php echo $dataNascimento; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="rgNumero">RG Número:</label>
                            <input type="text" class="form-control" id="rgNumero" name="rgNumero"
                                value="<?php echo $rgNumero; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="rgEmissor">RG Emissor:</label>
                            <input type="text" class="form-control" id="rgEmissor" name="rgEmissor"
                                value="<?php echo $rgEmissor; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="rgUF">RG UF:</label>
                            <input type="text" class="form-control" id="rgUF" name="rgUF" value="<?php echo $rgUF; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="rgDataEmissao"> RG Data de Emissão:</label>
                            <input type="date" class="form-control" id="rgDataEmissao" name="rgDataEmissao"
                                value="<?php echo $rgDataEmissao; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cnhNumero">CNH Número:</label>
                            <input type="text" class="form-control" id="cnhNumero" name="cnhNumero"
                                value="<?php echo $cnhNumero; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cnhTipo">CNH Tipo:</label>
                            <input type="text" class="form-control" id="cnhTipo" name="cnhTipo"
                                value="<?php echo $cnhTipo; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="ctpsNumero">CTPS Número:</label>
                            <input type="text" class="form-control" id="ctpsNumero" name="ctpsNumero"
                                value="<?php echo $ctpsNumero; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="ctpsSerie">CTPS Série:</label>
                            <input type="text" class="form-control" id="ctpsSerie" name="ctpsSerie"
                                value="<?php echo $ctpsSerie; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="ctpsDataEmissao">CTPS Data de Emissão:</label>
                            <input type="date" class="form-control" id="ctpsDataEmissao" name="ctpsDataEmissao"
                                value="<?php echo $ctpsDataEmissao; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="ctpsUF">CTPS UF:</label>
                            <input type="text" class="form-control" id="ctpsUF" name="ctpsUF"
                                value="<?php echo $ctpsUF; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="pisNumero">PIS Número:</label>
                            <input type="text" class="form-control" id="pisNumero" name="pisNumero"
                                value="<?php echo $pisNumero; ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="eSocial">eSocial:</label>
                            <input type="text" class="form-control" id="eSocial" name="eSocial"
                                value="<?php echo $eSocial; ?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="sigilo">Sigilo:</label>
                            <select class="form-control" id="sigilo" name="sigilo">
                                <option value="1" <?php if($sigilo == 1) echo "selected"; ?>>Sim</option>
                                <option value="0" <?php if($sigilo == 0) echo "selected"; ?>>Não</option>
                            </select>
                        </div>
                        <div class="col-md-4 ">
                        <label for="idFuncioanrio" class="form-label">Id Funcioanrio</label>
                        <input type="text" class="form-control" id="idFuncioanrio" name="idFuncioanrio"
                            value="<?php echo $id_funci; ?>">
                    </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>


        </div>
    </div>
</div>





<div class="d-flex pb-4 mt-3 border-bottom border-dashed border-300 align-items-end">
    <h3 class="flex-1 mb-0">Histórico</h3>
</div>
<div class="py-3 border-bottom border-dashed">
    <div id="tableExample2" data-list='{"valueNames":["cpf","email","age"],"page":10,"pagination":true}'>
        <div class="table-responsive ms-n1 ps-1 scrollbar">
            <table class="table table-striped table-sm fs--1 mb-0">
                <thead>
                    <tr>

                        <th class="sort border-top " data-sort="id_funcionario">ID Funcionário</th>
                        <th class="sort border-top " data-sort="cpf">CPF</th>
                        <th class="sort border-top " data-sort="nome_social">Nome Social</th>
                        <th class="sort border-top " data-sort="nome_registro">Nome Registro</th>
                        <th class="sort border-top " data-sort="sexo">Sexo</th>
                        <th class="sort border-top " data-sort="genero">Gênero</th>
                        <th class="sort border-top " data-sort="estado_civil">Estado Civil</th>
                        <th class="sort border-top " data-sort="id_cargo">ID Cargo</th>
                        <th class="sort border-top " data-sort="id_vt">ID VT</th>
                        <th class="sort border-top " data-sort="id_superior">ID Superior</th>
                        <th class="sort border-top " data-sort="id_area">ID Área</th>
                        <th class="sort border-top " data-sort="id_operacao">ID Operação</th>
                        <th class="sort border-top " data-sort="id_filial">ID Filial</th>

                    </tr>
                </thead>
                <tbody class="list">
                    <?php
                // Recupere os dados do MySQL
            $sql_tab2 = "SELECT * FROM tb_history_cadastro AS thc where id_funcionario = $id_funci";
            $result_tab2 = $conn->query($sql_tab2);

            // Preencha a tabela com os dados
            if ($result_tab2->num_rows > 0) {
                while ($row = $result_tab2->fetch_assoc()) {
                    echo '<tr>';

                    echo '<td class="align-middle cpf">' . $row['nome_social'] . '</td>';
                    echo '<td class="align-middle">' . $row['nome_registro'] . '</td>';
                    echo '<td class="align-middle">' . $row['nome_social'] . '</td>';
                    echo '<td class="align-middle">' . $row['nome_registro'] . '</td>';
                    echo '<td class="align-middle">' . $row['sexo'] . '</td>';
                    echo '<td class="align-middle">' . $row['genero'] . '</td>';
                    echo '<td class="align-middle">' . $row['estado_civil'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_cargo'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_vt'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_superior'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_area'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_operacao'] . '</td>';
                    echo '<td class="align-middle">' . $row['id_filial'] . '</td>';


                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4">Nenhum registro encontrado.</td></tr>';
            }

            ?>

                </tbody>

            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
            <ul class="mb-0 pagination"></ul>
            <button class="page-link pe-0" data-list-pagination="next"><span
                    class="fas fa-chevron-right"></span></button>
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
                emptyFields += $(this).attr("name") + ", "; // Adiciona o nome do campo vazio à variável
            }
        });

        if (!allFieldsFilled) {
            emptyFields = emptyFields.slice(0, -2); // Remove a vírgula e o espaço no final da string
            Swal.fire({
                title: 'Campos vazios',
                text: 'Por favor, preencha todos os campos do formulário. Campos vazios: ' + emptyFields,
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
                emptyFields += $(this).attr("name") + ", "; // Adiciona o nome do campo vazio à variável
            }
        });

        if (!allFieldsFilled) {
            emptyFields = emptyFields.slice(0, -2); // Remove a vírgula e o espaço no final da string
            Swal.fire({
                title: 'Campos vazios',
                text: 'Por favor, preencha todos os campos do formulário. Campos vazios: ' + emptyFields,
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