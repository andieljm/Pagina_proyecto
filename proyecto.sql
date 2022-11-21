create database proyecto;

use proyecto;

create table usuarios (
codigo int not null auto_increment,
    usuario varchar(50) not null,
    clave varchar(50) not null,
    primary key(codigo)
) engine=InnoDB;

create table administrador (
codigoA int not null auto_increment,
    usuarioA varchar(50) not null,
    claveA varchar(50) not null,
    primary key(codigoA)
) engine=InnoDB;

create table paquetes (
codigoP int not null auto_increment,
img varchar(50) not null,
nombre varchar(50) not null,
fechaL date not null,
agarrar int not null,
primary key(codigoP)
)engine=InnoDB;

