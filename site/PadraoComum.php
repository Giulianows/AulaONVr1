<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>AulaON</title>
    <link rel="shortcut icon" href="imagens/logoaulaonn.ico">
    <link rel="stylesheet" href="css/CSSReset.css" />
    <link rel="stylesheet" href="css/PadraoComum.css" />
    <link rel="stylesheet" href="css/uniform.default.css" media="screen" />
     
    <script language="javascript" type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script language="javascript" type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.bar.js"></script> 
    <script type="text/javascript" src="js/jquery.uniform.js"></script>
    
    
    <script type='text/javascript'>
	     //Estilo para todos os select e checkbox
	    $(function () {
	       $("select, :checkbox").uniform();
	   });
	</script>
	
</head>
<body>
<div id="tudo">
                <div id="topo">
                <!--logotipo-->
                    <div id="logo">
                    <a href="index.php"><img border="0" src="imagens/aulaon_home.png" alt="AulaON" title="AulaON" width="350" height="100"></a>
                    <!--  <p id="slogan">Aproximando alunos e professores!</p>-->
                    </div>
                    
                <!--/logotipo-->
                <!--login-->
                    <div id="login">
                    <?php 
                    	session_start("usuario");
                    ?>
                    <p><?php echo (isset($_SESSION["nome_usuario"])) ? $_SESSION["nome_usuario"].", s":"S"?>eja bem vindo ao AulaON <br />
                    <?php 
                    if(!isset($_SESSION["nome_usuario"])){?>
                    
						Faça seu <a href="Login.php" title="Login" style="color:#FF6600"><strong>login</strong></a>
						ou <a href="Cadastro.php" title="Cadastre-se" style="color:#FF6600"><strong>cadastre-se</strong></a>
						
					<?php 
					}else{?>					
						<a href="adm/Logoff.php" style="text-decoration:none">
			                <span class="icon-exit" style="color:#FF6600"></span>
							<span class="text bold"style="color:#FF6600">Sair</span>
			            </a>						
					<?php }?>
					</p>
					<br>
					
                    </div>                    
                <!--/login-->
                
                <a href="adm/index.php" id="icoadm"><img src="imagens/work.png" title="Home do usuário" alt="Home do usuário"></a> 
                </div>
        <!--menu-->
    <div id="menu">
		<ul>
			<li class="first selected"><a href="Index.php" style="color:#191970;">Home</a></li>
			<li><a href="ComoFunciona.php" style="color:#191970;">Como Funciona</a></li>
			<li><a href="AulasDisponiveis.php" style="color:#191970;">Aulas Disponíveis</a></li>
			<li><a href="DuvidasFrequentes.php" style="color:#191970;">Perguntas Frequentes</a></li>
			<li><a href="Cadastro.php" style="color:#191970;">Cadastre-se</a></li>
			<li><a href="Contato.php" style="color:#191970;">Contato</a></li>
		</ul>
	</div>
    <!--/menu-->
    <!--conteudo-->
    <!--/conteudo-->
    <!--rodap�-->
    <!--/rodap�-->
