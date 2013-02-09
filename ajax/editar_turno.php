<?php
require '../funciones/conectar.php';
$fecha = $_POST["sugerencia"];
echo "<option value='0'>Seleccione</option>";
$consulta_fecha=mysql_query("SELECT `dt_id`, `dt_fecha`, `dt_hora`, `dt_cupo`
							FROM `disponibilidad_turno`
							WHERE `dt_fecha`='".$fecha."'",$con);
while ($resultado_fecha=mysql_fetch_array($consulta_fecha)):
	switch ($resultado_fecha['dt_hora']) {
		case '1':
			echo "<option value=".$resultado_fecha['dt_id'].">Desde las 09:00 am hasta las 12:30 pm</option>";
			break;
		case '2':
			echo "<option value=".$resultado_fecha['dt_id'].">Desde las 12:30 pm hasta las 16:00 pm</option>";
			break;
		case '3':
			echo "<option value=".$resultado_fecha['dt_id'].">Desde las 16:00 pm hasta las 19:30 pm</option>";
			break;
		case '4':
			echo "<option value=".$resultado_fecha['dt_id'].">Desde las 19:30 pm hasta las 22:00 pm</option>";
			break;
	}
endwhile;
?>
