<?php  

if ($_GET['form']=='buscar') { ?> 

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
          <form role="form" class="form-horizontal" action="modules/escanear/proses.php?act=mostrar" method="POST" name="buscar">
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
}
?>