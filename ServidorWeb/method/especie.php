<?php

//Inserta una nueva especie
function insertar($NombreCientifico, $NombreComun, $Descripcion, $FotoEspecie, $Region, $Clase, $link){
    $SQL = "INSERT INTO Especie VALUES(0, '$NombreCientifico', '$NombreComun', '$Descripcion', '$FotoEspecie', '$Region', '$Clase')";
    if(!mysqli_query($link, $SQL))
        die('Error: ' . mysqli_error($link));
    subirFoto();
}

//Modifica una  especie
function modificar($IdEspecie, $NombreCientifico, $NombreComun, $Descripcion, $FotoEspecie, $Region, $Clase, $link){
    //Si no se agrega una nueva foto, no se actualiza
    if($FotoEspecie=='images/'){
        $SQL = "UPDATE Especie SET NombreCientifico = '$NombreCientifico', NombreComun = '$NombreComun', Descripcion = '$Descripcion', 
        Region_IdRegion = $Region, Clase_IdClase = $Clase WHERE IdEspecie = $IdEspecie";
        if(!mysqli_query($link, $SQL))
            die('Error: ' . mysqli_error($link));
    }
    else{
        $SQL = "UPDATE Especie SET NombreCientifico = '$NombreCientifico', NombreComun = '$NombreComun', Descripcion = '$Descripcion', 
        FotoEspecie = '$FotoEspecie', Region_IdRegion = $Region, Clase_IdClase = $Clase WHERE IdEspecie = $IdEspecie";
        if(!mysqli_query($link, $SQL))
            die('Error: ' . mysqli_error($link));
        subirFoto();
    }
}

//Borra una especie
function borrar($IdEspecie, $link){
    $SQL = "DELETE FROM Especie WHERE IdEspecie = $IdEspecie";
    if(!mysqli_query($link, $SQL))
        die('Error: ' . mysqli_error($link));
}

//Guarda la foto en el servidor
function subirFoto(){
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["FotoEspecie"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        
        $check = getimagesize($_FILES["FotoEspecie"]["tmp_name"]);
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
    if ($_FILES["FotoEspecie"]["size"] > 8e+7) {
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
        if (move_uploaded_file($_FILES["FotoEspecie"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["FotoEspecie"]["name"])). " has been uploaded.";
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }
}

//Obtiene una especie por el ID
function buscarId($id, $link){
    $SQL = "SELECT NombreCientifico, NombreComun, Descripcion, FotoEspecie, Region,
     Clase, Division, Reino, IdEspecie,  IdRegion, IdClase, IdDivision, IdReino
    FROM especie, region, clase, division, reino WHERE IdEspecie='$id' AND Region_IdRegion=IdRegion 
    AND Clase_IdClase=IdClase AND Division_IdDivision=IdDivision AND Reino_IdReino = IdReino";
    if($result = mysqli_query($link, $SQL))
        $row = mysqli_fetch_array($result);
    return $row;
}

//Despliega las especies en formato de tabla
function mostrarEspecies($link){
    $count = 1;
    if(isset($_GET["busqueda"])){
        $busqueda = $_GET["busqueda"]; 
        if(is_numeric($busqueda))
            $count = (int)$busqueda;
            
        $SQL = "SELECT NombreCientifico, NombreComun, Descripcion, FotoEspecie, Region, Clase, Division, Reino, IdEspecie
        FROM especie, region, clase, division, reino 
        WHERE Region_IdRegion=IdRegion AND Clase_IdClase=IdClase AND Division_IdDivision=IdDivision AND Reino_IdReino = IdReino AND
        (NombreCientifico LIKE '%$busqueda%' OR NombreComun LIKE '%$busqueda%' OR Clase LIKE '%$busqueda%' OR IdEspecie = '$busqueda' )
        ORDER BY NombreCientifico";
    }
    else
        $SQL = "SELECT NombreCientifico, NombreComun, Descripcion, FotoEspecie, Region, Clase, Division, Reino, IdEspecie
        FROM especie, region, clase, division, reino 
        WHERE Region_IdRegion=IdRegion AND Clase_IdClase=IdClase AND Division_IdDivision=IdDivision AND Reino_IdReino = IdReino
        ORDER BY NombreCientifico";
    
    if($result = mysqli_query($link, $SQL)) 
    {
        echo "<table class='table table-striped' style='width:100%'>
            <thead class='table-primary'>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Nombre científico</th>
                    <th scope='col'>Nombre común</th>
                    <th scope='col'>Descripción</th>
                    <th scope='col'>Foto</th>
                    <th scope='col'>Region</th>
                    <th scope='col'>Clase</th>
                    <th scope='col'>División</th>
                    <th scope='col'>Reino</th>
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
                    <td><img src='$row[3]' alt='$row[1]' width='100%'></td>
                    <td>$row[4]</td>
                    <td>$row[5]</td>
                    <td>$row[6]</td>
                    <td>$row[7]</td>
                    <td class='text-end'>
                      <a type='button' class='btn btn-sm btn-light w-100' href='formAvistamiento.php?IdEspecie=$row[8]'>Avistamiento</a>
                      <a type='button' class='btn btn-sm btn-secondary w-100' href='formEspecie.php?action=modify&id=$row[8]'>Modificar</a>
                      <a type='button' class='btn btn-sm btn-danger w-100' href='formEspecie.php?action=delete&id=$row[8]'>Borrar</a>
                    </td>
                  </tr>";
        }
        echo "</tbody></table>";
    }
}
?>