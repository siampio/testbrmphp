<?php
include 'functionsCliente.php';

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
        $resultProducto = getAllProductos();        
       
        ?> 
         
        <div id="content">                       
            <div id="wrap">      
                <div class="panel" style="margin-top:80px!important; width:980px;">
                    <div class="panel-heading">
                        <h3>Comprar producto</h3>    
                    </div>
                    <div class="panel-body">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4>Agregar producto</h4>    
                            </div>
                        <div class="panel-body">
                            <form action="addToCartProduct.php" method="POST">
                                <div class="control-group">
                                <label class="control-label" for="nombres">Producto</label><br>
                                <select name="producto" id="producto" required>
                                <option value="">Seleccionar producto...</option>  
                                    <?php
                                        foreach($resultProducto as &$row){                                                   
                                    ?>
                                    <option value="<?php echo $row['numero_lote']?>"><?php
                                        echo $row['nombre_producto']. " - Cantidad: ".$row['cantidad_prod'];
                                    }?></option>                                               
                                </select>
                                </div>
                                <div class="control-group">                     
                                <label class="control-label" for="nombres">Cantidad</label><br>
                                    <div class="controls">
                                        <input type="number" value="1" name="cantidad_prod" id="cantidad_prod" placeholder="Cantidad" class="form-control span8 tip" min="1" required>
                                    </div>
                                </div>
                                <br>
                                <div class="controls">
                                    <button type="submit" name="input" id="input"  class="btn btn-sm btn-primary">Agregar</button>
                                </div>
                            </form>
                        </div>                        
                    </div>
                    <div class="col-md-12">
                        <div class="panel">                                
                            <div class="panel-heading"><h3>Lista</h3>                                
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
                                            <th>--</th>                                               
                                            
                                        </thead>
                                       
                                        
                                        <?php                                            
                                        if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])){
                                            $total = 0;
                                            
                                            echo $today;
                                            foreach($_SESSION["cart"] as $c){
                                                $prod = getProductById($c['numero_lote']);       
                                        
                                        ?>
                                        <thead align="center">
                                            <tr>
                                        <th><?php echo $prod['nombre_producto']?></th>                                                     
                                        <th>
                                            <?php echo $c['cantidad']?>
                                        </th>
                                        <th><?php echo $prod['precio_producto']?></th>
                                        <th><?php 
                                            echo $prod['precio_producto']*$c['cantidad'];
                                        ?></th>
                                        <th width="5%">
                                        <form action="deleteToCartProduct.php" method="POST" >
                                            <input name="numero_lote" value="<?php echo $c['numero_lote']?>" type="hidden">
                                            <button  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="menu-icon icon-trash"></i> </button>

                                        </form>
                                        </th>                                                
                                        <?php  $total = $total+($prod['precio_producto']*$c['cantidad']);
                                        }}?>
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
                                    <form action="addVenta.php" method="POST">
                                    <div class="controls">
                                        <button type="submit" name="input" id="input"  class="btn btn-sm btn-primary">Realizar Compra</button>
                                    </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
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