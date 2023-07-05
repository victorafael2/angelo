<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
    <h3>Cadastro Pessoa Jurídica</h3>
    <form id="form" class="fs--1">

        <div class="row row-cols-3 g-2 align-items-center ">

            <div class="form-group col-md-6 mb-2">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="xx.xxx.xxx/xxxx-xx" value="<?php echo $cnpj; ?>">
            </div>

            <button type="button" id="edit_button" class="btn btn-secondary mt-4">Editar Campos</button>


        </div>
        <div class="row mb-2">

            <div class="form-group col-md-4">
                <label for="nome_fantasia">Nome Fantasia</label>
                <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia"
                    placeholder="Nome Fantasia" value="<?php echo $nome_fantasia; ?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="razao_social">Razão Social</label>
                <input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="Razão Social"
                    value="<?php echo $razao_social; ?>" disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="abertura">Abertura</label>
                <input type="text" class="form-control" id="abertura" name="abertura" placeholder="Abertura"
                    value="<?php echo $abertura; ?>" disabled>
            </div>

        </div>
        <div class="row mb-2">

            <div class="form-group col-md-12">
                <label for="atividade_principal">Atividade Principal</label>
                <input type="text" class="form-control" id="atividade_principal" name="atividade_principal"
                    placeholder="Atividade Principal" value="<?php echo $atividade_principal; ?>" disabled>
            </div>
        </div>

        <div class="row mb-2">
            <div class="form-group col-md-6">
                <label for="logradouro">Logradouro</label>
                <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro"
                    value="<?php echo $logradouro; ?>" disabled>
            </div>

            <div class="form-group col-md-4">
                <label for="municipio">Município</label>
                <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Município"
                    value="<?php echo $municipio; ?>" disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="situacao">Situação</label>
                <input type="text" class="form-control" id="situacao" name="situacao" placeholder="Situação"
                    value="<?php echo $situacao; ?>" disabled>
            </div>
        </div>
        <div class="row mb-2">
            <div class="form-group col-md-4">
                <label for="porte">Porte</label>
                <input type="text" class="form-control" id="porte" name="porte" placeholder="Porte"
                    value="<?php echo $porte; ?>" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="uf">UF</label>
                <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" value="<?php echo $uf; ?>" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo" value="<?php echo $tipo_cnpj; ?>" disabled>
            </div>
        </div>
        <div class="row mb-2">

            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="<?php echo $telefone; ?>" disabled>
            </div>

        </div>



        <div class="row mb-2">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="dataCadastro">Data de Cadastro:</label>
                        <input type="date" class="form-control" id="dataCadastro" name="dataCadastro" value="<?php echo $dataCadastro; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="dataAdmissao">Data de Admissão:</label>
                        <input type="date" class="form-control" id="dataAdmissao" name="dataAdmissao" value="<?php echo $dataAdmissao; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="dataDemissao">Data de Demissão:</label>
                        <input type="date" class="form-control" id="dataDemissao" name="dataDemissao" value="<?php echo $dataDemissao; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="dataNascimento">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="<?php echo $dataNascimento; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cnhNumero">Número da CNH:</label>
                        <input type="text" class="form-control" id="cnhNumero" name="cnhNumero" value="<?php echo $cnhNumero; ?>">
                    </div>
                </div>

            </div>

        </div>

        <div class="row mb-2">

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="cnhTipo">CNH Tipo:</label>
                    <div class="checkbox-group">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="cnhTipo" value="A" <?php if($cnhTipo == "A") echo "checked"; ?>> Categoria A
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="cnhTipo" value="B" <?php if($cnhTipo == "B") echo "checked"; ?>> Categoria B
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="cnhTipo" value="C" <?php if($cnhTipo == "C") echo "checked"; ?>> Categoria C
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="cnhTipo" value="D" <?php if($cnhTipo == "D") echo "checked"; ?>> Categoria D
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="cnhTipo" value="E" <?php if($cnhTipo == "E") echo "checked"; ?>> Categoria E
                            </label>
                        </div>
                    </div>
                </div>
            </div>


        </div>

      

        <br>

        <button type="submit" class="btn btn-success mt-5">Cadastrar</button>
    </form>
</div>
