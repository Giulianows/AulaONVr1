<?php 
include("Seguranca.php");
session_start("usuario");
unset($_SESSION["TipoUsuario"]);
unset($_SESSION["nome_usuario"]);
unset($_SESSION["usuario_id"]);
session_destroy("usuario");
header("location: ../");
?>