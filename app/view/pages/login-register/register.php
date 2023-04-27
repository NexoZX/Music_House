<?php
include_once URL_APP . '/view/custom/header.php';
?>

<head>
    <link rel="stylesheet" href="<?php echo URL_PROJECT ?>/css/system.css">
</head>

<section class="contrato">
    <header>
        <span>
        <img src="<?php echo URL_PROJECT ?>/img/MH.png" width="130" height="130"><br>

            <h1 style="font-size: 40px;">Registro de Usuario</h1>
        </span>
    </header>
    <form action="<?php echo URL_PROJECT ?>/home/register" class="contact" method="POST">
        <label class="form-label" for="email">CORREO ELECTRÓNICO:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="micorreo@gmail.com" /><br>
        <label class="form-label" for="usuario">NOMBRE DE USUARIO:</label>
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Alva Majo" /><br>
        <label class="form-label" for="contrasena">CONTRASEÑA:</label>
        <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="contraseña" /><br>
        <br><br>
        <?php if (isset($_SESSION['usuarioError'])): ?>
            <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                <?php echo $_SESSION['usuarioError'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION['usuarioError']);
        endif ?>
        <center>
            <button>Registrarse</button><br><br>
            ¿Ya Tienes una Cuenta? <br>
            Inicia Sesión <a href="<?php echo URL_PROJECT ?>/home/login.php">Aquí</a>
        </center>
</section>

<?php

include_once URL_APP . '/view/custom/footer.php';

?>