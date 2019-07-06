<?php
session_start();

if(isset($_POST["numero_lote"])){

    $cart = $_SESSION["cart"];
    foreach ($cart as $index=>$c) {
        // si el producto esta repetido rompemos el ciclo
         
        if($c["numero_lote"]==$_POST["numero_lote"]){
            unset($_SESSION["cart"][$index]);
            print "<script>window.location=' comprarProducto.php';</script>";    
        }
        
        
    }

 }


?>
