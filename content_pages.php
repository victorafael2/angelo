<?php
include 'header.php';
include 'navbar.php';



// $id = $_GET['id'];
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $id = 6;
    $query_content_page = "SELECT * FROM submenu where submenu_id = $id";
        $result_content_page = mysqli_query($conn, $query_content_page);
}

else {
    $id = $_GET['id'];

        $query_content_page = "SELECT * FROM submenu where submenu_id = $id";
        $result_content_page = mysqli_query($conn, $query_content_page);
}



?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<div class="content">
    <!-- <nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
            <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
            <li class="breadcrumb-item active" aria-current="page">Default</li>
        </ol>
    </nav> -->
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