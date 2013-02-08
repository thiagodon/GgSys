<?php
require_once('xajax/xajax_core/xajax.inc.php');
$xajax = new xajax();

function Funcoes($arquivo, $class, $funcao, $p1, $p2){
	global $smarty;
	global $_c;
	global $con;
	
	if ($funcao!='logar' && !isset($_SESSION['nome'])){
		$arquivo="control/login";
		$class="login";
		$funcao="base";
	}

	$objR= new xajaxResponse();
	require_once($arquivo.'.php');
	$objR = new $class($_c, $con, $smarty, $p1, $p2);
	$objR->$funcao();
	return $objR;
}

$xajax->register(XAJAX_FUNCTION, 'Funcoes');
$xajax->configure('javascript URI','lib/xajax/');
	