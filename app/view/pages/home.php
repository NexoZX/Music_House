<?php
include_once URL_APP . '/view/custom/header.php';

include_once URL_APP . '/view/custom/navbar.php';

include_once URL_APP . '/view/custom/aside.php';

?>


<!-- Panel Principal !-->
<div class="col-md-9">
    <!-- Este es el bloque para quel usuario ingrese su publicacion 
    <div class="container">
        <hr>
        <!-- PROFILE IMAGE 
        <a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $params['usuario']->usuario ?>"><img src="<?php echo URL_PROJECT . '/' . $params['perfil']->fotoPerfil ?>" class="image-border" alt=""></a><br><br>

        <form action="<?php echo URL_PROJECT ?>/publicaciones/publicar/<?php echo $params['usuario']->idUsuario ?>" method="POST" enctype="multipart/form-data" class="form-publicar ml-2">
            <!-- TEXT AREA 
            <textarea name="contenido" id="contenido" class="published mb-0" name="post" placeholder="¿Qué Estas Pensando?" required cols="50" rows="5" style="resize: none"></textarea>
            <!-- UPLOAD PHOTO 
            <div class="image-upload-file">
                <div class="upload-photo">
                    <img src="<?php echo URL_PROJECT ?>/img/image.png" alt="" class="image-public">
                    <div class="input-file">
                    <input type="file" name="imagen" id="imagen">
                    </div>
                    <!-- BUTTONS TO UPLOAD 

                </div>
                <button class="btn-publi">Publicar</button>
            </div>
        </form>
    </div> !-->
    <hr>
    <center>
        <h1 style="font-family: Nunito; text-align:center">Publicaciones Recientes</h1>
    </center>


    <!-- esto genera las publicaciones en si -->
    <?php foreach ($params['publicaciones'] as $datosPublicacion): ?>

        <div class="container-usuarios-publicaciones">
            <div class="usuarios-publicaciones-top">
                <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPerfil ?>" alt="" class="image-border">
                <!-- Seccion donde se datos basicos del usuario y la fecha de publicacion -->
                <div class="informacion-usuario-publico">
                    <h6 class="mb-0"><a
                            href="<?php echo URL_PROJECT ?>/perfil/<?php echo $datosPublicacion->usuario ?>"><?php echo ucwords($datosPublicacion->usuario) ?></a></h6>
                    <span>
                        <?php echo $datosPublicacion->fechaPublicacion ?>
                    </span>
                    <br><br>
                </div>
                <!-- Seccion donde se permite eliminar unicamente al dueño de la publicacion -->
                <div class="acciones-publicacion-usuario">
                    <?php if ($datosPublicacion->usuario == $params['usuario']->usuario) : ?>
                        <a
                            href="<?php echo URL_PROJECT ?>/publicaciones/eliminar/<?php echo $datosPublicacion->idPublicacion ?>"><i
                                class="far fa-trash-alt"></i></a>
                    <?php endif ?>
                </div>
            </div>
            <!-- Seccion donde se carga el contenido -->
            <div class="contenido-publicacion-usuario">
                <p class="mb-1">
                    <?php echo $datosPublicacion->contenidoPublicacion ?>
                </p>
                <?php if ($datosPublicacion->fotoPublicacion != "sin imagen") : ?>
                    <hr>
                    <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPublicacion ?>" alt=""
                        class="imagen-publicacion-usuario">
                <?php endif ?>
                <?php if ($datosPublicacion->audioPublicacion != "sin audio") : ?>
                    <hr>
                    <audio controls>
                        <source src="<?php echo URL_PROJECT . '/' . $datosPublicacion->audioPublicacion ?>" type="audio/mpeg">
                        <source src="<?php echo URL_PROJECT . '/' . $datosPublicacion->audioPublicacion ?>" type="audio/ogg">
                        <source src="<?php echo URL_PROJECT . '/' . $datosPublicacion->audioPublicacion ?>" type="audio/wav">
                    </audio>
                <?php endif ?>
            </div>
            <hr>
            <!-- Seccion donde se cargan los likes -->
            <div class="acciones-usuario-publicar mt-2">
                <a href="<?php echo URL_PROJECT ?>/publicaciones/megusta/<?php echo $datosPublicacion->idPublicacion . '/' . $_SESSION['logueado'] ?>"
                    class="<?php foreach ($params['misLikes'] as $misLikesUser) {
                        if ($misLikesUser->idPublicacion == $datosPublicacion->idPublicacion) {
                            echo 'like-active';
                        }
                    } ?>
                    "><i class="fas fa-heart mr-1"></i> Me Gusta <span>
                        <?php echo $datosPublicacion->num_likes ?>
                    </span></a>
            </div>
            <hr>
            <!-- Seccion donde se cargan los Comentarios -->
            <div class="formulario-comentarios">
                <img src="<?php echo URL_PROJECT . '/' . $params['perfil']->fotoPerfil ?>" alt="" class="image-border mr-2">
                <div class="acciones-formulario-comentario">
                    <form action="<?php echo URL_PROJECT ?>/publicaciones/comentar" method="POST">
                        <input type="hidden" name="idUser" value="<?php echo $params['usuario']->idUsuario ?>">
                        <input type="hidden" name="idPublicacion" value="<?php echo $datosPublicacion->idPublicacion ?>">
                        <input type="text" name="comentario" class="form-comentario-usuario"
                            placeholder="Agregar un comentario" required>
                        <div class="btn-comentario-container">
                            <button class="btn btn-secondary">Comentar</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php foreach ($params['comentarios'] as $datosComentarios): ?>
                <?php if ($datosComentarios->idPublicacion == $datosPublicacion->idPublicacion): ?>
                    <div class="container-contenido-comentarios">
                        <img src="<?php echo URL_PROJECT . '/' . $datosComentarios->fotoPerfil ?>" alt="" class="image-border mr-2">
                        <div class="contenido-comentario-usuario">
                            <?php if ($datosComentarios->idUser == $_SESSION['logueado']): ?>
                                <a href="<?php echo URL_PROJECT ?>/publicaciones/eliminarComentario/<?php echo $datosComentarios->idComentario . '/' . $datosComentarios->idPublicacion ?>"
                                    class="float-right"><i class="far fa-trash-alt"></i></a>
                            <?php endif ?>
                            <a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $datosComentarios->usuario ?>"
                                class="big mr-2"><?php echo $datosComentarios->usuario ?></a>
                            <span>
                                <?php echo $datosComentarios->fechaComentario ?>
                            </span>
                            <p>
                                <?php echo $datosComentarios->contenidoComentario ?>
                            </p>
                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    <?php endforeach ?>
    <hr>
</div>
</div>
</div>
<!--
<div class="container mt-3">
    <div class="row">
        Columna perfil
        <div class="col-md-3">
            <div class="container-style-main">
                <div class="perfil-usuario-main"></div>
                <img src="<?php echo URL_PROJECT . '/' . $params['perfil']->fotoPerfil ?>" alt="">
                <div class="foto-separation"></div>
                <a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $params['usuario']->usuario ?>" class="links">
                    <div class="text-center nombre-perfil">
                        <?php echo $params['perfil']->nombreCompleto ?>
                    </div>
                </a>
                <div class="tabla-estadisticas">
                    <a href="#">Publicaciones <br> 0 </a>
                    <a href="#">Me gusta <br> 0 </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="container-style-main">
            </div>
        </div>
    </div>
</div>
-->

<?php
include_once URL_APP . '/view/custom/footer.php';
?>