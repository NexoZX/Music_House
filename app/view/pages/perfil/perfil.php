<?php
include_once URL_APP . '/view/custom/header.php';

include_once URL_APP . '/view/custom/navbar.php';
?>



<!-- TEST DE PERFIL !-->
<center>
    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    <!-- aqui !-->
                    <div class="perfil-container-usuario">

                        <hr>



                        <div class="container-header-usuario">

                            <div class="datos-perfil-usuario">
                                <img src="<?php echo URL_PROJECT ?>/<?php echo $params['perfil']->fotoPerfil ?>" class="imagen-perfil-usuario" alt="">

                                <?php if ($params['usuario']->idUsuario == $_SESSION['logueado']) : ?>
                                    <div class="imagen-perfil-cambiar">
                                        <div class="imagen-header-perfil-usuario">

                                            <img src="<?php echo URL_PROJECT ?>/img/imagenesPerfil/imagenes-portada-perfil/cover-img.jpg" class="imagen-portada-perfil" alt="">

                                            <div class="datos-personales-usuario">
                                                <h3>
                                                    <?php echo ucwords($params['usuario']->usuario) ?>
                                                </h3>
                                                <div class="descripcion-usuario">
                                                    <span>
                                                        <?php echo $params['perfil']->nombreCompleto ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <form action="<?php echo URL_PROJECT ?>/perfil/cambiarImagen" method="POST" enctype="multipart/form-data">

                                            <div class="input-file">
                                                <input type="hidden" name="id_user" value="<?php echo $_SESSION['logueado'] ?>">
                                                <input type="file" name="imagen" id="selectedFile" style="display: none;" accept="image/png, image/gif, image/jpeg" />
                                                <input class="btn btn-outline-secondary" type="button" value="Cambiar Imagen" onclick="document.getElementById('selectedFile').click();" / size="20"><br><br>
                                            </div>
                                            <div class="editar-perfil">
                                                <button class="btn btn-outline-secondary" ">Aplicar Cambios</button>
                                            </div>
                                        </form>

                                    </div>
                                <?php endif ?>

                            </div>

                        </div>



                    </div>



                </div>

            </div>

        </div>

    </div>
    </center>




    <?php
    include_once URL_APP . '/view/custom/footer.php';
    ?>