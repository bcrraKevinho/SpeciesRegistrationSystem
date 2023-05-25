<select id="Clase" name="Clase" class="form-select" required>
    <option value="" selected hidden>Selecciona una</option>
    <?php
    include("../bdconnect.php");
    $division = $_GET["IdDivision"];
    $sql = "select * from Clase where Division_IdDivision=$division order by Clase";
    if ($result = mysqli_query($link, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<option value=$row[0]>$row[1]</option>";
        }
    }
    mysqli_close($link);
    ?>
</select>