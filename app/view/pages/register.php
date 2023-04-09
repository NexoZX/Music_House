<?php

include_once URL_APP . '/view/custom/header.php';

//include_once URL_APP . '/view/custom/navbar.php';
?>

<div class="container-center center">
    <div class="container-content center">
        <div class="content-action center">
            <h4>Iniciar Sesion</h4>
            <form action="<?php echo URL_PROJECT ?>/home/register" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="usuario" placeholder="Usuario" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button class="btn-purple btn-block">Registrarme</button>
            </form>
            <?php if (isset($_SESSION['usuarioError'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                    <?php echo $_SESSION['usuarioError'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php unset($_SESSION['usuarioError']);
            endif ?>
            <div class="contenido-link mt-2">
                <span class="mr-2">¿Ya tienes una cuenta?</span><a href="<?php echo URL_PROJECT ?>/home/login">Ingresar</a>
            </div>
        </div>
        <div class="content-image center">
            <img src="<?php echo URL_PROJECT ?>/img/vector.png" alt="Hombre sentado en una silla">
        </div>
    </div>
</div>

<?php

include_once URL_APP . '/view/custom/footer.php';

?>