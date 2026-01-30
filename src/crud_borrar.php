<?php



    include("funtions.php");
    include("validar_inicio_sesion.php");
    $conexion_db = new ConexionDB();


    

    $user_id = $_GET["Id"];



    $sql = "DELETE FROM users WHERE user_id = '$user_id'";

    $conexion_db->Prepare($sql);

    header("Location:crud_empleados.php");







?>