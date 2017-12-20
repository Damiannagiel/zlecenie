<header class="categories">
<h3><?php echo $kategoria ?></h3>
<?php if(isset($ile_pasuje))echo $ile_pasuje; ?>
</header>

<mine>
<div class="inline left">

	<div class="categories">
		<h4>Podkategorie: <?php if(isset($przodek1))echo '<a class="link" href="'.$przodek1.'.php'.@$ogon.'">^^</a>'; ?></h4>
		<?php 
			if(isset($potomek))
			{
				echo $potomek_wyswietl;
			}
		?>
	</div>

	<div class="type" id="type">
		<label class="label type_0 label_active">Wszyscy<input id="type_0" type="radio" class="type_input" name="type" value="0" checked="checked"/></label>
		<label class="label type_1 label_no_active">Zleceniodawcy<input id="type_1" id="inp1" type="radio" class="type_input" name="type" value="1"/></label>
		<label class="label type_2 label_no_active">Wykonawcy<input id="type_2" id="inp2" type="radio" class="type_input" name="type" value="2"/></label>
	</div>
		
	<div class="location">
		<h4>Zasięg:</h4>
		<div id="woj">
			<select class="inp" name="woj" onChange='load_pow(this.value);search_location("woj",this.value,"<?php echo $kategoria_js ?>")'>
				<option value="all">Cały kraj</option>
				<option value="dolnośląskie">dolnośląskie</option>
				<option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
				<option value="lubelskie">lubelskie</option>
				<option value="lubuskie">lubuskie</option>
				<option value="łódzkie">łódzkie</option>
				<option value="małopolskie">małopolskie</option>
				<option value="mazowieckie">mazowieckie</option>
				<option value="opolskie">opolskie</option>
				<option value="podkarpackie">podkarpackie</option>
				<option value="podlaskie">podlaskie</option>
				<option value="pomorskie">pomorskie</option>
				<option value="śląskie">śląskie</option>
				<option value="świętokrzyskie">świętokrzyskie</option>
				<option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
				<option value="wielkopolskie">wielkopolskie</option>
				<option value="zachodniopomorskie">zachodniopomorskie</option>
			</select>
		</div>
		<div id="pow">
		
		</div>
		<div id="city">
		
		</div>
	</div>
	<div class="advanced_search">
		<a href="../szukaj_ogloszenia/">wyszukiwanie zaawansowane</a>
	</div>
</div>

<div class="inline right">
	<div class="top">
		<div id="categories_viev">
			<a href="#">igu</a> > <?php if(isset($przodek)) echo $przodek_wyswietl;?><b><?php echo $kategoria ?></b>
		</div>
		<div class="filters">
			<button class="filters-button">filtry</button>
			<div class="spacer"></div>
			<select class="sort" name="sort">
				<option value="wyswietlen">Najpopularniejsze</option>
				<option value="kontaktow+">Najwięcej kontaktów</option>
				<option value="kontaktow-">Najmniej kontaktów</option>
				<option value="dodane">Data dodania:najnowsze</option>
				<option value="koniec">Data wygaśnięcia:najbliżej</option>
			</select>
		</div>
	</div>
	
	<div id="classifieds" class="maxwidth"> 
		<article>
			<?php
				if((isset($pobierz))&&($pobierz!=false))
				{
					for($i=0;$i<$ile;$i++)
					{
						include 'mapa/ogloszenie.php';
					}
				}
				else
				{
					if((isset($_SESSION['blad_atak']))||(isset($_SESSION['blad_miasto_znaki']))||(isset($_SESSION['blad_miasto_dlugosc'])))
					{
						echo '<div class="error">'.@$_SESSION['blad_atak'].@$_SESSION['blad_miasto_znaki'].@$_SESSION['blad_miasto_dlugosc'].'</div>';
						unset($_SESSION['blad_atak'],$_SESSION['blad_miasto_znaki'],$_SESSION['blad_miasto_dlugosc']);
					}
				}
			?>
		</article>


	</div>
</div>
</mine>

<div style="clear:both"></div>

<script>
		onload_filter();
		var kat_js= "<?php echo $kategoria_js ?>";
		$(".left .type .label").click(function(e)
		{
			$(".label_active").removeClass("label_active").addClass("label_no_active");
			$(this).removeClass("label_no_active").addClass("label_active");
		});
		
		$(".left .type .label .type_input").click(function(e)
		{
			var val = $(this).attr('value');
			search(val,kat_js);
		});
		
		var filters = document.querySelector(".filters-button");
		filters.addEventListener("click",function(){
		document.querySelector(".left").classList.toggle("active");
		},false);
</script>
