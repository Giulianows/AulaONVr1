SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `servico` ;
CREATE SCHEMA IF NOT EXISTS `servico` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `servico` ;
drop table if exists `servico`.`funcionario`;

create table if not exists `servico`.`funcionario`
(
	`Codigo` int not null auto_increment,
	`PrimeiroNome` varchar(50) not null,
	`UltimoNome` varchar(50) not null,
	`DataNasci` date not null,
	`CPF` numeric not null,
	`RG` numeric not null,
	`Endereco` varchar(250) not null,
	`Cep` varchar(9) not null,
	`Cidade` varchar(50) not null,
	`Fone` int not null,
	`CodDepart` int not null,
	`Funcao` varchar(30) not null,
	`Salario` float not null,
	primary key (`Codigo`)
)
engine = InnoDB;

drop table if exists `servico`.`departamento`;

create table if not exists `servico`.`departamento`
(

	`Codigo` int not null auto_increment,
	`Nome` varchar(50) not null,
	`Localizacao` varchar(100) not null,
	`CodfuncGerente` int,
	primary key (`Codigo`)
	
)	
engine = InnoDB;

drop table if exists `servico`.`departamento2`;

insert into departamento(Nome,Localizacao,CodfuncGerente) values
('Almoxarifado', 'primeiro andar fundos',null),
('Vendas','primeiro andar frente',null),
('Rh','segundo andar direita',null),
('Financeiro','segundo andar esquerda',null),
('Juridico','segundo andar fundos',null),
('Compras','terceiro andar direita',null),
('Marketing','segundo andar frente',null),
('Administrativo','terceiro andar esquerda',null);

insert into funcionario(PrimeiroNome, UltimoNome, DataNasci,CPF,RG,Endereco,Cep,Cidade,Fone,CodDepart,Funcao,Salario) values
('Carlos', 'Braga', '82/10/21', '02537519000', '6107637859','Rua da Pedra, 365','91360-040','Porto Alegre','33612435','1','Gerente','1500.00'),
('Mauricio','Rosa','87/05/23','05678954321','6109456732','Rua olavo Bilac, 863','91345-046','Porto Alegre','33214556','1','Estoquista','786.00'),
('Rosa','Guimaraes','91/07/06','09867598700','6309625437','Rua Corcovado, 356','91254-048','Cachoreirinha','32456789','1','Auxiliar estoque','522.00'),
('Roger','Santos','88/06/21','02478623678','6523458756','Rua Padre Chagas, 987','96785-056','Porto Algre','32324556','2','Gerente','2000.00'),
('Alysson','Silva','90/06/30','02478623400','9076542391','Rua dos Montes, 123','83245-032','Alvorada','34567890','2','Vendedor','987.00'),
('Marina','Souza','92/10/06','03456787690','6534876523','Rua 13, 90','65432-089','Viamao','32123456','2','Vendedor','987.00'),
('Augusta','Montes','78/09/23','06723456890','7645329867','Rua Padre Cacique, 234','92345-067','Porto Alegre','34086543','3','Gerente','2500.00'),
('Roberta','Alves','85/12/12','03256798700','2805432657','Rua da Pindaiba, 541','90345-032','Cachoeirinha','31675423','3','Auxiliar RH','1300.00'),
('Roberto','Justus','87/11/09','04312345678','8734562109','Rua Hilario, 456','91234-045','Porto Alegre','21432343','4','Gerente','2250.00'),
('Antonio','Mendes','92/06/30','04567512300','1234215467','Rua Cipo, 98','91360-028','Porto Alegre','34567321','4','Gestor','1000.00'),
('Luis','Solano','70/08/21','01234521334','6754239102','Rua 24 de outubro, 502','92345-067','Porto Alegre','34431000','5','Gerente','4000.00'),
('Everson','Figueira','92/04/22','02356743200','6123620923','Rua Almirante, 12','87654-023','Gravatai','98745632','5','Estagiario','560.00'),
('Suzana','Verner','84/08/21','04512334598','6312784590','Rua Otavio Luis, 96','98654-012','Viamao','92075688','6','Gerente','1300.00'),
('Romario','Bota','86/05/12','08743212300','9876432154','Rua Raimundo Dias, 345','94311-011','Porto Alegre','32456711','6','Auxiliar de compras','750.00'),
('Raimunda','Dias','86/09/30','08743265289','9876487564','Rua Gloria, 22','95432-011','Alvorada','3249999','6','Auxiliar de compras','750.00'),
('Honorio','Gongo','90/02/12','04523476543','7634987654','Rua Pinto, 69','91111-222','Viamao','21453234','7','Gerente','2500.00'),
('Rafael','Domingues','90/09/23','02345676543','8765432121','Rua Campos Verde, 76','95432-000','Porto Alegre','33402747','8','Gerente','3250.00'),
('Neusa','Oliveira','72/01/23','03465432176','9876123456','Rua Lavras, 1234','98765-333','Porto Alegre','33614324','8','Auxiliar Administrativo','1000.00');

update departamento d INNER JOIN funcionario f ON f.CodDepart  = d.Codigo SET d.CodfuncGerente = f.Codigo ;




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;







	
 

