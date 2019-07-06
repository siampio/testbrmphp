<?php

include '../includes/connect.php';

if(isset($_POST['lote']) && isset($_POST['name_producto']) && isset($_POST['date_ven']) && isset($_POST['cantidad_prod']) && isset($_POST['precio_prod'])){  
    
    $lote = $_POST['lote'];
    $name_prod = $_POST['name_producto'];
    $date_ven =  $_POST['date_ven'];
    $cant=  $_POST['cantidad_prod'];
    $precio =  $_POST['precio_prod'];
  
    try{
        $sql = "INSERT INTO producto (numero_lote, nombre_producto, fecha_ven, precio_producto, cantidad_prod) 
        VALUES (:lote, :name_prod, :date_ven, :precio, :cant)";
        $stmt = $con->prepare($sql);
        $array = array(
        ":lote"=>$lote,
        ":name_prod"=>$name_prod,
        ":date_ven"=>$date_ven,
        ":cant"=>$cant,
        ":precio"=>$precio
        );
        $stmt->execute($array);
        $row = $stmt->fetch();

        header('Location: regProducto.php');
    }catch(PDOException $e){
        if ($e->getCode() == '23000') {
            header('Location: regProducto.php?Error=11');
        }
        
    }
   


 }

?>