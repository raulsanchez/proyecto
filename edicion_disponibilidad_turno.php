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
			<div class="span12">
				<h2 align="center">Edicion disponibilidad de Turnos</h2>
				<br>
			</div>
			<div class="span3">
			</div>
			<div class="span6">
				<form class="form-horizontal" Method="POST" action="">
				  <div class="control-group">
				    <label class="control-label" for="dia">Día :</label>
				     <div class="controls">
				      <input type="date" name="dia" id="dia" placeholder="Ej: 01-01-1990" onblur="Autocomplete(this.value)">
				    </div>
				  </div>

				  <div class="control-group">
				    <label class="control-label" for="Hora">Hora :</label>
				    <div class="controls">
				      <select name="Hora" id="Hora" OnChange="Autocomplete2(Hora.value,dia.value)">
				      	<option value="0">Seleccione</option>
				      </select>
				    </div>
				  </div>

				  <div id="respuesta"></div>
				 <div style="text-align: center">
				 	<button type="submit" class="btn btn-primary" name="confirmar" >Confirmar</button>
				 </div>
				</form>
			</div>


			<div class="span3">
			</div>
	  	<hr>
		</div>
		<footer>
			<p>&copy; Company 2012</p>
		</footer>
		<?php
		if(isset($_POST['confirmar'])):
			$dia	=$_POST['dia'];
			$hora	=$_POST['Hora'];
			$cupo	=$_POST['cupo'];
			if(mysql_query("UPDATE `disponibilidad_turno` SET `dt_cupo`='".$cupo."' WHERE `dt_id` = '".$hora."'")):
				echo "se actualizó correctamente";
			else:
				echo "error en actualizacion";
			endif;
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
		function Autocomplete(param){
			$("#Hora").load("ajax/editar_turno.php", {sugerencia: param});
		};
	</script>
	<script type="text/javascript">
		function Autocomplete2(param,param2){
			$("#respuesta").load("ajax/editar_hora.php", {sugerencia: param,sugerencia2:param2});
		};
	</script>

</body>
</html>