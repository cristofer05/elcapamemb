<?php
session_start();
ob_start();


require_once "../../config/database.php";

include "../../config/fungsi_tanggal.php";

include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");


$tgl1     = $_GET['tgl_awal'];
$explode  = explode('-',$tgl1);
$tgl_awal = $explode[2]."-".$explode[1]."-".$explode[0];

$tgl2      = $_GET['tgl_akhir'];
$explode   = explode('-',$tgl2);
$tgl_akhir = $explode[2]."-".$explode[1]."-".$explode[0];

if (isset($_GET['tgl_awal'])) {
    $no    = 1;
 

    $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,categoria,fexpiracion,created_date FROM socios 
                                    WHERE created_date BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    ORDER BY created_date ASC") 
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
           REPORTE DE SOCIOS FILTRADOS POR FECHA DE CREACION
        </div>
    <?php  
    if ($tgl_awal==$tgl_akhir) { ?>
        <div id="title-tanggal">
            Fecha <?php echo tgl_eng_to_ind($tgl1); ?>
        </div>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Desde <?php echo tgl_eng_to_ind($tgl1); ?> Hasta <?php echo tgl_eng_to_ind($tgl2); ?>
        </div>
    <?php
    }
    ?>
        
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
$filename="datos de socios registrados.pdf"; 
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