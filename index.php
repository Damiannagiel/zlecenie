<!DOCTYPE HTML>
<html lang="pl">
	<head>        
            <!-- Global site tag (gtag.js) - Google Analytics -->
                        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120203026-1"></script>
                        <script>
                          window.dataLayer = window.dataLayer || [];
                          function gtag(){dataLayer.push(arguments);}
                          gtag('js', new Date());

                          gtag('config', 'UA-120203026-1');
                        </script>
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <script>
                          (adsbygoogle = window.adsbygoogle || []).push({
                            google_ad_client: "ca-pub-9409001605040696",
                            enable_page_level_ads: true
                          });
                        </script>

			<title>tuUslugi.pl - ogłoszeia usługowe</title>
                        <meta name="description" content="tuUslugi.pl - to platforma ogłoszeniowa dla usługodawców i zleceniodawców. Tutaj znajdziesz wykonawcę swojej usługi w każdej branży, a także klientów szukających kogoś takiego jak ty!"/>
			<link href="zero.css" type="text/css" rel="stylesheet"/>
			<link href="index.css" type="text/css" rel="stylesheet"/>
			<link href="ogloszenie_wyswietl/mini.css" type="text/css" rel="stylesheet"/>
			<link href="css/monitor.css" type="text/css" rel="stylesheet"/>
			<link href="fonts/Lobster-Regular.ttf" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700&amp;subset=latin-ext" rel="stylesheet">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<?php 
				// włącz sesje i załącz funkcje
				session_start();
				$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
				require_once ($DOCUMENT_ROOT.'/../ini/skryptyPHP/index_skrypt.php');
			?>
			
			<!-- Font license info


## Entypo

   Copyright (C) 2012 by Daniel Bruce

   Author:    Daniel Bruce
   License:   SIL (http://scripts.sil.org/OFL)
   Homepage:  http://www.entypo.com


## Font Awesome

   Copyright (C) 2016 by Dave Gandy

   Author:    Dave Gandy
   License:   SIL ()
   Homepage:  http://fortawesome.github.com/Font-Awesome/


## Typicons

   (c) Stephen Hutchings 2012

   Author:    Stephen Hutchings
   License:   SIL (http://scripts.sil.org/OFL)
   Homepage:  http://typicons.com/


## Modern Pictograms

   Copyright (c) 2012 by John Caserta. All rights reserved.

   Author:    John Caserta
   License:   SIL (http://scripts.sil.org/OFL)
   Homepage:  http://thedesignoffice.org/project/modern-pictograms/


 -->
	</head>
	<body>
		<div id="spacer1"></div>
		<header class="site-header">
                    <div class="max_width">
			<a class="logo" href="http://tuuslugi.pl" target="_blank">tuUslugi.pl</a>
			<button class="hamburger" type="button" title="Otwórz menu">
							<svg height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>
							<svg enable-background="new 0 0 32 32" height="32px" id="svg2" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"><g id="background"><rect fill="none" height="32" width="32"/></g><g id="cancel"><polygon points="2,26 6,30 16,20 26,30 30,26 20,16 30,6 26,2 16,12 6,2 2,6 12,16  "/></g></svg>
			</button>
			<div style="clear:both"></div>
			<nav class="user-nav">
				<ul>
					<li><a href="http://tuuslugi.pl">tuUslugi.pl</a></li>
					<li class="spacer" aria-hidden="true"></li>
					<li><a href="szukaj_ogloszenia/">Szukaj<br/>ogłoszenia</a></li>
					<li><a href="ogloszenie_add/ogloszenie_add.php">Dodaj<br/>ogłoszenie</a></li>
					<li><a href="kategoria/mapa/mapa_kategorii.php">Mapa<br/>witryny</a></li>
					<li><a href="<?php
							if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
							{
								echo"panel_uzytkownika/user.php";
							}
							else
							{
								echo "logowanie/zaloguj.php";
							}
							?>">Panel<br/>użytkownika
					</a></li>
				<ul>
			</nav>
                    </div>
		</header>
		<nav class="category-nav">
                    <div class="max_width">
				<ul>
					<li><a href="kategoria/AGD_RTV_i_komputery.php"><i class="icon-monitor"></i> <span>AGD RTV i komputery</span></a></li>
					<li><a href="kategoria/Edukacja_i_finanse.php"><i class="icon-book"></i> <span>Edukacja i finanse</span></a></li>
					<li><a href="kategoria/Gastronomia_i_przyjecia.php"><i class="icon-birthday"></i> <span>Gastronomia i przyjęcia</span></a></li>
					<li><a href="kategoria/Moda_zdrowie_i_uroda.php"><i class="icon-heartbeat"></i> <span>Moda zdrowie i uroda</span></a></li>
					<li><a href="kategoria/Budowlanka.php"><i class="icon-wrench"></i> <span>Budowlanka</span></a></li>
					<li><a href="kategoria/Dom_i_ogrod.php"><i class="icon-home-outline"></i> <span>Dom i ogród</span></a></li>
					<li><a href="kategoria/Motoryzacja.php"><i class="icon-cab"></i> <span>Motoryzacja</span></a></li>
					<li><a href="kategoria/Inne.php"><i class="icon-folder"></i> <span>Pozostałe</span></a></li>
				</ul>
                    </div>
		</nav>
		<article>
                    <div class="max_width">
			<h2 class="name">tuUslugi.pl</h2>
			
			<form class="search-box" action="szukaj_ogloszenia/szybkie_wyszukiwanie.php" method="get">
				<div class="search-type">
					<ul>
						<li><label onclick="szukaj(2);">Szukaj wykonawcy<input type="radio" name="type" value="2"/></label></li>
						<li><label onclick="szukaj(0);" class="active">Wszystko<input type="radio" name="type" value="0" checked="checked"/></label></li>
						<li><label onclick="szukaj(1);">Szukaj zlecenia<input type="radio" name="type" value="1"/></label></li>
					</ul>
				</div>
				<div class="search-content">
					<header>
						<h5>Znajdź wykonawcę z pośród <?php echo $wykonawcow ?> ogłoszeń</h5>
						<h5 class="h5-active">Znajdź interesującą cię usługę z pośród <?php echo $zlecen+$wykonawcow ?> ogłoszeń</h5>
						<h5>Znajdź zlecenie z pośród <?php echo $zlecen ?> ogłoszeń</h5>
					</header>
					<input type="text" name="key" placeholder="Słowa kluczowe" style="background-color:<?php if(isset($_SESSION['color_key'])){echo $_SESSION['color_key'];unset($_SESSION['color_key']);}?>" <?php if(isset($_SESSION['fr_key'])){echo'value="'.$_SESSION['fr_key'].'"';unset($_SESSION['fr_key']);}?>/>
					<input type="text" name="location" placeholder="Woj., powiat, miejscowość" style="background-color:<?php if(isset($_SESSION['color_location'])){echo $_SESSION['color_location'];unset($_SESSION['color_location']);}?>" <?php if(isset($_SESSION['fr_location'])){echo'value="'.$_SESSION['fr_location'].'"';unset($_SESSION['fr_location']);}?>/>
					<?php 
						if((isset($_SESSION['blad_atak']))||(isset($_SESSION['blad_key_dlugosc']))||(isset($_SESSION['blad_key_znaki']))||(isset($_SESSION['blad_location_dlugosc']))||(isset($_SESSION['blad_location_znaki']))||(isset($_SESSION['blad_kryteria'])))
						{
							echo '<div class="error">'.@$_SESSION['blad_atak'].@$_SESSION['blad_key_dlugosc'].@$_SESSION['blad_key_znaki'].@$_SESSION['blad_location_dlugosc'].@$_SESSION['blad_location_znaki'].@$_SESSION['blad_kryteria'].'</div>';
							unset($_SESSION['blad_atak'],$_SESSION['blad_key_dlugosc'],$_SESSION['blad_key_znaki'],$_SESSION['blad_location_dlugosc'],$_SESSION['blad_location_znaki'],$_SESSION['blad_kryteria']);
						}
					?>
					<div class="button-div"><input class="button-green" type="submit" value="Szukaj"/></div>
				</div>
			</form>
                    </div>
		</article>
                <article>
                    <header><h2 class="losowe" >Najnowsze ogłoszenia</h2></header>
                    <div class="max_width">
		<?php
				if($pobierz)
				{
					for($i=0;$i<$ile;$i++)
					{
						include 'ogloszenie_wyswietl/ogloszenie-mini.php';
					}
				}
			?>
                    </div>
                </article>
	<footer>
            <?php
            if(!isset($_COOKIE['cookie_ok'])){
                echo '<div class="cookies">
                        <span class="wide">Korzystając ze strony internetowagieldauslug.pl wyrażasz zgodę na użytkowanie mechanizmu plików cookie. Więcej o plikach cookie w internetowagieldauslug.pl możesz dowiedzieć się <a href="regulamin/cookies.php">tutaj</a>.</span>
                        <span class="narrow">Ta strona korzysta z <a href="regulamin/cookies.php">cookies</a>.</span><button>Zgadzam się</button>
                    </div>';
            }
            ?>
            <div class="max_width">
		<div class="popular_content">
		</div>
		<div class="text_link">
			<ul>
				<li><a href="regulamin/">Regulamin</a></li>
                                <li><a href="regulamin/cookies.php">Polityka cookies</a></li>
				<li><a href="#">Partnerzy</a></li>
                                <li><a href="ogloszenie/archiwum/">Archiwum ogłoszeń</a></li>
				<li><a href="kontakt/pomoc.php">Pomoc</a></li>
                                <li><a href="kontakt/index.php">Kontakt</a></li>
                                <li><a href="kategoria/mapa/mapa_kategorii.php" class="last">Mapa Kategorii</a></li>
			</ul>
		</div>
		<div class="social_copy">
			<div class="copy">
				<p>&copy 2017 tuUslugi.pl</p>
				<p class="prawa">wszystkie prawa zastrzeżone</p>
			</div>
			<div class="social">
				<div class="social_container">
					<p>sprawdź nasze social media:</p>
					<div class="social_icon">
						<a class="facebook" href="#"><i class="icon-facebook"></i></a>
						<a class="googleplus" href="#"><i class="icon-googleplus"></i></a>
						<a class="instagram" href="#"><i class="icon-instagram"></i></a>
						<a class="youtube" href="#"><i class="icon-youtube-play"></i></a>
					</div>
				</div>
			</div>
		</div>
            </div>
	</footer>
		
		
	</body>
	<script src="index.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="regulamin/cookies.js"></script>
	<script>
            $(".cookies button").click(function(){
                cookies_ok("");
            });
		$(document).ready(function() {
			var NavY = $('.site-header').offset().top;

			var stickyNav = function(){
			var ScrollY = $(window).scrollTop();
				  
			if (ScrollY > 300) { 
				$('.site-header').addClass('sticky');
				document.getElementById("spacer1").classList.add("active");
			} else {
				$('.site-header').removeClass('sticky'); 
				document.getElementById("spacer1").classList.remove("active");
			}
			};
			 
			stickyNav();
			 
			$(window).scroll(function() {
				stickyNav();
			});
			});
	</script>
</html>
