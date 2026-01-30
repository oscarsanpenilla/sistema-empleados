<?php
    include("funtions.php");
    include("employee.php");
    include("validar_inicio_sesion.php");

    $conexion_db = new ConexionDB();
    $employee = $_SESSION['employee']; 
    $user_id = $employee->user_id;

    $sql= "SELECT site_name FROM sites ORDER by site_name";
    $arreglo_lugares = $conexion_db->ConsultaArray($sql);
    $sql= "SELECT rate_hour FROM users WHERE user_id = '$user_id'";
    $arreglo_precio = $conexion_db->ConsultaArray($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/estilos.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <meta charset="UTF-8">
    <title>Sanvan Construction</title>
</head>
<body>
    <form action="insertar_eventos.php" method="post" >
        <?php echo "<h2> Trabajador: " . $employee->name . "</h2>"; ?>
        Site: <br>
        <select  name="lugar" required="required">
            <?php foreach($arreglo_lugares as $elemento): ?>
                    <option value="<?php echo $elemento->site_name;?>"> <?php echo $elemento->site_name;   ?>  </option> 
            <?php endforeach ?>
        </select><br><br>    
        Fecha: <br>
        <input type="date" name="fecha" required="required" value="<?php echo date("Y-m-d");?>"><br>
        Hora de Entrada: <br>
        <select name="entrada_horas" required="required">
            <?php for ($i=7; $i < 24; $i++) echo "<option value='$i'>$i</option>";   ?>
        </select>
        <select name="entrada_minutos" required="required">
            <?php
            echo "<option value='00'>00</option>"; 
            for ($i=10; $i < 60; $i=$i+10) echo "<option value='$i'>$i</option>";   
            ?>
       </select> 
        <br><br>
        Hora de Salida: <br>
        <select name="salida_horas" required="required">
            <?php for ($i=7; $i < 24; $i++) echo "<option value='$i'>$i</option>";   ?>
        </select>
        <select name="salida_minutos" required="required">
            <?php
            echo "<option value='00'>00</option>"; 
            for ($i=10; $i < 60; $i=$i+10) echo "<option value='$i'>$i</option>";   
            ?>
        </select> 
        <br><br>
        Comentarios: <br>
        <input type="text" name="comentario" ><br><br> 
        <input type="submit" name="enviar" value="Agregar">
        <a href="cerrar_session.php" class="logout"><input  type="button" value="Salir"></a>
    </form>
</body>
</html>







