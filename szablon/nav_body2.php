<body>
		<div id="spacer1"></div>
		<header class="site-header">
                    <div class="max_width">
			<a class="logo" href="http://localhost/zlecenie/index.php" target="_blank">tuUslugi.pl</a>
			<button class="hamburger" type="button" title="Otwórz menu">
							<svg height="32px" id="Layer_1" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg>
							<svg enable-background="new 0 0 32 32" height="32px" id="svg2" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"><g id="background"><rect fill="none" height="32" width="32"/></g><g id="cancel"><polygon points="2,26 6,30 16,20 26,30 30,26 20,16 30,6 26,2 16,12 6,2 2,6 12,16  "/></g></svg>
			</button>
			<div style="clear:both"></div>
			<nav class="user-nav">
				<ul>
					<li><a href="../../index.php">tuUslugi.pl</a></li>
					<li class="spacer" aria-hidden="true"></li>
					<li><a href="../../szukaj_ogloszenia/">Szukaj<br/>ogłoszenia</a></li>
					<li><a href="../../ogloszenie_add/ogloszenie_add.php">Dodaj<br/>ogłoszenie</a></li>
					<li><a href="mapa_kategorii.php">Mapa<br/>witryny</a></li>
					<li><a href="<?php
							if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
							{
								echo"../../panel_uzytkownika/user.php";
							}
							else
							{
								echo "../../logowanie/zaloguj.php";
							}
							?>">Panel<br/>użytkownika
					</a></li>
				<ul>
			</nav>
                    </div>
		</header>