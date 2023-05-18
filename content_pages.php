<?php
include 'header.php';
include 'navbar.php';

$id = $_GET['id'];

$query = "SELECT * FROM submenu where submenu_id = $id";
$result = mysqli_query($conn, $query);

?>

<div class="content">

    <!-- Criar todo conteurdo depois da primeira linha -->


                     <?php
                                            // Generate the HTML code dynamically
                          while ($row = mysqli_fetch_assoc($result)) {
                            $caminho = $row['submenu_link'];

                            include $caminho;

                          }

                          ?>


<div class="nav-item-wrapper">
    <a class="nav-link dropdown-indicator label-1" href="#Funcionarios" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="Funcionarios">
      <div class="d-flex align-items-center">
        <div class="dropdown-indicator-icon">
          <span class="fas fa-caret-right"></span>
        </div>
        <span class="nav-link-icon">
          <span data-feather="users"></span>
        </span>
        <span class="nav-link-text">Funcionarios</span>
      </div>
    </a>
    <div class="parent-wrapper label-1">
      <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="Funcionarios">
        <li class="collapsed-nav-item-title d-none">Funcionarios</li>
        <li class="nav-item">
          <a class="nav-link" href="content_pages.php?id=1" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center">
              <span class="nav-link-text">Cadastro de Funcionarios</span>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="content_pages.php?id=2" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center">
              <span class="nav-link-text">Listar Funcionarios</span>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>













<?php include 'footer.php' ?>