<!DOCTYPE html>
<html>
<head>
    
    <script language="javascript" type="text/javascript" src="js/jquery-1.8.3.js"></script>
    <script src="js/jqueryui-1.9.2.js"></script>
    
    <link rel="stylesheet" href="css/VerHorario.css" />
    
	<script>
		function limpar() { 
			
		}
	</script>
	
	<script>
			$(document).ready( function (){ 
			    $("#salvar").click(function(){ 
					window.parent.Shadowbox.close();
				    });
			 });
	</script>
	
	
   
</head>

<body>
    
    <label id="titulo"><strong>Clique nos horários que deseja agendar e especifique a aula</strong></label><br><br>
    
    <table class="tabela">
    	<tr>
			<th>D</th>
			<th>S</th>
			<th>T</th>
			<th>Q</th>
			<th>Q</th>
			<th>S</th>
			<th>S</th>
		</tr>
		<tr>
<!-- quando o aluno clicar sobre o horário para agendar, acrescentar class="agendado" ao <a> -->

<!-- quando o aluno clicar sobre o horário para desmarcar, retirar class="agendado" do <a> -->
			<td><a href="" class="agendado">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
		</tr>
		<tr>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="" class="agendado">11:00 às 12:00</a></td>
			<td><a href="" class="agendado">11:00 às 12:00</a></td>
		</tr>
		<tr>
			<td><a href="" class="agendado">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="" class="agendado">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
			<td><a href="">11:00 às 12:00</a></td>
		</tr>
	</table>
	
<!-- Botões para Agendar a aula e para Limpar os horários que foram selecionados -->
	<input id="salvar" class="botao" type="submit" onClick="salvar()" value="Agendar"/>
    <input id="limpar" class="botao" type="submit" onClick="limpar()" value="Limpar"/>
</body>
</html>