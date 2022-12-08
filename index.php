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

/*$nombreImpresora = "POS-58";
$connector = new WindowsPrintConnector($nombreImpresora);
$impresora = new Printer($connector);
$impresora->setJustification(Printer::JUSTIFY_CENTER);
$impresora->setTextSize(1, 1);*/


$espacio = calcularEspacios("", '', $len,'*');

echo( $espacio."\n");

 echo( "SENIAT\n");
  echo( "Rif J-0000000-000\n");
 echo( "Titiwow\n");
 echo( "Direccion\n");
 echo( "Rif J-0000000-000\n");
 echo( "Caja 01\n");

 echo( "Informacion del Cliente"."\n");

 $espacio = calcularEspacios("Cliente: ", $data['cliente']['full_name'], $len,' ');

 echo(calcularEspacios("Cliente: ", $data['cliente']['full_name'], $len,' '));
 echo(calcularEspacios("RIF / CI: ", $data['cliente']['id'], $len,' '));
 echo( "Factura "."\n");

 echo(calcularEspacios("Factura: ", $data['id'], $len,' '));
 echo(calcularEspacios("Fecha: ", substr($data['created_at'], 8,2).'/'.substr($data['created_at'], 5,2).'/'.substr($data['created_at'], 0,4), $len,' '));
 echo(calcularEspacios('', '', $len,'-'));



 

foreach ($data['detalles'] as $d) {
    echo( "".$d['cantidad']." X ".number_format($d['precio_unitario'],2,',','.')."\n");

    echo(calcularEspacios($d['producto']['nombre_producto'], number_format($d['precio_total'],2,',','.'), $len,' '));
    
}

echo(calcularEspacios('', '', $len,'-'));

echo(calcularEspacios('Excento ', number_format(($data['base_impuesto']+$data['monto_impuesto']-$data['monto_total']),2,',','.'), $len,' '));

echo(calcularEspacios('Base Imponible ', number_format($data['base_impuesto'],2,',','.'), $len,' '));

echo(calcularEspacios('Monto IVA ', number_format($data['monto_impuesto'],2,',','.'), $len,' '));

echo(calcularEspacios('', '', $len,'-'));

echo(calcularEspacios('Total ', number_format($data['monto_total'],2,',','.'), $len,' '));

echo('');
echo('Gracias por su Compra');

 

 


#$impresora->text("Imprimiendo\n");
#$impresora->text("ticket\n");
#$impresora->text("desde\n");
#$impresora->text("Laravel\n");
#$impresora->setTextSize(1, 1);
#$impresora->text("https://parzibyte.me");

/*$impresora->feed(5);
$printer -> cut();
$impresora->close();*/

