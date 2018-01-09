<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i>Reporte de lista de miembros por filtro
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
    <li class="active">informe</li>
    <li class="active"> lista de miembros</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <div class="tab">
          <button class="btn btn-primary active tablinks" onclick="cambiarTab(event, 'fecha')" active>Filtrar Por Fecha</button>
          <button class="btn btn-primary tablinks" onclick="cambiarTab(event, 'nuevos')">Nuevos Inscritos</button>
          <button class="btn btn-primary tablinks" onclick="cambiarTab(event, 'expirar')">Membresias a Expirar</button>
        </div>
        <!-- PRIMER TAB -->
        <div id="fecha" class="tabcontent" style="display: block;">
        <form role="form" class="form-horizontal" method="GET" action="modules/filtro_miembros/print_fecha.php" target="_blank">
          <div class="box-body">
            <h3>A continuacion ingrese las fechas por las que desea filtar a los miembros a mostar en este reporte</h3>
            <hr>
            <div class="form-group">
              <label class="col-sm-1">Desde</label>
              <div class="col-sm-2">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal" autocomplete="off" required>
              </div>

              <label class="col-sm-1">Hasta</label>
              <div class="col-sm-2">
                <input style="margin-left:-35px" type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" autocomplete="off" required>
              </div>
            </div>
          </div>
          
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-primary btn-social btn-submit" style="width: 120px;">
                  <i class="fa fa-print"></i> Imprimir
                </button>
              </div>
            </div>
          </div>
        </form>
        </div>
        <!-- SEGUNDO TAB -->
        <div id="nuevos" class="tabcontent">
          <form role="form" class="form-horizontal" method="GET" action="modules/filtro_miembros/print_nuevos.php" target="_blank">
          <div class="box-body">
            <h3>Selecciona el rango de los ultimos miembros "Creados" que quieres mostrar</h3>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 radio-inline">
                <input type="radio" name="rango" value="3dias" checked> Ultimos Tres Dias<br>
              </label>
              <label class="col-sm-2 radio-inline">
                <input type="radio" name="rango" value="semana"> Ultima Semana<br>
              </label>
              <label class="col-sm-2 radio-inline">
                <input type="radio" name="rango" value="mes"> Ultimo Mes<br>
              </label>
            </div>
          </div>
          
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-primary btn-social btn-submit" style="width: 120px;">
                  <i class="fa fa-print"></i> Imprimir
                </button>
              </div>
            </div>
          </div>
        </form>
        </div>
        <!-- TERCER TAB -->
        <div id="expirar" class="tabcontent">
          <form role="form" class="form-horizontal" method="GET" action="modules/filtro_miembros/print_expirar.php" target="_blank">
          <div class="box-body">
           <h3>Selecciona el rango de los proximos miembros a "Expirar" que quieres mostrar</h3>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 radio-inline">
                <input type="radio" name="rango" value="3dias" checked> Proximos Tres Dias<br>
              </label>
              <label class="col-sm-2 radio-inline">
                <input type="radio" name="rango" value="semana" checked> Proxima Semana<br>
              </label>
              <label class="col-sm-2 radio-inline">
                <input type="radio" name="rango" value="mes" checked> Proximo Mes<br>
              </label>
            </div>
          </div>
          
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-primary btn-social btn-submit" style="width: 120px;">
                  <i class="fa fa-print"></i> Imprimir
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