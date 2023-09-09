<?php
// Verifique se o token de redefinição de senha foi fornecido na URL

if (isset($_GET["token"])) {
    $token = $_GET["token"];
    $email = $_GET["email"];

    // Verifique se o token é válido (você deve implementar sua própria lógica de verificação)
    $tokenValido = validarToken($token);

    if ($tokenValido) {
        // Se o token for válido, exiba um formulário para o usuário criar uma nova senha
        echo '
               <!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Resetar Senha</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/png/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/png/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/png/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/png/logo.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" href="assets/png/logo.png">
    <meta name="theme-color" content="#ffffff">
    <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/simplebar/simplebar.min.js"></script>
    <script src="assets/js/config.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
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
        var linkDefault = document.getElementById("style-default");
        var userLinkDefault = document.getElementById("ser-style-default");
        linkDefault.setAttribute("disabled", true);
        userLinkDefault.setAttribute("disabled", true);
        document.querySelector("html").setAttribute("dir", "rtl");
      } else {
        var linkRTL = document.getElementById("style-rtl");
        var userLinkRTL = document.getElementById("user-style-rtl");
        linkRTL.setAttribute("disabled", true);
        userLinkRTL.setAttribute("disabled", true);
      }
    </script>
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid px-0">
        <div class="container">
          <div class="row flex-center min-vh-100 py-5">
            <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="index.html">
                <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="assets/png/base_logo_white_background-removebg-preview.png" alt="phoenix" width="230" />
                </div>
              </a>
              <div class="text-center mb-6">
                <h4 class="text-1000">Resetar Senha</h4>
                <p class="text-700">Digite sua senha</p>
                <form class="mt-5">
                <input type="hidden" name="token" id="token" value="' . $token . '">
                <input type="hidden" name="email" id="email" value="' . $email . '">
                  <input class="form-control mb-2" id="password" type="password" placeholder="Nova senha" />
                  <input class="form-control mb-4" id="confirmPassword" type="password" placeholder="Confirmar nova senha" />
                  <p id="passwordError" class="text-danger"></p>

                  <button class="btn btn-primary w-100" type="submit">Salvar nova senha</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->





    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->


  </body>

</html>';
    } else {
       // Token inválido. Solicite um novo link de redefinição de senha.
       echo '
       <!DOCTYPE html>
       <html lang="en">
       <head>
           <meta charset="UTF-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <title>Token Inválido</title>
           <script>
               alert("Token inválido. Por favor, solicite um novo link de redefinição de senha.");
               window.location.href = "index.php"; // Redirecione para a página de solicitação de redefinição de senha
           </script>
       </head>
       <body>
           <p>Se você não for redirecionado, <a href="index.php">clique aqui</a>.</p>
       </body>
       </html>';
    }
} else {
   // Token de redefinição de senha não fornecido.
   echo '
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Token Não Fornecido</title>
       <script>
           alert("Token de redefinição de senha não fornecido.");
           window.location.href = "pagina-inicial.php"; // Redirecione para a página inicial ou outra página apropriada
       </script>
   </head>
   <body>
       <p>Se você não for redirecionado, <a href="pagina-inicial.php">clique aqui</a>.</p>
   </body>
   </html>';
}


// Função para validar o token (você deve implementar sua própria lógica de validação)
function validarToken($token) {
    // Conecte-se ao banco de dados (substitua pelas suas configurações de conexão)
    include 'database/databaseconnect.php';

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Consulte o banco de dados para verificar se o token existe e está dentro do limite de 20 minutos
    $sql = "SELECT * FROM token WHERE token = ? AND TIMESTAMPDIFF(MINUTE, created, NOW()) <= 20";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return true; // Token válido
    } else {
        return false; // Token inválido ou expirado
    }

    $stmt->close();
    $conn->close();
}




?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var passwordField = $("#password");
    var confirmPasswordField = $("#confirmPassword");
    var passwordError = $("#passwordError");

    $("form").submit(function(e) {
        e.preventDefault(); // Impede o envio do formulário padrão

        if (passwordField.val() !== confirmPasswordField.val()) {
            passwordError.text("As senhas não coincidem. Por favor, insira senhas iguais.");
        } else {
            // As senhas coincidem, faz uma solicitação AJAX para chamar a função PHP
            var token = $("#token").val();
            var novaSenha = passwordField.val();
            var email =$("#email").val();

            $.ajax({
                type: "POST",
                url: "funcao_alterar_senha.php",
                data: { token: token, password: novaSenha, email: email  },
                success: function(response) {
                    if (response === "success") {
                        // Senha atualizada com sucesso
                        console.log("Senha atualizada com sucesso!");
                        console.log("Código gerado: " + response.codigoGerado);
                    } else {
                        // Erro ao atualizar a senha
                        console.log("Erro ao atualizar a senha. Verifique o token ou tente novamente.");
                    }
                }
            });
        }
    });

    passwordField.on("input", function() {
        passwordError.text("");
    });

    confirmPasswordField.on("input", function() {
        passwordError.text("");
    });
});
</script>


