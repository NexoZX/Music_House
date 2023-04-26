<header class="header">
    <div class="logo">
        <img src="<?php echo URL_PROJECT ?>/img/MH.png">
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="#"><i class="fa-solid fa-house" style="color: #ffffff;"></i> Inicio</a></li>
            <li><a href="#"><i class="fa-solid fa-user" style="color: #ffffff;"></i> Usuarios</a></li>
            <input class="searchbar" type="text" placeholder=" Buscar">
            <i class="fa fa-search" style="font-size: 18px; color:white"></i>
            <li><a href="#"><i class="fa-solid fa-message" style="color: #ffffff;"></i> Mensajes</a></li>
            <li><a href="#"><i class="fa-solid fa-bell" style="color: #ffffff;"></i> Notificaciones</a></li>
        </ul>
    </nav>

    <div class="dropdown">
        <span class="btn-radio dropdown-toggle white" id="actionPerfil" style="border-radius: 10px; padding: 5px;" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <img src="<?php echo URL_PROJECT . '/' . $params['perfil']->fotoPerfil ?>" alt="perfil" class="img-perfil">
            <?php echo ucwords($_SESSION['usuario']); ?>
        </span>
        <div class="dropdown-menu" aria-labelledby="actionPerfil">
            <a class="dropdown-item" href="<?php echo URL_PROJECT ?>/home/logout">Salir</a>
        </div>
    </div>

    <a onclick="openNav()" class="menu" href="#"><button>Menu</button></a>
    <div id="mobile-menu" class="overlay">
        <a onclick="closeNav()" href="" class="close">&times;</a>
        <div class="overlay-content">
            <a href="#">Inicio</a>
            <a href="#">Usuarios</a>
            <a href="#">Mensajes</a>
            <a href="#">Notificaciones</a>
            <a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $params['usuario']->usuario ?>">Perfil</a>
        </div>
    </div>

</header>