DROP DATABASE TITAN;
CREATE DATABASE TITAN;
USE TITAN;

CREATE table if not exists produtos (
    IDPRODUTO INT not null AUTO_INCREMENT,
    NOME varchar(255),
    COR varchar(255),
    PRIMARY KEY (IDPRODUTO)
);

CREATE table if not exists preco (
IDPRECO INT not null AUTO_INCREMENT,
IDPRODUTO int(11),
PRECO decimal(10,2),
primary key (IDPRECO)
);

ALTER TABLE preco
ADD FOREIGN KEY (IDPRODUTO) REFERENCES produtos(IDPRODUTO);

INSERT INTO `produtos` (`NOME`,`COR`) 
VALUES
("Rana Workman","Azul"),
("Yoshi Lott","Vermelho"),
("Gray Valencia","Amarelo"),
("Quail Griffith","Azul"),
("Sierra Mcintyre","Vermelho");

INSERT INTO `preco` (`IDPRODUTO`,`PRECO`)
VALUES
  (1,"38.54"),
  (2,"102.99"),
  (3,"47.19"),
  (4,"67.63"),
  (5,"210.16");
