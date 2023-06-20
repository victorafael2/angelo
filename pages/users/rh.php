



<?php echo $_SERVER['SERVER_NAME'] ?>

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
                $sql = "SELECT COUNT(cpf) AS contador FROM (SELECT f.cpf, h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history
                FROM funcionarios f
                INNER JOIN tb_history_cadastro h ON f.idFuncionario = h.id_funcionario
                WHERE h.id_history IN (
                    SELECT MAX(id_history)
                    FROM tb_history_cadastro
                    GROUP BY id_funcionario
                )
                GROUP BY f.cpf, h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history) AS subconsulta";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $contador = $row['contador'];

                    // Exibir o valor do contador
                    echo $contador;
                } else {
                    echo "Erro na consulta.";
                }

                // Fechar a conexão com o banco de dados
                // mysqli_close($conn);
                ?>
            </h1>

            <a class="nav-link" href = "content_pages.php?id=2" ><p class="fs--1 mb-0">Funcionários Cadastrados</p></a>
        </div>
        <div
            class="col-6 col-md-4 col-xxl-2 text-center border-start-xxl border-end-xxl-0 border-bottom-xxl-0 border-end-md border-bottom pb-4 pb-xxl-0">
            <!-- <span class="uil fs-3 lh-1 text-warning uil-user-exclamation"></span> -->
            <span class="text-warning fs-3" data-feather="user-x" style="height: 40px; width: 40px;"></span>
            <h1 id="div2" class="fs-3 pt-3">
            <?php
                include_once("database/databaseconnect.php");

                // Executar a consulta SQL para obter o contador
                $sql = "select count(idFuncionario) as qtd FROM (SELECT funcionarios.*
                FROM funcionarios
                LEFT JOIN tb_history_cadastro ON tb_history_cadastro.id_funcionario = funcionarios.idFuncionario
                WHERE tb_history_cadastro.id_funcionario IS NULL) AS sub";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $contador = $row['qtd'];

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
            <p class="fs--1 mb-0">Total Funcionários</p>
        </div>
        <!-- <div
            class="col-6 col-md-4 col-xxl-2 text-center border-start-xxl border-end-md border-end-xxl-0 border-bottom border-bottom-md-0 pb-4 pb-xxl-0 pt-4 pt-xxl-0">
            <span class="uil fs-3 lh-1 uil-envelope-open text-info"></span>
            <h1 class="fs-3 pt-3">1,200</h1>
            <p class="fs--1 mb-0">Emails Opened</p>
        </div>
        <div
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





