<?php
include("../bdconnect.php"); //conecta con la bd
include("../method/persona.php");
session_start();

//Recuperación de la acción
$action = $_POST["action"];

//Acciones
switch($action){
    case "login":
        $user = $_POST["usuario"];
        $pass = $_POST["password"];
        if($row = validacion($user, $pass, $link)){
            $_SESSION['persona'] = $row;
            mysqli_close($link); //cierra la conexión
            header("Location: ../index.php");
            }
        else{
            mysqli_close($link);
            header("Location: ../login.php?warning=1");
        }
        break;
    case "logout":
        session_destroy();
        mysqli_close($link);
        header("Location: ../login.php?primary=1");
        break;
    case "insert":
        $nombre = $_POST["nombre"];
        $apaterno = $_POST["apaterno"];
        $amaterno = $_POST["amaterno"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $telefono = $_POST["telefono"];
        $nacimiento = $_POST["nacimiento"];
        $genero = $_POST["genero"];
        if(isset($_POST["estudiante"])){
            $semestre = $_POST["semestre"];
            $ingreso = $_POST["ingreso"];
            $universidad = $_POST["universidadE"];
            $facultad = $_POST["facultadE"];
            $carrera = $_POST["carreraE"];
            insertarEstudiante($nombre, $apaterno, $amaterno, $usuario, $password, $telefono, $nacimiento, $genero, 
            $semestre, $ingreso, $carrera, $link);
        }
        else if(isset($_POST["investigador"])){
            $cedula = $_POST["cedula"];
            $egreso = $_POST["egreso"];
            $universidad = $_POST["universidadI"];
            $facultad = $_POST["facultadI"];
            $carrera = $_POST["carreraI"];
            insertarInvestigador($nombre, $apaterno, $amaterno, $usuario, $password, $telefono, $nacimiento, $genero,
            $cedula, $egreso, $carrera, $link);
        }
        else
            insertar($nombre, $apaterno, $amaterno, $usuario, $password, $telefono, $nacimiento, $genero, $link);
        mysqli_close($link);
        header("Location: ../login.php?success=1");
        break;  
    case 'modify':
        $IdPersona = $_POST["IdPersona"];
        $nombre = $_POST["nombre"];
        $apaterno = $_POST["apaterno"];
        $amaterno = $_POST["amaterno"];
        $usuario = $_POST["usuario"];
        $telefono = $_POST["telefono"];
        $nacimiento = $_POST["nacimiento"];
        $genero = $_POST["genero"];
        modificar($IdPersona, $nombre, $apaterno, $amaterno, $usuario, $telefono, $nacimiento, $genero, $link); 
        mysqli_close($link);
        header("Location: ../Admin.php?success=2");
        break;
    case "delete":
        $IdPersona = $_POST["IdPersona"];
        borrar($IdPersona, $link);
        mysqli_close($link);
        header("Location: ../Admin.php?success=3");
        break;
}
?>