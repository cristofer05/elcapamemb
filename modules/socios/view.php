<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de socios

    <a class="btn btn-primary btn-social pull-right" href="?module=form_socios&form=add" title="agregar" data-toggle="tooltip">
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
             Nuevos datos del miembro han sido  almacenados correctamente.
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

    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Tarjeta de membresia enviada satisfactoriamente
            </div>";
    }

    elseif ($_GET['alert'] == 5) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> ERROR!</h4>
            No se pudo enviar el correo
            </div>";
    }

    elseif ($_GET['alert'] == 6) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Nuevos datos del miembro han sido  almacenados correctamente y Tarjeta de membresia enviada satisfactoriamente.
            </div>";
    }

    elseif ($_GET['alert'] == 7) {
      echo "<div class='alert alert-warning alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Advertencia!</h4>
            Nuevos datos del miembro han sido  almacenados correctamente pero NO se pudo enviar el correo
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
                <th class="center">Cedula / RNC</th>
                <th class="center">Edad</th>
                <th class="center">Sexo</th>
            <!--    <th class="center">Localidad</th> -->
                <th class="center">Cat.</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,categoria,fexpiracion FROM socios ORDER BY codigo DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) {  
              //determinando edad
                $nacimiento = new DateTime($data['fnacimiento']);
                $hoy = new DateTime();
                $edad = $hoy->diff($nacimiento);

              echo "<tr>
                      <td width='5' class='center'>$no</td>
                      <td width='100' class='center'>$data[codigo]</td>
                      <td width='150'>$data[nombres] $data[apellidos]</td>
                      <td width='110'>$data[cedula]</td>
                      <td width='20'>".$edad->y."</td>
                      <td width='20' title='";
                      switch ($data['sexo']) {
                        case "F": echo "FEMENINO"; break;
                        case "M": echo "MASCULINO"; break;
                        }
                      echo "'>$data[sexo]</td>";
                  //    <td width='120'>$data[localidad]</td>
                      echo "
                      <td width='20' title='";
                      switch ($data['categoria']) {
                        case "A": echo "ALUMNO"; break;
                        case "B": echo "ALUMNO - PREMIUM"; break;
                        case "C": echo "CENTRO DE CAPACITACION"; break;
                        case "F": echo "FACILIADOR"; break;
                        case "E": echo "ESTABLECIMIENTO"; break;
                        }
                      echo "'>$data[categoria]</td>
                      <td class='center' width='200'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Ver/Editar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_socios&form=edit&id=$data[codigo]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                         <a data-toggle="tooltip" data-placement="top" target="_blank" title="Imprimir" class="btn btn-primary btn-sm" href="modules/socios/print.php?&id=<?php echo $data['codigo'];?>" onclick="return confirm('estas seguro de Imprimir a <?php echo $data['nombre']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-print"></i>
                          </a>
                          
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/socios/proses.php?act=delete&id=<?php echo $data['codigo'];?>" onclick="return confirm('estas seguro de eliminar<?php echo $data['nombre']; ?> ?');">
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