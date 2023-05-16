<?php
include 'header.php';
include 'navbar.php';

$id = $_GET['id'];

$query = "SELECT * FROM menu where id = $id";
$result = mysqli_query($conn, $query);

?>

<div class="content">

    <!-- Criar todo conteurdo depois da primeira linha -->


                     <?php
                                            // Generate the HTML code dynamically
                          while ($row = mysqli_fetch_assoc($result)) {
                            $caminho = $row['caminho'];

                            include $caminho;

                          }

                          ?>












<?php include 'footer.php' ?>