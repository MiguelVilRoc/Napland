
<?php
    include_once Path::VIEW_CABECERA;
?>

<div id="containerTicket" class="container container-principal">

    <div class="h2 mt-5">Compra realizada</div>
    <div class="h4 mt-4">Muchas gracias por su confianza</div>
   <div class="h5 mt-4"> Este es el ticket de su pedido:</div>

<div class="descargarPDF">
    <div>
        <div>Nº Pedido: <?=$id_pedido?></div>
        <div>Fecha: <?=$fecha?></div>
    </div>

        <div id="listaProductos">
            <table id="tablaCarrito" class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th class="centrado">Precio ud (IVA inc)</th>
                    <th class="centrado">Cantidad</th>
                    <th class="centrado">Total</th>
                </tr>
            </thead>

            <tbody>

            </tbody>
            <?php foreach($arrayLineas as $linea){ ?>
                <tr>
                    <td><?=$linea["nombre"]?></td>
                    <td class="centrado"><?=$linea["precioUd"]?></td>
                    <td class="centrado"><?=$linea["cantidad"]?></td>
                    <td class="centrado"><?=$linea["totalLinea"]?></td>
                </tr>
            <?php } ?>
            <tfoot>
                <tr id ="precioSinIva">
                <th colspan="3">Precio sin IVA</th>
                <td class="centrado"><?=$precioSinIva?>€</td>
                </tr>
                
                <tr id="precioTotal">
                <th colspan="3">Precio Total</th>
                <td class="centrado"><?=$precioTotal?>€</td>    
                </tr>
            </tfoot>

            </table>
        </div>

    </div>

    <div id="botonesTicket">
        <a class="btn btn-primary" href="<?=Redirect::LISTADO_PRODUCTOS?>">Seguir comprando</a>
        <button type="button" id="btnDescargarPDF" name="btnDescargarPDF" class="btn btn-danger" onclick="generarPDF('Ticket de compra')">Descargar PDF</a>
    </div>


</div>
<?php
  include_once Path::VIEW_PIE;
?>
<script src="<?=Path::PUBLIC_JS_PDF;?>"></script>