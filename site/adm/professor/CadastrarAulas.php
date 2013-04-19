<?php 
	include("Seguranca.php");
?>
<?php 
	$id				= $_POST['id'];
	$idProfessor	= $_POST['idProfessor'];
	
	$id 			= antiInjection($id);
	$idProfessor	= antiInjection($_POST['idProfessor']);

	$sql			= "";
	
	
	
	if($idProfessor > 0){		

		include "../conecta_mysql.php";
		
		$resultado	= mysql_query("DELETE FROM Disciplina_Professor WHERE Professor_Id = '$idProfessor' AND Disciplina_Id in(SELECT Id FROM Disciplinas WHERE Nivel_Disciplina_Id in(1,2))");

		if($id <>  ""){
					
			$array 			= explode(",",$id);
			
			for ($i=0; $i<count($array); $i++){
				$sql = $sql . "(" . $idProfessor . "," . $array[$i] . "), ";
			}

			$sql = substr($sql,0,strlen($sql)-2);

			$sql = "INSERT INTO Disciplina_Professor (Professor_Id,Disciplina_Id) VALUES " . $sql . ";";
			$resultado = mysql_query($sql);
		}

		echo $resultado;
		die();
		
	}else{
		echo "Erro";
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