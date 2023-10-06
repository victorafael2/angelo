<div class="container">
    <h1>Formulário de Justificativa</h1>
    <div class="row mb-2">
    <div class="col-md-4">
        <label>Tipo de Justificativa</label><br>
        <input type="radio" id="horasRadio" name="tipo_justificativa" value="horas" > Justificativa de Horas<br>
        <input type="radio" id="diasRadio" name="tipo_justificativa" value="dias" checked> Justificativa de Dias<br>
    </div>
</div>


    <form id="formulario" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">
                <label for="funcionario">Colaborador</label>
                <select class="form-control" id="funcionario" name="funcionario">
                    <?php


                        if ($conn->connect_error) {
                            die("Conexão falhou: " . $conn->connect_error);
                        }

                        // Query SQL para obter os funcionários
                        $query = "SELECT f.cpf, h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history, aux_cargos.cargo_nome, aux_vt.vt_nome, tb_sup.nome_social as superior_nome, aux_areas.nome_area, aux_operacoes.nome_operacao, aux_filiais.filial_nome, 'cpf' AS tipo
                        FROM funcionarios f
                        LEFT JOIN tb_history_cadastro h ON f.idFuncionario = h.id_funcionario AND h.tipo_registro = 'cpf'
                        LEFT JOIN aux_cargos ON aux_cargos.id_cargo = h.id_cargo
                        LEFT JOIN aux_vt ON aux_vt.id_vt = h.id_vt
                        LEFT JOIN tb_history_cadastro tb_sup ON tb_sup.id_funcionario = h.id_superior
                        LEFT JOIN aux_areas ON aux_areas.id_area = h.id_area
                        LEFT JOIN aux_operacoes ON aux_operacoes.id_operacao = h.id_operacao
                        LEFT JOIN aux_filiais ON aux_filiais.id_filial = h.id_filial
                        WHERE h.id_history IN (
                            SELECT MAX(id_history)
                            FROM tb_history_cadastro
                            WHERE ativo_cad = 1  -- Filtre por ativo_cad igual a 1
                            GROUP BY id_funcionario
                        )

                        UNION ALL

                        SELECT f_cnpj.cnpj AS 'cpf', h.id_funcionario, h.nome_social, h.nome_registro, h.sexo, h.genero, h.estado_civil, h.id_cargo, h.id_vt, h.id_superior, h.id_area, h.id_operacao, h.id_filial, h.id_history, aux_cargos.cargo_nome, aux_vt.vt_nome, tb_sup.nome_social as superior_nome, aux_areas.nome_area, aux_operacoes.nome_operacao, aux_filiais.filial_nome, 'cnpj' AS tipo
                        FROM funcionarios_cnpj AS f_cnpj
                        INNER JOIN tb_history_cadastro h ON f_cnpj.id = h.id_funcionario AND h.tipo_registro = 'cnpj'
                        LEFT JOIN aux_cargos ON aux_cargos.id_cargo = h.id_cargo
                        LEFT JOIN aux_vt ON aux_vt.id_vt = h.id_vt
                        LEFT JOIN tb_history_cadastro tb_sup ON tb_sup.id_funcionario = h.id_superior
                        LEFT JOIN aux_areas ON aux_areas.id_area = h.id_area
                        LEFT JOIN aux_operacoes ON aux_operacoes.id_operacao = h.id_operacao
                        LEFT JOIN aux_filiais ON aux_filiais.id_filial = h.id_filial
                        WHERE h.id_history IN (
                            SELECT MAX(id_history)
                            FROM tb_history_cadastro
                            WHERE ativo_cad = 1  -- Filtre por ativo_cad igual a 1
                            GROUP BY id_funcionario
                        );"; // Substitua pela sua consulta SQL

                        $result = $conn->query($query);
                        echo "<option value=''>Escolher Colaborador</option>";
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $value = $row["id_funcionario"] . '|' . $row["tipo"];
                                $nome_social = $row["nome_social"];
                                echo "<option value='$value'>$nome_social</option>";
                            }
                        } else {
                            echo "<option value='' disabled>Nenhum funcionário encontrado</option>";
                        }


                        ?>
                </select>
            </div>
            <div class="col-md-4">
                <!-- <label for="data">Data</label>
                <input type="date-range" class="form-control" id="data" name="data"> -->


                <label class="form-label" for="data">Data</label>

                <input class="form-control datetimepicker flatpickr-input" id="data" name="data" type="text" placeholder="dia/mês/ano a dia/mês/ano" data-options="{&quot;mode&quot;:&quot;range&quot;,&quot;dateFormat&quot;:&quot;d/m/Y&quot;,&quot;disableMobile&quot;:true}" readonly="readonly" wfd-id="id7">


            </div>
            <div class="col-md-4" id="caixa_hora_inicio">
                <label for="hora_inicio" id="hora_inicio_text">Hora inicio</label>
                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="00:00:00" onchange="validarHoras()">
            </div>
            <div class="col-md-4" id="caixa_hora_fim">
                <label for="hora_fim">Hora fim</label>
                <input type="time" class="form-control" id="hora_fim" name="hora_fim" value="00:00:00" onchange="validarHoras()">
            </div>
            <div class="col-md-4">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" oninput="validarDescricao(this)">
                <span id="descricaoErro" style="color: red;"></span>
            </div>
            <div class="col-md-4 d-none">
                <label for="user">Adicionado por</label>
                <input type="text" class="form-control" id="user" name="user" value=<?php echo $email ?>>
            </div>
        </div>

        <!-- <div class="row mt-3">
            <div class="col-md-12">
                <label for="anexo">Anexo</label>
                <input type="file" class="form-control-file" id="anexo" name="anexo">
            </div>
        </div> -->

        <div class="row mt-3">
    <div class="col-md-12">
        <label class="form-label" for="anexo">Anexo (Somente Imagens)</label>
        <input class="form-control" id="anexo" name="anexo" type="file" accept="image/*" />
    </div>
</div>

        <!-- Repita os blocos de código acima para adicionar mais linhas de itens -->

        <button type="submit" class="btn btn-primary mt-3">Enviar</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Esconder os campos de hora inicial e hora final inicialmente
    $("#hora_inicio").hide();
    $("#hora_fim").hide();
    $("#caixa_hora_inicio").hide();
            $("#caixa_hora_fim").hide();

    // Manipular a exibição dos campos com base na seleção do usuário
    $("input[name='tipo_justificativa']").change(function () {
        if ($("#horasRadio").is(":checked")) {
            // Se a opção "Justificativa de Horas" for selecionada, mostrar os campos de hora
            $("#hora_inicio").show();
            $("#hora_fim").show();
            $("#caixa_hora_inicio").show();
            $("#caixa_hora_fim").show();
        } else {
            // Se a opção "Justificativa de Horas" não for selecionada, ocultar os campos de hora
            $("#hora_inicio").hide();
            $("#hora_fim").hide();
            $("#caixa_hora_inicio").hide();
            $("#caixa_hora_fim").hide();
        }
    });
});


function validarHoras() {
    // Obter os valores dos campos de entrada
    var horaInicio = document.getElementById("hora_inicio").value;
    var horaFim = document.getElementById("hora_fim").value;

    // Converter as strings de hora em objetos Date
    var dataHoraInicio = new Date("1970-01-01T" + horaInicio + "Z");
    var dataHoraFim = new Date("1970-01-01T" + horaFim + "Z");

    // Comparar as datas e horas
    if (dataHoraFim < dataHoraInicio) {
        // Hora de término é menor que a hora de início, exibir uma mensagem de erro
        alert("A hora de término não pode ser menor que a hora de início");
        // Definir o valor de hora de término de volta para a hora de início ou outra ação apropriada
        document.getElementById("hora_fim").value = horaInicio;
    }
}


function validarDescricao(input) {
    const descricao = input.value.toLowerCase(); // Converter para minúsculas para evitar problemas com letras maiúsculas/minúsculas

    // Verificar se a descrição tem pelo menos 10 caracteres
    if (descricao.length < 10) {
        document.getElementById('descricaoErro').textContent = 'A descrição deve ter no mínimo 10 caracteres.';
        return;
    }



    // Verificar se a descrição não é sequencial
    for (let i = 0; i < descricao.length - 1; i++) {
        const charCode1 = descricao.charCodeAt(i);
        const charCode2 = descricao.charCodeAt(i + 1);
        if (charCode2 - charCode1 === 1) {
            document.getElementById('descricaoErro').textContent = 'A descrição não pode conter caracteres sequenciais.';
            return;
        }
    }

    // Se a descrição passar em todas as validações, limpe a mensagem de erro
    document.getElementById('descricaoErro').textContent = '';
}
</script>





<script>
document.addEventListener("DOMContentLoaded", function() {
    const formulario = document.getElementById("formulario");

    formulario.addEventListener("submit", function(event) {
        event.preventDefault();

        // Validar se todos os campos obrigatórios estão preenchidos
        const funcionario = document.getElementById("funcionario");
        const data = document.getElementById("data");
        const hora_inicio = document.getElementById("hora_inicio");
        const hora_fim = document.getElementById("hora_fim");
        const descricao = document.getElementById("descricao");
        const anexo = document.getElementById("anexo");
        const user = document.getElementById("user");

        if (!funcionario.value || !data.value || !hora_inicio.value || !hora_fim.value || !descricao
            .value || !anexo.value || !user.value) {
            Swal.fire({
                icon: "error",
                title: "Erro",
                text: "Por favor, preencha todos os campos.",
                confirmButtonText: "OK"
            });
            return;
        }

        const formData = new FormData(formulario);

        // Enviar o formulário via Ajax
        fetch("pages/cadastro/add/processar_justificativas.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    // Limpar o formulário
                    formulario.reset();

                    // Exibir a mensagem de sucesso
                    Swal.fire({
                        icon: "success",
                        title: "Sucesso",
                        text: "Dados enviados com sucesso!",
                        confirmButtonText: "OK"
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Erro",
                        text: data.message || "Ocorreu um erro ao enviar os dados.",
                        confirmButtonText: "OK"
                    });
                }
            })
            .catch(error => {
                console.error("Erro:", error);
                Swal.fire({
                    icon: "error",
                    title: "Erro",
                    text: "Ocorreu um erro ao enviar os dados.",
                    confirmButtonText: "OK"
                });
            });
    });
});
</script>