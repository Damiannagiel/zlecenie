<div class="pobral_div">
	<div class="nazwa_ogloszenia"><a href="../ogloszenie/<?php echo $link_pobral[$i]; ?>.php"><?php echo $tytuł_ogloszenia[$i]['tytul'];?></a></div>
	<?php 
	
		for($i2=0;$i2<$ile_pobrano_kontaktow[$i];$i2++)
		{
                    $id=$pobrno_kontaktow[$i][$i2]['id_uzytkownika'];
                    $nick=$pobral_nick[$i][$i2]['user'];
                    $data=$pobrno_kontaktow[$i][$i2]['data'];
			echo '<div class="kontakt_szczegol" onclick="wyswietl_opcje('.$id.');"><span class="user_name">-'.$nick.'</span><span class="user_time">'.$data.'</span></div><div class="kontakt_opcje" id="user_'.$id.'"><div class="button-div"><button class="button-green"><i class="icon-user"></i><span>Zobacz profil</span></button><button class="button-green"><i class="icon-mail"></i><span>Wyślij wiadomość</span></button></div></div>';
		}
		
	?>
</div>

