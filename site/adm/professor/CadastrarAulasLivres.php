<?php 
	include("Seguranca.php");
?>
<?php 
	$nomeAula		= antiInjection($_POST['nomeAula']);
	$palavrasChaves	= antiInjection($_POST['palavrasChaves']); 
	$idProfessor	= antiInjection($_POST['idProfessor']);
	$idDisciplina	= "";
	
	include "../conecta_mysql.php";
	
	$resultado	= mysql_query("SELECT Id FROM Disciplinas WHERE Nivel_Disciplina_Id='4' AND Nome='$nomeAula'");
	$linhas 	= mysql_num_rows($resultado);
	
	if($linhas == 0){

		$resultado		= mysql_query("INSERT INTO Disciplinas (Nome, Nivel_Disciplina_Id) VALUES ('$nomeAula',4)");
		$idDisciplina	= mysql_insert_id();

	}else{
		$idDisciplina 	= mysql_result($resultado, 0, "Id");
	}

	if($idDisciplina <> "" && $idProfessor <> ""){
	
		$resultado	= mysql_query("SELECT Id FROM Disciplina_Professor WHERE Disciplina_Id='$idDisciplina' AND Professor_Id='$idProfessor'");
		$linhas 	= mysql_num_rows($resultado);
	
		if($linhas == 0){
			$resultado	= mysql_query("INSERT INTO Disciplina_Professor (Disciplina_Id, Professor_Id) VALUES ('$idDisciplina','$idProfessor')");
			$idPD		= mysql_insert_id();
		}else{
			$idPD 	= mysql_result($resultado, 0, "Id");
		}
	}
	
	if($palavrasChaves <> "" && $idPD <> ""){
		
		$arrayPalavras 	= explode(',',$palavrasChaves);
		
		for($i=0; $i<count($arrayPalavras); $i++){
				
			$resultado	= mysql_query("SELECT Id FROM Palavras_Chaves WHERE Nome='$arrayPalavras[$i]'");
			$linhas 	= mysql_num_rows($resultado);
			if($linhas == 0){
				
				$resultado		= mysql_query("INSERT INTO Palavras_Chaves (Nome) VALUES ('$arrayPalavras[$i]')");
				$idPalavraCHave	= mysql_insert_id();
				
			}else{
				$idPalavraCHave 	= mysql_result($resultado, 0, "Id");
			}
			
			$resultado		= mysql_query("INSERT INTO Disciplina_Palavra_Chave (Disciplina_Professor_Id, Palavra_Chave_Id) VALUES ($idPD,'$idPalavraCHave')");
		}
	}
		
	echo $resultado;
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