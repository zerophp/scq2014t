
<?php 
function tabla_de_multiplicar ($a, $b)
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



$a=5;
$b=4;

$tabla=tabla_de_multiplicar ($a, $b);
echo "<pre>";
print_r($tabla);
echo "</pre>";

include ("pintar_matriz.php");
pintar_matriz($tabla);









