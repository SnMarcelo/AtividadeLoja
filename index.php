<?php
include 'header.php';
include 'process/Produto.class.php';
session_start();



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

$sql = "SELECT * FROM produtos";
$result = mysqli_query($conn, $sql);




?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<div class="container">
    <div class="row" style="margin-top:50px;margin-bottom:10em;">
        <?php if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-sm-4">
            <div class="card" style="margin-top:10px;" >  
                <div class="card-body" style="padding:0px;" !important>
                    <img src="<?php echo $row["imgs"]?>"  style="width:200px;margin-bottom:20px;"
                        class="rounded mx-auto d-block" alt="">
                        
                    <h1 style="padding: 10px;">R$ <?php echo $row["preco"] ?></h1>
                    <h4 style="padding: 10px;"><?php echo $row["descricao"]?></h4>
                    <!-- Button trigger modal -->

                    <button class="btn-github btn btn-dark">

                        <a class="list-group-item" href="process/addcart.php?$id=<?php echo $row["cod_produto"] ?>"><i
                                class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>&nbsp; Adicionar ao
                            Carrinho</a>

                        </a>
                    </button>


                </div>
            </div>
        </div>




        <?php
             }
            } else {
              echo "0 results";
            }
            ?>
    </div>
</div>







<script>
function addcart(id) {
    $('.none').val(id);
    console.log(id);
}
</script>
<style>
.prod {
    display: inline-block;
}

.block {
    display: block;
}
</style>
<?php
include 'footer.php';
mysqli_close($conn);
?>