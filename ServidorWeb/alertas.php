<?php
$visible = True;
$msg = '';
if (isset($_GET["success"]) && $_GET["success"] == "1") {
    $attr = "alert-success";
    $msg = "El registro fue satisfactorio";
} elseif (isset($_GET["warning"]) && $_GET["warning"] == "1") {
    $attr = "alert-warning";
    $msg = "Usuario o contraseña incorrectos";
} elseif (isset($_GET["warning"]) && $_GET["warning"] == "2") {
    $attr = "alert-warning";
    $msg = "Favor de iniciar sesión";
} elseif (isset($_GET["warning"]) && $_GET["warning"] == "3") {
    $attr = "alert-warning";
    $msg = "Favor de iniciar sesión como Administrador";
} elseif (isset($_GET["warning"]) && $_GET["warning"] == "4") {
    $attr = "alert-warning";
    $msg = "No se recibieron los datos correctamente";
} elseif (isset($_GET["warning"]) && $_GET["warning"] == "5") {
    $attr = "alert-warning";
    $msg = "Favor de iniciar sesión como Colaborador";
} elseif (isset($_GET["primary"]) && $_GET["primary"] == "1") {
    $attr = "alert-primary";
    $msg = "Has salido de la sesión";
} elseif (isset($_GET["info"]) && $_GET["info"] == "1") {
    $attr = "alert-info";
    $msg = "Ya hay una sesión iniciada, cierra sesión si deseas iniciar otra.";
} else
    $visible = False;
?>