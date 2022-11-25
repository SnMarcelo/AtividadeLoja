<?php  
include 'Carinho.class.php';    
session_start();
$i=0;
// criando obj
$p1 = new Carinho;
// defindo atributos p1
$p1 ->Iten=$_GET['$id'];
if (array_key_exists($p1 ->Iten, $_SESSION['carinho'])) {
    $p1 ->Quantidade =$_SESSION['carinho'][$_GET['$id']]->Quantidade+1;
    $_SESSION['carinho'][$_GET['$id']]->Quantidade=$p1->Quantidade;
    $_SESSION['qtd'][$p1->Iten] = $p1->Quantidade;

}else {
    $p1 ->Quantidade=1;
    $_SESSION['carinho'][]=$p1;
$_SESSION['qtd'][] = $p1->Quantidade;
}

// criando array

 

header('location: index.php')
?>