<?php 
	include("Seguranca.php");
?>

	 <link rel="stylesheet" href="professor/css/Extrato.css" />
	 
	 <script type="text/javascript" src="professor/js/jquery.tablesorter.js"></script>
	 
	 
<!-- script para ordem alfabética da tabela -->
	 <script type="text/javascript">
	 	$(document).ready(function() 
		{ 
			$("#tabela").tablesorter({
				//organizado inicialmente pela quarta coluna
				sortList: [[3,1]]
			}); 
		});
		
	 </script>
	 
	<!--conteudo-->
    
    <div class="principal">
    	<h1><label id="titulo">Extrato da Conta</label></h1>
    	<label id="saldo">Saldo Líquido: R$ 230,00</label>
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
				<th>Aluno</th>
				<th>Aula</th>
				<th>Nível</th>
				<th>Data da aula</th>
				<th>Horário de início</th>
				<th>Horário de término</th>
				<th>Avaliação recebida</th>
				<th>Data do depósito</th>
				<th>Valor Bruto(R$)</th>
				<th>Valor Líquido(R$)</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Rodrigo Farias da Silva</td>
				<td>Matemática</td>
				<td>Ensino Fundamental</td>
				<td>12/11/2012</td>
				<td>15:00</td>
				<td>16:00</td>
				<td>(Star Raters)</td>
				<td>12/11/2014</td>
				<td>50,00</td>
				<td>45,00</td>
				<td>Confirmado</td>
			</tr>
			<tr>
				<td>Adriano Souza da Silva</td>
				<td>Matemática</td>
				<td>Ensino Médio</td>
				<td>01/05/2013</td>
				<td>14:00</td>
				<td>15:00</td>
				<td>(Star Raters)</td>
				<td>04/02/2013</td>
				<td>60,00</td>
				<td>55,00</td>
				<td>Confirmado</td>
			</tr>
			<tr>
				<td>Bruno Pereira Melo</td>
				<td>Algoritmos I</td>
				<td>Ensino Superior</td>
				<td>04/03/2013</td>
				<td>10:00</td>
				<td>11:00</td>
				<td>(Star Raters)</td>
				<td>04/03/2013</td>
				<td>70,00</td>
				<td>65,00</td>
				<td>Pendente</td>
			</tr>
			<tr>
				<td>Janaína Pereira Melo</td>
				<td>Algoritmos I</td>
				<td>Ensino Superior</td>
				<td>04/04/2013</td>
				<td>19:00</td>
				<td>20:00</td>
				<td>(Star Raters)</td>
				<td>04/04/2013</td>
				<td>70,00</td>
				<td>65,00</td>
				<td>Pendente</td>
			</tr>
		</tbody>
		</table> 
    	
    </div>

    <!--/conteudo-->