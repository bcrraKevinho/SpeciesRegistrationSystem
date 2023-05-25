<select id="carreraE" name="carreraE" class="form-select" required>
    <option value="" selected hidden>Selecciona una</option>
    <?php
    include("../bdconnect.php");

    $facultad = $_GET["IdFacultad"];
    $sql = "select * from carrera where Facultad_IdFacultad=$facultad order by Carrera";
    if ($result = mysqli_query($link, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<option value=$row[0]>$row[1]</option>";
        }
    }

    mysqli_close($link);
    ?>
</select>
<label class="form-label" for="carreraE">Carrera</label>