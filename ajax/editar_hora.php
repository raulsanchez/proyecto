<?php
require '../funciones/conectar.php';
$hora = $_POST["sugerencia"];
$dia = $_POST['sugerencia2'];
$consulta_fecha=mysql_query("SELECT `dt_id`, `dt_fecha`, `dt_hora`, `dt_cupo`
							FROM `disponibilidad_turno`
							WHERE `dt_fecha`='".$dia."'
							AND dt_hora='".$hora."' ",$con);
while ($resultado_fecha=mysql_fetch_array($consulta_fecha)):
	?>
	 <div class="control-group">
		<label class="control-label" for="Hora"> </label>
		    <div class="controls">
		    	<input type="text" name="cupo"  value="<?php echo $resultado_fecha['dt_cupo'] ;?>">
		    </div>
	</div>
	<?php
endwhile;
?>
