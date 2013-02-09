<?php
	$con= mysql_connect("localhost", "root", "252571") or die("problema en la coneccion ->" . mysql_error());
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db('proyecto') or die("problema con la seleccion de la base de datos ->" . mysql_error());


function cambiarfecha_mysql($fecha){
	list($dia,$mes,$ano)=explode("-",$fecha);
		$fecha="$ano-$mes-$dia";
	return $fecha;
}
function cambiarfecha_espanol($fecha){
	list($ano,$mes,$dia)=explode("-",$fecha);
		$fecha="$dia-$mes-$ano";
	return $fecha;
}

function mysql_fechaentera($date) {
    $dia = explode("-", $date, 3);
    $year = $dia[0];
    $month = (string)(int)$dia[1];
    $day = (string)(int)$dia[2];

    $dias = array("domingo","lunes","martes","mi&eacute;rcoles" ,"jueves","viernes","s&aacute;bado");
    $tomadia = $dias[intval((date("w",mktime(0,0,0,$month,$day,$year))))];

    $meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

    return $tomadia.", ".$day." de ".$meses[$month]." de ".$year;
}

?>
