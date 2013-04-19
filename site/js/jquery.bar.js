$(document).ready(function(){
	
	$('body').append('<center><div class="mensagem"></div></center>');	
	$('body').append('<center><div class="mensagem2"></div></center>');	
	
	var codigoUrl		= buscaValorQueryString("codigo");

	if(codigoUrl!="" && codigoUrl != null){
		var mensagem	= buscaMensagem(codigoUrl);
		mostraMensagem(mensagem[0],mensagem[1]);
	}
	
});

function buscaMensagem(codigo){
	
	var mensagem = new Array();

	switch(codigo){
	case ("1"):
		mensagem[0] = "Não foi possível realizar o cadastro, por favor tente novamente mais tarde.";//Erro no cadastro
		mensagem[1]	= false;
		break;
	case ("2"):
		mensagem[0] = "Cadastro realizado com sucesso, faça login para acessar o painel administrativo.";
		mensagem[1]	= true;
		break;
	case ("3"):
		mensagem[0] = "Sua senha expirou, foi enviado um email com uma nova senha!";
		mensagem[1]	= false;
		break;		
	case ("4"):
		mensagem[0] = "Email ou senha incorreto";
		mensagem[1]	= false;
		break;			
	case ("5"):
		mensagem[0] = "Você não tem permissão para acessar esta página.";
		mensagem[1]	= false;
		break;		
	case ("6"):
		mensagem[0] = "Não foi possível iniciar a compra, por favor tente novamente, se o erro persistir entre em contato com a nossa central.";
		mensagem[1]	= false;
		break;	
	case ("7"):
		mensagem[0] = "Para realizar uma compra escolha um valor.";
		mensagem[1]	= false;
		break;		
	case ("8"):
		mensagem[0] = "Email já cadastrado.";
		mensagem[1]	= false;
		break;		
	case ("9"):
		mensagem[0] = "Tipo de cadastro inexistente, realize o processo normalmente";
		mensagem[1]	= false;
		break;				
	default:
		mensagem[0] = "Ocorreu um erro durante o processamento da sua informação, por favor tente novamente.";
		mensagem[1]	= false;
	}
	
	return mensagem;	
}

function mostraMensagem(mensagem,tipo){
	
	$(".mensagem").bar({
		color 			 : '#FFFFFF',
		background_color : ((tipo) ? '#548B54':'#FF0000'),//verde e vermelho
		removebutton     : false,
		time			 : 8000,
		message			 : mensagem
	});
	
	$(".mensagem").click();
}

function buscaValorQueryString(variavel){
	
	queryString = 	new Array();
	variaveis	=	location.search.replace(/\x3F/,"").replace(/\x2B/g," ").split("&");
	
	if(variaveis!=""){
		for(i=0;i<variaveis.length;i++){
			nvar					=	variaveis[i].split("=");
			queryString[nvar[0]]	=	unescape(nvar[1]);
		}
	}	
	
	return queryString[variavel];
	
}

(function($) {
	
	$.fn.bar = function(options) {
		var opts = $.extend({}, $.fn.bar.defaults, options);
		return this.each(function() {
			$this = $(this);
			var o = $.meta ? $.extend({}, opts, $this.data()) : opts;
			
			$this.click(function(e){
				if(!$('.jbar').length){
					timeout = setTimeout('$.fn.bar.removebar()',o.time);
					var _message_span = $(document.createElement('span')).addClass('jbar-content').html(o.message);
					_message_span.css({"color" : o.color});
					var _wrap_bar;
					(o.position == 'bottom') ? 
					_wrap_bar	  = $(document.createElement('div')).addClass('jbar jbar-bottom'):
					_wrap_bar	  = $(document.createElement('div')).addClass('jbar jbar-top') ;
					
					_wrap_bar.css({"background-color" 	: o.background_color});
					if(o.removebutton){
						var _remove_cross = $(document.createElement('a')).addClass('jbar-cross');
						_remove_cross.click(function(e){$.fn.bar.removebar();})
					}
					else{				
						_wrap_bar.css({"cursor"	: "pointer"});
						_wrap_bar.click(function(e){$.fn.bar.removebar();})
					}	
					_wrap_bar.append(_message_span).append(_remove_cross).hide().insertBefore($('.mensagem')).fadeIn('slow');
				}
			})
			
			
		});
	};
	var timeout;
	$.fn.bar.removebar 	= function(txt) {
		if($('.jbar').length){
			clearTimeout(timeout);
			$('.jbar').fadeOut('fast',function(){
				$(this).remove();
			});
		}	
	};
	$.fn.bar.defaults = {
		background_color 	: '#FFFFFF',
		color 				: '#000',
		position		 	: 'top',
		removebutton     	: true,
		time			 	: 5000	
	};
	
})(jQuery);