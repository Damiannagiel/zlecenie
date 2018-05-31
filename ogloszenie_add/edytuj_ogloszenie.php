<!DOCTYPE HTML>
<html lang="pl">
<head>
	<?php
		include_once '../szablon/nav_head.php';
		$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
		include ($DOCUMENT_ROOT.'/../ini/funkcjePHP/funkcje_ogloszenie_add.php');
		include ($DOCUMENT_ROOT.'/../ini/skryptyPHP/edytuj_ogloszenie_skrypt.php');
		wroc_i_usun();
	?>
	<link href="../ogloszenie_add/ogloszenie_add.css" type="text/css" rel="stylesheet"/>
	
	<title>Edytuj ogłoszenie <?php echo $dane['title']; ?></title>
	
	<script src="powiaty/zaznacz_powiat.js" type="text/javascript"></script>
	<script src="kategorie/kategorie.js" type="text/javascript"></script>
	
</head>

<?php
	include_once '../szablon/nav_body.php';
	include_once '../szablon/nav_category.php';
	?>
	<article class="ad">
		<form id="ogl_add" action="ogloszenie_add_skrypt.php" method="post" enctype="multipart/form-data">
			<header>
				<h2>Edytuj ogłoszenie</h2>
			</header>
			
			<div class="ogl_add_input tytul">
				<label for="tytul" class="description">Tytuł ogłoszenia:</label>
				<div class="prawa">
					<input class="inp inp1" type="text" name="tytul" value="<?php if(isset($_SESSION['fr_tytul'])) {echo $_SESSION['fr_tytul'];unset($_SESSION['fr_tytul']);}?>" style="background-color:<?php if(isset($_SESSION['color_tytul'])){echo $_SESSION['color_tytul'];unset($_SESSION['color_tytul']);}?>"/>
					<?php if((isset($_SESSION['blad_tytul_znaki']))||(isset($_SESSION['blad_tytul_dlugosc']))||(isset($_SESSION['blad_tytul_wyp'])))
					{
						echo @$_SESSION['blad_tytul_wyp'];
						echo @$_SESSION['blad_tytul_znaki'];
						echo @$_SESSION['blad_tytul_dlugosc'];
						unset($_SESSION['blad_tytul_dlugosc'],$_SESSION['blad_tytul_znaki'],$_SESSION['blad_tytul_wyp']);
					}
					?>
					<p class="nawias">(Umieszczenie w tytule słów kluczowych takich jak "mechanik" zapewni lepszą pozycję w wyszukiwarkach)</p>
				</div>
				<div style="clear:both"></div>
			</div>
			
			<div class="ogl_add_input typ">
				<label for="typ"  class="description">Szukam:</label>
				<div class="prawa">
					<div>
						<label id="klient_lb" class="no-active">Wykonawcy<input id="klient_inp"  type="radio" value="klient" name="typ"></label>
						<label id="wykonawca_lb" class="no-active">Klientów<input id="wykonawca_inp" type="radio" value="wykonawca" name="typ"></label>
					</div>
					<?php if(isset($_SESSION['blad_typ']))
					{
						echo @$_SESSION['blad_typ'];
						unset($_SESSION['blad_typ']);
					}
					?>
				</div>
				<div style="clear:both"></div>
			</div>
			
			<div class="ogl_add_input kat">
				<label for="typ"  class="description">Kategoria ogłoszenia:</label>
				<div class="prawa">
					<div>
					<div class="prawa" id="kat1_div">
						<select class="inp" onChange="load_kat2(this.value);" name="kat1">
							<option value="@">Wybierz kategorię</option>
							<option id="AGD RTV i komputery" value="AGD RTV i komputery">AGD RTV i komputery</option>
							<option id="Budowlanka" value="Budowlanka">Budowlanka</option>
							<option id="Dom i ogród" value="Dom i ogród">Dom i ogród</option>
							<option id="Edukacja i finanse" value="Edukacja i finanse">Edukacja i finanse</option>
							<option id="Gastronomia i przyjęcia" value="Gastronomia i przyjęcia">Gastronomia i przyjęcia</option>
							<option id="Moda zdrowie i uroda" value="Moda zdrowie i uroda">Moda zdrowie i uroda</option>
							<option id="Motoryzacja" value="Motoryzacja">Motoryzacja</option>
							<option id="inne" value="inne">inne</option>
						</select>
					</div>
					<div class="prawa" id="kat2_div"></div>
					<div class="prawa" id="kat3_div"></div>
					</div>
					<?php if(isset($_SESSION['blad_kat']))
					{
						echo @$_SESSION['blad_kat'];
						unset($_SESSION['blad_kat']);
					}?>
				</div>
				<div style="clear:both"></div>
			</div>
			
			<div class="ogl_add_zasieg">
				<h4>Lokoalizacja</h4>
				<?php 
				if((isset($_SESSION['blad_pow_malo']))||(isset($_SESSION['blad_pow_duzo']))||(isset($_SESSION['blad_pow_nazwa'])))
				{
					echo @$_SESSION['blad_pow_malo'];
					echo @$_SESSION['blad_pow_duzo'];
					echo @$_SESSION['blad_pow_nazwa'];
					unset ($_SESSION['blad_pow_malo'],$_SESSION['blad_pow_duzo'],$_SESSION['blad_pow_nazwa']);
				}
				if((isset($_SESSION['blad_miasto_ilosc']))||(isset($_SESSION['blad_miasto_znaki']))||(isset($_SESSION['blad_miasto_dlugosc'])))
				{
					echo @$_SESSION['blad_miasto_ilosc'];
					echo @$_SESSION['blad_miasto_znaki'];
					echo @$_SESSION['blad_miasto_dlugosc'];
					unset ($_SESSION['blad_miasto_ilosc'],$_SESSION['blad_miasto_znaki'],$_SESSION['blad_miasto_dlugosc']);
				}
				?>
				<div class="wojewodztwo">
					<div class="lab_p">
						<label class="zasieg description">Wybierz województwo</label>
						<p class="nawias">(Klikjąc w mapę, w zależności od potrzeb, możesz wybać jedno lub wiele województw)</p>
					</div>
					<?php
					include_once '../ogloszenie_add/powiaty/caly_kraj.html';
					?>
					<div style="clear:both"></div>
				</div>
				
				<div class="powiat" id="powiat">
				
					<div class="powiat2">
						
					
					</div>
					
					<div id="miejscowosc">
						
					</div>
				
				</div>
				<div style="clear:both"></div>
				
				<div id="miasto_div"></div>
				
			</div>
			
			<div class="ogl_add_input opis">
				<label for="opis"  class="description">Opis: </label>
				<div class="prawa">
					<textarea class="inp area1" name="opis" style="background-color:<?php if(isset($_SESSION['color_opis'])){echo $_SESSION['color_opis'];unset($_SESSION['color_opis']);}?>"><?php if(isset($_SESSION['fr_opis'])) {echo $_SESSION['fr_opis'];unset($_SESSION['fr_opis']);}?></textarea>
					<?php if((isset($_SESSION['blad_opis_dlugosc']))||(isset($_SESSION['blad_opis_znaki'])))
						{	echo @$_SESSION['blad_opis_dlugosc'];
							echo @$_SESSION['blad_opis_znaki'];
							unset($_SESSION['blad_opis_dlugosc'],$_SESSION['blad_opis_znaki']);}?>
					<p class="nawias">(Wprowadź krótki opis, który będzie wyświetlany w miniaturach na stronie głównej a także podczas przeglądania ogłoszeń)</p>
				</div>
				<div style="clear:both"></div>
			</div>
			
			<div class="ogl_add_input cena">
				<label for="cena"  class="description">Cena: </label>
				<div class="prawa">
					<input class="inp inp2" type="text" name="cena" value="<?php if(isset($_SESSION['fr_cena'])) {echo $_SESSION['fr_cena'];unset($_SESSION['fr_cena']);}?>" style="background-color:<?php if(isset($_SESSION['color_cena'])){echo $_SESSION['color_cena'];unset($_SESSION['color_cena']);}?>"/><p id="zl">zł</p>
					<div style="clear:both"></div>
					<select class="inp"  name="za">
						<option id="za usługę" value="za usługę">za usługę</option>
						<option id="za m2" value="za m2">za m2</option>
						<option id="za m3" value="za m3">za m3</option>
						<option id="za punkt" value="za punkt">za punkt</option>
						<option id="za godzinę" value="za godzinę">za godzinę</option>
						<option id="za sztukę" value="za sztukę">za sztukę</option>
						<option id="za element" value="za element">za element</option>
						<option id="do uzgodnienia" value="do uzgodnienia">do uzgodnienia</option>
					</select>
					<?php if((isset($_SESSION['blad_cena']))||(isset($_SESSION['blad_cena_za'])))
						{	echo @$_SESSION['blad_cena'];
							echo @$_SESSION['blad_cena_za'];
							unset($_SESSION['blad_cena'],$_SESSION['blad_cena_za']);}?>
				</div>
				<div style="clear:both"></div>
			</div>
			
			<div class="ogl_add_input zdjecia">
			<label  class="description">Dodaj zdjęcia:</label>
				<div class="prawa">
					<p class="nawias">(Pierwsze zdjęcie będzie również miniaturą ogłoszenia, max. 2 MB)</p>
					<div class="img_edit">
						<?php 
							wyswietl_zdjecia_edit($_SESSION['fr_ile_zdjec'],$_SESSION['fr_id']);
						?>
					</div>
					<div id="img_add">
						<input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
						<div id="img_div<?php echo $_SESSION['fr_ile_zdjec']; ?>"><input type="file" onChange="dodaj_img();"name="img<?php echo $_SESSION['fr_ile_zdjec']; ?>"/></div>
					</div>
					<div id="ile_zdjec">
						<input type="hidden" name="ile_zdjec" value="<?php echo $_SESSION['fr_ile_zdjec']; ?>"/>
					</div>
					<?php if((isset($_SESSION['blad_wysylania_pliku']))||(isset($_SESSION['blad_typ_pliku']))||(isset($_SESSION['blad_wielkosc_pliku']))||(isset($_SESSION['blad_zapisu_zdjec']))){echo @$_SESSION['blad_wysylania_pliku']; echo @$_SESSION['blad_typ_pliku']; echo @$_SESSION['blad_wielkosc_pliku']; echo @$_SESSION['blad_zapisu_zdjec'];unset($_SESSION['blad_wysylania_pliku'],$_SESSION['blad_typ_pliku'],$_SESSION['blad_wielkosc_pliku'],$_SESSION['blad_zapisu_zdjec']);}
					?>
				</div>
				<div style="clear:both"></div>
			</div>
			
			<div class="ogl_add_input kontakt">
				<label  class="description">Kontakt: </label>
				<div class="prawa">
					<div>
						<input class="inp inp3" type="text" name="telefon" placeholder="Telefon" value="<?php if(isset($_SESSION['fr_telefon'])) {echo $_SESSION['fr_telefon'];unset($_SESSION['fr_telefon']);}?>" style="background-color:<?php if(isset($_SESSION['color_telefon'])){echo $_SESSION['color_telefon'];unset($_SESSION['color_telefon']);}?>"/>
						
						<input class="inp inp3" type="text" name="email" placeholder="E-mail" value="<?php if(isset($_SESSION['fr_email'])) {echo $_SESSION['fr_email'];unset($_SESSION['fr_email']);}?>" style="background-color:<?php if(isset($_SESSION['color_email'])){echo $_SESSION['color_email'];unset($_SESSION['color_email']);}?>"/>
						
						<input class="inp inp3" type="text" name="www" placeholder="WWW" value="<?php if(isset($_SESSION['fr_www'])) {echo $_SESSION['fr_www'];unset($_SESSION['fr_www']);}?>" style="background-color:<?php if(isset($_SESSION['color_www'])){echo $_SESSION['color_www'];unset($_SESSION['color_www']);}?>"/>
					</div>
					<?php if(isset($_SESSION['blad_kontakt'])){echo $_SESSION['blad_kontakt'];unset($_SESSION['blad_kontakt']);} else if((isset($_SESSION['blad_telefon']))||(isset($_SESSION['blad_email']))||(isset($_SESSION['blad_www'])))
								{	echo @$_SESSION['blad_telefon'];
									echo @$_SESSION['blad_email'];
									echo @$_SESSION['blad_www'];
									unset($_SESSION['blad_telefon'],$_SESSION['blad_email'],$_SESSION['blad_www']);}?>
                            <div class="accessibility_div">
                                <label><input id="accessibility_0" type="radio" name="accessibility" value="0" checked="true">Kontakt dostępny dla wszystkich.</label>
                                <label><input id="accessibility_1" type="radio" name="accessibility" value="1">Kontakt dostępny tylko dla zalogowanych użytkowników.</label>
                            </div>
					<p class="nawias">(Wprowadone tutaj dane kontaktowe będą wyświetlane będą tylko w tym ogłoszeniu. Dane w twoim profilu i pozostałych ogłoszeniach nie ulegną zmianie.)</p>
				</div>
				<div style="clear:both"></div>
			</div>
			
			<div class="ogl_add_input tresc">
				<label for="tresc"  class="description">Treść:</label>
				<div class="prawa">
					<textarea class="inp area1 area2" name="tresc" style="background-color:<?php if(isset($_SESSION['color_tresc'])){echo $_SESSION['color_tresc'];unset($_SESSION['color_tresc']);}?>"><?php if(isset($_SESSION['fr_tresc'])) {echo $_SESSION['fr_tresc'];unset($_SESSION['fr_tresc']);}?></textarea>
					<?php if((isset($_SESSION['blad_tresc_pusta']))||(isset($_SESSION['blad_tresc_znaki']))||(isset($_SESSION['blad_tresc_dlugosc'])))
						{	echo @$_SESSION['blad_tresc_pusta'];
							echo @$_SESSION['blad_tresc_dlugosc'];
							echo @$_SESSION['blad_tresc_znaki'];
							unset($_SESSION['blad_tresc_pusta'],$_SESSION['blad_tresc_znaki'],$_SESSION['blad_tresc_dlugosc']);}?>
					<p class="nawias">(Pełny opis twojego ogłoszenia, widoczny na po wejściu w twoje ogłoszenie)</p>
				</div>
				<div style="clear:both"></div>
			</div>
			
			<div class="button-div">
                                <input type="hidden" name="ogloszenie" value="<?php echo $ogloszenie; ?>" />
				<input type="submit" class="sub sub_add button-green" value="Zobacz wersję podglądową"/>
			</div>
		</form>
	</article>
		
	<script type="text/javascript">

		//funkcja określająca co ma się po kliknięciu w województwo na mapie
		$(".ogl_add_zasieg .wojewodztwo #svg2 .woj").click(function(e)
		{
			var content = $(this).data("content");
				ustal_kolor();
				$(".active").removeClass("active").addClass("woj");;
				$(this).removeClass("woj").addClass("active");
				load_woj(content);
			
		});
		
		//funkcja zmieniająca wygląd przycisków typ
		$(".ogl_add_input.typ .prawa label").click(function(e){
			$(".ogl_add_input.typ .prawa label.active_type").removeClass("active_type").addClass("no-active");
			$(this).addClass("active_type");
		});
		
	function load_woj(content)
	{
		$.ajax
				({
					url: 'loader_woj.php',
					type: 'post',
					data: {Content : content},
						success: function(response)
						{
							$('.powiat2').html(response);
							policz();
							za_duzo();
						}
				});
	}
	
	function load_kat2(content)
	{
		$.ajax
				({
					url: 'loader_kat2.php',
					type: 'post',
					data: {Content : content},
						success: function(response)
						{
							$('#kat2_div').html(response);
						}
				});
	}
	
	//funkcja zaznaczająca zapamiętne powiaty po wyrzuceniu błędu przez serwer lub edycji
	odswiez_powiaty("<?php if(isset($_SESSION['fr_powiaty'])) echo $_SESSION['fr_powiaty'];?>","<?php if(isset($_SESSION['fr_miasto'])) echo $_SESSION['fr_miasto'];?>",<?php if(isset($_SESSION['fr_ile_zdjec'])) echo $_SESSION['fr_ile_zdjec'];?>);
		<?php 
			if(isset($_SESSION['fr_powiaty'])) unset($_SESSION['fr_powiaty']);
			if(isset($_SESSION['fr_miasto'])) unset($_SESSION['fr_miasto']);
			if(isset($_SESSION['fr_ile_zdjec'])) unset($_SESSION['fr_ile_zdjec']);
		?>
		
	//
	zaznacz_typ("<?php if(isset($_SESSION['fr_typ'])) echo $_SESSION['fr_typ'];?>");
		<?php if(isset($_SESSION['fr_typ'])) unset($_SESSION['fr_typ']);?>
	
	wyczytaj_kategorie("<?php if(isset($_SESSION['fr_kat'])) echo $_SESSION['fr_kat'];?>");
		<?php if(isset($_SESSION['fr_kat'])) unset($_SESSION['fr_kat']);?>
		
	cena_za("<?php if(isset($_SESSION['fr_cena_za'])) echo $_SESSION['fr_cena_za'];?>");
		<?php if(isset($_SESSION['fr_cena_za'])) unset($_SESSION['fr_cena_za']);?>
                    
        dostepnosc("<?php if(isset($_SESSION['fr_accessibility'])) echo $_SESSION['fr_accessibility'];?>");
                    <?php if(isset($_SESSION['fr_accessibility'])) unset($_SESSION['fr_accessibility']);?>
	</script>

	<?php
	include_once '../szablon/stopka.php';
	?>