<!DOCTYPE html> 
<meta charset="UTF-8">

<?php

use function PHPSTORM_META\type;

$con = mysqli_connect("localhost", "root","","Web") or die ("Error!"); //manda los parametros para la conexion (servidor, usuario, contraseña,bd)
?>

<html>
<head>
	<title>Aplicacion</title>
	</HEAD><H1><P ALIGN="CENTER"><FONT SIZE="7" COLOR="BLACK" FACE="arial black">Alumnos</H1><B><B></FONT> <B><B>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estiloMostrar.css">
	<center>
        <br>
            <?php  session_start(); //crea/inicia una sesión 
            echo "Bienvenido ".$_SESSION['nombre'];//Muestra el valor almacenado con un mensaje de la sesion iniciada
			?> <br><br>   
    </center>
</head>
<body BACKGROUND="fondo2.jpg">

<div class="capturar">
	<h3><p><FONT SIZE="4 " FACE="arial black">Registro de alumnos</FONT></p></h3> 
	<form method="POST" action="ABC.php">
		<label>Nombre:<br></label>
		<input type="text" name="nombre" placeholder = "Escriba su nombre:"><br />
		<label>Edad:</label>
		<input type="text" name="edad" placeholder = "Escriba su edad"><br />
		<label>Especialidad:<br> </label>
		<input type="text" name="esp" placeholder = "Escriba su especiaidad:"><br/>
		<br>
		<input type="submit" name="insert" value = "INSERTAR DATOS">
	</form>

</div>

<?php
	if(isset($_POST["insert"])) //Devuelve true si la variable existe y null en caso que no exista
	{
		//cada uno almacena el valor que se captura en los textbox
		$nombre = $_POST["nombre"]; 
		$edad = $_POST["edad"];
		$especialidad = $_POST["esp"];


		if(empty($nombre) or empty($edad) or empty($especialidad)){//checo que esten capturados los campos
			echo "<script> alert('No se agrego el alumno, capture todos los datos'); 
				</script>";
		}
		else
		{
			$insertar = "INSERT INTO alumnos (nombre,edad,especialidad) VALUES ('$nombre', '$edad', '$especialidad')"; //query que se ejecutara en la base de datos
			$ejecutar = mysqli_query($con, $insertar);//se manda la conexion y la sentencia que se ejecutara.
			if ($ejecutar){
				echo "<script> alert('Insertado Correctamente'); 
				window.location.href='ABC.php'; 
				</script>";
			}
		}
	}
?>
<br/>

<center><table width="500" border="2" style="background-color: #F9F9F9; " class="mostrar">
		<tr>
			<td>Id</td>
			<td>Nombre</td>
			<td>Edad</td>
			<td>Especialidad</td>
			<td>Editar</td>
			<td>Borrar</td>
		</tr></center>
	<?php
	$consulta = "SELECT * FROM alumnos"; //consulta para llenar la tabla
	$ejecutar = mysqli_query($con, $consulta); //se manda la conexion y el querya ejecutar
	while ( $fila = mysqli_fetch_array($ejecutar)) { //vacia los datos
		//va colocandolos por filas
		$id = $fila['id']; 
		$nombre = $fila['Nombre'];
		$edad = $fila['Edad'];
		$especialidad = $fila['Especialidad'];


	?>
	<tr align="center">
	<!-- imprimelos datos guardados-->
	<td><?php echo $id; ?></td> 
	<td><?php echo $nombre; ?></td>
	<td><?php echo $edad; ?></td>
	<td><?php echo $especialidad; ?></td>
	<!--mandan a llamar su respectivo metodo-->
	<td><a href="ABC.php?editar=<?php echo $id;?>">Editar</a></td>
	<td><a href="ABC.php?borrar=<?php echo $id;?>">Borrar</a></td>
	</tr>
	<?php } ?>
</table>
<!--Trae el archivo donde se realizan las operaciones para editar-->
<?php
if(isset($_GET['editar'])){ //Devuelve true si la variable existe, null en caso que no exista y en este caso traae el id
	include("editar.php"); //incluye la pagina que voy a usar para la mmodificacion del registro
}
?>

<?php
if(isset($_GET['borrar'])){//Devuelve true si la variable existe y null en caso que no exista
	$borrar_id = $_GET['borrar']; //almacena el id a borrar
	$borrar = "DELETE FROM alumnos WHERE id = '$borrar_id'"; //almaceno al consulta que enviare para borrar el registro
	$ejecutar = mysqli_query($con, $borrar); //mando la conexion y la consulta

	if ($ejecutar){
		//mensaje cuando se elimine
		echo "<script> 
		alert('Se elimino el alumno'); 
		window.location.href='ABC.php'; 
		</script>";
	}

}
?>
<br><br><br>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<a href="login.html"><button type="button">Cerrar sesión</button></a>
</body>
</html>
