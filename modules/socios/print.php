<?php
session_start();
ob_start();


require_once "../../config/database.php";

include "../../config/fungsi_tanggal.php";

include "../../config/fungsi_rupiah.php";

$query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,categoria,fexpiracion,created_date FROM socios WHERE codigo='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>TARJETA DE MEMBRESIA</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
         <style type="text/css">    
        #isi{margin-top: 0px;margin-left: 0px;
        background-image: url(../../assets/img/bgpdf2.png);
     }
             </style>
    </head>
    <body>
        <div id="title">
           TARJETA DIGITAL DE MEMBRES&Iacute;A
        </div>
        
        <br>
        
        <div id="club">
           <h2>CLUB DE ALUMNOS <br>
           elCapacitador.com
           </h2>
           <br>
           <h2>Numero de Afiliado <?php echo $data['codigo']; ?> </h2>
        </div>
        <div id="isi" style="border:10px solid #E6E6E6; margin:12px; padding:20px;">
        <?php 
          $fech1       = $data['created_date'];
          $exp1           = explode('-',$fech1);
          $fecha1 = $exp1[2]."-".$exp1[1]."-".$exp1[0];

          $fech2       = $data['fexpiracion'];
          $exp2           = explode('-',$fech2);
          $fecha2 = $exp2[2]."-".$exp2[1]."-".$exp2[0];
        ?>
        <table width="100%" border="0px" background-image="../../assets/img/boxed-bg.jpg">
            <tr border="0px">
                <td border="0px">
                    <img style="width:600px" src="../../assets/img/elcapacitadopdf.png" >
                </td>
            </tr>
            <tr border="0px">
                <td  border="0px">
                    <h1><?php echo $data['nombres']; ?> <?php echo $data['apellidos']; ?></h1>
                    <p style="font-size:20px">Fecha de emisi&oacute;n: <?php echo tgl_eng_to_ind($fecha1); ?></p>
                    <p style="font-size:20px">Fecha de expiraci&oacute;n: <?php echo tgl_eng_to_ind($fecha2); ?></p>
                    <p style="font-size:20px">Categor&iacute;a: <?php 
                      switch ($data['categoria']) {
                        case "A": echo "A"; break;
                        case "B": echo "B"; break;
                        case "C": echo "C"; break;
                        case "F": echo "F"; break;
                        case "E": echo "E"; break;
                        } ?></p>
                </td>
            </tr>   
        </table>
        </div>
         <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-2">
                  <img src="https://chart.googleapis.com/chart?cht=qr&choe=UTF-8&chs=250x250&chl=<?php echo $data['codigo']; ?>">
                </div>
              </div>
    </body>
</html>
<?php
$filename="tarjeta_elcapacitador.pdf"; 
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif; background-image: url("http://htmlcolorcodes.com/assets/images/html-color-codes-color-tutorials-hero-00e10b1f.jpg")" >'.($content).'</page>';

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