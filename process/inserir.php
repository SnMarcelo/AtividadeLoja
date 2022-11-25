<?php 

include '../header.php';
include 'Carinho.class.php';

session_start();


date_default_timezone_set('America/Sao_Paulo'); 
$tempo = date('d/m/Y h:i:s ', time());


$id = $_SESSION['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";






// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO pedidos (cod_cliente, data_time, clientes_cod_cliente)
VALUES ($id, '$tempo', $id)";

if ($conn->query($sql) === TRUE) {
  


$last_id = $conn->insert_id;
$cod_pedido = $last_id;

foreach ($_SESSION['carrinho'] as $key => $value){


  $id_pedido = $value->Iten;
  $qtde_produto = $value -> Quantidade;


  $sql2 = "INSERT INTO  itenspedidos (cod_pedido, cod_produto , quantidade , produtos_cod_produto,pedidos_cod_pedidos)
  VALUE ($cod_pedido,$id_pedido,$qtde_produto,$id_pedido,$cod_pedido)";

  $q = mysqli_query($conn, $sql2) or die (mysqli_error($conn));


}

echo '  <div class="container">
    <div class="row">
        <div class="col">
            <div class="container">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card py-3 px-2">
                            <h3 class="text-center mb-3 mt-2">Obrigado Por comprar conosco !</h3>
                            <p class="text-center mb-3 mt-2"> Você sera redirecinado para a loja em 5s</p>

                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>';
header('Refresh: 5; URL=../index.php');

unset($_SESSION['carrinho']);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


include '../footer.php';
?>