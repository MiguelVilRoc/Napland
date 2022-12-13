<?php
include_once Path::VIEW_CABECERA;
?>
<div class="container container-principal">
<?php include Path::VIEW_MENSAJES_FEEDBACK?>
<!--FILTROS-->
<form action="<?=Redirect::LISTADO_PRODUCTOS?>" method="POST" id="frmListadoProductos" name="frmListadoProductos">
<div class="row">
  <div class="col-12 col-lg-auto mb-2">
<label for="filtroCategoria">Categoria: </label>
</div>
<div class="col-12 col-lg-auto mb-2">  
<select name="filtroCategoria" id="filtroCategoria">
    <option value="-1" id="opcionCategoriaVacia" <?php if($filtroCategoria=="-1") echo "selected"?>>-categoría-</option>
    <?php 
    foreach($listaCategorias as $idCategoria=>$categoria) {
      
      $selected = "";
      
      if($filtroCategoria==$idCategoria) 
      $selected = "selected"; 
     
      echo '<option value="'.$idCategoria.'" '.$selected.'>'.$categoria.'</option>';
    }
    ?>
  </select>
  </div>
  <div class="col-12 col-lg-auto mb-2">
    <label for="filtroNombre">Nombre: </label>
  </div>
  <div class="col-12 col-lg-auto mb-2">
    <input type="text" name="filtroNombre" id="filtroNombre" value="<?=$filtroNombre?>">
  </div>

  <div class="col-12 col-lg-auto mb-2">
    <label for="filtroDescripcion">Descripcion: </label>
  </div>
  <div class="col-12 col-lg-auto mb-2">
    <input type="text" name="filtroDescripcion" id="filtroDescripcion" value="<?=$filtroDescripcion?>">
  </div>

  <div class="col-12 col-lg-auto mb-2">
    <button type="submit" id="btnSubmitListadoProductos" name="btnSubmitListadoProductos" class="btn btn-dark">Aplicar</button>
    <button id="btnResetListadoProductos" name="btnResetListadoProductos" class="btn btn-dark">Reset</button>
  </div>

  <div class="col-12 col-lg-auto mb-2">
    <button type="button" id="btnDescargarPDF" name="btnDescargarPDF" class="btn btn-danger" onclick="generarPDF('Listado de Productos')">Descargar PDF</button>
  </div>

</div>
</form>



<!--TABLA RESULTADO PRODUCTOS-->
<?php
  if(empty($listaProductos)) { 
    echo "<h2>No se produjo ningún resultado.</h2>"; 
  }
  else {   
?>

<div class="table-responsive">
<table class="table descargarPDF" id="table-productos">
<tr>
  <th class="noImprimible"></th>
  <th>Nombre</th>
  <th>Descripción</th>
  <th>Ancho</th>
  <th>Largo</th>
  <th>Tipo</th>
  <?php if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->getAdministrador()){ ?>
  <th>Stock</th>
  <?php } else { ?>
  <th>Disponibilidad</th>
  <?php } ?>

  <th class="text-start imprimibleSinColspan"
  <?php 
    
    if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]->getAdministrador()=="0") {
        echo 'colspan="3"';
    } else {
        echo 'colspan="2"';
    }
   
   ?>
  
  >Precio</th>
</tr>


<?php 
$defaultImage = 'public/assets/img/image-not-found-icon.png';

  foreach($listaProductos as $producto) {
    echo "<tr>"; 
    echo "<td class='noImprimible'><img class='imagenListadoProducto' src='";
  if(isset($listaFotos[$producto->getId()])) {
    echo $listaFotos[$producto->getId()];
  } else {
    echo $defaultImage;
  }
  echo "' alt='Imagen de producto' onerror='this.src=\"$defaultImage\"' /></td>";
  echo "<td>".$producto->getNombre()."</td>";
  echo "<td class='tdDescripcion'>".$producto->getDescripcion()."</td>";
  echo "<td>".$producto->getAncho()."cm</td>";
  echo "<td>".$producto->getLargo()."cm</td>";
  echo "<td>".$producto->getNombreCategoria()."</td>";
  if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]->getAdministrador()) {
    echo "<td>".$producto->getStock()."</td>";
  } else {
    $disponibilidad;
    $textColorClass = "";
    if($producto->getStock() <= 0) {
      $disponibilidad = "Agotado";
      $textColorClass = "text-danger";
    } else if($producto->getStock() <= 5) {
      $disponibilidad = "Últimas unidades";
    } else {
      $disponibilidad = "Disponible";
    }
    echo "<td class=$textColorClass>".$disponibilidad."</td>";
  }
  
  echo "<td>".$producto->getPrecioUnitario()."</td>";
  if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]->getAdministrador()=="0") {
    echo "<td class='noImprimible'><a class='botonListado' href='".Redirect::DETALLES_PRODUCTO."&idProducto=".$producto->getId()."'>Detalles</a></td>";
    if(!isset($_SESSION["usuario"])) {
      echo "<td class='noImprimible'><a id='btnregistrarse' class='btn btn-primary' href='".Redirect::INICIO_SESION."' class='botonListado'>Comprar</a></td>";
    } else {
      $disabled = "";
      $colorClass = "btn-primary";
      if($producto->getStock() <= 0) {
        $disabled = "disabled";
        $colorClass = "btn-secondary";
      }
      echo "<td class='noImprimible'><button id='btnComprar' class='btn btnComprar $colorClass' onClick='anadirProducto(".$producto->getId().")' class='botonListado' $disabled>Añadir</button></td>";
    }
  }
  else { 

    echo "<td class='noImprimible'><a class='botonListado' href='".Redirect::DETALLES_PRODUCTO."&idProducto=".$producto->getId()."'>Gestionar</a></td>";
    //echo "<td><a class='botonListado' href='".Redirect::EDITAR_PRODUCTO."&idProducto=".$producto->getId()."'>Editar</a></td>";
    
  }
    echo "</tr>";
  }
?>

</table>
</div>
<?php 
}   
?>
</div> <!--Cierre del container-->
<?php
  include_once Path::VIEW_PIE;
?>
<script src="<?=Path::PUBLIC_JS_LISTADO_PRODUCTOS?>"></script>
<!--Gestion del carrito-->
<?php if(isset($_SESSION["usuario"]) && !$_SESSION["usuario"]->getAdministrador()) {?>
  <script src="<?=Path::PUBLIC_JQUERY_JS?>"></script>
  <script src="<?=Path::PUBLIC_JS_CARRITO;?>"></script>
  <script src="<?=Path::PUBLIC_JS_ANIMACION_IMAGEN;?>"></script>
<?php }?>
<script src="<?=Path::PUBLIC_JS_PDF;?>"></script>
