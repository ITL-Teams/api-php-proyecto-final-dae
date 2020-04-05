create user "user_m'@'%'
identified by 'password';

create database db_proyectf;

use db_proyectf;
grant all privileges on bd_proyectf.* "user_m'@'%";
flush privileges;

create table if not exists Usuarios(
	id_usuario int primary key,
	nombre varchar(40),
	apellidos varchar(40),
	e_mail varchar(20),
	contraseña varchar(10)
);

create table if not exists Configuraciones(
	id_configuracion int primary key,
	id_usuario int,
	usuario_ssh varchar(30),
	host_ssh varchar(16),
    foreign key(id_usuario) references Usuarios (id_usuario)
);

create table if not exists Dominios(
    id_dominio int primary key,	
	id_configuracion int,
	dominio varchar(40),
	ancho_banda int,
    foreign key (id_configuracion) references Configuraciones(id_configuracion)
);