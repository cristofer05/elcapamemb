<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Miembros

    <a class="btn btn-primary btn-social pull-right" href="?module=form_miembros&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
    </a>
  </h1>

</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  

    if (empty($_GET['alert'])) {
      echo "";
    } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Nuevos datos del miembro ha sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos del Miembro modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos del Miembro
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Codigo</th>
                <th class="center">Nombres</th>
                <th class="center">Apellidos</th>
                <th class="center">Cedula</th>
                <th class="center">Edad</th>
                <th class="center">Sexo</th>
                <th class="center">Localidad</th>
                <th class="center">Categoria</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,categoria,fexpiracion FROM miembros ORDER BY codigo DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) {  
              //determinando edad
                $nacimiento = new DateTime($data['fnacimiento']);
                $hoy = new DateTime();
                $edad = $hoy->diff($nacimiento);

              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='150' class='center'>$data[codigo]</td>
                      <td width='200'>$data[nombres]</td>
                      <td width='200'>$data[apellidos]</td>
                      <td width='180'>$data[cedula]</td>
                      <td width='60'>".$edad->y."</td>
                      <td width='110' title='";
                      switch ($data['sexo']) {
                        case "F": echo "FEMENINO"; break;
                        case "M": echo "MASCULINO"; break;
                        }
                      echo "'>$data[sexo]</td>
                      <td width='180'>$data[localidad]</td>
                      <td width='80' title='";
                      switch ($data['categoria']) {
                        case "A": echo "PREMIUM"; break;
                        case "B": echo "REGULAR"; break;
                        case "C": echo "BASICO"; break;
                        }
                      echo "'>$data[categoria]</td>
                      <td class='center' width='200'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Ver/Editar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_miembros&form=edit&id=$data[codigo]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                         <a data-toggle="tooltip" data-placement="top" target="_blank" title="Imprimir" class="btn btn-primary btn-sm" href="modules/miembros/print.php?&id=<?php echo $data['codigo'];?>" onclick="return confirm('estas seguro de Imprimir a <?php echo $data['nombre']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-print"></i>
                          </a>
                          
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/miembros/proses.php?act=delete&id=<?php echo $data['codigo'];?>" onclick="return confirm('estas seguro de eliminar<?php echo $data['nombre']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content