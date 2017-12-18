<?php

use app\models\VentaSearch;
use app\models\Venta;
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
        
                   <center><div class="panel panel-default">
                 <div  class="panel-heading text-center">
                        Ventas diarias
                        </div>
                       </div>
                           </center>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php if ($data != '') { ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Rut CLiente</th>
                                        <th>Nombre Cliente</th>
                                        <th>Monto Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $i=0;
                                    foreach ($data as $value):  ?>
                                        <tr class="odd gradeA">
                                            
                                            <td><?php echo $value->cliente->rut; ?></td>
                                            <td><?php echo $value->cliente->nombre ?></td>
                                            <td><?php echo '$'.number_format(VentaSearch::getTotalDetalleValor($value)) ?></td>
                                     </tr>
                                    <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                    <tr><td></td><th>Total a Pagar: </th><th><?php echo '$'.number_format(VentaSearch::getTotalDetalleDiarias()); ?></th></tr>
                      
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
