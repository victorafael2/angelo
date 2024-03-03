<?php
session_start();

include_once("databaseconnect.php");

// Receba o email e a senha do POST
$email = $_POST['email'];
$senha = $_POST['senha'];

// Execute a consulta SQL para buscar o usuário pelo email
$sql = "SELECT * FROM user AS u
left JOIN user_group AS ug ON ug.id = u.grupo_acesso
left JOIN submenu AS s ON s.submenu_id = ug.id_link
WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Verifique se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $hashed_password = $user['senha'];
    $isBlocked = $user['bloqueio'];

    // Verifique se o email recebido corresponde ao email do usuário encontrado no banco de dados
    if ($email === $user['email']) {
        // O email corresponde, continue com a verificação da senha e do bloqueio
        if ($isBlocked === 'sim') {
            // Usuário bloqueado
            $response['success'] = false;
            $response['message'] = 'Sua conta está bloqueada. Responda a pergunta matemática para desbloqueá-la.';

            // Gerar pergunta matemática aleatória
            $question = generateMathQuestion();
            $_SESSION['math_question'] = $question['question'];
            $_SESSION['math_answer'] = $question['answer'];

            $response['mathQuestion'] = true;
            $response['mathQuestionText'] = 'Responda a pergunta matemática para desbloquear sua conta: ' . $_SESSION['math_question'];
            $response['mathAnswer'] = $_SESSION['math_answer'];
        } else {
            // Verifique se a senha corresponde à senha armazenada no banco de dados
            if (password_verify($senha, $hashed_password)) {
                // Login bem-sucedido
                $_SESSION['email'] = $email;
                $_SESSION['login_attempts'][$email] = 0; // Redefina o contador de tentativas

                // Defina a variável de sessão 'destinationPage' com base na página de destino do usuário
                $_SESSION['destinationPage'] = 'content_pages.php?id=' . $user['submenu_id'];

                $_SESSION['adm'] = $user['adm_p'];
                // Redirecione para a página de destino
                $destinationPage = ($user['submenu_id'] !== null) ? $user['submenu_id'] : 6;
                $response['success'] = true;
                $response['redirect'] = 'content_pages.php?id=' . $destinationPage;
            } else {
                // Senha incorreta
                $response['success'] = false;
                $response['message'] = 'Senha incorreta.';
            }
        }
    } else {
        // Email não corresponde ao usuário encontrado no banco de dados
        $response['success'] = false;
        $response['message'] = 'Email não encontrado.';
    }
} else {
    // Usuário não encontrado
    $response['success'] = false;
    $response['message'] = 'Usuário não encontrado.';
}

// Função para gerar uma pergunta matemática simples
function generateMathQuestion() {
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);
    $question = "$num1 + $num2 = ?";
    $answer = $num1 + $num2;

    return ['question' => $question, 'answer' => $answer];
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Feche a conexão com o banco de dados
$stmt->close();
$conn->close();
?>
