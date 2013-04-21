<?php 
	include("PadraoComum.php");
?>
	
    <link rel="stylesheet" href="css/Cadastro.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/jquery-ui-calendarioCadastro.css" />
	<link rel="stylesheet" href="css/shadowbox.css" />
	<link rel="stylesheet" href="css/jquery-ui.css" /> 
	
	<script language="javascript" type="text/javascript" src="js/shadowbox.js"></script>
	<script language="javascript" type="text/javascript" src="js/jqueryui-calendarioCadastro.js"></script>	
	<script type="text/javascript" src="js/jquery.blockUI.js"></script>
	<script type="text/javascript" src="js/md5.js"></script>
	
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
	$(document).ready(function(){
		Shadowbox.init
		({
			language: 'pt',
			player: ['img', 'html', 'swf']
		});	
	});
</script>

<script type="text/javascript">

        function formatar(mascara, documento) {
            var i = documento.value.length;
            var saida = mascara.substring(0, 1);
            var texto = mascara.substring(i)

            if (texto.substring(0, 1) != saida) {
                documento.value += texto.substring(0, 1);
            }
        }

</script>

<script>
    $(function() {
        $( "#dn" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
</script>

<script>
jQuery.validator.addMethod("data", function(value, element) {
    if(value.length!=10) return false;
    var data        = value;
    var dia         = data.substr(0,2);
    var barra1      = data.substr(2,1);
    var mes         = data.substr(3,2);
    var barra2      = data.substr(5,1);
    var ano         = data.substr(6,4);
    if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
    if((mes==4||mes==6||mes==9||mes==11)&& dia==31)return false;
    if(mes==2 && (dia>29||(dia==29 && ano%4!=0)))return false;
    if(ano < 1900)return false;
    return true;
}, "<img src=\"imagens/error.png\">");
</script>

<script>
jQuery.validator.addMethod("verificaCPF", function(value, element) {
value = value.replace('.','');
value = value.replace('.','');
cpf = value.replace('-','');
while(cpf.length < 11) cpf = "0"+ cpf;
var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
var a = [];
var b = new Number;
var c = 11;
for (i=0; i<11; i++){
    a[i] = cpf.charAt(i);
    if (i < 9) b += (a[i] * --c);
}
if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
b = 0;
c = 11;
for (y=0; y<10; y++) b += (a[y] * c--);
if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return false;
return true;
}, "<img src=\"imagens/error.png\">");

  $(document).ready(function(){
    $("#cadastro").validate({
	errorLabelContainer: $("#RegisterErrors"),
	
	rules:{
		nome:{
			required: true,
			minlength: 3
			 },
		 email:{
			required: true,
			email: true
		},
		dn:{
			required: true,
			data:true
			},
		telefone:{
			required: true,
			},
		cpf:{
			required: true,
			verificaCPF: true
			},
		celular:{
			required: true,
			},
		senha:{
			required: true
		},
		confirmarsenha:{
			required: true,
			equalTo: "#senha"
		},
		termos: "required"
	},
			
		  
	messages:{
		nome:{
			required: "<img src=\"imagens/error.png\">",
			minlength: "<img src=\"imagens/error.png\">"
			 },
		sobrenome:{
			required: "<img src=\"imagens/error.png\">"
		  },
		email:{
			required: "<img src=\"imagens/error.png\">",
			email: "<img src=\"imagens/error.png\">"
		},
		dn:{
			required: "<img src=\"imagens/error.png\">"
			},
		telefone:{
			required: "<img src=\"imagens/error.png\">"
			},
		celular:{
			required: "<img src=\"imagens/error.png\">"
			},
		cpf:{
			required: "<img src=\"imagens/error.png\">"
			},
		senha:{
			required: "<img src=\"imagens/error.png\">"
		},
		confirmarsenha:{
			required: "<img src=\"imagens/error.png\">",
			equalTo: "Incorreto!"
		},
		termos: "<img src=\"imagens/error.png\">"
	}
	});	
  });
</script>	
	 <!--face-->	
	<div id="fb-root"></div>
	
	<script>
	$(document).ready(function(){	
		 var tpCadastro = "";
		 $('#selectable li').click(function() {
			 tpCadastro = $(this).html();
			 $.unblockUI(); 	
			 cadastrar();
		 });
		 
		$('.registerM').click(function(){
			$(this).hide();
			$('.voltar').show();
			$('.automatico').hide();
			$('#cadastro').show();			
		});
		
		$('.voltar').click(function(){
			$(this).hide();
			$('.registerM').show();
			$('.automatico').show();
			$('#cadastro').hide();			
		});
	   // Additional JS functions here
	  	function buscarDados(accessToken) {
	    	 $( "#selectable" ).selectable();
 	    	 $.blockUI({ message: $('#escolha')});
		}

		function cadastrar(){	        
		    FB.api('/me', function(response) {
		    	var a = response.birthday.split('/');
		    	var dataNascimento = a[1] + "/" + a[0] + "/" + a[2];		    	
				$.post("Cadastro_exec.php",{ nome:response.name, dn:dataNascimento, cpf:'', email:response.email, telefone:'', senha:MD5(response.id), tpCadastro:tpCadastro, face:1 },
						function(data){
							if(data){
								$(".mensagem").click();
								window.location.replace(data);						
							}
						}
				);		
		        //console.log('Good to see you, ' + response.id + '.' + response.name + '.' + response.last_name + '.' + response.gender + '.' + response.username + '.' + response.birthday + '.' + response.email + '.' + MD5(response.id)  + '.' + tpCadastro );		       
		    });		    
		}
		
		window.fbAsyncInit = function(d, s, id) {
		    FB.init({
		      appId      : '457857360956126', // App ID
		      channelUrl : 'http://www.aulaon.com.br/channel.html', // Channel File
		      status     : true, // check login status
		      cookie     : true, // enable cookies to allow the server to access the session
		      xfbml      : true  // parse XFBML
		    });	
		     
		    FB.getLoginStatus(function(response) {
		    	  if (response.status === 'connected') {		    	    
		    		  //testAPI();// connected
		    		  //$('.registerM').hide();
		    	  } else if (response.status === 'not_authorized') {	
		    		  $('.registerM').show();	    	    
		    		 //login();// not_authorized
		    	  } else {		
		    		  $('.registerM').show();	    	    
		    		  //login();// not_logged_in
		    	  }
		    });
	  	};	
	  	
	  	$('#loginF').click(function(){
	  	    FB.login(function(response) {
	  	        if (response.authResponse) {
	  	        	 $('.registerM').hide();
	  	             buscarDados(response.authResponse.accessToken);
	  	        } else {
	  	            // cancelled
	  	        }
	  	    },{scope: 'email,user_birthday'});  	
	  	});		  		  
	});			  	
	
	// Load the SDK Asynchronously
	  (function(d){
	     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement('script'); js.id = id; js.async = true;
	     js.src = "//connect.facebook.net/pt_BR/all.js";
	     ref.parentNode.insertBefore(js, ref);
	   }(document));
	</script>
	<!--/face-->	
	
	<div id="escolha" style="display:none; cursor: default"> 
		<span><h3>Escolha qual cadastro deseja realizar </h3></span>
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
	
	<?php 
		if(!isset($_SESSION["nome_usuario"]))
		{
	 ?> 
	 <div class="contact_form">
	<div class="form_subtitle">Crie seu novo cadastro</div>
	

	

	<div class="automatico">
		<center>
			<a id="loginF" href="#">
				<img width="160px" src="imagens/botao-entrar-facebook.png"></img>
			</a>			
		</center>
	</div>
	<div class="manual">
		<center>
			<input class="registerM" type="submit" value="Cadastro Manual"/>
			<input style="display:none" class="voltar" type="submit" value="Voltar"/>			
		</center>
	</div>
	<form style="display:none" method="POST" id="cadastro" action="Cadastro_exec.php" >
    
	<div class="form_row">
    <label class="contact"><strong>Nome Completo:</strong></label>
    <input type="text" name="nome" id="nome"  class="contact_input"/>
    </div>
	
	<div class="form_row">
    <label class="contact"><strong>Email:</strong></label>
    <input type="text" name="email" id="email" class="contact_input"/>
    </div>
    
    <div class="form_row">
    <label class="contact"><strong>Data de nascimento:</strong></label>
    <input class="contact_input" type="text" name="dn" id="dn" maxlength="10" onkeypress="formatar('##/##/####', this)" />
    </div>
    
    <div class="form_row">
    <label class="contact"><strong>Tipo de Cadastro</strong></label>
    <div id="tpCadastro">
    <select name="tpCadastro" >
	    <option class="contact_input"  name="tpCadastro" value="Aluno" style="margin-left:30%;"/>Aluno</option>
	   	<option class="contact_input"  name="tpCadastro" value="Professor" style="margin-left:30%;"/>Professor</option>
    </select>
    </div>
    </div>
        
    <div class="form_row">
    <label class="contact"><strong>Sexo:</strong></label>
    <div id="sexo">
    <select name="sexo" >
    <option class="contact_input"  name="sexo" value="Masculino" style="margin-left:30%;"/>Masculino</option>
   	<option class="contact_input"  name="sexo" value="Feminino" style="margin-left:30%;"/>Feminino</option>
    </select>
    </div>
    </div>
    
    <div class="form_row">  
    <label class="contact"><strong>CPF:</strong></label>
    <input class="contact_input" type="text" name="cpf" id="cpf" maxlength="11" onkeypress="formatar('###########', this)"/>
    </div>  
 
    <div class="form_row">
    <label class="contact"><strong>Fone (DDD):</strong></label>
	<input class="contact_input" type="text" name="telefone" id="telefone" maxlength="11" onkeypress="formatar('##-########', this)"/>
    </div>
    
    <div class="form_row">
    <label class="contact"><strong>Cel (DDD):</strong></label>
	<input class="contact_input" type="text" name="celular" id="celular" maxlength="12" onkeypress="formatar('##-#########', this)"/>
    </div>
    
    <div class="form_row">
    <label class="contact"><strong>Senha:</strong></label>
    <input class="contact_input" type="password" name="senha" id="senha" size="24"/>
    </div>
    
    <div class="form_row">
    <label class="contact"><strong>Confirmar senha:</strong></label>
 	<input class="contact_input" type="password" name="confirmarsenha" id="confirmarsenha" size="24"/>
    </div>
	
	<div class="form_row">
    <div class="terms">
    <input type="checkbox" name="termos" id="termos"/>
              Eu concordo com os <a href="TermosCondicoes.php" rel="shadowbox;height=520;width=900">Termos &amp; Condições</a>                        
    </div>
    </div>
	<div class="form_row">
		<input class="register" type="submit" value="Enviar"/>		
	</div>
	
	<input type="hidden" name="face" id="face" value="0"/>
	</form> 
		</div>
	</div>
	 <?php 
    	}else{
			echo "<label class='contact'><strong>Deslogue para cadastrar-se</strong></label>";
		}
	 ?>   

	<div id="clear"></div>
	</div>
    <!--/conteudo-->

    <!--rodape-->
    <?php 
	include("RodapeComum.php");
	?>
    <!--/rodape-->
