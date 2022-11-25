<?php  
include 'Carinho.class.php'; 

session_start();
// criando obj
$p1 = new Carrinho;
// defindo atributos p1
$p1 ->Iten=$_GET['$id'];
$p1-> addcart();
header('location: ../index.php')
?>