<?php       

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname ="web";
$pass_bd="";
$usuario="";
$pass="";



$conn = mysqli_connect($dbhost,$dbuser, $dbpass, $dbname);
if(!$conn)
{
    die("No hay conexion: ".mysqli_connect_error());
}

$usuario = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE nombre_usuario = '".$usuario."'");
$registro_bd = mysqli_fetch_assoc($query);
$pass_login = $registro_bd['password'];

if(password_verify($pass,$pass_login))
{
    $nombre = $registro_bd['nombre_completo'];
    session_start();
    $_SESSION['nombre']=$nombre;
    header("Location:ABC.php");
}
else{
    echo "<script> 
    alert('Contraseña o usuario incorrectos'); 
    window.location.href='login.html'; 
    </script>";
}




?>


