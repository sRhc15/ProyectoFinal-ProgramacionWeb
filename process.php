<?php
//include_once 'conexion.php';

// Read POST data
$data = json_decode(file_get_contents("php://input"));
$conn = mysqli_connect("localhost","root","","programacionweb");

if (isset($data)) {

    $carnet = $data->carnet;
    $nombre = $data->nombre;
    $fecha = $data->fecha;
    $contrasena = $data->contrasena;
    $type = $data->type; //Tipo de operacion

    //INSERT ESTUDIANTE
    if ($type == 11) {

        $sql = "INSERT INTO estudiante (carnet, nombre, fecha, contrasena)
	 VALUES ($carnet, '$nombre', TO_DATE('$fecha'),'$contrasena')";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("success"=>true, "message"=>"Estudiante creado con éxito."));
        } else {
            echo json_encode(array("success"=>false, "message"=>"Error: " . $sql . " " . mysqli_error($conn)));
        }
        mysqli_close($conn);
    } 
}
?>