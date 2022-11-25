<?php
    // include
       // include
       include 'Carinho.class.php';
       session_start();
       $remover = new Carrinho;
       $remover-> remover();

       header('location: ../cart.php');
?>