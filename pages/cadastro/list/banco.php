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
    id,
    id_funcionario,
    data,
    pix_tipo,
    pix_identificacao,
    banco_numero,
    banco_nome,
    banco_tipo_conta,
    banco_agencia,
    banco_dv_agencia,
    banco_conta,
    banco_dv_conta,
    habilitado,
    preferencial
FROM aux_info_bancario WHERE id_funcionario = '$idUsuario' and tipo ='$tipo'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Build the table of children
      $childTable = '<table class="table table-sm fs--1" >';
      $childTable .= '<thead><tr><th>Pix Tipo</th><th>Pix Identificação</th><th>Banco Número</th><th>Banco Nome</th><th>Banco Tipo Conta</th><th>Banco Agência</th><th>Banco DV Agência</th><th>Banco Conta</th><th>Banco DV Conta</th><th>Habilitado</th><th>Preferencial</th></tr></thead>';
      $childTable .= '<tbody>';
      while ($row = $result->fetch_assoc()) {
          $childTable .= '<tr>';
          $childTable .= '<td>' . $row['pix_tipo'] . '</td>';
          $childTable .= '<td>' . $row['pix_identificacao'] . '</td>';
          $childTable .= '<td>' . $row['banco_numero'] . '</td>';
          $childTable .= '<td>' . $row['banco_nome'] . '</td>';
          $childTable .= '<td>' . $row['banco_tipo_conta'] . '</td>';
          $childTable .= '<td>' . $row['banco_agencia'] . '</td>';
          $childTable .= '<td>' . $row['banco_dv_agencia'] . '</td>';
          $childTable .= '<td>' . $row['banco_conta'] . '</td>';
          $childTable .= '<td>' . $row['banco_dv_conta'] . '</td>';


          $childTable .= '<td>';
          $childTable .= '<span class="status-icon-bank" data-id="' . $row['id'] . '">';

          if ($row['habilitado'] == 1) {
              $childTable .= '<i class="fa-solid fa-check text-success"></i>';
          } else {
              $childTable .= '<i class="fa-solid fa-xmark text-danger"></i>';
          }

          $childTable .= '</span>';
          $childTable .= '</td>';


          $childTable .= '<td>';
          $childTable .= '<span class="status-icon_star" data-id="' . $row['id'] . '">';

          if ($row['preferencial'] == 1) {
              $childTable .= '<i class="fa-solid fa-star text-warning"></i>';
          } else {
              $childTable .= '<i class="fa-regular fa-star"></i>';
          }

          $childTable .= '</span>';
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


<script>

$(document).ready(function() {
    $('.status-icon-bank').click(function() {
        var icon = $(this);
        var id = icon.data('id');

        $.ajax({
            type: 'POST',
            url: 'pages/cadastro/update/update_inf_bancaria_habilitar.php',
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                icon.html(response.icon);

                // Exiba um toast com base no novo status
                var toastMessage = (response.status == 1) ? 'Status atualizado para Ativo' : 'Status atualizado para Inativo';

                // Crie o toast
                var toast = $('#liveToast');
                toast.find('.toast-body').text(toastMessage);

                // Mostre o toast
                toast.toast('show');
            }
        });
    });
});

</script>

<script>

$(document).ready(function() {
    $('.status-icon_star').click(function() {
        var icon = $(this);
        var id = icon.data('id');

        $.ajax({
            type: 'POST',
            url: 'pages/cadastro/update/update_inf_bancaria_habilitar_preferencial.php',
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                icon.html(response.icon);

                // Exiba um toast com base no novo status
                var toastMessage = (response.status == 1) ? 'Status atualizado para Ativo' : 'Status atualizado para Inativo';

                // Crie o toast
                var toast = $('#liveToast');
                toast.find('.toast-body').text(toastMessage);

                // Mostre o toast
                toast.toast('show');
            }
        });
    });
});

</script>