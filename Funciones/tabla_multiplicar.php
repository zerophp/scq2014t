
<?php 
function tabla_de_multiplicar ($a, $b=2)
{	
	for ($i=0;$i<=$b;$i++)
	{	
		for($m=0;$m<=$a;$m++)
		{
			if($i==0 && $m==0)
				$tabla[$i][$m]="";		
			else if($m==0)
				$tabla[$i][$m]=$i;			
			else if ($i==0)	
				$tabla[$i][$m]=$m;
			else 
				$tabla[$i][$m]=$m*$i;
		}
	}
	return $tabla;
}



$operando1=5;
$operando2=4;

$tabla=tabla_de_multiplicar ($operando1, $operando2);
// echo "<pre>";
// print_r($tabla);
// echo "</pre>";

include ("pintar_matriz.php");
pintar_matriz($tabla);


$tabla=tabla_de_multiplicar ($operando1, $operando2);
include ("pintar_matriz.php");
pintar_matriz($tabla);









