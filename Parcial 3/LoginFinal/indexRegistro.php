<?php       

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname ="Web";


$conn = mysqli_connect($dbhost,$dbuser, $dbpass, $dbname);
if(!$conn)
{
    die("No hay conexion: ".mysqli_connect_error());
}

$nombre = $_POST["txtnombre"];
$usuario = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];


$query = mysqli_query($conn,"INSERT INTO usuarios (nombre_usuario, password, nombre_completo)
VALUES ('$usuario', '$pass', '$nombre')");
if(!$query)
{
    echo"<script>
                alert('No se registro');
                window.location= 'url.php'
    </script>";
}
else   {
    header("Location:login.html");
    echo"<script>
    Swal.fire({
        'Bienvenido!',
        'success'
     });
    </script>";
}

?>