<?php  

$servername = "localhost";
    $username = "root";
    $password = "";
    $err = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    echo $err;






    class Carrinho{
    var $Iten;//id prod escolhido
    var $Nome;
    var $Quantidade;
    var $Valor;

    
    
    

// função que adiciona um novo produto ao carrinho
// obs: caso esse produto ja esteja no carrinho ele adiciona +1 na quantidade e aumenta o valor final
function addcart(){
    $i=1;
    

$produtosa = ['','Ração Pedigree Labrador','Ração Pedigree raças pequenas','Special Ração','Special Ração Tipo T','Special Ração Tipo Y','Special Ração Tipo X'];
$preso = [0,100,150,150,120,100,160];

$this->Nome=$produtosa[$this->Iten];

foreach ($_SESSION['carrinho'] as $key => $value) {
 if ($this->Nome==$value->Nome) {
    $this ->Quantidade = $_SESSION['carrinho'][$key]->Quantidade+1;

    $_SESSION['carrinho'][$key]->Quantidade=$this->Quantidade;
    $_SESSION['qtd'][$key] = $this->Quantidade; 

    $this ->Valor=$preso[$_GET['$id']];

    $_SESSION['carrinho'][$key]->Valor =  $_SESSION['carrinho'][$key]->Valor +$this->Valor; 
    $i=2;
   
break;
}
}


if ($i==1) {

    $this ->Quantidade=1;
    $this ->Valor=$preso[$_GET['$id']];
    $_SESSION['carrinho'][]=$this;
    $_SESSION['qtd'][] = $this->Quantidade;

}
}


// funçao que altera a quantidade de um produto.

function alterar()
{
    $i=0;
    $produtosa = ['','Ração Pedigree Labrador','Ração Pedigree raças pequenas','Special Ração','Special Ração Tipo T','Special Ração Tipo Y','Special Ração Tipo X'];
    $preso = [0,100,150,150,120,100,160];
    if ($_GET['$acao']==1) {

    $this->Valor= $_SESSION['carrinho'][$this->Iten]->Valor+$preso[$_GET['$id']];
    $this->Quantidade =$_SESSION['carrinho'][$_GET['$id']]->Quantidade+1;

    $i=1;

    }else if ($_SESSION['qtd'][$_GET['$id']]>1){

    $this->Valor= $_SESSION['carrinho'][$this->Iten]->Valor-$preso[$_GET['$id']];
    $this->Quantidade =$_SESSION['carrinho'][$_GET['$id']]->Quantidade-1;

    $i=1;
    }
    if ($i==1) {

    $_SESSION['carrinho'][$this->Iten]->Quantidade=$this->Quantidade;
    $_SESSION['carrinho'][$this->Iten]->Valor=$this->Valor;
    $_SESSION['qtd'][$_GET['$id']]=$this->Quantidade;

}

    }
// funçao que remove um item do carrinho 
function remover()
{
    unset($_SESSION['carrinho'][$_GET['id']]); 
    unset($_SESSION['qtd'][$_GET['id']]); 
}


// função que limpar o carrinho
function limpar()
{
    unset($_SESSION['carrinho']); 
    unset($_SESSION['qtd']); 
    
    header('location: ../cart.php');
    
   
}


function login(){
    echo 'opa'.$err;
    
    header('location: ../cart.php');
}


}
      

?>