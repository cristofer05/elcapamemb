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

  if ($_GET["module"]=="socios") { ?>
    <li class="active">
      <a href="?module=socios"><i class="fa fa-folder"></i> Socios Registrados</a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=socios"><i class="fa fa-folder"></i> Socios Registrados </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="form_socios") { ?>
    <li class="active">
      <a href="?module=form_socios&form=add"><i class="fa fa-plus-square"></i> Nuevo Socio </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=form_socios&form=add"><i class="fa fa-plus-square"></i> Nuevo Socio </a>
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

	if ($_GET["module"]=="lista_socios") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=lista_socios"><i class="fa fa-circle-o"></i> Lista de Socios </a></li>
        		<li><a href="?module=filtro_socios"><i class="fa fa-circle-o"></i> Filtrar Socios</a></li>
      		</ul>
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="filtro_socios") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lista_socios"><i class="fa fa-circle-o"></i> Lista de Socios</a></li>
        		<li class="active"><a href="?module=filtro_socios"><i class="fa fa-circle-o"></i> Filtrar Socios </a></li>
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
        		<li><a href="?module=lista_socios"><i class="fa fa-circle-o"></i> Lista de Socios </a></li>
        		<li><a href="?module=filtro_socios"><i class="fa fa-circle-o"></i> Filtrar socios </a></li>
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
            <li class="active"><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Lista de Socios</a></li>
            <li><a href="?module=filtro_socios"><i class="fa fa-circle-o"></i> Filtro de socios </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="filtro_socios") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Lista de Socios </a></li>
            <li class="active"><a href="?module=filtro_socios"><i class="fa fa-circle-o"></i> Filtro de socios </a></li>
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
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i>  Lista de Socios </a></li>
            <li><a href="?module=filtro_socios"><i class="fa fa-circle-o"></i> Filtro de socios </a></li>
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

  if ($_GET["module"]=="socios" || $_GET["module"]=="form_socios") { ?>
    <li class="active">
      <a href="?module=socios"><i class="fa fa-folder"></i> Datos de Socios </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=socios"><i class="fa fa-folder"></i> Datos de Socios </a>
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
            <li class="active"><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Lista de Socios </a></li>
            <li><a href="?module=filtro_socios"><i class="fa fa-circle-o"></i> Registro de medicamentos </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="filtro_socios") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Lista de Socios </a></li>
            <li class="active"><a href="?module=filtro_socios"><i class="fa fa-circle-o"></i> Filtro de socios </a></li>
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
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Lista de Socios </a></li>
            <li><a href="?module=filtro_socios"><i class="fa fa-circle-o"></i> Filtro de socios </a></li>
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