create database nventas;

use nventas;

CREATE TABLE rol
(`id_rol` INT NOT NULL AUTO_INCREMENT, 
`nombre` VARCHAR(50) NOT NULL, 
PRIMARY KEY (`id_rol`))
ENGINE = innoDB;

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES ('1', 'ROLE_ADMIN');
INSERT INTO `rol` (`id_rol`, `nombre`) VALUES ('2', 'ROLE_USER');

create table usuarios (
id_usuario int not null auto_increment,
id_rol INT NOT NULL,
usuario varchar(50) not null,
clave varchar(50) not null,
primary key(id_usuario),
foreign key fk_usuario_rol (id_rol) references rol(id_rol) 
) engine=InnoDB;

INSERT INTO usuarios (id_rol,usuario,clave) VALUES ('1', 'admin', 'admin');
INSERT INTO usuarios (id_rol,usuario,clave) VALUES ('1', 'user', 'user');

create table ventas (
codigov int not null auto_increment,
nombre varchar(50) not null,
precio double(10,4) not null,
descricion varchar(55) not null,
img longblob not null,
primary key(codigov)
)engine=InnoDB;

