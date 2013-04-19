<?php 


	if(!isset($_SESSION)){
		session_start("usuario");
	}
	
	if(!isset($_SESSION["nome_usuario"])){
		header("location: ../index.php?codigo=5");
	}

	if(stristr($_SERVER['PHP_SELF'],"Aluno") || stristr($_SERVER['PHP_SELF'],"Professor")){
		
		if(!isset($_SERVER['HTTP_REFERER'])){
			header("location: ../../index.php?codigo=5");
		}		
	}
	
?>