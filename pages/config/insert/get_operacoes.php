<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta os dados da tabela AUX_VT
$sql = "SELECT * FROM aux_operacoes";
$result = $conn->query($sql);

// Array para armazenar os dados
$items = array();

// Verifica se há resultados e os adiciona ao array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Verifica o valor da coluna "HABILITADO" e define o ícone correspondente
        if ($row['habilitado'] == 1) {
            $row['habilitado_icon'] = '<i class="fas fa-check text-success"></i>'; // Ícone "ok" do Font Awesome
        } else {
            $row['habilitado_icon'] = '<i class="fas fa-times text-danger"></i>'; // Ícone "não ok" do Font Awesome
        }
        // echo $row['habilitado_icon'];
        $items[] = $row;

    }
}



// Fecha a conexão com o banco de dados
$conn->close();

// Retorna os dados como JSON
echo json_encode($items);
?>
