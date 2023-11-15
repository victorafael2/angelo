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
        // Construir a lista de arquivos
        $fileList = '<div class="row">';
        $counter = 0;
        while ($row = $result->fetch_assoc()) {
            $fileIcon = getFileIcon($row['nome']);
            $base64Data = $row['caminho']; // Assumindo que 'caminho' contém os dados base64

            $fileList .= '<div class="col-md-4 mb-3"><div class="file-box position-relative border p-1">';

            // ... Dentro do loop while:
$ext = strtolower(pathinfo($row['nome'], PATHINFO_EXTENSION));
$fileList .= '<a class="fs--1" href="#" onclick="openFile(this); return false;" data-base64="' . $base64Data . '" data-ext="' . $ext . '"><i class="' . $fileIcon . '"></i> ' . $row['texto'] . '</a>';
// ...


            // Adicionar ícone de exclusão
            $fileList .= '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">';
            $fileList .= '<a class="delete-button" data-file-id="' . $row['id'] . '" data-file-path="' . $row['caminho'] . '"><i class="fas fa-times"></i></a>';
            $fileList .= '<span class="visually-hidden"></span></span>';

            $fileList .= '</div></div>';

            $counter++;
            if ($counter % 3 == 0) {
                $fileList .= '</div><div class="row">';
            }
        }

        // Fechar a última linha
        $fileList .= '</div>';

        // Retornar o HTML da lista de arquivos como resposta
        echo $fileList;
    } else {
        echo "Sem Arquivos.";
    }

} else {
    echo "Invalid request.";
}

$conn->close();
?>
<!-- <script>
    function openFile(filePath) {
        // Open the file in a new window with specific dimensions
        window.open(filePath, "_blank", "width=600, height=400");
    }
</script> -->

<script>
        function openFile(linkElement) {
            var base64Data = linkElement.getAttribute('data-base64');
            var ext = linkElement.getAttribute('data-ext').toLowerCase();
            var mimeType;

            if (ext === 'jpg' || ext === 'jpeg') {
                mimeType = 'data:image/jpeg;base64,';
            } else if (ext === 'png') {
                mimeType = 'data:image/png;base64,';
            } else if (ext === 'pdf') {
                mimeType = 'data:application/pdf;base64,';
            }

            var fullBase64Data = mimeType + base64Data;

            var newWindow = window.open("", "_blank", "width=600,height=400,scrollbars=yes");

            if (ext === 'jpg' || ext === 'jpeg' || ext === 'png') {
                newWindow.document.write('<img src="' + fullBase64Data + '" style="width: 100%; height: auto;">');
            } else if (ext === 'pdf') {
                newWindow.document.write('<iframe src="' + fullBase64Data + '" style="width:100%; height:100%;" frameborder="0"></iframe>');
            }

            newWindow.document.write('<br><button class="btn btn-sm btn-phoenix-success" id="downloadBtn">Download</button>');
            newWindow.document.write('<script>document.getElementById("downloadBtn").addEventListener("click", function() { var link = document.createElement("a"); link.href = "' + fullBase64Data + '"; link.download = "DownloadedFile.' + ext + '"; link.click(); });<\/script>');
        }
    </script>





