<?php include("base.php"); ?>
<?php include("sesion.php"); ?>
<?php include("method/colaboracion.php"); ?>
<?php include("bdconnect.php"); ?>

<?php startblock('cuerpo') ?>
<div class="row">
    <div class="col-12 text-center">
    <div class="fs-2 text-primary">
        <?php
        $Persona = $_SESSION['persona'];
        echo "Colaboraciones de ".$Persona["NombrePersona"].' '.$Persona["APaterno"] ?>
    </div>
    <div class="fs-5 text-secondary">Puedes modificar las colaboraciones creadas por ti</div>
    </div>
</div>
<div class="row mb-1">
    <div class="col-6">
        <a type='button' class='btn btn-success' href='formColaboracion.php'>Agregar nueva colaboración</a>
    </div>
    <div class="col-6 text-end">
        <form action="misColaboraciones.php" method="get">
            <input type="search" name="busqueda" id="busqueda">
            <button type="submit" class="btn btn-primary">Buscar colaboración</button>
        </form>
    </div>
</div>
<div class="row mb-2">
<div class="col-12 text-end">
        <a type="button" href="investigadores.php" class='btn btn-info'>Todas las colaboraciones</a>
    </div>
</div>

<?php mostrarMisColaboraciones($link) ?>
<?php endblock() ?>
<?php mysqli_close($link); ?>