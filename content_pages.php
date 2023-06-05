<?php
include 'header.php';
include 'navbar.php';



// $id = $_GET['id'];
if (empty($_GET['id'])) {
    // Redirecionar para home.php com o parâmetro id
    // echo "<html><head><meta http-equiv='refresh' content='0;url=home.php'></head></html>";

}

else {
    $id = $_GET['id'];

        $query_content_page = "SELECT * FROM submenu where submenu_id = $id";
        $result_content_page = mysqli_query($conn, $query_content_page);
}



?>



<div class="content">
    <nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
            <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
            <li class="breadcrumb-item active" aria-current="page">Default</li>
        </ol>
    </nav>
    <!-- Criar todo conteúdo depois da primeira linha -->


    <?php
                    //  echo $query;
                                            // Generate the HTML code dynamically
                          while ($row = mysqli_fetch_assoc($result_content_page)) {
                            $caminho = $row['submenu_link'];
                            // $submenu_link = $caminho ?? null;

                            // echo $caminho;

                            include $caminho;

                          }

                          ?>















    <?php include 'footer.php' ?>