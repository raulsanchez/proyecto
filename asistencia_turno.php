<?php
session_start();
require 'funciones/conectar.php';
$consulta_usuario = mysql_query("SELECT `us_Rut`, `us_Nombre`, `us_Apellido_Pat`, `us_Apellido_Mat`, `us_Fecha_Nac`, `us_Telefono`, `us_Direccion`, `us_Sexo`, `us_Tipo` FROM `usuario`",$con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bootstrap, from Twitter</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<style type="text/css">
		body { padding-top: 60px; padding-bottom: 40px; }
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php">Control Empaque</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li ><a href="index.php">Inicio</a></li>
						<?php if((!isset($_SESSION['adm_rut'])) && (!isset($_SESSION['us_rut']))): ?>
						<li><a href="login.php">Login</a></li>
						<?php else: ?>
						<?php if(isset($_SESSION['adm_rut'])): ?>
						<li class="dropdown">
							<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
    							Usuario
    							<b class="caret"></b>
  							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<li class="divider"></li>
							    <li><a href="ingreso_usuario.php" >Nuevo Usuarios</a></li>
							    <li class="divider"></li>
							    <li><a href="lista_usuario.php">Lista Usuarios</a></li>
							    <li class="divider"></li>
							</ul>
						</li>

						<li><a href="asistencia_turno.php">Asistencia Turno</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    							Administracion Turnos
    							<b class="caret"></b>
  							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<li class="divider"></li>
							    <li><a href="disponibilidad.php">Disponibilidad</a></li>
							    <li class="divider"></li>
							    <li><a href="edicion_disponibilidad_turno.php">Edicion</a></li>
							    <li class="divider"></li>
							    <li><a href="intercambio_turnos.php">Intercambio de Turnos</a></li>
							    <li class="divider"></li>
							 </ul>
						</li>
						<?php endif; ?>
						<?php if(isset($_SESSION['us_rut'])): ?>
						<li><a href="perfil.php?rut=<?php echo $_SESSION['us_rut'] ?>">Perfil</a></li>
						<li><a href="solicitud_turno.php">Solicitud Turnos</a></li>
						<li><a href="horario.php">Horario</a></li>
						<?php endif; ?>
						<li class="dropdown">
							<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    							Mensajes
    							<b class="caret"></b>
  							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<li class="divider"></li>
								<li><a href="mensaje.php"  >Escribir Mensajes</a></li>
								<li class="divider"></li>
							    <li><a href="lista_mensaje.php" >Lista de Mensajes</a></li>
							    <li class="divider"></li>
							</ul>
						</li>
						<li><a href="salir.php">Salir</a></li>
						<?php endif; ?>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<div class="container">
		<!-- Main hero unit for a primary marketing message or call to action -->
		<div class="hero-unit">
			<h1>Empaques Valdivia</h1>
		</div>
		<!-- Example row of columns -->
		<div class="row">
			<div class="span12">
				<form class="form-horizontal" method="POST" action="">
				 <div class="control-group">
				    <label class="control-label" for="dia">Día :</label>
				     <div class="controls">
				      <input type="date" id="dia" name="dia" placeholder="Ej: 01-01-1990" >
				    </div>
				  </div>

				  <div class="control-group">
				    <label class="control-label" for="Hora">Hora :</label>
				    <div class="controls">
				      <select name="Hora" id="Hora" onChange="Autocomplete(dia.value,Hora.value)">
				      	<option value="0">Seleccione</option>
				      	<optgroup labe="_________________________"></optgroup>
				      	<option value="1">Desde las 09:00 am hasta las 12:30 pm</option>
				      	<option value="2">Desde las 12:30 pm hasta las 16:00 pm</option>
				      	<option value="3">Desde las 16:00 pm hasta las 19:30 pm</option>
				      	<option value="4">Desde las 19:30 pm hasta las 22:00 pm</option>
				      </select>
				    </div>
				  </div>
				  <div id="respuesta">


				  </div>
				  <div class="control-group">
				    <div class="controls">
				      <button  type="submit" class="btn btn-primary" name="ingreso">Ingreso Asistencia</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>

	  	<hr>
		<footer>
			<p>&copy; Company 2012</p>
		</footer>
		<?php
		if(isset($_POST['ingreso'])):
			$dia	= $_POST['dia'];
			$hora	= $_POST['Hora'];
			$asistencia	= $_POST['asistencia'];
			$lista_curso=implode(',', array_keys($asistencia));
			$array_cursos=explode(',', $lista_curso);
			foreach ($array_cursos as $rut ) {
				$rut;
				mysql_query("UPDATE `turno`
							 SET `tu_Asistencia`='1'
							 WHERE `tu_Rut_Us`='".$rut."'
							 AND `tu_Fecha`='".$dia."'
							 AND `tu_Hora`='".$hora."'",$con);

			}
			$consulta_numero=mysql_query("SELECT `tu_Rut_Us` FROM `turno`
								WHERE `tu_Hora`='".$hora."' AND `tu_Fecha`='".$dia."' AND tu_Asistencia='0' ",$con);
			$hora." ";
			$dia;
			mysql_num_rows($consulta_numero);
			while($datos_sancion=mysql_fetch_array($consulta_numero)):
				$datos_sancion[0];
				mysql_query("INSERT INTO `suspencion`(`su_Rut_Us`, `su_Desde`, `su_Hasta`)
								VALUES ('".$datos_sancion['tu_Rut_Us']."',Curdate(),DATE_ADD(CURDATE(), INTERVAL 7 DAY))",$con) or die (mysql_error());
			endwhile;
		endif;
		 ?>
	</div> <!-- /container -->

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="http://code.jquery.com/jquery.min.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-transition.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-alert.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-modal.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-dropdown.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-scrollspy.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-tab.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-tooltip.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-popover.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-button.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-collapse.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-carousel.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-typeahead.js"></script>
	<script type="text/javascript">
		$('.dropdown-toggle').dropdown()
	</script>
	<script type="text/javascript">
		function Autocomplete(param,param2){
			$("#respuesta").load("ajax/asistencia.php", {sugerencia: param,sugerencia2:param2});
		};
	</script>
</body>
</html>