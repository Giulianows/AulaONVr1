<?php 
	include("Seguranca.php");
?>
    <link rel="stylesheet" href="aluno/css/Comprar.css" />
	
	<script type="text/javascript">
	$(document).ready(function(){	
		
		$('.NFSelectOptions a').click(function(){	
			var valorSelecionado = $(this).attr("id");
			$('#valorDeCompra').val(valorSelecionado);
			$('.NFSelectRight').html("R$"+valorSelecionado);
			$('.comprar').attr("href",'aluno/ComprarSeguro.php?valor='+valorSelecionado);							
		});
		
	});	

	</script>
	
	<script language="javascript">
		var win = null;
		function NovaJanela(pagina,nome,w,h,scroll){
			LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
			TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
			settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'

			win = window.open(pagina,nome,settings);
		}
	</script>
	
	<!--conteudo-->
    
    <div class="principal">
    
    	<h2 id="textocompra">Compre créditos e veja suas informações referente a compra</h2>
    	<div id="tudocompra">   
    	<div class="comboBox">
    	<?php for($i=10; $i<=100; $i+=10){?>		       	 				
    			<input value="<?php echo $i ?>">R$ <?php echo $i ?>
		<?php }?>   
    	</div>
    	<div class="NFSelect" style="z-index: 999;">
    		<img src="imagens/0.png" class="NFSelectLeft">
    			<div class="NFSelectRight">R$ 10</div>
    			<div class="NFSelectTarget" style="display: none; width: 128px;">
    				<ul class="NFSelectOptions" style="width: 95px;">
		    			<?php for($i=10; $i<=200; $i+=10){?>		    				
			    			<li>
			    				<a id="<?php echo $i ?>" class="<?php echo  ($i==10) ? "NFOptionActive":"";?>" href="javascript:;">R$ <?php echo $i ?></a>
			    			</li>
			    		<?php }?>    			
	    			</ul>
    			</div>
    	</div>
<!--      	<a rel="shadowbox;height=600;width=800" href="aluno/ComprarSeguro.php?valor=10" id="comprar" class="comprar"> -->
		<a href="aluno/ComprarSeguro.php?valor=10" id="comprar" class="comprar" onclick="NovaJanela(this.href,'Pagamento','800','600','yes');return false">   		
     		<img class="btn_comprar"  src="aluno/imagens/botao_comprar.fw.png" alt="Comprar">
     	</a>
    </div>
    </div>
    
    <form action="" method="post">
    	<input type="hidden" name="valorDeCompra" id="valorDeCompra" value="10" />
    </form>
    
    <!--/conteudo-->
