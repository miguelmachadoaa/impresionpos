<?php

include('vendor/autoload.php');

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

$nombreImpresora = "Microsoft Print to PDF";
$connector = new WindowsPrintConnector($nombreImpresora);
$impresora = new Printer($connector);
$impresora->setJustification(Printer::JUSTIFY_CENTER);
$impresora->setTextSize(2, 2);
$impresora->text("Imprimiendo\n");
$impresora->text("ticket\n");
$impresora->text("desde\n");
$impresora->text("Laravel\n");
$impresora->setTextSize(1, 1);
$impresora->text("https://parzibyte.me");
$impresora->feed(5);
$impresora->close();

