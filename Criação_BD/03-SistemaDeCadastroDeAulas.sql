USE `aulaonco_site_aulas` ;
-- -----------------------------------------------------
-- Cria os níveis de curso
-- -----------------------------------------------------
INSERT INTO `Nivel_Disciplina`(`Nivel`) VALUES ('Fundamental');
INSERT INTO `Nivel_Disciplina`(`Nivel`) VALUES ('Médio');
INSERT INTO `Nivel_Disciplina`(`Nivel`) VALUES ('Superior');
INSERT INTO `Nivel_Disciplina`(`Nivel`) VALUES ('Livre');

-- -----------------------------------------------------
-- Cria os Disciplinas nível médio
-- -----------------------------------------------------
INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Português',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Literatura',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Inglês',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Espanhol',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Matemática',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Física',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Química',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Biologia',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('História',2);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Geografia',2);

-- -----------------------------------------------------
-- Cria os Disciplinas nível fundamental
-- -----------------------------------------------------
INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Português',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Inglês',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Espanhol',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Matemática',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Física',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Química',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Biologia',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('História',1);

INSERT INTO `Disciplinas`(`Nome`, `Nivel_Disciplina_Id`) VALUES ('Geografia',1);


INSERT INTO `Cursos_Superiores`(`Nome`) VALUES ('Ciência da Computação');
INSERT INTO `Cursos_Superiores`(`Nome`) VALUES ('Administração');