<?php
$nome = $_POST["nome"];
$dn = $_POST['dn'];
$sexo = $_POST['sexo'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$senha = $_POST['senha'];

$tpCadastro = $_POST['tpCadastro'];


function antiInjection($str) 
{
  //Remove palavras suspeitas de injection.
  $str = preg_replace("/(\n|\r|%0a|%0d|Content-Type:|bcc:|to:|cc:|Autoreply:|from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/","",$str);
  $str = strip_tags($str);  //Remove tags HTML e PHP.
  $str = addslashes($str);  //Adiciona barras invertidas � uma string.
  return $str;
  
}

$nome = antiInjection($nome);
$dn = converter_data(antiInjection($dn));
$cpf = antiInjection($cpf);
$email = antiInjection($email);
$telefone = antiInjection($telefone);
$senha = antiInjection($senha);

$senha = md5($senha);

   include "Conecta_Mysql.php";

$resultado = mysql_query("SELECT Id FROM Usuario WHERE email ='$email'");
$linhas = mysql_num_rows($resultado);

if($linhas > 0){
	
	$usuario_id =  mysql_result($resultado, 0, "Id");
	$result = mysql_query("SELECT COUNT(*) as Total FROM ".$tpCadastro." WHERE usuario_id='$usuario_id'");
	$linhas = mysql_result($resultado, 0, "Total");
	
	if($linhas > 0){
		header("location:Cadastro.php?codigo=8");
		die();
	}

}else{
	
	$result = mysql_query("INSERT INTO Usuario(Nome,DN,Sexo,CPF,Email,Telefone,Celular,Senha) Values('$nome', '$dn' , '$sexo',
			'$cpf', '$email', '$telefone', '$celular', '$senha')");
	
}
		
		
//Com o resultado insere um registro na tabela de aluno ou professor.
if($result || $usuario_id <> ''){	
	
	$idUsuario = ($usuario_id == '') ? mysql_insert_id() : $usuario_id;	
	mysql_query("INSERT INTO ".$tpCadastro."(usuario_id) Values('$idUsuario')");
	header("location:Login.php?codigo=2");	
	
}else{
	header("location:Cadastro.php?codigo=1");	
}

function converter_data($data) {
	
	$data = implode("/",array_reverse(explode("-",$data)));
	$sdata = implode("-",array_reverse(explode("/",$data)));
	
	return $sdata;
}

?>
