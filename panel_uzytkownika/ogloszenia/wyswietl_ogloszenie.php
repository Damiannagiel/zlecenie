<div id="ogl"><a href="../ogloszenie/<?php echo $link[$i]; ?>.php"><div class="wyswietl_ogloszenie">
		<div class="box info_ogloszenie">
			<div class="tytul_ogloszenie"><?php echo $ogloszenia[$i]['tytul']; ?></div>
			<div class="koniec_ogloszenie"><span class="info">Wygasa:</span> <span class="value"><?php echo $ogloszenia[$i]['koniec']; ?></span></div>
			<div class="kategoria_ogloszenie"><span class="info">Kategoria:</span> <span class="value"><?php echo $ogloszenia[$i]['kategoria']; ?></span></div>
			<div class="zasieg_ogloszenie"><span class="info">Zasięg:</span> <span class="value"><?php echo $zasieg[$i]; ?></span></div>
		</div>
		<div class="button-div">
			<a href="../ogloszenie_add/edytuj_ogloszenie.php?ogloszenie=<?php echo $ogloszenia[$i]['id'] ?>"><button class="button-green">Edytuj</button></a>
			<a><button class="button-red" id="del_<?php echo $ogloszenia[$i]['id'];?>">Usuń</button></a>
		</div>
		<div style="clear:both"></div>
</div></a>
</div>

<script>
var click = "#del_"+<?php echo $ogloszenia[$i]['id'];?>;
$(click).on("click", function(e){
		loadContent("usun_ogloszenie","<?php echo $ogloszenia[$i]['id']; ?>");
	});
</script>