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

        <form action="<?php echo URL_PROJECT ?>/publicaciones/publicar/<?php echo $params['usuario']->idusuario ?>" method="POST" enctype="multipart/form-data" class="form-publicar ml-2">
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
    <?php foreach ($params['publicaciones'] as $datosPublicacion) : ?>
        <hr>
        <div class="container-usuarios-publicaciones">
            <div class="usuarios-publicaciones-top">
                <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPerfil ?>" alt="" class="image-border">
                <div class="informacion-usuario-publico">
                    
                    <h6 class="mb-0"><a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $datosPublicacion->usuario ?>"><?php echo ucwords($datosPublicacion->usuario) ?></a></h6>
                    <span>
                        <?php echo $datosPublicacion->fechaPublicacion ?>
                    </span>
                    <br><br>
                </div>
            </div>
            <div class="contenido-publicacion-usuario">
                <p class="mb-1">
                    <?php echo $datosPublicacion->contenidoPublicacion ?>
                </p>
                
                <img src="<?php echo URL_PROJECT . '/' . $datosPublicacion->fotoPublicacion ?>" alt="" class="imagen-publicacion-usuario">
            </div>
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