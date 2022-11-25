<?php include '../header.php';


session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";


$login = $_POST['Usuario'];
$senha = $_POST['Senha'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM clientes WHERE username = '$login' and passwords = '$senha' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
 



  $_SESSION['login'] = $login;
  $_SESSION['status'] = "logado";
  while($row = $result->fetch_assoc()) {
    $_SESSION['id'] = $row['cod_cliente'];
  }
  header ('location: ../cart.php');

  




} else {
    header('Refresh: 5; URL=../login.php');
    echo '  <div class="container">
    <div class="row">
        <div class="col">
            <div class="container">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card py-3 px-2">
                            <h3 class="text-center mb-3 mt-2">Atenção Sua senha não corresponde</h3>
                            <p class="text-center mb-3 mt-2"> Você sera redirecinado para o login em 5s</p>

                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>';
    
}

mysqli_close($conn);

include '../footer.php';
?>