<?php 
	include("Seguranca.php");
?>

<?php 

	if(!isset($_GET['id']) || !isset($_GET['transacao_pagseguro'])){
		header("location: /../index.php?pagina=Comprar&codigo=5");
	}else {
		$transacao_id 			= $_GET['transacao_id'];
		$transacao_pagseguro	= $_GET['transacao_pagseguro'];	
	}
	
	//Busca credencias no arquivo de configuração (aluno\pagseguro\config\PagSeguroConfig)
	$credentials = PagSeguroConfig::getAccountCredentials();
	
	//Busca a transação no sistema do pagseguro
	$transaction = PagSeguroTransactionSearchService::searchByCode(
			$credentials,
			$transacao_pagseguro
	);
	
	$status = $transaction->getStatus()->getValue();
	
	if($status <> ""){
		$usuario_id = $_SESSION['usuario_id'];
		
		include "../conecta_mysql.php";
		
		//$resultado = mysql_query("SELECT max(Id) as Id FROM transacoes WHERE usuario='$usuario_id'");
		//if($resultado > 0){
			//$id = mysql_result($resultado, 0, "id");
			$resultado = mysql_query("UPDATE transacoes SET Status_id=2, Data=now(), Transacao_PagSeguro = '$transacao_pagseguro' WHERE id = $transacao_id ");
			echo "FIM --- " . $resultado . " VER RETORNO E TESTAR MENSAGEM"
					die();
		//}	
	}
	
	echo $transaction->getStatus()->getValue();
	
?>