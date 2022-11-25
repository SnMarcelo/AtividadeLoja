<?php
        include 'carrinho.class.php';
session_start();
$_SESSION['qtd'][$_GET['id']]+=-1;
$_SESSION['carinho'][$_GET['id']]->Quantidade=$_SESSION['qtd'][$_GET['id']];
header('location: ../cart.php')
?>