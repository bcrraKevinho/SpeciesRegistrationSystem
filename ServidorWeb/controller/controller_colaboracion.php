<?php
include("../method/colaboracion.php");
include("../bdconnect.php");
session_start();

//Recuperación de la acción
$action = $_POST["action"];

//Acciones
switch($action){
    case "insert":
        
        $Persona = $_SESSION["persona"]["IdPersona"];
        $Especie = $_POST["IdEspecie"];
        $Avistamiento = $_POST["IdAvistamiento"];
        $DescripcionColaboracion = $_POST["DescripcionColaboracion"];
        
        if($Persona != null && $DescripcionColaboracion != null && ($Especie != null xor $Avistamiento != null)){
            if($Especie != null){
                insertar($DescripcionColaboracion, $Persona, $Especie, 'null', $link);
            }
            else{
                insertar($DescripcionColaboracion, $Persona, 'null', $especie, $link);
            }
            mysqli_close($link);    
            header("Location: ../misColaboraciones.php?success=1");
        }
        else{
            mysqli_close($link);
            header("Location: ../misColaboraciones.php?warning=4");
        }
        break;  
    
    case "modify":
        $Especie = $_POST["IdEspecie"];
        $Avistamiento = $_POST["IdAvistamiento"];
        $DescripcionColaboracion = $_POST["DescripcionColaboracion"];
        $IdColaboracion = $_POST["IdColaboracion"];
        if($DescripcionColaboracion != null && ($Especie != null xor $Avistamiento != null)){
            if($Especie != null){
                modificar($IdColaboracion, $DescripcionColaboracion, $Especie, 'null', $link); 
            }
            else{
                modificar($IdColaboracion, $DescripcionColaboracion, 'null', $Avistamiento, $link); 
            }
            mysqli_close($link);
            header("Location: ../misColaboraciones.php?success=2");
        }
        else{
            mysqli_close($link);
            header("Location: ../misColaboraciones.php?warning=4");
        }
        break;

    case "delete":
        $IdColaboracion = $_POST["IdColaboracion"];
        if($IdColaboracion != null ){
            borrar($IdColaboracion, $link);
            mysqli_close($link);
            header("Location: ../misColaboraciones.php?success=3");
        }
        else{
            mysqli_close($link);
            header("Location: ../misColaboraciones.php?warning=4");
        }
}

?>