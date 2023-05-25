<?php

//Inserta una nueva especie
function insertar($Persona, $Especie, $Region, $DescripcionAvistamiento, $FotoEspecie, $link){
    $SQL = "INSERT INTO Avistamiento VALUES(0, $Persona, $Especie, $Region, '$DescripcionAvistamiento', now(), '$FotoEspecie')";
    if(!mysqli_query($link, $SQL))
        die('Error: ' . mysqli_error($link));
    subirFoto();
    
}

//Modifica una  especie
function modificar($IdAvistamiento, $Especie, $Region, $DescripcionAvistamiento, $FotoAvistamiento, $link){
    //Si no se agrega una nueva foto, no se actualiza
    if($FotoAvistamiento=='images/'){
        $SQL = "UPDATE Avistamiento SET Especie_IdEspecie = $Especie, DescripcionAvistamiento = '$DescripcionAvistamiento', 
        Region_IdRegion = $Region WHERE IdAvistamiento = $IdAvistamiento";
        if(!mysqli_query($link, $SQL))
            die('Error: ' . mysqli_error($link));
    }
    else{
        $SQL = "UPDATE Avistamiento SET Especie_IdEspecie = $Especie, DescripcionAvistamiento = '$DescripcionAvistamiento', 
        Region_IdRegion = $Region, FotoAvistamiento = '$FotoAvistamiento' WHERE IdAvistamiento = $IdAvistamiento";
        if(!mysqli_query($link, $SQL))
            die('Error: ' . mysqli_error($link));
        subirFoto();
    }
}

//Borra una especie
function borrar($IdAvistamiento, $link){
    $SQL = "DELETE FROM Avistamiento WHERE IdAvistamiento = $IdAvistamiento";
    if(!mysqli_query($link, $SQL))
        die('Error: ' . mysqli_error($link));
}

//Guarda la foto en el servidor
function subirFoto(){
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["FotoAvistamiento"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["FotoAvistamiento"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } 
        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["FotoAvistamiento"]["size"] > 8e+7) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["FotoAvistamiento"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["FotoAvistamiento"]["name"])). " has been uploaded.";
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }
}

//Obtiene una especie por el ID
function buscarId($id, $link){
    $SQL = "SELECT NombreCientifico, Region, DescripcionAvistamiento, 
    DATE_FORMAT(FechaAvistamiento, '%Y-%m-%dT%H:%i') AS FechaAvistamiento,
    FotoAvistamiento, IdAvistamiento, IdPersona, IdEspecie, IdRegion
    FROM avistamiento a
    LEFT JOIN especie e ON e.IdEspecie = a.Especie_IdEspecie 
    LEFT JOIN persona p ON p.IdPersona = a.Persona_IdPersona 
    LEFT JOIN region r ON r.IdRegion = a.Region_IdRegion
    WHERE IdAvistamiento = $id";
    if($result = mysqli_query($link, $SQL))
        $row = mysqli_fetch_array($result);
    return $row;
}

//Despliega las especies en formato de tabla
function mostrarAvistamientos($link){
    $count = 1;
    if(isset($_GET["busqueda"]) && $_GET["busqueda"]!=''){
        $busqueda = $_GET["busqueda"]; 
        if(is_numeric($busqueda))
            $count = (int)$busqueda;

        $SQL = "SELECT concat(NombrePersona, ' ', APaterno, ' ', AMaterno) as Nombre, NombreCientifico, Region, DescripcionAvistamiento, FechaAvistamiento, FotoAvistamiento
        FROM avistamiento a
        LEFT JOIN especie e ON e.IdEspecie = a.Especie_IdEspecie LEFT JOIN persona p ON p.IdPersona = a.Persona_IdPersona LEFT JOIN region r ON r.IdRegion = a.Region_IdRegion
        WHERE (NombrePersona LIKE '%$busqueda%' OR APaterno LIKE '%$busqueda%' OR AMaterno LIKE '%$busqueda%' OR NombreCientifico LIKE '%$busqueda%' OR IdAvistamiento = '$busqueda')
        ORDER BY FechaAvistamiento desc";
    }
    else
        $SQL = "SELECT concat(NombrePersona, ' ', APaterno, ' ', AMaterno) as Nombre, NombreCientifico, 
        Region, DescripcionAvistamiento, FechaAvistamiento, FotoAvistamiento FROM avistamiento a
        LEFT JOIN especie e ON e.IdEspecie = a.Especie_IdEspecie 
        LEFT JOIN persona p ON p.IdPersona = a.Persona_IdPersona 
        LEFT JOIN region r ON r.IdRegion = a.Region_IdRegion
        ORDER BY FechaAvistamiento desc";
    
    if($result = mysqli_query($link, $SQL)) 
    {
        echo "<table class='table table-striped' style='width:100%'>
            <thead class='table-primary'>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Nombre del usuario</th>
                    <th scope='col'>Nombre de la especie</th>
                    <th scope='col'>Region</th>
                    <th scope='col'>Descripción</th>
                    <th scope='col'>Fecha</th>
                    <th scope='col'>Foto</th>
                </tr>
            </thead>
            <tbody>";
        while($row=mysqli_fetch_array($result)){
            echo "<tr>
                    <th scope='row'>".$count++."</th>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
                    <td style='width: 15%;'>";
            if($row[5]!='' && $row[5]!='images/')
                echo "<img src='$row[5]' alt='Avistamiento_$row[1]' width='100%'>";
            echo "</td></tr>";
        }
        echo "</tbody></table>";
    }
}

function mostrarMisAvistamientos($link){
    $count = 1;
    $IdPersona = $_SESSION["persona"]["IdPersona"];
    if(isset($_GET["busqueda"]) && $_GET["busqueda"]!=''){
        $busqueda = $_GET["busqueda"]; 
        if(is_numeric($busqueda))
            $count = (int)$busqueda;

        $SQL = "SELECT NombreCientifico, Region, DescripcionAvistamiento, 
        FechaAvistamiento, FotoAvistamiento, IdAvistamiento FROM avistamiento a
        LEFT JOIN especie e ON e.IdEspecie = a.Especie_IdEspecie 
        LEFT JOIN persona p ON p.IdPersona = a.Persona_IdPersona 
        LEFT JOIN region r ON r.IdRegion = a.Region_IdRegion
        WHERE a.Persona_IdPersona = $IdPersona AND (DescripcionAvistamiento LIKE '%$busqueda%' OR NombreCientifico LIKE '%$busqueda%' OR IdAvistamiento = '$busqueda')
        ORDER BY FechaAvistamiento desc";
    }
    else
        $SQL = "SELECT NombreCientifico, Region, DescripcionAvistamiento,
        FechaAvistamiento, FotoAvistamiento, IdAvistamiento FROM avistamiento a
        LEFT JOIN especie e ON e.IdEspecie = a.Especie_IdEspecie 
        LEFT JOIN persona p ON p.IdPersona = a.Persona_IdPersona 
        LEFT JOIN region r ON r.IdRegion = a.Region_IdRegion
        WHERE a.Persona_IdPersona = $IdPersona
        ORDER BY FechaAvistamiento desc";
    
    if($result = mysqli_query($link, $SQL)) 
    {
        echo "<table class='table table-striped' style='width:100%'>
            <thead class='table-primary'>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Nombre de la especie</th>
                    <th scope='col'>Region</th>
                    <th scope='col'>Descripción</th>
                    <th scope='col'>Fecha</th>
                    <th scope='col'>Foto</th>
                    <th scope='col'>Accion</th>
                </tr>
            </thead>
            <tbody>";
        while($row=mysqli_fetch_array($result)){
            echo "<tr>
                    <th scope='row'>".$count++."</th>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td style='width: 15%;'>";
            if($row[4]!='' && $row[4]!='images/')
                echo "<img src='$row[4]' alt='Avistamiento_$row[0]' width='100%'>";
            
                echo "</td><td class='text-end'>
                      <a type='button' class='btn btn-sm btn-secondary w-100' href='formAvistamiento.php?action=modify&id=$row[5]'>Modificar</a>
                      <a type='button' class='btn btn-sm btn-danger w-100' href='formAvistamiento.php?action=delete&id=$row[5]'>Borrar</a>
                    </td>
                  </tr>";
        }
        echo "</tbody></table>";
    }
}
?>