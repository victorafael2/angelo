<?php
include_once("database/databaseconnect.php");
// Inicie uma nova sessão ou retome uma sessão existente
session_start();
if (isset($_SESSION['atividade']) && (time() - $_SESSION['atividade'] > 1800)) {

  session_unset();
  session_destroy();
  // header("Location: index.html");
}
$_SESSION['atividade'] = time();

if (isset($_SESSION['email'])) {
  // echo 'A sessão foi iniciada!';
} else {
  header('Location: index.php');
}

// Armazene uma variável de sessão chamada "nome" com o valor "João"
$email = $_SESSION['email'];

$sql = "SELECT * FROM user WHERE email='$email' ";
$result = mysqli_query($conn, $sql);
while ($row1 = mysqli_fetch_array($result)) {
    $name = $row1['name'];
    $id_user = $row1['id'] ;   // $pagina = $row1['link'];


    }

?>

<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Katrina Colab</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/png/Circulo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/png/Circulo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/png/Circulo.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/png/Circulo.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" href="assets/png/Circulo.png">
    <meta name="theme-color" content="#ffffff">
    <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/simplebar/simplebar.min.js"></script>
    <script src="assets/js/config.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link href="vendors/choices/choices.min.css" rel="stylesheet">
    <link href="vendors/prism/prism-okaidia.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>


<script>
    // Wait for the page to finish loading
    window.addEventListener('load', function () {
        // Hide the loading overlay when the page finishes loading
        var loadingOverlay = document.querySelector('.loading-overlay');
        loadingOverlay.style.display = 'none';
    });
</script>

<style>

    /* Importe a fonte Ringel Star (substitua 'URL_DA_FONTE' pelo caminho real da fonte) */
    @font-face {
            font-family: 'Ringel Star';
            src: url('assets/fonte/Rigelstar.ttf') format('truetype');
        }

        /* Aplique a fonte Ringel Star ao elemento <p> com a classe "text-900" */
        p.texto-carregamento {
            font-family: 'ringel star', sans-serif;
            /* Outros estilos CSS, se desejados */
        }

        span.word {
          font-family: 'ringel star', sans-serif;
            /* Outros estilos CSS, se desejados */

        }

.loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 99999; /* Place it on top of other elements */
    }
    #loading-bar {
        background-color: #4CAF50;
        height: 3px;
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        z-index: 9999;
        width: 0%
    }


    .spinnerContainer {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .spinner {
        width: 56px;
        height: 56px;
        display: grid;
        border: 4px solid #0000;
        border-radius: 50%;
        border-right-color:  #A852A5;
        animation: tri-spinner 1s infinite linear;
    }

    .spinner::before,
    .spinner::after {
        content: "";
        grid-area: 1/1;
        margin: 2px;
        border: inherit;
        border-radius: 50%;
        animation: tri-spinner 2s infinite;
    }

    .spinner::after {
        margin: 8px;
        animation-duration: 3s;
    }

    @keyframes tri-spinner {
        100% {
            transform: rotate(1turn);
        }
    }

    .loader {
        /* The above code is a comment in PHP. It is used to provide information or explanations about
        the code to other developers or to remind oneself about the code's purpose. In this case,
        the comment is specifying the color value for something, possibly a CSS style. */
        /* color: #4a4a4a; */
        /* font-family: "Poppins", sans-serif; */
        font-weight: 500;
        font-size: 25px;
        -webkit-box-sizing: content-box;
        box-sizing: content-box;
        height: 40px;
        padding: 10px 10px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        border-radius: 8px;
    }

    .words {
        overflow: hidden;
    }

    .texto-carregamento {
        color: #A852A5;
        font-weight: bold;
    }

    .word {
        display: block;
        height: 100%;
        padding-left: 6px;
        color:   #6AB6F0;
        animation: cycle-words 5s infinite;
    }

    @keyframes cycle-words {
        10% {
            -webkit-transform: translateY(-105%);
            transform: translateY(-105%);
        }

        25% {
            -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
        }

        35% {
            -webkit-transform: translateY(-205%);
            transform: translateY(-205%);
        }

        50% {
            -webkit-transform: translateY(-200%);
            transform: translateY(-200%);
        }

        60% {
            -webkit-transform: translateY(-305%);
            transform: translateY(-305%);
        }

        75% {
            -webkit-transform: translateY(-300%);
            transform: translateY(-300%);
        }

        85% {
            -webkit-transform: translateY(-405%);
            transform: translateY(-405%);
        }

        100% {
            -webkit-transform: translateY(-400%);
            transform: translateY(-400%);
        }
    }
    </style>



  </head>



  <body>

  <div class="loading-overlay">
        <div class="spinnerContainer">
            <div class="spinner"></div>
            <div class="loader">
                <p class="texto-carregamento">carregando</p>
                <div class="words">
                    <span class="word">colaboradores</span>
                    <span class="word">usuários</span>
                    <span class="word">supervisores</span>
                    <span class="word">relatórios</span>
                    <span class="word">estrutura</span>

                </div>
            </div>
        </div>
    </div>



    <script>
    // Simula o carregamento da página (tempo em milissegundos)
    const tempoDeCarregamento = 4000;

    // Função para iniciar a animação da barra de carregamento
    function iniciarBarraDeCarregamento() {
        const progressBarFill = document.getElementById('loading-bar');
        let width = 0;
        const incremento = 100 / (tempoDeCarregamento / 100); // Aumento percentual da barra por milissegundo

        function atualizarBarra() {
            width += incremento;
            progressBarFill.style.width = width + '%';
            if (width < 100) {
                requestAnimationFrame(atualizarBarra);
            }
        }

        requestAnimationFrame(atualizarBarra);
    }

    // Chama a função de início após o DOM ser carregado
    document.addEventListener('DOMContentLoaded', iniciarBarraDeCarregamento);
    </script>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid px-0">




