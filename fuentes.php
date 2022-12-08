<?php

include('vendor/autoload.php');

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

include('funciones.php');

$nombreImpresora = "POS-58";
$connector = new WindowsPrintConnector($nombreImpresora);
$impresora = new Printer($connector);
$impresora->setJustification(Printer::JUSTIFY_CENTER);
$impresora->setTextSize(1, 1);

 $fonts = array(
    Printer:::FONT_A,
    Printer:::FONT_B,
    Printer:::FONT_C);
for($i = 0; $i < count($fonts); $i++) {
    $printer -> setFont($fonts[$i]);
    $printer -> text("The quick brown fox jumps over the lazy dog\n");
}
$printer -> setFont(); // Reset

/*$impresora->feed(5);
$printer -> cut();
$impresora->close();*/

