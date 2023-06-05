<?php
// Verificar se a requisição é do tipo POST


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se o parâmetro 'id_vt' foi enviado
    if (isset($_POST["id_filial"])) {
        $id_filial = $_POST["id_filial"];

        include '../../../database/databaseconnect.php';




        // Verificar se houve erro na conexão
        if (!$conn) {
            $response = array(
                "status" => false,
                "message" => "Erro ao conectar ao banco de dados: " . mysqli_connect_error()
            );
        } else {
            // Preparar a consulta SQL para excluir o item
            $stmt = mysqli_prepare($conn, "DELETE FROM aux_filiais WHERE id_filial = ?");
            mysqli_stmt_bind_param($stmt, "i", $id_filial);


            // Executar a consulta SQL
            if (mysqli_stmt_execute($stmt)) {
                $response = array(
                    "status" => true,
                    "message" => "Item excluído com sucesso"
                );
            } else {

                $response = array(
                    "status" => false,
                    "message" => "Erro ao excluir o item: " . mysqli_error($conn),
                    "sql_error" => mysqli_stmt_error($stmt)
                );
            }

            // Fechar a declaração e a conexão
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }

        // Enviar a resposta como JSON
        header("Content-Type: application/json");
        echo json_encode($response);
        exit;
    }
}

// Se a requisição não for do tipo POST ou se o parâmetro 'id_vt' não foi enviado, retorna uma resposta de erro
$response = array(
    "status" => false,
    "message" => "Erro ao excluir o item"
);

// Enviar a resposta como JSON
header("Content-Type: application/json");
echo json_encode($response);

?>
