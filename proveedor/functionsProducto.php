<?php

function selectDataTable($option,$requestData){
    include '../includes/connect.php';
  
    $colums = array(
      0=> 'lote',
      1=> 'nombre_prod',
      2=> 'fecha_ven',
      3=> 'cantidad_prod',
      4=> 'precio_prod'
    );
    $sql="";
    switch($option){
      case 1:
        $sql="SELECT * FROM producto";
        break;
      case 2:
        $sql="SELECT * FROM producto WHERE";       
        $sql.=" numero_lote LIKE '".$requestData['search']['value']."%' ";
        $sql.=" OR nombre_producto LIKE '".$requestData['search']['value']."%' ";      
        break;
        
    }
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
  
    return $result;
  }

?>