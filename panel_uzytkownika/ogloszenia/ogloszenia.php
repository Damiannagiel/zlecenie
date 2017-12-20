<?php 
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
	require_once ($DOCUMENT_ROOT.'/../ini/skryptyPHP/ogloszenia_skrypt.php');
?>

<h3>Moje aktywne ogłoszenia</h3>
<?php
	if($ogloszenia)
	{
		for($i=0;$i<$ile_ogloszen;$i++)
		{
			if($ogloszenia[$i])
			{
				require('wyswietl_ogloszenie.php');
			}
		}
	}
	else echo "<p>-brak aktywnych ogłoszeń</p>";
?>
<h3 class="no_margin_bottom">Moje nieaktywne ogłoszenia</h3>
<p class="nawias">(Nieaktywne ogłoszenia pozostają w archiwum przez 3 miesiące następnie są usuwane)</p>
<p>-brak zarchiwizowanych ogłoszeń</p>