<?php 
	include("Seguranca.php");
	header("Content-Type: text/html; UTF-8",true);
?>
<?php 

	$nomeGrade		= antiInjection($_POST['nomeGrade']);
	$horarios		= antiInjection($_POST['horarios']);
	$dia			= antiInjection($_POST['dia']);
	
	$idProfessor	= $_SESSION["idEspecifico"];
	$usuarioId		= $_SESSION["usuario_id"];	
	
	if($idProfessor > 0){	
			
		include "../conecta_mysql.php";
		
		$resultado	= mysql_query("DELETE FROM Professor_Horarios WHERE Professor_Id = '$idProfessor' AND Dia_Semana_Id = '$dia'");

		if($horarios <>  ""){
					
			$array 		= explode(",",$horarios);
			$sql		= "INSERT INTO Professor_Horarios (Nome,Professor_Id,Dia_Semana_Id,Ativo,Hora_Inicio,Hora_Fim) VALUES";
			$valores	= "";
			
			for ($i=0; $i<count($array); $i++){
				$arrHorarios = explode("-",$array[$i]);
				$valores = $valores . " ('" . $nomeGrade . "'," . $idProfessor . "," . $dia . ",1,'" . $arrHorarios[0] . "','" . $arrHorarios[1] . "'), ";

			}
			$valores = substr($valores,0,strlen($valores)-2);
			$sql = $sql . $valores;
			if($valores <> ""){
				$resultado = mysql_query($sql);
			}

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