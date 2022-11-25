<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";


$nome = $_POST['Nome'];
$celular = $_POST['Celular'];
$email = $_POST['Email'];
$usuario = $_POST['Usuario'];
$senha = $_POST['Senha'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO clientes (nome_completo, email , telefone,username,passwords)
VALUES ('$nome', '$email' , '$celular','$usuario','$senha')"; //Insert dados

if ($conn->query($sql) === TRUE) {

  header ('location: ../login.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>