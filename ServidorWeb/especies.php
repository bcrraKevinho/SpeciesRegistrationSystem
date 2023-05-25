<?php include("base.php"); ?>
<?php include("sesion.php"); ?>
<?php include("method/especie.php"); ?>
<?php include("bdconnect.php"); ?>

<?php startblock('cuerpo') ?>
<div class="row">
    <div class="col-12 text-center">
    <div class="fs-2 text-primary">Especies endémicas</div>
    <div class="fs-5 text-secondary">A continuación se muestra una lista de todas las especies endémicas</div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <a type='button' class='btn btn-success mb-2' href='formEspecie.php'>Agregar nueva especie</a>
    </div>
    <div class="col-6 text-end">
        <form action="especies.php" method="get">
            <input type="search" name="busqueda" id="busqueda">
            <button type="submit" class="btn btn-primary">Buscar especie</button>
        </form>
    </div>
</div>

<?php mostrarEspecies($link) ?>
<?php endblock() ?>

<?php mysqli_close($link); ?>