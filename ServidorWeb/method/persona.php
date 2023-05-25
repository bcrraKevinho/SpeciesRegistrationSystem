<?php

//Valida que el usuario y contraseña sean los correctos
function validacion($user, $pass, $link)
{
    $SQL = "SELECT * FROM persona WHERE Usuario='$user' AND Password='$pass'";
    
    if($result = mysqli_query($link, $SQL))
        return mysqli_fetch_array($result);
    return null;
}

//Hace la inserción de un usuario común
function insertar($nombre, $apaterno, $amaterno, $usuario, $password, $telefono, $nacimiento, $genero, $link)
{
    $SQL = "INSERT INTO Persona VALUES(0, '$nombre', '$apaterno', '$amaterno', '$usuario', 
                                        '$password', '$telefono', '$nacimiento', $genero, 1)";
    
    if(!mysqli_query($link, $SQL))
        die('Error: ' . mysqli_error($link));
}

//Hace la inserción de un estudiante
function insertarEstudiante($nombre, $apaterno, $amaterno, $usuario, $password, $telefono, $nacimiento, $genero, 
                $semestre, $ingreso, $carrera, $link)
{
    $SQL = "call insertaEstudiante('$nombre', '$apaterno', '$amaterno', '$usuario', '$password', '$telefono', 
                                        '$nacimiento', $genero, 1, $semestre, $ingreso, $carrera)";
    if(!mysqli_query($link, $SQL))
        die('Error: ' . mysqli_error($link));
}

//Hace la inserción de un investigador
function insertarInvestigador($nombre, $apaterno, $amaterno, $usuario, $password, $telefono, $nacimiento, $genero,
                $cedula, $egreso, $carrera, $link)
{
    $SQL = "call insertaInvestigador('$nombre', '$apaterno', '$amaterno', '$usuario', '$password', '$telefono', 
                                        '$nacimiento', $genero, 2, $cedula, $egreso, $carrera)";
    if(!mysqli_query($link, $SQL))
        die('Error: ' . mysqli_error($link));
}

//Modifica la información de una persona
function modificar($IdPersona, $nombre, $apaterno, $amaterno, $usuario, $telefono, $nacimiento, $genero, $link){
    $SQL = "UPDATE Persona SET NombrePersona = '$nombre', APaterno = '$apaterno', AMaterno = '$amaterno', Usuario = '$usuario', 
    TelefonoPersona = '$telefono', FechaNacimiento = '$nacimiento', Genero_IdGenero = $genero WHERE IdPersona = $IdPersona;";
    if(!mysqli_query($link, $SQL))
        die('Error: ' . mysqli_error($link));
}

//Borra el registro de una persona
function borrar($IdPersona, $link){
    if(buscarEstudiante($IdPersona, $link))
        $SQL = "DELETE FROM Estudiante WHERE Persona_IdPersona = $IdPersona";
    else if(buscarInvestigador($IdPersona, $link))
        $SQL = "DELETE FROM Investigador WHERE Persona_IdPersona = $IdPersona";
    else 
        $SQL = "DELETE FROM Persona WHERE IdPersona = $IdPersona";
    
    if(!mysqli_query($link, $SQL))
        die('Error: ' . mysqli_error($link));
}

//Obtiene una persona por el usuario
function buscarUsuario($usuario, $link)
{
    $SQL = "SELECT * FROM persona WHERE usuario='$usuario'";
    if($result = mysqli_query($link, $SQL))
        $row = mysqli_fetch_array($result);
    return $row;
}

//Obtiene una persona por el ID
function buscarId($id, $link){
    $SQL = "SELECT NombrePersona, APaterno, AMaterno, Usuario, TelefonoPersona, FechaNacimiento, Genero, TipoUsuario, IdTipoUsuario, IdGenero 
    FROM Persona, Genero, Tipousuario WHERE Genero_IdGenero = IdGenero AND TipoUsuario_IdTipoUsuario = IdTipoUsuario AND IdPersona = $id";
    if($result = mysqli_query($link, $SQL))
        $row = mysqli_fetch_array($result);
    return $row;
}

//Devuelve si es estudiante o no
function buscarEstudiante($id, $link){
    $SQL = "SELECT Semestre, YearIngreso, Carrera, Facultad, Universidad FROM Estudiante, Carrera, Facultad, Universidad 
    WHERE Carrera_IdCarrera = IdCarrera AND Facultad_IdFacultad = IdFacultad AND Universidad_IdUniversidad = IdUniversidad 
    AND Persona_IdPersona = $id";
    if($result = mysqli_query($link, $SQL))
        $row = mysqli_fetch_array($result);
    return $row;
}

//Devuelve si es investigador o no
function buscarInvestigador($id, $link){
    $SQL = "SELECT CedulaProfesional, YearEgreso, Carrera, Facultad, Universidad FROM Investigador, Carrera, Facultad, Universidad 
    WHERE Carrera_IdCarrera = IdCarrera AND Facultad_IdFacultad = IdFacultad AND Universidad_IdUniversidad = IdUniversidad 
    AND Persona_IdPersona = $id";
    if($result = mysqli_query($link, $SQL))
        $row = mysqli_fetch_array($result);
    return $row; 
}

//Despliega las personas en formato de tabla
function mostrarPersonas($link){
    $count = 1;
    if(isset($_GET["busqueda"])){
        $busqueda = $_GET["busqueda"]; 
        if(is_numeric($busqueda))
            $count = (int)$busqueda;
            
        $SQL = "SELECT concat(NombrePersona, ' ', Apaterno, ' ', AMaterno) as Nombre, Usuario, TelefonoPersona, FechaNacimiento, Genero, TipoUsuario, IdPersona 
        FROM Persona, Genero, Tipousuario WHERE Genero_IdGenero = IdGenero AND TipoUsuario_IdTipoUsuario = IdTipoUsuario AND 
        ( NombrePersona LIKE '%$busqueda%' OR Apaterno LIKE '%$busqueda%' OR AMaterno LIKE '%$busqueda%' OR IdPersona = '$busqueda' )";
    }
    else
        $SQL = "SELECT concat(NombrePersona, ' ', Apaterno, ' ', AMaterno) as Nombre, Usuario, TelefonoPersona, FechaNacimiento, Genero, TipoUsuario, IdPersona 
        FROM Persona, Genero, Tipousuario WHERE Genero_IdGenero = IdGenero AND TipoUsuario_IdTipoUsuario = IdTipoUsuario";
    if($result = mysqli_query($link, $SQL)) 
    {
        echo "<table class='table table-striped' style='width:100%'>
            <thead class='table-primary'>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Nombre completo</th>
                    <th scope='col'>Usuario</th>
                    <th scope='col'>Teléfono</th>
                    <th scope='col'>Fecha de Nacimiento</th>
                    <th scope='col'>Género</th>
                    <th scope='col'>Tipo de Usuario</th>
                    <th scope='col'>Acción</th>
                </tr>
            </thead>
            <tbody>";
        while($row=mysqli_fetch_array($result)){
            echo "<tr>
                    <th scope='row'>".$count++."</th>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>".date('d / F / Y',strtotime($row[3]))."</td>
                    <td>$row[4]</td>
                    <td>$row[5]</td>
                    <td class='text-end'>
                      <a type='button' class='btn btn-sm btn-secondary w-100' href='formPersona.php?action=modify&id=$row[6]'>Modificar</a>
                      <a type='button' class='btn btn-sm btn-danger w-100' href='formPersona.php?action=delete&id=$row[6]'>Borrar</a>
                    </td>
                  </tr>";
        }
        echo "</tbody></table>";
    }
}
?>