Listar nome e sobrenome ordenado 
por sobrenome
SELECT `funcionario`.`PrimeiroNome`,`funcionario`.`UltimoNome` FROM`funcionario` order by `funcionario`.`UltimoNome` asc

Listar todos os campos de 
funcionários ordenados por cidade

SELECT * FROM`funcionario` order by `funcionario`.`Cidade` asc

Liste os funcionários que têm salário 
superior a R$ 1.000,00 ordenados 
pelo nome completo


select * from `funcionario` where Salario > 1000.00 order by `funcionario`.`PrimeiroNome`, `funcionario`.`UltimoNome` asc

Liste a data de nascimento e o 
primeiro nome dos funcionários 
ordenados do mais novo para o mais 
velho

SELECT `funcionario`.`DataNasci`,`funcionario`.`PrimeiroNome` from `funcionario` order by `funcionario`.`DataNasci` desc 

Liste os funcionários como uma 
listagem telefônica

SELECT `funcionario`.`PrimeiroNome`,`funcionario`.`UltimoNome`,`funcionario`.`Fone` FROM`funcionario` order by `funcionario`.`PrimeiroNome`, `funcionario`.`UltimoNome` asc

Liste o total da folha de pagamento

select sum(`funcionario`.`Salario` ) from `funcionario`;

Liste o nome, o nome do departamento 
e a função de todos os funcionários

select f.`PrimeiroNome`, d.`Nome`, f.`Funcao` from `funcionario` f, `departamento` d where d.`Codigo` = f.`CodDepart`

Liste todos departamentos com seus 
respectivos gerentes

select d.* , f.`PrimeiroNome` from `funcionario` f, `departamento` d where f.`Codigo` = d.`CodfuncGerente`

Liste os departamentos dos 
funcionários que têm a função de 
supervisor

select d.`Nome` from departamento d, funcionario f where d.`Codigo` = f.`CodDepart` and f. `Funcao` = 'Supervisor'

Liste a quantidade de funcionários 
desta empresa

select count(codigo) from funcionario

Liste o salário médio pago pela 
empresa

select avg(`funcionario`.`Salario` ) from `funcionario`;

Liste o nome do departamento e do 
funcionário ordenados por 
departamento e funcionário

SELECT d.`Nome`, f.`PrimeiroNome` FROM`funcionario` f, `departamento` d where d.`Codigo` = f.`CodDepart` order by d.`Nome`, f.`PrimeiroNome` asc 

Liste os nomes dos funcionários que 
trabalham no departamento Pessoal

select f.`PrimeiroNome` from `funcionario` f, `departamento` d where d.`Codigo` = f.`CodDepart` and  d.`Nome` = 'RH'

Liste o valor da folha de pagamento de 
cada departamento (nome)

select d.`Nome`,sum(f.`Salario`) from `funcionario` f, `departamento` d  where f.`CodDepart` = d.`Codigo`  group by d.`Nome`

Liste o menor salário pago pela 
empresa em cada departamento

select d.`Nome`, min(f.`Salario`) from `funcionario` f, `departamento` d  where f.`CodDepart` = d.`Codigo`  group by d.`Nome`

Liste o nome e o departamento de 
todos os funcionários que ganham 
mais do que algum gerente

select f.`PrimeiroNome`, d.`Nome` from `funcionario` f, `departamento` d where f.`Salario` > (select max(f.`Salario`) from `funcionario` f where f.`Funcao` = 'Gerente') and d.`Codigo`= f.`CodDepart`

Liste o nome completo de todos os 
funcionários que não tenham ultimo
nome (dai coloquei soh o primeiro)

select f.`PrimeiroNome` from `funcionario` f where f.`UltimoNome` is null 

Liste os nomes dos funcionários que 
moram em Porto Alegre e que exerçam a 
função de Telefonista

select f.`PrimeiroNome` from `funcionario` f where f.`Cidade` = 'Porto Alegre' and f.`Funcao` = 'Telefonista'