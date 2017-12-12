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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Productos
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php if ($data != '') { ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Detalle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($data as $value):  ?>
                                        <tr class="odd gradeA">
                                            
                                            <td><?php echo $value->nombre; ?></td>
                                            <td><?php echo '$'.number_format($value->precio); ?></td>
                                            <td><?php echo $value->stock; ?></td>
                                            <td><?php echo $value->detalle; ?></td>
                                     </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo '<h1>No Hay Datos</h1>';
                        }
                        ?>
                    </div>  

                </div>
  
</div>
