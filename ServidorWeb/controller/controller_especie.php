<?php
include("../method/especie.php");
include("../bdconnect.php");
session_start();

//Recuperación de la acción
$action = $_POST["action"];

//Acciones
switch($action){
    case "insert":
        $NombreCientifico = $_POST["NombreCientifico"];
        $NombreComun = $_POST["NombreComun"];
        $Descripcion = $_POST["Descripcion"];
        $FotoEspecie = $_FILES["FotoEspecie"]["name"];
        $Region = $_POST["Region"];
        $Clase = $_POST["Clase"];

        if($NombreCientifico != null && $NombreComun != null && $Descripcion != null &&
            $FotoEspecie != null && $Region != null && $Clase != null ){
            insertar($NombreCientifico, $NombreComun, $Descripcion, "images/$FotoEspecie", $Region, $Clase, $link);   
            mysqli_close($link);    
            header("Location: ../especies.php?success=1");
        }
        else{
            mysqli_close($link);
            header("Location: ../especies.php?warning=4");
        }
        break;  
    
    case "modify":
        $NombreCientifico = $_POST["NombreCientifico"];
        $NombreComun = $_POST["NombreComun"];
        $Descripcion = $_POST["Descripcion"];
        $FotoEspecie = $_FILES["FotoEspecie"]["name"];
        $Region = $_POST["Region"];
        $Clase = $_POST["Clase"];
        $IdEspecie = $_POST["IdEspecie"];
        if($NombreCientifico != null && $NombreComun != null && $Descripcion != null &&
             $Region != null && $Clase != null && $IdEspecie != null ){
            modificar($IdEspecie, $NombreCientifico, $NombreComun, $Descripcion, 'images/'.$FotoEspecie, $Region, $Clase, $link); 
            mysqli_close($link);
            header("Location: ../especies.php?success=2");
        }
        else{
            mysqli_close($link);
            header("Location: ../especies.php?warning=4");
        }
        break;

    case "delete":
        $IdEspecie = $_POST["IdEspecie"];
        if($IdEspecie != null ){
            borrar($IdEspecie, $link);
            mysqli_close($link);
            header("Location: ../especies.php?success=3");
        }
        else{
            mysqli_close($link);
            header("Location: ../especies.php?warning=4");
        }
}

?>