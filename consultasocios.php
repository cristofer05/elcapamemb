<?php 
require_once "config/database.php";
?>
  <head>
    <meta charset="UTF-8">
    <title>Consulta de Socios</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Sistema de membresias elCapacitador">
    <meta name="author" content="Media experto" />

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" />
    <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
  </head>


  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Consulta de socios
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div id="app" class="panel">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="?act=mostrar&alert=1" method="POST" name="buscar">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-4 control-label">Cedula del socio </label>
                <div class="col-sm-5">
                  <span v-if="scans.length === 0">
                    <input type="text" class="form-control empty" name="cedula" placeholder="" required>
                  </span>
                  
                </div>
              
              </div>      
              <hr>
            </div><!-- /.box body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-5 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Buscar" value="Buscar">
                  <a href="?" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div>
    </div> <!-- /#app -->
  </section><!-- /.content -->


<?php

if (isset($_GET['act']) && $_GET['act'] =='mostrar') {
        if (isset($_POST['cedula'])) {     
            $cedula = mysqli_real_escape_string($mysqli, trim($_POST['cedula'])); 

            $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fexpiracion,created_date FROM socios WHERE cedula='$cedula'")
                                  or die('error '.mysqli_error($mysqli));


            $data = mysqli_fetch_assoc($query);
            ?>

            <!-- Main content -->
            <section class="content 2nd" style="margin-top: -40px;">
              <div class="row">
                <div class="col-md-12">
                 <div class="panel panel-default">

          <!-- FORMULARIO DE SOLO VER -->
                 <?php  
                    if ($data['codigo'] == ""){
                echo "
                <div class='alert alert-danger fade in'>
                  <strong>Error!</strong> Los datos ingresados son incorrectos o el socio no existe
                </div>
                
                ";
            }
            ?>
                    <form class="form-horizontal" id="Ver">
                      <div class="panel-body">
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Codigo del socio</label>
                          <div class="col-sm-5">
                            <?php echo $data['codigo']; ?>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Nombres</label>
                          <div class="col-sm-5">
                            <?php echo $data['nombres']; ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Apellidos</label>
                          <div class="col-sm-5">
                            <?php echo $data['apellidos']; ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Estatus</label>
                          <div class="col-sm-5">
                              <?php 
                                $date = date('Y-m-d H:i:s');
                                if ($data['codigo'] == ""){
                                    echo "";
                                }elseif($data['fexpiracion']<= $date){
                                  echo "INACTIVO";
                                }else{echo "ACTIVO";}; ?>
                          </div>
                        </div>
                      </div><!-- /.box body -->
                     </form>
                  </div>  
                </div>
              </div>
            </section>
<?php 


            } 
        } 
?>