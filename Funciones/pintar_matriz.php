<?php

function pintar_matriz($tabla)
{
	$b=sizeof($tabla);
	$a=sizeof($tabla[0]);
	echo "<table border=1>";
		for ($i=0;$i<$b;$i++)
		{
			echo "<tr>";
				for($m=0;$m<$a;$m++)
				{
					echo "<td>";
					echo $tabla[$i][$m];
					echo "</td>";
				}
			echo "</tr>";
		}
	echo "</table>";
	return;
}