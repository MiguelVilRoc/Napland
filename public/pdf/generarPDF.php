<?php
include_once "../../app/common/Path.php";
include_once Path::LIBS_DOMPDF;

use Dompdf\Dompdf;
if(isset($_POST["encabezado"]) && isset($_POST["htmlString"])) {
    extract($_POST);

    $dompdf = new Dompdf();
    $encabezadoHtml = "<h1>Napland: $encabezado</h1>";
    //$css = '<link type="text/css" href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet" />';

    $css = "<style>table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
      }</style>";
    $finalHtml = $encabezadoHtml.$htmlString.$css;
    //<link type="text/css" href="/absolute/path/to/pdf.css" rel="stylesheet" 
    $nombreFichero = $encabezado . date("YmdHis") . ".pdf";

    $dompdf->loadHtml($finalHtml);
    $dompdf->render();
    $dompdf->stream($nombreFichero);
}
?>