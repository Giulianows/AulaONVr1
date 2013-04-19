USE `aulaonco_site_aulas` ;
-- -----------------------------------------------------
-- Cria os n�veis de curso
-- -----------------------------------------------------
INSERT INTO `Nivel_Disciplina`(`Nivel`) VALUES ('Fundamental');
INSERT INTO `Nivel_Disciplina`(`Nivel`) VALUES ('M�dio');
INSERT INTO `Nivel_Disciplina`(`Nivel`) VALUES ('Superior');
INSERT INTO `Nivel_Disciplina`(`Nivel`) VALUES ('Livre');

-- -----------------------------------------------------
-- Cria os Disciplinas n�vel m�dio
-- -----------------------------------------------------
INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Portugu�s',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Literatura',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Ingl�s',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Espanhol',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Matem�tica',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('F�sica',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Qu�mica',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Biologia',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Hist�ria',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Geografia',2);

-- -----------------------------------------------------
-- Cria os Disciplinas n�vel fundamental
-- -----------------------------------------------------
INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Portugu�s',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Ingl�s',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Espanhol',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Matem�tica',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('F�sica',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Qu�mica',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Biologia',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Hist�ria',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Geografia',1);


INSERT INTO `Cursos_Superiores`(`Nome`) VALUES ('Ci�ncia da Computa��o');
INSERT INTO `Cursos_Superiores`(`Nome`) VALUES ('Administra��o');