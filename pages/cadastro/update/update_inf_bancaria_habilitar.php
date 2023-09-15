<?php
include '../../../database/databaseconnect.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Consulta para obter o status atual
    $sql = "SELECT habilitado FROM aux_info_bancario WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $newStatus = ($row['habilitado'] == 1) ? 0 : 1;

        // Atualize o status no banco de dados
        $updateSql = "UPDATE aux_info_bancario SET habilitado = '$newStatus' WHERE id = '$id'";
        if ($conn->query($updateSql) == TRUE) {
            // Responda com o novo ícone FontAwesome com base no novo status
            if ($newStatus == 1) {
                $responseIcon = '<i class="fa-solid fa-check text-success"></i>';
            } else {
                $responseIcon = '<i class="fa-solid fa-xmark text-danger"></i>';
            }

            // Enviar uma resposta JSON com o ícone e o status
            $response = array(
                'icon' => $responseIcon,
                'status' => $newStatus
            );

            echo json_encode($response);
        } else {
            echo 'Erro ao atualizar o status: ' . $conn->error;
        }
    } else {
        echo 'Linha não encontrada.';
    }
} else {
    echo 'Solicitação inválida.';
}

$conn->close();
?>
