<?php 
	include("Seguranca.php");
?>

	 <link rel="stylesheet" href="aluno/css/Status.css" />
	 
	 <script type="text/javascript" src="aluno/js/jquery.tablesorter.js"></script>
	 
	 
<!-- script para ordem alfabética da tabela -->
	 <script type="text/javascript">
	 	$(document).ready(function() 
		{ 
			$("#tabela").tablesorter({
				//organizado inicialmente pela quarta coluna
				sortList: [[3,1]]
			}); 

			$(".removerCampo").bind("click", function () {
				$("#tabela tr").remove();
			});
		});
		
	 </script>
	 
	<!--conteudo-->
    
    <div class="principal">
    	<h1><label id="titulo">Status das Aulas</label></h1>
    	<label id="periodo">Período da aula:</label>
    	
    	<select id="datas">
			<option class="mes" value="Inicio">desde o início</option>
			<option class="mes" value="Janeiro">Janeiro</option>
			<option class="mes" value="Fevereiro">Fevereiro</option>
			<option class="mes" value="Março">Março</option>
			<option class="mes" value="Abril">Abril</option>
			<option class="mes" value="Maio">Maio</option>
			<option class="mes" value="Junho">Junho</option>
			<option class="mes" value="Julho">Julho</option>
			<option class="mes" value="Agosto">Agosto</option>
			<option class="mes" value="Setembro">Setembro</option>
			<option class="mes" value="Outubro">Outubro</option>
			<option class="mes" value="Novembro">Novembro</option>
			<option class="mes" value="Dezembro">Dezembro</option>
		</select>

		<table id="tabela">
		<thead>
			<tr>
				<th>Professor</th>
				<th>Aula</th>
				<th>Nível</th>
				<th>Data da aula</th>
				<th>Início</th>
				<th>Término</th>
				<th>Avaliação concedida</th>
				<th>Valor (R$)</th>
				<th>Status</th>
				<th>Cancelar</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Rodrigo Farias da Silva</td>
				<td>Algoritmos I</td>
				<td>Ensino Superior</td>
				<td>12/11/2012</td>
				<td>15:00</td>
				<td>16:00</td>
				<td>(Star Raters)</td>
				<td>45,00</td>
				<td>Realizada</td>
				<td></td>
			</tr>
			<tr>
				<td>Rodrigo Farias da Silva</td>
				<td>Algoritmos I</td>
				<td>Ensino Superior</td>
				<td>01/03/2013</td>
				<td>14:00</td>
				<td>15:00</td>
				<td>(Star Raters)</td>
				<td>55,00</td>
				<td>Realizada</td>
				<td></td>
			</tr>
			<tr>
				<td>Rodrigo Farias da Silva</td>
				<td>Algoritmos I</td>
				<td>Ensino Superior</td>
				<td>04/04/2013</td>
				<td>10:00</td>
				<td>11:00</td>
				<td>(Star Raters)</td>
				<td>65,00</td>
				<td>Pendente</td>
				<td><a class='removerCampo' href='#'><img src='../imagens/error.png' border='0' /></a></td>
			</tr>
			<tr>
				<td>Rodrigo Farias da Silva</td>
				<td>Algoritmos I</td>
				<td>Ensino Superior</td>
				<td>14/04/2013</td>
				<td>19:00</td>
				<td>20:00</td>
				<td>(Star Raters)</td>
				<td>65,00</td>
				<td>Pendente</td>
				<td><a  style='float:center' class='removerCampo' href='#'><img src='../imagens/error.png' border='0' /></a></td>
			</tr>
		</tbody>
		</table> 
    	
    </div>

    <!--/conteudo-->