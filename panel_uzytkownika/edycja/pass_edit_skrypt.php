<?php
session_start();//uruchom sesję i utwór zmienne
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
//include($DOCUMENT_ROOT.'/../ini/skryptyPHP/avatar_skrypt.php');
$user_id=$_SESSION['id'];//id użytkownika
$current_password=$_POST['current_password'];//aktualne hasło
$new_password=$_POST['new_password'];//nowe hasło
$new_password_2=$_POST['new_password_2'];//powtórz hasło

include($DOCUMENT_ROOT.'/../ini/funkcjePHP/connect.php');
include($DOCUMENT_ROOT.'/../ini/funkcjePHP/polacz_z_baza.php');
include($DOCUMENT_ROOT.'/../ini/funkcjePHP/funkcje_walidacja.php');
if($polaczenie){
    $ok=true;//ogólny przebieg walidacji
    $pass_db=true;//przebieg walidacji aktualnego hasła przed sprawdzeniem w bazie danych
    //sprawdź czy wszystkie pola formularza zostały wypełnione
    if((!sprawdz_spacje($current_password))||(!sprawdz_spacje($new_password))||(!sprawdz_spacje($new_password_2))){
        $ok=false;
        $_SESSION['space_error']="<p>Wszytkie pola formularza muszą być wypełnione!";
        $_SESSION['settings_error']=true;
    }
    else{
        //sprawdź czy nowe hasła są jednakowe
        if($new_password==$new_password_2){
            //waliduj aktualne hasło
            if(!sprawdz_login($current_password)){
                $ok=false;
                $pass_db=false;
                $_SESSION['current_characters_error']="<p>Hasło zawiera niedozwolone znaki!</p>";
                $_SESSION['settings_error']=true;
            }
            if(!sprawdz_dlugosc($current_password,8,20)){
                $ok=false;
                $pass_db=false;
                $_SESSION['current_length_error']="<p>Hasło musi składać się od 8 do 20 znaków!</p>";
                $_SESSION['settings_error']=true;
            }
            //sprawdź czy użytkownik podał poprawne aktualne hasło
            if($pass_db){
                $pass_db=pobierz_dane($polaczenie,"pass","users","id",$user_id);//pobierz hasło użytkownika z bazy
                if(!password_verify($current_password, $pass_db['pass'])){
                    $ok=false;
                    $_SESSION['current_password_error']="<p>Aktuale hasło jest błędne!</p>";
                    $_SESSION['settings_error']=true;
                }
            }
            //waliduj nowe hasło
            if(!sprawdz_login($new_password)){
                $ok=false;
                $_SESSION['new_characters_error']="<p>Nowe hasło zawiera niedozwolone znaki!</p>";
                $_SESSION['settings_error']=true;
            }
            if(!sprawdz_dlugosc($new_password,8,20)){
                $ok=false;
                $_SESSION['new_length_error']="<p>Nowe hasło składać się od 8 do 20 znaków!</p>";
                $_SESSION['settings_error']=true;
            }
        }
        //nowe hasła nie są jednakowe
        else{
            $ok=false;
            $_SESSION['identical_error']="<p>Podene hasła nie są jednakowe!</p>";
            $_SESSION['settings_error']=true;
        }
    }
    //sprawdź czy walidacja przebiegła ok i zmień hasło użytkownika
    if($ok){
        //zahaszuj hasło
	$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        $edit=edytuj_dane($polaczenie,"users","pass",$password_hash,"id",$user_id);
        if($edit){
            $_SESSION['zapisano']=true;
            header('Location:../user.php');
        }
        else header('Location:../user.php');
    }
    else header('Location:../user.php');
}
else{
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
    exit;
}
?>







