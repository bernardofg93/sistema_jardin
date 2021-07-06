<?php
require_once '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();
    require_once '../views/pdf/ingreso.php';
    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'utf8', array(10, 20, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    $html2pdf->output('Entrevista Inicial.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}