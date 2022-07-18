<?php

require_once "vendor/autoload.php";
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(); // objeto

$conteudoHtml = "<h2 style='text-align:center'>PHP para PDF</h2>
                <p style='color:red'>Testando lib domPDF</p";

$dompdf->loadHtml($conteudoHtml); // método

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>