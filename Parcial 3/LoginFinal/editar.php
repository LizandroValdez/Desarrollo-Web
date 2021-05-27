<?php
if(isset($_GET['editar'])){
	$editar_id = $_GET['editar'];

	$consulta = "SELECT * FROM alumnos WHERE id = 'editar_id'";
	$ejecutar = mysqli_query($con, $consulta);

	$fila = mysqli_fetch_array($ejecutar);

	$nombre = $fila['nombre'];
	$edad = $fila['edad'];
	$especialidad = $fila['especialidad'];
}
?>
<br />
<form method="POST" action="">
<input type="text" name="txtnombre" placeholder="Nombre" value="<?php echo $nombre; ?>"><br />
<input type="text" name="txtedad"  placeholder="Edad" value="<?php echo $edad; ?>"><br />
<input type="text" name="txtEsp"  placeholder="Especialidad" value="<?php echo $especialidad; ?>"><br />
<input type="submiT" name="actualizar" value="ACTUALIZAR DATOS">
</form>

<?php
if (isset($_POST['actualizar'])){
$actualizar_nombre = $_POST['txtnombre'];
$actualizar_edad = $_POST['txtedad'];
$actualizar_especialidad = $_POST['txtEsp'];

$actualizar = "UPDATE alumnos SET nombre='$actualizar_nombre', edad='$actualizar_edad', especialidad='$actualizar_especialidad' WHERE id='$editar_id'";
$ejecutar = mysqli_query($con, $actualizar);

if ($ejecutar){
	echo "<script>alert('Datos Actualizados!')</script>";
	echo "<script>windoows.open('ABC.php','_self')</script>";
}
}
?>
