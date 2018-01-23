<?php
session_start();
ob_start();


require_once "../../config/database.php";

include "../../config/fungsi_tanggal.php";

include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

 if (isset($_GET['rango']) && isset($_GET['print'])) {
    if ($_GET['print'] == "csv"){

        header('Location: nuevos_csv.php?rango='.$_GET['rango'].'&print_csv=si');

    }else {

     $no    = 1;

    if ($_GET['rango'] == "mes"){

        $intervalo="1 MONTH";
    }
    elseif ($_GET['rango'] == "semana") {
        $intervalo="1 WEEK";
    }
    elseif ($_GET['rango'] == "3dias") {
        $intervalo="3 DAY";
    }

    $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,categoria,fexpiracion,created_date FROM socios 
                                    WHERE created_date > DATE_SUB(NOW(), INTERVAL ".$intervalo.")
                                    ORDER BY created_date ASC") 
                                    or die('error '.mysqli_error($mysqli));                                
    $count  = mysqli_num_rows($query);
 }
}
?> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>FILTRO DE SOCIOS</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
           REPORTE DE SOCIOS FILTRADOS POR FECHA DE CREACION
        </div>

        <div id="title-tanggal">
            Mostrando los socios creados en <?php switch ($_GET['rango']) {
                        case "mes": echo "el ultimo mes"; break;
                        case "semana": echo "la utlima semana"; break;
                        case "3dias": echo "los ultimos tres dias"; break;
                        } ?>
        </div>

        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle"><small>NO.</small></th>
                        <th height="20" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="20" align="center" valign="middle"><small>CREADO</small></th>
                        <th height="20" align="center" valign="middle"><small>NOMBRE</small></th>
                        <th height="20" align="center" valign="middle"><small>CEDULA/RNC</small></th>
                        <th height="20" align="center" valign="middle"><small>EDAD</small></th>
                        <th height="20" align="center" valign="middle"><small>SEXO</small></th>
                        <th height="20" align="center" valign="middle"><small>LOCALIDAD</small></th>
                        <th height="20" align="center" valign="middle"><small>OFICIO</small></th>
                        <th height="20" align="center" valign="middle"><small>CAT</small></th>
                        <th height="20" align="center" valign="middle"><small>TELEFONO</small></th>
                        <th height="20" align="center" valign="middle"><small>EXPIRACION</small></th>
                    </tr>
                </thead>
                <tbody>
<?php
    
    if($count == 0) {
        echo "  <tr>
                    <td width='40' height='13' align='center' valign='middle'></td>
                    <td width='120' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
					<td style='padding-left:5px;' width='50' height='13' valign='middle'></td>
                    <td style='padding-right:10px;' width='50' height='13' align='right' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                </tr>";
    }

    else {
   
        while ($data = mysqli_fetch_assoc($query)) {
            $tanggal       = $data['created_date'];
            $exp           = explode('-',$tanggal);
            $fecha = $exp[2]."-".$exp[1]."-".$exp[0];
            //determinando edad
                $nacimiento = new DateTime($data['fnacimiento']);
                $hoy = new DateTime();
                $edad = $hoy->diff($nacimiento);

            echo "  <tr style='font-size:10px;'>
                        <td width='15' height='13' align='center' valign='middle'>$no</td>
                        <td width='60' height='13' align='center' valign='middle'>$data[codigo]</td>
                        <td style='padding-left:5px;' width='60' height='13' valign='middle'>$fecha</td>
                        <td style='padding-left:5px;' width='70' height='13' valign='middle'>$data[nombres] $data[apellidos]</td>
                        <td style='padding-left:5px;' width='70' height='13' valign='middle'>$data[cedula]</td>
                        <td style='padding-left:5px;' width='20' height='13' valign='middle'>".$edad->y."</td>
                        <td style='padding-left:5px;' width='20' height='13' valign='middle'>$data[sexo]</td>
                        <td style='padding-left:5px;' width='80' height='13' valign='middle'>$data[localidad]</td>
                        <td style='padding-left:5px;' width='50' height='13' valign='middle'>$data[ocupacion]</td>
                        <td style='padding-left:5px;' width='15' height='13' valign='middle'>$data[categoria]</td>
                        <td style='padding-left:5px;' width='60' height='13' valign='middle'>$data[telefono]</td>
                        <td style='padding-left:5px;' width='60' height='13' valign='middle'>$data[fexpiracion]</td>
                    </tr>";
            $no++;
        }
    }
?>	
                </tbody>
            </table>

        </div>
    </body>
</html>
<?php
$filename="socios creados en el ultimo mes.pdf"; 
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';

require_once('../../assets/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>