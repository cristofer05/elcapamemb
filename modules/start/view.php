  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Inicio
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Inicio</a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Bienvenido <strong><?php echo $_SESSION['name_user']; ?></strong> a la aplicación de administracion de membresias.
          </p>        
        </div>
      </div>  
    </div>
   
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-6 col-xs-12">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
        <?php  
          if ($_SESSION['permisos_acceso']!='gerente') { ?>
            <a href="?module=form_socios&form=add" class="small-box-footer"  data-toggle="tooltip">
          <div class="inner">
            <?php  
          
            $query = mysqli_query($mysqli, "SELECT COUNT(codigo) as numero FROM socios")
                                            or die('Error '.mysqli_error($mysqli));

           
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php // echo $data['numero']; ?></h3>
            <h3>NUEVO SOCIO</h3>
          </div>
          </a>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
            <a href="?module=form_socios&form=add" class="small-box-footer" title="Agregar" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-6 col-xs-12">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <a href="?module=escanear" class="small-box-footer"  data-toggle="tooltip">
          <div class="inner">
            
            <h3></h3>
            <h3>ESCANEAR CODIGO</h3>
          </div>
          </a>
          <div class="icon">
            <i class="fa fa-sign-in"></i>
          </div>
          <?php  
          if ($_SESSION['permisos_acceso']!='gerente') { ?>
            <a href="?module=escanear" class="small-box-footer" title="Agregar" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-6 col-xs-12">
        <!-- small box -->
        <div style="background-color:#424242;color:#fff" class="small-box">
        <a href="?module=socios" class="small-box-footer" data-toggle="tooltip">
          <div class="inner">
            <?php  
  
            $query = mysqli_query($mysqli, "SELECT COUNT(codigo) as numero FROM socios")
                                            or die('Error'.mysqli_error($mysqli));

            $data = mysqli_fetch_assoc($query);
            ?>
            <h3></h3>
            <h3>MOSTRAR SOCIOS (<?php echo $data['numero']; ?>)</h3>
          </div>
          </a>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="?module=socios" class="small-box-footer" title="Imprimir" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-6 col-xs-12">
        <!-- small box -->
        <div style="background-color:#CCC;color:#fff" class="small-box">
        <a href="?module=filtro_socios" class="small-box-footer" data-toggle="tooltip">
          <div class="inner">
          
            <h3></h3>
            <h3>REPORTES</h3>
          </div>
          </a>
          <div class="icon">
            <i class="fa fa-clone"></i>
          </div>
          <a href="?module=filtro_socios" class="small-box-footer" title="Imprimir" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->
  </section><!-- /.content -->