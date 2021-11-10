<?php
include_once 'conexion.php';
$result = mysqli_query($mysqli,"SELECT * FROM estudiante WHERE carnet='" . $_GET['newCarnet'] . "'");
$row= mysqli_fetch_array($result);

if (mysqli_num_rows($result) > 0) {
    echo json_encode(array("success"=>true, "message"=>"Este carnet ya existe"));
} else {
    echo json_encode(array("success"=>false, "message"=>"Este carnet no existe"));
}


?>