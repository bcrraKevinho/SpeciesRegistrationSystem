<?php include("base.php"); ?>  <!-- Página Base -->
<?php include("sesion.php"); ?>
<?php include("method/colaboracion.php"); ?> <!-- Funciones para avistamientos -->
<?php include("bdconnect.php"); ?> <!-- Conexión a base de datos -->

<?php startblock('cuerpo') ?>

<?php //Filter action
$disabled = false;
$action = 'insert';
if (isset($_GET["action"]) && isset($_GET["id"])) {
    $action = $_GET["action"];
    $id = $_GET["id"];
}
switch ($action) {
    case 'modify':
        $row = buscarId($id, $link);
        $titulo = "Modificar colaboración";
        $subtitulo = "Modifica la información de la colaboración";
        $color = "dark";
        $boton = "Modificar";
        break;
    case 'delete':
        $row = buscarId($id, $link);
        $disabled = true;
        $titulo = "Borrar colaboración";
        $subtitulo = "¿Quieres borrar esta colaboración?";
        $color = "danger";
        $boton = "Eliminar";
        break;
    default:
        //No toma en cuenta ninguna información
        $row = false;
        $titulo = "Agregar nueva colaboración";
        $subtitulo = "Ingresa la información de la colaboración";
        $color = "primary";
        $boton = "Agregar";
        break;
}
?>

<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <div class="fs-2 text-<?php echo $color ?>"><?php echo $titulo ?></div>
                        <div class="fs-5 text-secondary"><?php echo $subtitulo ?></div>
                    </div>
                </div>
                <form action="controller/controller_colaboracion.php" method="post">
                    <input type="hidden" name="action" value="<?php echo $action ?>">
                    <?php if ($row) echo "<input type='hidden' name='IdColaboracion' value='$id'>" ?>


                    <fieldset <?php if ($disabled) echo "disabled" ?>>
                        <div class="row">
                            <div class="col-3">
                                <!-- Id Especie -->
                                <div class="form-outline mb-4">
                                    <select id="IdEspecie" name="IdEspecie" class="form-select" >
                                        <option value=''>Selecciona</option>
                                        <?php
                                        $sql = "select IdEspecie from Especie";
                                        if ($result = mysqli_query($link, $sql)) {
                                            while ($rowEspecie = mysqli_fetch_array($result)) {
                                                echo "<option value=$rowEspecie[0]";
                                                if($row && $row['Especie_IdEspecie'] == $rowEspecie['IdEspecie']) echo " selected ";
                                                echo ">$rowEspecie[0]</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="form-label" for="IdEspecie">Id de Especie</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <!-- Id Avistamiento -->
                                <div class="form-outline mb-4">
                                    <select id="IdAvistamiento" name="IdAvistamiento" class="form-select" >
                                        <option value=''>Selecciona</option>
                                        <?php
                                        $sql = "select IdAvistamiento from Avistamiento";
                                        if ($result = mysqli_query($link, $sql)) {
                                            while ($rowAvistamiento = mysqli_fetch_array($result)) {
                                                echo "<option value=$rowAvistamiento[0]";
                                                if($row && $row['Avistamiento_IdAvistamiento'] == $rowAvistamiento['IdAvistamiento']) echo " selected ";
                                                echo ">$rowAvistamiento[0]</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="form-label" for="IdAvistamiento">Id de Avistamiento</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- Fecha colaboración -->
                                <div class="form-outline mb-4">
                                    <input type="datetime-local" id="FechaColaboracion" name="FechaColaboracion" class="form-control" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>" value='<?php if($row) echo $row['FechaColaboracion']; else { date_default_timezone_set('America/Tijuana'); echo date("Y-m-d\TH:i"); } ?>' required disabled />
                                    <label class="form-label" for="FechaColaboracion">Fecha de colaboración</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10">
                                <!-- Descripción -->
                                <div class="form-outline mb-4">
                                    <textarea id="DescripcionColaboracion" name="DescripcionColaboracion" class="form-control" rows=5 maxlength="500" required><?php if ($row) echo $row['DescripcionColaboracion'] ?></textarea>
                                    <label class="form-label" for="DescripcionColaboracion">Descripción</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Submit button -->
                    <div class="text-center">
                        <input type="submit" name="submit" id="submit" class="btn btn-<?php echo $color ?> btn-block mb-4" value="<?php echo $boton ?>" autofocus></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>
<?php mysqli_close($link); ?>
<?php endblock() ?>

<?php startblock('script') ?>
<?php endblock() ?>