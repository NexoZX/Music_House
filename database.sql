create database redsocial
use redsocial


create table tipoNotificaciones
(
idTiposNotificaciones INT NOT NULL AUTO_INCREMENT,
nombreTipo VARCHAR(60),
mensajeNotificacion LONGTEXT,
PRIMARY KEY (idTiposNotificaciones)
);

create table privilegios
(
idPrivilegio INT NOT NULL AUTO_INCREMENT,
nombrePrivilegio VARCHAR(100),
PRIMARY KEY (idPrivilegio)
);

create table usuarios
(
idUsuario INT NOT NULL AUTO_INCREMENT,
idPrivilegio INT,
correo VARCHAR(100),
usuario VARCHAR(50),
contrasena VARCHAR(255),
fecha_registro TIMESTAMP,
PRIMARY KEY (idUsuario),
FOREIGN KEY (idPrivilegio) REFERENCES privilegios(idPrivilegio)
);

create table perfil
(
idPerfil INT NOT NULL AUTO_INCREMENT,
idUsuario INT, 
fotoPerfil VARCHAR(255) ,
nombreCompleto VARCHAR(100),
PRIMARY KEY (idPerfil),
FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);

create table publicaciones
(
idPublicacion INT NOT NULL AUTO_INCREMENT,
idUserPublico INT,
contenidoPublicacion LONGTEXT,
fotoPublicacion VARCHAR(255),
fechaPublicacion TIMESTAMP,
PRIMARY KEY (idPublicacion),
FOREIGN KEY (idUserPublico) REFERENCES usuarios(idUsuario)
);

create table comentarios 
(
idComentario INT NOT NULL AUTO_INCREMENT,
idPublicacion INT,
contenidoComentario LONGTEXT,
fechaComentario TIMESTAMP,
PRIMARY KEY (idComentario),
FOREIGN KEY (idPublicacion) REFERENCES publicaciones(idPublicacion)
);

create table likes
(
idLike INT NOT NULL AUTO_INCREMENT,
idPublicacion INT,
PRIMARY KEY (idLike),
FOREIGN KEY (idPublicacion) REFERENCES publicaciones(idPublicacion)
);

create table mensajes
(
idMensaje INT NOT NULL AUTO_INCREMENT,
usuario_idUsuario INT,
usuarioMando INT,
contenido LONGTEXT,
fechaMensaje TIMESTAMP,
PRIMARY KEY (idMensaje),
FOREIGN KEY (usuario_idUsuario) REFERENCES usuarios(idUsuario)
);

create table notificaciones
(
idNotificacion INT NOT NULL AUTO_INCREMENT,
idUsuario INT,
tipoNotificacion INT,
PRIMARY KEY (idNotificacion),
FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario),
FOREIGN KEY (tipoNotificacion) REFERENCES tipoNotificaciones(idTiposNotificaciones)
);
