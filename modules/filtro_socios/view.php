<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i>Reporte por filtro
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
    <li class="active">informe</li>
    <li class="active"> lista de socios</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <div class="tab">
          <button class="btn btn-primary active tablinks" onclick="cambiarTab(event, 'fecha')" active>FILTRAR POR FECHA</button>
          <button class="btn btn-primary tablinks" onclick="cambiarTab(event, 'nuevos')">NUEVOS SOCIOS</button>
          <button class="btn btn-primary tablinks" onclick="cambiarTab(event, 'expirar')">ESTATUS DE MEMBRESIA</button>
        </div>
        <!-- PRIMER TAB -->
        <div id="fecha" class="tabcontent" style="display: block;">
        <form role="form" class="form-horizontal" method="GET" action="modules/filtro_socios/print_fecha.php" target="_blank">
          <div class="box-body">
            <h3>A continuacion ingrese las fechas por las que desea filtar a los socios a mostar en este reporte</h3>
            <hr>
            <div class="form-group">
              <label class="col-sm-1">Desde</label>
              <div class="col-sm-4">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal" autocomplete="off" required>
              </div>

              <label class="col-sm-1">Hasta</label>
              <div class="col-sm-4">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" autocomplete="off" required>
              </div>
            </div>
          </div>
          
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <a class="btn btn-success btn-social pull-right" href="modules/filtro_socios/fecha_csv.php?print_csv=si">
                <i class="fa fa-file-text-o"></i> Imprimir CSV
              </a>
                <button type="submit" class="btn btn-primary btn-social btn-submit" style="width: 150px;">
                  <i class="fa fa-print"></i> Imprimir PDF
                </button>
              </div>
            </div>
          </div>
        </form>
        </div>
        <!-- SEGUNDO TAB -->
        <div id="nuevos" class="tabcontent">
          <form role="form" class="form-horizontal" method="GET" action="modules/filtro_socios/print_nuevos.php" target="_blank">
          <div class="box-body">
            <h3>Selecciona el rango de los ultimos socios "Creados" que quieres mostrar</h3>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 radio-inline">
                <input type="radio" name="rango" value="3dias" checked> Ultimos Tres Dias<br>
              </label>
              <label class="col-sm-3 radio-inline">
                <input type="radio" name="rango" value="semana"> Ultima Semana<br>
              </label>
              <label class="col-sm-3 radio-inline">
                <input type="radio" name="rango" value="mes"> Ultimo Mes<br>
              </label>
            </div>
          </div>
          
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <a class="btn btn-success btn-social pull-right" href="modules/filtro_socios/nuevos.php?print_csv=si">
                  <i class="fa fa-file-text-o"></i> Imprimir CSV
                </a>
                <button type="submit" class="btn btn-primary btn-social btn-submit" style="width: 150px;">
                  <i class="fa fa-print"></i> Imprimir PDF
                </button>
              </div>
            </div>
          </div>
        </form>
        </div>
        <!-- TERCER TAB -->
        <div id="expirar" class="tabcontent">
          <form role="form" class="form-horizontal" method="GET" action="modules/filtro_socios/print_expirar.php" target="_blank">
          <div class="box-body">
           <h3>Selecciona el rango de los proximos socios a "Expirar" que quieres mostrar</h3>
            <hr>
            <div class="form-group">
              <label class="col-sm-3 radio-inline">
                <input type="radio" name="rango" value="3dias" checked> Proximos Tres Dias<br>
              </label>
              <label class="col-sm-3 radio-inline">
                <input type="radio" name="rango" value="semana" checked> Proxima Semana<br>
              </label>
              <label class="col-sm-3 radio-inline">
                <input type="radio" name="rango" value="mes" checked> Proximo Mes<br>
              </label>
            </div>
          </div>
          
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <a class="btn btn-success btn-social pull-right" href="modules/filtro_socios/expirar_csv.php?print_csv=si">
                  <i class="fa fa-file-text-o"></i> Imprimir CSV
                </a>
                <button type="submit" class="btn btn-primary btn-social btn-submit" style="width: 150px;">
                  <i class="fa fa-print"></i> Imprimir PDF
                </button>
              </div>
            </div>
          </div>
        </form>
        </div>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content -->