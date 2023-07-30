<?php
// Replace with appropriate database connection code
include '../../../database/databaseconnect.php';

// Function to sanitize user input (to prevent SQL injection)
function sanitize_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Check if the request method is POST (to ensure the form data is submitted via POST method)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data and sanitize it
  $nome = sanitize_input($_POST['nome_completo']);
  $data_nascimento = sanitize_input($_POST['data_nascimento']);
  $cpf = sanitize_input($_POST['cpf']);
  $telefone_contato = sanitize_input($_POST['telefone_contato']);
  $email_contato = sanitize_input($_POST['email_contato']);
  $id_user = sanitize_input($_POST['idFuncionario']);

  // Perform additional validation on the form data if needed
  // ...



  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare the SQL statement to insert the data into the database
  $stmt = $conn->prepare("INSERT INTO conjuge (nome_completo, data_nascimento, cpf, telefone_contato,email_contato,idFuncionario) VALUES (?, ?, ?, ?,?,?)");
  $stmt->bind_param("ssssss", $nome, $data_nascimento, $cpf, $telefone_contato,$email_contato,$id_user);

  // Execute the prepared statement
  if ($stmt->execute()) {
    // If the data is successfully inserted, send a success response to the client
    echo "Data saved successfully!";
  } else {
    // If there was an error while inserting the data, send an error response to the client
    echo "Error saving data: " . $conn->error;
  }

  // Close the statement and the database connection
  $stmt->close();
  $conn->close();
} else {
  // If the request method is not POST, handle the error appropriately
  echo "Invalid request method.";
}
?>
