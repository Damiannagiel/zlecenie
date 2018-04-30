<!DOCTYPE HTML>
<html lang="pl">
<head>
	<?php
		include_once '../../szablon/nav_head2.php';
		$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
                
                //łączę się z bazą
		require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');
		include($DOCUMENT_ROOT.'/../ini/funkcjePHP/connect.php');
                include($DOCUMENT_ROOT.'/../ini/FunkcjePHP/formatuj_ciag.php');
                include ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_data_time.php');
		if(isset($polaczenie)){
                    $current_date=date('Y-m-d H:i:s');
                    $subtract_2_day=odejmij_dni(90);
                    $subtract_90_day=odejmij_dni(182);

                    //sprawdź ile jest łącznie zarchiwizowanych ogłoszeń (ogłoszenia arhiwizuje się 3 miesiące)
                    $zapytanie='SELECT id FROM announcements WHERE (end < "'.$current_date.'") AND (end > "'.$subtract_90_day.'")';
                    $all=pobierz_zapytanie($polaczenie,$zapytanie);
                    $how_much=sizeof($all);
                    $ile_pasuje='('.$how_much.' zarchiwizowanych ogłoszeń łącznie)';
                        
                    //pobierz ogłoszenia zarchiwizowane w ciągu ostatnich 2 dni
                    $zapytanie='SELECT * FROM announcements WHERE (end < "'.$current_date.'") AND (end > "'.$subtract_2_day.'") ORDER BY end DESC';
                    $pobierz=pobierz_zapytanie($polaczenie,$zapytanie);
                    if($pobierz){
                        $ile=sizeof($pobierz);
                        $overriding=true;//zmienna do sprawdzenia w ogloszenie.php czy dodać folder nadrzędny do zdjęć
                        for($i=0;$i<$ile;$i++)
                        {
                            $link_beta=usun_ogonki($pobierz[$i]['title']).'_'.$pobierz[$i]['id'];
                            $link[$i]='../../ogloszenie/'.$link_beta.'.php';
                            $zasieg[$i]=powiaty_ogloszenie($pobierz[$i]['radius'],$pobierz[$i]['city'],2,2);
                            if($pobierz[$i]['price']!="")
                            {
                                    $cena[$i]=$pobierz[$i]['price'].' zł '.$pobierz[$i]['priceFor'];
                            }
                            else
                            {
                                    $cena[$i]=$pobierz[$i]['priceFor'];
                            }
                        }
                    }
                    $polaczenie->close();
		}
		else exit;
	?>
	
	<title>Archiwum ogłoszeń - igu.com.pl</title>
	
	<meta name="description" content="Archiwum ogłoszeń tuUslugi.pl. To tutaj trafjają ogłoszenia wygasłe oraz usunięte przez użytkowników."/>
	<link href="../../kategoria/css/mini.css" type="text/css" rel="stylesheet"/>
	<link href="../../ogloszenie_wyswietl/mini.css" type="text/css" rel="stylesheet"/>
        <link href="archiwum.css" type="text/css" rel="stylesheet"/>
</head>

<?php
	include_once '../../szablon/nav_body2.php';
	include_once '../../szablon/nav_category2.php';
?>
        <article class="page_content">
            <header class="page_header">
                    <h2>Ostatnio zarchiwizowane ogłoszenia</h2>
                    <p class="nawias"><?php echo $ile_pasuje;?></p>
            </header>

            <?php
                                    if($pobierz)
                                    {
                                            for($i=0;$i<$ile;$i++)
                                            {
                                                    include '../../kategoria/mapa/ogloszenie.php';
                                            }
                                    }
                            ?>
        </article>
<?php
	include_once '../../szablon/stopka2.php';
?>