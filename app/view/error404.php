<?php 
include_once Path::VIEW_CABECERA;
?>

<div class="container container-principal">
    <div class="h2">Error 404: ¡Ups! Parece que esa página no existe</div>
    <a href="<?=Redirect::PRINCIPAL?>">Volver a página principal</a>
</div>

<?php include_once Path::VIEW_PIE; ?>