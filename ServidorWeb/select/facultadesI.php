<select id="facultadI" name="facultadI" class="form-select" onchange="getLista('select/carrerasI.php?IdFacultad='+this.value, 'carreraIdiv')" required>
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
<label class="form-label" for="facultadI">Facultad</label>