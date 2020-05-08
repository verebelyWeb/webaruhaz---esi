CREATE DATABASE `webshop` DEFAULT CHARSET UTF8 COLLATE utf8_hungarian_ci;

CREATE TABLE kategoriak (
  id int,
  megnevezes varchar(40),
  CONSTRAINT kategoriak_id PRIMARY KEY (id)
)DEFAULT CHARSET utf8;

CREATE TABLE termekek (
  id int,
  kategoriaId int,
  megnevezes varchar(50),
  feszultseg varchar(10),
  teljesitmeny int,
  foglalat varchar(5),
  elettartam int,
  ar int,
  CONSTRAINT termekek_id PRIMARY KEY (id),
  CONSTRAINT kategoria_fk FOREIGN KEY(kategoriaId) REFERENCES kategoriak(id)
)DEFAULT CHARSET utf8;

CREATE TABLE rendelesek (
  id int,
  datum date,
  termekId int,
  db int,
  CONSTRAINT rendelesek_id PRIMARY KEY (id),
  CONSTRAINT termek_fk FOREIGN KEY(termekId) REFERENCES termekek(id) ON DELETE CASCADE ON UPDATE CASCADE
)DEFAULT CHARSET utf8;




