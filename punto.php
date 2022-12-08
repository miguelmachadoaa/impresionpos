<?php

include('vendor/autoload.php');

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

include('funciones.php');

 $data = json_decode(file_get_contents('php://input'), true);

 $len=32;


 
 #var_dump($data);

 #die();

/*$nombreImpresora = "POS-58";
$connector = new WindowsPrintConnector($nombreImpresora);
$impresora = new Printer($connector);
$impresora->setJustification(Printer::JUSTIFY_CENTER);
$impresora->setTextSize(1, 1);*/

 echo( $data['ticket']);

#$impresora->text("Imprimiendo\n");
#$impresora->text("ticket\n");
#$impresora->text("desde\n");
#$impresora->text("Laravel\n");
#$impresora->setTextSize(1, 1);
#$impresora->text("https://parzibyte.me");

/*$impresora->feed(5);
$printer -> cut();
$impresora->close();*/

