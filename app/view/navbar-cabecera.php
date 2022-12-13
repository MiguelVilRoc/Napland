<nav class="navbar navbar-expand-lg navbar-light fixed-top mb-md-4" id="navbar-cabecera">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=Redirect::PRINCIPAL?>"><img src="public/assets/img/NAPLAND_PNG.png" alt="Napland" class="logoNavbar"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <?php if(isset($_SESSION["usuario"]) && !$_SESSION["usuario"]->getAdministrador()) { ?>
      <div class="nav-link carritoIconDiv carrito-sm d-block d-lg-none"> <!--Div carrito pantalla movil-->
          <div class="tamanoCarrito" id="tamanoCarrito"><?php echo $_SESSION["tamanoCarrito"];?></div>
          <span class="carritoIcon"> 
              <a href="<?=Redirect::DETALLES_CARRITO?>"><img src="public/assets/ico/cart.svg" alt="Bootstrap" width="32" height="32"></a>                  
          </span>
      </div>
    <?php } ?>
      
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
    
        <li class="nav-item">
          <a class="nav-link" href="<?=Redirect::LISTADO_PRODUCTOS?>">Productos</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href = "mailto: naplandcontacto@gmail.com" target="_blank">Contacto</a>
        </li>
        

        <?php 
        //Si hay usuario logueado, se muestra el enlace a la página de logout
        if(isset($_SESSION["usuario"])) {
        ?>

          <?php if(!$_SESSION["usuario"]->getAdministrador()) {?>
          <li class="nav-item">
            <a class="nav-link" href="<?=Redirect::ESPACIO_USUARIO?>">Mi Espacio</a>
          </li>
          <?php } else {?>
            <li class="nav-item">
            <a class="nav-link" href="<?=Redirect::ESPACIO_ADMIN?>">Administración</a>
            </li>
          <?php } ?>
    

        <?php }?>

      </ul>

        <!--Parte derecha-->

        <ul class="navbar-nav nav-derecha">
            <?php
            //Si no hay un usuario logueado, se muestra el enlace a la página de login 
            if(!isset($_SESSION["usuario"])) {
            ?>
            
              <li class="nav-item">
                <a class="nav-link" href="<?=Redirect::INICIO_SESION?>">Iniciar Sesión</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=Redirect::DATOS_USUARIO?>">Regístrese</a>
              </li>

            <?php 
            //Si hay usuario logueado, se muestra el enlace a la página de logout
            } else {
            ?>

            <?php if(!$_SESSION["usuario"]->getAdministrador()) { ?>
                <li class="nav-item active d-none d-lg-block">
                      <div class="nav-link carritoIconDiv carrito-lg"> <!--Div carrito pantalla grande-->
                          <div class="tamanoCarrito" id="tamanoCarrito"><?php echo $_SESSION["tamanoCarrito"];?></div>
                          <span class="carritoIcon"> 
                              <a href="<?=Redirect::DETALLES_CARRITO?>"><img src="public/assets/ico/cart.svg" alt="Bootstrap" width="32" height="32"></a>                  
                          </span>
                      </div>
                </li>

                <li class="nav-item active d-none d-lg-block">
                      <a class="nav-link" href="<?=Redirect::ESPACIO_USUARIO?>"><?=$_SESSION["usuario"]->getNombre()?></a>
                  </li>
              <?php }  else { ?>
                <li class="nav-item active d-none d-lg-block">
                      <a class="nav-link" href="<?=Redirect::ESPACIO_ADMIN?>"><span class="nombreAdmin"><?=$_SESSION["usuario"]->getNombre()?></span></a>
                </li>
              <?php } ?>

                   

              <li class="nav-item">
                <a class="nav-link" href="<?=Redirect::CERRAR_SESION?>">Cerrar Sesion</a>
              </li>

             

            <?php }?>
                    
        </ul>

        <!--********-->

    </div>
  </div>
</nav>