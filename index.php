<?php

include('vendor/autoload.php');

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

include('funciones.php');

 $data = json_decode(file_get_contents('php://input'), true);

 $len=32;

 $tasa_dolar = $data['configuracion']['tasa_dolar'];

 
 #var_dump($data);

 #die();

$nombreImpresora = "POS-58";
$connector = new WindowsPrintConnector($nombreImpresora);
$impresora = new Printer($connector);
$impresora->setJustification(Printer::JUSTIFY_CENTER);
$impresora->setTextSize(1, 1);


$espacio = calcularEspacios("", '', $len,'*');

$impresora->text( $espacio."\n");

 $impresora->text( "SENIAT\n");
  $impresora->text( "Rif J-0000000-000\n");
 $impresora->text( "Titiwow\n");
 $impresora->text( "Direccion\n");
 $impresora->text( "Rif J-0000000-000\n");
 $impresora->text( "Caja 01\n");

 $impresora->text( "Informacion del Cliente"."\n");

 $espacio = calcularEspacios("Cliente: ", $data['cliente']['full_name'], $len,' ');

 $impresora->text(calcularEspacios("Cliente: ", $data['cliente']['full_name'], $len,' '));
 $impresora->text(calcularEspacios("RIF / CI: ", $data['cliente']['id'], $len,' '));
 $impresora->text( "Factura "."\n");

 $impresora->text(calcularEspacios("Factura: ", $data['id'], $len,' '));
 $impresora->text(calcularEspacios("Fecha: ", substr($data['created_at'], 8,2).'/'.substr($data['created_at'], 5,2).'/'.substr($data['created_at'], 0,4), $len,' '));
 $impresora->text(calcularEspacios('', '', $len,'-'));



 

foreach ($data['detalles'] as $d) {
    $impresora->text( "".$d['cantidad']." X ".number_format($d['precio_unitario'],2,',','.')."\n");

    $impresora->text(calcularEspacios($d['producto']['nombre_producto'], number_format($d['precio_total'],2,',','.'), $len,' '));
    
}

$impresora->text(calcularEspacios('', '', $len,'-'));

$impresora->text(calcularEspacios('Excento ', number_format(($data['base_impuesto']+$data['monto_impuesto']-$data['monto_total']),2,',','.'), $len,' '));

$impresora->text(calcularEspacios('Base Imponible ', number_format($data['base_impuesto'],2,',','.'), $len,' '));

$impresora->text(calcularEspacios('Monto IVA ', number_format($data['monto_impuesto'],2,',','.'), $len,' '));

$impresora->text(calcularEspacios('', '', $len,'-'));

$impresora->text(calcularEspacios('Total ', number_format($data['monto_total'],2,',','.'), $len,' '));

$impresora->text('');
$impresora->text('Gracias por su Compra');

 

 


#$impresora->text("Imprimiendo\n");
#$impresora->text("ticket\n");
#$impresora->text("desde\n");
#$impresora->text("Laravel\n");
#$impresora->setTextSize(1, 1);
#$impresora->text("https://parzibyte.me");

/*$impresora->feed(5);
$printer -> cut();
$impresora->close();*/

