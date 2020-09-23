create database prueba;
use prueba;

drop table usuario;
create table usuario(
id int auto_increment not null,
nombre varchar(250) not null,
pass varchar(250) not null,
rol varchar(50) not null,
primary key (id)
);

SELECT * FROM usuario;