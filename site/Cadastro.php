<?php 
	include("PadraoComum.php");
?>
	
    <link rel="stylesheet" href="css/Cadastro.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/jquery-ui-calendarioCadastro.css" />
	<link rel="stylesheet" href="css/shadowbox.css" />
	
	<script language="javascript" type="text/javascript" src="js/shadowbox.js"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	<script language="javascript" type="text/javascript" src="js/jqueryui-calendarioCadastro.js"></script>
	

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

	 <!--conteudo-->
    <div class="conteudo">
	<div class="principal">
	<div class="contact_form">
	<div class="form_subtitle">Crie seu novo cadastro</div>
	<form method="POST" id="cadastro" action="Cadastro_exec.php" >
    
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
	
	
	</form> 
	</div>
	</div>
	<div id="clear"></div>
	</div>
    <!--/conteudo-->
    <!--rodape-->
    <?php 
	include("RodapeComum.php");
	?>
    <!--/rodape-->
