<?php include("base.php"); ?>  <!-- Página Base -->
<?php include("method/avistamiento.php"); ?> <!-- Funciones para avistamientos -->
<?php include("bdconnect.php"); ?> <!-- Conexión a base de datos -->

<?php startblock('cuerpo') ?>

<?php //Filter action
$disabled = false;
$IdEspecie = false;
$action = 'insert';
if (isset($_GET["action"]) && isset($_GET["id"])) {
    $action = $_GET["action"];
    $id = $_GET["id"];
}
switch ($action) {
    case 'modify':
        $row = buscarId($id, $link);
        $titulo = "Modificar avistamiento";
        $subtitulo = "Modifica la información del avistamiento";
        $color = "dark";
        $boton = "Modificar";
        break;
    case 'delete':
        $row = buscarId($id, $link);
        $disabled = true;
        $titulo = "Borrar avistamiento";
        $subtitulo = "¿Quieres borrar este avistamiento?";
        $color = "danger";
        $boton = "Eliminar";
        break;
    default:
        //No toma en cuenta ninguna información
        if (isset($_GET["IdEspecie"])) //Si se recupera de Get
            $IdEspecie = $_GET["IdEspecie"];
        $row = false;
        $titulo = "Agregar nuevo avistamiento";
        $subtitulo = "Ingresa la información del avistamiento";
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
                <form action="controller/controller_avistamiento.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?php echo $action ?>">
                    <?php if ($row) echo "<input type='hidden' name='IdAvistamiento' value='$id'>" ?>


                    <fieldset <?php if ($disabled) echo "disabled" ?>>
                        <div class="row">
                            <div class="col-4">
                                <!-- Foto de la especie -->
                                <div class="form-outline mb-4">
                                    <?php if ($row) echo "<img id='FotoAvistamiento' src='" . $row['FotoAvistamiento'] . "' class='w-100'/>" ?>
                                    <input type="file" id="FotoAvistamiento" name="FotoAvistamiento" class="form-control" />
                                    <label class="form-label" for="FotoAvistamiento">Foto Avistamiento</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Especie -->
                                <div class="form-outline mb-4">
                                    <select id="Especie" name="Especie" class="form-select">
                                        <option value='NULL'>Selecciona una</option>
                                        <?php
                                        $sql = "select IdEspecie, NombreCientifico from Especie order by NombreCientifico";
                                        if ($result = mysqli_query($link, $sql)) {
                                            while ($rowEspecie = mysqli_fetch_array($result)) {
                                                echo "<option value=$rowEspecie[0]";
                                                if($row && $row['IdEspecie'] == $rowEspecie['IdEspecie'] || $IdEspecie == $rowEspecie['IdEspecie']) 
                                                    echo " selected ";
                                                echo ">$rowEspecie[1]</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="form-label" for="Especie">Especie</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Región -->
                                <div class="form-outline mb-4">
                                    <select id="Region" name="Region" class="form-select" required>
                                        <option value='' hidden>Selecciona una</option>
                                        <?php
                                        $sql = "select * from Region order by Region";
                                        if ($result = mysqli_query($link, $sql)) {
                                            while ($rowRegion = mysqli_fetch_array($result)) {
                                                echo "<option value=$rowRegion[0]";
                                                if($row && $row['IdRegion'] == $rowRegion['IdRegion']) echo " selected ";
                                                echo ">$rowRegion[1]</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="form-label" for="Region">Región</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <!-- Descripción -->
                                <div class="form-outline mb-4">
                                    <textarea id="DescripcionAvistamiento" name="DescripcionAvistamiento" class="form-control" rows=5 maxlength="500" required><?php if ($row) echo $row['DescripcionAvistamiento'] ?></textarea>
                                    <label class="form-label" for="usuario">Descripción</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <!-- Fecha de avistamiento -->
                                <div class="form-outline mb-4">
                                    <input type="datetime-local" id="FechaAvistamiento" name="FechaAvistamiento" class="form-control" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>" value='<?php if($row) echo $row['FechaAvistamiento']; else { date_default_timezone_set('America/Tijuana'); echo date("Y-m-d\TH:i"); } ?>' required disabled />
                                    <label class="form-label" for="FechaAvistamiento">Fecha de avistamiento</label>
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