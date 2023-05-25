<select id="facultadE" name="facultadE" class="form-select" onchange="getLista('select/carrerasE.php?IdFacultad='+this.value, 'carreraEdiv')" required>
	<option value="" selected hidden>Selecciona una</option>
	<?php
	include("../bdconnect.php");

	$universidad = $_GET["IdUniversidad"];
	$sql = "select * from facultad where Universidad_IdUniversidad=$universidad order by facultad";
	if ($result = mysqli_query($link, $sql)) {
		while ($row = mysqli_fetch_array($result)) {
			echo "<option value=$row[0]>$row[1]</option>";
		}
	}

	mysqli_close($link);
	?>
</select>
<label class="form-label" for="facultadE">Facultad</label>