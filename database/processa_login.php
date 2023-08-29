<?php
include_once("databaseconnect.php");
$email = $_POST['email'];
$senha = md5($_POST['senha']);




// Execute a consulta SQL para buscar o usuário e senha na tabela de usuários
$sql = "SELECT * FROM user AS u
INNER JOIN user_group AS ug ON ug.id=u.grupo_acesso
INNER JOIN submenu AS s ON s.submenu_id = ug.id_link

WHERE email='$email' AND senha='$senha'";
$result = mysqli_query($conn, $sql);

// Verifique se a consulta retornou algum resultado
if (mysqli_num_rows($result) > 0) {
    // Login bem sucedido
    session_start();
    $_SESSION['email'] = $email;
    // Busque a página de destino com base no campo de página do usuário
    $user = mysqli_fetch_assoc($result);
    $destinationPage = $user['submenu_id'];

    // Armazene o valor na variável de sessão
    /* The line `// ['destinationPage'] = ;` is commented out, which means it
    is not being executed. However, it appears to be intended to store the value of the
    `` variable in a session variable named `destinationPage`. This session variable
    could then be used to redirect the user to the appropriate page after login. */
    $_SESSION['destinationPage'] = $destinationPage;


        // Redirect to another page if needed
        $response['success'] = true;
        $response['redirect'] = 'content_pages.php?id=' . $destinationPage . '';


    // Redirecione para a página de destino
    // echo "Login bem sucedido!";
    // header('Location: ../content_pages.php?id=' . $destinationPage . '');

} else {
    // Login falhou
    /* The line `// echo "Usuário ou senha incorretos.";` is commented out, which means it is not being
    executed. However, it appears to be intended to output a message indicating that the login
    failed due to incorrect username or password. */
    $response['success'] = false;
    $response['message'] = 'Usuário ou senha incorretos.';

    // echo $sql;
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Feche a conexão com o banco de dados
mysqli_close($conn);

?>
