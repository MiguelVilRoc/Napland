<?php
require Path::VIEW_CABECERA;
?>

<div class="container container-principal">

<div class="h2 cabecera-espacio">Espacio de Usuario</div>

<div class="row justify-content-center">

<div class="col-6 mt-2 text-center w-auto">
            <div class="item-espacio-personal w-auto">
            <a href="<?=Redirect::DATOS_USUARIO?>"><img class="icon" style="color:antiquewhite" src="public/assets/ico/person-fill.svg" alt="Menu Icon"></a>
            <div class="espacioCartel">Mis Datos</div>
            </div>
            
</div>

<div class="col-6 mt-2 text-center w-auto">
            <div class="item-espacio-personal w-auto">
            <a href="<?=Redirect::LISTADO_PEDIDOS?>"><img class="icon" style="color:antiquewhite" src="public/assets/ico/card-list.svg" alt="Menu Icon"></a>
            <div class="espacioCartel">Mis Pedidos</div>
            </div>
            
</div>

</div>
</div>







<?php
require Path::VIEW_PIE;
?>