<?php
session_start();
ob_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

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
        <style type="text/css">    
        #isi{margin-top: 0px;margin-left: 0px;
        background-image: url(../../assets/img/bgpdf2.png);}
             table p {
                 margin-bottom:-10;
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
        <div id="isi" style="border:10px solid #E6E6E6; margin:12px; padding:20px; height:280px;">
        <?php 
          $fech1       = $data['created_date'];
          $exp1           = explode('-',$fech1);
          $fecha1 = $exp1[2]."-".$exp1[1]."-".$exp1[0];

          $fech2       = $data['fexpiracion'];
          $exp2           = explode('-',$fech2);
          $fecha2 = $exp2[2]."-".$exp2[1]."-".$exp2[0];
        ?>
        <table width="100%" border="0px">
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
$filename="tarjeta_elcapacitador_".$data['codigo'].".pdf"; 
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif; background-image: url("http://htmlcolorcodes.com/assets/images/html-color-codes-color-tutorials-hero-00e10b1f.jpg")" >'.($content).'</page>';

require_once('../../assets/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('../../temp_files/'.$filename, 'F');
}
catch(HTML2PDF_exception $e) { echo $e; }
/////////////////////////////////////////
/////////////////////////////////////////
// SCRIPT PHP MAILER
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
//    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'bh-65.webhostbox.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'socios@elcapacitador.com';                 // SMTP username
    $mail->Password = '2,[QRDVh^!P8';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('socios@elcapacitador.com', 'elCapacitador');
    $mail->addAddress($data['correo'], $data['nombres']);     // Add a recipient              
    $mail->addReplyTo('info@elcapacitador.com', 'elCapacitador');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('../../temp_files/'.$filename, $filename);    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Tarjeta Membresia elCapacitador';
    $mail->Body    = 'Hola '.$data['nombres'].' Adjunto a este correo podras encontrar tu tarjeta de membrecia en un archivo PDF, Recuerda llevarla contigo en el proximo evento. <br/> Gracias por ser parte de nostros. ';
    $mail->AltBody = 'Hola '.$data['nombres'].' Adjunto a este correo podras encontrar tu tarjeta de membrecia en un archivo PDF - ElCapacitador!';

    $mail->send();
//    echo 'Message has been sent';
    unlink('../../temp_files/'.$filename);
    if (isset($_GET['accion']) && $_GET['accion'] =='creado') { 
      header('Location: ../../main.php?module=socios&alert=6');
    }else {
      header('Location: ../../main.php?module=socios&alert=4');
    }
    
} catch (Exception $e) {
//    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    if (isset($_GET['accion']) && $_GET['accion'] =='creado') { 
      header('Location: ../../main.php?module=socios&alert=7');
    }else {
      header('Location: ../../main.php?module=socios&alert=5');
    }
    
}

/////////////////////////////////////////
/////////////////////////////////////////
?>
<!-- Volver atras -->
<script type="text/javascript">
    window.onpageshow = function(event) {
     // window.history.back();

  //   window.location="../../main.php?module=socios&alert=4";
    }; 

</script>
