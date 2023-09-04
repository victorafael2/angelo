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
    $tipo = $_POST['tipo'];

    // SQL query to fetch related files based on the user ID
    $sql = "SELECT
    *
FROM aux_acessos
LEFT JOIN aux_sistemas ON aux_sistemas.id_sistema = aux_acessos.id_sistema

WHERE id_funcionario = '$idUsuario' and tipo = '$tipo'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Build the table of children
      $childTable = '<table class="table table-sm fs--1" >';
      $childTable .= '<thead><tr><th>Sistema</th><th>Login</th><th>Habilitado</th></tr></thead>';
      $childTable .= '<tbody>';
      while ($row = $result->fetch_assoc()) {
          $childTable .= '<tr>';
          $childTable .= '<td>' . $row['nome_sistema'] . '</td>';
          $childTable .= '<td>' . $row['username'] . '</td>';

          $childTable .= '<td>';

        $childTable .= ($row['habilitado'] == 1) ? '<i class="fa-solid fa-check text-success"></i>' : '<i class="fa-solid fa-check"></i>';

        $childTable .= '</td>';

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
