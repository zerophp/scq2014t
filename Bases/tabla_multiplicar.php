
<table border=1>
	<tr>
		<td>1</td>
		<td>2</td>
		<td>3</td>
	</tr>
	<tr>
		<td>2</td>
		<td>4</td>
		<td>6</td>
	</tr>
</table>



<?php
// Tabla de multiplicar
echo "Tabla de multiplicar";


$a=5;
$b=4;

echo "<table border=1>";
	for ($i=0;$i<=$b;$i++)
	{
		echo "<tr>";
			for($m=0;$m<=$a;$m++)
			{
				if($i==0 && $m==0)
				{
					echo "<td>";
					echo "";
					echo "</td>";
				}
				else if($m==0)
				{
					echo "<td>";
					echo $i;
					echo "</td>";
				}
				
				else if ($i==0)
				{
					echo "<td>";
					echo $m;
					echo "</td>";
				}
				else {
					echo "<td>";
					echo $m*$i;
					echo "</td>";
				}
			}
		echo "</tr>";
	}
echo "</table>";










