<?php
include("../method/avistamiento.php");
include("../bdconnect.php");
session_start();

//Recuperación de la acción
$action = $_POST["action"];

//Acciones
switch($action){
    case "insert":
        $Especie = $_POST["Especie"];
        $Persona = $_SESSION["persona"]["IdPersona"];
        $DescripcionAvistamiento = $_POST["DescripcionAvistamiento"];
        $FotoAvistamiento = $_FILES["FotoAvistamiento"]["name"];
        $Region = $_POST["Region"];

        if($Persona != null && $DescripcionAvistamiento != null && $Region != null ){
            insertar($Persona, $Especie, $Region, $DescripcionAvistamiento, "images/$FotoAvistamiento", $link);   
            mysqli_close($link);    
            header("Location: ../misAvistamientos.php?success=1");
        }
        else{
            mysqli_close($link);
            header("Location: ../misAvistamientos.php?warning=4");
        }
        break;  
    
    case "modify":
        $Especie = $_POST["Especie"];
        $DescripcionAvistamiento = $_POST["DescripcionAvistamiento"];
        $FotoAvistamiento = $_FILES["FotoAvistamiento"]["name"];
        $Region = $_POST["Region"];
        $IdAvistamiento = $_POST["IdAvistamiento"];
        if($DescripcionAvistamiento != null && $Region != null && $IdAvistamiento != null ){
            modificar($IdAvistamiento, $Especie, $Region, $DescripcionAvistamiento,  'images/'.$FotoAvistamiento, $link); 
            mysqli_close($link);
            header("Location: ../misAvistamientos.php?success=2");
        }
        else{
            mysqli_close($link);
            header("Location: ../misAvistamientos.php?warning=4");
        }
        break;

    case "delete":
        $IdAvistamiento = $_POST["IdAvistamiento"];
        if($IdAvistamiento != null ){
            borrar($IdAvistamiento, $link);
            mysqli_close($link);
            header("Location: ../misAvistamientos.php?success=3");
        }
        else{
            mysqli_close($link);
            header("Location: ../misAvistamientos.php?warning=4");
        }
}

?>