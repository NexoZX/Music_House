<?php

class publicar
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function publicar($datos)
    {
        $this->db->query('INSERT INTO publicaciones (idUserpublico, contenidoPublicacion, fotoPublicacion) VALUES (:iduser, :contenido, :foto)');
        $this->db->bind(':iduser', $datos['iduser']);
        $this->db->bind(':contenido', $datos['contenido']);
        $this->db->bind(':foto', $datos['foto']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPublicaciones()
    {
        $this->db->query('SELECT P.idPublicacion, P.contenidoPublicacion, P.fotoPublicacion, P.fechaPublicacion, P.num_likes, U.usuario, U.idUsuario, Per.fotoPerfil FROM publicaciones P
        INNER JOIN usuarios U ON U.idUsuario = P.idUserPublico
        INNER JOIN perfil Per ON Per.idUsuario = P.idUserPublico
        ORDER BY P.fechaPublicacion DESC');
        return $this->db->registers();
    }

    public function getPublicacion($id)
    {
        $this->db->query('SELECT * FROM publicaciones WHERE idPublicacion = :id');
        $this->db->bind(':id', $id);
        return $this->db->register();
    }

    public function eliminarPublicacion($publicacion)
    {
        $this->db->query('DELETE FROM likes WHERE idPublicacion = :id');
        $this->db->bind(':id', $publicacion->idPublicacion);
        if ($this->db->execute()) {
            $this->db->query('DELETE FROM publicaciones WHERE idPublicacion = :id');
            $this->db->bind(':id', $publicacion->idPublicacion);
            if ($this->db->execute()) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function rowLikes($datos)
    {
        $this->db->query('SELECT * FROM likes WHERE idPublicacion = :publicacion AND idUser = :iduser');
        $this->db->bind(':publicacion', $datos['idPublicacion']);
        $this->db->bind(':iduser', $datos['idUsuario']);
        $this->db->execute();
        return $this->db->count();
    }

    public function agregarLike($datos)
    {
        $this->db->query('INSERT INTO likes (idPublicacion, idUser) VALUES (:publicacion, :iduser)');
        $this->db->bind(':publicacion', $datos['idPublicacion']);
        $this->db->bind(':iduser', $datos['idUsuario']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarLike($datos)
    {
        $this->db->query('DELETE FROM likes WHERE idPublicacion = :publicacion AND idUser = :iduser');
        $this->db->bind(':publicacion', $datos['idPublicacion']);
        $this->db->bind(':iduser', $datos['idUsuario']);
        $this->db->execute();
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addLikeCount($datos)
    {
        $this->db->query('UPDATE publicaciones SET num_likes = :countLike WHERE idPublicacion = :idPublicacion');
        $this->db->bind(':countLike', ($datos->num_likes + 1));
        $this->db->bind(':idPublicacion', $datos->idPublicacion);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteLikeCount($datos)
    {
        $this->db->query('UPDATE publicaciones SET num_likes = :countLike WHERE idPublicacion = :idPublicacion');
        $this->db->bind(':countLike', ($datos->num_likes - 1));
        $this->db->bind(':idPublicacion', $datos->idPublicacion);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function misLikes($user)
    {
        $this->db->query('SELECT * FROM likes WHERE idUser = :id');
        $this->db->bind(':id', $user);
        return $this->db->registers();
    }

    public function publicarComentario($datos)
    {
        $this->db->query('INSERT INTO comentarios (idPublicacion, idUser, contenidoComentario) VALUES (:idpubli, :iduser, :comentario)');
        $this->db->bind(':idpubli', $datos['idPublicacion']);
        $this->db->bind(':iduser', $datos['idUser']);
        $this->db->bind(':comentario', $datos['comentario']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getComentarios()
    {
        $this->db->query('SELECT * FROM comentarios');
        return $this->db->register();
    }

    public function getInformacionComentarios($comentarios)
    {
        $this->db->query('SELECT C.idPublicacion, C.idUser, C.contenidoComentario, C.fechaComentario, P.fotoPerfil, U.usuario FROM comentarios C
        INNER JOIN perfil P ON P.idUsuario = C.idUser
        INNER JOIN usuarios U ON U.idUsuario = C.idUser');
        return $this->db->registers();
    }

    public function eliminarComentarioUsuario($id)
    {
        $this->db->query('DELETE FROM comentarios WHERE idComentario = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}