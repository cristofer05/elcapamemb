

<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Lista de Miembros

    <a class="btn btn-primary btn-social pull-right" href="modules/stock_inventory/print.php" target="_blank">
      <i class="fa fa-print"></i> Imprimir
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
                <th class="center">Nombres</th>
                <th class="center">Apellidos</th>
                <th class="center">Cedula</th>
                <th class="center">Edad</th>
                <th class="center">Sexo</th>
                <th class="center">Localidad</th>
                <th class="center">Categoria</th>
              </tr>
            </thead>
          
            <tbody>
            <?php  
            $no = 1;
          
            $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,categoria,fexpiracion FROM miembros ORDER BY nombres ASC")
                                            or die('Error: '.mysqli_error($mysqli));

           
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
                      <td width='110'>$data[sexo]</td>
                      <td width='180'>$data[localidad]</td>
                      <td width='80'>$data[categoria]</td>
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