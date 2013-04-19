//Combo Box
$(document).ready(function(){
	if($('.comboBox').size() > 0){
		
		$('.comboBox').hide();
		var valorDefault = $(".comboBox option:selected").val();
		
		$('.comboBox').after("<div class='NFSelect' style='z-index:999'><img src='imagens/0.png' class='NFSelectLeft'><div class='NFSelectRight'>"+valorDefault+"</div><div class='NFSelectTarget' style='display:none; width:128px;'><ul class='NFSelectOptions' style='width:95px;'></ul></div></div>");
		$(".comboBox option").each(function(){
			if(valorDefault  == $(this).val()){
				$('.NFSelectOptions').append("<li><a id='"+$(this).val()+"' href='Javascript:void(0);' class='NFOptionActive'>"+$(this).val()+"</a></li>");
			}else{
				$('.NFSelectOptions').append("<li><a id='"+$(this).val()+"' href='Javascript:void(0);'>"+$(this).val()+"</a></li>");
			}
			$(this).val()
		});
		
		$('.NFSelectRight').click(function(){		
			if($('.NFSelectTarget:hidden').length > 0){
				$('.NFSelectTarget:hidden').show();
			}else{
				$('.NFSelectTarget:visible').hide();
			}		
		});	
		
		$('.NFSelectOptions a').click(function(){		
			var valorSelecionado = $(this).attr("id");
			$('.NFOptionActive').removeClass('NFOptionActive');
			$(this).addClass('NFOptionActive');
			$('.NFSelectRight').html(valorSelecionado);
			$('.NFSelectTarget:visible').hide();
			
		});	
		$('.NFSelectTarget, .NFSelectOptions').mouseleave(function(){
			$('.NFSelectTarget:visible').hide();
		})
	
	}
});