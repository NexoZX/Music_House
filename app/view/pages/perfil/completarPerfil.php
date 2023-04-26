<?php
include_once URL_APP . '/view/custom/header.php';
?>

<head>
    <link rel="stylesheet" href="<?php echo URL_PROJECT ?>/css/system.css">
</head>

<section class="contrato">
    <header>
        <span>
            <img src="<?php echo URL_PROJECT ?>/img/MH.png" width="130" height="130">
            <h1 style="font-size: 40px;">Completa tu perfil</h1>
            <h6 class="text-center">Antes de continuar deberas completar tu perfil</h6>
        </span>
    </header>
    <form action="<?php echo URL_PROJECT ?>/home/insertarRegistrosPerfil" class="contact" method="POST"
        enctype="multipart/form-data">
        <input type="hidden" name="id_user" value="<?php echo $_SESSION['logueado'] ?>">
        <br>
        <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" required>
        </div>
        <div class="form-group">
            <div class="custom-file">
                <br>
                <label class="form-label" for="foto">Adjuntar una Foto:</label>
                <input type="file" class="custom-file-input" name="imagen" id="imagen" required>
            </div>
        </div>
        <br><br>
        <center>
            <button>Registrar Datos</button><br><br>
        </center>
</section>

<?php
include_once URL_APP . '/view/custom/footer.php';
?>