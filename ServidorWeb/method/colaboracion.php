<?php

//Inserta una nueva especie
function insertar($DescripcionColaboracion, $Persona, $Especie, $Avistamiento, $link){
    $SQL = "INSERT INTO Colaboracion VALUES(0, now(), '$DescripcionColaboracion', $Persona, $Especie, $Avistamiento)";
    if(!mysqli_query($link, $SQL))
        die('Error: ' . mysqli_error($link));    
}

//Modifica una  especie
function modificar($IdColaboracion, $DescripcionColaboracion, $Especie, $Avistamiento, $link){
    $SQL = "UPDATE Colaboracion SET DescripcionColaboracion = '$DescripcionColaboracion', Especie_IdEspecie = $Especie, 
    Avistamiento_IdAvistamiento = $Avistamiento WHERE IdColaboracion = $IdColaboracion";
    if(!mysqli_query($link, $SQL))
        die('Error: ' . mysqli_error($link));
    
}

//Borra una especie
function borrar($IdColaboracion, $link){
    $SQL = "DELETE FROM Colaboracion WHERE IdColaboracion = $IdColaboracion";
    if(!mysqli_query($link, $SQL))
        die('Error: ' . mysqli_error($link));
}

//Obtiene una especie por el ID
function buscarId($id, $link){
    $SQL = "SELECT Especie_IdEspecie, Avistamiento_IdAvistamiento, DescripcionColaboracion, 
    DATE_FORMAT(FechaColaboracion, '%Y-%m-%dT%H:%i') AS FechaColaboracion
    FROM colaboracion c WHERE IdColaboracion = $id";
    
    if($result = mysqli_query($link, $SQL))
        $row = mysqli_fetch_array($result);
    return $row;
}

//Despliega las especies en formato de tabla
function mostrarColaboraciones($link){
    $count = 1;
    if(isset($_GET["busqueda"]) && $_GET["busqueda"]!=''){
        $busqueda = $_GET["busqueda"]; 
        if(is_numeric($busqueda))
            $count = (int)$busqueda;

        $SQL = "SELECT concat(NombrePersona, ' ', APaterno, ' ', AMaterno) as Nombre, Especie_IdEspecie, 
        Avistamiento_IdAvistamiento, DescripcionColaboracion, FechaColaboracion
        FROM colaboracion c
        LEFT JOIN persona p ON p.IdPersona = c.Persona_IdPersona
        WHERE (NombrePersona LIKE '%$busqueda%' OR APaterno LIKE '%$busqueda%' OR AMaterno LIKE '%$busqueda%' OR
        DescripcionColaboracion LIKE '%$busqueda%' OR IdColaboracion = '$busqueda')
        ORDER BY FechaColaboracion desc";
    }
    else
        $SQL = "SELECT concat(NombrePersona, ' ', APaterno, ' ', AMaterno) as Nombre, Especie_IdEspecie, 
        Avistamiento_IdAvistamiento, DescripcionColaboracion, FechaColaboracion
        FROM colaboracion c
        LEFT JOIN persona p ON p.IdPersona = c.Persona_IdPersona
        ORDER BY FechaColaboracion desc";
    
    if($result = mysqli_query($link, $SQL)) 
    {
        echo "<table class='table table-striped' style='width:100%'>
            <thead class='table-primary'>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Nombre del usuario</th>
                    <th scope='col'>Id de especie</th>
                    <th scope='col'>Id de avistamiento</th>
                    <th scope='col'>Descripción</th>
                    <th scope='col'>Fecha</th>
                    <th scope='col'>Acción</th>
                </tr>
            </thead>
            <tbody>";
        while($row=mysqli_fetch_array($result)){
            if($row[1]==''){
                $href = "index.php";
                $ver = $row[2];
            }
            else{
                $href = "especies.php";
                $ver = $row[1];
            }
            echo "<tr>
                    <th scope='row'>".$count++."</th>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
                    <td class='text-end'>
                      <a type='button' class='btn btn-sm btn-light w-100' href='$href?busqueda=$ver'>Ver</a>
                    </td>
                </tr>";
        }
        echo "</tbody></table>";
    }
}

function mostrarMisColaboraciones($link){
    $count = 1;
    $IdPersona = $_SESSION["persona"]["IdPersona"];
    if(isset($_GET["busqueda"]) && $_GET["busqueda"]!=''){
        $busqueda = $_GET["busqueda"]; 
        if(is_numeric($busqueda))
            $count = (int)$busqueda;

        $SQL = "SELECT Especie_IdEspecie, Avistamiento_IdAvistamiento, 
        DescripcionColaboracion, FechaColaboracion, IdColaboracion
        FROM colaboracion
        WHERE DescripcionColaboracion LIKE '%$busqueda%' OR IdColaboracion = '$busqueda'
        ORDER BY FechaColaboracion desc";
    }
    else
        $SQL = "SELECT Especie_IdEspecie, Avistamiento_IdAvistamiento, 
        DescripcionColaboracion, FechaColaboracion, IdColaboracion
        FROM colaboracion c
        ORDER BY FechaColaboracion desc";
    
    if($result = mysqli_query($link, $SQL)) 
    {
        echo "<table class='table table-striped' style='width:100%'>
            <thead class='table-primary'>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Id de especie</th>
                    <th scope='col'>Id de avistamiento</th>
                    <th scope='col'>Descripción</th>
                    <th scope='col'>Fecha</th>
                    <th scope='col'>Acción</th>
                </tr>
            </thead>
            <tbody>";
        while($row=mysqli_fetch_array($result)){
            if($row[0]==''){
                $href = "index.php";
                $ver = $row[1];
            }
            else{
                $href = "especies.php";
                $ver = $row[0];
            }
            echo "<tr>
                    <th scope='row'>".$count++."</th>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td class='text-end'>
                      <a type='button' class='btn btn-sm btn-light w-100' href='$href?busqueda=$ver'>Ver</a>
                      <a type='button' class='btn btn-sm btn-secondary w-100' href='formColaboracion.php?action=modify&id=$row[4]'>Modificar</a>
                      <a type='button' class='btn btn-sm btn-danger w-100' href='formColaboracion.php?action=delete&id=$row[4]'>Borrar</a>
                    </td>
                </tr>";
        }
        echo "</tbody></table>";
    }
}
?>