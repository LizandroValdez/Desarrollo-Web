<link rel="stylesheet" type="text/css" href="estiloMostrar.css">
<div class="editar">
	<?php
	if(isset($_GET['editar'])){
		$editar_id = $_GET['editar'];//trae el id

		$consulta = "SELECT * FROM alumnos WHERE id = 'editar_id'"; //consulta a ejecutar
		$ejecutar = mysqli_query($con, $consulta); 

		$fila = mysqli_fetch_array($ejecutar); //se almacena el registro
		//se saca cada uno de los datos del registro
		$nombre = $fila['nombre'];
		$edad = $fila['edad'];
		$especialidad = $fila['especialidad'];
	}
	?>
	<br />

	<?php  
		echo "Editando el registro con el id ".$editar_id;//Muestra el id del registro que se esta editando
	?><br>
	<input type="text" name="txtnombre" placeholder="Nombre" ><br />
	<input type="text" name="txtedad"  placeholder="Edad" ><br />
	<input type="text" name="txtEsp"  placeholder="Especialidad"><br/><br>
	<input type="submiT" name="actualizar" value="ACTUALIZAR DATOS">
	</form>
</div>
<?php
if (isset($_POST['actualizar'])){
$actualizar_nombre = $_POST['txtnombre'];
$actualizar_edad = $_POST['txtedad'];
$actualizar_especialidad = $_POST['txtEsp'];

$actualizar = "UPDATE alumnos SET nombre='$actualizar_nombre', edad='$actualizar_edad', especialidad='$actualizar_especialidad' WHERE id='$editar_id'";
$ejecutar = mysqli_query($con, $actualizar);

if ($ejecutar){
	echo "<script> 
	alert('Datos Actualizados!'); 
	window.location.href='ABC.php'; 
	</script>";
}
}
?>

