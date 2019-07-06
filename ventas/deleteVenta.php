<?php 
include 'functionVentas.php';

$id_venta = $_POST['id_venta']; 

$detalleVenta = getDetalleVenta($id_venta);

foreach($detalleVenta as $c){
    updateProductById($c['id_prod'], $c['cantidad']);
    deleteVenta($id_venta);
    print "<script>window.location=' viewVentas.php';</script>";
}
?>