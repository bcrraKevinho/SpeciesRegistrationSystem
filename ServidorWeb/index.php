<?php include("base.php"); ?>
<?php include("sesion.php"); ?>
<?php include("method/avistamiento.php"); ?>
<?php include("bdconnect.php"); ?>

<?php startblock('cuerpo') ?>
<div class="row">
    <div class="col-12 text-center">
    <div class="fs-2 text-primary">
        <?php
        $Persona = $_SESSION['persona'];
        if($Persona["Genero_IdGenero"]=='1')
            echo "Bienvenido ";
        else
            echo "Bienvenida ";
        echo $Persona["NombrePersona"].' '.$Persona["APaterno"] ?>
    </div>
    <div class="fs-5 text-secondary">A continuación se muestra una lista de las avistamientos al momento</div>
    </div>
</div>
<div class="row mb-1">
    <div class="col-6">
        <a type='button' class='btn btn-success' href='formAvistamiento.php'>Agregar nuevo avistamiento</a>
    </div>
    <div class="col-6 text-end">
        <form action="index.php" method="get">
            <input type="search" name="busqueda" id="busqueda">
            <button type="submit" class="btn btn-primary">Buscar avistamiento</button>
        </form>
    </div>
</div>
<div class="row mb-2">
    <div class="col-12 text-end">
        <a type="button" href="misAvistamientos.php" class='btn btn-info'>Mis avistamientos</a>
    </div>
</div>

<?php mostrarAvistamientos($link) ?>
<?php endblock() ?>
<?php mysqli_close($link); ?>