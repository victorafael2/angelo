
<?php
session_start();

include_once("databaseconnect.php");

// Receba o email e a senha do POST
$email = $_POST['email'];
$senha = $_POST['senha'];

// Defina o número máximo de tentativas permitidas
$maxTentativas = 5;





// Verifique se há um contador de tentativas para este usuário na sessão
if (!isset($_SESSION['login_attempts'][$email])) {
    $_SESSION['login_attempts'][$email] = 0;
}



// Verifique o número de tentativas e bloqueie o usuário se exceder
if ($_SESSION['login_attempts'][$email] >= $maxTentativas) {
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
    try {
        // Atualize o campo de bloqueio na tabela "user" para "sim"
        $updateSql = "UPDATE user SET bloqueio = 'sim' WHERE email = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("s", $email);

        if ($updateStmt->execute()) {
            // A atualização foi bem-sucedida
            $_SESSION['login_attempts'][$email] = 0; // Redefina o contador de tentativas
        } else {
            // A atualização falhou
            // Você pode lidar com isso de acordo com a necessidade
        }
    } catch (Exception $e) {
        echo 'Erro na atualização: ' . $e->getMessage();
    }

} else {
    // Execute a consulta SQL para buscar o usuário pelo email
    $sql = "SELECT * FROM user AS u
    INNER JOIN user_group AS ug ON ug.id = u.grupo_acesso
    INNER JOIN submenu AS s ON s.submenu_id = ug.id_link
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

        // Verifique se a senha corresponde à senha armazenada no banco de dados
        if (password_verify($senha, $hashed_password)) {
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


                // Login bem-sucedido
                $_SESSION['email'] = $email;
                $_SESSION['login_attempts'][$email] = 0; // Redefina o contador de tentativas

                // Defina a variável de sessão 'destinationPage' com base na página de destino do usuário
                $_SESSION['destinationPage'] = 'content_pages.php?id=' . $user['submenu_id'];

                $_SESSION['adm'] = $user['adm_p'];
                // Redirecione para a página de destino
                $destinationPage = $user['submenu_id'];
                $response['success'] = true;
                $response['redirect'] = 'content_pages.php?id=' . $destinationPage;
            }
        } else {
           // Senha incorreta
           $_SESSION['login_attempts'][$email]++; // Incrementa o contador de tentativas
           $remainingAttempts = $maxTentativas - $_SESSION['login_attempts'][$email];
           $response['success'] = false;
           $response['message'] = 'Senha incorreta. Tentativas restantes: ' . $remainingAttempts;
        }
    } else {
      // Usuário não encontrado
      $_SESSION['login_attempts'][$email]++; // Incrementa o contador de tentativas
      $remainingAttempts = $maxTentativas - $_SESSION['login_attempts'][$email];
      $response['success'] = false;
      $response['message'] = 'Usuário ou senha incorretos. Tentativas restantes: ' . $remainingAttempts;
    }
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
// $stmt->close();
$conn->close();
?>
