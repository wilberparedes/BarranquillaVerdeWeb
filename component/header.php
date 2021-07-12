<header id="header" class="header">
    <div class="header-menu">
        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="ti-menu"></i></a>
            <div class="header-left">
            </div>
        </div>
        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
                    <img src="<?php url('assets/images/'.$_SESSION['BQV_foto']) ?>" class="user-image" alt="foto de <?php echo $_SESSION['BQV_nombre_usu']; ?>">
                    <span class="hidden-xs"><?php echo $_SESSION['BQV_nombre_usu']; ?></span> 
                </a>
                <div class="user-menu dropdown-menu">
                    <!-- <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a> -->
                    <!-- <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a> -->
                    <!-- <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a> -->
                    <a class="nav-link" onclick="localStorage.removeItem('paginaSAEP'); location.href='<?php url('cerrarsesion/'); ?>';"><i class="fa fa-power-off"></i> Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
</header>