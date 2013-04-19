<?php
$Senha = $_POST["Senha"];
$Conf_senha = $_POST["Conf_senha"];

function antiInjection($str) 
{
  # Remove palavras suspeitas de injection.
  $str = preg_replace(sql_regcase("/(\n|\r|%0a|%0d|Content-Type:|bcc:|to:|cc:|Autoreply:|from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "", $str);
  $str = strip_tags($str);  # Remove tags HTML e PHP.
  $str = addslashes($str);  # Adiciona barras invertidas à uma string.
  return $str;
} 

$Senha = antiInjection($Senha);
$Conf_senha = antiInjection($Conf_senha);

if($Senha == $Conf_senha)
{
	$sen_codificada = hash('whirlpool', $Senha);
	$query = mysql_query ("update usuario set senha ='$sen_codificada', senha_temp = '', data_exp ='' where username='$username'");
	//enviar para o portal
}

else
{
	echo "As senhas são diferentes, tente novamente!"
}

?>