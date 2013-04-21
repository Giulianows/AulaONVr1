<?php 
	include("Seguranca.php");
?>
	<form id="menu" action="index.php" type="post">
		<div class="sidebarmenu">
			<a href="index.php" class="menuitem_red" name="">
				<!-- <span class="accordprefix"></span> -->
				Home
			</a>
			<a href="javascript:void(0)" class="menuitem_red" name="Extrato">
				<!-- <span class="accordprefix"></span> -->
				Extrato
			</a>
			<a href="javascript:void(0)" class="menuitem_red" name="Aulas">
				<!-- <span class="accordprefix"></span> -->
				Aulas
			</a>
			<a href="javascript:void(0)" class="menuitem_red" name="AulaAdicionada">
				<!-- <span class="accordprefix"></span> -->
				Aulas Adicionadas
			</a>
			<a href="javascript:void(0)" class="menuitem_red" name="GradeHorarios">
				<!-- <span class="accordprefix"></span> -->
				Grade de Horários
			</a>
			<a href="javascript:void(0)" class="menuitem_red" name="ProximaAula">
				<!-- <span class="accordprefix"></span> -->
				Próxima Aula
			</a>
			<a href="javascript:void(0)" class="menuitem_red" name="Status">
				<!-- <span class="accordprefix"></span> -->
				Status
			</a>
			<a href="javascript:void(0)" class="menuitem_red" name="Editar">
				<!-- <span class="accordprefix"></span> -->
				Editar
			</a>
			<a  href="javascript:void(0)" class="menuitem_red" name="Ajuda">
				<!-- <span class="accordprefix"></span> -->
				Ajuda
			</a>			
		</div>
			<script type="text/javascript"> 
				$(document).ready(function(){
					$('.menuitem_red').click(function(){						
						$('#pagina').val($(this).attr("name"));
						$('#menu').submit();
					});
				});
			</script>
			
		<input type="hidden" value="index" name="pagina" id="pagina">
	</form>		