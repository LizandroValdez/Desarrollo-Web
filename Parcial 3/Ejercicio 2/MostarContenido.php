<!DOCTYPE html> 
<meta charset="UTF-8">

<?php 
$con = mysqli_connect("localhost", "root","","ValdezGu") or die ("Error!"); //Conexion con la BD 
?>

<html>
<head>
	<title>Alumnos</title>
	</HEAD><H1><P ALIGN="CENTER"><FONT SIZE="7" COLOR="BLACK" FACE="Arial black"> Alumnos</H1><B><B></FONT> <B><B>
	<meta charset="utf-8">
</head>
<body BACKGROUND="fondo2.jpg">

<br/>
<center><table width="500" border="2" style="background-color: #F9F9F9; ">
	<thead >	
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Edad</th>
			<th>Especialidad</th>
		</tr>
	</thead>
</center>
	<?php
	$consulta = "SELECT * FROM alumnos"; //Se almacena la consulta que se envia a la bd
	$ejecutar = mysqli_query($con, $consulta); //Se manda la conexion, la consulta y se almacena en $ejecutar
	
	while ( $fila = mysqli_fetch_array($ejecutar)) { //trae fila y despues vacia los registros 
		$id = $fila['id']; //se asigna el indice de el registro en este caso 0, pero gracias a la funcion
		$nombre = $fila['Nombre'];  //"mysqli_fetch_array" se puede usar el nombre de la columna
		$edad = $fila['Edad'];
		$especialidad = $fila['Especialidad'];
	?>
	<tr align="center">
	<td><?php echo $id; ?></td> <!-- Pone el valor de lo que trajo del primer registro con indice de id y asi sucesivamente-->
	<td><?php echo $nombre; ?></td>
	<td><?php echo $edad; ?></td>
	<td><?php echo $especialidad; ?></td>
	</tr>
	<?php } ?>
</table>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</body>
</html>
