<?php
    include("../../funtions.php");
    include("../../validar_inicio_sesion_admin.php");
    $conexion_db = new ConexionDB();
    //$employee = $_SESSION['employee'];
    $name= $_POST["name"]; //
    $user= $_POST["user"]; //
    $password= $_POST["password"]; //
    $phone= $_POST["phone"]; //
    $bank_info= $_POST["bank_info"]; //


if ($_POST["hidden"] == "crud_formulario_actualizar" ) {

  $id = $_POST["id"];
  $work_for = $_POST["work_for"];//
  $employee_rate= $_POST["employee_rate"]; //
  $work_for_rate = $_POST["work_for_rate"]; //
  $pay_week= $_POST["pay_week"]; //
  $status= $_POST["status"]; //
  $ocupation= $_POST["ocupation"]; //
  $paid_by= $_POST["paid_by"]; //
  $fecha_inicio =  $_POST["fecha_inicio"];
  $fecha_fin =  $_POST["fecha_fin"];
  if (isset($_POST["date_checkbox"])) {
    $sql = "UPDATE events
            SET work_for='$work_for', employee_rate='$employee_rate',
                work_for_rate='$work_for_rate', pay_week='$pay_week',
                phone='$phone', paid_by='$paid_by', bank_info='$bank_info',
                ocupation='$ocupation'
            WHERE id = '$id' AND date BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    $conexion_db->Prepare($sql);
  }
    $sql = "UPDATE users
            SET work_for='$work_for', name='$name', user='$user', password='$password',
                employee_rate='$employee_rate', work_for_rate='$work_for_rate',
                pay_week='$pay_week', phone='$phone', ocupation='$ocupation',
                bank_info='$bank_info', active='$status', phone='$phone',
                paid_by='$paid_by', bank_info='$bank_info'
            WHERE id = '$id'";
    $conexion_db->Prepare($sql);
    header("Location:crud_empleados.php");

}
if ($_POST["hidden"] == "formulario_config") {
  //echo "dentro";
  $id = $_POST["id"]; //
  $sql = "UPDATE users
          SET name='$name', user='$user', password='$password',
              phone='$phone', bank_info='$bank_info', bank_info='$bank_info'
              WHERE id = '$id'";
  $conexion_db->Prepare($sql);
  header("Location:../../crud_eventos/insertar_eventos_crud.php");
}




?>
