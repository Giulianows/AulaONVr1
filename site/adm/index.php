<?php 
	include("Seguranca.php");
	header("Content-Type: text/html; UTF-8",true);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<title> AulaON </title>
		
		<link rel="shortcut icon" href="imagens/logoaulaon.png"/>
	    <link rel="stylesheet" href="css/CSSReset.css" />
	    <link rel="stylesheet" href="css/PadraoLogado.css" />
	    <link rel="stylesheet" href="css/ComponentesForms.css" />
	    <link rel="stylesheet" href="css/uniform.default.css" media="screen" />
	    <link rel="stylesheet" href="css/jquery-ui-1.10.2.custom.css" />
	    
	    <script language="javascript" type="text/javascript" src="js/jquery-1.8.3.js"></script>
	    <script language="javascript" type="text/javascript" src="js/jqueryui-1.9.2.js"></script>
	    <script language="javascript" type="text/javascript" src="js/ComponentesForms.js"></script>     
	    <script language="javascript"  type="text/javascript" src="../js/jquery.bar.js"></script>
	    <script src="js/jquery.uniform.js"></script>
	    
        <script type="text/javascript">
	 	$(document).ready(function() 
		{ 
			$( "#datepicker" ).datepicker();
		});
		
	 	</script>
	 
	 	<script type='text/javascript'>
    	// Estilo para todos os select e checkbox
    	$(function () {
        	$("select").uniform();
   	 	});
		</script>
    
    </head>
    

<body>
<div id="tudo">
<?php 
	$tipoUsuario = "";
	if(isset($_SESSION["TipoUsuario"]))
	{
		$tipoUsuario = $_SESSION["TipoUsuario"];
	}

?>

                <div id="topo">
                	<!--logotipo-->
                    <div id="logo">
                    <a href="../index.php"><img border="0" src="../imagens/aulaon.png" alt="AulaON" title="AulaON" width="350" height="90"></a>
                    </div>
                    <div id="logoff">
                    <p><?php echo (isset($_SESSION["nome_usuario"])) ? $_SESSION["nome_usuario"]:""?>, seja bem vindo ao AulaON <br />

							<p>Próxima aula dia 20/03/2013 às 15:00</p>
							<a href="Logoff.php" style="text-decoration:none">
				                <span class="icon-exit" style="color:#FF6600"></span>
								<span class="text bold"style="color:#FF6600">Sair</span>
			            	</a>
						</p>
                   		</div>                    
		            <!--/logotipo-->
                <a href="../index.php" id="icohome"><img src="../imagens/home.png"></a>
                <a href="index.php" id="icoadm"><img src="../imagens/work.png"></a>
                <img src="../imagens/dinheiro4.png" style="width: 32px;height:32px" id="icocreditos">
                <span id="spancreditos">OC 100,00</span>
                </div>
          
        



<!--conteudo-->
<div class="conteudo">
    <!--menu-->
	<?php 
	    $tipoUsuario = strtolower($tipoUsuario);
		include("$tipoUsuario/MenuLogado.php");
	?>
    <!--/menu-->
	<!--principal-->
	<?php 
		if(isset($_GET["pagina"])){
			$paginaEnviada = $_GET["pagina"];
			if($paginaEnviada <> "")
			{
				$caminho = dirname(__FILE__) . "/". $tipoUsuario . "/" . $paginaEnviada . ".php";

				if(file_exists($caminho)){
					include("$tipoUsuario/$paginaEnviada.php");		
				}else{
					include("$tipoUsuario/index.php");
				}				

			}else{
				include("$tipoUsuario/index.php");
			}
		}else{
			include("$tipoUsuario/index.php");
		}
		
	?>
	<div id="datepicker"></div>
    <!--/principal-->
</div>
    <!--/conteudo-->
    
    <div id="clear"></div>

	<!--rodape-->
    <?php 
		include("Rodape.php");
	?>
    <!--/rodape-->
</div>
</body>

</html>