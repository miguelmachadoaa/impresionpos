<?php 


function calcularEspacios($str1, $str2, $len, $ele){

	$total_cadena = (strlen($str1)+strlen($str2));

	if ($total_cadena>$len) {

		$dif= $total_cadena-$len;

		$len_1=strlen($str1);

		$len_2=strlen($str2);

		$parcial = substr($str1, 0, $len_1-($dif+1));

		$str1= $parcial;
	}

	$cant = $len-(strlen($str1)+strlen($str2));

	return $str1.str_pad('', $cant, $ele).$str2."\n";

}


 ?>