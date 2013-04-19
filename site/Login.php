<?php 
	include("PadraoComum.php");
?>
<link rel="stylesheet" href="css/jquery-ui.css" /> 

<script type="text/javascript" src="js/jquery.bar.js"></script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<script language="javascript" type="text/javascript" src="js/jqueryui-1.9.2.js"></script>

 <style>
  #feedback { font-size: 1.4em; }
  #selectable .ui-selectee { background: #FF6600;font:bold 14px Tahoma, Geneva, sans-serif;font-style:normal;color:#e2e2e2;}
  #selectable .ui-selectee:hover { background:#FF9900;}
  #selectable .ui-selecting { background: #FFA500; }
  #selectable .ui-selected { background: #F39814; color: white; }
  #selectable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #selectable li { margin: 3px; padding: 0.4em; font-size: 1.4em; height: 18px; }
 </style>
   
<script type="text/javascript">

function verificarCadastro() { 
	$.ajax(
    		{ 
        	    url: 'VerificarCadastro.php', 
        	    data: {email:$('input[name=login]').val()},
        	    success: function(data){
            	    if(data == 'Ambos'){
            	    	 $( "#selectable" ).selectable();
            	    	$.blockUI({ message: $('#escolha')});	
            	    }else if(data == 'Aluno' || data == 'Professor'){
                	    $('#tipoCadastro').val(data);
                	    $.unblockUI();        
                	    $('#loginForm').submit();        	    
            	    }else{
            	    	$.unblockUI();
            			$(".mensagem").click();
            			return false;	
                	}            	   
            	}        	                  	         	   
        	}		
	); 
} 
	
$(document).ready(function(){
	
	 $('#selectable li').click(function() {
		 $('#tipoCadastro').val($(this).html());
		 $.unblockUI(); 	
		 $('#loginForm').submit();
	 });
	 
	$("#botaoLogin").click(function(){
		$(".mensagem").bar({
			color 			 : '#FFFFFF',
			background_color : '#FF0000',
			removebutton     : false,
			time			 : 5000,
			message			 : 'Email ou senha incorreto'
		});
		
		if($('input[name=login]').val() == '' || $('input[name=senha]').val() == ''){	
								
			$(".mensagem").click();

			return false;
		}	
					     
        $.blockUI({ 
        	css: { 
                border: 'none', 
                padding: '15px', 
                backgroundColor: '#000', 
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .5, 
                color: '#fff',
                height: '35px',
                'font-size': '30px'
               }, 
            message: '<h1>Conectando...</h1>'
        });    

		verificarCadastro();
		
	});
	
});

</script>

<body>	

	<div id="escolha" style="display:none; cursor: default"> 
		<span><h3>Escolha com qual login você deseja prosseguir.</h3></span>
		<center>
			<ol id="selectable">
			  <li class="ui-widget-content" style="cursor:hand;">Aluno</li>
			  <li class="ui-widget-content">Professor</li>
			</ol>
		</center>
	</div> 
	
	 <!--conteudo-->
    <div class="conteudo">
    <div class="principal">    
    
	<p style="margin-left:410px;margin-top:100px;">E-mail:</p>
	<form id="loginForm" method="POST" action="Login_exec.php" >
    <input style="margin-left:350px;margin-top:25px;" type="text" name="login" size="24" class="log"/>
    <p style="margin-left:410px;margin-top:20px;">Senha:</p>
    <input style="margin-left:350px;margin-top:10px;" type="password" name="senha" size="24"  class="log"/>
    <br />
    <input type="hidden" id="tipoCadastro" name="tipoCadastro" value="" size="24"/>
	<input style="margin-left:400px" type="button" class="botaosite" id="botaoLogin" value="Entrar"/> 
    </form>
    <a style="margin-left:365px" href="Esqueci_Senha.php">Esqueci minha senha</a> 
    </div>
    </div>
    <!--/conteudo-->
    <!--rodape-->
    <?php 
	include("RodapeComum.php");
	?>
    <!--/rodape-->
