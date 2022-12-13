<?php 
include_once Path::VIEW_CABECERA;
?>

<!--FILTROS-->


<div class="container container-principal">

<form action="<?=Redirect::LISTADO_PEDIDOS?>" method="POST" id="frmListadoPedidos" name="frmListadoPedidos">
    <div class="row">

        <div class="col-12 col-lg-1 mb-2">
            <label for="filtroDesde">Desde: </label>
        </div>
        <div class="col-12 col-lg-3 mb-2"> 
            <input type="datetime-local" name="filtroDesde" id="filtroDesde" value="<?=isset($filtroDesde) ? $filtroDesde : ""?>"/>
        </div>

        <div class="col-12 col-lg-1 mb-2">
            <label for="filtroHasta">Hasta: </label>
        </div>
        <div class="col-12 col-lg-3 mb-2"> 
            <input type="datetime-local" name="filtroHasta" id="filtroHasta" value="<?=$fechaActual?>" max="<?=$fechaActual?>" />
        </div>
            
        <div class="col-12 col-lg-4 mb-2">
            <button type="submit" id="btnSubmitListadoPedidoss" name="btnSubmitListadoPedidos" class="btn btn-dark">Aplicar</button>
            <button type="button" id="btnDescargarPDF" name="btnDescargarPDF" class="btn btn-danger" onclick="generarPDF('Listado de pedidos')">Descargar PDF</button>
        </div>

    </div>
</form>

    <div class="h2 mt-5">Listado de Pedidos</div>

    <div id="divTablaPedidos">

    <?php if(!isset($arrayDatos) || count($arrayDatos)<=0) { ?>
        <div class="h2">No hay pedidos entre esas dos fechas</div>
    <?php } else { ?>
        <div class="table-responsive">
        <table class="table descargarPDF" id="tablaPedidos">
        <thead>
            <tr>
                <th>Fecha</th>
                <?php if($_SESSION["usuario"]->getAdministrador()) { ?>
                <th class="centrado">Cliente</th>
                <?php } ?>
                <th class="centrado">No. Pedido</th>
                <th class="centrado">Productos</th>
                <th class="centrado">Importe (IVA inc)</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($arrayDatos as $linea) {?>
            <tr>
                <td class="align-middle"><?=$linea["fecha"]?></td>
                <?php if($_SESSION["usuario"]->getAdministrador()) { ?>
                    <td class="centrado"><?=$linea["email_cliente"]?></td>
                <?php } ?>
                <td class="centrado"><?=$linea["id"]?></td>
                <td class="centrado">
                    <?php 
                    $importeTotal = 0.00;
                    $arrayProductos = $linea["arrayLineas"];
                    ?>
                        <div class="listaLineasPedido">
                            <ul>
                            <?php foreach($arrayProductos as $lineaProducto) { 
                                extract($lineaProducto);
                                $precioProductos = $precio_unitario * $cantidad;
                                $importeTotal += $precioProductos;
                            ?>

                            <li><?=$nombreProducto?> (x<?=$cantidad?>)</li>

                            <?php
                            $importeTotal = number_format($importeTotal, 2, '.', ''); 
                            } 
                            ?> 
                            </ul>
                        </div>

                </td>
                <td class="centrado"><?=$importeTotal?>€</td>

            </tr>
            <?php } ?>

        </tbody>
        </table>
        </div>
    <?php } ?>

    </div>

</div>

    <script src="<?=Path::PUBLIC_JQUERY_JS?>"></script>
    <script src="<?=Path::PUBLIC_JS_PDF?>"></script>
    <?php include_once Path::VIEW_PIE; ?>
    
    