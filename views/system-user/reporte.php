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
                        Lista de Usuarios
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php if ($data != '') { ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombres</th>
                                        <th>Apellidos </th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                        <th>Nombre usuario</th>
                                        <th>Rol usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($data as $value):  ?>
                                        <tr class="odd gradeA">
                                            
                                            <td><?php echo $value->id; ?></td>
                                            <td><?php echo $value->first_name; ?></td>
                                            <td><?php echo $value->last_name ?></td>
                                            <td><?php echo $value->email ?></td>
                                            <td><?php echo $value->phone_number ?></td>
                                            <td><?php echo $value->username ?></td>
                                            <td><?php echo $value->user_level ?></td>
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
