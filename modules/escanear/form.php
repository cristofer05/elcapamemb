<?php 
require_once "config/database.php";
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Busqueda de miembros
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=escanear"> Buscar </a></li>
      <!-- <li class="active"> Agregar </li> -->
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="?module=escanear&act=mostrar&alert=1" method="POST" name="buscar">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo de miembro </label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" placeholder="Ej: CAP-000000" required>
                </div>
              </div>
              
              <hr>

            </div><!-- /.box body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Buscar" value="Buscar">
                  <a href="?module=escanear" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php

if (isset($_GET['act']) && $_GET['act'] =='mostrar') {
        if (isset($_POST['codigo'])) {     
            $codigo = mysqli_real_escape_string($mysqli, trim($_POST['codigo'])); 

            $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,categoria,fexpiracion,created_date FROM miembros WHERE codigo='$codigo'")
                                  or die('error '.mysqli_error($mysqli));


            $data = mysqli_fetch_assoc($query);
            ?>

            <!-- Main content -->
            <section class="content 2nd" style="margin-top: -40px;">
              <div class="row">
                <div class="col-md-12">
                 <div class="panel panel-default">

          <!-- FORMULARIO DE SOLO VER -->
                    <form class="form-horizontal" id="Ver">
                      <div class="panel-body">
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Codigo</label>
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
                          <label class="col-sm-2 control-label">Cedula</label>
                          <div class="col-sm-5">
                           <?php echo $data['cedula']; ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Fecha Nacimiento</label>
                          <div class="col-sm-5">
                           <?php echo $data['fnacimiento']; ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Sexo</label>
                          <div class="col-sm-5">
                              <?php switch ($data['sexo']) {
                                  case "F": echo "Femenino"; break;
                                  case "M": echo "Masculino"; break;
                                  } ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Localidad</label>
                          <div class="col-sm-5">
                            <?php echo $data['localidad']; ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Ocupacion</label>
                          <div class="col-sm-5">
                           <?php echo $data['ocupacion']; ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Correo</label>
                          <div class="col-sm-5">
                           <?php echo $data['correo']; ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Telefono</label>
                          <div class="col-sm-5">
                            <?php echo $data['telefono']; ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Categoria</label>
                          <div class="col-sm-5">
                              <?php switch ($data['categoria']) {
                                  case "A": echo "Premium"; break;
                                  case "B": echo "Regular"; break;
                                  case "C": echo "Basico"; break; }  ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Fecha Expiracion</label>
                          <div class="col-sm-5">
                              <?php echo $data['fexpiracion']; ?>
                          </div>
                        </div>
                      </div><!-- /.box body -->
                      <div class="box-footer">
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                              <a data-toggle="tooltip" data-placement="top" target="_blank" title="Imprimir" class="btn btn-primary" href="modules/miembros/print.php?&id=<?php echo $data['codigo'];?>"><i style="color:#fff" class="glyphicon glyphicon-print"></i> Imprimir</a>
                              <a data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning btn-reset" href="?module=form_miembros&form=edit&id=<?php echo $data['codigo'];?>"><i style="color:#fff" class="glyphicon glyphicon-pencil"></i> Editar</a>
                            </div>
                          </div>
                        </div>
                     </form>
                  </div>  
                </div>
              </div>
            </section>
<?php 


            } 
        } 
?>