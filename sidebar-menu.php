<?php 

if ($_SESSION['permisos_acceso']=='Super Admin') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php

  if ($_GET["module"]=="miembros" || $_GET["module"]=="form_miembros") { ?>
    <li class="active">
      <a href="?module=miembros"><i class="fa fa-folder"></i> Miembros Registrados</a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=miembros"><i class="fa fa-folder"></i> Miembros Registrados </a>
      </li>
  <?php
  }


  if ($_GET["module"]=="escanear" || $_GET["module"]=="form_escanear") { ?>
    <li class="active">
      <a href="?module=escanear"><i class="fa fa-clone"></i> Escanear Codigo QR </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=escanear"><i class="fa fa-clone"></i> Escanear Codigo QR </a>
      </li>
  <?php
  }

	if ($_GET["module"]=="lista_miembros") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=lista_miembros"><i class="fa fa-circle-o"></i> Lista de Miembros </a></li>
        		<li><a href="?module=filtro_miembros"><i class="fa fa-circle-o"></i> Filtrar Miembros</a></li>
      		</ul>
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="filtro_miembros") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lista_miembros"><i class="fa fa-circle-o"></i> Lista de Miembros</a></li>
        		<li class="active"><a href="?module=filtro_miembros"><i class="fa fa-circle-o"></i> Filtrar Miembros </a></li>
      		</ul>
    	</li>
    <?php
	}

	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lista_miembros"><i class="fa fa-circle-o"></i> Lista de Miembros </a></li>
        		<li><a href="?module=filtro_miembros"><i class="fa fa-circle-o"></i> Filtrar miembros </a></li>
      		</ul>
    	</li>
    <?php
	}


	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}


	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>

<?php
}

elseif ($_SESSION['permisos_acceso']=='Gerente') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { ?>
		<li class="active">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}


  if ($_GET["module"]=="stock_inventory") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Lista de Miembros</a></li>
            <li><a href="?module=filtro_miembros"><i class="fa fa-circle-o"></i> Filtro de miembros </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="filtro_miembros") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Lista de Miembros </a></li>
            <li class="active"><a href="?module=filtro_miembros"><i class="fa fa-circle-o"></i> Filtro de miembros </a></li>
          </ul>
      </li>
    <?php
  }
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i>  Lista de Miembros </a></li>
            <li><a href="?module=filtro_miembros"><i class="fa fa-circle-o"></i> Filtro de miembros </a></li>
          </ul>
      </li>
    <?php
  }

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
if ($_SESSION['permisos_acceso']=='Almacen') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

  if ($_GET["module"]=="start") { ?>
    <li class="active">
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="miembros" || $_GET["module"]=="form_miembros") { ?>
    <li class="active">
      <a href="?module=miembros"><i class="fa fa-folder"></i> Datos de Miembros </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=miembros"><i class="fa fa-folder"></i> Datos de Miembros </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="medicines_transaction" || $_GET["module"]=="form_medicines_transaction") { ?>
    <li class="active">
      <a href="?module=medicines_transaction"><i class="fa fa-clone"></i> Registro de medicamentos </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=medicines_transaction"><i class="fa fa-clone"></i> Registro de medicamentos </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="stock_inventory") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Lista de Miembros </a></li>
            <li><a href="?module=filtro_miembros"><i class="fa fa-circle-o"></i> Registro de medicamentos </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="filtro_miembros") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Lista de Miembros </a></li>
            <li class="active"><a href="?module=filtro_miembros"><i class="fa fa-circle-o"></i> Filtro de miembros </a></li>
          </ul>
      </li>
    <?php
  }
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Lista de Miembros </a></li>
            <li><a href="?module=filtro_miembros"><i class="fa fa-circle-o"></i> Filtro de miembros </a></li>
          </ul>
      </li>
    <?php
  }

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
?>