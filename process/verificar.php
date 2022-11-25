<?php 
session_start();

$login = $_POST['Usuario'];
$senha = $_POST['Senha'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM clientes WHERE username = '$login' and passwords = '$senha' ";
$result = mysqli_query($conn, $sql);

if($_SESSION['status'] == "logado" ){
  Header ('location: ../cart.php');
}else{
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    header ('location: ../cart.php');
    $_SESSION['status'] = "logado";
  } else {
      header ('location: ../login.php');
      $_SESSION['status'] = "deslogado";
  }
}



mysqli_close($conn);


?>