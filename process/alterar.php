<?php
include 'Carinho.class.php'; 

session_start();
// criando obj
$p1 = new Carrinho;
$p1->Iten=$_GET['$id'];

$p1->alterar();

header('location: ../cart.php');


?>