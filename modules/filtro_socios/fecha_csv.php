<?php
//include database configuration file
require_once "../../config/database.php";
include "../../config/fungsi_tanggal.php";
include "../../config/fungsi_rupiah.php";
$hari_ini = date("d-m-Y");

if (isset($_GET['print_csv']) && $_GET['print_csv'] =='si') { 
    $tgl_awal = $_GET['tgl_awal'];
    $tgl_akhir = $_GET['tgl_akhir'];

    $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,telefono2,categoria,fexpiracion,created_date FROM socios 
                                    WHERE created_date BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    ORDER BY created_date ASC") 
                                    or die('error '.mysqli_error($mysqli));

    $count  = mysqli_num_rows($query);
    $no = 1;

    if($count > 0){
        $delimiter = ",";
        $filename = "socios_filtrados_por_fecha_" . date('Y-m-d') . ".csv";
        
        //create a file pointer
        $f = fopen('php://memory', 'w');
        
        //set column headers
        $fields = array('No.','Codigo', 'Nombres', 'Apellidos', 'Cedula', 'Fecha Nacimiento', 'Sexo','Localidad','Ocupacion','Correo','Telefono 1','Telefono 2','Categoria','Fecha Expiracion','Estatus');
        fputcsv($f, $fields, $delimiter);
        
        //output each data of the data, format line as csv and write to file pointer
        while($data = mysqli_fetch_assoc($query)){
            //verificando status
                $date = date('Y-m-d H:i:s');
                $estatus = ($data['fexpiracion'] <= $date)?'Inactivo':'Activo';
            //determinando edad
                $nacimiento = new DateTime($data['fnacimiento']);
                $hoy = new DateTime();
                $edad = $hoy->diff($nacimiento);
            //escribiendo csv
            $lineData = array($no, $data['codigo'], $data['nombres'], $data['apellidos'], $data['cedula'], $data['fnacimiento'], $data['sexo'], $data['localidad'], $data['ocupacion'], $data['correo'], $data['telefono'], $data['telefono2'], $data['categoria'], $data['fexpiracion'], $estatus);
            fputcsv($f, $lineData, $delimiter);

            $no++;
        }
        
        //move back to beginning of file
        fseek($f, 0);
        
        //set headers to download file rather than displayed
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');
        
        //output all remaining data on a file pointer
        fpassthru($f);
    } elseif ($count < 1) {
        header('Location: ../../fin_csv.php?alert=1');
    }
    exit;
}
?>