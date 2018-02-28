<a href="../ogloszenie/<?php echo $link[$i]; ?>.php"><div class="wyswietl_ogloszenie <?php if($active[$i]!=true)echo"archives"; ?>">
		<div class="box info_ogloszenie">
			<div class="tytul_ogloszenie"><?php echo $ogloszenia[$i]['title']; ?></div>
			<div class="koniec_ogloszenie"><span class="info">Wygasa:</span> <span class="value"><?php echo $ogloszenia[$i]['end']; ?></span></div>
			<div class="kategoria_ogloszenie"><span class="info">Kategoria:</span> <span class="value"><?php echo $ogloszenia[$i]['categories']; ?></span></div>
			<div class="zasieg_ogloszenie"><span class="info">Zasięg:</span> <span class="value"><?php echo $zasieg[$i]; ?></span></div>
		</div>
		<div class="button-div"><?php
                    if($active[$i]==true){
			echo '<a href="../ogloszenie_add/edytuj_ogloszenie.php?ogloszenie='.$ogloszenia[$i]['id'].'"><button class="button-green">Edytuj</button></a>';
			echo '<a><button class="button-red" id="del_'.$ogloszenia[$i]['id'].'">Usuń</button></a>';
                    }
                    else{
                        echo '<a href="../ogloszenie_add/edytuj_ogloszenie.php?ogloszenie='.$ogloszenia[$i]['id'].'&resume=1"><button class="button-green">Wznów</button></a>';
                    }
		?></div>
		<div style="clear:both"></div>
</div></a>

<script>
var click = "#del_"+<?php echo $ogloszenia[$i]['id'];?>;
$(click).on("click", function(e){
		loadContent("usun_ogloszenie","<?php echo $ogloszenia[$i]['id']; ?>");
	});
</script>