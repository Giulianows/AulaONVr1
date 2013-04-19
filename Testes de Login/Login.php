<?php
//obtém os valores digitados
$username = $_POST["Login"];
$senha = $_POST["Senha"];
$escolha = $_GET["ap"]; //radiobutton

function antiInjection($str) 
{
  # Remove palavras suspeitas de injection.
  $str = preg_replace(sql_regcase("/(\n|\r|%0a|%0d|Content-Type:|bcc:|to:|cc:|Autoreply:|from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "", $str);
  $str = strip_tags($str);  # Remove tags HTML e PHP.
  $str = addslashes($str);  # Adiciona barras invertidas à uma string.
  return $str;
} 

$username = antiInjection($username);
$senha = antiInjection($senha);

$sen_codificada = hash('whirlpool', $senha); //senha criptografada

//acesso ao banco de dados
include "conecta_mysql.inc";
$resultado = mysql_query("Select * from usuario where username = '$username' or email ='$username'");
$linhas = mysql_num_rows ($resultado);

if($linhas == 0) //testa se foi encontrado um usuario com o username ou email colocado
{	
	echo "Usario ou senha incorreto!";
	
}

else

{

	if($sen_codificada == mysql_result($resultado, 0, "senha_temp")) //confere senha
	{
		$data = $data = date("dd/mm/YYYY h:i:s");
		
		if($data <= mysql_result($resultado, 0, "data_exp"))
		{
			//Login na tela onde deve alterar sua senha
		}
		else
		
		{
			$rowsenha = substr(md5(uniqid('')), -9, 10);
    
			$sen_codificada = hash('whirlpool', $rowsenha);
			$data = date("dd/mm/YYYY h:i:s",strtotime("+1 day"));
	
			//salva no banco nova senha e temp_exp
			$query = mysql_query ("update usuario set senha_temp = '$sen_codificada', data_exp ='$data' where email='$email'");
	
			//enviar um email para variavel email juntamente com a variável senha;
			$mensage ="Você solicitou a recuperação de senhha confira seu dados.";
			$mensage .="E-mail= " . $email;
			$mensage .="Senha:" . $rowsenha;
			mail($email, "Aula ON - Recuperação de Senha", $mensage);

			echo"<script>alert(A senha solicitada expirou. Enviamos uma nova senha para seu email.),window.open('recuperar_senha_enviado.php','_self')</script>";
		}		
	}
	
	else
	
	if($sen_codificada != mysql_result($resultado, 0, "senha")) //confere senha
	{
		echo "Usuario ou senha incorreto!";		
	}
	
	else //usuario e senha corretos
	{
		setcookie("nome_usuario", $username);
		setcookie("senha_usuario", $sen_codificada);
		//direcionar para a pagina inicial do aluno ou professor? header("location: exemplo.php");
	}
}
mysql_close($conexao);
?>