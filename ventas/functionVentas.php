<?php

function getAllVentas(){
    include '../includes/connect.php';    
    $sql = "SELECT * FROM ventas ";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
  
    return $result;
    
  }

function getDetalleVenta($idVenta){
    include '../includes/connect.php'; 
    $sql = "SELECT * FROM `ventas_prod`, `producto` WHERE ventas_prod.id_prod = producto.numero_lote AND ventas_prod.id_venta=".$idVenta;
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
  
    return $result;
}

function updateProductById($id, $cantidad){
    include '../includes/connect.php';    
    $sql = "UPDATE `producto` SET `cantidad_prod`= `cantidad_prod`+:cant WHERE `numero_lote`=".$id;
    $stmt = $con->prepare($sql);
    $array = array(
      'cant'=> $cantidad,			
    );
    $stmt->execute($array);

  }

function deleteVenta($idVenta){
    include '../includes/connect.php';
    $sql = "DELETE FROM ventas WHERE id_venta=".$idVenta;
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM ventas_prod WHERE id_venta=".$idVenta;
    $stmt = $con->prepare($sql);
    $stmt->execute();
}



?>