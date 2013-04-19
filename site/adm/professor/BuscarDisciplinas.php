<?php 
	include("Seguranca.php");
	header("Content-Type: text/html; UTF-8",true);
?>
<?php 
	
	include "../conecta_mysql.php";
	
	$resultado	= mysql_query("SELECT Id, Nome FROM Disciplinas WHERE Nivel_Disciplina_Id=3");

	if($resultado){

		$string = "";
		$ids	= "";

		while ($obj = mysql_fetch_array($resultado)){
			$string = $string . $obj['Nome'] . ",";	
			$ids 	= $ids . $obj['Id'] . ",";
		}

		$string = substr($string,0,strlen($string)-1);
		$ids = substr($ids,0,strlen($ids)-1);

	    echo $string . "--" . $ids;
		die();
		
	}else{
		echo "0 -- Cadastre uma disciplina nova";
		die();
	}
	
	function antiInjection($str)
	{
		//Remove palavras suspeitas de injection.
		$str = preg_replace("/(\n|\r|%0a|%0d|Content-Type:|bcc:|to:|cc:|Autoreply:|from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/","",$str);
		$str = strip_tags($str);  //Remove tags HTML e PHP.
		$str = addslashes($str);  //Adiciona barras invertidas a uma string.
		return $str;
	
	}
?>