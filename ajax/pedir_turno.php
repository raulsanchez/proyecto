<?php
require '../funciones/conectar.php';
$fecha = $_POST["sugerencia"];
echo "<option value='0'>Seleccione</option>";
for ($i=1; $i <= 4 ; $i++):
	$consulta_disponibilidad=mysql_query("SELECT COUNT( `tu_Rut_Us` ) , `tu_Hora` , `tu_Fecha` , `tu_Asistencia` , `tu_timesmap` , `Turnocol`
			FROM `turno`
			INNER JOIN disponibilidad_turno ON tu_Fecha = dt_fecha AND tu_Hora = dt_hora
			WHERE tu_Fecha = '".$fecha."' AND tu_Hora='".$i."'",$con);
	$consulta_cupo=mysql_query("SELECT `dt_fecha`, `dt_hora`, `dt_cupo`
		FROM `disponibilidad_turno`
		WHERE dt_fecha='".$fecha."' AND dt_hora='".$i."' ",$con);
	$respuesta_cupo=mysql_fetch_array($consulta_cupo);

	while ($numeros_disponibilidad=mysql_fetch_array($consulta_disponibilidad)):
		switch ($numeros_disponibilidad['tu_Hora']) {
			case '1':
					if($numeros_disponibilidad['0']<$respuesta_cupo['dt_cupo']):
						echo "<option value='".$numeros_disponibilidad['tu_Hora']."'>Desde las 09:00 am hasta las 12:30 pm</option>";
					endif;
				break;
			case '2':
					if($numeros_disponibilidad['0']<$respuesta_cupo['dt_cupo']):
						echo "<option value='".$numeros_disponibilidad['tu_Hora']."'>Desde las 12:30 pm hasta las 16:00 pm</option>";
					endif;
				break;
			case '3':
					if($numeros_disponibilidad['0']<$respuesta_cupo['dt_cupo']):
						echo "<option value='".$numeros_disponibilidad['tu_Hora']."'>Desde las 16:00 pm hasta las 19:30 pm</option>";
					endif;
				break;
			case '4':
					if($numeros_disponibilidad['0']<$respuesta_cupo['dt_cupo']):
						echo "<option value='".$numeros_disponibilidad['tu_Hora']."'>Desde las 19:30 pm hasta las 22:00 pm</option>";
					endif;
				break;
		}
	endwhile;
endfor;

?>
