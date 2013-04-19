<?php
include("PadraoComum.php");
?>
    <div class="conteudo">
    <div class="principal">
	<p style="margin-left:370px;margin-top:150px">
	Digite seu email:
    </p>
	
	<form method="POST" action="Esqueci_Senha_exec.php" >
	<input style="margin-left:350px" type="text" name="Email" class="contact_input"/>
	<br>
	
	<input style="margin-left:390px" class="botaosite" type="submit" value="Enviar"/>
	
    </form> 
	
    <?php
	
	if(isset($_GET["teste"]))
	echo "<span  style=\"color:#FF0000;\"> ".$_GET["teste"]." </span> \n";
	?>
	
	
    </div>
    </div>
<?php
include("RodapeComum.php");
?>
