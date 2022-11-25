<?php 
session_start();

unset($_SESSION['status']);
unset($_SESSION['login']);

header('location: ../cart.php');
?>