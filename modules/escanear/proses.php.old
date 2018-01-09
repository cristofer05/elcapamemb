

<?php
session_start();

require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='mostrar') {
        if (isset($_POST['codigo'])) {
            
            $codigo = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));                     
                    
                    header("location: ../../main.php?module=escaneado&codigo=$codigo&alert=1");
                } 
        }   
    }      
?>