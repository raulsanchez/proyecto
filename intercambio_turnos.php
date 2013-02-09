<?php
session_start();
require 'funciones/conectar.php';
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
			<div id="span12">
				<h2 align="center">Intercambio de Turnos</h2>
			</div>
			<form class="form-horizontal" Method="POST" action="">
			<div class="span6">
				<br>
				<br>

					<div class="control-group">
				    <label class="control-label" for="rut1">Rut :</label>
				    <div class="controls">
				      <input type="text" id="rut1" name="rut1"placeholder="Ej: 11111111-1" >
				    </div>
				  	</div>
				  <div class="control-group">
				    <label class="control-label" for="dia1">Día :</label>
				     <div class="controls">
				      <input type="date" id="dia1" name="dia1" placeholder="Ej: 01-01-1990" onblur="Autocomplete1(dia1.value,rut1.value)">
				    </div>
				  </div>

				  <div class="control-group">
				    <label class="control-label" for="Hora">Hora :</label>
				    <div class="controls">
				      <select name="Hora1" id="Hora1">
				      	<option value="0">Seleccione</option>
				      	<optgroup labe="_________________________"></optgroup>
				      </select>
				    </div>
				  </div>

		</div>
		<div class="span6">
				<br>
				<br>
									<div class="control-group">
				    <label class="control-label" for="rut2">Rut :</label>
				    <div class="controls">
				      <input type="text" id="rut2" name="rut2"placeholder="Ej: 11111111-1" >
				    </div>
				  	</div>
				  <div class="control-group">
				    <label class="control-label" for="dia2">Día :</label>
				     <div class="controls">
				      <input type="date" id="dia2" name="dia2" placeholder="Ej: 01-01-1990" onblur="Autocomplete2(dia2.value,rut2.value)">
				    </div>
				  </div>

				  <div class="control-group">
				    <label class="control-label" for="Hora">Hora :</label>
				    <div class="controls">
				      <select name="Hora2" id="Hora2">
				      	<option value="0">Seleccione</option>
				      	<optgroup labe="_________________________"></optgroup>
				      	<option value="1">Desde las 09:00 am hasta las 12:30 pm</option>
				      	<option value="2">Desde las 12:30 pm hasta las 16:00 pm</option>
				      	<option value="3">Desde las 16:00 pm hasta las 19:30 pm</option>
				      	<option value="4">Desde las 19:30 pm hasta las 22:00 pm</option>
				      </select>
				    </div>
				  </div>
				  <div id="result">

				  </div>
				  <div id="result2">

				  </div>


		</div>

		<div id="span12">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>

		<div style="text-align: center">  <button type="submit" class="btn btn-primary" name="confirmar" >Confirmar</button></div>


		</div>
		</form>

	  	<hr>
		</div>
		<footer>
			<p align="center">&copy; Company 2012</p>
		</footer>
		<?php
		if(isset($_POST['confirmar'])):
			echo $rut1	= $_POST['rut1'];
			echo $dia1	= $_POST['dia1'];
			echo $hora1	= $_POST['Hora1'];
			echo $rut2	= $_POST['rut2'];
			echo $dia2	= $_POST['dia2'];
			echo $hora2	= $_POST['Hora2'];

			mysql_query("DELETE FROM `turno` WHERE `tu_Rut_Us`='".$rut1."' AND`tu_Hora`='".$hora1."' AND`tu_Fecha`='".$dia1."'",$con)or die (mysql_error());
			mysql_query("DELETE FROM `turno` WHERE `tu_Rut_Us`='".$rut2."' AND`tu_Hora`='".$hora2."' AND`tu_Fecha`='".$dia2."'",$con)or die (mysql_error());

			mysql_query("INSERT INTO `turno`(`tu_Rut_Us`, `tu_Hora`, `tu_Fecha`) VALUES ('".$rut1."','".$hora2."','".$dia2."')",$con) or die (mysql_error());

			mysql_query("INSERT INTO `turno`(`tu_Rut_Us`, `tu_Hora`, `tu_Fecha`) VALUES ('".$rut2."','".$hora1."','".$dia1."')",$con)or die (mysql_error());



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
		function Autocomplete1(param,param2){
			$("#Hora1").load("ajax/cambio_turno.php", {sugerencia: param,sugerencia2:param2});
		};
	</script>
	<script type="text/javascript">
		function Autocomplete2(param,param2){
			$("#Hora2").load("ajax/cambio_turno.php", {sugerencia: param,sugerencia2:param2});
		};
	</script>
</body>
</html>