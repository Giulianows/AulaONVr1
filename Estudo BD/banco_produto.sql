SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `vendas` ;
CREATE SCHEMA IF NOT EXISTS `vendas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `vendas` ;
drop table if exists `vendas`.`produto`;

create table if not exists `vendas`.`produto`
(
	`id` int not null auto_increment,
	`pnome` varchar(50) not null,
	`preco` integer not null,
	`categoria` varchar(50) not null,
	`fabricante` varchar(50) not null,
	primary key (`id`)
)
engine = InnoDB;

drop table if exists `vendas`.`compra`;

create table if not exists `vendas`.`compra`
(

	`id` int not null auto_increment,
	`comprador` varchar(50) not null,
	`vendedor` varchar(50) not null,
	`loja` varchar(50) not null,
	`produto` varchar(50) not null,
	primary key (`id`)
	
)	
engine = InnoDB;

drop table if exists `vendas`.`companhia`;

create table if not exists `vendas`.`companhia`
(

	`id` int not null auto_increment,
	`cnome` varchar(50) not null,
	`valorAcao` integer not null,
	`pais` varchar(50) not null,
	primary key (`id`)
	
)	
engine = InnoDB;

create table if not exists `vendas`.`pessoa`
(

	`id` int not null auto_increment,
	`nomePess` varchar(50) not null,
	`tel` varchar(50) not null,
	`cidade` varchar(50) not null,
	primary key (`id`)
	
)	
engine = InnoDB;

insert into produto(pnome,preco,categoria,fabricante) values
('Tenis shox','500','Calcado','Nike'),
('Sapatenis','250','Calcado','Adidas'),
('Camiseta P','100','Vestuario','Quiksilver'),
('Camiseta M','85','Vestuario','Billabong'),
('Luva de box','170','Acessorios','Everlast'),
('Caneleira','50','Acessorios','Puma'),
('Mochila','200','Acessorio','Element'),
('Chuteira futebol 7','120','Calcado','Topper'),
('Meia unisex c/3', '15','Acessorio','Olympikus'),
('Jaqueta de nylon','345','Vestuario','Reebok');

insert into compra(comprador,vendedor,loja,produto) values
('Miguelino','Roger','Paqueta1','Camiseta P'),
('Miguelina','Sabrina','Paqueta3','Tenis shox'),
('Tiago','Marcelo','Paqueta2','Sapatenis'),
('Flavia','Rodrigo','Paqueta3','Mochila'),
('Monica','Marcelo','Paqueta2','Meia unisex c/3'),
('Patricia','Bira','Paqueta1','Jaqueta de nylon'),
('Marcos','Roberto','Paqueta2','Chuteira futebol 7'),
('Pandolfo','Roger','Paqueta1','Caneleira'),
('Roberta','Sabrina','Paqueta3','Camiseta M'),
('Anderson','Roger','Paqueta1','Luva de box');

insert into companhia(cnome,valorAcao,pais) values
('Paqueta','2','Brasil'),
('Adidas','23','Alemanha'),
('Nike','25','Eua'),
('Quiksilver','17','Australia'),
('Billabing','15','Australia'),
('Everlast','12','Eua'),
('Puma','10','Alemanha'),
('Element','9','Eua'),
('Topper','6','Argentina'),
('Olympikus','7','Brasil'),
('Reebok','11','Eua');

insert into pessoa(nomePess,tel,cidade) values
('Miguelino','32546789','Porto Alegre'),
('Roger','32213456','Cachoeirinha'),
('Miguelina','98763245','Porto Alegre'),
('Sabrina','99975432','Viamao'),
('Tiago','95183245','Cachoeirinha'),
('Marcelo','34342112','Alvorada'),
('Flavia','87652345','Porto Alegre'),
('Rodrigo','31243212','Alvorada'),
('Monica','96534265','Gravatai'),
('Patricia','87232212','Porto Alegre'),
('Bira','33334546','Viamao'),
('Marcos','92234567','Porto Alegre'),
('Roberto','35673423','Gravatai'),
('Pandolfo','78453212','Gramado'),
('Roberta','33433551','Porto Alegre'),
('Anderson','81233201','Pelotas');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;







	
 

