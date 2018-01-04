<?php
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];	
	require_once ($DOCUMENT_ROOT.'/../ini/skryptyPHP/kontakty_skrypt.php');
?>

<h3>Kontakty które pozyskałem:</h3>
<?php 
if($kontakty)
{
	for($i=0;$i<$ile;$i++)
	{
		if($kontakty)
		{
			require('wyswietl_kontakt.php');
		}
	}
}
else
{
	echo "<p>-brak pozyskanych kontaktów</p>";
}
?>
<h3>Pozyskali do mnie kontakt:</h3>
<?php 
if($moje_ogloszenia){
 for($i=0;$i<$ile_moich_ogloszen;$i++){
  if($pobrno_kontaktow[$i]){
   require('wyswietl_pobrali.php');
  }
  else{
   echo '<p>-dotychczas żaden z zalogowanych użytkowników nie pobrał kontaktu do ogłoszenia <a href="../ogloszenie/'.$link_pobral[$i].'.php"><b>'.$tytuł_ogloszenia[$i]['tytul'].'</b></a></p>';
  }
 }
}
else{
 echo "<p>-nie posiadasz własnych ogłoszeń</p>";
}
?>
