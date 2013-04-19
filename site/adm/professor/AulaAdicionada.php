<?php 
	include("Seguranca.php");
?>
	<link rel="stylesheet" href="professor/css/AulaAdicionada.css" />
	
	<script type="text/javascript" src="professor/js/jquery.tablesorter.js"></script>
	 
	 
<!-- script para ordem alfabética da tabela -->
	 <script type="text/javascript">
	 	$(document).ready(function() 
		{ 
			$("#tabela").tablesorter({
				//organizado inicialmente pela quarta coluna
				sortList: [[0,0]]
			}); 

				$(".removerCampo").bind("click", function () {
					$("#tabela tr").remove();
				});
			});
	 </script>
	<!--conteudo-->
    
    	<div class="principal">
    		<h1><label id="titulo">Aulas Adicionadas</label></h1>
 
    	
		<table id="tabela">
		<thead>
			<tr>
				<th>Aula</th>
				<th>Nível</th>
				<th>Valor p/ Hora (R$)</th>
				<th>Remover</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Matemática</td>
				<td>Ensino Fundamental</td>
				<td>30,00</td>
				<td><a  style='float:center' class='removerCampo' href='#'><img src='../imagens/error.png' border='0' /></a></td>
			</tr>
			<tr>
				<td>Matemática</td>
				<td>Ensino Médio</td>
				<td>50,00</td>
				<td><a  style='float:center' class='removerCampo' href='#'><img src='../imagens/error.png' border='0' /></a></td>
			</tr>
		</tbody>
		</table> 
    	

    	</div>
    	
  
	<!--/conteudo-->