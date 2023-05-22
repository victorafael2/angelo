<?php
include 'header.php';
include 'navbar.php';

$id = $_GET['id'];

$query_content_page = "SELECT * FROM submenu where submenu_id = $id";
$result_content_page = mysqli_query($conn, $query_content_page);

?>

<div class="content">

    <!-- Criar todo conteurdo depois da primeira linha -->


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