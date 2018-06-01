<?php
//uruchom sesję i utwór zmienne
session_start();
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
include ($DOCUMENT_ROOT.'/../ini/funkcjePHP/funkcje_walidacja.php');
include ($DOCUMENT_ROOT.'/../ini/funkcjePHP/connect.php');
include ($DOCUMENT_ROOT.'/../ini/funkcjePHP/polacz_z_baza.php');

$delete_pas=$_POST['delete_pas'];
$delete_id=$_SESSION['id'];

//wykonaj walidację zmiennych z formulaży
$ok=true;
//sprawdź checkbox
if(!isset($_POST['delete_checkbox'])||$_POST['delete_checkbox']!=1){
    $_SESSION['error_delete_checkbox']='<p>Zaznacz chceckboxa!</p>';
    $_SESSION['settings_error']=true;
    $ok=false;
}
else $delete_checkbox=$_POST['delete_checkbox'];

//wykonaj walidację hasła
if(!sprawdz_spacje($delete_pas)){
    $_SESSION['error_pass_space']='<p>Podaj hasło!</p>';
    $_SESSION['settings_error']=true;
    $ok=false;
}
else if(!sprawdz_znaki($delete_pas)){
    $_SESSION['error_pass']='<p>Podaj prawidłowe hasło!</p>';
    $_SESSION['settings_error']=true;
    $ok=false;   
}
else{
    //pobierz z bazy hasło użytkownika i sprawdź jego zgodność z podanym hasłem
    $pass=pobierz_dane($polaczenie,"pass","users","id",$delete_id);
    if (!password_verify($delete_pas, $pass['pass'])){
        $_SESSION['error_pass']='<p>Podaj prawidłowe hasło!</p>';
        $_SESSION['settings_error']=true;
        $ok=false;
    }
}

//jest połączenie z bazą danych
if(isset($polaczenie)){
    //autoryzacja użytkownika przebiegła prawidłowo
    if($ok==true){
        
        $del_ok=true;//zmienna zakładająca poprawność wykonania sktyptu
                
        //zmień daty wszystkich ogłoszeń użytkownika na aktualną
        $current_date=date('Y-m-d H:i:s');
        $delete_announcement=edytuj_dane($polaczenie,"announcements","end",$current_date,"user",$delete_id);
        if(!$delete_announcement)$del_ok=false;
        
        //usuń avatar uzytkownika
        if (file_exists('../../public_profile/avatar/' . $delete_id . '.jpg')) {
            @$del_ok = unlink('../../public_profile/avatar/' . $delete_id . '.jpg');
        }
        if (file_exists('../../public_profile/avatar/' . $delete_id . '.png')) {
            @$del_ok = unlink('../../public_profile/avatar/' . $delete_id . '.png');
        }
        
        //oznacz konto użytkownika jako usunięte
        $delete_id=edytuj_dane($polaczenie,"users","deleted",1,"id",$delete_id);
        if(!$delete_id) $del_ok=false;
        
        if($del_ok==true){
            session_destroy();
            header('Location:../../index.php');
        }
        else echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę. Jeżeli problem się powtarza prosimy o kontakt z supportem.</span>';
    }
    //autoryzacja nie przebiegła prawidłowo
    else{
        header('Location:../user.php');
    }
}
//brak połączenia z bazą danych
else{
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
    exit;
}
?>







