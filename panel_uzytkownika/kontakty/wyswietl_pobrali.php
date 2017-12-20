<div class="pobral_div">
	<div class="nazwa_ogloszenia"><a href="../ogloszenie/<?php echo $link_pobral[$i]; ?>.php"><?php echo $tytuł_ogloszenia[$i]['tytul'];?></a></div>
	<?php 
	
		for($i2=0;$i2<$ile_pobrano_kontaktow[$i];$i2++)
		{
			echo '<a class="link" target="_blank" href="../public_profile/user.php?id='.$pobrno_kontaktow[$i][$i2]['id_uzytkownika'].'"><div class="kontakt_szczegol"><span class="user_name">-'.$pobral_nick[$i][$i2]['user'].'</span><span class="user_time">'.$pobrno_kontaktow[$i][$i2]['data'].'</span></div></a>';
		}
		
	?>
</div>

