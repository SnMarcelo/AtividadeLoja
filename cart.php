<?php
include 'header.php';
include 'process/Carinho.class.php';
include 'process/Produto.class.php';

$produtosa = ['','Ração Pedigree Labrador','Ração Pedigree raças pequenas','Special Ração','Special Ração Tipo T','Special Ração Tipo Y','Special Ração Tipo X'];
$preso = [0,100,150,150,120,100,160];
$imgs = ['','racao1.png','racao2.png','racao3.png','racao3.png','racao3.png','racao3.png'];
$total=0;


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
<title>Carrinho</title>
<div class="card" style="margin-top: 5em;">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>Carrinho de compras</b></h4>
                    </div>

                </div>
            </div>
            <div class="row border-top border-bottom">

                <?php if(isset ($_SESSION['carrinho']) ){ foreach ($_SESSION['carrinho']as $chave => $iten) {?>
                <div class="row main align-items-center">
                    <img src="img/racao<?php echo $chave?>.png" style="width:50px; margin-top:1em;"
                        class="rounded mx-auto d-block" alt=""> <!--  recupera a img na sessao  -->
                    <div class="col">

                        <div class="row"><?php echo  $iten->Nome; ?></div> <!-- nome da sessao   -->
                    </div>
                    <div class="col">
                        <a href="process/alterar.php?$id=<?php echo $chave?>&$acao=2">-</a> <!--  menor valor -->
                        <a class="border" id="text-<?php echo $chave ?>">
                            <?php echo $iten->Quantidade ;?> <!-- mostra a qtde do vetor  -->
                        </a><a href="process/alterar.php?$id=<?php echo $chave?>&$acao=1">+</a> <!-- maior valor  -->
                    </div>
                    <div class="col"><?php echo "$ "; echo $iten->Valor;$total=$total+$iten->Valor?><a
                            id="<?php echo $chave ?>" class="close" type="button" data-bs-toggle="modal"
                            data-bs-target="#mdl-confimar" onclick="passar(this.id)">&#10005;</a></div> 
                </div>
                <?php }} else{echo'<h1>Você não tem items no carrinho</h1>'; }?>
            </div>
            <div class="row">
                <div class="col-5"><a href="index.php">&leftarrow;</a><span class="text-muted">Voltar as compras</span>
                </div> <!--  Volta ao index -->




                <a href="process/remove_all.php?local=cart" type="button" class="btn btn-dark btn-s"
                    style="color:white;font-size:14px;">
                    Limpar Carrinho</a> <!-- limpa o carrinho   -->
                <a href="clientes.php" type="button" class="btn btn-dark btn-s" style="color:white;font-size:14px;">
                    Area Cliente</a> <!--  area cliente -->
            </div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Total </b></h5>
            </div>


            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">Valor Total</div>
                <div class="col text-right"><?php echo "$ "; echo $total; ?></div> <!--  mostra o total  -->
            </div>
            <button class="btn-github btn btn-dark">
                <?php $local = "verificar"; if(isset($_SESSION['status'])){ if($_SESSION['status'] == "logado"){  $local = 'inserir';  }}?>
                <a class="list-group-item" href="process/<?php echo $local ?>.php"><i class="fa fa-shopping-cart fa-2x"
                        aria-hidden="true"></i>&nbsp; Adicionar ao Carrinho</a> <!-- caso a sessao enteja com logado leva ao inserir caso nao ao login  -->

                </a>

            </button>

        </div>
    </div>

</div>

<!-- Modal  remover do carrinho -->
<div class="modal fade" id="mdl-confimar" tabindex="-1" aria-labelledby="mdl-confimarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="mdl-confimarLabel">Atenção</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="process/remove.php" method="get">
                <div class="modal-body">
                    Remover Esse item Do carrinho?
                    <input type="text" name="id" id="ida" value="" style="display: none;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" type="button" class="btn btn-dark" value="Continuar">

                </div>
            </form>
        </div>
    </div>
</div>


<script>
function passar(id) {
    $('#ida').val(id);
}
</script>

<?php
include 'footer.php';

?>