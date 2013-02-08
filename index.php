<?php
require_once('lib/smarty/libs/Smarty.class.php');
require_once('lib/adodb/adodb.inc.php');
require_once('lib/xajax.php');
require_once('config/config.php');
require_once('config/conexao.php');

session_start();

$smarty = new Smarty();


$smarty->template_dir = 'views/templates/';
$smarty->compile_dir = 'views/templates_c/	';

$xajax->processRequest();

$smarty->assign('xajax_js', $xajax->getJavascript('lib/xajax/'));

$smarty->display('index.tpl');