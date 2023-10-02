<?php
session_start(); // Inicie a sessão (se já não estiver iniciada)

include_once("databaseconnect.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

// Execute a consulta SQL para buscar o usuário pelo email
$sql = "SELECT * FROM user AS u
INNER JOIN user_group AS ug ON ug.id = u.grupo_acesso
INNER JOIN submenu AS s ON s.submenu_id = ug.id_link
WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$response = ['success' => false];

// Verifique se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $hashed_password = $user['senha'];

    // Verifique se a senha corresponde à senha armazenada no banco de dados
    if (password_verify($senha, $hashed_password)) {
        // Login bem-sucedido
        $_SESSION['email'] = $email;
        $_SESSION['login_attempts'][$email] = 0; // Redefina o contador de tentativas

        // Defina a variável de sessão 'destinationPage' com base na página de destino do usuário
        $_SESSION['destinationPage'] = 'content_pages.php?id=' . $user['submenu_id'];

        $_SESSION['adm'] = $user['adm_p'];

        // Atualize o campo 'bloqueio' para 'nao'
        $updateSql = "UPDATE user SET bloqueio = 'nao' WHERE email = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("s", $email);
        $updateStmt->execute();

        // Redirecione para a página de destino
        $destinationPage = $user['submenu_id'];
        $response['success'] = true;
        $response['redirect'] = 'content_pages.php?id=' . $destinationPage;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
mysqli_close($conn);
?>
