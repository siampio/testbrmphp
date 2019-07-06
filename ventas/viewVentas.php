<?php
include 'functionVentas.php';

session_start();

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="author" content="">
    <title>Test</title>
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/datatables.bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
	<link href="../asset/css/style.css" rel="stylesheet">
	<!-- end: Css -->
	<link rel="shortcut icon" href="../asset/img/logomi.png">
  </head>
    <body id="mimin" class="dashboard">
        <?php 
        include '../asset/incl/navbar.php';
        $resultVentas = getAllVentas();        
       
        ?> 
         
        <div id="content">                       
            <div id="wrap">      
                <div class="panel" style="margin-top:80px!important; width:980px;">
                    <div class="panel-heading">
                        <h3>Ver ventas</h3>    
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                        <?php foreach($resultVentas as &$ventas){?>
                        <div class="panel">                                                        
                            <div class="panel-heading"><h3>Venta <?php echo $ventas['id_venta'] ?></h3>                                
                            </div>
                            <div class="panel-body">
                                <div class="responsive-table">
                                    <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                        <thead bgcolor="#eeeeee" align="center">
                                            <tr>
                                            <th>Nombre</th>                                                    
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Total </th>
                                        </thead>                                     
                                        <?php                                            
                                            $detalleCompra = getDetalleVenta($ventas['id_venta']);
                                            $total = 0;
                                            foreach($detalleCompra as $c){                                                   
                                        
                                        ?>
                                         <thead align="center">
                                            <tr>
                                        <th><?php echo $c['nombre_producto']?></th>                                                     
                                        <th>
                                            <?php echo $c['cantidad']?>
                                        </th>
                                        <th><?php echo $c['precio_producto']?></th>
                                        <th><?php 
                                            echo $c['precio_producto']*$c['cantidad'];
                                        ?></th>
                                                                                        
                                        <?php  $total = $total+($c['precio_producto']*$c['cantidad']);
                                        }?>
                                        </thead>
                                       
                                        
                                        <thead bgcolor="#eeeeee" align="center">
                                            <tr>                
                                            <th></th>
                                            <th></th>                                                    
                                            <th>Total</th>
                                            <th><?php echo $total ?></th>                                       
                                            
                                        </thead>                                        
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <form action="deleteVenta.php" method="POST">
                                    <div class="controls">
                                        <input name="id_venta" value="<?php echo $ventas['id_venta']?>" type="hidden"> 
                                        <button type="submit" name="input" id="input"  class="btn btn-sm btn-danger">Eliminar Venta</button>
                                    </div>
                                    </form>
                                    
                                </div>
                            </div>
                    </div>                    
                        <?php } ?>
                    
                </div>                                       
            </div>
        </div>
        <!-- start: Javascript -->
        <script src="../asset/js/jquery.min.js"></script>
        <script src="../asset/js/jquery.ui.min.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
        <!-- plugins -->
        <script src="../asset/js/plugins/moment.min.js"></script>        
        <script src="../asset/js/plugins/jquery.nicescroll.js"></script>
        <script src="../asset/js/plugins/jquery.dataTables.js"></script>
        <script src="../asset/js/plugins/dataTables.bootstrap.js"></script>        
        <!-- custom -->
        <script src="../asset/js/main.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $(".nav-tabs a").click(function (e) {
            e.preventDefault();  
            $(this).tab('show');
            });
        });
        </script>                
<!-- end: Javascript -->
    </body>
</html>