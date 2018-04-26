<?php



    
    include("funtions.php");
    include("employee.php");
    include("validar_inicio_sesion.php");
    

    $conexion_db = new ConexionDB();

    
    $employee = $_SESSION['employee'];
    $user_id = $_SESSION['employee']->user_id;

    $start_date = date("Y-m-d",strtotime('-30 day'));

    $end_date = date("Y-m-d",strtotime('+15 day'));



    $sql = " SELECT * FROM events WHERE user_id=$user_id AND date BETWEEN '$start_date' AND '$end_date' ORDER BY date";

    
    $array_eventos = $conexion_db->ConsultaArray($sql);



?>









<!doctype html>

<html lang="es">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1">

<title>Sanvan Contracting</title>

<link rel="stylesheet" href="css/estilos.css">





</head>



<body>

<form action="">    

    <section>

    <center>

      <!-- Imprime el nombre del trabajador -->
      <?php echo "<h2> Bienvenido: " . $employee->name . "</h2>"; ?>


       <a href="registro_horas.php"><input  type='button' value='Nuevo Registro'></a>

   

  <table width="80%" align="center">

    
    <tr >

      <td colspan="8" width="100%" class="primera_fila">Registros</td>

    </tr> 

   <tr>
     
     <td>Fecha </td>

            <td>Site </td>

            <td>Entrada</td>

            <td>Salida</td>

            <td>Total Horas </td>

            <td>$/hra </td>

            <td>$/día</td>

            <td></td>
   </tr>
            
            

            


	<?php foreach($array_eventos as $elemento): ?>	

   	<tr>
            
            
            

            <td> <?php echo date_format(date_create($elemento->date),"d/D/M") ?></td>

            <td> <?php echo $elemento->site ?></td>

            <td><?php echo $elemento->check_in ?></td>

            <td> <?php echo $elemento->check_out ?></td>

            <td> <?php echo $elemento->hours_day ?></td>

            <td> <?php echo $elemento->rate_hour ?></td>

            <td> <?php echo $elemento->total_day ?></td>

            

            

        

      <td width="100px"><a  href="crud_borrar_evento.php?num=<?php echo $elemento->event_id ?>"><input type='button' name='borrar' id='id_empleado' value='Delete'></td></a>

      

      

      

    </tr>

    <?php endforeach ?>

        

	

     

        

  </table>
  </center>
  <center>

        <a href="cerrar_session.php"><input id="logout" type='button' value='Salir'></a>

        <a href="formulario_cambiar_contra.php"><input type='button' value='Cambiar Contraseña'></a>

    </center>

   </section>

    



</body>

</html>