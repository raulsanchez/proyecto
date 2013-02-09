<?php
require '../funciones/conectar.php';
$fecha = $_POST["sugerencia"];
$rut = $_POST["sugerencia2"];

$consulta_turno=mysql_query("SELECT `tu_id_Turno`, `tu_Rut_Us`, `tu_Hora`, `tu_Fecha`, `tu_Asistencia`, `tu_timesmap`, `Turnocol` FROM `turno` WHERE `tu_Rut_Us`='".$rut."' AND `tu_Fecha`='".$fecha."'",$con);
if(mysql_num_rows($consulta_turno)!=0):
	while ($respuesta_turno=mysql_fetch_array($consulta_turno)):
		switch ($respuesta_turno['tu_Hora']) {
			case '1':
				echo "<option value='1'>Desde las 09:00 am hasta las 12:30 pm</option>";
				break;
			case '2':
				echo "<option value='2'>Desde las 12:30 pm hasta las 16:00 pm</option>";
				break;
			case '3':
				echo "<option value='3'>Desde las 16:00 pm hasta las 19:30 pm</option>";
				break;
			case '4':
				echo "<option value='4'>Desde las 19:30 pm hasta las 22:00 pm</option>";
				break;
		}
	endwhile;
else:
	echo "<option value='0'>No tiene hora en esa fecha </option>";
endif;
?>
