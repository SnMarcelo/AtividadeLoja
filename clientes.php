<?php 

include 'header.php';
session_start();

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

if(isset($_SESSION['id'])){ //verifica se existe a sessao 
    $id = $_SESSION['id']; //armazena o valor em id 
}else{
    $id = 0;
}

$sql = "SELECT * FROM clientes WHERE cod_cliente = $id "; //pesquisa 
$result = $conn->query($sql);


$sql1 = " SELECT itenspedidos.item_cod_pedido , itenspedidos.cod_pedido , itenspedidos.cod_produto , 
itenspedidos.quantidade , itenspedidos.produtos_cod_produto, itenspedidos.pedidos_cod_pedidos, 
itenspedidos.clientes_cod_clientes , produtos.descricao
FROM itenspedidos INNER JOIN produtos ON produtos.cod_produto = itenspedidos.cod_produto"; //pesquisa 
$result1 = $conn->query($sql1);




$conn->close();


?>



<div class="container">
    <div class="row">
        <div class="col">
            <div class="container">

                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-12">
                        <div class="card py-3 px-2">
                            <?php if ($result->num_rows > 0) {  //resultados > 0 

                                

                    // output data of each row
                    while($row = $result->fetch_assoc()) { //pesquisa
                        ?>
                            <h3 class="text-center mb-3 mt-2">Seja Bem Vindo</h3>
                            <h4 class="text-center mb-3 mt-2"><?php echo $row["nome_completo"]?></h4>
                            <p class="text-center mb-3 mt-2"> Seus Itens Comprados São </p>


                            <?php if($result1 ->num_rows > 0) {?>

                            <?php while($row = $result1->fetch_assoc()){?>

                            <div class="row d-flex justify-content-center mt-2">
                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card px-2 text-bg-dark">
                                        <p class="text-center mb-3 mt-3"><strong>Numero do pedido :
                                            </strong><?php echo $row["item_cod_pedido"]?> │ <strong>Nome :</strong>
                                            <?php echo $row["descricao"]?> │ <strong>Quantidade :</strong> 
                                            <?php echo $row["quantidade"]?> </p>
                                    </div>
                                </div>
                            </div>

                            <?php }?>

                            <?php }else{
                                echo 'null';
                            }?>

                            <?php   }

                            
                    } else {
                    echo '  
                    <h3 class="text-center mb-3 mt-2">Por favor Efetue o Login para ver seu historico </h3>
                                       
                    ';
                    }?>
                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>
</div>








<?php
include 'footer.php';
?>