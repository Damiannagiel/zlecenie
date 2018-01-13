<?php
session_start();//uruchom sesję i utwór zmienne
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
//include($DOCUMENT_ROOT.'/../ini/skryptyPHP/avatar_skrypt.php');
$user_id=$_SESSION['id'];//id użytkownika
$password=$_POST['password'];//aktualne hasło
$new_email=$_POST['new_email'];//nowy e-mail


include($DOCUMENT_ROOT.'/../ini/funkcjePHP/connect.php');
include($DOCUMENT_ROOT.'/../ini/funkcjePHP/polacz_z_baza.php');
include($DOCUMENT_ROOT.'/../ini/funkcjePHP/funkcje_walidacja.php');
if($polaczenie){
    $ok=true;//ogólny przebieg walidacji
    $pass_db=true;//przebieg walidacji aktualnego hasła przed sprawdzeniem w bazie danych
    //sprawdź czy wszystkie pola formularza zostały wypełnione
    if((!sprawdz_spacje($password))||(!sprawdz_spacje($new_email))){
        $ok=false;
        $_SESSION['mail_space_error']="<p>Wszytkie pola formularza muszą być wypełnione!";
        $_SESSION['settings_error']=true;
    }
    else{
         //waliduj aktualne hasło
        if(!sprawdz_login($password)){
            $ok=false;
            $pass_db=false;
            $_SESSION['password_characters_error']="<p>Hasło zawiera niedozwolone znaki!</p>";
            $_SESSION['settings_error']=true;
        }
        if(!sprawdz_dlugosc($password,8,20)){
            $ok=false;
            $pass_db=false;
            $_SESSION['password_length_error']="<p>Hasło musi składać się od 8 do 20 znaków!</p>";
            $_SESSION['settings_error']=true;
        }
        //sprawdź poprawność hasła
        if($pass_db){
            $pass_db=pobierz_dane($polaczenie,"pass","uzytkownicy","id",$user_id);//pobierz hasło użytkownika z bazy
            if(!password_verify($password, $pass_db['pass'])){
                $ok=false;
                $_SESSION['password_error']="<p>Hasło jest błędne!</p>";
                $_SESSION['settings_error']=true;
            }
        }
        //waliduj nowy e-mail
        if(!sprawdz_email($new_email)){
            $ok=false;
            $_SESSION['new_email_error']="<p>Podany adres nie jest prawidłowym adresem e-mail!</p>";
            $_SESSION['settings_error']=true;
        }
        else{
            //sprawdź czy nowy adres e-mail nie jest zajęty
            $email_verification=pobierz_dane($polaczenie,"email","uzytkownicy","email",$new_email);
            //jeżeli znaleziono taki adres e-mail wbazie
            if($email_verification){
                $ok=false;
                $_SESSION['email_repeats_error']="<p>Podany adres e-mail jest już używany w serwisie!</p>";
                $_SESSION['settings_error']=true;
            }
        }
    }
    //sprawdź czy walidacja przebiegła ok i zmień hasło użytkownika
    if($ok){
        $edit=edytuj_dane($polaczenie,"uzytkownicy","email",$new_email,"id",$user_id);
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







