<?php if (!defined('ALLOW_PAGSEGURO_CONFIG')) { die('No direct script access allowed'); }
/*
************************************************************************
PagSeguro Config File
************************************************************************
*/

$PagSeguroConfig = array();

$PagSeguroConfig['environment'] = Array();
$PagSeguroConfig['environment']['environment'] = "production";

$PagSeguroConfig['credentials'] = Array();
$PagSeguroConfig['credentials']['email'] = "adm@aulaon.com.br";
$PagSeguroConfig['credentials']['token'] = "FDDF8EA03D6947989D434AF97BA88ABD";

$PagSeguroConfig['application'] = Array();
$PagSeguroConfig['application']['charset'] = "ISO-8859-1"; // UTF-8, ISO-8859-1

$PagSeguroConfig['log'] = Array();
$PagSeguroConfig['log']['active'] = FALSE;
$PagSeguroConfig['log']['fileLocation'] = "";

?>