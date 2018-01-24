<?php
//uruchom sesję i utwór zmienne
session_start();
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
include ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_walidacja.php');
include ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/connect.php');
include ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');

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
    $pass=pobierz_dane($polaczenie,"pass","uzytkownicy","id",$delete_id);
    if (!password_verify($delete_pas, $pass['pass'])){
        $_SESSION['error_pass']='<p>Podaj prawidłowe hasło!</p>';
        $_SESSION['settings_error']=true;
        $ok=false;
    }
}

if(isset($polaczenie)){
    //autoryzacja użytkownika przebiegła prawidłowo
    if($ok==true){
        echo "pomyślna autoryzacja";
    }
    //autoryzacja nie przebiegła prawidłowo
    else{
        echo "nieudana autoryzacja";
        header('Location:../user.php');
    }
}
else{
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
    exit;
}
?>







