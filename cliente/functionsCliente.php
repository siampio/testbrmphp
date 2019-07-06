<?php

function getAllProductos(){
    include '../includes/connect.php';
    $today = date('Y-m-d');
    $sql = "SELECT * FROM producto WHERE fecha_ven >='".$today."' AND cantidad_prod > 0";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
  
    return $result;
    
  }

  function getProductById($id){
    include '../includes/connect.php';
    $sql = "SELECT * FROM producto WHERE numero_lote=".$id;
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
    return $result;
  }

  function updateProductById($id, $cantidad){
    include '../includes/connect.php';
    $stock = 
    $sql = "UPDATE `producto` SET `cantidad_prod`= `cantidad_prod`- :cant WHERE `numero_lote`=".$id;
    $stmt = $con->prepare($sql);
    $array = array(
      'cant'=> $cantidad,			
    );
    $stmt->execute($array);

  }

  function createVenta(){
    include '../includes/connect.php';
    $today = date('Y-m-d');
    $id = mt_rand();
    $sql = "INSERT INTO ventas (id_venta, fecha_venta) 
        VALUES (:id, :fecha)";
    $stmt = $con->prepare($sql);
    $array = array(
    ":id"=>$id,
    ":fecha"=>$today
    );
    $stmt->execute($array);

    return $id;
  }

  function addVentasProd($idVenta, $idProd, $cantidad){
    include '../includes/connect.php';    
    $sql = "INSERT INTO ventas_prod (id_venta, id_prod, cantidad) 
        VALUES (:id_venta, :id_prod, :cantidad)";
    $stmt = $con->prepare($sql);
    $array = array(
    ":id_venta"=>$idVenta,
    ":id_prod"=>$idProd,
    ":cantidad"=>$cantidad
    );
    $stmt->execute($array);
  }
?>