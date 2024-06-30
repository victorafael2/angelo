<?php

$id = $_GET['id_relatorio'];

// Consulta SQL
$sql = "SELECT * FROM relatorios where id = $id";

$result = $conn->query($sql);
?>



  <div class="container">
  <div class="row g-3 mb-6">
  <?php
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
           echo '<div style="display: flex; justify-content: space-between;" class="mb-2">';
          echo  '<h3 style="margin: 0;">' . $row["nome"] . '</h3>';
          echo '<a href="content_pages.php?id=' . $row["menu_relatorio"] . '" class="btn btn-sm btn-phoenix-info">Voltar para Relatórios</a></div>';
            // echo '<div class="col-12">';
            // echo '<div class="card">';
            // echo '<div class="card-body">';
            // echo '<div class="border-bottom border-dashed border-300">';
            // echo '<h4 class="mb-3 lh-sm lh-xl-1">' . $row["nome"] . '</h4>';
            // echo '</div>';
            // echo '<div class="pt-4 mb-7 mb-lg-4 mb-xl-7">';
            // echo '<div class="row justify-content-between">';
            // echo '<div class="col-auto">';
            // echo '<h5 class="text-1000">Resumo do Relatório</h5>';
            // echo '</div>';
            // echo '<div class="col-auto">';
            // echo '<p class="text-800">' . $row["descricao"] . '</p>';
            // echo '</div>';
            // echo '<iframe  width="100%" height="' . $row["altura"] . 'px"  src="' . $row["link"] . '"&toolbarHidden=true></iframe>';

        // Supondo que $row seja um array com as chaves 'tipo' e 'link'
        if ($row["tipolink"] == "url") {
            echo '<iframe width="100%" height="800px" src="' . $row["link"] . '"&toolbarHidden=true></iframe>';
        } else {
          // Decodificar o valor do link
            $decoded_link = html_entity_decode($row["link"]);
            echo $decoded_link;
        }


            // echo '</div>';
            // echo '</div>';
            // echo '<div class="border-top border-dashed border-300 pt-4">';

            // echo '</div>';
            // echo '</div>';
            // echo '</div>';
            // echo '</div>';

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

