



<!-- <?php echo $_SERVER['SERVER_NAME'] ?> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<style>
#calendar {
    margin-left: auto;
    margin-right: auto;
    width: 320px;
    font-family: "Lato", sans-serif;
}
#calendar_weekdays div {
    display: inline-block;
    vertical-align: top;
}
#calendar_content,
#calendar_weekdays,
#calendar_header {
    position: relative;
    width: 320px;
    overflow: hidden;
    float: left;
    z-index: 10;
}

#calendar_weekdays div,
#calendar_content div {
    width: 40px;
    height: 40px;
    overflow: hidden;
    text-align: center;
    background-color: #FFFFFF;
    color: #787878;
}
#calendar_content {
    -webkit-border-radius: 0px 0px 12px 12px;
    -moz-border-radius: 0px 0px 12px 12px;
    border-radius: 0px 0px 12px 12px;
}
#calendar_content div {
    float: left;
}
#calendar_content div:hover {
    background-color: #F8F8F8;
}
#calendar_content div.blank {
    background-color: #E8E8E8;
}
#calendar_header,
#calendar_content div.today {
    zoom: 1;
    filter: alpha(opacity=70);
    opacity: 0.7;
}
#calendar_content div.today {
    color: #FFFFFF;
}
#calendar_header {
    width: 100%;
    height: 37px;
    text-align: center;
    background-color: #FF6860;
    padding: 18px 0;
    -webkit-border-radius: 12px 12px 0px 0px;
    -moz-border-radius: 12px 12px 0px 0px;
    border-radius: 12px 12px 0px 0px;
}
#calendar_header h1 {
    font-size: 1.5em;
    color: #FFFFFF;
    float: left;
    width: 70%;
}
i[class^="icon-chevron"] {
    color: #FFFFFF;
    float: left;
    width: 15%;
    border-radius: 50%;
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
            class="col-6 col-md-4 col-xxl-2 text-center border-start-xxl border-end-xxl-0 border-bottom-xxl-0 border-end border-bottom pb-4 pb-xxl-0 " >
            <!-- <span class="uil fs-3 lh-1  text-success uil-user-check"></span> -->
            <span class="text-success fs-3" data-feather="user-check" style="height: 40px; width: 40px;"></span>
            <h1 id="div1" class="fs-3 pt-3">
                <?php
                include_once("database/databaseconnect.php");

                // Executar a consulta SQL para obter o contador
                $sql = "SELECT COUNT(*) AS quantidade_registros
                FROM (
                    SELECT f.cpf, h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history, aux_cargos.cargo_nome, aux_vt.vt_nome, tb_sup.nome_social as superior_nome, aux_areas.nome_area, aux_operacoes.nome_operacao, aux_filiais.filial_nome, 'cpf' AS tipo
                    FROM funcionarios f
                    INNER JOIN tb_history_cadastro h ON f.idFuncionario = h.id_funcionario
                    LEFT JOIN aux_cargos ON aux_cargos.id_cargo = h.id_cargo
                    LEFT JOIN aux_vt ON aux_vt.id_vt = h.id_vt
                    LEFT JOIN tb_history_cadastro tb_sup ON tb_sup.id_funcionario = h.id_superior
                    LEFT JOIN aux_areas ON aux_areas.id_area = h.id_area
                    LEFT JOIN aux_operacoes ON aux_operacoes.id_operacao = h.id_operacao
                    LEFT JOIN aux_filiais ON aux_filiais.id_filial = h.id_filial
                    WHERE h.id_history IN (
                        SELECT MAX(id_history)
                        FROM tb_history_cadastro
                        GROUP BY id_funcionario
                    )

                    UNION ALL

                    SELECT f_cnpj.cnpj AS 'cpf', h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history, aux_cargos.cargo_nome, aux_vt.vt_nome, tb_sup.nome_social as superior_nome, aux_areas.nome_area, aux_operacoes.nome_operacao, aux_filiais.filial_nome, 'cnpj' AS tipo
                    FROM funcionarios_cnpj AS f_cnpj
                    INNER JOIN tb_history_cadastro h ON f_cnpj.id = h.id_funcionario
                    LEFT JOIN aux_cargos ON aux_cargos.id_cargo = h.id_cargo
                    LEFT JOIN aux_vt ON aux_vt.id_vt = h.id_vt
                    LEFT JOIN tb_history_cadastro tb_sup ON tb_sup.id_funcionario = h.id_superior
                    LEFT JOIN aux_areas ON aux_areas.id_area = h.id_area
                    LEFT JOIN aux_operacoes ON aux_operacoes.id_operacao = h.id_operacao
                    LEFT JOIN aux_filiais ON aux_filiais.id_filial = h.id_filial
                    WHERE h.id_history IN (
                        SELECT MAX(id_history)
                        FROM tb_history_cadastro
                        GROUP BY id_funcionario
                    )
                ) AS subconsulta;
                ";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $contador = $row['quantidade_registros'];

                    // Exibir o valor do contador
                    echo $contador;
                } else {
                    echo "Erro na consulta.";
                }

                // Fechar a conexão com o banco de dados
                // mysqli_close($conn);
                ?>
            </h1>

            <a class="nav-link" href = "content_pages.php?id=2" ><p class="fs--1 mb-0">Colaboradores Cadastrados</p></a>
        </div>
        <div
            class="col-6 col-md-4 col-xxl-2 text-center border-start-xxl border-end-xxl-0 border-bottom-xxl-0 border-end-md border-bottom pb-4 pb-xxl-0">
            <!-- <span class="uil fs-3 lh-1 text-warning uil-user-exclamation"></span> -->
            <span class="text-warning fs-3" data-feather="user-x" style="height: 40px; width: 40px;"></span>
            <h1 id="div2" class="fs-3 pt-3">
            <?php
                include_once("database/databaseconnect.php");

                // Executar a consulta SQL para obter o contador
                $sql = "SELECT COUNT(*) AS quantidade, subquery.idFuncionario, subquery.cpf, subquery.dataCadastro, subquery.dataAdmissao, subquery.dataNascimento, subquery.tipo
                FROM (
                    SELECT fcnpj.id AS idFuncionario, fcnpj.cnpj AS cpf, fcnpj.dataCadastro, fcnpj.dataAdmissao, fcnpj.dataNascimento, 'cnpj' AS tipo
                    FROM funcionarios_cnpj AS fcnpj
                    LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = fcnpj.id
                    WHERE tb_history_cadastro.id_funcionario IS NULL

                    UNION ALL

                    SELECT f.idFuncionario, f.cpf, f.dataCadastro, f.dataAdmissao, f.dataNascimento, 'cpf' AS tipo
                    FROM funcionarios AS f
                    LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = f.idFuncionario
                    WHERE tb_history_cadastro.id_funcionario IS NULL
                ) AS subquery;";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $contador = $row['quantidade'];

                    // Exibir o valor do contador
                    echo $contador;
                } else {
                    echo "Erro na consulta.";
                }

                // Fechar a conexão com o banco de dados
                // mysqli_close($conn);
                ?>




            </h1>

            <a class="nav-link" href = "content_pages.php?id=4" ><p class="fs--1 mb-0">Cadastros Incompletos</p></a>
        </div>
        <div
            class="col-6 col-md-4 col-xxl-2 text-center border-start-xxl border-bottom-xxl-0 border-bottom border-end border-end-md-0 pb-4 pb-xxl-0 pt-4 pt-md-0">
            <!-- <span class="uil fs-3 lh-1 uil-envelopes text-primary"></span> -->
            <span class="text-info fs-3" data-feather="users" style="height: 40px; width: 40px;"></span>
            <h1 id="resultado" class="fs-3 pt-3"></h1>
            <p class="fs--1 mb-0">Total Colaboradores</p>
        </div>
       <div
            class="col-6 col-md-4 col-xxl-2 text-center border-start-xxl border-end-md border-end-xxl-0 border-bottom border-bottom-md-0 pb-4 pb-xxl-0 pt-4 pt-xxl-0">

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





