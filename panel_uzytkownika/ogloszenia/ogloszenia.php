<?php 
    $DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
    require_once ($DOCUMENT_ROOT.'/../ini/skryptyPHP/ogloszenia_skrypt.php');
?>

<h3>Aktywne ogłoszenia</h3>
<?php
    if($ogloszenia)
    {
        for($i=0;$i<$ile_ogloszen;$i++)
        {
            if($ogloszenia[$i])
            {
                    require('wyswietl_ogloszenie.php');
            }
        }
    }
    else echo "<p>-brak aktwnych ogłoszeń</p>";
?>
<h3 class="no_margin_bottom">Zarchiwizowane ogłoszenia</h3>
<p class="nawias">(Nieaktywne ogłoszenia pozostają w archiwum przez 3 miesiące, następnie są usuwane)</p>
<?php
    if($archives)
    {
        $ogloszenia=$archives;
        $ile_ogloszen=$ile_archives;
        $link=$link_archives;
        $zasieg=$zasieg_archives;
        $active=$no_active;
        for($i=0;$i<$ile_ogloszen;$i++)
        {
            if($ogloszenia[$i])
            {
                    require('wyswietl_ogloszenie.php');
            }
        }
    }
    else echo "<p>-brak zarchiwizowanych ogłoszeń</p>";
?>