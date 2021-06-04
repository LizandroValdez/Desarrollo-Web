<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">	
    <title>Bienvenido</title>
</head>
<body>
    <form method="post">
        <center>
        <br>
        <h1>Bienvenido</h1><br>
            <?php  session_start(); 
            echo "Hola ".$_SESSION['nombre'];?> <br><br>

        <a href="login.html"><button type="button">Cerrar sesión</button></a>
     
        </center>
    </form>
</body>
</html>