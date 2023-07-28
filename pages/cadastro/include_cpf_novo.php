<div class="tab-pane fade  show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
    <h3>Cadastro Pessoa Fisica</h3>
    <form id="form_2" class="mb-3">
        <div class="row">

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
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf; ?>"
                        maxlength="14" oninput="formatarCPF(this)">

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

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="eSocial">eSocial:</label>
                    <input type="text" class="form-control" id="eSocial" name="eSocial" value="<?php echo $eSocial; ?>">
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
                    <input type="text" class="form-control" id="cnhTipo" name="cnhTipo" value="<?php echo $cnhTipo; ?>">
                </div>
            </div>
        </div>
        <!-- <div class="row">
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
                </div>-->
        <div class="row">
            <!-- <div class="col-sm-4">
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
                    </div> -->

        </div>
        <div class="row mb-3">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="eleitor">Titulo de Eleitor:</label>

                    <input type="text" class="form-control" id="eleitor" name="eleitor"
                        value="<?php echo $eleitor; ?>">
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="sigilo">Sigilo:</label>
                    <select class="form-control" id="sigilo" name="sigilo">
                        <option value="1" <?php if($sigilo == 1) echo "selected"; ?>>Sim</option>
                        <option value="0" <?php if($sigilo == 0) echo "selected"; ?>>Não</option>
                    </select>
                </div>
                <div class="col-md-4 d-none">
                    <label for="idFuncioanrio" class="form-label">Id Funcioanrio</label>
                    <input type="text" class="form-control" id="idFuncioanrio" name="idFuncioanrio"
                        value="<?php echo $id_funci; ?>">
                </div>
                <div class="col-md-4 d-none">
                    <label for="tipo_registro" class="form-label">tipo_registro</label>
                    <input type="text" class="form-control" id="tipo_registro" name="tipo_registro"
                        value="<?php echo $tipo; ?>">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>


</div>