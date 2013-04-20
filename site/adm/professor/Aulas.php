<?php 
	include("Seguranca.php");
?>
	<?php	    
		$usuarioId		= $_SESSION["usuario_id"];

	    include "Conecta_Mysql.php";
	    
	    $resultado = mysql_query("SELECT Id FROM Professor WHERE Usuario_Id ='$usuarioId'");
	    
	    if(mysql_num_rows($resultado) > 0){
		
			$idProfessor = mysql_result($resultado, 0, "Id");
			
			$fundamental		= mysql_query("SELECT * FROM Disciplinas WHERE Nivel_Disciplina_Id=1 ORDER BY Id");
			$medio 				= mysql_query("SELECT * FROM Disciplinas WHERE Nivel_Disciplina_Id=2 ORDER BY Id");
			$cursosProfessor	= mysql_query("SELECT Disciplina_Id, Valor FROM Disciplina_Professor WHERE Professor_Id='$idProfessor'");
			$cont=0;
			while ($sql = mysql_fetch_row($cursosProfessor)){
				$valorAulaAtual = $sql[1];
				$cursosAtuais[$cont] = $sql[0];
				$cont++;
			}			
		}else{

			header("location: ../Login.php?codigo=5");
			die();
		}

	    /*$resultado = mysql_query("SELECT c.* FROM curso c 
									INNER JOIN curso_professor cf ON c.Id = cf.Curso_id
									INNER JOIN professor pr ON cf.Professor_id = pr.Id
									INNER JOIN usuario us ON pr.Usuario_id = us.Id
									WHERE us.Id ='$usuario_id'");
		
									
	    $linhas = mysql_num_rows ($resultado);
	    
	    if($linhas == 0) //testa se foi encontrado um usuario com o username ou email colocado
	    {
	    	//se não foi encontrado
	    	header("location: ../index.php?codigo=5");
	    	die();
	    
	    }
	    else
	    {
	    	$professor_id = mysql_result($resultado, 0, "id");
	    	$professor_id
	    }
	    */
	?>
	<link rel="stylesheet" href="professor/css/jquery-ui-cadastroAulas.css" />
	<link rel="stylesheet" href="professor/css/Aulas.css" />
		  
	<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
	<script type="text/javascript" src="../js/jquery.bar.js"></script>
	<script>
	$(document).ready(function(){
		i=0;
		  $("#btn").click(function(){
			  if(i<9){
		    $("#tabs-2 ").append("<input>");i++;}
		  });
		});
	</script>
	
	<script>
	$(document).ready(function(){
		j=0;
		  $("#btn1").click(function(){
			  if(j<9){
		    $("#tabs-3 ").append("<input>");j++;}
		  });
		});
	</script>
	
	<script>
	$(document).ready(function(){
		l=0;
  		$("#btn2").click(function(){
	  	if(l<9){
			$("#up_content").append("<input>");l++;}
		});
	});
	</script>
	
	<script type="text/javascript">
	
	$(document).ready(function(){
		
		$(".mensagem").bar({
			color 			 : '#FFFFFF',
			background_color : '#548B54',
			removebutton     : false,
			time			 : 5000,
			message			 : 'Aulas cadastradas com sucesso.'
		});


		//Tab1 Educação básica
		
		$(document).ajaxStop($.unblockUI); 
		
		$( "#tabs" ).tabs();
		
		$("#selectable").bind("mousedown", function(evt) {
			    evt.metaKey = true;
		}).selectable();
		$("#selecionavel").bind("mousedown", function(evt) {
		    evt.metaKey = true;
		}).selectable();


		$('.bt_red').click(function(){		
			var ids = "";		
			$('.ui-selected').each(function(){				
				ids = ids +  $(this).attr('id') + ",";
			});
			ids = ids.substring(0,ids.length-1);
			controleDeTela(ids);			
		});
		
		function controleDeTela(ids){
			
	        $.blockUI({ 
	        	css: { 
	                border: 'none', 
	                padding: '15px', 
	                backgroundColor: '#000', 
	                '-webkit-border-radius': '10px', 
	                '-moz-border-radius': '10px', 
	                opacity: .5, 
	                color: '#fff',
	                height: '35px',
	                'font-size': '30px'
	               }, 
	            message: '<h1>Cadastrando...</h1>'
	        });    
	
	        cadastrarAulas(ids);
			
		}

		
		function cadastrarAulas(ids){
			
			$.post("professor/CadastrarAulas.php",{ id:ids, idProfessor:$('#professor').val(), valorAula:$('#valorAula').val()},
				function(data){
					if(data){
						$(".mensagem").click();						
					}
				}
			);			
		}

		
		//Tab2 Cursos superiores

		$("#inserirNovoCurso").click(function(){
			var combo = $('#cursoSuperior');
			if(combo.val() != ''){
				var opcaoSelecionada = $('#cursoSuperior option:selected');
				opcaoSelecionada.addClass('selecionado');				
				$('#tabelaCursos tbody').append('<tr><td>' + opcaoSelecionada.text() + '</td><td><a id="' + opcaoSelecionada.val() + '">X</a></td></tr>');
				opcaoSelecionada.hide();
				combo.val('');
				
				$('#tabelaCursos a').bind('click',function(){
					$('#cursoSuperior option[value=' + $(this).attr('id') + ']').show().removeClass('selecionado');		
					$(this).parent().parent().remove();
					
					
				});
			}					
		});

		$("#confirmarGeral").click(function(){

			var novaDisciplina  = $('#novaDisciplina').val();
			
			if($('#tabelaCursos tbody tr').length > 0 && novaDisciplina != ''){

				if($('#disciplinaSelecionada').val() == ''){
					
					$("#novaDisciplina").autocomplete("search",novaDisciplina);
				}
				
				if($('#ui-id-4').is(":visible")){

					$(".msgAC").show();
					return false;
					
				}else{
					
					var idsSuperior = "";
					$('.selecionado').each(function(){
						idsSuperior = idsSuperior + $(this).val() + ',';
					});
					
					idsSuperior = idsSuperior.substring(0,idsSuperior.length-1);

					$.post("professor/CadastrarAulasSuperior.php",{idDisciplina:$('#disciplinaSelecionada').val(),nomeDisciplina:novaDisciplina,idsSuperior:idsSuperior,idProfessor:$('#professor').val(),valorAula:$('#valorAulaS').val()},						
						function(data){
							$(".mensagem").click();		
							autoComplete();			
						}
					);	
					
				}
						
			}else{
				
				$(".mensagem2").bar({
					color 			 : '#FFFFFF',
					background_color : '#FF0000',
					removebutton     : false,
					time			 : 5000,
					message			 : 'Para cadastrar uma disciplina, esta deve ser associada a um curso superior e deve ter um nome.'
				});

				$(".mensagem2").click();

				return false;
			}					
		});

		autoComplete();
		function autoComplete(){
			
			$.post("professor/BuscarDisciplinas.php", {},
					function(){
					}
				)
				.success(function(data) { 
				  	var valoresF = [];			  	
					dados = data.split("--");
					valores = dados[0].split(",");
					ids		= dados[1].split(",");
					for(var i=0; i<valores.length; i++){
						valoresF.push({label: '' + valores[i]  + '', value: '' + ids[i] + ''});
					}
	
					var names = valoresF;
					
				    var accentMap = {
				  	      "á": "a",
				  	      "â": "a",
				  	      "ã": "a",
				  	      "ó": "o",
				  	      "ô": "o",
				  	      "õ": "o",
				  	      "ç": "c",	 
				  	      "ê": "e",
				  	      "é": "e",
				  	      "í": "i",
				  	      "ú": "u"	     	     		    		    
				  	    };
			  	    
				    var normalize = function( term ) {
					      var ret = "";
					      for ( var i = 0; i < term.length; i++ ) {
					        ret += accentMap[ term.charAt(i) ] || term.charAt(i);
					      }
					      return ret;
					    };
	
				    $("#novaDisciplina").autocomplete({
				      source: function( request, response ) {
				        var matcher = new RegExp( $.ui.autocomplete.escapeRegex( request.term ), "i" );
				        response( $.grep( names, function( value ) {
				          value = value.label || value.value || value;
				          return matcher.test( value ) || matcher.test( normalize( value ) );
				        }) );
				      },
			           select: function(event, ui) {
				       		$("#novaDisciplina").val(ui.item.label);
			               	$('#disciplinaSelecionada').val(ui.item.value);
		               		return false;
			           	},
			           	focus: function(event, ui) {
							$(".msgAC").hide();
			               	$("#novaDisciplina").val(ui.item.label);
			               	$('#disciplinaSelecionada').val(ui.item.value);
			               	return false;    
			           	}
				    });
					    
				});	  
		}
		//Tab3 Aula Livre
		
		$("#inserirNovaPalaraCHave").click(function(){
			var palavra = $('#palavraChave').val();
			if(palavra != '' && $('#tabelaAulas a').size() < 4){		
				
				$('#tabelaAulas tbody').append('<tr><td>' + palavra + '</td><td><a id="' + palavra+ '">X</a></td></tr>');
				$('#palavraChave').val('');
				if($('#tabelaAulas a').size() == 4){
					$(this).attr("disabled",true);
				}	
				$('#tabelaAulas a').bind('click',function(){	
					$(this).parent().parent().remove();
					$("#inserirNovaPalaraCHave").attr("disabled",false);
				});
				
			}					
		});

		$("#confirmarNovaAula").click(function(){

			var nomeAula  = $('#nomeAula').val();
			
			if($('#tabelaAulas a').size() > 0 && nomeAula != ''){

				var palavrasChaves = "";
				$('#tabelaAulas a').each(function(){
					palavrasChaves = palavrasChaves + $(this).attr("id") + ',';
				});
				
				palavrasChaves = palavrasChaves.substring(0,palavrasChaves.length-1);
	
				$.post("professor/CadastrarAulasLivres.php",{nomeAula:nomeAula,palavrasChaves:palavrasChaves,idProfessor:$('#professor').val(),valorAula:$('#valorAulaO').val()},						
					function(data){
						if(data){
							$(".mensagem").click();
						}else{
							$(".mensagem2").click();
						}				
					}
				);	

						
			}else{
				
				$(".mensagem2").bar({
					color 			 : '#FFFFFF',
					background_color : '#FF0000',
					removebutton     : false,
					time			 : 5000,
					message			 : 'Para cadastrar uma aula, esta deve ser conter pelo menos uma palavra-chave e deve ter um nome.'
				});

				$(".mensagem2").click();

				return false;
			}					
		});

		
	});

	</script>
	<!--conteudo-->
    
    	<div class="principal">
    	<input type="hidden" id="professor" value="<?php echo $idProfessor?>" />    	
    		<div id="tabs">
    			<ul>
	        		<li><a href="#tabs-1">Educação Básica</a></li>
	        		<li><a href="#tabs-2">Ensino Superior</a></li>
	        		<li><a href="#tabs-3">Outros Cursos</a></li>
    			</ul>
    			<div id="tabs-1">    			 
    			<a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Confirmar</strong><span class="bt_red_r"></span></a>
    				<div class="medio">
					    <label>Ensino Médio:</label><br><br>
						<ol id="selectable">

						<?php
							while ($obj = mysql_fetch_array($medio)) {?>
								 <li id="<?php echo $obj['Id'];?>" class="<?php echo in_array($obj['Id'],$cursosAtuais) ? "ui-selected ui-widget-content " : "ui-widget-content "; ?>"><?php echo $obj['Nome'];?></li>	
						<?php 
							}
						?>
						</ol>
					</div>
	
					<div class="fundamental">
					    <label>Fundamental:</label><br><br>
					    <ol id="selecionavel">
					    <?php
							while ($obj = mysql_fetch_array($fundamental)) {?>
								 <li id="<?php echo $obj['Id'];?>" class="<?php echo in_array($obj['Id'],$cursosAtuais) ? "ui-selected ui-widget-content " : "ui-widget-content "; ?>"><?php echo $obj['Nome'];?></li>
								
						<?php 
							}
						?>
						</ol>		
								
					</div>
					<div id="valor">
						<label>Valor hora-aula</label>
					</div>
					<div class="valor">
				    	<select id="valorAula">
				    		<?php 
				    			for($i=10; $i<=200; $i=$i+10){
				    		?>
					  	  			<option <?php echo $valorAulaAtual == $i ? "selected":""?> value="<?php echo $i?>">R$<?php echo $i?></option>
				    		<?php 
				    			}
				    		?>				  	  			
					    </select>
					</div>
				</div>
    			<div id="tabs-2">
	    			<div class="conteudoDados">
	    				<div class="conteudoDadosSuperior">
	    					<label for="Novo Curso">Escolha um ou mais cursos relacionados a disciplina</label>			    			
			    			<?php 
			    				$superior		= mysql_query("SELECT * FROM Cursos_Superiores ORDER BY Nome asc");
			    				if(mysql_num_rows($superior) > 0){?>
									<select id='cursoSuperior' class=''>
										<option selected value=''></option>
									<?php
									while ($obj = mysql_fetch_array($superior)){?>
										<option value="<?php echo $obj['Id'];?>"><?php echo $obj['Nome'];?></option>
							
								<?php }?>
									</select>						 					
							<?php }?>	
							<button id="inserirNovoCurso">Associar</button>	
						</div>
						<div class="conteudoDadosInferior">
							<label for="Nova Disciplina">Cadastre uma disciplina:</label>
							<input id="novaDisciplina" type="text" value="">	
							<div style="display:none" class="msgAC">Escolha uma das opções mostradas, ou altere o nome da sua disciplina</div>
							<input id="disciplinaSelecionada" type="hidden" value="">								
						</div>													
					</div>
					<div class="conteudoInterativa">
						<div class="conteudoInterativaSuperior">
							<label for="Cadeira">Cursos Superiores Associados:</label>
							<table id="tabelaCursos" class="">
								<thead>
							   		<tr class="ui-widget-header ">
							       		<th style="width: 500px;text-align: center;">Curso</th>
							       		<th>Remover</th>
							     	</tr>
							   	</thead>
							   	<tbody>
							  	</tbody>
					    	</table>
						</div>
					</div>
					<div class="conteudoBotao">
						<button id="confirmarGeral"><label>Confirmar</label></button>
					</div>
					<div id="valors">
						<label>Valor hora-aula</label>
					</div>
					<div class="valors">
				    	<select id="valorAulaS">
				    		<?php 
				    			for($i=10; $i<=200; $i=$i+10){
				    		?>
					  	  			<option value="<?php echo $i?>">R$<?php echo $i?></option>
				    		<?php 
				    			}
				    		?>				  	  			
					    </select>
					</div>
				</div>
    
    			<div id="tabs-3">
    			 
    				<div class="conteudoDados">
	    				<div class="conteudoDadosSuperior">
	    					<label for="Novo Curso">Digite palavras-chaves para descrever o conteúdo da aula e pressione cadastrar</label>			    			
							<input id="palavraChave" type="text" value="">	
							<button id="inserirNovaPalaraCHave">Cadastrar</button>	
						</div>
						<div class="conteudoDadosInferior">
							<label for="Nova Disciplina">Digite o nome da aula:</label>
							<input id="nomeAula" type="text" value="">								
						</div>													
					</div>
					<div class="conteudoInterativa">
						<div class="conteudoInterativaSuperior">
							<label for="Cadeira" id="OutrosCursos">Palavras-Chaves Escolhidas (Máximo 4 palavras)</label>
							<table id="tabelaAulas" class="">
								<thead>
							   		<tr class="ui-widget-header ">
							       		<th style="width: 500px;text-align: center;">Palavra-Chave</th>
							       		<th>Remover</th>
							     	</tr>
							   	</thead>
							   	<tbody>
							  	</tbody>
					    	</table>
						</div>
					</div>
					<div class="conteudoBotao">
						<button id="confirmarNovaAula"><label>Confirmar</label></button>
					</div>
					<div id="valoro">
						<label>Valor hora-aula</label>
					</div>
					<div class="valoro">
				    	<select id="valorAulaO">
				    		<?php 
				    			for($i=10; $i<=200; $i=$i+10){
				    		?>
					  	  			<option value="<?php echo $i?>">R$<?php echo $i?></option>
				    		<?php 
				    			}
				    		?>				  	  			
					    </select>
					</div>
    			</div>
			</div>
		</div>
    <!--/conteudo-->