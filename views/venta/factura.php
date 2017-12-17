<?php

use app\models\DetalleventaSearch;
?>
<head>
      <link href="view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!-- DataTables CSS -->
    <link href="view/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="view/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="view/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="view/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS 
    <link href="view/vendor/morrisjs/morris.css" rel="stylesheet">
-->
    <!-- Custom Fonts -->
    <link href="view/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<div id="page-wrapper">
    
          <table>
              <tr><th>RUT Cliente: </th><td><?php echo $model->cliente->rut; ?></td><i></i>
               <th>RUT Proveedor: </th><td>78.876.345-5</td></tr>      
              <tr><th>Nombre Cliente: </th><td><?php echo  $model->cliente->nombre." ".$model->cliente->apellidoPaterno." ".$model->cliente->apellidoMaterno; ?></td>
                  <th>Nombre Proveedor: </th><td>Lechería Hanamichi LTDA.</td></tr>
              <tr><th>Email Cliente: </th><td><?php echo $model->cliente->email; ?></td>
               <th>Email Proveedor: </th><td>contacto@hanamichi.cl</td></tr>      
              <tr><th>Telefono Cliente: </th><td><?php echo $model->cliente->telefono; ?></td>
               <th>Telefono Proveedor: </th><td>999366977</td></tr>
          </table>
        
                   <center><div class="panel panel-default">
                 <div  class="panel-heading text-center">
                        Productos
                        </div>
                       </div>
                           </center>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php if ($model->detalleventas != '') { ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nombre Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Final</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $i=0;
                                    foreach ($model->detalleventas as $value):  ?>
                                        <tr class="odd gradeA">
                                            
                                            <td><?php echo $value->producto->nombre; ?></td>
                                            <td><?php echo $value->cantidad ?></td>
                                            <td><?php echo '$'.number_format($value->precioFinal) ?></td>
                                     </tr>
                                    <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                    <tr><td></td><th>Total a Pagar: </th><th><?php echo '$'.number_format(DetalleventaSearch::getTotal($dataProvider2->models,'precioFinal')); ?></th></tr>
                      
                                </tfoot>
                            </table>
                        
                       
                            <?php
                        } else {
                            echo '<h1>No Hay Datos</h1>';
                        }
                        ?>
                    </div>  

                </div>
  
</div>
