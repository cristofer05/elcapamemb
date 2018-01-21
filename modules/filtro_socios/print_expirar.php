<?php
session_start();
ob_start();


require_once "../../config/database.php";

include "../../config/fungsi_tanggal.php";

include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");


if (isset($_GET['rango'])) {
     $no    = 1;

    if ($_GET['rango'] == "mes"){

        $intervalo="-1 MONTH";
    }
    elseif ($_GET['rango'] == "semana") {
        $intervalo="-1 WEEK";
    }
    elseif ($_GET['rango'] == "3dias") {
        $intervalo="-3 DAY";
    }

    $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,categoria,fexpiracion,created_date FROM socios 
                                    WHERE fexpiracion < DATE_SUB(NOW(), INTERVAL ".$intervalo.")
                                    ORDER BY fexpiracion ASC") 
                                    or die('error '.mysqli_error($mysqli));                                
    $count  = mysqli_num_rows($query);
 }
?> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>FILTRO DE MIEMBROS</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
           REPORTE DE SOCIOS FILTRADOS POR FECHA DE EXPIRACION
        </div>
        <div id="title-tanggal">
            Mostrando las miembresias que van a expirar en <?php switch ($_GET['rango']) {
                        case "mes": echo "el proximo mes"; break;
                        case "semana": echo "la proxima semana"; break;
                        case "3dias": echo "los proximos tres dias"; break;
                        } ?>
        </div>
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle"><small>NO.</small></th>
                        <th height="20" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="20" align="center" valign="middle"><small>NOMBRE</small></th>
                        <th height="20" align="center" valign="middle"><small>CEDULA/RNC</small></th>
                        <th height="20" align="center" valign="middle"><small>CAT</small></th>
                        <th height="20" align="center" valign="middle"><small>CORREO</small></th>
                        <th height="20" align="center" valign="middle"><small>TELEFONO 1</small></th>
                        <th height="20" align="center" valign="middle"><small>TELEFONO 2</small></th>
                        <th height="20" align="center" valign="middle"><small>EMISION</small></th>
                        <th height="20" align="center" valign="middle"><small>EXPIRAC.</small></th>
                        <th height="20" align="center" valign="middle"><small>ESTAT.</small></th>
                    </tr>
                </thead>
                <tbody>
<?php
    
    if($count < 1) {
        echo "  <tr style='font-size:10px;'>
                        <td width='15' height='13' align='center' valign='middle'></td>
                        <td width='60' height='13' align='center' valign='middle'></td>
                        <td style='padding-left:5px;' width='70' height='13' valign='middle'></td>
                        <td style='padding-left:5px;' width='70' height='13' valign='middle'></td>
                        <td style='padding-left:5px;' width='20' height='13' valign='middle'></td>
                        <td style='padding-left:5px;' width='100' height='13' valign='middle'></td>
                        <td style='padding-left:5px;' width='58' height='13' valign='middle'></td>
                        <td style='padding-left:5px;' width='58' height='13' valign='middle'></td>
                        <td style='padding-left:5px;' width='50' height='13' valign='middle'></td>
                        <td style='padding-left:5px;' width='50' height='13' valign='middle'></td>
                        <td style='padding-left:5px;' width='30' height='13' valign='middle'></td>
                    </tr>";
    }

    else {
   
        while ($data = mysqli_fetch_assoc($query)) {
            // fecha de expiracion
            $tanggal       = $data['fexpiracion'];
            $exp           = explode('-',$tanggal);
            $fecha_exp = $exp[2]."-".$exp[1]."-".$exp[0];
            // fecha de emision
            $created_tang       = $data['created_date'];
            $creat           = explode('-',$created_tang);
            $emision = $creat[2]."-".$creat[1]."-".$creat[0];
            //determinando edad
            $nacimiento = new DateTime($data['fnacimiento']);
            $hoy = new DateTime();
            $edad = $hoy->diff($nacimiento);

            echo "  <tr style='font-size:10px;'>
                        <td width='15' height='13' align='center' valign='middle'>$no</td>
                        <td width='60' height='13' align='center' valign='middle'>$data[codigo]</td>
                        <td style='padding-left:5px;' width='70' height='13' valign='middle'>$data[nombres] $data[apellidos]</td>
                        <td style='padding-left:5px;' width='70' height='13' valign='middle'>$data[cedula]</td>
                        <td style='padding-left:5px;' width='10' height='13' valign='middle'>$data[categoria]</td>
                        <td style='padding-left:5px;' width='100' height='13' valign='middle'>$data[correo]</td>
                        <td style='padding-left:5px;' width='58' height='13' valign='middle'>$data[telefono]</td>
                        <td style='padding-left:5px;' width='58' height='13' valign='middle'>$data[telefono]</td>
                        <td style='padding-left:5px;' width='50' height='13' valign='middle'>$emision</td>
                        <td style='padding-left:5px;' width='50' height='13' valign='middle'>$fecha_exp</td>
                        <td style='padding-left:5px;' width='30' height='13' valign='middle'>Activo</td>
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
$filename="datos de registro de medicamentos.pdf"; 
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