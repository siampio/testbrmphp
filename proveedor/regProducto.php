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
        <?php include '../asset/incl/navbar.php'?>  
        <div id="content"> 
        <?php
        if(isset($_GET['Error'])){
            $e = $_GET['Error'];
             if($e == 11){
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Número de lote duplicado.</div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo registrar.</div>';
            }
        }
        ?>       
        <div class="tabs-wrapper text-center">             
             <div class="panel box-shadow-none text-left content-header">
                  <div class="col-md-12 tab-content">                    
                        <div class="col-md-12">
                            <div class="panel">                                
                                <div class="panel-heading"><h3>Productos</h3>                                
                                </div>
                                <div class="panel-body">
                                        <div class="responsive-table">
                                            <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                                <thead bgcolor="#eeeeee" align="center">
                                                    <tr>                
                                                    <th>Lote</th>
                                                    <th>Nombre</th>
                                                    <th>Fecha de vencimiento</th>                                                       
                                                    <th>Cantidad</th>
                                                    <th>Precio </th>                                                
                                                    
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>                    
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3>Añadir Producto</h3>    
                            </div>
                            <div class="panel-body">
                            <form name="form1" id="form1" class="form-horizontal row-fluid" action="insertProducto.php" method="POST" >                                        
										<div class="control-group">
											<label class="control-label" for="nombres">Número de lote</label>
											<div class="controls">
												<input type="text" name="lote" id="lote" placeholder="Número de lote" class="form-control span8 tip" required>
											</div>
										</div>
                                        <div class="control-group">
                                            <label class="control-label" for="nombres">Producto</label>
                                            <div class="controls">
                                                <input type="text" name="name_producto" id="name_producto" placeholder="Producto" class="form-control span8 tip" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="nombres">Fecha de vencimiento</label>
                                            <div class="controls">
                                                <input type="date" name="date_ven" id="date_ven" placeholder="Fecha de vencimiento" class="form-control span8 tip" min="2019-01-01" required>
                                            </div>
                                        </div>										
										<div class="control-group">
											<label class="control-label" for="nombres">Cantidad</label>
											<div class="controls">
												<input type="number" name="cantidad_prod" id="cantidad_prod" placeholder="Cantidad" class="form-control span8 tip" min="1" required>
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="nombres">Precio</label>
											<div class="controls">
												<input type="text" name="precio_prod" id="precio_prod" placeholder="Precio producto" class="form-control span8 tip" required>
											</div>
										</div>
										<br><br>                             
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
											</div>
										</div>
									</form>
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
        <!--TablesScript-->
        <script>
        $(document).ready(function() {
				var dataTable = $('#datatables-example').DataTable( {
				 "language":	{
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					},
					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
				},
                "columnDefs": [
                            {"className": "dt-center", "targets": "_all"}
                        ],
					"ajax":{
						url :"adapterTableProducto.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#datatables-example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
						}
					}
				} );
			} );
        </script>
<!-- end: Javascript -->
    </body>
</html>