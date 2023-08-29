<!-- <?php echo $_SERVER['SERVER_NAME'] ?> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<style>
/* Estilo para a caixa do calendário */
#calendar {
    text-align: center;
    margin: 20px auto;
    font-family: Arial, sans-serif;
    border: 1px solid #ccc;
    padding: 10px;
    display: inline-block; /* Faz com que o calendário fique ao lado da caixa */
}

/* Estilo para cada dia do calendário */
.day {
    box-sizing: border-box; /* Para incluir padding e border no tamanho total */
    width: calc(100% / 7); /* Distribui igualmente em 7 colunas */
    height: 50px; /* Altura fixa para cada caixa de dia */
    line-height: 50px; /* Centraliza o conteúdo verticalmente */
    border: 1px solid #ccc;
    float: left; /* Faz com que as caixas fiquem lado a lado */
}

/* Estilo para o dia atual */
.today {
    background-color: #007bff;
    color: #fff;
}

/* Estilo para dias com eventos */
.event {
    background-color: #28a745;
    color: #fff;
}

</style>


<div class="row align-items-center justify-content-between g-3 mb-6">
    <div class="col-12 col-md-auto">
        <h2 class="mb-0">Visão Geral</h2>
    </div>
    <!-- <div class="col-12 col-md-auto">
        <div class="flatpickr-input-container">
            <input class="form-control ps-6 datetimepicker" id="datepicker" type="text"
                data-options='{"dateFormat":"M j, Y","disableMobile":true,"defaultDate":"Mar 1, 2022"}' /><span
                class="uil uil-calendar-alt flatpickr-icon text-700"></span>
        </div>
    </div> -->
</div>
<div class="px-3">
    <div class="row justify-content-between mb-6">
        <div
            class="col-6 col-md-4 col-xxl-2 text-center border-start-xxl border-end-xxl-0 border-bottom-xxl-0 border-end border-bottom pb-4 pb-xxl-0 ">
            <!-- <span class="uil fs-3 lh-1  text-success uil-user-check"></span> -->
            <!-- <span class="text-success fs-3" data-feather="user-check" style="height: 40px; width: 40px;"></span> -->
            <!-- <i class="fa-solid fa-user" style="height: 40px; width: 40px;"></i> -->
            <i class="fa-solid fa-user-check" style="height: 40px; width: 40px;"></i>

                <?php
                include_once("database/databaseconnect.php");

                // Executar a consulta SQL para obter o contador
                $sql = "SELECT COUNT(*) AS quantidade, subquery.idFuncionario, subquery.cpf, subquery.dataCadastro, subquery.dataAdmissao, subquery.dataNascimento, subquery.tipo
                FROM (
                    SELECT fcnpj.id AS idFuncionario, fcnpj.cnpj AS cpf, fcnpj.dataCadastro, fcnpj.dataAdmissao, fcnpj.dataNascimento, 'cnpj' AS tipo, fcnpj.ativo_cad
                    FROM funcionarios_cnpj AS fcnpj
                    LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = fcnpj.id
                    WHERE tb_history_cadastro.id_funcionario IS NULL

                    UNION ALL

                    SELECT f.idFuncionario, f.cpf, f.dataCadastro, f.dataAdmissao, f.dataNascimento, 'cpf' AS tipo, f.ativo_cad
                    FROM funcionarios AS f
                    LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = f.idFuncionario
                    WHERE tb_history_cadastro.id_funcionario IS NULL
                ) AS subquery WHERE subquery.tipo = 'cpf' AND subquery.ativo_cad = '1';
                ";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $contador = $row['quantidade'];

                    // Exibir o valor do contador
                    // echo $contador;
                } else {
                    echo "Erro na consulta.";
                }

                // Fechar a conexão com o banco de dados
                // mysqli_close($conn);
                ?>

<?php
                include_once("database/databaseconnect.php");

                // Executar a consulta SQL para obter o contador
                $sql = "SELECT COUNT(*) AS quantidade, subquery.idFuncionario, subquery.cpf, subquery.dataCadastro, subquery.dataAdmissao, subquery.dataNascimento, subquery.tipo
                FROM (
                    SELECT fcnpj.id AS idFuncionario, fcnpj.cnpj AS cpf, fcnpj.dataCadastro, fcnpj.dataAdmissao, fcnpj.dataNascimento, 'cnpj' AS tipo, fcnpj.ativo_cad
                    FROM funcionarios_cnpj AS fcnpj
                    LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = fcnpj.id
                    WHERE tb_history_cadastro.id_funcionario IS NULL

                    UNION ALL

                    SELECT f.idFuncionario, f.cpf, f.dataCadastro, f.dataAdmissao, f.dataNascimento, 'cpf' AS tipo, f.ativo_cad
                    FROM funcionarios AS f
                    LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = f.idFuncionario
                    WHERE tb_history_cadastro.id_funcionario IS NULL
                ) AS subquery WHERE subquery.tipo = 'cpf' AND subquery.ativo_cad = '1';
                ";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $contador = $row['quantidade'];

                    // Exibir o valor do contador
                    // echo $contador;
                } else {
                    echo "Erro na consulta.";
                }

                // Fechar a conexão com o banco de dados
                // mysqli_close($conn);
                ?>

<?php
                include_once("database/databaseconnect.php");

                // Executar a consulta SQL para obter o contador
                $sql = "SELECT COUNT(*) AS quantidade, subquery.idFuncionario, subquery.cpf, subquery.dataCadastro, subquery.dataAdmissao, subquery.dataNascimento, subquery.tipo
                FROM (
                    SELECT fcnpj.id AS idFuncionario, fcnpj.cnpj AS cpf, fcnpj.dataCadastro, fcnpj.dataAdmissao, fcnpj.dataNascimento, 'cnpj' AS tipo, fcnpj.ativo_cad
                    FROM funcionarios_cnpj AS fcnpj
                    LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = fcnpj.id
                    WHERE tb_history_cadastro.id_funcionario IS NULL

                    UNION ALL

                    SELECT f.idFuncionario, f.cpf, f.dataCadastro, f.dataAdmissao, f.dataNascimento, 'cpf' AS tipo, f.ativo_cad
                    FROM funcionarios AS f
                    LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = f.idFuncionario
                    WHERE tb_history_cadastro.id_funcionario IS NULL
                ) AS subquery WHERE subquery.tipo = 'cpf' AND subquery.ativo_cad <> '1';
                ";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $contador_faltantes = $row['quantidade'];

                    // Exibir o valor do contador
                    // echo $contador;
                } else {
                    echo "Erro na consulta.";
                }

                // Fechar a conexão com o banco de dados
                // mysqli_close($conn);
                ?>

 <h1 id="div1" class="fs-3 pt-3">
<?php echo $contador ?>  <a class="m-0 p-0 text-decoration-none fs-0">/ <?php echo $contador_faltantes ?></a>
            </h1>

            <a class="nav-link" href="content_pages.php?id=2">
                <p class="fs--1 mb-0">Contratos CLT</p>
            </a>
        </div>
        <div
            class="col-6 col-md-4 col-xxl-2 text-center border-start-xxl border-end-xxl-0 border-bottom-xxl-0 border-end-md border-bottom pb-4 pb-xxl-0">
            <!-- <span class="uil fs-3 lh-1 text-warning uil-user-exclamation"></span> -->
            <i class="fa-solid fa-building-circle-check" style="height: 40px; width: 40px;"></i>
            <!-- <span class="text-warning fs-3" data-feather="user-x" style="height: 40px; width: 40px;"></span> -->

                <?php
                include_once("database/databaseconnect.php");

                // Executar a consulta SQL para obter o contador
                $sql = "SELECT COUNT(*) AS quantidade, subquery.idFuncionario, subquery.cpf, subquery.dataCadastro, subquery.dataAdmissao, subquery.dataNascimento, subquery.tipo
                FROM (
                    SELECT fcnpj.id AS idFuncionario, fcnpj.cnpj AS cpf, fcnpj.dataCadastro, fcnpj.dataAdmissao, fcnpj.dataNascimento, 'cnpj' AS tipo, fcnpj.ativo_cad
                    FROM funcionarios_cnpj AS fcnpj
                    LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = fcnpj.id
                    WHERE tb_history_cadastro.id_funcionario IS NULL

                    UNION ALL

                    SELECT f.idFuncionario, f.cpf, f.dataCadastro, f.dataAdmissao, f.dataNascimento, 'cpf' AS tipo, f.ativo_cad
                    FROM funcionarios AS f
                    LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = f.idFuncionario
                    WHERE tb_history_cadastro.id_funcionario IS NULL
                ) AS subquery WHERE subquery.tipo = 'cnpj' AND subquery.ativo_cad = '1';";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $contador = $row['quantidade'];

                    // Exibir o valor do contador
                    // echo $contador;
                } else {
                    echo "Erro na consulta.";
                }

                // Fechar a conexão com o banco de dados
                // mysqli_close($conn);
                ?>

<?php
                include_once("database/databaseconnect.php");

                // Executar a consulta SQL para obter o contador
                $sql = "SELECT COUNT(*) AS quantidade, subquery.idFuncionario, subquery.cpf, subquery.dataCadastro, subquery.dataAdmissao, subquery.dataNascimento, subquery.tipo
                FROM (
                    SELECT fcnpj.id AS idFuncionario, fcnpj.cnpj AS cpf, fcnpj.dataCadastro, fcnpj.dataAdmissao, fcnpj.dataNascimento, 'cnpj' AS tipo, fcnpj.ativo_cad
                    FROM funcionarios_cnpj AS fcnpj
                    LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = fcnpj.id
                    WHERE tb_history_cadastro.id_funcionario IS NULL

                    UNION ALL

                    SELECT f.idFuncionario, f.cpf, f.dataCadastro, f.dataAdmissao, f.dataNascimento, 'cpf' AS tipo, f.ativo_cad
                    FROM funcionarios AS f
                    LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = f.idFuncionario
                    WHERE tb_history_cadastro.id_funcionario IS NULL
                ) AS subquery WHERE subquery.tipo = 'cnpj' AND subquery.ativo_cad <> '1';";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $contador_faltantes = $row['quantidade'];

                    // Exibir o valor do contador
                    // echo $contador;
                } else {
                    echo "Erro na consulta.";
                }

                // Fechar a conexão com o banco de dados
                // mysqli_close($conn);
                ?>



<h1 id="div1" class="fs-3 pt-3">
<?php echo $contador ?>  <a class="m-0 p-0 text-decoration-none fs-0">/ <?php echo $contador_faltantes ?></a>
            </h1>

            <a class="nav-link" href="content_pages.php?id=4">
                <p class="fs--1 mb-0">Cadastros CNPJ</p>
            </a>
        </div>
        <div
            class="col-6 col-md-4 col-xxl-2 text-center border-start-xxl border-bottom-xxl-0 border-bottom border-end border-end-md-0 pb-4 pb-xxl-0 pt-4 pt-md-0">
            <!-- <span class="uil fs-3 lh-1 uil-envelopes text-primary"></span> -->
            <!-- <span class="text-info fs-3" data-feather="users" style="height: 40px; width: 40px;"></span> -->
            <i class="fa-solid fa-building-user" style="height: 40px; width: 40px;"></i>
            <h1 id="resultado" class="fs-3 pt-3"></h1>
            <p class="fs--1 mb-0">Total Colaboradores</p>
        </div>

        <!-- <div
            class="col-6 col-md-4 col-xxl-2 text-center border-start-xxl border-end border-end-xxl-0 pb-md-4 pb-xxl-0 pt-4 pt-xxl-0">
            <span class="uil fs-3 lh-1 uil-envelope-check text-success"></span>
            <h1 class="fs-3 pt-3">900</h1>
            <p class="fs--1 mb-0">Emails Clicked</p>
        </div>
        <div
            class="col-6 col-md-4 col-xxl-2 text-center border-start-xxl border-end-xxl pb-md-4 pb-xxl-0 pt-4 pt-xxl-0">
            <span class="uil fs-3 lh-1 uil-envelope-block text-danger"></span>
            <h1 class="fs-3 pt-3">500</h1>
            <p class="fs--1 mb-0">Emails Bounce</p>
        </div> -->
    </div>
    <div class="row">
    <div class="col-md-4 col-xl-4 col-xxl-4 gy-5 gy-md-3">
        <div class="border-bottom">
            <h5 class="pb-4 border-bottom">Colaboradores por Status</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent list-group-crm fw-bold text-900 fs--1 py-2">
                    <div class="d-flex justify-content-between"><span class="fw-normal fs--1 mx-1"> <span
                                class="fw-bold"></span>Ativos </span><span>(65)</span></div>
                </li>
                <li class="list-group-item bg-transparent list-group-crm fw-bold text-900 fs--1 py-2">
                    <div class="d-flex justify-content-between"><span class="fw-normal mx-1"><span
                                class="fw-bold"></span>Férias</span><span>(74)</span></div>
                </li>
                <li class="list-group-item bg-transparent list-group-crm fw-bold text-900 fs--1 py-2">
                    <div class="d-flex justify-content-between"><span class="fw-normal fs--1 mx-1"><span
                                class="fw-bold"></span>Afastados</span><span>(32)</span></div>
                </li>
                <li class="list-group-item bg-transparent list-group-crm fw-bold text-900 fs--1 py-2">
                    <div class="d-flex justify-content-between"><span class="fw-normal fs--1 mx-1"><span
                                class="fw-bold"></span>Outros</span><span>(25)</span></div>
                </li>
                <li class="list-group-item bg-transparent list-group-crm fw-bold text-900 fs--1 py-2">
                    <div class="d-flex justify-content-between"><span class="fw-normal fs--1 mx-1"> <span
                                class="fw-bold">Total</span></span><span>(196)</span></div>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-md-8 col-xl-8 col-xxl-8 gy-5 gy-md-3">
        <h5>Calendário</h5>
        <div id="calendar"></div>
    </div>
    </div>
</div>


<script>
var div1 = document.getElementById("div1");
var div2 = document.getElementById("div2");
var resultado = document.getElementById("resultado");

var valor1 = parseInt(div1.innerHTML);
var valor2 = parseInt(div2.innerHTML);

var soma = valor1 + valor2;

resultado.innerHTML = soma;
</script>


<script>
// Função para obter a data atual
function getCurrentDate() {
    var today = new Date();
    var day = today.getDate();
    var month = today.getMonth() + 1; // Os meses começam em 0
    var year = today.getFullYear();

    return year + '-' + month + '-' + day;
}

// Função para verificar se um evento ocorre em um determinado dia
function hasEvent(date) {
    // Aqui você pode implementar a lógica para verificar se há um evento na data fornecida
    // Por exemplo, você pode ter um array de eventos e verificar se o dia está presente no array

    var events = ['2023-07-12', '2023-07-15']; // Exemplo de array de eventos

    return events.includes(date);
}

// Função para exibir o calendário
function showCalendar() {
    var currentDate = getCurrentDate();

    var startDate = new Date(currentDate);
    startDate.setDate(startDate.getDate() - startDate.getDay()); // Define o primeiro dia da semana

    var calendar = document.getElementById('calendar');

    // Limpa o calendário
    while (calendar.firstChild) {
        calendar.removeChild(calendar.firstChild);
    }

    // Cria os elementos para cada dia da semana
    for (var i = 0; i < 7; i++) {
        var date = new Date(startDate);
        date.setDate(date.getDate() + i);

        var dayElement = document.createElement('div');
        dayElement.className = 'day';

        // Adiciona a classe "today" para o dia atual
        if (date.toISOString().split('T')[0] === currentDate) {
            dayElement.classList.add('today');
        }

        // Adiciona a classe "event" para dias com eventos
        if (hasEvent(date.toISOString().split('T')[0])) {
            dayElement.classList.add('event');
        }

        var dayNumberElement = document.createElement('div');
        dayNumberElement.className = 'day-number';
        dayNumberElement.textContent = date.getDate();

        dayElement.appendChild(dayNumberElement);
        calendar.appendChild(dayElement);
    }
}

// Chama a função para exibir o calendário quando a página é carregada
window.onload = function() {
    showCalendar();
};
</script>