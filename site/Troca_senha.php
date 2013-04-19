<?php
include("PadraoComum.php");
?>
<html>
<head>
</head>

<body>
    <div class="conteudo">
    <div class="principal">
	<br>
	<br>
	<br>
	<br>
	<center>
	Digite sua nova senha:
    </center>
	<form  method="POST" action="index.php" type="submit" name="form_senha" id="form_senha">
	<input style="margin-left:42%" type="password" name="senha1" size="30" id="senha1" onkeyup="validarSenha();Forca();"/>
	<span style="color:green" id='resultado'></span>
	<br>
	<center>
	<div id="for�a" >
	</div>
	</center>
	<br>
	<center>
	Confirme a sua nova senha:
    </center>
	<input style="margin-left:42%" type="password" name="senha2" size="30" id="senha2" onkeyup="validarSenha();"/><br>
	<br>
	<center>
	<input type="button" value="Atualizar" onclick="Atualizar();"/>
	<br>
	<br>
	<font face="verdana" size="3" color="red">
	<div id="texto" >
	</div>
	</font>

	<br /> 
	<br>
    </form> 	
	</center>
    </div>
    </div>
<?php
include("RodapeComum.php");
?>
</body>
</html>

<script>

function validarSenha(){	
	jQuery(document).ready(function($) {
		if( (jQuery("#senha1").val() != jQuery("#senha2").val()) ||(jQuery("#senha1").val() == '' || jQuery("#senha2").val() == '') )
		{
			document.getElementById("texto").innerHTML = 'Senhas diferentes ou vazias';

			return false;
		}
		
		else
		{
			document.getElementById("texto").innerHTML = '';
			return false;
		}
	});

}

function Atualizar(){	
	jQuery(document).ready(function($) {
		if(jQuery("#senha1").val() == '' || jQuery("#senha2").val() == '')
		{
			document.getElementById("texto").innerHTML = 'Os campos est�o vazios';

			return false;
		}
		
		else
		
		if( jQuery("#senha1").val() == jQuery("#senha2").val())
		$("#form_senha").submit();
		
		else
		return false;

	});

}


function Forca(){
    jQuery(document).ready(function() 
	{	
		var senha = jQuery("#senha1").val();  
        var entrada = 0;  
        var resultadoado;
		
		if(senha == '')
		{
			document.getElementById("força").innerHTML = '';
			return false;
		}
		
		if(senha.length < 7){  
                entrada = entrada - 1;  
        }  
          
        if(!senha.match(/[a-z_]/i) || !senha.match(/[0-9]/)){  
                entrada = entrada - 1;  
        }  
          
        if(!senha.match(/\W/)){  
                entrada = entrada - 1;  
        }  
          
        if(entrada == 0){  
                resultado = 'A Segurança de sua senha �: <font color=\'#99C55D\'>EXCELENTE</font>';  
        } else if(entrada == -1){  
                resultado = 'A Segurança de sua senha �: <font color=\'#7F7FFF\'>BOM</font>';  
        } else if(entrada == -2){  
                resultado = 'A Segurança de sua senha �: <font color=\'#FF5F55\'>BAIXA</font>';  
        } else if(entrada == -3){  
                resultado = 'A Segurança de sua senha �: <font color=\'#A04040\'>MUITO BAIXA</font>';  
        }   
          
        document.getElementById("força").innerHTML = resultado;
		return false; 

    });
}


</script>