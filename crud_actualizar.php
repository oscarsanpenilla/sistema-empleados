<?php



    include("funtions.php");
    include("validar_inicio_sesion.php");
    $conexion_db = new ConexionDB();
    

    $user_id = $_POST["id"];

    $name= $_POST["nombre"];

    $user= $_POST["usuario"];

    $password= $_POST["contra"];

    $rate_hour= $_POST["rate_hour"];

    $payment_week= $_POST["payment_week"];

    $status= $_POST["status"];

    $task= $_POST["task"];

    $type_of_payment= $_POST["type_of_payment"];





    $sql = "UPDATE users SET name='$name', user='$user', password='$password', rate_hour='$rate_hour', payment_week='$payment_week', status='$status', task='$task', type_of_payment= '$type_of_payment' WHERE user_id = '$user_id'";

    $conexion_db->Prepare($sql);

    
    header("Location:crud_empleados.php");





?>