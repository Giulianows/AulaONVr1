<?php 
	include("PadraoComum.php");
	?>
	
	<link rel="stylesheet" href="css/ComoFunciona.css" />
	
	
	
	<script>
	  $(function() {
	    $( ".accordion" ).accordion({
	      collapsible: true,
	      
	      heightStyle: "content"
	    });
	  });
	 </script>
	
	 <!--conteudo-->
    <div class="conteudo">
    <div class="principal">
    	
			<h1 id="tprofessor">Quero ser Professor</h1>
			
			<div class="accordion">
			<h3>&#149; Cadastro</h3>
			<div class="accordiondiv">
				<ul>
					<li>Efetue seu cadastro no modo professor, este é mais completo que o modo aluno, pois deve conter informações sobre sua formação acadêmica e também dados da conta bancária para pagamento pelas aulas ministradas.</li>
	    			
	    			<h4>Cadastro de aulas</h4>
	    			<li>Após efetuar seu cadastro pessoal, você deve cadastrar que tipo de aulas particulares ministra.</li>
	    			<li>Você escolhe valor a ser investido pelo aluno em OnCoin.</li>
	    			
	    			<h4>Cadastro de horários</h4>
	    			<li>Após cadastrar as aulas, você deve informar que dias da semana e que horários terá disponível para dar aulas, também deverá informar quanto tempo de antecedência mínima para agendar a aula, por exemplo.</li>
	    			<li>Se você tem disponível na terça-feira os seguintes horários:</li>
	    			<li>11:00h – 12:00h</li>
	    			<li>18:00h – 19:00h</li>
	    			<li>Mas colocou 5h de antecedência no cadastro, então se alguém quer agendar aula com você na terça feira as 08:00h, terá apenas o horário das 18:00h – 19:00h de terça-feira disponível. Mesmo que ninguém tenha agendado o horário das 11:00h – 12:00h.
	    			Então será possível agendar o horário das 11:00h – 12:00h apenas até as 06:00h de terça-feira, depois disso ele estará indisponível.</li>
	    		</ul>
	    	</div>
	    	
	    	<h3>&#149; Aula Agora</h3>
	    	<div class="accordiondiv">
	    		<p>Ao ativar o Aula Agora você escolhe um tempo mínimo de antecedência de agendamento de 5min a no máximo 1h (tempo para preparar e iniciar o streaming de vídeo e/ou para preparo pessoal).</p>
	    		<p>Ativando este módulo você estará se disponibilizando para ministrar uma aula de urgência em no máximo 1 hora.</p>
	    	</div>
	    	
	    	<h3>&#149; Aula</h3>
	    	<div class="accordiondiv">
	    		<p>Esteja online pelo menos 5min antes do início da aula agendada para iniciar o streaming de vídeo, testar webcam e esperar o aluno.</p>
	    	</div>
	    	
	    	<h3>&#149; Pagamento</h3>
	    	<div class="accordiondiv">
	    		<p>25% (vinte por cento) do valor investido pelo aluno ficará com o portal AulaON como pagamento pelo serviço prestado.<br> O valor restante (75%) entrará em sua conta como OnCoin.</p>
	    		<p>No dia 10 de cada mês você receberá todo valor OnCoin creditado no mês anterior em R$ em sua conta bancária previamente cadastrada, seguindo a seguinte cotação: (OC 1,00 = R$ 1,00)</p>
	    	</div>
	    	
	    	</div>
	    	
	    	<h1 id="taluno">Quero ser Aluno</h1>
	    	
	    	<div class="accordion">
	    	<h3>&#149; Cadastro</h3>
	    	<div class="accordiondiv">
				<p>Efetue seu cadastro, no modo aluno.</p>
			</div>
			
			<h3>&#149; Aulas</h3>
			<div class="accordiondiv">
				<p>Pesquise a disciplina de interesse utilizando os filtros adequados para facilitar sua busca.</p>
				<p>Aparecerá uma série de professores disponíveis, você poderá listar os professores da maneira que for mais conveniente, por exemplo: por preço, por horário, por avaliação dos alunos.</p>
				<!-- <p>Você terá acesso à avaliação e aos comentários de outros alunos atendidos, para facilitar sua decisão na escolha do professor.</p> -->
				<p>Alguns professores também terão disponível o link de seu currículo Lattes, para você poder avaliar a formação do professor a fim de decidir qual professor contratar.</p>
			</div>
			
			<h3>&#149; Horários das Aulas</h3>
			<div class="accordiondiv">
				<p>Ao selecionar um professor, você poderá visualizar os dias da semana e os horários que ele está disponível para dar aulas, e poderá agendar quantas horas quiser com ele.</p>
			</div>
			
			<h3>&#149; Aula Agora</h3>
			<div class="accordiondiv">
				<p>Se você estiver precisando de uma aula com urgência, basta buscar a disciplina desejada e utilizar o filtro “Aula Agora”. Com isso aparecerão professores disponíveis para dar aula com início em no mínimo 5min e no máximo 1 hora.</p>
			</div>
			
			<h3>&#149; Avaliação dos Professores</h3>
			<div class="accordiondiv">
				<p>Ao terminar sua aula, você poderá avaliar o professor na disciplina que foi ministrada.</p>
				<p>As avaliações recebidas pelos professores ficam disponíveis para todos os usuários do portal. Com isso outros alunos vão ter acesso a sua avaliação e vão se beneficiar dela na decisão de que professor contratar.</p>
			</div>
			
			<h3>&#149; Pagamento</h3>
			<div class="accordiondiv">
				<p>A fim de agilizar o processo de agendamento de sua aula você utilizará créditos OnCoin.</p>
				<p>Estes podem ser comprados no sistema PagSeguro.</p>
				<p>Você compra os créditos conforme a seguinte cotação (OC 1,00 = R$ 1,00). Seus créditos ficarão em sua conta com data de validade de um ano, e poderão ser utilizados quando você quiser, dentro deste período, para agendar suas aulas.</p>
			</div>

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