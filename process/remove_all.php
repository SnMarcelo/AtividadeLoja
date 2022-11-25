<?php
    // include
    include 'Carinho.class.php';
    session_start();
    $limpar = new Carrinho;
    $limpar-> limpar();
?>