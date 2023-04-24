<?php
include_once URL_APP . '/view/custom/header.php';

include_once URL_APP . '/view/custom/navbar.php';
?>

<div class="container">
    <div class="row">
        <!-- Columna perfil -->
        <div class="col-md-3">
            <div class="container-style-main">
                <div class="perfil-usuario-main"></div>
                <img src="<?php echo URL_PROJECT . '/' . $params['perfil']->fotoPerfil ?>" alt="">
                <div class="foto-separation"></div>
                <a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $params['usuario']->usuario ?>"><div class="text-center nombre-perfil"><?php echo $params['perfil']->nombreCompleto ?></div></a>
                <div class="tabla-estadisticas">
                    <a href="#">Publicaciones <br> 0 </a>
                    <a href="#">Me gusta <br> 0 </a>
                </div>
            </div>
        </div>
        <!-- Columna principal -->
        <div class="col-md-6">
            <div class="container-style-main">
                <div class="container-usuario-publicar">
                    <a href="<?php echo URL_PROJECT ?>/perfil"><img src="<?php echo URL_PROJECT . '/' . $params['perfil']->fotoPerfil ?>" class="image-border"
                            alt=""></a>
                    <form action="" class="form-publicar ml-2">
                        <textarea name="post" id="" class="published mb-0" cols="30" rows="10"
                            placeholder="Que estas pensando?" required></textarea>
                        <div class="image-upload-file">
                            <div class="upload-photo">
                                <img src="<?php echo URL_PROJECT ?>/img/image.png" alt="" class="image-public">
                                <div class="input-file">
                                    <input type="file" name="imagen" id="imagen">
                                </div>
                                <span class="ml-1">Subir foto</span>
                            </div>
                            <button class="btn-publi">Publicar</button>
                        </div>
                    </form>
                </div>
                <div class="container-usuarios-publicaciones">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="container-style-main">
            </div>
        </div>
    </div>
</div>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>