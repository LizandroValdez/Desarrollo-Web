<?php       

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname ="Web";
$nombre ="";
$pass="";

$conn = mysqli_connect($dbhost,$dbuser, $dbpass, $dbname);
if(!$conn)
{
    die("No hay conexion: ".mysqli_connect_error());
}

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE nombre_usuario = '".$nombre."' AND password = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
    header("Location:ABC.php");
}
else if ($nr == 0)
{
    echo "No ingreso";
}

?>