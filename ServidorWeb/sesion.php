<?php
    if(!isset($_SESSION['persona']))
        header("Location: login.php?warning=2");
    if ($first_part=="admin.php" && $_SESSION['persona']['TipoUsuario_IdTipoUsuario'] != 3)
        header("Location: index.php?warning=3");
    if ($first_part=="formEspecie.php"  && $_SESSION['persona']['TipoUsuario_IdTipoUsuario'] == 1)
        header("Location: especies.php?warning=5");
    if (($first_part=="formColaboracion.php" || $first_part=="misColaboraciones.php") && $_SESSION['persona']['TipoUsuario_IdTipoUsuario'] == 1)
        header("Location: investigadores.php?warning=5");
?>