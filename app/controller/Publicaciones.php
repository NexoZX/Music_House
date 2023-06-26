<?php

class Publicaciones extends Controller
{
    public function __construct()
    {
        $this->publicar = $this->model('publicar');
    }

    public function publicar($idUsuario)
    {
        if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] != 0) {
            $carpeta = 'C:/xampp/htdocs/Music_House/public/img/imagenesPublicaciones/';
            opendir($carpeta);
            $rutaImagen = 'img/imagenesPublicaciones/' . $_FILES['imagen']['name'];
            $ruta = $carpeta . $_FILES['imagen']['name'];
            copy($_FILES['imagen']['tmp_name'], $ruta);
        } else {
            $rutaImagen = 'sin imagen';
        }

        if (isset($_FILES['audio']) && $_FILES['audio']['size'] != 0) {
            $carpetaAud = 'C:/xampp/htdocs/Music_House/public/audio/audioPublicaciones/';
            opendir($carpetaAud);
            $audioNameFix = str_replace(' ', '_', $_FILES['audio']['name']);
            $rutaAudio = 'audio/audioPublicaciones/' . $audioNameFix;
            $ruta = $carpetaAud . $audioNameFix;
            copy($_FILES['audio']['tmp_name'], $rutaAudio);
        } else {
            $rutaAudio = 'sin audio';
        }

        $datos = [
            'iduser' => trim($idUsuario),
            'contenido' => trim($_POST['contenido']),
            'audio' => $rutaAudio,
            'foto' => $rutaImagen
        ];

        if ($this->publicar->publicar($datos)) {
            redirection('/home');
        } else {
            echo 'algo ocurrio';
        }
    }

    public function eliminar($idpublicacion)
    {
        $publicacion = $this->publicar->getPublicacion($idpublicacion);

        if ($this->publicar->eliminarPublicacion($publicacion)) {
            unlink(URL_PUBLIC_DIRECTORY . '/' . $publicacion->fotoPublicacion);
            unlink(URL_PUBLIC_DIRECTORY . '/' . $publicacion->audioPublicacion);
            redirection('/home');
        } else {
            # code...
        }
    }

    public function megusta($idPublicacion, $idUsuario)
    {
        $datos = [
            'idPublicacion' => $idPublicacion,
            'idUsuario' => $idUsuario
        ];

        $datosPublicacion = $this->publicar->getPublicacion($idPublicacion);

        if ($this->publicar->rowLikes($datos)) {
            if ($this->publicar->eliminarLike($datos)) {
                $this->publicar->deleteLikeCount($datosPublicacion);
            }
            redirection('/home');
        } else {
            if ($this->publicar->agregarLike($datos)) {
                $this->publicar->addLikeCount($datosPublicacion);
            }
            redirection('/home');
        }
    }

    public function comentar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'idUser' => trim($_POST['idUser']),
                'idPublicacion' => trim($_POST['idPublicacion']),
                'comentario' => trim($_POST['comentario']),
            ];

            if ($this->publicar->publicarComentario($datos)) {
                redirection('/home');
            } else {
                redirection('/home');
            }
        } else {
            redirection('/home');
        }
    }

    public function eliminarComentario($id, $idPublicacion)
    {
        if($this->publicar->eliminarComentarioUsuario($id,$idPublicacion)){
            redirection('/home');
        } else {
            redirection('/home');
        }
    }
}