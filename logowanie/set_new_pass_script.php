<?php
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
require ($DOCUMENT_ROOT.'/../ini/class/classInput.php');
require ($DOCUMENT_ROOT.'/../ini/class/classValidInput.php');
require ($DOCUMENT_ROOT.'/../ini/class/classMyError.php');
require ($DOCUMENT_ROOT.'/../ini/class/classUser.php');
require ($DOCUMENT_ROOT.'/../ini/class/classDBConnect.php');
require ($DOCUMENT_ROOT.'/../ini/class/classForm.php');
require ($DOCUMENT_ROOT.'/../ini/class/classResetPass.php');

// załącz klasy

session_start();
include_once '../szablon/nav_head.php';

try{
    $validError = new ValidError();// utwórz obiekt przechowujący błędy walidacji
    
    $id = Input::CreateInput($_POST['id'],"id");// utwórz obiekt przechowujący id
    $validId = ValidInput::createValidInput($id,$validError);// utwórz obiekt walidujący Id
    $validId->valid();// waliduj id
    
    $verificationCode = Input::CreateInput($_POST['resetPass'],"verificationCode");// utwórz obiekt przechowujący kod weryfikacyjny
    $validVerificationCode = ValidInput::createValidInput($verificationCode,$validError);// utwórz obiekt walidujący kod weryfikujący
    $validVerificationCode->valid();// waliduj kod weryfikacyjny
    
    $pass = Input::CreateInput([$_POST["new_pass"],$_POST["new_pass_repeat"]],"pass");
    $validPass = ValidInput::createValidInput($pass,$validError);
    $validPass->valid();
    
    if($validError->checkFeedback()){
        // wykonaj jeżeli zmienne z $GET przeszły walidację
        require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');// nawiąż połączenie z bazą danych
        if($connection){
            // wykonaj jeżeli nawiązano połączenie z bazą danych
            $dbError = new DataBaseError();// obiekt błędów bazy danych
            $dbSelect = new DataBaseSelect($connection,$dbError);// obiekt łączący się z bazą danych
            
            $user = NewUser::createUser($dbSelect,"id,resetPass,resetPassTime","id=".$id->getValue());// pobierz dane użytkownika
            $form = Form::createForm([$id,$verificationCode,$pass],"SetResetPass");// utwórz obiekt odwzorowujący formularz
            $save = new EditResetPass($user,$form,$dbError);// utwórz obiekt edytujący hasło
            $save->resetPassVerification();// sprawdź kod weryfikacyjny
            $save->resetPassTimeVerification();// sprawdź ważnośc kodu
            
            if($dbError->checkFeedback()){
                // jeżeli kod weryfikacyjny się zgadza zapisz hasło do bazy
                $save->editPass(new DataBaseEdit($connection,$dbError));// utwórz obiekt edytujący bazę danych
                $positiveFeedback = new positiveFeedback(2); // utwórz obiekt z komunikatem o udanej prubie wysłania linka resetującego hasło
                $_SESSION['feedback'] = $positiveFeedback; // dodaj obiekt z komunikatem do sesji
                header("Location:zaloguj.php"); // prekieruj spowrotem na stronę
            }
            else{
                // wykryto błędy walidacji
                $_SESSION['feedback'] = $validError;// dodaj obiekt z komunikatem do sesji
                header("Location:set_new_pass.php?id=".$_POST['id']."&resetPass=".$_POST['resetPass']);// prekieruj spowrotem na stronę resetowania hasła
            } 
        }
        else{
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
            exit;
        }
    }
    else{
        // wykryto błędy walidacji
        $_SESSION['feedback'] = $validError;// dodaj obiekt z komunikatem do sesji
        header("Location:set_new_pass.php?id=".$_POST['id']."&resetPass=".$_POST['resetPass']);// prekieruj spowrotem na stronę resetowania hasła
    }
}
catch(Exception $e){
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';

        echo "priv info:</br></br>".$e;

}
 ?>