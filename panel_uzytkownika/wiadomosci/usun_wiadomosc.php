<?php 
    //uruchamiam sesje i załączam funkcje
    session_start();
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');

    //walidacja id widomości
    if((is_numeric($_POST['id_wiadomosci'])) && ($_POST['id_wiadomosci']>0)){
        $id_wiadomosci = $_POST['id_wiadomosci'];
    }

    //walidacja nadawca/odbiorca 
    if(($_POST['removing'] == "nadawca") || ($_POST['removing'] == "odbiorca")){
        $removing = $_POST['removing'];
    }

    //sprawdź czy zmienne z POST przeszły walidację i istnieją
    if((isset($id_wiadomosci)) && (isset($removing))){

        $user = $_SESSION['id'];//ustaw id użytkownika

        //ustal czy porównujemy id usera z id nadawcy czy adresata
        if($removing == "nadawca"){
            $from = "nadawcy";
        }
        else $from = "adresata";

        //utwórz zapytanie
        $query = 'UPDATE wiadomosci SET deleted_'.$removing.'=1 WHERE id='.$id_wiadomosci.' AND id_'.$from.'='.$user;
        $polaczenie->query($query);//wykonaj zapytanie
        $remove = $polaczenie->affected_rows;//pobierz ilość zmodyfikowanych rekordów
        
        //jeżeli usunięcie się powiedzie wyświetl true w przeciwnym wypadku wyświetl false
        if($remove==1){
            echo true;
        }
        else echo false;
    }
    else echo false;//zmienne z POST nie przeszły walidacji, operacja usuwania nie powiodła się, wyświetl false
?>