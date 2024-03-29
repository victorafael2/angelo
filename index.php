<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Katrina Colab</title>
    <!-- Meta tag para o ícone personalizado -->
    <meta property="og:image" content="assets/png/Circulo.png">

    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/png/Circulo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/png/Circulo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/png/Circulo.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/png/Circulo.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/png/Circulo.png">
    <meta name="theme-color" content="#ffffff">
    <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/simplebar/simplebar.min.js"></script>
    <script src="assets/js/config.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
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



</head>


<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid px-0">
            <div class="container-fluid">
                <div class="bg-holder bg-auth-card-overlay"
                    style="background-image:url(assets/img/spot-illustrations/better_wall.png);">
                </div>
                <!--/.bg-holder-->




                <div class="row flex-center position-relative min-vh-100 g-0 py-5">
                    <div class="col-11 col-sm-5 col-xl-3">
                        <div class="card border border-300 auth-card " id="form_login" style="background-color: rgba(0, 0, 0, 0.5);">
                            <div class="card-body " >
                                <div class="row align-items-center gx-0 gy-7">

                                    <div class="col mx-auto">
                                        <div class="auth-form-box">
                                            <div class="text-center mb-4"><a
                                                    class="d-flex flex-center text-decoration-none mb-1" href="#">
                                                    <div
                                                        class="d-flex align-items-center fw-bolder fs-5 d-inline-block">
                                                        <img src="assets/png/base_logo_white_background-removebg-preview.png"
                                                            alt="phoenix" width="160" />
                                                    </div>
                                                </a>
                                                <h3 class="text-1000">Entrar</h3>
                                                <p class="text-700">Acesse sua conta</p>
                                            </div>

                                            <div class="mb-3 text-start">


                                                <form id="login-form" method="POST">
                                                    <label class="form-label" for="email">Email</label>
                                                    <div class="form-icon-container">
                                                        <input class="form-control form-icon-input" id="email"
                                                            name="email" type="email"
                                                            placeholder="name@example.com" /><span
                                                            class="fas fa-user text-900 fs--1 form-icon"></span>
                                                    </div>
                                            </div>
                                            <div class="mb-3 text-start">
                                                <label class="form-label" for="password">Senha</label>
                                                <div class="form-icon-container">
                                                    <input class="form-control form-icon-input" id="password"
                                                        name="senha" type="password" placeholder="Senha" /><span
                                                        class="fas fa-key text-900 fs--1 form-icon"></span>
                                                </div>
                                            </div>
                                            <div class="row flex-between-center mb-7">
                                                <div class="col-auto">
                                                    <a class="fs--1 fw-semi-bold" href="#"
                                                        id="forgot-password-link">Esqueceu a Senha?</a>


                                                    <div id="wait-text" style="display: none;">Aguarde...</div>

                                                </div>
                                            </div>
                                            <button class="btn btn-primary w-100 mb-3">Entrar</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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



        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


        <!-- <script>
document.getElementById('forgot-password-link').addEventListener('click', function(event) {
    event.preventDefault();
    var email = document.getElementById('email').value;
    if (email) {
        // Redirecionar para a página forgot-password.php com o email como parâmetro na URL
        window.location.href = 'forgot-password.php?email=' + encodeURIComponent(email);
    } else {
        alert('Por favor, preencha o campo de e-mail.');
    }
});
</script> -->

<script>

const formLogin = document.getElementById("form_login");
const phoenixTheme = localStorage.getItem("phoenixTheme"); // Supondo que você armazene o tema no localStorage

if (phoenixTheme === "light") {
  formLogin.style.backgroundColor = "rgba(255, 255, 255, 0.5)";
} else {
  formLogin.style.backgroundColor = "rgba(0, 0, 0, 0.5)"; // Preto com transparência
}

console.log(phoenixTheme);


</script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
        // Função para mostrar o texto "Aguarde..."
        function showWaitText() {
            var waitText = document.getElementById('wait-text');
            waitText.style.display = 'block';
        }

        // Função para ocultar o texto "Aguarde..."
        function hideWaitText() {
            var waitText = document.getElementById('wait-text');
            waitText.style.display = 'none';
        }

        document.getElementById('forgot-password-link').addEventListener('click', function(event) {
            event.preventDefault();
            var email = document.getElementById('email').value;
            if (email) {
                showWaitText(); // Mostrar o texto "Aguarde..." antes de enviar a solicitação AJAX
                // Enviar uma solicitação AJAX para o arquivo PHP
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'forgot-password.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                xhr.onload = function() {
                    hideWaitText(); // Ocultar o texto "Aguarde..." após a conclusão da solicitação AJAX
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Se o email foi enviado com sucesso, exibir uma mensagem SweetAlert2
                            Swal.fire({
                                title: 'Sucesso!',
                                text: response.message,
                                icon: 'success'
                            });
                        } else {
                            // Se ocorreu um erro no servidor, exibir uma mensagem de erro
                            Swal.fire({
                                title: 'Erro!',
                                text: response.message,
                                icon: 'error'
                            });
                        }
                    }
                };

                xhr.send('email=' + encodeURIComponent(email));
            } else {
                // alert('Por favor, preencha o campo de e-mail.');
                Swal.fire({
                    title: 'Erro!',
                    text: 'Por favor, preencha o campo de e-mail.',
                    icon: 'error'
                });
            }
        });
        </script>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(this);

            fetch('database/processa_login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login bem sucedido!',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1000 // Tempo em milissegundos que a mensagem deve ser exibida
                    }).then(function() {
                        // Redirect to the URL provided by the server
                        window.location.href = data.redirect;
                    });
                } else {

                    if (data.mathQuestion) {
                        // Se houver uma pergunta matemática, exiba-a em um modal
                        Swal.fire({
                                title: data.mathQuestionText,
                                input: 'text',
                                inputValue: '',
                                showCancelButton: true,
                                confirmButtonText: 'Enviar',
                                cancelButtonText: 'Cancelar',
                                inputValidator: (value) => {
                                    if (!value) {
                                        return 'Você precisa responder a pergunta matemática.';
                                    } else {
                                        // Remova espaços em branco e converta para inteiro
                                        const userAnswer = parseInt(value.replace(/\s+/g, ''));
                                        const correctAnswer = parseInt(data.mathAnswer);

                                        if (userAnswer === correctAnswer) {
                                            // Resposta correta
                                            return undefined; // Retorna undefined para indicar resposta válida
                                        } else {
                                            return 'Resposta incorreta. Tente novamente.';
                                        }
                                    }
                                }
                            }).then((result) => {
                            if (result.isConfirmed) {
                                // Se a resposta estiver correta, faça uma nova solicitação de login
                                formData.append('math_answer', result.value);
                                fetch('database/processa_login_recovery.php', {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(newData => {
                                    if (newData.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Login bem sucedido!',
                                            text: newData.message,
                                            showConfirmButton: false,
                                            timer: 1000
                                        }).then(function() {
                                            window.location.href = newData.redirect;
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erro de Login',
                                            text: newData.message
                                        });
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro de Login',
                            text: data.message
                        });
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });



</script>


</body>

</html>