<?php       

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname ="valdezgu";


$conn = mysqli_connect($dbhost,$dbuser, $dbpass, $dbname);
if(!$conn)
{
    die("No hay conexion: ".mysqli_connect_error());
}

$nombre = $_POST["txtnombre"];
$usuario = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];


    if(empty($nombre) or empty($usuario) or empty($pass))
    {
        echo "<script> 
        alert('No se pudo registrar, llene todos los campos'); 
        window.location.href='Registro.html'; 
        </script>";
    }
    else{
        $pass_hash=password_hash($pass,PASSWORD_DEFAULT,['cost'=>10]);/*indica que quiero encriptar una contraseña (contraseña, elige el metodo que crea mas seguro para encriptar,  numero de veces que se aplica el algoritmo sobre el resultado) */
        $query=mysqli_query($conn,"INSERT INTO usuarios (nombre_usuario, password, nombre_completo)
        VALUES ('$usuario', '$pass_hash', '$nombre')");
        if(!$query)
        {
            echo "<script> 
                alert('No se pudo registrar, verifique su conexion con la base de datos o ese usuario no esta disponible); 
                window.location.href='Registro.html'; 
            </script>";
        }
        else   {
            echo "<script> 
                alert('Registro exitoso'); 
                window.location.href='login.html'; 
            </script>";
        }   
        
    }
?>