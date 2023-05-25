<?php include("base.php"); ?>
<?php include("method/persona.php"); ?>
<?php include("bdconnect.php"); ?>

<?php startblock('cuerpo') ?>

<?php //Formulario dinámico

$nochange = 'disabled'; //Indica los campos que no se van a modificar
$action = "insert"; //Define la acción deteminada "insert"

//Recupera posibles parámetros 
if (isset($_GET["action"]) && isset($_GET["id"])) {
    $action = $_GET["action"];
    $id = $_GET["id"];
}
switch ($action) {
    case 'modify':
        $row = buscarId($id, $link); //Obtiene la información de la persona
        $titulo = "Modificar usuario";
        $subtitulo = "Modifica la información de la persona";
        $color = "dark";
        $boton = "Modificar"; //Nombre del botón Submit
        break;
    case 'delete':
        $row = buscarId($id, $link); //Obtiene la información de la persona
        $titulo = "Borrar especie";
        $subtitulo = "¿Quieres borrar esta especie?";
        $color = "danger";
        $boton = "Eliminar"; //Nombre del botón Submit
        break;
    default:
        //No toma en cuenta ninguna información
        $row = false;
        $rowI = false;
        $rowE = false;
        
        $titulo = "Crear una cuenta";
        $subtitulo = "Ingresa tu información personal";
        $color = "primary";
        $boton = "Agregar"; //Nombre del botón Submit
        $nochange = '';
        break;
}

//Obtiene la información en caso de ser Estudiante o Investigador
if ($row && $rowI=buscarInvestigador($id, $link)){
    $formEstudiante = "d-none"; 
    $btnEstudiante = "d-none";
}
else if ($row && $rowE=buscarEstudiante($id, $link)){
    $formInvestigador = "d-none";
    $btnInvestigador = "d-none";
}
else {
    $formEstudiante = "d-none";
    $formInvestigador = "d-none";
    $btnEstudiante = "";
    $btnInvestigador = "";
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
                <form action="controller/controller_persona.php" method="post">
                    <input type="hidden" name="action" value="<?php echo $action ?>">
                    <?php if ($row) echo "<input type='hidden' name='IdPersona' value='$id'>" ?>

                    <fieldset <?php if($action=='delete') echo "disabled" ?>>
                        <!-- FORMULARIO GENERAL -->
                        <div class="row">
                            <div class="col-4">
                                <!-- Nombre -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="nombre" name="nombre" class="form-control" maxlength="45" value='<?php if ($row) echo $row['NombrePersona'] ?>' required />
                                    <label class="form-label" for="nombre">Nombre</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Apellido paterno -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="apaterno" name="apaterno" class="form-control" maxlength="30" value='<?php if ($row) echo $row['APaterno'] ?>' required />
                                    <label class="form-label" for="apaterno">Apellido Paterno</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Apellido materno -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="amaterno" name="amaterno" class="form-control" maxlength="30" value='<?php if ($row) echo $row['AMaterno'] ?>' />
                                    <label class="form-label" for="amaterno">Apellido Materno</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <!-- Usuario -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="usuario" name="usuario" class="form-control" maxlength="15" value='<?php if ($row) echo $row['Usuario'] ?>' required />
                                    <label class="form-label" for="usuario">Usuario</label>
                                </div>
                            </div>

                            <div class="col-6">
                                <!-- Contraseña -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password" class="form-control" maxlength="15" <?php echo $nochange; ?> required />
                                    <label class="form-label" for="password">Contraseña</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <!-- Teléfono -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="telefono" name="telefono" class="form-control" pattern="[0-9]{10}" maxlength="10" value='<?php if ($row) echo $row['TelefonoPersona'] ?>' required />
                                    <label class="form-label" for="telefono">Teléfono</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Fecha de nacimiento -->
                                <div class="form-outline mb-4">
                                    <input type="date" id="nacimiento" name="nacimiento" class="form-control" min="1900-01-01" max="<?php echo date("Y-m-d") ?>" value='<?php if ($row) echo $row['FechaNacimiento'] ?>' required />
                                    <label class="form-label" for="nacimiento">Fecha de nacimiento</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Género -->
                                <div class="form-outline mb-4">
                                    <select id="genero" name="genero" class="form-select" required>
                                        <option value='' hidden>
                                            Selecciona uno
                                        </option>
                                        <?php
                                        $sql = "select * from Genero order by Genero";
                                        if ($result = mysqli_query($link, $sql)) {
                                            while ($rowGenero = mysqli_fetch_array($result)) {
                                                echo "<option value=$rowGenero[0]"; if($row && $row['IdGenero'] == $rowGenero['IdGenero']) echo " selected "; echo ">";
                                                    echo "$rowGenero[1]";
                                                echo "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="form-label" for="genero">Género</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Botones estudiante/investigador -->
                        <div class="row">
                            <div class="col-12">
                                <p>¿Eres un estudiante/investigador?</p>
                                <input type="checkbox" class="btn-check" name="estudiante" id="estudiante" value="1" autocomplete="off" onclick="nandGate(this)">
                                <label class="btn btn-outline-secondary <?php echo $btnEstudiante ?>" for="estudiante">Estudiante</label>

                                <input type="checkbox" class="btn-check" name="investigador" id="investigador" value="2" autocomplete="off" onclick="nandGate(this)">
                                <label class="btn btn-outline-secondary <?php echo $btnInvestigador ?>" for="investigador">Investigador</label><br>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class='<?php echo $formEstudiante ?>' <?php if($action=='insert') echo "id='collapseEstudiante'" ?>>
                                    <!-- FORMULARIO ESTUDIANTES -->
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <!-- Semestre -->
                                                <div class="form-outline mb-4">
                                                    <input type="number" id="semestre" name="semestre" class="form-control" min="1" max="16" 
                                                    value='<?php if($rowE) echo $rowE['Semestre']; ?>' <?php echo $nochange; ?>/>
                                                    <label class="form-label" for="semestre">Semestre</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <!-- Año de ingreso -->
                                                <div class="form-outline mb-4">
                                                    <input type="number" id="ingreso" name="ingreso" class="form-control" min="1900" max="<?php echo date("Y") ?>" 
                                                    value='<?php if($rowE) echo $rowE['YearIngreso']; ?>' <?php echo $nochange; ?> />
                                                    <label class="form-label" for="ingreso">Año de ingreso</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- Universidad -->
                                                <div class="form-outline mb-4">
                                                    <select id="universidadE" name="universidadE" class="form-select" <?php echo $nochange; ?>
                                                    onchange="getLista('select/facultadesE.php?IdUniversidad='+this.value, 'facultadEdiv')" >
                                                        <option value="" selected hidden>
                                                            <?php if($rowE) echo $rowE['Universidad']; else echo "Selecciona una"; ?>
                                                        </option>
                                                        <?php
                                                        $sql = "select * from universidad order by universidad";
                                                        if ($result = mysqli_query($link, $sql)) {
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                echo "<option value=$row[0]>$row[1]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label class="form-label" for="universidadE">Universidad</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <!-- Facultad -->
                                                <div class="form-outline mb-4" id="facultadEdiv">
                                                    <select id="facultadE" name="facultadE" class="form-select" onchange="getLista('select/carrerasE.php?IdFacultad='+this.value, 'carreraEdiv')" disabled <?php echo $nochange; ?>>
                                                        <option value="" selected hidden>
                                                            <?php if($rowE) echo $rowE['Facultad']; else echo "Selecciona una"; ?>
                                                        </option>
                                                    </select>
                                                    <label class="form-label" for="facultadE">Facultad</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <!-- Carrera -->
                                                <div class="form-outline" id="carreraEdiv">
                                                    <select id="carreraE" name="carreraE" class="form-select" disabled <?php echo $nochange; ?>>
                                                        <option value="" selected hidden>
                                                            <?php if($rowE) echo $rowE['Carrera']; else echo "Selecciona una"; ?>
                                                        </option>
                                                    </select>
                                                    <label class="form-label" for="carreraE">Carrera</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='<?php echo $formInvestigador ?>' <?php if($action=='insert') echo "id='collapseInvestigador'" ?>>
                                    <!-- FORMULARIO INVESTIGADORES -->
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <!-- Cédula profesional -->
                                                <div class="form-outline mb-4">
                                                    <input type="text" id="cedula" name="cedula" class="form-control" pattern="[0-9]{7,8}" minlength="7" maxlength="8" 
                                                    value='<?php if($rowI) echo $rowI['CedulaProfesional']; ?>' <?php echo $nochange; ?>/>
                                                    <label class="form-label" for="cedula">Cédula profesional</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <!-- Año de egreso -->
                                                <div class="form-outline mb-4">
                                                    <input type="number" id="egreso" name="egreso" class="form-control" min="1900" max="<?php echo date("Y") ?>" 
                                                    value='<?php if($rowI) echo $rowI['YearEgreso']; ?>' <?php echo $nochange; ?>/>
                                                    <label class="form-label" for="egreso">Año de egreso</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- Universidad -->
                                                <div class="form-outline mb-4">
                                                    <select id="universidadI" name="universidadI" class="form-select" <?php echo $nochange; ?> 
                                                    onchange="getLista('select/facultadesI.php?IdUniversidad='+this.value, 'facultadIdiv')">
                                                        <option value="" selected hidden>
                                                            <?php if($rowI) echo $rowI['Universidad']; else echo "Selecciona una"; ?>
                                                        </option>
                                                        <?php
                                                        $sql = "select * from universidad order by universidad";
                                                        if ($result = mysqli_query($link, $sql)) {
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                echo "<option value=$row[0]>$row[1]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label class="form-label" for="universidadI">Universidad</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <!-- Facultad -->
                                                <div class="form-outline mb-4" id="facultadIdiv">
                                                    <select id="facultadI" name="facultadI" class="form-select" <?php echo $nochange; ?>
                                                    onchange="getLista('select/carrerasI.php?IdFacultad='+this.value, 'carreraIdiv')" disabled>
                                                        <option value="" selected hidden>
                                                            <?php if($rowI) echo $rowI['Facultad']; else echo "Selecciona una"; ?>
                                                        </option>
                                                    </select>
                                                    <label class="form-label" for="facultadI">Facultad</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <!-- Carrera -->
                                                <div class="form-outline" id="carreraIdiv">
                                                    <select id="carreraI" name="carreraI" class="form-select" <?php echo $nochange; ?> disabled>
                                                        <option value="" selected hidden>
                                                            <?php if($rowI) echo $rowI['Carrera']; else echo "Selecciona una"; ?>
                                                        </option>
                                                    </select>
                                                    <label class="form-label" for="carreraI">Carrera</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Submit button -->
                    <div class="text-center">
                        <input type="submit" class="btn btn-<?php echo $color ?> btn-block mb-4" value="<?php echo $boton ?>"></input>
                    </div>

                    <?php if ($action == 'insert') { ?>
                        <!-- Login buttons -->
                        <div class="text-center">
                            <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></p>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>

<?php mysqli_close($link); ?>
<?php endblock() ?>

<?php startblock('script') ?>
<script src="js/scriptPersona.js"></script>
<?php endblock() ?>