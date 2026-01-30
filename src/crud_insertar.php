<?php



    include("funtions.php");
    include("validar_inicio_sesion.php");
    $conexion_db = new ConexionDB();


    $usuario = $_POST["usuario"];

    $contra = $_POST["contra"];

    $nombre = $_POST["nombre"];

    $precio_hora = $_POST["precio_hora"];

    $payment_week = $_POST["payment_week"];

    $status = $_POST["status"];

    $task = $_POST["task"];

    $type_of_payment = $_POST["type_of_payment"];

    $sql = "INSERT INTO users (user,password,name,rate_hour,payment_week,status,task,type_of_payment) VALUES('$usuario','$contra','$nombre','$precio_hora','$payment_week','$status','$task','$type_of_payment')";

    $conexion_db->Prepare($sql);

    header("Location:crud_empleados.php");







?>