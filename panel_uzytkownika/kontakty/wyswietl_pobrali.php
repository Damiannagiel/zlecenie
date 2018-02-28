<div class="pobral_div">
	<div class="nazwa_ogloszenia"><a href="../ogloszenie/<?php echo $link_pobral[$i]; ?>.php"><?php
            echo $moje_ogloszenia[$i]['title'];
            if($archives_my[$i]==true)echo'<span class="archives"> (zarchiwizowano)</span>';
        ?></a></div>
	<?php 
	
		for($i2=0;$i2<$ile_pobrano_kontaktow[$i];$i2++)
		{
                    $id=$pobrno_kontaktow[$i][$i2]['user'];
                    $nick=$pobral_nick[$i][$i2]['login'];
                    $data=$pobrno_kontaktow[$i][$i2]['date'];
                    $tytul=$moje_ogloszenia[$i]['title'];
                    $id_ogl=$moje_ogloszenia[$i]['id'];
			echo '<div class="kontakt_szczegol" onclick="wyswietl_opcje('.$id.');"><span class="user_name">-'.$nick.'</span><span class="user_time">'.$data.'</span></div><div class="kontakt_opcje" id="user_'.$id.'"><div class="button-div"><a class="link" target="_blank" href="../public_profile/user.php?id='.$id.'"><button class="button-green"><i class="icon-user"></i><span>Zobacz profil</span></button></a><a href="wiadomosci/index.php?ogl_id='.$id_ogl.'&user_id='.$id.'&tytul='.$tytul.'&user_name='.$nick.'"><button class="button-green"><i class="icon-mail"></i><span>Wyślij wiadomość</span></button></a></div></div>';
		}
		
	?>
</div>



