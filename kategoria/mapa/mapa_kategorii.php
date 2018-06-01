<!DOCTYPE HTML>
<html lang="pl">
<head>
        <?php session_start();
            $DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];	
            include_once '../../szablon/nav_head2.php';
        ?>
        <title>Mapa kategorii - tuUslugi.pl</title>
	
	<meta name="description" content="Mapa kategorii Internetowej Giełdy Usług. Tutaj możesz sprawdzić strukturę i przejść bezpośrednio do każdej kategorii." />
	<link href="../css/mapa_kategorii.css" type="text/css" rel="stylesheet"/>
</head>

<?php
	include_once '../../szablon/nav_body2.php';
?>
	<article>
		<header>
			<h2>Mapa kategorii witryny tuUslugi.pl</h2>
		</header>
		<div class="category_viev">
				<ul>
					<li class="depth1 budowlanka"><a class="link" href="../Budowlanka.php">Budowlanka</a>
						<ul>
							<li class="depth2"><a class="link" href="../Budowa.php">Budowa</a>
								<ul>
									<a class="link" href="../Ciesielstwo.php"><li>Ciesielstwo</li></a>
									<a class="link" href="../Dekarstwo.php"><li>Dekarstwo</li></a>
									<a class="link" href="../Murarka.php"><li>Murarka</li></a>
									<a class="link" href="../Tynki.php"><li>Tynki</li></a>
									<a class="link" href="../Zbrojarstwo.php"><li>Zbrojarstwo</li></a>
								</ul>
							</li>
							<li class="depth2"><a class="link" href="../Instalacje.php">Instalacje</a>
								<ul>
									<a class="link" href="../Dymne_i_wentylacyjne.php"><li>Dymne i wentylacyjne</li></a>
									<a class="link" href="../Elektryczne.php"><li>Elektryczne</li></a>
									<a class="link" href="../Hydrauliczne.php"><li>Hydrauliczne</li></a>
								</ul>
							</li>
							<li class="depth2"><a class="link" href="../Posesja.php">Posesja</a>
								<ul>
									<a class="link" href="../Altany_i_ozdoby.php"><li>Altany i ozdoby</li></a>
									<a class="link" href="../Bramy_i_ogrodzenia.php"><li>Bramy i ogrodzenia</li></a>
									<a class="link" href="../Bruk.php"><li>Bruk</li></a>
									<a class="link" href="../Drzewa_krzewy_i_ogrod.php"><li>Drzewa krzewy i ogród</li></a>
									<a class="link" href="../Stawy_i_oczka.php"><li>Stawy i oczka</li></a>
								</ul>
							</li>
							<li class="depth2"><a class="link" href="../Wykonczenie.php">Wykończenie</a>
								<ul>
									<a class="link" href="../Docieplenia.php"><li>Docieplenia</li>
									<a class="link" href="../Drzwi_i_okna.php"><li>Drzwi i okna</li>
									<a class="link" href="../Gipsy_i_regipsy.php"><li>Gipsy i regipsy</li>
									<a class="link" href="../Malowanie.php"><li>Malowanie</li>
									<a class="link" href="../Meble_i_stolarka.php"><li>Meble i stolarka</li>
									<a class="link" href="../Plytki_i_ceramika.php"><li>Płytki i ceramika</li>
									<a class="link" href="../Podlogi.php"><li>Podłogi</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="depth1 agd"><a class="link" href="../AGD_RTV_i_komputery.php">AGD RTV i komputery</a>
						<ul>
							<a class="link" href="../Informatyka.php"><li>Informatyka</li></a>		
							<a class="link" href="../Naprawa_i_montaz.php"><li>Naprawa i montaż</li></a>
							<a class="link" href="../Programowanie.php"><li>Programowanie</li></a>
							<a class="link" href="../WWW.php"><li>WWW</li></a>
						</ul>
					</li>
					<li class="depth1 dom"><a class="link" href="../Dom_i_ogrod.php">Dom i ogród</a>
						<ul>
							<a class="link" href="../Ogrod_i_posesja.php"><li>Ogród i posesja</li></a>
							<li class="depth2"><a class="link" href="../Opieka.php">Opieka</a>
								<ul>
									<a class="link" href="../Dzieci.php"><li>Dzieci</li></a>
									<a class="link" href="../Osoby_starsze.php"><li>Osoby starsze</li></a>
									<a class="link" href="../Zwierzeta.php"><li>Zwierzęta</li></a>
								</ul>
							</li>
							<a class="link" href="../Sprzatanie.php"><li>Sprzątanie</li></a>
							<a class="link" href="../Zlota_raczka.php"><li>Złota rączka</li></a>
						</ul>
					</li>
					<li class="depth1 edukacja"><a class="link" href="../Edukacja_i_finanse.php">Edukacja i finanse</a>
						<ul>
							<a class="link" href="../Korepetycje.php"><li>Korepetycje</li></a>
							<a class="link" href="../Ksiegowosc_i_rachunkowosc.php"><li>Księgowość i rachunkowość</li></a>
							<a class="link" href="../Kursy_i_szkolenia.php"><li>Kursy i szkolenia</li></a>
						</ul>
					</li>
					<li class="depth1 gastronomia"><a class="link" href="../Gastronomia_i_przyjecia.php">Gastronomia i przyjęcia</a>
						<ul>
							<a class="link" href="../Film_i_fotografia.php"><li>Film i fotografia</li></a>
							<a class="link" href="../Lokale.php"><li>Lokale</li></a>
							<a class="link" href="../Muzyka.php"><li>Muzyka</li></a>					
							<a class="link" href="../Obsluga_i_gastronomia.php"><li>Obsługa i gastronomia</li></a>
						</ul>
					</li>
					<li class="depth1 moda"><a class="link" href="../Moda_zdrowie_i_uroda.php">Moda zdrowie i uroda</a>
						<ul>
							<a class="link" href="../Fryzjerstwo_i_kosmetyka.php"><li>Fryzjerstwo i kosmetyka</li></a>
							<a class="link" href="../Krawiectwo.php"><li>Krawiectwo</li></a>
							<a class="link" href="../Stylizacja.php"><li>Stylizacja</li></a>
							<a class="link" href="../Trening_i_dieta.php"><li>Trening i dieta</li></a>
						</ul>
					</li>
					<li class="depth1 motoryzacja"><a class="link" href="../Motoryzacja.php">Motoryzacja</a>
						<ul>
							<li class="depth2"><a class="link" href="../Naprawy.php">Naprawy</a>
								<ul>
									<a class="link" href="../Elektromechanika.php"><li>Elektromechanika</li></a>
									<a class="link" href="../Lakiernictwo_i_blacharstwo.php"><li>Lakiernictwo i blacharstwo</li></a>
									<a class="link" href="../Mechanika.php"><li>Mechanika</li></a>
								</ul>
								</li>
							<li class="depth2"><a class="link" href="../Transport.php">Transport</a>
								<ul>
									<a class="link" href="../Osobowy.php"><li>Osobowy</li></a>
									<a class="link" href="../Towarowy.php"><li>Towarowy</li></a>
								</ul>
							</li>
							<a class="link" href="../Wynajem_sprzetu.php"><li>Wynajem sprzętu</li></a>
						</ul>
					</li>
				</ul>
		</div>
		<div style="clear:both;"></div>

		
		
	</article>
<?php
	include_once '../../szablon/stopka2.php';
?>