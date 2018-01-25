<nav class="user_nav">
    <div class="category cat1 noactive-c"><p><span>I n f o r m a c j e</span></p></div>
    <div class="category cat2 active-c"><p><span>O g ł o s z e n i a</span></p></div>
    <div class="category cat3 noactive-c"><p><span>O c e n y</span></p></div>
    <div class="category cat4 noactive-c"><p><span>O p i s</span></p></div>
    <div class="category spacer"></div>
</nav>
				
<article id="category_info">

<?php
        for($i=0;$i<$ile_ogloszen;$i++)
        {
                if($ogloszenia[$i])
                {
                        require('wyswietl_ogloszenie.php');
                }
                else echo "Ten użytkownik nie posiada żadnych ogłoszeń";
        }
?>

</article>