
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $nombres  = mysqli_real_escape_string($mysqli, trim($_POST['nombres']));
            $apellidos  = mysqli_real_escape_string($mysqli, trim($_POST['apellidos']));
            $cedula  = str_replace('-', '', mysqli_real_escape_string($mysqli, trim($_POST['cedula'])));
            $fnacimiento  = mysqli_real_escape_string($mysqli, trim($_POST['fnacimiento']));
            $sexo  = mysqli_real_escape_string($mysqli, trim($_POST['sexo']));
            $localidad  = mysqli_real_escape_string($mysqli, trim($_POST['localidad']));
            $ocupacion  = mysqli_real_escape_string($mysqli, trim($_POST['ocupacion']));
            $correo  = mysqli_real_escape_string($mysqli, trim($_POST['correo']));
            $telefono  = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
            $categoria  = mysqli_real_escape_string($mysqli, trim($_POST['categoria']));
            $fexpiracion = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['fexpiracion'])));
            $created_user = $_SESSION['id_user'];
            $created_date = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['created_date'])));

  
            $query = mysqli_query($mysqli, "INSERT INTO socios(codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,categoria,fexpiracion,created_user,created_date,updated_user) 
                                            VALUES('$codigo','$nombres','$apellidos','$cedula','$fnacimiento','$sexo','$localidad','$ocupacion','$correo','$telefono','$categoria','$fexpiracion','$created_user','$created_date','$created_user')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
                
                header("location: enviar_tarjeta.php?id=".$codigo."&accion=creado");
            //    header("location: ../../main.php?module=socios&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
        
                $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
                $nombres  = mysqli_real_escape_string($mysqli, trim($_POST['nombres']));
                $apellidos  = mysqli_real_escape_string($mysqli, trim($_POST['apellidos']));
                $cedula  = mysqli_real_escape_string($mysqli, trim($_POST['cedula']));
                $fnacimiento  = mysqli_real_escape_string($mysqli, trim($_POST['fnacimiento']));
                $sexo  = mysqli_real_escape_string($mysqli, trim($_POST['sexo']));
                $localidad  = mysqli_real_escape_string($mysqli, trim($_POST['localidad']));
                $ocupacion  = mysqli_real_escape_string($mysqli, trim($_POST['ocupacion']));
                $correo  = mysqli_real_escape_string($mysqli, trim($_POST['correo']));
                $telefono  = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
                $categoria  = mysqli_real_escape_string($mysqli, trim($_POST['categoria']));
                $fexpiracion = mysqli_real_escape_string($mysqli, trim($_POST['fexpiracion']));
                $created_date = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['created_date'])));
                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE socios SET  nombres       = '$nombres',
                                                                    apellidos     = '$apellidos',
                                                                    cedula      = '$cedula',
                                                                    fnacimiento         = '$fnacimiento',
                                                                    sexo    = '$sexo',
                                                                    localidad        = '$localidad',
                                                                    ocupacion         = '$ocupacion',
                                                                    correo         = '$correo',
                                                                    telefono         = '$telefono',
                                                                    categoria         = '$categoria',
                                                                    fexpiracion       = '$fexpiracion',
                                                                    created_date    ='$created_date',
                                                                    updated_user    ='$updated_user'
                                                              WHERE codigo       = '$codigo'")
                                                or die('Error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=socios&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM socios WHERE codigo='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=socios&alert=3");
            }
        }
    }       
}       
?>