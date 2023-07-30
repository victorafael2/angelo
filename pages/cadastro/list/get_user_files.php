<?php
// Assuming you have a database connection setup
// Replace the placeholders with your actual database credentials
include '../../../database/databaseconnect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get Font Awesome icon based on file extension
function getFileIcon($fileName) {
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileIcon = "";

    switch ($ext) {
        case "pdf":
            $fileIcon = "far fa-file-pdf";
            break;
        case "doc":
        case "docx":
            $fileIcon = "far fa-file-word";
            break;
        case "xls":
        case "xlsx":
            $fileIcon = "far fa-file-excel";
            break;
        // Add more cases for other file types if needed
        default:
            $fileIcon = "far fa-file";
            break;
    }

    return $fileIcon;
}
?>

<?php
// Assuming you have already received the `id_usuario` via POST
if (isset($_POST['id_usuario'])) {
    $idUsuario = $_POST['id_usuario'];

    // SQL query to fetch related files based on the user ID
    $sql = "SELECT * FROM arquivos_usuario WHERE id_usuario = '$idUsuario'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Build the file list
        $fileList = '<div class="row">';
        $counter = 0;
        while ($row = $result->fetch_assoc()) {
            $fileIcon = getFileIcon($row['nome']);
            $fileList .= '<div class="col-md-4 mb-3"><div class="file-box">';
            $fileList .= '<a href="uploads/' . $row['nome'] . '"><i class="' . $fileIcon . '"></i> ' . $row['nome'] . '</a>';
            $fileList .= '</div></div>';

            $counter++;
            if ($counter % 3 == 0) {
                $fileList .= '</div><div class="row">';
            }
        }

        // Close the last row
        $fileList .= '</div>';

        // Return the file list HTML as the response
        echo $fileList;
    } else {
        echo "Sem Informação.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
