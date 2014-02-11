<?php 
function fibonacci($max)
{
	$a=$max;
	$f1=0;
	$f2=1;
	$f3=$f1+$f2;
	
	$fibo=array();
	$fibo[] = 0;
	$fibo[] = 1;
	
	
	while($f3<=$a)
	{
		$fibo[] = $f3;
		$f1=$f2;
		$f2=$f3;
		$f3=$f1+$f2;
	
	}
return $fibo;
}


echo "<pre>";
print_r(fibonacci(90));
echo "</pre>";

echo implode(',',fibonacci(90));


