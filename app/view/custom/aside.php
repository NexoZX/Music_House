<div class="container">
    <div class="row">
        <!-- Panel Perfil !-->
        <div class="col-md-3" style="background-color: #EEEEEE;">

            <div class="d-grid gap-2" style="font-family: Nunito;">
                <hr>
                <h2 style="font-family: Nunito; text-align:center">Music House</h2>
                <hr>
                <center>
                    <a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $params['usuario']->usuario ?>"><img src="<?php echo URL_PROJECT . '/' . $params['perfil']->fotoPerfil ?>" class="image-border" alt=""></a><br>
                    <h3>
                        <?php echo ucwords($params['usuario']->usuario) ?>
                    </h3>
                </center>
                <form action="<?php echo URL_PROJECT ?>/publicaciones/publicar/<?php echo $params['usuario']->idUsuario ?>" method="POST" enctype="multipart/form-data" class="form-publicar ml-2">
                    <textarea name="contenido" id="contenido" class="published mb-0" name="post" placeholder="¿Qué Estas Pensando?"  cols="25" rows="4" style="resize: none" required></textarea>
                    <img src="<?php echo URL_PROJECT ?>/img/image.png" alt="" class="image-public">

                    <center>
                        <input type="file" name="imagen" id="selectedFile" style="display: none;" accept="image/png, image/gif, image/jpeg" />
                        <input class="btn btn-secondary" type="button" value="Adjuntar Imagen" onclick="document.getElementById('selectedFile').click();"/><br><p></p>
                        <input type="file" name="audio" id="selectedAudioFile" style="display: none;" accept="audio/mp3" />
                        <input class="btn btn-secondary" type="button" value="Adjuntar Audio" onclick="document.getElementById('selectedAudioFile').click();"/><br><p></p>
                        <button class="btn btn-secondary" width="20">Publicar</button>
                    </center>
                </form>
                <hr>

                <a class="btn btn-secondary" href=""><i class=" fa-solid fa-square-plus" style="color: #ffffff;"></i> Crear</a>
                <a class="btn btn-secondary" href=""><i class="fa-solid fa-compass" style="color: #ffffff;"></i> Explorar</a>
                <a class="btn btn-secondary" href="<?php echo URL_PROJECT ?>/perfil/<?php echo $params['usuario']->usuario ?>"><i class="fa-solid fa-address-card" style="color: #ffffff;"></i> Perfil</a>
                <a class="btn btn-secondary" href=""><i class="fa-solid fa-gear" style="color: #ffffff;"></i> Configuración</a>
                <hr>

                Publicaciones: <?php echo $params['cant']->contado ?> <br>
                Likes: 0<br>
                Seguidores: 0
                <hr>
                <center>
                    <!--
            <p>Historial de Vistas</p>
            <div class="card" style="width: 80%;">
                <img class="card-img-top" src="css/img/mks.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Mario Kart Soundtrack</p>

                </div>
            </div><br>
            <div class="card" style="width: 80%;">
                <img class="card-img-top" src="css/img/cuphead.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Cuphead Soundtrack</p>
                </div>
            </div>
            <hr>
-->
            </div>
        </div>