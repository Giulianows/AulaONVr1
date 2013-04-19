<?php
//pega a variavel via post
$email = $_POST['Email'];

function antiInjection($str) 
{
  //Remove palavras suspeitas de injection.
  $str = preg_replace("/(\n|\r|%0a|%0d|Content-Type:|bcc:|to:|cc:|Autoreply:|from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/","",$str);
  $str = strip_tags($str);  //Remove tags HTML e PHP.
  $str = addslashes($str);  //Adiciona barras invertidas � uma string.
  return $str;
  
} 

function GeradorSenha($tipo="L L N N L N N") 
{
// o explode retira os espa�os presentes entre as letras (L) e n�meros (N)        
        $tipo = explode(" ", $tipo);

// Cria��o de um padr�o de letras e n�meros (no meu caso, usei letras mai�sculas
// mas voc� pode intercalar maiusculas e minusculas, ou adaptar ao seu modo.)
        $padrao_letras = "A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|X|W|Y|Z";
        $padrao_numeros = "0|1|2|3|4|5|6|7|8|9";

// criando os arrays, que armazenar�o letras e n�meros
// o explode retire os separadores | para utilizar as letras e n�meros
        $array_letras = explode("|", $padrao_letras);
        $array_numeros = explode("|", $padrao_numeros);

// cria a senha baseado nas informa��es da fun��o (L para letras e N para n�meros)
        $senha = "";
        for ($i=0; $i<sizeOf($tipo); $i++) {
            if ($tipo[$i] == "L") {
                $senha.= $array_letras[array_rand($array_letras,1)];
            } else {
                if ($tipo[$i] == "N") {
                    $senha.= $array_numeros[array_rand($array_numeros,1)];
                }
            }
        }
}


$email = antiInjection($email);

//acesso ao banco de dados
include "conecta_mysql.php";

//busca no db o usuario com o email 
$result = mysql_query("SELECT * FROM usuario WHERE email='$email'");

//conta quantos tem
$num_rows = mysql_num_rows($result);

if($num_rows != '0')
{
	 
	GeradorSenha();    
	$sen_codificada = hash('whirlpool', $senha);
	$data = date("dd/mm/YYYY h:i:s",strtotime("+1 day"));
	
	//salva no banco nova senha e temp_exp
	$query = mysql_query ("update usuario set senha_temp = '$sen_codificada', Data_exp =(STR_TO_DATE('$data','%d/%m/%Y %H:%i:%s')) where email='$email'");
	
	//enviar um email para variavel email juntamente com a vari�vel senha;
	$mensage ="Você solicitou a recuperação de senha, confira seu dados.";
	$mensage .="E-mail= " . $email;
	$mensage .="Senha:" . $senha;
	mail($email, "Aula ON - Recupera��o de Senha", $mensage);

	//mensagem envio de email
	header("location:Esqueci_Senha.php?teste=Um email foi enviado para o endereço informado.");
}
else
{
	//se n�o foi encontrado
	header("location:Esqueci_Senha.php?teste=Email não cadastrado.");
           
}

?>