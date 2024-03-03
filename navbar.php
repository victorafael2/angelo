<!--
    <?php
    // Query to retrieve the data from the database
$query = "SELECT * FROM menu";
$result = mysqli_query($conn, $query);

?> -->


<?php
date_default_timezone_set('America/Fortaleza');

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// 2. Recuperar os dados do menu e submenu do banco de dados
$menuQuery = "SELECT * FROM menu where menu_name <> 'ADM'";
$menuResult = $conn->query($menuQuery);

$menuData = array(); // Array para armazenar os dados do menu

if ($menuResult->num_rows > 0) {
    while ($menuRow = $menuResult->fetch_assoc()) {
        $menuId = $menuRow['menu_id'];
        $submenuQuery = "SELECT * FROM submenu WHERE menu_id = $menuId and mostrar = 's' and tipo ='NAV'";
        $submenuResult = $conn->query($submenuQuery);

        $submenuData = array(); // Array para armazenar os dados do submenu

        if ($submenuResult->num_rows > 0) {
            while ($submenuRow = $submenuResult->fetch_assoc()) {
                $submenuData[] = $submenuRow;
            }
        }

        $menuRow['submenu'] = $submenuData; // Adicionar os dados do submenu ao menu
        $menuData[] = $menuRow; // Adicionar o menu ao array de dados do menu
    }
}

// 3. Gerar o código HTML dinamicamente
function generateMenuHTML($data)
{
    $html = '';

    foreach ($data as $menu) {
        // Replace spaces with underscores in menu_name
        $menu_id = str_replace(' ', '_', $menu['menu_name']);

        $html .= '<div class="nav-item-wrapper fs--1" >';
        $html .= '<a class="nav-link dropdown-indicator label-1" href="#' . $menu_id . '" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="' . $menu_id . ' " data-bs-toggle="tooltip" data-bs-placement="top" title="' . htmlspecialchars($menu['menu_name']) . '">';
        $html .= '<div class="d-flex align-items-center">';
        $html .= '<div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div>';
        $html .= '<span class="nav-link-icon">' . $menu['icone'] . '</span>';
        $html .= '<span class="nav-link-text text-wrap" >' . htmlspecialchars($menu['menu_name']) . '</span>';

        // Check the 'breve' property to decide whether to display additional text
        if ($menu['breve'] === 's') {
          $html .= '<span class="fa-solid fa-circle text-info ms-1 new-page-indicator" style="font-size: 6px"></span>';
          $html .= '<span class="badge ms-2 badge badge-phoenix badge-phoenix-info nav-link-badge">Breve</span>';
          // $html .= ' <i class="fa-solid fa-pen me-1"></i>';
      }
        $html .= '</div>';
        $html .= '</a>';
        $html .= '<div class="parent-wrapper label-1">';
        $html .= '<ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="' . $menu_id . '">';
        $html .= '<li class="collapsed-nav-item-title d-none">' . $menu['menu_name'] . '</li>';

        foreach ($menu['submenu'] as $submenu) {
            $html .= '<li class="nav-item fs--1"><a class="nav-link" href="content_pages.php?id=' . $submenu['submenu_id'] . '" data-bs-toggle="" aria-expanded="false">';
            $html .= '<div class="d-flex align-items-center"><span class="nav-link-text text-wrap">' . $submenu['submenu_name'] . '</span></div>';
            $html .= '</a></li>';
        }

        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';
    }

    return $html;
}


// Exibir o menu dinâmico no HTML
// echo generateMenuHTML($menuData);

// Fechar a conexão com o banco de dados
// $conn->close();
?>






<style>
.avatar-letter {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: lighter;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #708090;
    color: #fff;
    border: 1px solid #ccc;
    /* define a largura, estilo e cor da borda */
    border-color: #d3d3d3;
    /* define a cor da borda */
}

/* .avatar-letter:hover {
  background-color: #fff;
  color: #007bff;
} */

/* Estilos CSS para controlar o layout */
.parent-wrapper {
    /* Use flexbox para controlar o layout dos elementos filhos */
    display: flex;
    flex-wrap: wrap;
    /* Permite a quebra de linha */
}

.nav-item {
    /* Defina a largura para evitar que os itens ocupem toda a largura disponível */
    width: 100%;
    /* Por exemplo, para dividir em duas colunas */
    /* Altere o valor de acordo com o número de colunas desejado */
}
</style>


<nav class="navbar navbar-vertical navbar-expand-lg">
    <script>
    var navbarStyle = window.config.config.phoenixNavbarStyle;
    if (navbarStyle && navbarStyle !== 'transparent') {
        document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
    }
    </script>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">


                <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label mb--3">Menu
                    </p>
                    <hr class="navbar-vertical-line" />






                    <?php // Exibir o menu cascata no HTML
                            echo generateMenuHTML($menuData);
                            ?>





                </li>




            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <button
            class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><span
                class="uil uil-left-arrow-to-left fs-0"></span><span class="uil uil-arrow-from-right fs-0"></span><span
                class="navbar-vertical-footer-text ms-2">Encolher</span></button>
        <!-- <p><?php
$dataHoraAtual = date('Y-m-d H:i:s');
echo $dataHoraAtual;
?></p> -->

    </div>
</nav>
<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">

            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span
                    class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="<?php echo $_SESSION['destinationPage']; ?>">

                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center"><img src="assets/png/inove_logo_novo.svg" alt="crm"
                            width="80" />
                        <!-- <p class="logo-text ms-2 d-none d-sm-block">CRM</p> -->
                    </div>
                </div>
            </a>
        </div>
        <!-- <div class="search-box navbar-top-search-box d-none d-lg-block" data-list='{"valueNames":["title"]}' style="width:25rem;">
              <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                <input class="form-control search-input fuzzy-search rounded-pill form-control-sm" type="search" placeholder="Search..." aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>

              </form>
              <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search">
                <button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button>
              </div>
              <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
                <div class="scrollbar-overlay" style="max-height: 30rem;">
                  <div class="list pb-3">
                    <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span class="text-500">results</span></h6>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Recently Searched </h6>
                    <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"><span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> Store Macbook</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Products</h6>
                    <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="apps/e-commerce/landing/product-details.html">
                        <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3" src="assets/img/products/60x60/3.png" alt="" /></div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                          <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB Memory - 1.6GHz - 128GB Storage</span></p>
                        </div>
                      </a>
                      <a class="dropdown-item py-2 d-flex align-items-center" href="apps/e-commerce/landing/product-details.html">
                        <div class="file-thumbnail me-2"><img class="img-fluid" src="assets/img/products/60x60/3.png" alt="" /></div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                          <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Quick Links</h6>
                    <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"><span class="fa-solid fa-link text-900" data-fa-transform="shrink-2"></span> Support MacBook House</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-link text-900" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Files</h6>
                    <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"><span class="fa-solid fa-file-zipper text-900" data-fa-transform="shrink-2"></span> Library MacBook folder.rar</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-file-lines text-900" data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-image text-900" data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Members</h6>
                    <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="pages/members.html">
                        <div class="avatar avatar-l status-online  me-2 text-900">
                          <img class="rounded-circle " src="assets/img/team/40x40/10.webp" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                          <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                        </div>
                      </a>
                      <a class="dropdown-item py-2 d-flex align-items-center" href="pages/members.html">
                        <div class="avatar avatar-l  me-2 text-900">
                          <img class="rounded-circle " src="assets/img/team/40x40/12.webp" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">John Smith</h6>
                          <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Related Searches</h6>
                    <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"><span class="fa-brands fa-firefox-browser text-900" data-fa-transform="shrink-2"></span> Search in the Web MacBook</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-brands fa-chrome text-900" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                        </div>
                      </a>

                    </div>
                  </div>
                  <div class="text-center">
                    <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                  </div>
                </div>
              </div>
            </div> -->
        <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                    <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Dark Mode"><span class="icon"
                            data-feather="moon"></span></label>
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Dark Mode"><span class="icon"
                            data-feather="sun"></span></label>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" data-bs-auto-close="outside"><span data-feather="bell"
                        style="height:20px;width:20px;"></span></a>

                <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret"
                    id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                    <div class="card position-relative border-0">
                        <div class="card-header p-2">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-black mb-0">Notificações</h5>
                                <!-- <button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button> -->
                            </div>
                        </div>
                        <div class="card-body p-0">

                        </div>
                        <div class="card-footer p-0 border-top border-0">
                            <div class="my-2 text-center fw-bold fs--2 text-600"></div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown d-none">
                <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false">
                    <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                    </svg></a>

                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300"
                    aria-labelledby="navbarDropdownNindeDots">

                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-l ">
                        <!-- <img class="rounded-circle " src="assets/img/team/40x40/57.webp" alt="" /> -->
                        <!-- <?php
                            function getInitialLetter($name) {
                              return strtoupper(substr($name, 0, 1));
                            }

                            // $name = 'João';

                            echo '<div class="avatar-letter">' . getInitialLetter($name) . '</div>';


                            ?> -->
                        <?php


                          // Obtém o valor da coluna picture_profile da tabela user
                          $sql = "SELECT picture_profile FROM user WHERE email=?";
                          $stmt = $conn->prepare($sql);

                          // Verifica se a preparação da consulta foi bem-sucedida
                          if ($stmt) {
                              // Associa os parâmetros e executa a consulta
                              $stmt->bind_param("s", $email);
                              $stmt->execute();
                              $stmt->store_result();

                              // Verifica se a consulta retornou alguma linha
                              if ($stmt->num_rows > 0) {
                                  // Faz o bind do resultado
                                  $stmt->bind_result($picture_profile);

                                  // Obtém o resultado
                                  $stmt->fetch();

                                  // Verifica se o campo picture_profile está vazio
                                  if (empty($picture_profile)) {
                                      // Se o campo picture_profile estiver vazio, exibe a letra inicial
                                      echo '<div class="avatar-letter">' . getInitialLetter($name) . '</div>';
                                  } else {
                                      // Se o campo picture_profile não estiver vazio, exibe a imagem de perfil
                                      echo '<div class="avatar avatar-xl avatar-bordered me-4">';
                                      echo '<img src="data:image/jpeg;base64,' . $picture_profile . '" class="rounded-circle" alt="Imagem de Perfil">';
                                      echo '</div>';
                                  }
                              }
                              $stmt->close();
                          } else {
                              // Se a preparação da consulta falhou, exibe uma mensagem de erro
                              echo '<div class="avatar-letter">' . getInitialLetter($name) . '</div>';
                          }
                          ?>

                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-5xl ">
                                    <!-- <img class="rounded-circle " src="assets/img/team/72x72/57.webp" alt="" />
                         -->
                                    <!-- <?php


                            echo '<div class="avatar-letter">' . getInitialLetter($name) . '</div>';

                            ?> -->

                                    <!-- <div class="avatar avatar-5xl avatar-bordered me-4">
  <img class="rounded-circle " src="../../assets/img/team/30.webp" alt="" />

</div> -->
                                    <?php


                                            // Obtém o valor da coluna picture_profile da tabela user
                                            $sql = "SELECT picture_profile FROM user WHERE email=?";
                                            $stmt = $conn->prepare($sql);

                                            // Verifica se a preparação da consulta foi bem-sucedida
                                            if ($stmt) {
                                                // Associa os parâmetros e executa a consulta
                                                $stmt->bind_param("s", $email);
                                                $stmt->execute();
                                                $stmt->store_result();

                                                // Verifica se a consulta retornou alguma linha
                                                if ($stmt->num_rows > 0) {
                                                    // Faz o bind do resultado
                                                    $stmt->bind_result($picture_profile);

                                                    // Obtém o resultado
                                                    $stmt->fetch();

                                                    // Verifica se o campo picture_profile está vazio
                                                    if (empty($picture_profile)) {
                                                        // Se o campo picture_profile estiver vazio, exibe a letra inicial
                                                        echo '<div class="avatar-letter">' . getInitialLetter($name) . '</div>';
                                                    } else {
                                                        // Se o campo picture_profile não estiver vazio, exibe a imagem de perfil
                                                        echo '<div class="avatar avatar-5xl avatar-bordered me-4">';
                                                        echo '<img src="data:image/jpeg;base64,' . $picture_profile . '" class="rounded-circle" alt="Imagem de Perfil">';
                                                        echo '</div>';
                                                    }
                                                }
                                                $stmt->close();
                                            } else {
                                                // Se a preparação da consulta falhou, exibe uma mensagem de erro
                                                echo '<div class="avatar-letter">' . getInitialLetter($name) . '</div>';
                                            }
                                            ?>

                                </div>


                                <h6 class="mt-2 text-black"><?php echo $name ?></h6>
                            </div>
                            <!-- <div class="mb-3 mx-3">
                        <input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" />
                      </div> -->
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 10rem;">

                            <?php
// echo $_SESSION['adm'];
                                                                // Consulta para obter os itens do menu
                                                                if ($_SESSION['adm'] == 'x') {
                                                                  $condition = "";
                                                              } else {
                                                                  $condition = "AND (NOT adm = 'x' OR adm IS NULL)";
                                                              }
                                        $sql_menu_adm = "SELECT * FROM submenu WHERE  mostrar = 's' and tipo ='ADM' $condition";
                                        $result_menu_adm = $conn->query($sql_menu_adm);

                                        // Verifica se a consulta retornou resultados
                                        if ($result_menu_adm->num_rows > 0) {
                                            // Inicia a construção da lista de itens do menu
                                            echo '<ul class="nav d-flex flex-column mb-2 pb-1">';

                                            // Loop através dos resultados da consulta
                                            while ($row = $result_menu_adm->fetch_assoc()) {
                                                // Obtém os valores das colunas "texto" e "icone" para cada item
                                                $texto_menu_adm = $row["submenu_name"];
                                                $icone_menu_adm = $row["icone"];
                                                $url_menu_adm = $row["submenu_id"];

                                                // Cria o item do menu
                                                echo '<li class="nav-item"><a class="nav-link px-3" href="content_pages.php?id=' . $url_menu_adm . '">';
                                                echo '<span class="me-2 text-900" data-feather="' . $icone_menu_adm . '"></span>';
                                                echo '<span>' . $texto_menu_adm . '</span></a></li>';
                                            }

                                            // Fecha a lista de itens do menu
                                            echo '</ul>';
                                        } else {
                                            echo "Nenhum item encontrado.";
                                        }
                            ?>



                        </div>
                        <div class="card-footer p-0 border-top ">
                            <ul class="nav d-flex flex-column my-3 d-none">
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="user-plus"></span>Add another account</a></li>
                            </ul>
                            <hr />
                            <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100"
                                    href="database/logout.php">
                                    <span class="me-2" data-feather="log-out"> </span>Sair</a></div>
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1"
                                    href="content_pages.php?id=40">Política de Privacidade</a>
                                <!-- <a class="text-600 mx-1"
                                    href="#!">Terms</a>&bull;
                                    <a class="text-600 ms-1" href="#!">Cookies</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>