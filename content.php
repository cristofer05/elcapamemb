<?php
require_once "config/database.php";
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['module'] == 'start') {
		include "modules/start/view.php";
	}

	elseif ($_GET['module'] == 'miembros') {
		include "modules/miembros/view.php";
	}

	elseif ($_GET['module'] == 'form_miembros') {
		include "modules/miembros/form.php";
	}
	

	elseif ($_GET['module'] == 'medicines_transaction') {
		include "modules/escanear/view.php";
	}

	elseif ($_GET['module'] == 'escanear') {
		include "modules/escanear/form.php";
	}
	elseif ($_GET['module'] == 'escaneado') {
		include "modules/escanear/escanear.php";
	}
	

	elseif ($_GET['module'] == 'lista_miembros') {
		include "modules/lista_miembros/view.php";
	}

	elseif ($_GET['module'] == 'filtro_miembros') {
		include "modules/filtro_miembros/view.php";
	}

	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}


	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}

	elseif ($_GET['module'] == 'profile') {
		include "modules/profile/view.php";
		}


	elseif ($_GET['module'] == 'form_profile') {
		include "modules/profile/form.php";
	}

	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>