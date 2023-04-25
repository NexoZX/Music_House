create database redsocial
use redsocial

create table usuarios
{
idUsuario INT,
idPrivilegio INT,
correo VARCHAR(100),
usuario VARCHAR(50),
contrasena VARCHAR(255),
fecha_registro TIMESTAMP,
PRIMARY KEY (idUsuario)
}

create table perfil
{
idPerfil INT,
idUsuario INT, 
fotoPerfil VARCHAR(255) ,
nombreCompleto VARCHAR(100),
PRIMARY KEY (idPerfil)
}

create table publicaciones
{
idPublicacion INT,
idUserPublico INT,
contenidoPublicacion LONGTEXT,
fechaPublicacion TIMESTAMP,
PRIMARY KEY (idPublicacion)
}

create table comentarios 
{
idComentario INT,
idPublicacion INT,
contenidoComentario LONGTEXT,
fechaComentario TIMESTAMP,
PRIMARY KEY (idComentario)
}

create table likes
{
idLike INT,
idPublicacion INT,
PRIMARY KEY (idLike)
}

create table mensajes
{
idMensaje INT,
usuario_idUsuario INT,
usuarioMando INT,
contenido LONGTEXT,
fechaMensaje TIMESTAMP,
PRIMARY KEY (idMensaje)
}

create table notificaciones
{
idNotificacion INT,
idUsuario INT,
tipoNotificacion INT,
PRIMARY KEY (idNotificacion)
}

create table tipoNotificaciones
{
idTiposNotificaciones INT,
nombreTipo VARCHAR(60),
mensajeNotificacion LONGTEXT,
PRIMARY KEY (idTiposNotificaciones)
}

create table privilegios
{
idPerfil INT,
nombrePrivilegio VARCHAR(100),
PRIMARY KEY (idPerfil)
}