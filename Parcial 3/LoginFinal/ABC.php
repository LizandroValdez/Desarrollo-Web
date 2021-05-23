<!DOCTYPE html> 
<meta charset="UTF-8">

<?php 

$con = mysqli_connect("localhost", "root","","bd") or die ("Error!"); 

?>

<html>
<head>
	<title>Aplicacion</title>
	</HEAD><H1><P ALIGN="CENTER"><FONT SIZE="7" COLOR="BLACK" FACE="Tempus Sans ITC"> Alumnos ABC</H1><B><B></FONT> <B><B>
	<meta charset="utf-8">
</head>
<body BACKGROUND="fondo2.JPG">
 <form method="POST" action="ABC.php">
	 <label>Nombre:<br></label>
	 <input type="text" name="nombre" placeholder = "Escriba su nombre:"><br />
	 <label>Edad:<br></label>
	 <input type="text" name="edad" placeholder = "Escriba su edad"><br /><br>
	 <label>Especialidad:<br> </label>
	 <input type="text" name="esp" placeholder = "Escriba su especiaidad:"><br />
	 <input type="submit" name="insert" value = "INSERTAR DATOS">

 </form>

<?php
	if(isset($_POST["insert"])){
		$nombre = $_POST["nombre"];
		$edad = $_POST["edad"];
		$especialidad = $_POST["esp"];

		$insertar = "INSERT INTO alumnos (nombre,edad,especialidad) VALUES ('$nombre', '$edad', '$especialidad')";
		$ejecutar = mysqli_query($con, $insertar);

		if ($ejecutar){
			echo "<h3>Insertado Correctamente</h3>";
		}
	}
?>
<br/>
<center><table width="500" border="2" style="background-color: #F9F9F9; ">
		<tr>
			<td>Id</td>
			<td>Nombre</td>
			<td>Edad</td>
			<td>Especialidad</td>
			<td>Editar</td>
			<td>Borrar</td>
		</tr></center>
	<?php
	$consulta = "SELECT * FROM alumnos";
	$ejecutar = mysqli_query($con, $consulta);
	$i = 0;
	while ( $fila = mysqli_fetch_array($ejecutar)) {
		$id = $fila['id'];
		$nombre = $fila['Nombre'];
		$edad = $fila['Edad'];
		$especialidad = $fila['Especialidad'];


	?>
	<tr align="center">
	<td><?php echo $id; ?></td>
	<td><?php echo $nombre; ?></td>
	<td><?php echo $edad; ?></td>
	<td><?php echo $especialidad; ?></td>
	<td><a href="ABC.php?editar=<?php echo $id; ?>">Editar</a></td>
	<td><a href="ABC.php?borrar=<?php echo $id; ?>">Borrar</a></td>
	</tr>
	<?php } ?>
</table>

<?php
if(isset($_GET['editar'])){
	include("editar.php");
}
?>

<?php
if(isset($_GET['borrar'])){
	$borrar_id = $_GET['borrar'];
	$borrar = "DELETE FROM alumnos WHERE id = '$borrar_id'";
	$ejecutar = mysqli_query($con, $borrar);

	if ($ejecutar){
		echo "<script>alert('El alumno ha sido borrado!')</script>";
		echo "<script>windoows.open('ABC.php','_self')</script>";
	}

}
?>

</body>
</html>
