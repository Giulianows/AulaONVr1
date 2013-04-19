<?php 
	include("Seguranca.php");
?>
<?php 

	if(!isset($_GET['valor'])){
		header("location: /../index.php?pagina=Comprar&codigo=7");
	}else {
		$valor = number_format($_GET['valor'],2);
	}
	
	//inclui o arquivo PagSeguroLibrary.php, para utilizamos a biblioteca
	require_once "pagseguro/PagSeguroLibrary.php";
			
	include "../conecta_mysql.php";	
	
	$usuario_id = $_SESSION['usuario_id'];
	
	$resultado = mysql_query("SELECT Nome, Email, Telefone FROM usuario WHERE id ='$usuario_id'");

	if(mysql_num_rows($resultado) > 0){
		
		$idTransacao = iniciarTransacao($usuario_id, $valor);
				
		$paymentRequest = new PagSeguroPaymentRequest();
		
		$paymentRequest->setCurrency('BRL');//Definir moeda
		
		$telefone	= str_replace("-","",mysql_result($resultado, 0, "Telefone"));
		$ddd		= substr($telefone,0,2);
		$telefone	= substr($telefone,2);
				
		//Objeto com dados do comprador
		$paymentRequest->setSender(
			mysql_result($resultado, 0, "Nome"),
			mysql_result($resultado, 0, "Email"),
			$ddd,
			$telefone
		);
		
		//Objeto que adiciona o item a ser comprado
		$paymentRequest->addItem("1", "Créditos", 1, $valor);
		
		//Busca credencias no arquivo de configuração (aluno\pagseguro\config\PagSeguroConfig)
		$credentials = PagSeguroConfig::getAccountCredentials();
		
		//Seta a url de retorno para o site ap�s a compra.
		$url = "http://www.aulaon.com.br/adm/aluno/RetornoPagSeguro.php?id=$idTransacao";
		$paymentRequest->setRedirectURL($url);
		
		//faz uma requisição para validar os dados e receber url de redirecionamento
		$url = $paymentRequest->register($credentials);
		
		header("location: $url");

	}
	else{
		header("location: /../index.php?pagina=Comprar&codigo=6");	
	}
		
		
	function iniciarTransacao($usuario_id,$valor){
		
		$resultado = mysql_query("INSERT INTO transacoes (Usuario_id, Valor, Data, Status_id) VALUES('$usuario_id','$valor',NOW(),'1')");
		$idTransacao = mysql_insert_id();
		
		if(!$resultado){
			header("location: /../index.php?pagina=Comprar&codigo=6");
		}
		
		return $idTransacao;
	}
		
?>