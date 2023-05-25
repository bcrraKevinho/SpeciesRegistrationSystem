<select id="Division" name="Division" class="form-select" required
onchange="getLista('select/clase.php?IdDivision='+this.value, 'clasediv')" >
    <option value="" selected hidden>Selecciona una</option>
    <?php
    include("../bdconnect.php");
    $reino = $_GET["IdReino"];
    $sql = "select * from Division where Reino_IdReino=$reino order by Division";
    if ($result = mysqli_query($link, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<option value=$row[0]>$row[1]</option>";
        }
    }
    mysqli_close($link);
    ?>
</select>