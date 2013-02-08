<?php
global $_c;

$con=NewADOConnection($_c['bd']['sgbd']);
$con->Connect($_c['bd']['host'], $_c['bd']['user'], $_c['bd']['pass'], $_c['bd']['bd']) or die("Falha na conexão!");
$con->Execute("set names 'utf8'"); 
