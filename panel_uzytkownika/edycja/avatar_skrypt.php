<?php
    //uruchom sesję i utwór zmienne
    session_start();
    $id=$_SESSION['id'];
    $plik=$_FILES['avatar'];
    $DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
    
    //wykonuję walidację odebranego pliku
    include ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_plikowe.php');
    $plik_ok=true;
    
    //sprawdzam czy plik nie przekracza 150KB
    if(!sprawdz_wielkosc_pliku($plik,153600)){
        $plik_ok=false;
        $_SESSION['avatar_size']="Wbyrałeś zbyt duży plik";
    }
    else{
        
    }
    
    if($plik_ok){
        echo "super";
    }
    else{
        echo "zdjęcie nie przeszło walidacji";
    }
    
    
?>







