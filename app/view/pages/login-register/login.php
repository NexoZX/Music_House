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
            <h1 style="font-size: 40px;">Inicio de Sesión</h1>
        </span>
    </header>
    <form action="<?php echo URL_PROJECT ?>/home/login" class="contact" method="POST">
        <br>
        <label class="form-label" for="correo">CORREO ELECTRÓNICO:</label>
        <input type="email" class="form-control" id="email" name="correo" placeholder="micorreo@gmail.com" required/><br>
        <label class="form-label" for="contrasena">CONTRASEÑA:</label>
        <input type="password" class="form-control" id="email" name="contrasena" placeholder="contraseña" required/><br>
        <!-- Alerta cuando el usuario o contraseña son erroneos -->
        <?php if (isset($_SESSION['errorLogin'])): ?>
            <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                <?php echo $_SESSION['errorLogin'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['errorLogin']);
        endif ?>

        <!-- Alerta cuando el registro se completa -->
        <?php if (isset($_SESSION['loginComplete'])): ?>
            <div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">
                <?php echo $_SESSION['loginComplete'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['loginComplete']);
        endif ?>

        <center>
            <button>Iniciar Sesión</button><br><br>
            ¿No Tienes una Cuenta? <br>
            Registrate <a href="<?php echo URL_PROJECT ?>/home/register">Aquí</a>
        </center>
</section>
<?php
include_once URL_APP . '/view/custom/footer.php';
?>