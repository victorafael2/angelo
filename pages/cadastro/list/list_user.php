

<div class="content">

    <!-- Criar todo conteurdo depois da primeira linha -->

                <div class="row">

                            <h3>Palitagens</h3>

                            <div class="table-responsive scrollbar">
                                    <?php


                                    // Consulta SQL para selecionar todos os usuários
                                    $sql = "SELECT * FROM formulario ";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        echo "<table id='formulario' class='table table-striped table-sm'>";
                                        echo "<thead><tr><th>ID</th><th>Protocolo</th><th>Cliente</th><th>Criado em</th></tr></thead>";
                                        echo "<tbody>";

                                        // Percorrendo os resultados e adicionando-os à tabela HTML
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["protocolo"] . "</td>";
                                            echo "<td>" . $row["classificacao"] . "</td>";
                                            echo "<td>" . $row["data_criacao"] . "</td>";

                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                    } else {
                                    echo "Você ainda não fez nenhuma palitagem, vamos fazer um? Clique <a href='palitagens.php'>aqui</a> para começar.";

                                    }

                                    // Fechando a conexão com o banco de dados
                                    $conn->close();
                                    ?>

                            </div>










            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>



            <script>
    $(document).ready(function() {
        $('#formulario').DataTable({
            searching: true,
            ordering: true,
            lengthChange: false,
            info: false,
            language: {
                searchPlaceholder: "Pesquisar...",
                search: "",
                paginate: {
                    next: "Próximo",
                    previous: "Anterior"
                }
            },
        });
    });
    </script>









