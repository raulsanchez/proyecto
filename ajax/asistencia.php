<?php
require '../funciones/conectar.php';
$fecha = $_POST["sugerencia"];
$hora = $_POST["sugerencia2"];
$consulta_asistencia=mysql_query("SELECT `tu_Rut_Us`,us_Nombre,us_Apellido_Pat,us_Apellido_Mat FROM `turno`
								INNER JOIN usuario ON tu_Rut_Us=us_Rut
								WHERE `tu_Hora`='".$hora."' AND `tu_Fecha`='".$fecha."'",$con);

?>
<table class="table table-striped table-hover ">
	<th>#</th>
	<th>Nombre</th>
	<th>Asistencia</th>
	<?php $num=0; ?>
	<?php while($respuesta_usuario=mysql_fetch_array($consulta_asistencia)): ?>
	<tr>
		<td><?php echo $num=$num+1; ?> </td>
		<td><?php echo $respuesta_usuario['us_Nombre']." ".$respuesta_usuario['us_Apellido_Pat']." ".$respuesta_usuario['us_Apellido_Mat']?></td>
		<td>
			<input type="checkbox" name="asistencia[<?php echo $respuesta_usuario['tu_Rut_Us'] ?>]" id="asistencia">
		</td>
	</tr>
	<?php endwhile; ?>
</table>
