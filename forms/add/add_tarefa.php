<?php
include ("../../database/databaseconnect.php");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tarefa = $_POST["tarefa"];
    $descricao = $_POST["descricao"];
    $inicio = $_POST["inicio"];
    $fim = $_POST["fim"];
    $id_rel = $_POST["id_rel"];
    $sql = "INSERT INTO tarefas (tarefa, descricao, inicio, fim, id_rel) VALUES ('$tarefa', '$descricao', '$inicio', '$fim', '$id_rel')";

    if ($conn->query($sql) === TRUE) {
        $response = array("status" => "success");
    } else {
        $response = array("status" => "error");
    }

    echo json_encode($response);

// }

// echo $conn;

// Mostra a tabela de tarefas
// $sql = "SELECT * FROM tarefas";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     echo "<table class='table'>
//         <thead>
//             <tr>
//                 <th>Tarefa</th>
//                 <th>Descrição</th>
//                 <th>Inicio</th>
//                 <th>Fim</th>
//             </tr>
//         </thead>
//         <tbody>";
//     while ($row = $result->fetch_assoc()) {
//         echo "<tr>
//             <td>" . $row["tarefa"] . "</td>
//             <td>" . $row["descricao"] . "</td>
//             <td>" . $row["inicio"] . "</td>
//             <td>" . $row["fim"] . "</td>
//         </tr>";
//     }
//     echo "</tbody>
//     </table>";
// } else {
//     echo "Não há tarefas cadastradas.";
// }

$conn->close();
?>
