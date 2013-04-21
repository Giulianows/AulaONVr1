<?php 
	include("Seguranca.php");
?>
<!--conteudo-->
    <link rel="stylesheet" href="professor/css/Editar.css" />
	<link rel="stylesheet" href="css/style.css" />
	
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
}, "<img src=\"Imagens/error.png\">");
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
}, "<img src=\"Imagens/error.png\">");

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
			required: "<img src=\"Imagens/error.png\">",
			minlength: "<img src=\"Imagens/error.png\">"
			 },
		sobrenome:{
			required: "<img src=\"Imagens/error.png\">"
		  },
		email:{
			required: "<img src=\"Imagens/error.png\">",
			email: "<img src=\"Imagens/error.png\">"
		},
		dn:{
			required: "<img src=\"Imagens/error.png\">"
			},
		telefone:{
			required: "<img src=\"Imagens/error.png\">"
			},
		celular:{
			required: "<img src=\"Imagens/error.png\">"
			},
		cpf:{
			required: "<img src=\"Imagens/error.png\">"
			},
		senha:{
			required: "<img src=\"Imagens/error.png\">"
		},
		confirmarsenha:{
			required: "<img src=\"Imagens/error.png\">",
			equalTo: "Incorreto!"
		},
		termos: "<img src=\"Imagens/error.png\">"
	}
	});	
  });
</script>

	 <script type="text/javascript">
		window.onload = function() {
			$("#BotaoEducacao").css({"background-color" : "orange", "color" : "black"});
			
		};
			
	    $(function(){
	        $("#BotaoEducacao")
	            .click(function(){
	            	$(this).css({"background-color" : "orange", "color" : "black"});
	            	$("#BotaoTrabalho").css("background-color","#fff");
	            	$("#BotaoDB").css("background-color","#fff");
	            	$("#BotaoIB").css("background-color","#fff");
	                $("#Educacao").toggle();
	                $("#Trabalho").hide();
	                $("#Banco").hide();
	                $(".contact_form").hide();
	            });
	        $("#BotaoTrabalho")
            .click(function(){
            	$(this).css({"background-color" : "orange", "color" : "black"});
            	$("#BotaoEducacao").css("background-color","#fff");
            	$("#BotaoDB").css("background-color","#fff");
            	$("#BotaoIB").css("background-color","#fff");
                $("#Trabalho").toggle();
                $("#Educacao").hide();
                $("#Banco").hide();
                $(".contact_form").hide();
               
            });

	        $("#BotaoDB")
            .click(function(){
            	$(this).css({"background-color" : "orange", "color" : "black"});
            	$("#BotaoTrabalho").css("background-color","#fff");
            	$("#BotaoEducacao").css("background-color","#fff");
            	$("#BotaoIB").css("background-color","#fff");
            	$("#Banco").toggle();
                $("#Educacao").hide();
                $("#Trabalho").hide();
                $(".contact_form").hide();
            });
            
	        $("#BotaoIB")
            .click(function(){
            	$(this).css({"background-color" : "orange", "color" : "black"});
            	$("#BotaoTrabalho").css("background-color","#fff");
            	$("#BotaoEducacao").css("background-color","#fff");
            	$("#BotaoDB").css("background-color","#fff");
                $(".contact_form").toggle();
                $("#Educacao").hide();
                $("#Trabalho").hide();
                $("#Banco").hide();
            });
	    });
	</script>
	
	<script>
		function conta()
		{
			valor = document.getElementById('texto').value
			tam = valor.length
			document.getElementById('numero').innerHTML = tam
		}
	</script>
	
	<script>
	$(function(){
        $("#termos1")
            .click(function(){
            	if( $(this).attr("checked")){
            		$('#termino1').attr("disabled", true);
            		$('#termino1').css("background-color", "#E0E0E0");}
            	else{
                	$('#termino1').css("background-color", "#fff");
                	$('#termino1').attr("disabled", false);}
        });

        $("#termos2")
        .click(function(){
        	if( $(this).attr("checked")){
        		$('#termino2').attr("disabled", true);
        		$('#termino2').css("background-color", "#E0E0E0");}
        	else{
            	$('#termino2').css("background-color", "#fff");
            	$('#termino2').attr("disabled", false);}
        });

        $("#termos3")
        .click(function(){
        	if( $(this).attr("checked")){
        		$('#termino3').attr("disabled", true);
        		$('#termino3').css("background-color", "#E0E0E0");}
        	else{
            	$('#termino3').css("background-color", "#fff");
            	$('#termino3').attr("disabled", false);}
        });
	});
	</script>
	
	<!--  <script>
    $(function() {
        $( ".datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
	</script>-->
	
    <div class="principal">
    
    	<div id="botoes">
			  <input id="BotaoEducacao" class="botao" type="submit" value="Educação"/>
			  <input id="BotaoTrabalho" class="botao" type="submit" value="Trabalho"/>
			  <input id="BotaoDB" class="botao" type="submit" value="Dados Bancários"/>
			  <input id="BotaoIB" class="botao" type="submit" value="Informações Básicas"/>
	    </div><br>
	    
<!-- ABA INFORMAÇÕES BÁSICAS -->
    
    <div class="contact_form" style="height: 250px">
		<div class="form_subtitle">Edite seu cadastro</div>
		<form method="POST" id="cadastro" action="Cadastro_exec.php" >
	    
		<div class="form_row">
	    <label class="contact"><strong>Nome Completo:</strong></label>
	    <input style="margin-top: 0px;" type="text" name="nome" id="nome"  class="contact_input"/>
	    </div>
		
		<div class="form_row">
	    <label class="contact"><strong>Email:</strong></label>
	    <input type="text" name="email" id="email" class="contact_input"/>
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
	    <label class="contact"><strong>Senha atual:</strong></label>
	    <input class="contact_input" type="password" name="senha" id="senha" size="24"/>
	    </div>
	    
	    <div class="form_row">
	    <label class="contact"><strong>Nova senha:</strong></label>
	    <input class="contact_input" type="password" name="senha" id="senha" size="24"/>
	    </div>
	    
	    <div class="form_row">
	    <label class="contact"><strong>Confirmar nova senha:</strong></label>
	 	<input class="contact_input" type="password" name="confirmarsenha" id="confirmarsenha" size="24"/>
	    </div>
		
		<div id="register" class="form_row">
		<input class="register" type="submit" value="Salvar"/>
		</div>
		</form> 
	</div>
	
<!-- ABA EDUCAÇÃO -->
	<script type="text/javascript"> 
	function FuncaoToggle(){
		
	var valueSelected = document.getElementById('escolaridade').value; 
	
	if (valueSelected == 'EMedioCursando') {
		$("#Igraduacao").hide();
		$("#Cgraduacao").hide();
		$("#Imestrado").hide();
		$("#Amestrado").hide();
		$("#Idoutorado").hide();
		$("#Adoutorado").hide();
	} 
	if (valueSelected == 'EMedioCompleto') {
		$("#Igraduacao").hide();
		$("#Cgraduacao").hide();
		$("#Imestrado").hide();
		$("#Amestrado").hide();
		$("#Idoutorado").hide();
		$("#Adoutorado").hide();
	}
	if (valueSelected == 'GraduacaoCursando') {
		$("#Igraduacao").show();
		$("#Cgraduacao").show();
		$("#Imestrado").hide();
		$("#Amestrado").hide();
		$("#Idoutorado").hide();
		$("#Adoutorado").hide();
		}
	if (valueSelected == 'GraduacaoCompleto') {
		$("#Igraduacao").show();
		$("#Cgraduacao").show();
		$("#Imestrado").hide();
		$("#Amestrado").hide();
		$("#Idoutorado").hide();
		$("#Adoutorado").hide();
		}
	if (valueSelected == 'MestradoCursando') {
		$("#Igraduacao").show();
		$("#Cgraduacao").show();
		$("#Imestrado").show();
		$("#Amestrado").show();
		$("#Idoutorado").hide();
		$("#Adoutorado").hide();
		}
	if (valueSelected == 'MestradoCompleto') {
		$("#Igraduacao").show();
		$("#Cgraduacao").show();
		$("#Imestrado").show();
		$("#Amestrado").show();
		$("#Idoutorado").hide();
		$("#Adoutorado").hide();
		}
	if (valueSelected == 'DoutoradoCursando') {
		$("#Igraduacao").show();
		$("#Cgraduacao").show();
		$("#Imestrado").show();
		$("#Amestrado").show();
		$("#Idoutorado").show();
		$("#Adoutorado").show();
		}
	if (valueSelected == 'DoutoradoCompleto') {
		$("#Igraduacao").show();
		$("#Cgraduacao").show();
		$("#Imestrado").show();
		$("#Amestrado").show();
		$("#Idoutorado").show();
		$("#Adoutorado").show();
		}
	}
	</script>
	
	<div id="Educacao">
	
		<div class="form_subtitle">Experiência Educacional</div>
		<form method="POST" id="Educacional" action="" >
		
		<div class="form_roww">
	    <select id="escolaridade" onchange="FuncaoToggle();">
	   		<option class="contact_input" value="Escolaridade">Escolaridade</option>
			<option class="contact_input" value="EMedioCursando">Ensino médio - cursando</option>
			<option class="contact_input" value="EMedioCompleto">Ensino médio - completo</option>
			<option class="contact_input" value="GraduacaoCursando">Graduação - cursando</option>
			<option class="contact_input" value="GraduacaoCompleto">Graduação - completo</option>
			<option class="contact_input" value="MestradoCursando">Mestrado - cursando</option>
			<option class="contact_input" value="MestradoCompleto">Mestrado - completo</option>
			<option class="contact_input" value="DoutoradoCursando">Doutorado - cursando</option>
			<option class="contact_input" value="DoutoradoCompleto">Doutorado - completo</option>
	    </select>
	    </div>
	    
	    <div class="form_row" id="Lattes">
	    <label class="item"><strong>Currículo Lattes:</strong></label>
	    <input type="text"  class="item_input"/>
	    </div>
	    
		<div class="form_row" id="Imedio">
	    <label class="item"><strong>Ensino Médio (instituição):</strong></label>
	    <input type="text"  class="item_input"/>
	    </div>
		
		<div class="form_row" id="Igraduacao">
	    <label class="item"><strong>Instituição de Graduação:</strong></label>
	    <input type="text"  class="item_input"/>
	    </div>
	 
	    <div class="form_row" id="Cgraduacao">
	    <label class="item"><strong>Curso de Graduação:</strong></label>
		<input class="item_input" type="text"/>
	    </div>
	    
	    <div class="form_row" id="Imestrado">
	    <label class="item"><strong>Instituição de Mestrado:</strong></label>
		<input class="item_input" type="text" />
	    </div>
	    
	    <div class="form_row" id="Amestrado">
	    <label class="item"><strong>Área de Mestrado:</strong></label>
	    <input class="item_input" type="text" />
	    </div>
	    
	    <div class="form_row" id="Idoutorado">
	    <label class="item"><strong>Instituição de Doutorado:</strong></label>
	    <input class="item_input" type="text" />
	    </div>
	    
	    <div class="form_row" id="Adoutorado">
	    <label class="item"><strong>Área de Doutorado:</strong></label>
	 	<input class="item_input" type="text" />
	    </div>
		
		<div class="form_row">
					<table id="perfil">
					    <label class="item"><strong>Outros Cursos:</strong></label> 
						<tr> 
					    	<td><textarea id="texto" rows="5" cols="30" onKeyUp="conta()" onKeyDown="conta()" maxlength="300"></textarea></td>
					    </tr>
					    <tr> 
					   		<td><p>Máximo de 300 caracteres:<span id="numero">0</span></p></td>
					   	</tr>
				   </table>
		</div>
		
		<div id="register" class="form_row">
		<input class="register" type="submit" value="Salvar"/>
		</div>
		
		</form> 
	</div>
	
<!-- ABA TRABALHO -->
	
	<div id="Trabalho">
	
	<div class="form_subtitle">Experiência Profissional</div>
	
		<div class="form_row">
	    	<label class="item"><strong>Empresa:</strong></label>
	    	<input type="text"  class="item_input"/>
	    </div>
		
		<div class="form_row">
	    	<label class="item"><strong>Cargo:</strong></label>
	    	<input type="text"  class="item_input"/>
	    </div>
	    
	    <div class="form_row">
	    <label class="item"><strong>Início:</strong></label>
    	<input type="text" name="tab" class="datepicker" maxlength="10" onkeypress="formatar('##/##/####', this)"/>
    	</div>
    	
    	<div class="form_row">
    	<label class="item"><strong>Término:</strong></label> 
    	<input type="text" name="tab2" id="termino1" class="datepicker" maxlength="10" onkeypress="formatar('##/##/####', this)"/>
		</div>
		
		<div class="form_row">
    	<div class="terms">
    	<input type="checkbox" name="termos" id="termos1"/>
        <p>Atual</p>                        
    	</div>
    	</div>
		
		<div class="form_row">
	    	<label class="item"><strong>Empresa:</strong></label>
	    	<input type="text"  class="item_input"/>
	    </div>
		
		<div class="form_row">
	    	<label class="item"><strong>Cargo:</strong></label>
	    	<input type="text"  class="item_input"/>
	    </div>
	    
	    <div class="form_row">
	    <label class="item"><strong>Início:</strong></label>
    	<input type="text" name="tab" class="datepicker" maxlength="10" onkeypress="formatar('##/##/####', this)"/>
    	</div>
    	
    	<div class="form_row">
    	<label class="item"><strong>Término:</strong></label> 
    	<input type="text" name="tab2" id="termino2" class="datepicker" maxlength="10" onkeypress="formatar('##/##/####', this)"/>
		</div>
		
		<div class="form_row">
    	<div class="terms">
    	<input type="checkbox" name="termos" id="termos2"/>
        <p>Atual</p>                        
    	</div>
    	</div>
		
		<div class="form_row">
	    	<label class="item"><strong>Empresa:</strong></label>
	    	<input type="text"  class="item_input"/>
	    </div>
		
		<div class="form_row">
	    	<label class="item"><strong>Cargo:</strong></label>
	    	<input type="text"  class="item_input"/>
	    </div>
	    
	    <div class="form_row">
	    <label class="item"><strong>Início:</strong></label>
    	<input type="text" name="tab" class="datepicker" maxlength="10" onkeypress="formatar('##/##/####', this)"/>
    	</div>
    	
    	<div class="form_row">
    	<label class="item"><strong>Término:</strong></label> 
    	<input type="text" name="tab2" id="termino3" class="datepicker" maxlength="10" onkeypress="formatar('##/##/####', this)"/>
		</div>
		
		<div class="form_row">
    	<div class="terms">
    	<input type="checkbox" name="termos" id="termos3"/>
        <p>Atual</p>                        
    	</div>
    	</div>
		
		<div id="register" class="form_row">
		<input class="register" type="submit" value="Salvar"/>
		</div>
	</div>
	
<!-- ABA DADOS BANCÁRIOS -->

	<div id="Banco">
		<div class="form_subtitle">Informações Bancárias</div>
	
		<div class="form_row">
	    	<label class="item"><strong>Banco:</strong></label>
	    	<input type="text"  class="item_input"/>
	    </div>
		
		<div class="form_row">
	    	<label class="item"><strong>Agência:</strong></label>
	    	<input type="text"  class="item_input"/>
	    </div>
	    
	    <div class="form_row">
	    	<label class="item"><strong>Conta Corrente:</strong></label>
	    	<input type="text"  class="item_input"/>
	    </div>
	    
	    <div id="register" class="form_row">
		<input class="register" type="submit" value="Salvar"/>
		</div>
	
	</div>
	
    	</div>
    
<!--/conteudo-->