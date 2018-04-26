<?php
    include("funtions.php");
    include("employee.php");
    include("eventos.php");
    include("validar_inicio_sesion.php");

    $conexion_db = new ConexionDB();

    $employee = $_SESSION['employee'];
    $user_id = $employee->user_id;
    $sql= "SELECT * FROM users WHERE user_id= '$user_id'";
    $consulta =  $conexion_db->ConsultaSQL($sql);

    $entrada_horas = $_POST['entrada_horas'];
    $entrada_minutos = $_POST['entrada_minutos'];
    $salida_horas = $_POST['salida_horas'];
    $salida_minutos = $_POST['salida_minutos'];
    $comentario = $_POST['comentario'];
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $check_in = Event::CreateHour($entrada_horas,$entrada_minutos);
    $check_out = Event::CreateHour($salida_horas,$salida_minutos);
    $event = new Event($employee,$check_in,$check_out,$comentario,$fecha,$lugar);
    
    $user=$employee->user;
    $user_name=$employee->name;
    $rate_hour=$employee->rate_hour;    
    $task=$employee->task;
    $payment_week=$employee->payment_week;
    $type_of_payment=$employee->type_of_payment;
    $horas_dia = Event::HoursDay($entrada_horas,$entrada_minutos,$salida_horas,$salida_minutos);
    $total_day = $horas_dia * $rate_hour;

    $sql= "INSERT INTO `events` (`date`, `site`, `check_in`, `check_out`,`hours_day`, `total_day`, `user_id`,`comentary`,`rate_hour`,`task`,`user_name`,`payment_week`,`type_of_payment`) VALUES ('$fecha', '$lugar', '$check_in', '$check_out', '$horas_dia', '$total_day','$user_id','$comentario','$rate_hour','$task','$user_name','$payment_week','$type_of_payment') ";
    
    $conexion_db->Prepare($sql);
    
    header("Location:insertar_eventos_crud.php");

?>