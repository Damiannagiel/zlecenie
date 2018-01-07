<?php
//uruchom sesję i utwór zmienne
session_start();
if(isset($_GET['delete'])){
   $usun=$_GET['delete'];
   if($usun==$_SESSION['id']){
       if(file_exists('../../public_profile/avatar/'.$usun.'.jpg'))unlink('../../public_profile/avatar/'.$usun.'.jpg');
       if(file_exists('../../public_profile/avatar/'.$usun.'.png'))unlink('../../public_profile/avatar/'.$usun.'.png');
       $_SESSION['zapisano']=true;
       header('Location:../user.php');
   }
   else{
       echo '<div class="blad_user"><p>Jedno z twoich poleceń narusza zasady użytkowania serwisu.</br>Prowadzenie działań niezgodnych z regulaminem, bądź działających na niekożyść serwisu lub jego użytkowników może skutkować konsekwencjami prawnymi!</p></div>';
   }
}
else{
    $id=$_SESSION['id'];
    $plik=$_FILES['avatar'];
    $DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
    
    //wykonuję walidację odebranego pliku
    include ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_plikowe.php');
    $plik_ok=true;
    
    //sprawdzam czy plik nie przekracza 150KB
    if(!sprawdz_wielkosc_pliku($plik,153600)){
        $plik_ok=false;
        $_SESSION['avatar_size']="<p>Wbyrałeś zbyt duży plik!</p>";
        header('Location:../user.php');
    }
    else{
        //sprawdzam czy nie wystąpił błąd podczas wysyłania pliku
        if(!sprawdz_wyslanie_pliku($plik)){
            $plik_ok=false;
            $_SESSION['avatar_wysylanie']="<p>Wystąpił błąd podczas wysyłania pliku. Przepraszamy za utrudnienia i prosimy spróbować ponownie później.</p>";
            header('Location:../user.php');
        }
        else{
            //sprawdzam czy plik ma prawidłowy typ MIME?
            if (!sprawdz_typ_jpg($plik)){
                if(!sprawdz_typ_png($plik)){
                    $plik_ok=false;
                    $_SESSION['avatar_mime']="<p>przesłany plik nie jest prawidłowym plikiem .jpg lub .png!</p>";
                    header('Location:../user.php');
                }
                else $rozszerzenie='.png';
            }
            else $rozszerzenie='.jpg';
        }
    }
    
    //avarar przeszedł walidację
    if($plik_ok){
        echo "super";
        //określam lokalizację do zapisania
        $lokalizacja = '../../public_profile/avatar/'.$id.$rozszerzenie;
            //sprawdzam czy plik został przesłany przez formulaż HTTP
            if (is_uploaded_file($plik['tmp_name'])){
                //sprawdzam czy user posiada już avatar .jpg lub .png i ewentualnie go usuwam
                if(file_exists('../../public_profile/avatar/'.$id.'.jpg'))unlink('../../public_profile/avatar/'.$id.'.jpg');
                if(file_exists('../../public_profile/avatar/'.$id.'.png'))unlink('../../public_profile/avatar/'.$id.'.png');
                    //zapisuję nowy avatar
                    if (!move_uploaded_file($plik['tmp_name'], $lokalizacja)){
                        echo "przykro nam coś poszło nie tak... prosimy spróbować ponownie za chwilę.";
                    }
                    //jeżeli udało się zapisać nowy awatar tworzę sesję z informacją o pomyślnym zakończeniu działania skryptu i przenoszę użytkownika do strony głównej panelu użytkownika
                    else {
                        $_SESSION['zapisano']=true;
                        header('Location:../user.php');
                    }
          }
          else
          {
                echo "przykro nam coś poszło nie tak... prosimy spróbować ponownie za chwilę.";
          }
    }
    else{
        echo "zdjęcie nie przeszło walidacji";
    }
}
    
    
?>







