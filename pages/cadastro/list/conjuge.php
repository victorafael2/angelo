<?php
// Assuming you have a database connection setup
// Replace the placeholders with your actual database credentials
include '../../../database/databaseconnect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get Font Awesome icon based on file extension
// (Keep this function as it is, since it's not related to the list of children)
function getFileIcon($fileName) {
    // (Existing function code remains unchanged)
    // ...
}

?>

<?php
// Assuming you have already received the `id_usuario` via POST
if (isset($_POST['id_usuario'])) {
    $idUsuario = $_POST['id_usuario'];

    // SQL query to fetch related files based on the user ID
    $sql = "SELECT * FROM conjuge WHERE idFuncionario = '$idUsuario'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Build the table of children
        $childTable = '<table class="table table-sm fs--1" >';
        $childTable .= '<thead><tr><th>Nome</th><th>Nascimento</th><th>CPF</th><th>Telefone</th><th>Email</th></tr></thead>';
        $childTable .= '<tbody>';
        while ($row = $result->fetch_assoc()) {
            // Format date of birth as 'dd/mm/yyyy'
            $dateOfBirth = date("d/m/Y", strtotime($row['data_nascimento']));
            $childTable .= '<tr>';
            $childTable .= '<td>' . $row['nome_completo'] . '</td>';
            $childTable .= '<td>' . $dateOfBirth . '</td>';
            $childTable .= '<td>' . $row['cpf'] . '</td>';
            $childTable .= '<td>' . $row['telefone_contato'] . '</td>';
            $childTable .= '<td>' . $row['email_contato'] . '</td>';
            // Add other fields here if needed
            // For example: $childTable .= '<td>' . $row['other_field'] . '</td>';
            $childTable .= '</tr>';
        }
        $childTable .= '</tbody></table>';

        // Return the table of children HTML as the response
        echo $childTable;
    } else {
        echo "Sem Informação";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
