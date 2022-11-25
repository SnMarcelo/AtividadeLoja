<?php 
session_start();

unset($_SESSION['status']);
unset($_SESSION['login']);
unset($_SESSION['id']);

header('location: ../cart.php');
?>

<!--  Limpa as sessoes -->