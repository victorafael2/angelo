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
        case "jpg":
        case "jpeg":
        case "png":
            $fileIcon = "far fa-file-image"; // Você pode escolher um ícone apropriado aqui
            break;
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
    $tipo = $_POST['tipo'];

    // SQL query to fetch related files based on the user ID
    $sql = "SELECT * FROM arquivos_usuario WHERE id_usuario = '$idUsuario' and tipo = '$tipo'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Build the file list
        $fileList = '<div class="row">';
        $counter = 0;
        while ($row = $result->fetch_assoc()) {
            $fileIcon = getFileIcon($row['nome']);

            $fileList .= '<div class="col-md-4 mb-3  " ><div class="file-box position-relative border p-1">';

            // Add JavaScript to open the file in a new window
            $fileList .= '<a class="fs--1" href="#" onclick="openFile(\'pages/cadastro/' . $row['caminho'] . '\'); return false;"><i class="' . $fileIcon . '"></i> ' . $row['texto'] . '</a>';

            // Add the delete icon with a unique ID for each file
            $fileList .= '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">';
            $fileList .= '<a class="delete-button" data-file-id="' . $row['id'] . '" data-file-path="' . $row['caminho'] . '"><i class="fas fa-times"></i></a>';
            $fileList .= '<span class="visually-hidden"></span></span>';

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
        echo "Sem Arquivos.";

    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
<script>
    function openFile(filePath) {
        // Open the file in a new window with specific dimensions
        window.open(filePath, "_blank", "width=600, height=400");
    }
</script>





