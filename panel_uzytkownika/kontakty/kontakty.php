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
        $("#contact .delete__ul--contact").hide();
        $("#contact .icon-cancel").hide();
        $("#contact .icon-cog").click(function(){
           $("#contact .delete__ul--contact").slideDown();
           $("#contact .delete__ul--contact").css({//ustal pyzycję rozwijanej listy opcji
                position:"absolute",
                left:"32px",
                top:"1px"
            });
            $(document).on("click", function(e) {
                if (!$(e.target).is("#contact .icon-cog")&&!$(e.target).is("#contact .delete__ul--contact li")) {
                    $("#contact .delete__ul--contact").slideUp();
                }
            });
        });
        $(".delete_contact").click(function(){
            if(cl==0){
                cl+=1;
                $("#contact .icon-cancel").fadeIn();
            }
            else{
                cl=0;
                $("#contact .icon-cancel").fadeOut();
            }
        });
        $("#contact .icon-cancel").click(function(e){
            var content=$(this).attr("data-content");
            e.preventDefault();
            //wykonaj funkcję kasującą kontakt
        });
    });
</script>
