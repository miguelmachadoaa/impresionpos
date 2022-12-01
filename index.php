<?php

include('vendor/autoload.php');

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;


 $data = json_decode(file_get_contents('php://input'), true);

 
 #var_dump($data);

 #die();

$nombreImpresora = "Microsoft Print to PDF";
$connector = new WindowsPrintConnector($nombreImpresora);
$impresora = new Printer($connector);
$impresora->setJustification(Printer::JUSTIFY_CENTER);
$impresora->setTextSize(1, 1);

 $impresora->text( "SENIAT\n");
  $impresora->text( "Rif J-0000000-000\n");
 $impresora->text( "Titiwow\n");
 $impresora->text( "Direccion\n");
 $impresora->text( "Rif J-0000000-000\n");
 $impresora->text( "Caja 01\n");

 $impresora->text( "Informacion del Cliente"."\n");
 $impresora->text( "Cliente: ".$data['cliente']['full_name']."\n");
 $impresora->text( "RIF / CI: ".$data['cliente']['id']."\n");
 $impresora->text( "Cajero: ".$data['cajero']['full_name']."\n");
 $impresora->text( "Factura "."\n");
 $impresora->text( "Factura: ".$data['id']."\n");
 $impresora->text( "Fecha: ".$data['created_at']."\n");
 $impresora->text( "--------------------------------------------------"."\n");

foreach ($data['detalles'] as $d) {
    $impresora->text( "".$d['producto']['nombre_producto']."      ".$d['precio_total']."\n");
    
}

 $impresora->text( "--------------------------------------------------"."\n");
 $impresora->text( "Excento   ".$data['base_impuesto']+$data['monto_impuesto']-$data['monto_total']."\n");
 $impresora->text( "Base Imponible   ".$data['base_impuesto']."\n");
 $impresora->text( "Monto IVA    ".$data['monto_impuesto']."\n");
 $impresora->text( "--------------------------------------------------"."\n");
 $impresora->text( "Total    ".$data['monto_total']."\n");


#$impresora->text("Imprimiendo\n");
#$impresora->text("ticket\n");
#$impresora->text("desde\n");
#$impresora->text("Laravel\n");
#$impresora->setTextSize(1, 1);
#$impresora->text("https://parzibyte.me");

$impresora->feed(5);
$printer -> cut();
$impresora->close();

