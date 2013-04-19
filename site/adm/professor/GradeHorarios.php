<?php 
	include("Seguranca.php");
?>
 	<link rel="stylesheet" href="professor/css/Aulas.css" />
    <link rel="stylesheet" href="../css/shadowbox.css" />
    <link rel="stylesheet" href="professor/css/grades.css" />

	<script src="../js/shadowbox.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function(){
		Shadowbox.init
		({
			language: 'pt',
			player: ['img', 'html', 'swf']
		});	
	});
    </script>
	
	<script>

  </script>	

	<!--conteudo-->
    
    	<div class="principal">	
			<div id="datasemana">
				<br>
				<h1>Clique nos dias e agende os horários disponíveis para a próxima semana</h1><br>
			</div>
			<div class="todasemana">
			<div id="dom" name="domingo"  class="dsemana">
				<a rel="shadowbox;height=520;width=520" href="professor/CadastroHorario.php?dia=1"  ><img id="domingo" class="semana" src="../imagens/domingo.png" border="0" width="82" height="28"></a>
			</div>
			
			<div id="seg" name="segunda-feira" class="dsemana">
				<a rel="shadowbox;height=520;width=520" href="professor/CadastroHorario.php?dia=2" ><img id="segunda" class="semana" src="../imagens/segunda.png" border="0" width="139" height="27"></a><br>
			</div>
			
			<div id="ter" name="terça-feira" class="dsemana">
				<a rel="shadowbox;height=520;width=520" href="professor/CadastroHorario.php?dia=3" ><img id="terca" class="semana" src="../imagens/terca.png" border="0" width="118" height="31"></a><br>
			</div>
			
			<div id="qua" name="quarta-feira" class="dsemana">
				<a rel="shadowbox;height=520;width=520" href="professor/CadastroHorario.php?dia=4" ><img id="quarta" class="semana" src="../imagens/quarta.png" border="0" width="132" height="29"></a><br>
			</div>
			
			<div id="qui" name="quinta-feira" class="dsemana">
				<a rel="shadowbox;height=520;width=520" href="professor/CadastroHorario.php?dia=5" ><img id="quinta" class="semana" src="../imagens/quinta.png" border="0" width="130" height="26"></a><br>
			</div>
			
			<div id="sex" name="sexta-feira" class="dsemana">
				<a rel="shadowbox;height=520;width=520" href="professor/CadastroHorario.php?dia=6" ><img id="sexta" class="semana" src="../imagens/sexta.png" border="0" width="118" height="30"></a><br>
			</div>
			
			<div id="sab" name="sabado" class="dsemana">
				<a rel="shadowbox;height=520;width=520" href="professor/CadastroHorario.php?dia=7" ><img id="sabado" class="semana" src="../imagens/sabado.png" border="0" width="67" height="24"></a><br>
			</div>
			
	<!--    <div id="gradesalva" class="gradesalva">
  		  	<p id="gradesalva">Adicione aqui a grades que deseja salvar</p>
  			<ul id="carrinho-produtos" class="ui-droppable"></ul>
			</div> 
			
			<div id="lixeira" class="lixeira">
  			<a  class='lixo' title='Lixeira'><img src='../imagens/lixeira.png'/></a>
			</div>  -->
			</div>
		</div>
    
    <!--/conteudo-->