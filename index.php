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



<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="4000">
            <img src="img/banner7.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="4000">
            <img src="img/banner4.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="4000">
            <img src="img/banner6.webp" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>




<div class="row" style="margin-top:3em;">
    <div class="col-sm-3">
        <div class="card zoom2 text-center" style="border-radius:5px  !important; ">
            <div class="card-body"> 
                <h5 class="card-title " style="margin-top:0px;">Atendimento Rapido</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card zoom2 text-center" style="border-radius:5px  !important; ">
            <div class="card-body">
                <h5 class="card-title" style="margin-top:0px;">Qualidade Comprovada</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card zoom2 text-center" style="border-radius:5px  !important; ">
            <div class="card-body">
                <h5 class="card-title" style="margin-top:0px;">Até 10x sem juros</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card zoom2 text-center" style="border-radius:5px  !important; ">
            <div class="card-body">
                <h5 class="card-title" style="margin-top:0px;">Frete Gratis</h5>
            </div>
        </div>
    </div>
</div>





<div class="container">



    <div class="row" style="margin-top:50px;margin-bottom:10em;">
        <?php if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-sm-4">
            <div class="card shadow-lg" style="margin-top:10px; margin-bottom:2em; width: 18rem;">
                <div class="card-body " style="padding:0px;" !important>
                    <img src="<?php echo $row["imgs"]?>" style="width:90px; margin-top:10px; margin-bottom:20px;"
                        class="rounded zoom mx-auto d-block" alt="">
                    <p style="padding: 10px;"><?php echo $row["descricao"]?></p>
                    <p style="padding: 10px; margin-top:-2em;"> <strong> R$ <?php echo $row["preco"] ?></strong></p>
                    <a href="#"
                        style="text-decoration:none; margin-left:10px; padding:6px; font-size:12px; background-color:#2050D5; color:white ; border-radius:10px; "><strong>10%
                            OFF</strong> </a>
                    <p style="color:#2050D5; margin-left:10px; margin-top:5px;"> <strong>Para Pix</strong> </p>
                    <p style="color:#2050D5; margin-left:10px; margin-top:-18px; font-size:12px"> Necessario Cadastro
                    </p>
                    <!-- Button trigger modal -->

                    <button class="btn-github btn btn-dark" style="margin-top:-5px;">

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