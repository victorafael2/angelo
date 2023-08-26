<footer class="footer position-absolute">
    <div class="row g-0 justify-content-between align-items-center h-100">
      <div class="col-12 col-sm-auto text-center">
        <p class="mb-0 mt-2 mt-sm-0 text-900">Obrigado por criar com Better Consultoria<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2023 &copy;</p>
      </div>
      <div class="col-12 col-sm-auto text-center">
        <p class="mb-0 text-600">v1.08.26</p>
      </div>
    </div>
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



  </body>

</html>