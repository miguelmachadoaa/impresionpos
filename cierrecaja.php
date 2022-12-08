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
 echo( "Caja ".$data['id']."\n");


 

 
echo(calcularEspacios('Cajero: ', $data['cajero']['full_name'], $len,' '));
echo(calcularEspacios('Fecha Inicio: ', $data['fecha_inicio'], $len,' '));
echo(calcularEspacios('Fecha Cierre: ', $data['fecha_cierre'], $len,' '));
echo(calcularEspacios('Monto Inicial: ', $data['monto_inicial'], $len,' '));
echo(calcularEspacios('Monto Cierre: ', $data['monto_final'], $len,' '));

echo(calcularEspacios('', '', $len,'-'));

 echo( "Formas de pago"."\n");

 
echo(calcularEspacios('', '', $len,'-'));


foreach ($data['pagos'] as $d) {

    if (isset($d['formapago']['nombre_forma_pago'])) {
        echo(calcularEspacios($d['formapago']['nombre_forma_pago'], number_format($d['total_pagos'],2,',','.'), $len,' '));
    }else{
        echo(calcularEspacios('', number_format($d['total_pagos'],2,',','.'), $len,' '));
    }
    
    
}

echo(calcularEspacios('', '', $len,'-'));


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

