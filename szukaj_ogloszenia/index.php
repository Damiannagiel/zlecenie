<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<?php
			session_start();
			include_once '../szablon/nav_head.php';
		?>
		<link href="index.css" type="text/css" rel="stylesheet"/>
	
		<title>Szukaj ogłoszenia</title>
	
		<meta name="description" content="Opis w Google" />
		
		<!-- Font license info

		## Font Awesome

		   Copyright (C) 2016 by Dave Gandy

		   Author:    Dave Gandy
		   License:   SIL ()
		   Homepage:  http://fortawesome.github.com/Font-Awesome/
		-->


		
	</head>
	<?php
		include_once '../szablon/nav_body.php';
		include_once '../szablon/nav_category.php';
	?>
	<form id="serch" action="wynik.php" method="post">
	
		<div class="background-container">
			<div class="blad_user">
				<?php if(isset($_SESSION['blad_atak'])){echo $_SESSION['blad_atak']; unset($_SESSION['blad_atak']);}?>
			</div>
			<header>
				<h2>Szukaj ogłoszenia</h2>
			</header>	
			<div class="inp key">
				<input type="text" name="key" placeholder="Wpisz szukaną frazę" style="background-color:<?php if(isset($_SESSION['color_key'])){echo $_SESSION['color_key'];unset($_SESSION['color_key']);}?>" <?php if(isset($_SESSION['fr_klucz'])){echo'value="'.$_SESSION['fr_klucz'].'"';unset($_SESSION['fr_klucz']);}?>/> <input type="submit" class="button-green" value="Szukaj"/>
				<div class="blad_wal">
					<?php if(isset($_SESSION['blad_klucz_dlugosc'])){echo $_SESSION['blad_klucz_dlugosc'];unset($_SESSION['blad_klucz_dlugosc']);}
					 if(isset($_SESSION['blad_klucz_znaki'])){echo $_SESSION['blad_klucz_znaki'];unset($_SESSION['blad_klucz_znaki']);}?>
				</div>
				<div class="img_box">
					<label id="only_img" onChange="only_img();">Tylko ze zdjęciami <input type="checkbox" name="img" value="1"/></label>
				</div>
			</div>
			<?php if(isset($_SESSION['brak_wyboru']))echo $_SESSION['brak_wyboru']; unset($_SESSION['brak_wyboru']);?>
		</div>
		
		<div class="filter">
		<div class="inp">
			<div class="description  first" onClick='expand("category");'>
				<i id="icon_category" class="icon-plus-squared-alt"></i><h5>Kategoria</h5>
				<div class="blad">
					<?php if(isset($_SESSION['blad_kat'])){echo $_SESSION['blad_kat']; unset($_SESSION['blad_kat']);}?>
				</div>
			</div>
			<div class="content" id="category">
				<div class="cat" id="kat1_div">
					<select class="inp" onChange="load_kat2(this.value);" name="kat1">
						<option value="all">Wszystkie kategorie</option>
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
				<div class="cat" id="kat2_div"></div>
				<div class="cat" id="kat3_div"></div>
			</div>
		</div>
			
		<div class="inp">
			<div class="description" onClick='expand("type");'>
				<i id="icon_type" class="icon-plus-squared-alt"></i><h5>Typ ogłoszenia</h5>
			</div>
			<div class="content" id="type">
				<label class="label type_0 label_active">Wszystko<input id="type_0" type="radio" name="type" value="0" checked="checked"/></label>
				<label class="label type_1 label_no_active">Zleceniodawcy<input id="type_1" type="radio" name="type" value="1"/></label>
				<label class="label type_2 label_no_active">Wykonawcy<input id="type_2" type="radio" name="type" value="2"/></label>
			</div>
		</div>
			
		<div class="inp">
			<div class="description" onClick='expand("zasieg");'>
				<i id="icon_zasieg" class="icon-plus-squared-alt"></i><h5>Lokalizacja</h5> <?php if((isset($_SESSION['blad_miejscowosc_znaki']))||(isset($_SESSION['blad_miejscowosc_dlugosc'])))echo'<p class="mark"> ! </p>';?>
			</div>
			<div class="content" id="zasieg">
				<div class="flex_box">
					<div class="range" id="woj">
						<select class="inp" name="woj" onChange='load_pow(this.value)'>
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
					<div class="range" id="pow"></div>
					<div class="range" id="city"></div>
				</div>
				<?php 
					if(isset($_SESSION['blad_miejscowosc_znaki'])){echo $_SESSION['blad_miejscowosc_znaki']; unset($_SESSION['blad_miejscowosc_znaki']);}
					if(isset($_SESSION['blad_miejscowosc_dlugosc'])){echo $_SESSION['blad_miejscowosc_dlugosc']; unset($_SESSION['blad_miejscowosc_dlugosc']);}
				?>
			</div>
		</div>
			
		<div class="inp">
			<div class="description" onClick='expand("cena");'>
				<i id="icon_cena" class="icon-plus-squared-alt"></i><h5>Cena</h5> <?php if(isset($_SESSION['blad_cena']))echo'<p class="mark"> ! </p>';?>
			</div>
			<div class="content" id="cena">
				<div class="flex_box">
					<div><input type="text" name="cena_od" placeholder="OD"/>zł</div>
					<div><input type="text" name="cena_do" placeholder="DO"/>zł</div>
					<div>
						<select class="inp"  name="cena_za">
							<option value="all">wszystkie opcje</option>
							<option id="za usługę" value="za usługę">za usługę</option>
							<option id="za m2" value="za m2">za m2</option>
							<option id="za m3" value="za m3">za m3</option>
							<option id="za punkt" value="za punkt">za punkt</option>
							<option id="za godzinę" value="za godzinę">za godzinę</option>
							<option id="za sztukę" value="za sztukę">za sztukę</option>
							<option id="za element" value="za element">za element</option>
							<option id="do uzgodnienia" value="do uzgodnienia">do uzgodnienia</option>
						</select>
					</div>
				</div>
				<?php 
					if(isset($_SESSION['blad_cena'])){echo $_SESSION['blad_cena']; unset($_SESSION['blad_cena']);}
				?>
			</div>
		</div>
			
		<div class="inp">
			<div class="description" onClick='expand("personality");'>
				<i id="icon_personality" class="icon-plus-squared-alt"></i><h5>Rodzaj działalności</h5>
			</div>
			<div class="content" id="personality">
				<label class="person person_0 person_active">Wszystko<input id="pers_0" type="radio" name="person" value="0" checked="checked"/></label>
				<label class="person person_1 person_no_active">Osoba prywatna<input id="pers_1" type="radio" name="person" value="1"/></label>
				<label class="person person_2 person_no_active">Firma<input id="pers_2" type="radio" name="person" value="2"/></label>
			</div>
		</div>
		
		<div class="inp last">
			<div class="description" onClick='expand("contact");'>
				<i id="icon_contact" class="icon-plus-squared-alt"></i><h5>Forma kontaktu</h5>
			</div>
			<div class="content" id="contact">
				<label id="telefon" class="contact" onChange='contact("telefon");'>Telefon<input type="checkbox" name="phone" value="1"/></label>
				<label id="email" class="contact" onChange='contact("email");'>E-mail<input type="checkbox" name="email" value="1"/></label>
				<label id="www" class="contact" onChange='contact("www");'>WWW<input type="checkbox" name="www" value="1"/></label>
			</div>
		</div>
		</div>
			
	</form>
	
	<?php
		include_once '../szablon/stopka.php';
	?>
	
	<script src="index.js" type="text/javascript"></script>
	<script >
		var filter="<?php if(isset($_SESSION['wyszukiwanie'])){echo $_SESSION['wyszukiwanie'];unset($_SESSION['wyszukiwanie']);}?>";
		onload_filter(filter);
	</script>
	
</html>