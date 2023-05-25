<?php include("base.php"); ?>  <!-- Página Base -->
<?php include("sesion.php"); ?>
<?php include("method/especie.php"); ?> <!-- Funciones para especies -->
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
        $titulo = "Modificar especie";
        $subtitulo = "Modifica la información de la especie";
        $color = "dark";
        $boton = "Modificar";
        break;
    case 'delete':
        $row = buscarId($id, $link);
        $disabled = true;
        $titulo = "Borrar especie";
        $subtitulo = "¿Quieres borrar esta especie?";
        $color = "danger";
        $boton = "Eliminar";
        break;
    default:
        //No toma en cuenta ninguna información
        $row = false;

        $titulo = "Agregar nueva especie";
        $subtitulo = "Ingresa la información de la especie";
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
                <form action="controller/controller_especie.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?php echo $action ?>">
                    <?php if ($row) echo "<input type='hidden' name='IdEspecie' value='$id'>" ?>


                    <fieldset <?php if ($disabled) echo "disabled" ?>>
                        <div class="row">
                            <div class="col-4">
                                <!-- Foto de la especie -->
                                <div class="form-outline mb-4">
                                    <?php if ($row) echo "<img id='FotoEspecie' src='" . $row['FotoEspecie'] . "' class='w-100'/>" ?>
                                    <input type="file" id="FotoEspecie" name="FotoEspecie" class="form-control" <?php if ($action == 'insert') echo "required  " ?> />
                                    <label class="form-label" for="FotoEspecie">Foto Especie</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Nombre científico -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="NombreCientifico" name="NombreCientifico" class="form-control" maxlength="70" value='<?php if ($row) echo $row['NombreCientifico'] ?>' required />
                                    <label class="form-label" for="NombreCientifico">Nombre científico</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Nombre común -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="NombreComun" name="NombreComun" class="form-control" maxlength="70" value='<?php if ($row) echo $row['NombreComun'] ?>' />
                                    <label class="form-label" for="amaterno">Nombre común</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <!-- Descripción -->
                                <div class="form-outline mb-4">
                                    <textarea id="Descripcion" name="Descripcion" class="form-control" rows=5 maxlength="500" required><?php if ($row) echo $row['Descripcion'] ?></textarea>
                                    <label class="form-label" for="usuario">Descripción</label>
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
                            <div class="col-4">
                                <!-- Reino -->
                                <div class="form-outline mb-4">
                                    <select id="Reino" name="Reino" class="form-select" required
                                    onchange="getLista('select/division.php?IdReino='+this.value, 'divisiondiv')" >
                                        <option value='' hidden>Selecciona una</option>
                                        <?php
                                        $sql = "select * from Reino order by Reino";
                                        if ($result = mysqli_query($link, $sql)) {
                                            while ($rowReino = mysqli_fetch_array($result)) {
                                                echo "<option value=$rowReino[0]";
                                                if($row && $row['IdReino'] == $rowReino['IdReino']) echo " selected ";
                                                echo ">$rowReino[1]</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="form-label" for="Reino">Reino</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- División -->
                                <div class="form-outline mb-4">
                                    <div id="divisiondiv">
                                        <select id="Division" name="Division" class="form-select" required <?php if($action != 'modify') echo "disabled"; ?>
                                        onchange="getLista('select/clase.php?IdDivision='+this.value, 'clasediv')" >
                                            <option value='' hidden>Selecciona una</option>
                                            <?php
                                            if ($row){
                                                $sql = "select * from Division where Reino_IdReino= ".$row['IdReino']." order by Division";
                                                echo $sql;
                                                if ($result = mysqli_query($link, $sql)) {
                                                    while ($rowDivision = mysqli_fetch_array($result)) {
                                                        echo "<option value=$rowDivision[0]";
                                                        if($row['IdDivision'] == $rowDivision['IdDivision']) echo " selected ";
                                                        echo ">$rowDivision[1]</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label class="form-label" for="Division">División</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Clases -->
                                <div class="form-outline mb-4">
                                    <div id="clasediv">
                                        <select id="Clase" name="Clase" class="form-select" required <?php if($action != 'modify') echo "disabled"; ?>>
                                        <option value='' hidden>Selecciona una</option>
                                            <?php
                                            if ($row){
                                                $sql = "select * from Clase where Division_IdDivision= ".$row['IdDivision']." order by Clase";
                                                echo $sql;
                                                if ($result = mysqli_query($link, $sql)) {
                                                    while ($rowClase = mysqli_fetch_array($result)) {
                                                        echo "<option value=$rowClase[0]";
                                                        if($row['IdClase'] == $rowClase['IdClase']) echo " selected ";
                                                        echo ">$rowClase[1]</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label class="form-label" for="Clase">Clase</label>
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
<script src="js/scriptEspecie.js"></script>
<?php endblock() ?>