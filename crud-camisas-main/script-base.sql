CREATE TABLE clubes(
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(40) NOT NULL,
    constraint pk_clubes primary key(id)
);

INSERT INTO clubes (nome) values ("Boston Celtics");
INSERT INTO clubes (nome) values ("Brooklin Nets");
INSERT INTO clubes (nome) values ("New York Knicks");
INSERT INTO clubes (nome) values ("Philadelphia 76ers");
INSERT INTO clubes (nome) values ("Toronto Raptors");

INSERT INTO clubes (nome) values ("Golden State Warriors");
INSERT INTO clubes (nome) values ("LA Clippers");
INSERT INTO clubes (nome) values ("Los Angeles Lakers");
INSERT INTO clubes (nome) values ("Phoenix Suns");
INSERT INTO clubes (nome) values ("Sacramento Kings");

INSERT INTO clubes (nome) values ("Chicago Bulls");
INSERT INTO clubes (nome) values ("Cleveland Cavaliers");
INSERT INTO clubes (nome) values ("Detroit Pistons");
INSERT INTO clubes (nome) values ("Indiana Pacers");
INSERT INTO clubes (nome) values ("Milwaukee Bucks");

INSERT INTO clubes (nome) values ("Atlanta Hawks");
INSERT INTO clubes (nome) values ("Charlotte Hornets");
INSERT INTO clubes (nome) values ("Miami Heat");
INSERT INTO clubes (nome) values ("Orlando Magic");
INSERT INTO clubes (nome) values ("Washington Wizards");

INSERT INTO clubes (nome) values ("Denver Nuggets");
INSERT INTO clubes (nome) values ("Minnesota Timberwolves");
INSERT INTO clubes (nome) values ("Oklahoma City Thunder");
INSERT INTO clubes (nome) values ("Portland Trail Blazers");
INSERT INTO clubes (nome) values ("Utah Jazz");

INSERT INTO clubes (nome) values ("Dallas Mavericks");
INSERT INTO clubes (nome) values ("Houston Rockets");
INSERT INTO clubes (nome) values ("Memphis Grizzlies");
INSERT INTO clubes (nome) values ("New Orleans Pelicans");
INSERT INTO clubes (nome) values ("San Antonio Spurs");

CREATE TABLE camisas(
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(200) NOT NULL,
    id_clube INT NOT NULL,
    id_marca INT NOT NULL,
    preco float,
    sexo varchar(1), /*M = Masc., F = Fem., U = Unisex*/
    constraint pk_camisas primary key (id)
);

CREATE TABLE marcas(
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(200) NOT NULL,
    constraint pk_marca primary key (id)
);

INSERT INTO marcas (nome) VALUES ("Nike");
INSERT INTO marcas (nome) VALUES ("Adidas");
INSERT INTO marcas (nome) VALUES ("Umbro");
INSERT INTO marcas (nome) VALUES ("Kappa");

ALTER TABLE camisas ADD CONSTRAINT fk_clube FOREIGN KEY (id_clube) REFERENCES clubes (id);
ALTER TABLE camisas ADD CONSTRAINT fk_marca FOREIGN KEY (id_marca) REFERENCES marcas (id);