<?php 
	include("Seguranca.php");
?>
<?php 
	$idDisciplina	= antiInjection($_POST['idDisciplina']);
	$nomeDisciplina	= antiInjection($_POST['nomeDisciplina']); 
	$idsSuperior	= antiInjection($_POST['idsSuperior']);
	$idProfessor	= antiInjection($_POST['idProfessor']);
	
	include "../conecta_mysql.php";
	
	$resultado	= mysql_query("SELECT COUNT(*) as Total FROM Disciplinas WHERE Id='$idDisciplina' AND Nome='$nomeDisciplina'");
	$linhas 	= mysql_result($resultado, 0, "Total");
	
	if($linhas == 0){

		$resultado	= mysql_query("SELECT Id, Nome FROM Disciplinas WHERE Nome='$nomeDisciplina'");
		$linhas 	= mysql_num_rows($resultado);

		if($linhas > 0){
			$idDisciplina = mysql_result($resultado, 0, "Id");
		}else{
			$resultado		= mysql_query("INSERT INTO Disciplinas (Nome, Nivel_Disciplina_Id) VALUES ('$nomeDisciplina',3)");
			$idDisciplina	= mysql_insert_id();

		}
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
		
		$arrayIDs 	= explode(',',$idsSuperior);
		$sqlInsert	= "";
		
		for($i=0; $i<count($arrayIDs); $i++){
			
			$resultado	= mysql_query("SELECT COUNT(*) as Total FROM Disciplina_Curso_Superior WHERE Disciplina_Professor_Id='$idPD' AND Curso_Superior_Id='$arrayIDs[$i]'");
			$linhas 	= mysql_result($resultado, 0, "Total");
			if($linhas == 0){
				$sqlInsert = $sqlInsert . "(" . $idPD ."," . $arrayIDs[$i] . "), ";
			}
			
		}
		if($sqlInsert <> ""){
			
			$sqlInsert = substr($sqlInsert,0,strlen($sqlInsert)-2);			
			$resultado	= mysql_query("INSERT INTO Disciplina_Curso_Superior (Disciplina_Professor_Id, Curso_Superior_Id) VALUES $sqlInsert");
			
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