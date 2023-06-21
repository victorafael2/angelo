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
        <span class="fa-solid fa-house-chimney me-2"></span>Endereço
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link" id="contato-tab" data-bs-toggle="tab" href="#tab-contato" role="tab" aria-controls="tab-contato" aria-selected="true">
        <span class="fa-solid fa-address-book me-2"></span>Contato
        </a>
    </li>
</ul>

<div class="tab-content mt-3" id="myTabContent">









    <?php include 'pages/config/insert/opcoes/vt.php'?>

    <?php include 'pages/config/insert/opcoes/va.php'?>

    <?php include 'pages/config/insert/opcoes/operacoes.php'?>

    <?php include 'pages/config/insert/opcoes/filiais.php'?>

    <?php include 'pages/config/insert/opcoes/areas.php'?>

    <?php include 'pages/config/insert/opcoes/cargos.php'?>

    <?php include 'pages/config/insert/opcoes/sistemas.php'?>

    <?php include 'pages/config/insert/opcoes/beneficios.php'?>

    <?php include 'pages/config/insert/opcoes/acessos.php'?>

    <?php include 'pages/config/insert/opcoes/info_bancario.php'?>

    <?php include 'pages/config/insert/opcoes/endereco.php'?>

    <?php include 'pages/config/insert/opcoes/contato.php'?>









</div>



















