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
    $sql = "SELECT *, DATE_FORMAT(data_inicio, '%d/%m/%Y') AS data_inicio_formatada, DATE_FORMAT(data_fim, '%d/%m/%Y') AS data_fim_formatada
    FROM status_funcionario
    WHERE nome = '$idUsuario' ORDER BY id desc";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Build the table of children
      $childTable = '<table class="table table-sm fs--1" >';
      $childTable .= '<thead><tr><th>Status</th><th>Inicio</th><th>Fim</th></tr></thead>';
      $childTable .= '<tbody>';
      while ($row = $result->fetch_assoc()) {
          $childTable .= '<tr>';
          $childTable .= '<td>' . $row['status'] . '</td>';
          $childTable .= '<td>' . $row['data_inicio_formatada'] . '</td>';
          $childTable .= '<td>' . $row['data_fim_formatada'] . '</td>';



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
