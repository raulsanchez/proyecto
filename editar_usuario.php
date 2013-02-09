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
	<?php
		$rut=$_GET['rut'];
		$edicion=mysql_query("SELECT `us_Rut`, `us_Nombre`, `us_Apellido_Pat`,
									`us_Apellido_Mat`, `us_Fecha_Nac`, `us_Telefono`,
									 `us_Direccion`, `us_Sexo`, `us_Tipo`, us_Clave
							 FROM `usuario`
							 WHERE `us_Rut`='".$rut."'",$con) or die (mysql_error());


		$resultado=mysql_fetch_array($edicion);
	 ?>

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
				<hr>
			<div class="span3">
			</div>
			<div class="span6">
				<h2 align="center">Editar Datos Usuario</h2>
				<br>
				<br>
				<br>
				<form class="form-horizontal" method="POST" action="">
				  <div class="control-group">
				    <label class="control-label" for="rut">Rut :</label>
				    <div class="controls">
				      <input class="uneditable-input"type="text" id="rut" name="rut" readonly="readonly" value="<?php echo $resultado['us_Rut'] ?>">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="Nombre">Nombre :</label>
				    <div class="controls">
				      <input type="text" id="Nombre" name="nombre" value="<?php echo $resultado['us_Nombre'] ?>" >
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="A_paterno">Apellido Paterno :</label>
				    <div class="controls">
				      <input type="text" id="A_paterno" name="apaterno" value="<?php echo $resultado['us_Apellido_Pat'] ?>" >
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="A_materno">Apellido Materno :</label>
				    <div class="controls">
				      <input type="text" id="A_materno" name="amaterno" value="<?php echo $resultado['us_Apellido_Mat'] ?>" >
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="F_nac">Fecha Nacimiento :</label>
				     <div class="controls">
				      <input type="date" id="F_nac" name="f_nacimiento" value="<?php echo $resultado['us_Fecha_Nac'] ?>" >
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="telf">Telefono :</label>
				    <div class="controls">
				      <input type="tel" id="telf" name="telefono" value="<?php echo $resultado['us_Telefono'] ?>" >
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="direccion">Direccion :</label>
				    <div class="controls">
				      <input type="text" id="direccion" name="direccion" value="<?php echo $resultado['us_Direccion'] ?>">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="Sexo">Sexo :</label>
				    <div class="controls">
				      <select id="Sexo" name="sexo" >
				      	<?php
				      	if($resultado['us_Sexo']==0):
				      		?>
				      		<option value="0">Hombre</option>
				      	<?php
				      	else:
				      		?>
				      		<option value="1">Mujer</option>
				      	<?php endif; ?>
				      	<?php
				      	if($resultado['us_Sexo']==1):
				      		?>
				      		<option value="0">Hombre</option>
				      	<?php
				      	else:
				      		?>
				      		<option value="1">Mujer</option>
				      	<?php
				      	endif; ?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="Tipo">Tipo :</label>
				    <div class="controls">
				      <select id="Tipo" name="tipo">
				      	<?php
				      	if($resultado['us_Tipo']==0):
				      		?>
				      		<option value="0">Empaque</option>
				      	<?php
				      	else:
				      		?>
				      		<option value="1">Supervisor</option>
				      	<?php endif; ?>
				      	<?php
				      	if($resultado['us_Tipo']==1):
				      		?>
				      		<option value="0">Empaque</option>
				      	<?php
				      	else:
				      		?>
				      		<option value="1">Supervisor</option>
				      	<?php
				      	endif; ?> value="1">Supervisor</option>
				      </select>
				    </div>
				  </div>
				  <?php
				  if(isset($_SESSION['us_rut'])):
				  	?>
				  <div class="control-group">
				    <label class="control-label" for="clave">Contraseña :</label>
				    <div class="controls">
				      <input type="password" id="clave" name="clave" value="<?php echo $resultado['us_Clave'] ?>">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="con_clave">Confirmar Contraseña :</label>
				    <div class="controls">
				      <input type="password" id="con_clave" name="con_clave" value="<?php echo $resultado['us_Clave'] ?>" onBlur="compara()">
				    </div>
				  </div>
				<?php
				  endif;
				  ?>
				  <div class="control-group">
				    <div class="controls">
				      <button  type="submit" class="btn btn-primary" name="ingreso">Editar</button>
				    </div>
				  </div>
				</form>
		</div>
		<div class="span3">
			</div>
	  	<hr>
		</div>
		<div>

		</div>
		<footer>
			<br>
			<br>
			<p align="center">&copy; Company 2012</p>
		</footer>


		<?php
		if(isset($_POST['ingreso'])):
			$rut			=$_POST['rut'];
			$nombre			=$_POST['nombre'];
			$apaterno		=$_POST['apaterno'];
			$amaterno		=$_POST['amaterno'];
			$f_nacimiento	=$_POST['f_nacimiento'];
			$telefono		=$_POST['telefono'];
			$direccion		=$_POST['direccion'];
			$sexo			=$_POST['sexo'];
			$tipo			=$_POST['tipo'];

			if(isset($_POST['clave'])):
			$clave			=$_POST['clave'];

			$consulta=mysql_query("UPDATE `usuario`
						SET
								`us_Nombre`='".$nombre."',
								`us_Apellido_Pat`='".$apaterno."',
								`us_Apellido_Mat`='".$amaterno."',
								`us_Fecha_Nac`='".$f_nacimiento."',
								`us_Telefono`='".$telefono."',
								`us_Direccion`='".$direccion."',
								`us_Sexo`='".$sexo."',
								`us_Tipo`='".$tipo."',
								us_Clave='".$clave."'
						WHERE `us_Rut`='".$rut."'",$con) or die(mysql_error());
			else:

			$consulta=mysql_query("UPDATE `usuario`
						SET
								`us_Nombre`='".$nombre."',
								`us_Apellido_Pat`='".$apaterno."',
								`us_Apellido_Mat`='".$amaterno."',
								`us_Fecha_Nac`='".$f_nacimiento."',
								`us_Telefono`='".$telefono."',
								`us_Direccion`='".$direccion."',
								`us_Sexo`='".$sexo."',
								`us_Tipo`='".$tipo."'
						WHERE `us_Rut`='".$rut."'",$con) or die(mysql_error());

			endif;
			?>
				<script type="text/javascript">
					window.location='perfil.php?rut=<?php echo $rut ?>';
				</script>
			<?php
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
		function compara(){
			if($('#con_clave').val() != $('#clave').val()){
				alert("las contraseñas no coinciden");
			}
			if($('#clave').val()==""){
				alert("La contraseña no puede ser vacia");
			}
		}
	</script>
</body>
</html>