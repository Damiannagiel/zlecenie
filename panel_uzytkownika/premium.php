<p>Szczegóły członkowstwa premium</p>

<?php

$trening = 1; 

for($czas=15; $czas<=45; $czas *=1.05)
 {
	 $procentsekundy = substr($czas,3,2);
	 $sekundymnozenie = 60 * ("0.".$procentsekundy);
	 $sekundy = substr($sekundymnozenie,0,2);
	 $minuty = substr($czas,0,2);
	 echo "Twój ".$trening." trening trwa: ".$minuty." minut i ".$sekundy." sekund.<br/>";
	 $trening++;
	
 }

?>