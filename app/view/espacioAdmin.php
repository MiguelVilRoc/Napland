<?php
require Path::VIEW_CABECERA;
?>

<div class="container container-principal">

<div class="h2 cabecera-espacio">Espacio de Administración</div>

<?php include Path::VIEW_MENSAJES_FEEDBACK ?>

    <div class="row justify-content-center">

        <div class="col-6 col-md-4 mt-4 text-center">
                    <div class="item-espacio-personal">
                    <a href="<?=Redirect::DATOS_USUARIO?>"><img class="icon" style="color:antiquewhite" src="public/assets/ico/person-fill.svg" alt="Menu Icon"></a>
                    <div class="espacioCartel" >Mis Datos</div>    
                    </div>
                   
        </div>

        <div class="col-6 col-md-4 mt-4 text-center">
                    <div class="item-espacio-personal">
                    <a href="<?=Redirect::EDITAR_PRODUCTO?>"><img class="icon" style="color:antiquewhite" src="public/assets/ico/database-fill-add.svg" alt="Menu Icon"></a>
                    <div class="espacioCartel">Añadir nuevo producto</div>
                    </div>              
        </div>


        <div class="col-6 col-md-4 mt-4 text-center">
                    <div class="item-espacio-personal">
                    <a href="<?=Redirect::LISTADO_USUARIOS?>"><img class="icon" style="color:antiquewhite" src="public/assets/ico/person-lines-fill.svg" alt="Menu Icon"></a>
                    <div class="espacioCartel">Listado de usuarios</div>    
                    </div>             
        </div>

        <div class="col-6 col-md-4 mt-4 text-center">
                    <div class="item-espacio-personal">
                    <a href="<?=Redirect::EDITAR_CATEGORIAS?>"><img class="icon" style="color:antiquewhite" src="public/assets/ico/tags-fill.svg" alt="Menu Icon"></a>
                    <div class="espacioCartel">Administrar categorías</div>
                    </div>             
        </div>

        <div class="col-6 col-md-4 mt-4 text-center">
            <div class="item-espacio-personal">
            <a href="<?=Redirect::LISTADO_PEDIDOS?>"><img class="icon" style="color:antiquewhite" src="public/assets/ico/card-list.svg" alt="Menu Icon"></a>
            <div class="espacioCartel">Listado Pedidos</div>
            </div>
        </div>

        <div class="col-6 col-md-4 mt-4 text-center">
            <div class="item-espacio-personal">
            <a href="<?=Redirect::LISTADO_PRODUCTOS?>"><img class="icon" style="color:antiquewhite" src="public/assets/ico/list-ul.svg" alt="Menu Icon"></a>
            <div class="espacioCartel">Listado Productos</div>
            </div>
        </div>

    </div>
</div>







<?php
require Path::VIEW_PIE;
?>