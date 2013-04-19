<?php

$conexao = mysql_connect ("localhost", "root", "");
mysql_select_db("aulaonco_site_aulas");
mysql_query("SET NAMES utf8", $conexao);
mysql_set_charset('UTF8', $conexao);
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conexao);


?>