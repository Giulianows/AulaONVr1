<?php 
	include("Seguranca.php");
?>
<html>
<head>
    <script language="javascript" type="text/javascript" src="../js/jquery-1.8.3.js"></script>
    <script src="../js/jqueryui-1.9.2.js"></script>
    <script src="../../js/datetimepicker.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
    <link rel="stylesheet" href="../../css/timepicker.css" />
    <link rel="stylesheet" href="css/CadastroHorario.css" />
    
    <script>
    	$(function() {
        	$( ".datepicker" ).timepicker();
    	});
    </script>
    
    <script type="text/javascript">
    
		$(document).ready(function(){
        $("input.datepicker").mask("99:99");
	});
	</script>
   
</head>
<?php 
	$idProfessor	= (isset($_SESSION["idEspecifico"])) ?$_SESSION["idEspecifico"]:"";
	$diaSemana		=(isset($_GET["dia"])) ? $_GET["dia"]:"";
	include "../conecta_mysql.php";
	
	$horarios	= mysql_query("SELECT Nome, Hora_Inicio, Hora_Fim FROM Professor_Horarios WHERE Professor_Id = '$idProfessor' AND Dia_Semana_Id = '$diaSemana' AND Ativo = 1 ORDER BY Hora_Inicio");
	$nomeGrade	= mysql_query("SELECT Nome FROM Professor_Horarios WHERE Professor_Id = '$idProfessor' AND Dia_Semana_Id = '$diaSemana' AND Ativo = 1 ");
	$nome		= "";
	if(mysql_num_rows($nomeGrade)>0){
		$nome 		=   mysql_result($nomeGrade, 0, "Nome");
	}
?>
<body>
    
    <label id="titulo"><strong>Adicione aqui sua grade de horários para <?php echo $diaSemana?></strong></label><br><br>
    
    <label class="dados"><strong>Nome da grade:</strong></label>
    <input type="text" class="nomegrade" maxlength="9" value="<?php echo $nome?>"/><br><br>
    
     <input type="hidden" id="dia" class="" value="<?php echo $diaSemana?>" />
     
    <label class="dados"><strong>Início:</strong></label>
    <input type="text" name="tab" id="tab" class="datepicker" maxlength="5" />
    
    <!-- <label class="dados"><strong>Término:</strong></label> 
    <input type="text" name="tab2" id="tab2" class="datepicker" maxlength="5" />
     -->
    <input id="incluir" class="botao" type="submit" onClick="afixar()" value="Incluir"/>
    <input id="salvar" class="botao" type="submit"  value="Salvar"/>
    <input id="limpar" class="botao" type="submit" onClick="limpar()" value="Limpar"/>
    
    <!--  $(".tabela").append("<tr class='linhas "+i+"'>"+"<td class='listahi'>" + title + "</td>" + "<td class='listahf'>" + title2 + "<a  style='float:right' class='removerCampo' rel='"+i+"' href='#'>" + "<img src='../../imagens/error.png' border='0' />" + "</a>" + "</td>" + "</tr>");-->
    <table class="tabela">
    	<tr>
			<th>Início</th>
			<th>Término</th>
		</tr>
		<?php
		$cont = 1;
		while ($obj=mysql_fetch_array($horarios)) {?>		
			 <tr class="<?php echo "linhas " .$cont?>"><td class="listahi"><?php echo $obj['Hora_Inicio']?></td><td class="listahf"><?php echo $obj['Hora_Fim']?> <a style="float:right" class="removerCampo" rel="<?php echo $cont?>" href="#"><img src="../../imagens/error.png" border="0"/></a></td></tr>	
		<?php 
			$cont++;
		}
		?>
	</table>

	<script>
		pad = function (val, len, str) {
		      val = String(val);
		      len = len || 2;
		      str = str|| "0";
		      while (val.length < len) val = str + val;
		      return val;
		};
		
		function somarHora(atual,soma) { 
			   var hora = atual;
			   var acrescenta = parseInt(soma); //minutos
			   var regexp = "(?:([01]?[0-9]|2[0-3]):)?([0-5][0-9])"; //Expressão de hora
			   var date = hora.match(new RegExp(regexp)); //Executa a expressão
			   
			   date = new Date(0, 0, 0, date[1], date[2], 0, 0); //Cria a data baseado na expressão
			   date.setMinutes(date.getMinutes() + acrescenta); //Aumentamos o tempo
			   return pad(date.getHours()) + ':' + pad(date.getMinutes());
		}
	
		i = 0;
		function afixar() { 
			
			if(i <= 9){
				i++;
	
				var title  = $("#tab").val();
				var title2 = somarHora($("#tab").val(), "60");
				var horaInvalida = false;
				if(title == title2 || title>"23:00")
				{
					alert('Horário inválido.');
					return false;
				}else if($('.listahi').size() > 0){
					var horaInicial = "";
					var horaFinal 	= "";
					$('.linhas').each(function(){
						horaInicial = $(this).find('.listahi').html();
						horaFinal	= $(this).find('.listahf').html().substring(0,4);
						//console.log(title + '---' + title2 + '---' + horaInicial + '---' +  horaFinal + '---');
						if((title>=horaInicial && title<horaFinal) || (title<=horaInicial && title2>horaInicial)){
							alert('Horário inválido.');
							horaInvalida = true;
							return false;
						}
					});					
				}
				if(!horaInvalida){
					$(".tabela").append("<tr class='linhas "+i+"'>"+"<td class='listahi'>" + title + "</td>" + "<td class='listahf'>" + title2 + "<a  style='float:right' class='removerCampo' rel='"+i+"' href='#'>" + "<img src='../../imagens/error.png' border='0' />" + "</a>" + "</td>" + "</tr>");
	
					$("#tab").val("");
					$("#tab2").val("");
				}
			}
		}
		
		$('#incluir').click(function(){
			$(".removerCampo").unbind("click");
			$(".removerCampo").bind("click", function () {
				var titleRemover = $(this).attr('rel');

				$(".tabela tr."+titleRemover).remove();
			});
		});
		
		$(".removerCampo").click(function(){
			alert('ds');
		});
		

	</script>

	<script>
		function limpar() { 
			$("#tab").val("");
			$("#tab2").val("");
			$(".nomegrade").val("");
		}
		
	</script>
	
	<script>

			$(document).ready( function (){ 

			    $("#salvar").click(function(){
				    if($('.linhas td').size() >0){
					    
				    var parentElement = $('.nomegrade').val();
			    	var dia = $('#dia').val();				
				    parent.$('div[name='+dia+']').append('<p>' + parentElement  + '</p>');
				    
					var horarios = "";
					
				    $('.linhas').each(function(){

				    	horarios = horarios + $(this).find('.listahi').html() + "-" + $(this).find('.listahf').html().substring(0,5) + ",";
	
					});
				    horarios = horarios.substring(0,horarios.length-1);
					$.post("CadastrarHorarios.php",{nomeGrade:parentElement,horarios:horarios,dia:$('#dia').val()},						
							function(data){
								window.parent.Shadowbox.close();			
							}
						);	
				    }

				    });
			    
			 });

		

	</script>
</body>
</html>

