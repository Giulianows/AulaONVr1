Listar nome e sobrenome ordenado 
por sobrenome
SELECT `funcionario`.`PrimeiroNome`,`funcionario`.`UltimoNome` FROM`funcionario` order by `funcionario`.`UltimoNome` asc

Listar todos os campos de 
funcion�rios ordenados por cidade

SELECT * FROM`funcionario` order by `funcionario`.`Cidade` asc

Liste os funcion�rios que t�m sal�rio 
superior a R$ 1.000,00 ordenados 
pelo nome completo


select * from `funcionario` where Salario > 1000.00 order by `funcionario`.`PrimeiroNome`, `funcionario`.`UltimoNome` asc

Liste a data de nascimento e o 
primeiro nome dos funcion�rios 
ordenados do mais novo para o mais 
velho

SELECT `funcionario`.`DataNasci`,`funcionario`.`PrimeiroNome` from `funcionario` order by `funcionario`.`DataNasci` desc 

Liste os funcion�rios como uma 
listagem telef�nica

SELECT `funcionario`.`PrimeiroNome`,`funcionario`.`UltimoNome`,`funcionario`.`Fone` FROM`funcionario` order by `funcionario`.`PrimeiroNome`, `funcionario`.`UltimoNome` asc

Liste o total da folha de pagamento

select sum(`funcionario`.`Salario` ) from `funcionario`;

Liste o nome, o nome do departamento 
e a fun��o de todos os funcion�rios

select f.`PrimeiroNome`, d.`Nome`, f.`Funcao` from `funcionario` f, `departamento` d where d.`Codigo` = f.`CodDepart`

Liste todos departamentos com seus 
respectivos gerentes

select d.* , f.`PrimeiroNome` from `funcionario` f, `departamento` d where f.`Codigo` = d.`CodfuncGerente`

Liste os departamentos dos 
funcion�rios que t�m a fun��o de 
supervisor

select d.`Nome` from departamento d, funcionario f where d.`Codigo` = f.`CodDepart` and f. `Funcao` = 'Supervisor'

Liste a quantidade de funcion�rios 
desta empresa

select count(codigo) from funcionario

Liste o sal�rio m�dio pago pela 
empresa

select avg(`funcionario`.`Salario` ) from `funcionario`;

Liste o nome do departamento e do 
funcion�rio ordenados por 
departamento e funcion�rio

SELECT d.`Nome`, f.`PrimeiroNome` FROM`funcionario` f, `departamento` d where d.`Codigo` = f.`CodDepart` order by d.`Nome`, f.`PrimeiroNome` asc 

Liste os nomes dos funcion�rios que 
trabalham no departamento Pessoal

select f.`PrimeiroNome` from `funcionario` f, `departamento` d where d.`Codigo` = f.`CodDepart` and  d.`Nome` = 'RH'

Liste o valor da folha de pagamento de 
cada departamento (nome)

select d.`Nome`,sum(f.`Salario`) from `funcionario` f, `departamento` d  where f.`CodDepart` = d.`Codigo`  group by d.`Nome`

Liste o menor sal�rio pago pela 
empresa em cada departamento

select d.`Nome`, min(f.`Salario`) from `funcionario` f, `departamento` d  where f.`CodDepart` = d.`Codigo`  group by d.`Nome`

Liste o nome e o departamento de 
todos os funcion�rios que ganham 
mais do que algum gerente

select f.`PrimeiroNome`, d.`Nome` from `funcionario` f, `departamento` d where f.`Salario` > (select max(f.`Salario`) from `funcionario` f where f.`Funcao` = 'Gerente') and d.`Codigo`= f.`CodDepart`

Liste o nome completo de todos os 
funcion�rios que n�o tenham ultimo
nome (dai coloquei soh o primeiro)

select f.`PrimeiroNome` from `funcionario` f where f.`UltimoNome` is null 

Liste os nomes dos funcion�rios que 
moram em Porto Alegre e que exer�am a 
fun��o de Telefonista

select f.`PrimeiroNome` from `funcionario` f where f.`Cidade` = 'Porto Alegre' and f.`Funcao` = 'Telefonista'