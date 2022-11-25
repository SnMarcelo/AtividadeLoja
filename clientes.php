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



$conn->close();


?>



<div class="container">
    <div class="row">
        <div class="col">
            <div class="container">

                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card py-3 px-2">
                            <?php if ($result->num_rows > 0) { //resultados > 0 

                                

                    // output data of each row
                    while($row = $result->fetch_assoc()) { //pesquisa
                        ?>
                            <h3 class="text-center mb-3 mt-2">Seja Bem Vindo</h3>
                            <h4 class="text-center mb-3 mt-2"><?php echo $row["nome_completo"]?></h4>
                            <p class="text-center mb-3 mt-2"> Seus Itens Comprados São </p>
                            <p class="text-center mb-3 mt-2"> <?php echo $tudo;?></p>
                            
                            
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