<!DOCTYPE HTML>
<html lang="pl">
<head>
	<?php
		include_once '../szablon/nav_head.php';
		$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
		include($DOCUMENT_ROOT.'/../ini/skryptyPHP/szukaj_skrypt.php');
	?>
	
	<title>igu.com.pl - Wyniki wyszukiwania</title>
	
	<meta name="description" content="Opis w Google" />
	<link href="../kategoria/css/mini.css" type="text/css" rel="stylesheet"/>
	<link href="../ogloszenie_wyswietl/mini.css" type="text/css" rel="stylesheet"/>
	<link href="wynik.css" type="text/css" rel="stylesheet"/>

</head>

<?php
	include_once '../szablon/nav_body.php';
	include_once '../szablon/nav_category.php';
?>
	<header>
		<h2><?php if(isset($klucz))echo 'Wyszukiwanie "'.$klucz.'"';else echo"Szukaj ogłoszenia";?></h2>
		<p class="nawias"><?php echo $ile_pasuje;?></p>
	</header>
	<div class="kat">
		<div class="filter">
		<?php
			include($DOCUMENT_ROOT.'/../ini/skryptyPHP/wynik_skrypt.php');
		?>
		</div>
		<div class="change">
			<p><a href="index.php">zmień kryteria wyszukiwania</a></p>
		</div>
	</div>
	
	<main>
	<?php
				if($pobierz)
				{
					for($i=0;$i<$ile;$i++)
					{
						include '../kategoria/mapa/ogloszenie.php';
					}
				}
			?>
	</main>
<?php
	include_once '../szablon/stopka.php';
?>