<!DOCTYPE HTML>
<html lang="pl">
<head>
	<?php
		session_start();
		$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
		include $DOCUMENT_ROOT.'/../ini/skryptyPHP/szybkie_wyszukiwanie_skrypt.php';
		include_once '../szablon/nav_head.php';
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
		<h2><?php 
			if(($klucz!="")&&($gdzie!="")) echo 'Szukaj "'.$klucz.'" w "'.$gdzie.'"';
			else if(($klucz!="")&&($gdzie=="")) echo 'Szukaj "'.$klucz.'"';
			else if(($klucz=="")&&($gdzie!="")) echo 'Szukaj w "'.$gdzie.'"';
		?></h2>
		<p class="nawias"><?php echo $ile_pasuje;?></p>
		<div class="change">
			<p><a href="index.php">Wyszukiwarka zaawansowana</a></p>
		</div>
	</header>
	<main>
        <?php
            if($pobierz)
            {
                for($i=$record;$i<$end_record;$i++)
                {
                        include '../kategoria/mapa/ogloszenie.php';
                }
                //stronicowanie ogłoszeń
                echo'<div class="site_list"> <ol class="num-site"><li class="li-spacer"></li>';
                for($i=1;$i<=$ile_stron;$i++){
                    $strona=$i;
                    if($i==$site){
                        // wykonaj jeżeli numer strony jest aktualnie wyśiwtlany
                        echo'<li class="site active">'. $strona .'</li>';
                    } else {
                        // wykonaj dla innych numerów srony niż aktualnie wyświetlana
                        if(strpos($_SERVER['REQUEST_URI'],".php?")){
                            // wykonaj jeżeli istnieją już parametry GET
                            $getsite=strpos($_SERVER['REQUEST_URI'],"site=");// sprawdź czy występuje parametr site
                            if($getsite){
                                echo'<a href="../..'.substr($_SERVER['REQUEST_URI'], 0, $getsite).'site='.$strona.'"><li class="site">'. $strona .'</li></a>';
                            } else {
                                echo'<a href="../..'.$_SERVER['REQUEST_URI'].'&site='.$strona.'"><li class="site">'. $strona .'</li></a>';
                            }
                        } else {
                            // wykonaj jeżeli nie istnieją parametry GET
                            echo'<a href="../..'.$_SERVER['REQUEST_URI'].'?site='.$strona.'"><li class="site">'. $strona .'</li></a>';
                        }
                    }
                }
                echo'<li class="z">z '.$ile_stron.'</li><li class="li-spacer"></li></ol></div>';
            }
        ?>
	</main>
<?php
	include_once '../szablon/stopka.php';
?>