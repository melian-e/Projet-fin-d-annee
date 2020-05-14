<?php
$n = 4;
$a = rand(0, 5);
$b = rand(5, 15) - $a;

if ($n == 2 || $n <=0 || $n == NULL) {
	echo "<li>Les dimension négatives, 0 et 2 sont impossibles.<li>";
}
else{
	if ($n%2 == 1) {

		$carre = array();
		for ($j = 0 ; $j < $n ; $j++) {
			$carre[$j] = array();
		}

		for ($j = 1 ; $j <= $n ; $j++) {
			for ($i = 1 ; $i <= $n ; $i++) {
				$carre[$j-1][$i-1] = ( $n*(($i+$j-1+floor($n/2))%$n) + (($i+2*$j-2)%$n)+1);
			}
		}
	}

	else if ( ($n/2) %2 == 0) {
		$counter = 1;
		$carre = array();
		for ($j = 0 ; $j < $n ; $j++) {
			$carre[$j] = array();
			for ($i = 0 ; $i < $n ; $i++) {
				$carre[$j][$i] = $counter++;
			}
		}
		for ($j = 1 ; $j <= $n ; $j++) {
			for ($i = 1 ; $i <= $n ; $i++) {
				if ($j%4 == 1 || $j%4 == 0) {
					if ($i%4 == 2 || $i%4 == 3){
						$carre[$j-1][$i-1] = $n*$n - $carre[$j-1][$i-1] + 1;
					}
				}
					

				if ($j%4 == 2 || $j%4 == 3) {
					if ($i%4 == 1 || $i%4 == 0){
						$carre[$j-1][$i-1] = $n*$n - $carre[$j-1][$i-1] + 1;
					}
				}
					
			}
		}
	}

	else if ( ($n/2) %2 == 1) {

		$halfSize = $n/2;
		$tabA = array();
		$tabB = array();
		$tabC = array();
		$tabD = array();

		for ($j=0 ; $j<$halfSize ; $j++) {
			$tabA[$j] = array();
			$tabB[$j] = array();
			$tabC[$j] = array();
			$tabD[$j] = array();
		}

		for ($j=0 ; $j<$halfSize ; $j++) {
			for ($i=0 ; $i<$halfSize ; $i++) {
				$tabA[$j][$i] = 0;
			}
		}
		$i = floor($halfSize/2);
		$j = 0;

		for ($k=1 ; $k<$halfSize*$halfSize+1 ; $k++) {
			if ($tabA[$j][$i] == 0) {
				$tabA[$j][$i] = $k;
			}
			else {
				$j = ($j+2)%$halfSize;
				if(($i-1)<0){
					$i = $halfSize-1;
				}
				else{
					$i = $i-1;
				}
				$tabA[$j][$i] = $k;
			}
			if(($j-1)<0){
				$j = $halfSize-1;
			}
			else{
				$j = $j-1;
			}
			$i = ($i+1)%$halfSize;
		}
		for ($j=0 ; $j<$halfSize ; $j++) {
			for ($i=0 ; $i<$halfSize ; $i++) {
				$tabD[$j][$i] = $tabA[$j][$i] + ($n*$n/4);
				$tabC[$j][$i] = $tabD[$j][$i] + ($n*$n/4);
				$tabB[$j][$i] = $tabC[$j][$i] + ($n*$n/4);
			}
		}

		// fusionne les tableau (les recolle en fait)
		$carre = array();
		for ($j = 0 ; $j < $n ; $j++) {
			$carre[$j] = array();
			for ($i = 0 ; $i < $n ; $i++) {
				// case de A
				if (($i < $halfSize && $j < $halfSize)) $carre[$j][$i] = $tabA[$j][$i];
				// case de B
				if (($i < $halfSize && $j >= $halfSize)) $carre[$j][$i] = $tabB[$j-$halfSize][$i];
				// case de C
				if (($i >= $halfSize && $j < $halfSize)) $carre[$j][$i] = $tabC[$j][$i-$halfSize];
				// case de D
				if (($i >= $halfSize && $j >= $halfSize)) $carre[$j][$i] = $tabD[$j-$halfSize][$i-$halfSize];
			}
		}

		// inverse les m = (n-2)/4 premières lignes
		$m = ($n-2)/4;
		for ($i=0 ; $i<$m ; $i++) {
			for ($j=0 ; $j<$halfSize ; $j++) {
				$temp = $carre[$j][$i];
				$carre[$j][$i] = $carre[$j+$halfSize][$i];
				$carre[$j+$halfSize][$i] = $temp;
			}
		}

		// inverse la m = (n-2)/4 -1 dernières lignes
		$m = ($n-2)/4 -1;
		for ($i=$n-$m ; $i<$n ; $i++) {
			for ($j=0 ; $j<$halfSize ; $j++) {
				$temp = $carre[$j][$i];
				$carre[$j][$i] = $carre[$j+$halfSize][$i];
				$carre[$j+$halfSize][$i] = $temp;
			}
		}

		// inverse la case du milieu de la première colonne du premier sous carré
		// avec la même case dans le sous-carré en dessous
		$quatrSz = floor($halfSize/2);

		$temp = $carre[$quatrSz][0];
		$carre[$quatrSz][0] =  $carre[$quatrSz + $halfSize][0];
		$carre[$quatrSz + $halfSize][0] = $temp;

		// même chose avec les cases centrales les deux sous-carrés de gauche
		$temp = $carre[$quatrSz][$quatrSz];
		$carre[$quatrSz][$quatrSz] =  $carre[$quatrSz + $halfSize][$quatrSz];
		$carre[$quatrSz + $halfSize][$quatrSz] = $temp;
	}
	echo $a;
	echo "<br><br>";
	echo $b;
	echo "<br><br>";
	for ($j = 0 ; $j < $n ; $j++) {
		echo "<br><br>";
		echo "<tr>";
		for ($i = 0 ; $i < $n ; $i++) {
			echo "<td>";
			echo "	";
			echo ($carre[$j][$i] * $a + $b);
			echo "	";
			echo "</td>";
		}
		echo "</tr>";
	}
}