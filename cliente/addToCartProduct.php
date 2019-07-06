<?php
session_start();
include 'functionsCliente.php';


if(!empty($_POST)){
    if(isset($_POST["producto"])){   
        $product = getProductById($_POST["producto"]);
        if( $_POST["cantidad_prod"] > $product['cantidad_prod'] ){
            print "<script>alert('Error: Se selecciono una cantidad mayor');</script>";
            print "<script>window.location=' comprarProducto.php';</script>";
        }else{
            if(empty($_SESSION["cart"])){            

                $_SESSION["cart"]=array( array("numero_lote"=>$_POST["producto"], "cantidad"=>$_POST["cantidad_prod"]));
                print "<script>window.location='comprarProducto.php';</script>";
               
            }else{
                // apartie del segundo producto:            
                $cart = $_SESSION["cart"];            
                $repeated = false;
                // recorremos el carrito en busqueda de producto repetido
                foreach ($cart as $c) {
                    // si el producto esta repetido rompemos el ciclo  
                     echo    $c["numero_lote"];       
                    if($c["numero_lote"]==$_POST["producto"]){
                        $repeated=true;
                       break;
                    }
                    
                    
                }
                
                // si el producto es repetido no hacemos nada, simplemente redirigimos
                if($repeated){
                    print "<script>alert('Error: Producto Repetido!');</script>";
                }else{
                    // si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
                    array_push($cart, array("numero_lote"=>$_POST["producto"],"cantidad"=> $_POST["cantidad_prod"]));
                    $_SESSION["cart"] = $cart;
                    echo 'hola';
                    print "<script>window.location='comprarProducto.php';</script>";
                }
                print "<script>window.location='comprarProducto.php';</script>";
                
            }
        }
        
        
    }
}




?>