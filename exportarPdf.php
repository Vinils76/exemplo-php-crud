<?php
// exportarPdf.php
use Dompdf\Dompdf;
use Dompdf\Options;
require_once "vendor/autoload.php";

session_start();

$paragrafo = "";
foreach($_SESSION["dados"] as $fabricante){
    $paragrafo .= "<p>". $fabricante['nome'] ."</p>";
}

// Conteúdo html para o resumo usando heredoc PHP
$data = date("d/m/Y");
$conteudo = <<<HTML
    <div style="border: solid 2px; padding: 10px; width: 70%; margin: auto">
        <h2>Resumo de Fabricantes - $data</h2>
        $paragrafo
    </div>
HTML;
$options = new Options();
$options->set('defaultFont', 'courier');
$dompdf = new Dompdf($options);
/* $options = $dompdf->getOptions();
$options->setDefaultFont('Verdana');
$dompdf->setOptions($options); */

$dompdf->loadHtml($conteudo);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Resumo de Fabricantes - ".date("d-m-Y").".pdf");
