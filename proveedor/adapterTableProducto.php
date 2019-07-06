<?php

include 'functionsProducto.php';

$requestData= $_REQUEST;


$colums = array(

    0=> 'numero_lote',
    1=> 'nombre_producto',
    2=> 'fecha_ven',
    3=> 'precio_producto',
    4=> 'cantidad_prod'
    

);

$totalData =0;

$dataFilter=0;

$bool = false;

$result = selectDataTable(1,$requestData);


if(!empty($requestData['search']['value'])){

    $result = selectDataTable(2,$requestData);

}

$data = array();

foreach($result as &$row){
    

    $nestedData=array();
    if($bool=false){
        $totalData++;
        $dataFilter++;
        $bool=true;

    }else{
        $dataFilter++;

    }    
    
    $nestedData[] = $row["numero_lote"];
    $nestedData[] = $row["nombre_producto"];    
    $nestedData[] = $row["fecha_ven"];
    $nestedData[] = $row["cantidad_prod"];
    $nestedData[] = $row["precio_producto"]; 
                       

    $data[] = $nestedData;



}



$json_data = array(

    //"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 

    "recordsTotal"    => intval( $totalData ),  // total number of records

    "recordsFiltered" => intval( $dataFilter ), // total number of records after searching, if there is no searching then totalFiltered = totalData

    "data"            => $data   // total data array

    );



echo json_encode($json_data);

?>