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
				<h2 align="center">Mensajes</h2>
				<br>
				<div class="span2">
			</div>
			<div class="span8">
				<form class="form-horizontal" method="POST" action="">

				  <div class="control-group">
				    <label class="control-label" for="asunto">Asunto :</label>
				    <div class="controls">
				      <input type="text" class="span5" id="asunto" name="asunto" placeholder="Ej: Asunto">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="mensaje"></label>
				    <div class="controls">
				    	<textarea name="mensaje" id="mensaje" rows=""></textarea>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="Tipo">Para :</label>
				    <div class="controls">
				      <select id="Tipo" name="tipo">
				      	<option value="0">Seleccione</option>
				      	<optgroup labe="_________________________"></optgroup>
				      	<option value="1">Todos</option>
				      	<option value="2">Empaque</option>
				      	<option value="3">Supervisor</option>
				      </select>
				    </div>
				  </div>
				<div id="span12">
					<br>
					<div style="text-align: center">  <button type="submit" class="btn btn-primary" name="ingreso" >Confirmar</button></div>
				</div>
				</form>
			</div>
				<div class="span3">
			</div>
		</div>

	  	<hr>
		</div>
		<footer>
			<br>
			<br>
			<p align="center">&copy; Company 2012</p>
		</footer>
		<?php

		if(isset($_POST['ingreso'])):
			$asunto     =	$_POST['asunto'];
			$mensaje    =   $_POST['mensaje'];
			$tipo       =   $_POST['tipo'];
			$consulta_id=mysql_query("SELECT  `co_id_mensaje`
						FROM  `mensaje`
						ORDER BY  `mensaje`.`co_id_mensaje` DESC
						LIMIT 0 , 1",$con);
			$respuesta_id=mysql_fetch_array($consulta_id);
			$id=$respuesta_id['co_id_mensaje']+1;
			mysql_query("INSERT INTO `mensaje`(`co_mensaje`, `co_asunto`)
							VALUES ('".$mensaje."','".$asunto."')",$con);
			if($tipo=='1'):
		    $mensaje_todo=mysql_query("SELECT `us_Rut` FROM `usuario`",$con) or die (msql_error());
				while($resultado_todo=(mysql_fetch_array($mensaje_todo))):
					mysql_query("INSERT INTO `mensaje_usuario`( `mu_id_msj`, `mu_Rut_Us`)
								VALUES ('".$id."','".$resultado_todo['us_Rut']."')",$con) or die (msql_error());
				endwhile;
			elseif($tipo=='2'):
			$mensaje_emp=mysql_query("SELECT `us_Rut` FROM `usuario` WHERE `us_Tipo` = '0'",$con);
				while($resultado_empaque=(mysql_fetch_array($mensaje_emp))):
					mysql_query("INSERT INTO `mensaje_usuario`( `mu_id_msj`, `mu_Rut_Us`)
								VALUES ('".$id."','".$resultado_empaque['us_Rut']."')",$con);
				endwhile;
			elseif($tipo=='3'):
			$mensaje_sup=mysql_query("SELECT `us_Rut` FROM `usuario` WHERE `us_Tipo`= '1'",$con);
				while($resultado_supervisor=(mysql_fetch_array($mensaje_sup))):
					mysql_query("INSERT INTO `mensaje_usuario`( `mu_id_msj`, `mu_Rut_Us`)
								VALUES ('".$id."','".$resultado_supervisor['us_Rut']."')",$con);
				endwhile;
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
</body>
</html>