<?php
session_start();
require 'funciones/conectar.php';
$rut=$_GET['rut'];
mysql_query("DELETE FROM `usuario` WHERE '".$rut."'",$con);
		echo "Sé elimino correctamente el usuario";
    	echo "<script type='text/javascript'>
        	 window.location='lista_usuario.php';
         	 </script>";

?>