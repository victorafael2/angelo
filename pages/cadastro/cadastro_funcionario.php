<form action="processar_formulario.php" method="POST">
    <div class="row">
        <!-- <div class="col-sm-4">
            <div class="form-group">
                <label for="idFuncionario">ID Funcionário:</label>
                <input type="text" class="form-control" id="idFuncionario" name="idFuncionario">
            </div>
        </div> -->
        <div class="col-sm-4">
            <div class="form-group">
                <label for="dataCadastro">Data de Cadastro:</label>
                <input type="date" class="form-control" id="dataCadastro" name="dataCadastro">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="dataAdmissao">Data de Admissão:</label>
                <input type="date" class="form-control" id="dataAdmissao" name="dataAdmissao">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="dataDemissao">Data de Demissão:</label>
                <input type="date" class="form-control" id="dataDemissao" name="dataDemissao">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="dataNascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" id="dataNascimento" name="dataNascimento">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="rgNumero">RG Número:</label>
                <input type="text" class="form-control" id="rgNumero" name="rgNumero">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="rgEmissor">RG Emissor:</label>
                <input type="text" class="form-control" id="rgEmissor" name="rgEmissor">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="rgUF">RG UF:</label>
                <input type="text" class="form-control" id="rgUF" name="rgUF">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="rgDataEmissao"> RG Data de Emissão:</label>
                <input type="date" class="form-control" id="rgDataEmissao" name="rgDataEmissao">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="cnhNumero">CNH Número:</label>
                <input type="text" class="form-control" id="cnhNumero" name="cnhNumero">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="cnhTipo">CNH Tipo:</label>
                <input type="text" class="form-control" id="cnhTipo" name="cnhTipo">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="ctpsNumero">CTPS Número:</label>
                <input type="text" class="form-control" id="ctpsNumero" name="ctpsNumero">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="ctpsSerie">CTPS Série:</label>
                <input type="text" class="form-control" id="ctpsSerie" name="ctpsSerie">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="ctpsDataEmissao">CTPS Data de Emissão:</label>
                <input type="date" class="form-control" id="ctpsDataEmissao" name="ctpsDataEmissao">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="ctpsUF">CTPS UF:</label>
                <input type="text" class="form-control" id="ctpsUF" name="ctpsUF">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="pisNumero">PIS Número:</label>
                <input type="text" class="form-control" id="pisNumero" name="pisNumero">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="eSocial">eSocial:</label>
                <input type="text" class="form-control" id="eSocial" name="eSocial">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="sigilo">Sigilo:</label>
                <select class="form-control" id="sigilo" name="sigilo">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>