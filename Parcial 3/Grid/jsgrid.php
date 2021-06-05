<?php

//fetch_data.php

$connect = new PDO("mysql:host=localhost;dbname=valdezgu","root","");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
    $data = array(
        ':nombre'=>"%". $_GET['Nombre']."%",
        ':edad'=>"%" . $_GET['Edad'] . "%",
        ':especialidad'=>"%" . $_GET['Especialidad'] . "%"
    );

    $query = "SELECT * FROM alumnos WHERE nombre LIKE :nombre AND edad LIKE :edad AND especialidad LIKE :especialidad ORDER BY id DESC" ;
    
    $statement = $connect->prepare($query);
    
    $statement->execute($data);
    $result = $statement->fetchAll();
    
    foreach($result as $row)
    {
        $output[] = array(
        'id'    => $row['id'],   
        'Nombre'  => $row['Nombre'],
        'Edad'  => $row['Edad'],
        'Especialidad'   => $row['Especialidad']
        );
        $row['Especialidad'];
        
    }
    header("Content-Type: application/json");
    echo json_encode($output);
}

if($method == "POST")
{
 $data = array(
  ':nombre'  => $_POST['Nombre'],
  ':edad'    => $_POST['Edad'],
  ':especialidad'  => $_POST['Especialidad']
 );

 $query = "INSERT INTO alumnos (Nombre, Edad, Especialidad) VALUES (:nombre, :edad, :especialidad)";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == 'PUT')
{
    parse_str(file_get_contents("php://input"), $_PUT);
    $data = array(
    ':id'   => $_PUT['id'],
    ':nombre' => $_PUT['Nombre'],
    ':edad' => $_PUT['Edad'],
    ':especialidad'   => $_PUT['Especialidad']);

    $query = "
    UPDATE alumnos 
    SET Nombre = :nombre, 
    Edad = :edad, 
    Especialidad = :especialidad
    ";
    
    $statement = $connect->prepare($query);
    $statement->execute($data);
}

if($method == "DELETE")
{
    parse_str(file_get_contents("php://input"), $_DELETE);
    $query = "DELETE FROM alumnos WHERE id = '".$_DELETE['id']."'";
    $statement = $connect->prepare($query);
    $statement->execute();
}

?>