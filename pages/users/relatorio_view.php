<?php
$id_menu_relatório = $_GET['id'];


// Consulta SQL
$sql = "WITH submenu_cte AS (
    SELECT menu_id
    FROM submenu
    WHERE submenu.submenu_id = $id_menu_relatório
)
SELECT r.*
FROM relatorios r
LEFT JOIN submenu s ON s.submenu_id = r.menu_relatorio
WHERE s.menu_id = (SELECT menu_id FROM submenu_cte);";

$result = $conn->query($sql);
?>



  <div class="container">
  <div class="row g-3 mb-6">
  <?php
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '<div class="col-12 col-lg-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<div class="border-bottom border-dashed border-300">';
            echo '<h4 class="mb-3 lh-sm lh-xl-1">' . $row["nome"] . '</h4>';
            echo '</div>';
            echo '<div class="pt-4 mb-7 mb-lg-4 mb-xl-7">';
            echo '<div class="row justify-content-between">';
            echo '<div class="col-auto">';
            echo '<h5 class="text-1000">Resumo do Relatório</h5>';
            echo '</div>';
            echo '<div class="col-auto">';
            echo '<p class="text-800">' . $row["descricao"] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="border-top border-dashed border-300 pt-4">';
            // echo '<button class="btn btn-phoenix-primary w-100" data-bs-toggle="modal" data-bs-target="#reportModal' . $row["id"] . '">Ver Relatório</button>';
            echo '<a href="content_pages.php?id=43&id_relatorio=' . $row["id"] . '" class="btn btn-phoenix-primary w-100" >Ver Relatório</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            // Modal for each row
            echo '<div class="modal fade" id="reportModal' . $row["id"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog modal-dialog-centered modal-fullscreen">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            echo '<h5 class="modal-title" id="exampleModalLabel">' . $row["nome"] . '</h5>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            echo '</div>';
            echo '<div class="modal-body">';
            // Replace 'embed_url' with the actual Power BI embed URL for this report
            echo '<iframe width="100%" height="700px" src="' . $row["link"] . '"&toolbarHidden=true></iframe>';

            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }



        } else {
            echo "No results found.";
        }
        $conn->close();
        ?>
  </div>


  </div>

