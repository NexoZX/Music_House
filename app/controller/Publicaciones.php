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

        $datos = [
            'iduser' => trim($idUsuario),
            'contenido' => trim($_POST['contenido']),
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

    public function comentar()
    {
        
    }
}