<?php
//include "modules/lista_socios/csv.php";
?>
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Lista de socios

    <a class="btn btn-primary btn-social pull-right pdf-button" href="modules/lista_socios/print.php" target="_blank">
      <i class="fa fa-print"></i> Imprimir PDF
    </a>

    <a class="btn btn-success btn-social pull-right" href="modules/lista_socios/csv.php?print_csv=si">
      <i class="fa fa-file-text-o"></i> Imprimir CSV
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
        
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
          
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Codigo</th>
                <th class="center">Nombre</th>
                <th class="center">Cedula/RNC</th>
                <th class="center">Edad</th>
                <th class="center">Sexo</th>
            <!--    <th class="center">Localidad</th> -->
                <th class="center">Cat.</th>
                <th class="center">Activo</th>
              </tr>
            </thead>
          
            <tbody>
            <?php  
            $no = 1;
          
            $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,categoria,fexpiracion FROM socios ORDER BY nombres ASC")
                                            or die('Error: '.mysqli_error($mysqli));

           
            while ($data = mysqli_fetch_assoc($query)) { 
              //determinando edad
                $nacimiento = new DateTime($data['fnacimiento']);
                $hoy = new DateTime();
                $edad = $hoy->diff($nacimiento);
             
              echo "<tr>
                      <td width='10' class='center'>$no</td>
                      <td width='150' class='center'>$data[codigo]</td>
                      <td width='200'>$data[nombres] $data[apellidos]</td>
                      <td width='180'>$data[cedula]</td>
                      <td width='20'>".$edad->y."</td>
                      <td width='20'title='";
                      switch ($data['sexo']) {
                        case "F": echo "FEMENINO"; break;
                        case "M": echo "MASCULINO"; break;
                        }
                      echo "'>$data[sexo]</td>";
                 //     <td width='180'>$data[localidad]</td>
                      echo "
                      <td width='80' title='";
                      switch ($data['categoria']) {
                        case "A": echo "ALUMNO"; break;
                        case "B": echo "ALUMNO - PREMIUM"; break;
                        case "C": echo "CENTRO DE CAPACITACION"; break;
                        case "F": echo "FACILIADOR"; break;
                        case "E": echo "ESTABLECIMIENTO"; break;
                        }
                      echo "'>$data[categoria]</td>
                      <td width='80'>$data[fexpiracion]</td>
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