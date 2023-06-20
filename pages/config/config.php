<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<div class="row align-items-center justify-content-between g-3 mb-4">
    <div class="col-auto">
        <h2 class="mb-0">Configurações</h2>
    </div>
    <!-- <div class="col-auto">
        <div class="row g-2 g-sm-3">
            <div class="col-auto">
                <button class="btn btn-phoenix-danger"><span class="fas fa-trash-alt me-2"></span>Delete
                    customer</button>
            </div>
            <div class="col-auto">
                <button class="btn btn-phoenix-secondary"><span class="fas fa-key me-2"></span>Reset password</button>
            </div>
        </div>
    </div> -->
</div>

<ul class="nav nav-underline" id="myTab" role="tablist">
    <!-- <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="false" tabindex="-1">
            <span class="fas fa-user me-2"></span>Home
        </a>
    </li> -->
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="transporte_tab" data-bs-toggle="tab" href="#tab-transporte" role="tab" aria-controls="tab-transporte" aria-selected="false" tabindex="-1">
            <span class="fas fa-bus me-2"></span>Auxilio Transporte
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="alimentacao-tab" data-bs-toggle="tab" href="#tab-alimentacao" role="tab" aria-controls="tab-alimentacao" aria-selected="true">
            <span class="fas fa-utensils me-2"></span>Auxilio Alimentação
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="operacoes-tab" data-bs-toggle="tab" href="#tab-operacoes" role="tab" aria-controls="tab-operacoes" aria-selected="true">
            <span class="fas fa-briefcase me-2"></span>Operações
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="filiais-tab" data-bs-toggle="tab" href="#tab-filiais" role="tab" aria-controls="tab-filiais" aria-selected="true">
            <span class="fas fa-building me-2"></span>Filiais
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="areas-tab" data-bs-toggle="tab" href="#tab-areas" role="tab" aria-controls="tab-areas" aria-selected="true">
            <span class="fas fa-network-wired me-2"></span>Areas
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="cargos-tab" data-bs-toggle="tab" href="#tab-cargos" role="tab" aria-controls="tab-cargos" aria-selected="true">
            <span class="fas fa-users-gear me-2"></span>Cargos
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="sistemas-tab" data-bs-toggle="tab" href="#tab-sistemas" role="tab" aria-controls="tab-sistemas" aria-selected="true">
            <span class="fas fa-desktop me-2"></span>Sistemas
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="beneficios-tab" data-bs-toggle="tab" href="#tab-beneficios" role="tab" aria-controls="tab-beneficios" aria-selected="true">
            <span class="fas fa-thumbs-up me-2"></span>Benefícios
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="acessos-tab" data-bs-toggle="tab" href="#tab-acessos" role="tab" aria-controls="tab-acessos" aria-selected="true">
            <span class="fas fa-key me-2"></span>Acessos
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="banco-tab" data-bs-toggle="tab" href="#tab-banco" role="tab" aria-controls="tab-banco" aria-selected="true">
            <span class="fas fa-building-columns me-2"></span>Info Bancária
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link" id="endereco-tab" data-bs-toggle="tab" href="#tab-endereco" role="tab" aria-controls="tab-endereco" aria-selected="true">
            <span class="fas fa-building-columns me-2"></span>Endereço
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link" id="contato-tab" data-bs-toggle="tab" href="#tab-contato" role="tab" aria-controls="tab-contato" aria-selected="true">
            <span class="fas fa-building-columns me-2"></span>Contato
        </a>
    </li>
</ul>

<div class="tab-content mt-3" id="myTabContent">
    <!-- <div class="tab-pane fade active show" id="tab-home" role="tabpanel" aria-labelledby="home-tab">

        Raw denim you probably haven't
        heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche
        tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby
        sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.

    </div> -->


    <div class="tab-pane fade " id="tab-operacoes" role="tabpanel" aria-labelledby="operacoes-tab">

        <div class="d-flex flex-wrap">
            <div class="row flex-fill">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Formulário Cadastro Operações

                        </div>
                        <div class="card-body">
                            <form id="operacoes">
                                <div class="form-group">
                                    <!-- <label for="id_area">ID Área:</label> -->
                                    <!-- <input type="text" class="form-control" name="id_area" id="id_area" required> -->
                                    <!-- <div class=""> -->
                                    <label for="id_area" class="form-label" >Area</label>
                                    <!-- <input type="text" class="form-control" id="idVt" name="idVt" value="<?php echo $idVt; ?>"> -->
                                    <select type="text" class="form-control" id="id_area" name="id_area"
                                        data-choices="data-choices"
                                        data-options='{"removeItemButton":true,"placeholder":true}'>
                                        <option value="">Selecione</option>



                                        <?php
                                        // Executar a consulta para obter os dados
                                        $sql_vt = "SELECT id_area, nome_area FROM aux_areas"; // Substitua "tabela" pelo nome correto da sua tabela
                                        $result_vt = $conn->query($sql_vt);

                                        // Verificar se há resultados e criar as opções
                                        if ($result_vt->num_rows > 0) {
                                            while ($row = $result_vt->fetch_assoc()) {
                                                $id_area = $row["id_area"];
                                                $nome_area = $row["nome_area"];
                                                // $visibilidade_vt = ($idVt == $id_vt) ? "selected" : "";

                                                echo "<option value='$id_area' >$nome_area</option>";
                                            }
                                        } else {
                                            // echo "<option value=''>Nenhum resultado encontrado</option>";
                                        }
                                        ?>
                                    </select>
                                    <!-- </div> -->
                                </div>
                                <!-- <div class="form-group">
                                    <label for="id_operacao">ID Operação:</label>
                                    <input type="text" class="form-control" name="id_operacao" id="id_operacao"
                                        required>
                                </div> -->
                                <div class="form-group">
                                    <label for="nome_operacao" class="form-label">Nome Operação:</label>
                                    <input type="text" class="form-control" name="nome_operacao" id="nome_operacao"
                                        required>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="hr_ini_seg" class="form-label">Hora Início Segunda:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_ini_seg"
                                                id="hr_ini_seg" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="hr_fim_seg" class="form-label">Hora Fim Segunda:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_fim_seg"
                                                id="hr_fim_seg" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">

                                        <div class="d-grid gap-2">
                                            <button type="button" class="btn btn-soft-secondary btn-block mt-2 mb-1"
                                                onclick="copiarHorarios()">Copiar Horários para os demais dias</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hr_ini_ter">Hora Início Terça:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_ini_ter"
                                                id="hr_ini_ter" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hr_fim_ter">Hora Fim Terça:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_fim_ter"
                                                id="hr_fim_ter" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hr_ini_qua">Hora Início Quarta:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_ini_qua"
                                                id="hr_ini_qua" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hr_fim_qua">Hora Fim Quarta:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_fim_qua"
                                                id="hr_fim_qua" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hr_ini_qui">Hora Início Quinta:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_ini_qui"
                                                id="hr_ini_qui" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hr_fim_qui">Hora Fim Quinta:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_fim_qui"
                                                id="hr_fim_qui" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hr_ini_sex">Hora Início Sexta:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_ini_sex"
                                                id="hr_ini_sex" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hr_fim_sex">Hora Fim Sexta:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_fim_sex"
                                                id="hr_fim_sex" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hr_ini_sab">Hora Início Sábado:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_ini_sab"
                                                id="hr_ini_sab" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hr_fim_sab">Hora Fim Sábado:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_fim_sab"
                                                id="hr_fim_sab" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hr_ini_dom">Hora Início Domingo:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_ini_dom"
                                                id="hr_ini_dom" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hr_fim_dom">Hora Fim Domingo:</label>
                                            <input type="text" class="form-control datetimepicker" name="hr_fim_dom"
                                                id="hr_fim_dom" type="text" placeholder="hora : minuto"
                                                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i", "time_24hr": true,"disableMobile":true}'
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-check mt-2">
                                    <input class="form-check-input" type="checkbox" class="form-check-input"
                                        name="habilitado" id="habilitado">
                                    <label class="form-check-label" for="habilitado">Habilitado</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Cadastrar Operação</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            Itens Cadastrados
                        </div>
                        <div class="card-body">
                            <div id="tableExample23"
                                data-list='{"valueNames":["id","email","age"],"page":5,"pagination":true}'>
                                <div class="table-responsive ms-n1 ps-1 scrollbar">
                                    <table class="table table-striped table-sm fs--1 mb-0">
                                        <thead>
                                            <tr>

                                                <th>ID Área</th>
                                                <th>ID Operação</th>
                                                <th>Nome Operação</th>
                                                <th>Hora Início Segunda</th>
                                                <th>Hora Fim Segunda</th>
                                                <th>Hora Início Terça</th>
                                                <th>Hora Fim Terça</th>
                                                <th>Hora Início Quarta</th>
                                                <th>Hora Fim Quarta</th>
                                                <th>Hora Início Quinta</th>
                                                <th>Hora Fim Quinta</th>
                                                <th>Hora Início Sexta</th>
                                                <th>Hora Fim Sexta</th>
                                                <th>Hora Início Sábado</th>
                                                <th>Hora Fim Sábado</th>
                                                <th>Hora Início Domingo</th>
                                                <th>Hora Fim Domingo</th>
                                                <th>Habilitado</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_body_operacoes" class="list">

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


    <div class="tab-pane fade" id="tab-transporte" role="tabpanel" aria-labelledby="transporte_tab">

        <div class="d-flex flex-wrap">
            <div class="row flex-fill">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Formulário Auxilio VT

                        </div>
                        <div class="card-body">
                            <form id="aux_vt_form">
                                <!-- <div class="form-group">
                                    <label for="id_vt">ID_VT:</label>
                                    <input type="text" class="form-control" id="id_vt" name="id_vt">
                                </div> -->
                                <div class="form-group">
                                    <label for="vt_nome" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" id="vt_nome" name="vt_nome">
                                </div>
                                <div class="form-group">
                                    <label for="vt_valor" class="form-label">Valor:</label>
                                    <input type="number" class="form-control" id="vt_valor" name="vt_valor">
                                </div>
                                <div class="form-group">
                                    <label for="habilitado" class="form-label">HABILITADO:</label>
                                    <select class="form-control" id="habilitado" name="habilitado">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="sys_user">SYS_USER:</label> -->
                                    <input type="text" class="form-control d-none" id="sys_user" name="sys_user"
                                        value="<?php echo $id_user ?>">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="sys_data">SYS_DATA:</label>
                                    <input type="date" class="form-control" id="sys_data" name="sys_data">
                                </div> -->
                                <button type="submit" class="btn btn-primary mt-2">Cadastrar Vale Transporte</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
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
                                                <th class="sort border-top " data-sort="vt_nome">Nome</th>
                                                <th class="sort border-top " data-sort="vt_valor">Valor R$</th>
                                                <th class="sort border-top ">Habilitado</th>
                                                <th class="sort border-top ">Adicionado por</th>
                                                <th class="sort border-top ">Data</th>
                                                <th class="sort border-top ">Apagar</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_body" class="list">

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
    <div class="tab-pane fade " id="tab-alimentacao" role="tabpanel" aria-labelledby="alimentacao-tab">
        <div class="d-flex flex-wrap">
            <div class="row flex-fill">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Formulário Auxilio Alimentação

                        </div>
                        <div class="card-body">
                            <form id="aux_ali_form">
                                <!-- <div class="form-group">
                                    <label for="id_vt">ID_VT:</label>
                                    <input type="text" class="form-control" id="id_vt" name="id_vt">
                                </div> -->
                                <div class="form-group">
                                    <label for="vt_nome" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" id="vr_nome" name="vr_nome">
                                </div>
                                <div class="form-group">
                                    <label for="vt_valor" class="form-label">Valor:</label>
                                    <input type="number" class="form-control" id="vr_valor" name="vr_valor">
                                </div>
                                <div class="form-group">
                                    <label for="habilitado" class="form-label">HABILITADO:</label>
                                    <select class="form-control" id="habilitado" name="habilitado">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="sys_user">SYS_USER:</label> -->
                                    <input type="text" class="form-control d-none" id="sys_user" name="sys_user"
                                        value="<?php echo $id_user ?>">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="sys_data">SYS_DATA:</label>
                                    <input type="date" class="form-control" id="sys_data" name="sys_data">
                                </div> -->
                                <button type="submit" class="btn btn-primary mt-2">Cadastrar Vale Alimentação</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
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
                                                <th class="sort border-top " data-sort="vt_nome">Nome</th>
                                                <th class="sort border-top " data-sort="vt_valor">Valor R$</th>
                                                <th class="sort border-top ">Habilitado</th>
                                                <th class="sort border-top ">Adicionado por</th>
                                                <th class="sort border-top ">Data</th>
                                                <th class="sort border-top ">Apagar</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_body_ali" class="list">

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

    <?php include 'pages/config/insert/opcoes/filiais.php'?>

    <?php include 'pages/config/insert/opcoes/areas.php'?>

    <?php include 'pages/config/insert/opcoes/cargos.php'?>

    <?php include 'pages/config/insert/opcoes/sistemas.php'?>

     <?php include 'pages/config/insert/opcoes/beneficios.php'?>

     <?php include 'pages/config/insert/opcoes/acessos.php'?>

     <?php include 'pages/config/insert/opcoes/info_bancario.php'?>

     <?php include 'pages/config/insert/opcoes/info_info_endereco.php'?>

     <?php include 'pages/config/insert/opcoes/contato.php'?>





</div>













<script>
// Função para carregar os itens cadastrados na inicialização da página - Formulário 1
$(document).ready(function() {
    loadItems();

    function loadItems() {
        $.ajax({
            url: 'pages/config/insert/get_vt.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr><td>" + item.id_vt + "</td><td>" + item.vt_nome +
                        "</td><td>" + item.vt_valor + "</td><td>" + item.habilitado_icon +
                        "</td><td>" + item.sys_user + "</td><td>" + item.sys_data +
                        "</td><td><button class='delete-btn btn btn-danger btn-sm' data-id='" +
                        item.id_vt + "'>Excluir</button></td></tr></tr>";
                });
                $("#table_body").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".delete-btn", function() {
        var id_vt = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_vt);
            }
        });
    });

    function deleteItem(id_vt) {
        $.ajax({
            url: 'pages/config/insert/delete_vt.php',
            type: 'POST',
            data: {
                id_vt: id_vt
            },
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    icon: response.status ? 'success' : 'error',
                    title: response.status ? 'Sucesso!' : 'Erro!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                if (response.status) {
                    loadItems();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    document.getElementById("aux_vt_form").addEventListener("submit", function(event) {
        event.preventDefault();

        var vt_nome = document.getElementById("vt_nome").value;
        var vt_valor = document.getElementById("vt_valor").value;
        var habilitado = document.getElementById("habilitado").value;
        var sys_user = document.getElementById("sys_user").value;

        $.ajax({
            url: 'pages/config/insert/salve_vt.php',
            type: 'POST',
            data: {
                vt_nome: vt_nome,
                vt_valor: vt_valor,
                habilitado: habilitado,
                sys_user: sys_user
            },
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    icon: response.status ? 'success' : 'error',
                    title: response.status ? 'Sucesso!' : 'Erro!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                if (response.status) {
                    loadItems();
                    document.getElementById("aux_vt_form").reset();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    });
});
</script>


<script>
// Função para carregar os itens cadastrados na inicialização da página - Formulário 2
$(document).ready(function() {
    loadItems();

    function loadItems() {
        $.ajax({
            url: 'pages/config/insert/get_ali.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr><td>" + item.id_vr + "</td><td>" + item.vr_nome +
                        "</td><td>" + item.vr_valor + "</td><td>" + item.habilitado_icon +
                        "</td><td>" + item.sys_user + "</td><td>" + item.sys_data +
                        "</td><td><button class='delete-btn btn btn-danger btn-sm' data-id='" +
                        item.id_vr + "'>Excluir</button></td></tr></tr>";
                });
                $("#table_body_ali").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".delete-btn", function() {
        var id_vr = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_vr);
            }
        });
    });

    function deleteItem(id_vr) {
        $.ajax({
            url: 'pages/config/insert/delete_ali.php',
            type: 'POST',
            data: {
                id_vr: id_vr
            },
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    icon: response.status ? 'success' : 'error',
                    title: response.status ? 'Sucesso!' : 'Erro!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                if (response.status) {
                    loadItems();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    document.getElementById("aux_ali_form").addEventListener("submit", function(event) {
        event.preventDefault();

        var vr_nome = document.getElementById("vr_nome").value;
        var vr_valor = document.getElementById("vr_valor").value;
        var habilitado = document.getElementById("habilitado").value;
        var sys_user = document.getElementById("sys_user").value;

        $.ajax({
            url: 'pages/config/insert/salve_ali.php',
            type: 'POST',
            data: {
                vr_nome: vr_nome,
                vr_valor: vr_valor,
                habilitado: habilitado,
                sys_user: sys_user
            },
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    icon: response.status ? 'success' : 'error',
                    title: response.status ? 'Sucesso!' : 'Erro!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                if (response.status) {
                    loadItems();
                    document.getElementById("aux_ali_form").reset();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    });
});
</script>


<script>
// Função para carregar os itens cadastrados na inicialização da página - Formulário 2
$(document).ready(function() {
    loadItems();

    function loadItems() {
        $.ajax({
            url: 'pages/config/insert/get_operacoes.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var tableData = "";
                data.forEach(function(item) {
                    tableData += "<tr><td>" + item.id_area + "</td><td>" + item
                        .id_operacao +
                        "</td><td>" + item.nome_operacao + "</td><td>" + item.hr_ini_seg +
                        "</td><td>" + item.hr_fim_seg + "</td><td>" + item.hr_ini_ter +
                        "</td><td>" + item.hr_fim_ter + "</td><td>" + item.hr_ini_qua +
                        "</td><td>" + item.hr_fim_qua + "</td><td>" + item.hr_ini_qui +
                        "</td><td>" + item.hr_fim_qui + "</td><td>" + item.hr_ini_sex +
                        "</td><td>" + item.hr_fim_sex + "</td><td>" + item.hr_ini_sab +
                        "</td><td>" + item.hr_fim_sab + "</td><td>" + item.hr_ini_dom +
                        "</td><td>" + item.hr_fim_dom + "</td><td>" + item.habilitado +
                        "</td><td><button class='delete-btn btn btn-danger btn-sm' data-id='" +
                        item.id_operacao + "'>Excluir</button></td></tr>";


                });
                $("#table_body_operacoes").html(tableData);
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    $(document).on("click", ".delete-btn", function() {
        var id_operacao = $(this).data("id");

        Swal.fire({
            title: 'Tem certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id_operacao);
            }
        });
    });

    function deleteItem(id_operacao) {
        $.ajax({
            url: 'pages/config/insert/delete_operacoes.php',
            type: 'POST',
            data: {
                id_operacao: id_operacao
            },
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    icon: response.status ? 'success' : 'error',
                    title: response.status ? 'Sucesso!' : 'Erro!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                if (response.status) {
                    loadItems();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    }

    document.getElementById("operacoes").addEventListener("submit", function(event) {
        event.preventDefault();

        var id_area = document.getElementById("id_area").value;
        var nome_operacao = document.getElementById("nome_operacao").value;
        var hr_ini_seg = document.getElementById("hr_ini_seg").value;
        var hr_fim_seg = document.getElementById("hr_fim_seg").value;
        var hr_ini_ter = document.getElementById("hr_ini_ter").value;
        var hr_fim_ter = document.getElementById("hr_fim_ter").value;
        var hr_ini_qua = document.getElementById("hr_ini_qua").value;
        var hr_fim_qua = document.getElementById("hr_fim_qua").value;
        var hr_ini_qui = document.getElementById("hr_ini_qui").value;
        var hr_fim_qui = document.getElementById("hr_fim_qui").value;
        var hr_ini_sex = document.getElementById("hr_ini_sex").value;
        var hr_fim_sex = document.getElementById("hr_fim_sex").value;
        var hr_ini_sab = document.getElementById("hr_ini_sab").value;
        var hr_fim_sab = document.getElementById("hr_fim_sab").value;
        var hr_ini_dom = document.getElementById("hr_ini_dom").value;
        var hr_fim_dom = document.getElementById("hr_fim_dom").value;
        var habilitado = document.getElementById("habilitado").checked;

        $.ajax({
            url: 'pages/config/insert/salve_operacoes.php',
            type: 'POST',
            data: {
                id_area: id_area,
                nome_operacao: nome_operacao,
                hr_ini_seg: hr_ini_seg,
                hr_fim_seg: hr_fim_seg,
                hr_ini_ter: hr_ini_ter,
                hr_fim_ter: hr_fim_ter,
                hr_ini_qua: hr_ini_qua,
                hr_fim_qua: hr_fim_qua,
                hr_ini_qui: hr_ini_qui,
                hr_fim_qui: hr_fim_qui,
                hr_ini_sex: hr_ini_sex,
                hr_fim_sex: hr_fim_sex,
                hr_ini_sab: hr_ini_sab,
                hr_fim_sab: hr_fim_sab,
                hr_ini_dom: hr_ini_dom,
                hr_fim_dom: hr_fim_dom,
                habilitado: habilitado
            },
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    icon: response.status ? 'success' : 'error',
                    title: response.status ? 'Sucesso!' : 'Erro!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });

                if (response.status) {
                    loadItems();
                    document.getElementById("operacoes").reset();
                }
            },
            error: function(xhr, status, error) {
                console.log("Erro na solicitação AJAX: " + error);
            }
        });
    });
});
</script>


<script>
function copiarHorarios() {
    var hrIniSeg = document.getElementById("hr_ini_seg").value;
    var hrFimSeg = document.getElementById("hr_fim_seg").value;

    document.getElementById("hr_ini_ter").value = hrIniSeg;
    document.getElementById("hr_fim_ter").value = hrFimSeg;

    document.getElementById("hr_ini_qua").value = hrIniSeg;
    document.getElementById("hr_fim_qua").value = hrFimSeg;

    document.getElementById("hr_ini_qui").value = hrIniSeg;
    document.getElementById("hr_fim_qui").value = hrFimSeg;

    document.getElementById("hr_ini_sex").value = hrIniSeg;
    document.getElementById("hr_fim_sex").value = hrFimSeg;

    document.getElementById("hr_ini_sab").value = hrIniSeg;
    document.getElementById("hr_fim_sab").value = hrFimSeg;

    document.getElementById("hr_ini_dom").value = hrIniSeg;
    document.getElementById("hr_fim_dom").value = hrFimSeg;
}
</script>