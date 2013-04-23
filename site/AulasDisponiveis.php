<?php 
	include("PadraoComum.php");
	include "Conecta_Mysql.php";
	?>
	
	
	<script language="javascript" type="text/javascript" src="js/shadowbox.js"></script>
	
	<link rel="stylesheet" href="css/AulasDisponiveis.css" />
	<link rel="stylesheet" href="css/shadowbox.css" />
	
	
	
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
	  $(function() {
	    $( ".accordion" ).accordion({
	      active: false,
	      alwaysOpen: false,
	      collapsible: true,
	      heightStyle: "content"
	    });
	  });
	 </script>
	 
	 <script type="text/javascript">
		window.onload = function() {
			$("#MostrarEsconderEF").css({"background-color" : "orange", "color" : "black"});
		};
			
	    $(function(){
	        $("#MostrarEsconderEF")
	            .click(function(){
	            	$(this).css({"background-color" : "orange", "color" : "black"});
	            	$("#MostrarEsconderEM").css("background-color","#fff");
	            	$("#MostrarEsconderES").css("background-color","#fff");
	            	$("#MostrarEsconderOC").css("background-color","#fff");
	                $("#ef").toggle();
	                $("#em").hide();
	                $("#es").hide();
	                $("#oc").hide();
	            });
	        $("#MostrarEsconderEM")
            .click(function(){
            	$(this).css({"background-color" : "orange", "color" : "black"});
            	$("#MostrarEsconderEF").css("background-color","#fff");
            	$("#MostrarEsconderES").css("background-color","#fff");
            	$("#MostrarEsconderOC").css("background-color","#fff");
                $("#em").toggle();
                $("#ef").hide();
                $("#es").hide();
                $("#oc").hide();
            });
	        $("#MostrarEsconderES")
            .click(function(){
            	$(this).css({"background-color" : "orange", "color" : "black"});
            	$("#MostrarEsconderEM").css("background-color","#fff");
            	$("#MostrarEsconderEF").css("background-color","#fff");
            	$("#MostrarEsconderOC").css("background-color","#fff");
                $("#es").toggle();
                $("#ef").hide();
                $("#em").hide();
                $("#oc").hide();
            });
	        $("#MostrarEsconderOC")
            .click(function(){
            	$(this).css({"background-color" : "orange", "color" : "black"});
            	$("#MostrarEsconderEM").css("background-color","#fff");
            	$("#MostrarEsconderES").css("background-color","#fff");
            	$("#MostrarEsconderEF").css("background-color","#fff");
                $("#oc").toggle();
                $("#ef").hide();
                $("#em").hide();
                $("#es").hide();
            });
	    });
	</script>
	
	 <!--conteudo-->
    <div class="conteudo">
    <div class="principal">
	    
	   <!--   <div class="accordion"> -->
	   	   <div id="menuad">
		   <ul>
			  <li><input id="MostrarEsconderEF" type="submit" class="botao" value="Ensino Fundamental"/></li>
			  <li><input id="MostrarEsconderEM" type="submit" class="botao" value="Ensino Médio"/></li>
			  <li><input id="MostrarEsconderES" type="submit" class="botao" value="Ensino Superior"/></li>
			  <li><input id="MostrarEsconderOC" type="submit" class="botao" value="Outros Cursos"/></li>
		   </ul>
		   
<!-- LISTA ENSINO FUNDAMENTAL -->
		   
			  	<div id="ef">
			  		<div class="campocursof">
			    	<select class="selector" id="aula">
			    		<option selected value="0"></option>	
			    	<?php 			    	
			  		$resultado = mysql_query("SELECT Id, Nome FROM Disciplinas WHERE Nivel_Disciplina_Id=1");
			  		if(mysql_num_rows($resultado) > 0){
							while ($obj = mysql_fetch_array($resultado)) {?>
								<option value="<?php echo $obj['Id']?>"><?php echo $obj['Nome']?></option>									
						<?php 
							}					
					}					
			  		?>
			    	</select>
			    	</div>
			    	<div class="campoorganiza">
			    	<select>
				  	  <option value="Organizar">Organizar por</option>
				      <option value="Avaliacao">Avaliação do professor</option>
				      <option value="Professor">Professor</option>
				    </select>
					</div>
				    <table class="tabela_4colunas">
					    <tr>
						    <th class="professor">Professor</th>
						    <th>Avaliação</th>
						    <th>Disciplina</th>
						    <th>Horários</th>
					    </tr>
						<tr>
						    <td>
							    <div class="accordion">
								    <h3>Antônio Carlos</h3>
<!-- Colocar informações no .accordiondiv apartir do cadastro do professor -->
								    <div class="accordiondiv">
								    	<label>Data de nascimento:</label><label> 22/05/1991</label><br>
								    	<label>Escolaridade:</label><label> Graduação - cursando</label><br>
								    	<label>Curso/Área:</label><label> Administração</label><br>
								    	<label>Instituição:</label><label> IESJT</label><br>
								    	<label>Outros cursos:</label><label> (teste)</label><br>
								    	<label>Empresa atual:</label><label> (teste)</label><br>
								    	<label>Cargo atual:</label><label> (teste)</label><br>
								    	<label>Experiência:</label><label> 5 anos</label><br>
								    	<label>Currículo Lattes:</label><label> (link)</label>
								    </div>
							    </div>
						    </td>
						    <td>(Star Raters)</td>
						    <td>Português</td>
						    <td><a rel="shadowbox;height=520;width=520" href="VerHorario.php" class="">Visualizar horários</a></td>
					   </tr>
				   </table> 
			  </div>
			  </li>
			
<!-- LISTA ENSINO MÉDIO -->
			  	
			  	<div id="em">
			  		<div class="campocursof">
			   		<select size="1" name="D3">
			   		<option selected value="0"></option>
			    	<?php 			    	
			  		$resultado = mysql_query("SELECT Id, Nome FROM Disciplinas WHERE Nivel_Disciplina_Id=2");
			  		if(mysql_num_rows($resultado) > 0){
							while ($obj = mysql_fetch_array($resultado)) {?>
								<option value="<?php echo $obj['Id']?>"><?php echo $obj['Nome']?></option>									
						<?php 
							}					
					}					
			  		?>
				    </select>
				    </div>
				    <div class="campoorganiza">
				    <select size="1" name="D4">
				  	  <option value="Organizar">Organizar por</option>
				      <option value="Avaliacao">Avaliação do professor</option>
				      <option value="Professor">Professor</option>
				    </select>
				    </div>
				    <table class="tabela_4colunas">
					    <tr>
						    <th class="professor">Professor</th>
						    <th>Avaliação</th>
						    <th>Disciplina</th>
						    <th>Horários</th>
					    </tr>
					    
						    <tr>
							    <td>
							    <div class="accordion">
									    <h3>Antônio Carlos</h3>
<!-- Colocar informações no .accordiondiv apartir do cadastro do professor -->
									    <div class="accordiondiv">
									    	<p>Data de nascimento: 22/05/1991</p><br>
									    	<p>Perfil: Formado em Letras na PUCRS, professor no Colégio Anchieta desde 2000...</p>
									    </div>
									    <h3>Antônio Carlos</h3>
									    <div class="accordiondiv">
									    	<p>Data de nascimento: 22/05/1991</p><br>
									    	<p>Perfil: Formado em Letras na PUCRS, professor no Colégio Anchieta desde 2000...</p>
									    </div>
								</div>   
							    </td>
							    <td>(Star Raters)</td>
							    <td>Português</td>
							    <td><a rel="shadowbox;height=520;width=520" href="VerHorario.php" class="">Visualizar horários</a></td>
						   </tr>
					   
				   </table> 
			    </div>
			  </li>
			  
<!-- LISTA ENSINO SUPERIOR -->
			  
			  	<div id="es">
			  		<div class="campocurso">
			    	<select size="1" name="D5">
			    		<option selected value="0"></option>
			    	<?php 			    	
			  		$resultado = mysql_query("SELECT Id, Nome FROM Disciplinas WHERE Nivel_Disciplina_Id=3");
			  		if(mysql_num_rows($resultado) > 0){
							while ($obj = mysql_fetch_array($resultado)) {?>
								<option value="<?php echo $obj['Id']?>"><?php echo $obj['Nome']?></option>									
						<?php 
							}					
					}					
			  		?>
			    	</select>
			    	</div>
			    	<input type="text" name="cadeira" id="cadeira"  class=""/>
			    	<div class="campoorganiza">
			    	<select size="1" name="D6">
				  	  <option value="Organizar">Organizar por</option>
				      <option value="Avaliacao">Avaliação do professor</option>
				      <option value="Professor">Professor</option>
				    </select>
				    </div>
			    	<table class="tabela_5colunas">
					    <tr>
						    <th class="professor">Professor</th>
						    <th>Avaliação</th>
						    <th>Curso</th>
						    <th>Cadeira</th>
						    <th class="horario">Horários</th>
					    </tr>
					    <tr>
						    <td>
							    <div class="accordion">
								    <h3>Antônio Carlos</h3>
								    <div class="accordiondiv">
								    	<p>Teste Conteúdo Accordion</p>
								    </div>
							    </div>
						    </td>
						    <td>(Star Raters)</td>
						    <td>Administração</td>
						    <td>TGA</td>
						    <td><a rel="shadowbox;height=520;width=520" href="VerHorario.php" class="">Visualizar horários</a></td>
					   </tr>
				   </table>
				    
			  </div>
			  </li>
			  
<!-- LISTA OUTROS CURSOS -->
			  
			  <div id="oc">
			  	  <div class="campocurso">
				  <select size="1" name="D7" >
				  	<option selected value="0"></option>
			    	<?php 			    	
			  		$resultado = mysql_query("SELECT Id, Nome FROM Disciplinas WHERE Nivel_Disciplina_Id=4");
			  		if(mysql_num_rows($resultado) > 0){
							while ($obj = mysql_fetch_array($resultado)) {?>
								<option value="<?php echo $obj['Id']?>"><?php echo $obj['Nome']?></option>									
						<?php 
							}					
					}					
			  		?>
				  </select>
				  <input type="text" name="cadeira" id="curso"  class=""/>
				  </div>
				  <div class="campoorganiza">
				  <select size="1" name="D8">
				  	  <option value="Organizar">Organizar por</option>
				      <option value="Avaliacao">Avaliação do professor</option>
				      <option value="Professor">Professor</option>
				  </select>
				  </div>
				  <table class="tabela_4colunas">
					    <tr>
						    <th class="professor">Professor</th>
						    <th>Avaliação</th>
						    <th>Curso</th>
						    <th>Horários</th>
					    </tr>
					    <tr>
						    <td>
							    <div class="accordion">
								    <h3>Antônio Carlos</h3>
								    <div class="accordiondiv">
								    	<p>Teste Conteúdo Accordion</p>
								    </div>
							    </div>
						    </td>
						    <td>(Star Raters)</td>
						    <td>Dança de Salão</td>
						    <td><a rel="shadowbox;height=520;width=520" href="VerHorario.php" class="">Visualizar horários</a></td>
					   </tr>
				   </table> 
			  </div>
			  </li>
		  </u>
    	</div>
    </div>
    <div id="clear"></div>
    </div>
    <!--/conteudo-->
    <!--rodape-->
    <?php 
	include("RodapeComum.php");
	?>
    <!--/rodape-->