<?php include("base.php"); ?>
<?php include("sesion.php"); ?>
<?php include("method/persona.php"); ?>
<?php include("bdconnect.php"); ?>

<?php startblock('cuerpo') ?>
<div class="row">
    <div class="col-12 text-center">
    <div class="fs-2 text-primary">Usuarios del sistema</div>
    <div class="fs-5 text-secondary">A continuación se muestra una lista de todos los usuarios registrados en el sistema</div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <a type='button' class='btn btn-success mb-2' href='formPersona.php'>Agregar nuevo usuario</a>
    </div>
    <div class="col-6 text-end">
        <form action="admin.php" method="get">
            <input type="search" name="busqueda" id="busqueda">
            <button type="submit" class="btn btn-primary">Buscar usuario</button>
        </form>
    </div>
</div>

<?php mostrarPersonas($link); ?>
<?php endblock(); ?>

<?php mysqli_close($link); ?>