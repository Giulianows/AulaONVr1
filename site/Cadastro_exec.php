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
$face 		= $_POST['face'];

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
$tpCadastro = antiInjection($tpCadastro);
$face = antiInjection($face);

if(!$face){
	$senha = md5($senha);
}
;
if($nome == "" or $dn == "" or $tpCadastro == "" or $email == "" or $senha == ""){
	if($face){
		echo "Cadastro.php?codigo=1";
		die();
	}
	header("location:Cadastro.php?codigo=1");
	
}

   include "Conecta_Mysql.php";

$resultado = mysql_query("SELECT Id FROM Usuario WHERE email ='$email'");
$linhas = mysql_num_rows($resultado);

if($linhas > 0){
	
	$usuario_id =  mysql_result($resultado, 0, "Id");
	$result = mysql_query("SELECT COUNT(*) as Total FROM ".$tpCadastro." WHERE usuario_id='$usuario_id'");
	$linhas = mysql_result($result, 0, "Total");
	
	if($linhas > 0){
		if($face){
			echo "Cadastro.php?codigo=8";
			die();
		}
		header("location:Cadastro.php?codigo=8");		
	}

}else{

	$result = mysql_query("INSERT INTO Usuario(Nome,DN,Sexo,CPF,Email,Telefone,Celular,Senha) Values('$nome', '$dn' , '$sexo',
			'$cpf', '$email', '$telefone', '$celular', '$senha')");
	
}
		
		
//Com o resultado insere um registro na tabela de aluno ou professor.
if($result || $usuario_id <> ''){	
	
	$idUsuario = ($usuario_id == '') ? mysql_insert_id() : $usuario_id;	
	mysql_query("INSERT INTO ".$tpCadastro."(usuario_id) Values('$idUsuario')");
	if($face){
		session_start("usuario");
		$_SESSION["TipoUsuario"] 	= $tpCadastro;
		$_SESSION["nome_usuario"]	= $nome;
		$_SESSION["usuario_id"]		= $idUsuario;
			
		$resultado = mysql_query("SELECT Id FROM $tpCadastro WHERE Usuario_Id ='$idUsuario'");
		$linhas = mysql_num_rows ($resultado);
		
		if($linhas > 0) //testa se foi encontrado um usuario com o username ou email colocado
		{
			$_SESSION["idEspecifico"] = mysql_result($resultado, 0, "Id");
				
		}	
		echo "adm/index.php";
		die();
	}
	header("location:Login.php?codigo=2");	
	
}else{
	
	if($face){
		echo "Cadastro.php?codigo=1";
		die();
	}
	header("location:Cadastro.php?codigo=1");
	
}

function converter_data($data) {
	
	$data = implode("/",array_reverse(explode("-",$data)));
	$sdata = implode("-",array_reverse(explode("/",$data)));
	
	return $sdata;
}

?>
