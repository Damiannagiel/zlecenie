<?php
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];	
	require_once ($DOCUMENT_ROOT.'/../ini/skryptyPHP/kontakty_skrypt.php');
?>
<div id="contact">
    <header>
        <h3><i class="icon-cog"></i>Kontakty które pozyskałem:</h3>
        <ul class="delete__ul--contact">
            <li class="delete_contact">Usuń kontakty</li>
        </ul>
    </header>
    <?php 
        if($kontakty&&$ile>0){
            for($i=0;$i<$ile;$i++){
                if($kontakty){
                    require('wyswietl_kontakt.php');
                }
            }
        }
        else
        {
            echo "<p>-brak pozyskanych kontaktów</p>";
        }
    ?>
    <h3>Pozyskali do mnie kontakt:</h3>
    <?php 
        if($moje_ogloszenia){
         for($i=0;$i<$ile_moich_ogloszen;$i++){
          if($pobrno_kontaktow[$i]){
           require('wyswietl_pobrali.php');
          }
          else{
           echo '<p>-dotychczas żaden z zalogowanych użytkowników nie pobrał kontaktu do ogłoszenia <a href="../ogloszenie/'.$link_pobral[$i].'.php"><b>'.$moje_ogloszenia[$i]['tytul'].'</b></a></p>';
          }
         }
        }
        else{
         echo "<p>-nie posiadasz własnych ogłoszeń</p>";
        }
    ?>
</div>
<script>
    $(document).ready(function(){
        var cl=0;
        $("#contact .delete__ul--contact").hide();//ukryj listę opcji
        $("#contact .icon-cancel").hide(); //ukryj pryciski usuwania wiadomoś i
        $("#contact .icon-cog").click(function(){
           $("#contact .delete__ul--contact").slideDown();//po kliknięciu w ikonę opcji pokaż listę opcji
           $("#contact .delete__ul--contact").css({//ustal pyzycję rozwijanej listy opcji
                position:"absolute",
                left:"32px",
                top:"1px"
            });
            $(document).on("click", function(e) {
                if (!$(e.target).is("#contact .icon-cog")&&!$(e.target).is("#contact .delete__ul--contact li")&&!$(e.target).is("#contact .delete_contact")) {
                    //jeżeli nie kliknięto w przycisk opcji bądź jedną z opcji zwiń listę opcji
                    $("#contact .delete__ul--contact").slideUp();
                }
            });
        });
        
        //po wybraniu z listy opcji "usuń kontakt" wyświetl przyciski do ukrywania kontaktów jeżeli kliknięcie jest parzyste, jeżeli nie ukryj je
        $(".delete_contact").click(function(){
            $("#contact .icon-cancel").fadeToggle();
        });
        
        $("#contact .icon-cancel").click(function(e){
            var obiect=$(this);
            var announcement=obiect.attr("data-content");
            e.preventDefault();
            //wykonaj funkcję kasującą kontakt
            deleted_contact(announcement,obiect);
        });
        
    function deleted_contact(announcement,obiect){
        $.ajax({
            url: 'kontakty/usun_kontakt.php',
            type: 'post',
            data: {announcement:announcement},
            success: function(response){
                //jeżeli skrypt wykonał się popraawnie usuń wybrany kontakt
                if(response==true){
                    obiect.parent(".kontakt_div").fadeOut(800);//ukryj usunięty kontakt
                }
                else if(response==2){
                    //zwrócona 2 ozncza brak połączenia z bazą danych
                    $("#contact").prepend('<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>');
                }
                else{
                    $("#contact").prepend('<div class="blad_user"><p>Jedno z twoich poleceń narusza zasady użytkowania serwisu.<br/> Prowadzenie działań niezgodnych z regulaminem, bądź działających na niekożyść serwisu lub jego użytkowników może skutkować konsekwencjami prawnymi!</p></div>');
                }
            }
        });
    }
    });
</script>
