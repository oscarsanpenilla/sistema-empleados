<?php

    

    include("funtions.php");
    include("validar_inicio_sesion.php");
    $conexion_db = new ConexionDB();


    $user_id = $_GET["Id"];



    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";

    $arreglo_usuarios = $conexion_db->ConsultaArray($sql);


    foreach($arreglo_usuarios as $elemento){

        $nombre = $elemento->name;

        $usuario = $elemento->user;

        $contra = $elemento->password;

        $precio_hora = $elemento->rate_hour;

    }



    

?>









<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/estilos_main.css">

    <title>Sanvan Update Worker</title>

</head>

<body>

    

    

    

    <form action="crud_actualizar.php" method="post" >

        <h2>Modify</h2>    

        <h3>Name:</h3>

        <input type="text" name="nombre" value="<?php echo $elemento->name?>">

        <h3>User:</h3>

        <input type="text" name="usuario" value="<?php echo $elemento->user ?>" >

        <h3>Password:</h3>

        <input type="text" name="contra" value="<?php echo $elemento->password ?>" >

        <h3>Price for each hour:</h3>

        <input type="text" name="rate_hour" value="<?php echo $elemento->rate_hour ?>" >

        <h3>Week of Payment:</h3>

        <input type="text" name="payment_week" value="<?php echo $elemento->payment_week ?>" >

        <h3>Status:</h3>

        <input type="text" name="status" value="<?php echo $elemento->status?>" >

        <h3>Task:</h3>

        <input type="text" name="task" value="<?php echo $elemento->task?>" >

        <h3>Type of Payment:</h3>

        <input type="text" name="type_of_payment" value="<?php echo $elemento->type_of_payment ?>" >


        <input type="hidden" name="id" value="<?php echo $user_id ?>">

      



      <br>

       

        

        <input type="submit"  value="enviar"><br>

        

        <a href="crud_empleados.php"><input  type="button" value="Return"></a>

        <!--<h2><a href="cerrar_session.php"> Log out</a></h2>-->

        

    </form>

</body>

</html>