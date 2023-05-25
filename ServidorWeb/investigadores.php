<?php include("base.php"); ?>
<?php include("sesion.php"); ?>
<?php include("method/colaboracion.php"); ?>
<?php include("bdconnect.php"); ?>

<?php startblock('cuerpo') ?>
<div class="row">
    <div class="col-12 text-center">
    <div class="fs-2 text-primary">
        Colaboraciones de investigadores
    </div>
    <div class="fs-5 text-secondary">A continuación se muestra una lista de las últimas colaboraciones</div>
    </div>
</div>
<div class="row mb-1">
    <div class="col-6">
        <a type='button' class='btn btn-success' href='formColaboracion.php'>Agregar nueva colaboración</a>
    </div>
    <div class="col-6 text-end">
        <form action="investigadores.php" method="get">
            <input type="search" name="busqueda" id="busqueda">
            <button type="submit" class="btn btn-primary">Buscar colaboración</button>
        </form>
    </div>
</div>
<div class="row mb-2">
    <div class="col-12 text-end">
        <a type="button" href="misColaboraciones.php" class='btn btn-info'>Mis colaboraciones</a>
    </div>
</div>

<?php mostrarColaboraciones($link) ?>
<?php endblock() ?>
<?php mysqli_close($link); ?>