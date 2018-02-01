<?php 
	session_start();
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
	$user=$_POST['user'];
	if($_SESSION['id']==$user){
                //wykonuję walidację danych zebranych przez ajax
                require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_walidacja.php');
                $ok=true;
                if(is_numeric($_POST['adresat'])&&$_POST['adresat']>0){
                    $adresat=$_POST['adresat'];
                }
                else $ok=false;
                if(is_numeric($_POST['ogloszenie'])&&$_POST['ogloszenie']>0){
                   $ogloszenie=$_POST['ogloszenie'];
                }
                else $ok=false;
                if(sprawdz_znaki($_POST['ogl_tytul'])){
                    $ogl_tytul=$_POST['ogl_tytul'];
                }
                else $ok=false;
                if(sprawdz_login($_POST['adresat_name'])){
                    $adresat_name=$_POST['adresat_name'];
                }
                else $ok=false;
		if($ok){try{
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/connect.php');
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_wiadomosci.php');
                        
                        $avatar=sprawdz_avatar($adresat);
					
			if(isset($polaczenie)){
                                zanzacz_jako_przeczytane($polaczenie,$ogloszenie,$adresat,$user);
                            
				$wyswietl=pobierz_wiadomosci($polaczenie,$ogloszenie,$adresat,$user,25);
                                echo check_the_archive($polaczenie,$ogloszenie);//sprawdź czy ogłoszenie zostało przeniesione do archiwum
                                echo if_deleted_account($polaczenie,$adresat);//sprawdź czy użytkownik usunął konto
                                if($wyswietl){
                                    $ile_wiadomosci=sizeof($wyswietl);
                                    //sprawdź czy są wiadomości do doczytywania
                                    if($ile_wiadomosci==25){
                                        $wiecej=1;
                                    }
                                    else{
                                        $wiecej=0;
                                    }
                                }
                                else{
                                    $ile_wiadomosci=0;
                                    $wiecej=0;
                                }

				$polaczenie->close();
			}
			else exit;
		}
		catch(Exception $e){
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
		}
        }}
	else{
		$ok=false;
		$wyswietl='<div class="blad_user"><p>Jedno z twoich poleceń narusza zasady użytkowania serwisu.<br/> Prowadzenie działań niezgodnych z regulaminem, bądź działających na niekożyść serwisu lub jego użytkowników może skutkować konsekwencjami prawnymi!</p></div>';
		echo $wyswietl;
	}
?>
<script>
    var ile=<?php echo $ile_wiadomosci;?>;
    var ok=<?php echo $ok; ?>;
    var wiecej=<?php echo $wiecej; ?>;
    var user=<?php echo $user; ?>;
    var adresat=<?php echo $adresat; ?>;
    var ogloszenie=<?php echo $ogloszenie ?>;

    var ogl_tytul=<?php echo '"'.$ogl_tytul.'"'; ?>;
    var adresat_name=<?php echo '"'.$adresat_name.'"'; ?>;
    var avatar='<?php echo $avatar; ?>';
    if(ile>0){
        var json='<?php echo json_encode($wyswietl);?>';
        var wiadomosci=eval(json);
    }
    if(ok==true){
        if(ile>0){
            wyswietl_wiadomosci(wiadomosci,user,adresat_name,ogl_tytul,avatar,ile,wiecej);
        }
        else{
            wyswietl_bez_wiadomosci(ogl_tytul,adresat_name,ogloszenie,adresat,user);
        }
            setTimeout("document.getElementById('message').scrollTop=1e6",100);
        window_height();
    }
    
    $(document).ready(function(){
        //lista opcji usuwqna jest bezpośrednio po wyświetleniu nagłówka
        $(".options").hide();//ukryj opcje
        $(".delete").hide();//ukryj przycisk usuń

        
        $("#message .message").hover(
            function(){//funkcja do wykonania po najechaniu myszą na element
                $(this).children(".options").show();//pokaż element opcje
                $(this).children(".options").click(function(){//jeżeli zostanie kliknięty element options
                    $(this).siblings(".delete").show();//pokż element delete
                });
            },
            function(){//funkcja do wykonania po opuszczeniu myszą elementu
                $(this).children(".options").hide();//ukryj element options
                $(this).children(".delete").hide();//ukryj element delete
            }
        );//koniec funkcji hover

        $(".delete").click(function(){
            var obiect=$(this);//pobierz obiekt wywołujący zdarzenie
            var id = obiect.attr("data-content");//pobieramy id ogłoszenia
            var _class = obiect.parent().attr("class");//pobieramy klasę ogłoszenia
            var reversal = _class.split(" ");//rozdziel klasę
            reversal = reversal_valid(reversal[1]);//ustal czy użytkownik jest nadawcą czy odbiorcą
            if(reversal!==false){
                deleted_valid(id, reversal, obiect);//jeżelu udało się ustalić stronę użytkownika przekż dane do PHP
            }
        });

        $(".message_info .icon-cog").click(function(){
            $(".message_info .options__ul").slideDown(); //pokaż listę opcji
            var offset=$(".message_info .icon-cog").offset(); //pobierz pozycję ikony opcjji
            $(".message_info .options__ul").css({//ustal pyzycję rozwijanej listy opcji
                position:"absolute",
                left:offset.left+24,
                top:offset.top
            });
            //sprawdź czy użytkonik kliknął poza ikonę lub listę i zwiń listę
            $(document).on("click", function(e) {
                if (!$(e.target).is(".icon-cog")&&!$(e.target).is(".options__ul li")) {
                    $(".message_info .options__ul").slideUp();
                }
            });
        });
        
        $(".options__ul .deleted__ul").click(function(){
            var content=$(this).parent(".options__ul").attr("data-content");//pobierz atrybut data-content klikniętego elementu
            content=content.split("/");//rozdziel pobrany content na ogłoszenie i korepondenta     
            deleted_all(content[0],content[1]);//wywołaj funkcje usuń wątek
        });
    });

    function reversal_valid(reversal){
        if(reversal=="right"){
            return "nadawca";
        }
        else if(reversal=="left"){
            return "odbiorca";
        }
        else return false;
    }

    function deleted_valid(id,removing,obiect){
        $.ajax({
            url: 'usun_wiadomosc.php',
            type: 'post',
            data: {announcement:id , removing:removing},
            success: function(response){
                //jeżeli skrypt wykonał się popraawnie ukryj wiadomosć jeżeli nie wyświetl komunikat o błędzie
                if(response==true){
                    obiect.parent(".message").fadeOut(800);
                }
                else{
                    obiect.parent(".message").append('<div class="blad_user"><p>Jedno z twoich poleceń narusza zasady użytkowania serwisu.<br/> Prowadzenie działań niezgodnych z regulaminem, bądź działających na niekożyść serwisu lub jego użytkowników może skutkować konsekwencjami prawnymi!</p></div>');
                    $("#message").scrollTop="1e6"; //przewiń okno do dołu

                }
            }
            });
    }
    
    function deleted_all(announcement,correspondent){
        $.ajax({
            url: 'usun_wiadomosc.php',
            type: 'post',
            data: {announcement:announcement , correspondent:correspondent},
            success: function(response){
                //jeżeli skrypt wykonał się popraawnie przenieś użytkownika do strony wiadomości, jeżeli nie wyświetl komunikat o błędzie
                if(response==true){
                    location.href="index.php";
                }
                else{
                    $("#message").append('<div class="blad_user"><p>Jedno z twoich poleceń narusza zasady użytkowania serwisu.<br/> Prowadzenie działań niezgodnych z regulaminem, bądź działających na niekożyść serwisu lub jego użytkowników może skutkować konsekwencjami prawnymi!</p></div>');
                    $("#message").scrollTop="1e6";//przewiń okno do dołu

                }
            }
        });
    }
</script>