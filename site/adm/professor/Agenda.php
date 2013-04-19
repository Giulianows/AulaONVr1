<?php 
	include("Seguranca.php");
?>
	<!--conteudo-->
    <link rel="stylesheet" href="css/calendario.css" />
    
    <div class="principal">
    <style type="text/css">
   .tip{
	    background-color: white;
	    padding: 10px;
	    display: none;
	    position: absolute;
	    border-radius: 10px;
  		box-shadow: 5px 5px 12px rgba(0, 0, 0, 0.15);
   }
</style>
<script>
$(document).ready(function(){
   $(".hoje").mouseenter(function(e){
      $("#tip2").css("left", e.pageX - 700);
      $("#tip2").css("top", e.pageY - 80);
      $("#tip2").css("display", "block");
   });
   $(".hoje").mouseleave(function(e){
      $("#tip2").css("display", "none");
   });
})
</script>
		<SCRIPT LANGUAGE="JavaScript">


			var day_of_week = new Array('Dom','Seg','Ter','Qua','Qui','Sex','Sab');
			var month_of_year = new Array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
			
			var Calendar = new Date();
			
			var year = Calendar.getYear();       
			var month = Calendar.getMonth();
			var month_mais = Calendar.getMonth() + 1;
			var month_menos = Calendar.getMonth() - 1;    
			var today = Calendar.getDate();    
			var weekday = Calendar.getDay();  
			
			var DAYS_OF_WEEK = 7;    
			var DAYS_OF_MONTH = 31;   
			var cal;    
			
			Calendar.setDate(1);    
			Calendar.setMonth(month);    
			
			
			var TR_start = '<TR style="height: 50px">';
			var TR_end = '</TR>';
			var highlight_start = '<TD class="hoje"><TABLE><TR><TD><B style="margin-left: 5px">';
			var highlight_end   = '</TD></TR></TABLE></B>';
			var TD_start = '<TD><CENTER>';
			var TD_end = '</CENTER></TD>';
			
			cal =  '<TABLE class="cal"><TR><TD>';
			cal += '<TABLE >' + TR_start;
			cal += '<TD class="mestopo" COLSPAN="' + DAYS_OF_WEEK + '"><CENTER><B>';
			cal += month_of_year[month]  + '   ' + //year + 
			'</B>' + TD_end + TR_end;
			cal += TR_start;
			
			for(index=0; index < DAYS_OF_WEEK; index++)
			{
			
			if(weekday == index)
			cal += TD_start + '<B>' + day_of_week[index] + '</B>' + TD_end;
			else
			cal += TD_start + day_of_week[index] + TD_end;
			}
			
			cal += TD_end + TR_end;
			cal += TR_start;
			
			for(index=0; index < Calendar.getDay(); index++)
			cal += TD_start + '  ' + TD_end;
			
			for(index=0; index < DAYS_OF_MONTH; index++)
			{
			if( Calendar.getDate() > index )
			{
			  week_day =Calendar.getDay();
			  if(week_day == 0)
			  cal += TR_start;
			  if(week_day != DAYS_OF_WEEK)
			  {
			  var day  = Calendar.getDate();
			  if( today==Calendar.getDate() )
			  cal += highlight_start + day + highlight_end + TD_end;
			  else
			  cal += TD_start + day + TD_end;
			  }
			  if(week_day == DAYS_OF_WEEK)
			  cal += TR_end;
			  }
			  Calendar.setDate(Calendar.getDate()+1);
			}
			cal += '</TD></TR></TABLE></TABLE>';
			
			
			document.write(cal);
			
		</SCRIPT>
		<div class="tip" id="tip2">
			<table id="aula">
				<tr>
					<th>Aluno</th>
					<th>Aula</th>
					<th>Nível</th>
					<th>Data</th>
					<th>Início</th>
					<th>Término</th>
				</tr>
				<tr>
					<td>João Pedro Vicentini</td>
					<td>Estatística I</td>
					<td>Ensino Superior</td>
					<td>08/03/2013</td>
					<td>14:00</td>
					<td>15:00</td>
				</tr>
				<tr>
					<td>Marcia Castro Pereira</td>
					<td>Estatística I</td>
					<td>Ensino Superior</td>
					<td>08/03/2013</td>
					<td>16:00</td>
					<td>17:00</td>
				</tr>
			</table>
		</div>
	</div>
    <!--/conteudo-->