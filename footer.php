<style>
        /* Importe a fonte Ringel Star (substitua 'URL_DA_FONTE' pelo caminho real da fonte) */
        @font-face {
            font-family: 'Ringel Star';
            src: url('assets/fonte/Rigelstar.ttf') format('truetype');
        }

        /* Aplique a fonte Ringel Star ao elemento <p> com a classe "text-900" */
        p.better {
            font-family: 'ringel star', sans-serif;
            /* Outros estilos CSS, se desejados */
        }
    </style>

<footer class="footer position-absolute">
<div class="row g-0  align-items-center h-100">
<div class="d-flex justify-content-between align-items-center">
  <div class=" flex-fill justify-content-between align-items-center ">
      <img class="d-dark-none" src="assets/png/black_logo_transparent_background-1.png " alt="Better" width="50"  class="img-fluid">
      <img class="d-light-none" src="assets/png/watermark_logo_transparent_background.png " alt="Better" width="50"  class="img-fluid">
    </div>
  <div class="flex-fill justify-content-between align-items-center"><p class="mb-0 mt-2 mt-sm-0 text-900 better fs--1 d-inline-block">Inteligência e resultados para seu negócio<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2023 &copy;</p></div>
  <div class=" flex-fill text-end"><p class="mb-0 text-600">v1.08.26</p></div>
</div>
</div>
  <!-- <div class="row g-0 justify-content-between align-items-center h-100">
    <div class="col-12 col-sm-auto">
    <img class="d-dark-none" src="assets/png/black_logo_transparent_background-1.png " alt="Better" width="50"  class="img-fluid">
      <img class="d-light-none" src="assets/png/watermark_logo_transparent_background.png " alt="Better" width="50"  class="img-fluid">

      <p class="mb-0 mt-2 mt-sm-0 text-900 better fs--1 d-inline-block">Inteligência e resultados para seu negócio<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2023 &copy;</p>
    </div>
    <div class="col-12 col-sm-auto text-center">
      <p class="mb-0 text-600">v1.08.26</p>
    </div>
  </div> -->
</footer>


  </div>
      </div>
      <script>
        var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
        var navbarTop = document.querySelector('.navbar-top');
        if (navbarTopStyle === 'darker') {
          navbarTop.classList.add('navbar-darker');
        }

        var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
        var navbarVertical = document.querySelector('.navbar-vertical');
        if (navbarVertical && navbarVerticalStyle === 'darker') {
          navbarVertical.classList.add('navbar-darker');
        }
      </script>

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->





    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/anchorjs/anchor.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/list.js/list.min.js"></script>
    <script src="vendors/feather-icons/feather.min.js"></script>
    <script src="vendors/dayjs/dayjs.min.js"></script>
    <script src="assets/js/phoenix.js"></script>
    <script src="vendors/choices/choices.min.js"></script>
    <script src="vendors/prism/prism.js"></script>
    <!-- <script src="assets/js/phoenix.js"></script>
    <script src="vendors/list.js/list.min.js"></script> -->

    <script>

const timeout = 15;

// Definindo a função que exibe o SweetAlert2
function exibirAlerta() {
  Swal.fire({
    title: 'Sessão prestes a expirar!',
    text: 'Sua sessão será encerrada em breve. Deseja continuar?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sim',
    cancelButtonText: 'Não'
  }).then((result) => {
    if (result.isConfirmed) {
      // Se o usuário confirmar, reinicie o contador de inatividade
      reiniciarTempoInatividade();
    } else {
      // Se o usuário clicar em cancelar, redirecione para a página de login ou encerre a sessão
      // ...


      // Redireciona o usuário para a página de login
      window.location.href = "database/logout.php";
    }
  });
}

// Definindo a função que reinicia o contador de inatividade
function reiniciarTempoInatividade() {
  clearTimeout(contadorInatividade);
  contadorInatividade = setTimeout(exibirAlerta, timeout * 60 * 1000);
}

// Definindo a variável que armazena o tempo de inatividade
let contadorInatividade = setTimeout(exibirAlerta, timeout * 60 * 1000);

// Definindo os eventos que reiniciam o contador de inatividade
document.addEventListener('mousemove', reiniciarTempoInatividade);
document.addEventListener('keydown', reiniciarTempoInatividade);
document.addEventListener('click', reiniciarTempoInatividade);


</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function generateUniqueID() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = (Math.random() * 16) | 0,
            v = c == 'x' ? r : (r & 0x3) | 0x8;
        return v.toString(16);
    });
}

// Use o ID exclusivo gerado onde for necessário
var uniqueID = generateUniqueID();


    var startTime = new Date();


    // Função para obter o ID da URL
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    // Quando a página é carregada (aberta)
    $(document).ready(function() {
        startTime = new Date();

        var userEmail = '<?php echo $_SESSION['email']; ?>';
        var pageID = getParameterByName('id'); // Obtém o valor do ID da URL

        // Enviar solicitação para registrar a abertura da página
        $.ajax({
            url: 'pages/users/log.php',
            type: 'POST',
            data: { action: 'open', page_id: pageID, user_id: userEmail, uniqueID },
            success: function(response) {
                console.log('Abertura da página registrada.');
            }
        });
    });


// Definir uma função para enviar dados a cada 10 segundos
function sendDataToServer() {
    var endTime = new Date();
    var duration = (endTime - startTime) / 1000; // Duração em segundos

    var userEmail = '<?php echo $_SESSION['email']; ?>';
    var pageID = getParameterByName('id'); // Obtém o valor do ID da URL

    // Enviar solicitação para registrar o fechamento da página
    $.ajax({
        url: 'pages/users/log.php',
        type: 'POST',
        data: { action: 'close', page_id: pageID, duration: duration, user_id: userEmail, uniqueID },
        success: function(response) {
            console.log('Fechamento da página registrado.');
        }
    });
}

// Executar a função a cada 10 segundos
setInterval(sendDataToServer, 10000); // 10000 milissegundos = 10 segundos

</script>





  </body>

</html>