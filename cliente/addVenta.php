<?php
session_start();
include 'functionsCliente.php';

if(!empty($_SESSION["cart"])){
    $idVenta = createVenta();   
    foreach($_SESSION["cart"] as $c){        
        updateProductById($c[numero_lote], $c[cantidad]);
        addVentasProd($idVenta,$c[numero_lote], $c[cantidad]);
        unset($_SESSION['cart']);        
        print "<script>window.location=' comprarProducto.php';</script>";
    }
}else{
    print "<script>alert('Lista Vacia');</script>";
    print "<script>window.location=' comprarProducto.php';</script>";
}

?>