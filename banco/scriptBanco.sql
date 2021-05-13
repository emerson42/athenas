USE athenas;
CREATE TABLE IF NOT EXISTS Categoria (
  codigo INT(11) PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(150)
);
CREATE TABLE IF NOT EXISTS Pessoa (
  codigo INT(11) PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(150),
  email VARCHAR(150),
  codigoCategoria INT(11),
  CONSTRAINT fk_CategoriaPessoa FOREIGN KEY (codigoCategoria) REFERENCES Categoria(codigo)
);
INSERT INTO Categoria VALUE(0,'Admin');
INSERT INTO Categoria VALUE(0,'Gerente');
INSERT INTO Categoria VALUE(0,'Normal');
INSERT INTO Pessoa VALUE(0,'Jorge da Silva','jorge@terra.com', 1);
INSERT INTO Pessoa VALUE(0,'Flavia Monteiro','flavia@globo.com', 2);
INSERT INTO Pessoa VALUE(0,'Marcos Frota Ribeiro','ribeiro@gmail.com',2);
INSERT INTO Pessoa VALUE(0,'Raphael Souza Santos','rsantos@gmail.com',1);
INSERT INTO Pessoa VALUE(0,'Pedro Paulo Mota','ppmota@gmail.com',1);
INSERT INTO Pessoa VALUE(0,'Winder Carvalho da Silva','winder@hotmail.com',3);
INSERT INTO Pessoa VALUE(0,'Maria da Penha Albuquerque','mpa@hotmail.com',3);
INSERT INTO Pessoa VALUE(0,'Rafael Garcia Souza','rgsouza@hotmail.com',3);
INSERT INTO Pessoa VALUE(0,'Tabata Costa','tabata_costa@gmail.com',2);
INSERT INTO Pessoa VALUE(0,'Ronil Camarote','camarote@terra.com.br',1);
INSERT INTO Pessoa VALUE(0,'Joaquim Barbosa','barbosa@globo.com',1);
INSERT INTO Pessoa VALUE(0,'Eveline Maria Alcantra','ev_alcantra@gmail.com',2);
INSERT INTO Pessoa VALUE(0,'João Paulo Vieira','jpvieria@gmail.com',1);
INSERT INTO Pessoa VALUE(0,'Carla Zamborlini','zamborlini@terra.com.br',3);