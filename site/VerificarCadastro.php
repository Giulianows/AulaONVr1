<?php 
	$email = $_GET['email'];
	$email = antiInjection($email);

	if($email == ""){
		echo "Email inválido!";
		die();
	}
	
	include "Conecta_Mysql.php";
	
	$resultado	= mysql_query("SELECT Id FROM Usuario WHERE Email ='$email'");
	$linhas = mysql_num_rows ($resultado);
	
	if($linhas == 0) //testa se foi encontrado um usuario com o email colocado
	{
		echo "Email inválido!";
		die();
	}
	else
	{
		$usuario_id					= mysql_result($resultado, 0, "id");
		
		$resultado					= mysql_query("SELECT count(*) as Total FROM  Aluno WHERE usuario_id ='$usuario_id'");
		$totalAluno					= mysql_result($resultado, 0, "Total");
		
		$resultado					= mysql_query("SELECT count(*) as Total FROM  Professor WHERE usuario_id ='$usuario_id'");
		$totalProfessor				= mysql_result($resultado, 0, "Total");
		
		if($totalAluno > 0 && $totalProfessor > 0){
			echo "Ambos";
			die();
		}elseif($totalAluno > 0){
			echo "Aluno";
			die();
		}elseif($totalProfessor > 0){
			echo "Professor";
			die();
		}		

	}
	
	echo "Email inválido!";
	die();
	
	function antiInjection($str)
	{
		//Remove palavras suspeitas de injection.
		$str = preg_replace("/(\n|\r|%0a|%0d|Content-Type:|bcc:|to:|cc:|Autoreply:|from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/","",$str);
		$str = strip_tags($str);  //Remove tags HTML e PHP.
		$str = addslashes($str);  //Adiciona barras invertidas a uma string.
		return $str;
	
	}
	
?>