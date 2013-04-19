<?php
//obtém os valores digitados
$username 		= $_POST["login"];
$senha 			= $_POST["senha"];
$tipoCadastro	= $_POST['tipoCadastro'];

function antiInjection($str) 
{
  //Remove palavras suspeitas de injection.
  $str = preg_replace("/(\n|\r|%0a|%0d|Content-Type:|bcc:|to:|cc:|Autoreply:|from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/","",$str);
  $str = strip_tags($str);  //Remove tags HTML e PHP.
  $str = addslashes($str);  //Adiciona barras invertidas a uma string.
  return $str;
  
} 

$username = antiInjection($username);
$senha = antiInjection($senha);

$sen_codificada = md5($senha); //senha criptografada

//acesso ao banco de dados
include "Conecta_Mysql.php";
$resultado = mysql_query("SELECT * FROM Usuario where Email ='$username'");
$linhas = mysql_num_rows ($resultado);

if($linhas == 0) //testa se foi encontrado um usuario com o username ou email colocado
{	
	//se não foi encontrado
	header("location:Login.php?codigo=4");
	die();

}
else
{

	if($sen_codificada == mysql_result($resultado, 0, "senha_temp")) //confere senha
	{
		$data = date("d/m/y H:i:s");
		
		if($data >= mysql_result($resultado, 0, "data_exp"))
		{
			
			header("location:Troca_senha.php");
			die();
			
		}
		else
		
		{
			$rowsenha = substr(md5(uniqid('')), -9, 10);
			
			$email = mysql_result($resultado, 0, "Email");
			$sen_codificada = hash('whirlpool', $rowsenha);
			//salva no banco nova senha e temp_exp
			$query = mysql_query ("update Usuario set senha_temp = '$sen_codificada', Data_exp =(STR_TO_DATE('$data','%d/%m/%Y %H:%i:%s')) where email='$email'");
	
			//enviar um email para variavel email juntamente com a variável senha;
			$mensage ="Sua senha temporaria expirou, confira seu novos dados.";
			$mensage .="E-mail= " . $email;
			$mensage .="Senha:" . $rowsenha;
			mail($email, "Aula ON - Recuperação de Senha", $mensage);

			header("location:Login.php?codigo=3");
		}		
	}
	
	else
	
	if($sen_codificada != mysql_result($resultado, 0, "Senha")) //confere senha
	{
		//se não foi encontrado
		header("location:Login.php?codigo=4");	
		die();
	}
	
	else //usuario e senha corretos
	{
		
		$usuario_id					= mysql_result($resultado, 0, "id");	
		$nome						= mysql_result($resultado, 0, "Nome");
		
		if(strcasecmp($tipoCadastro,"Aluno") == 0 || strcasecmp($tipoCadastro,"Professor") == 0){
			
			session_start("usuario");
			$_SESSION["TipoUsuario"] 	= $tipoCadastro;
			$_SESSION["nome_usuario"]	= $nome;
			$_SESSION["usuario_id"]		= $usuario_id;
			
			$resultado = mysql_query("SELECT Id FROM $tipoCadastro WHERE Usuario_Id ='$usuario_id'");
			$linhas = mysql_num_rows ($resultado);

			if($linhas > 0) //testa se foi encontrado um usuario com o username ou email colocado
			{
				$_SESSION["idEspecifico"] = mysql_result($resultado, 0, "Id");
			
			}
			
			
			header("location: adm/index.php");
			die();
			
		}else{
			
			header("location: Index.php?codigo=9");
			die();
			
		}
		

		
	}
}
?>