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
    $id = Input::CreateInput($_POST['id'],"id");// utwórz obiekt przechowujący id
    $verificationCode = Input::CreateInput($_POST['resetPass'],"verificationCode");// utwórz obiekt przechowujący kod weryfikacyjny
    $validError = new ValidError();// utwórz obiekt przechowujący błędy walidacji
    $validId = ValidInput::createValidInput($id,$validError);// utwórz obiekt walidujący Id
    $validVerificationCode = ValidInput::createValidInput($verificationCode,$validError);// utwórz obiekt walidujący kod weryfikujący
    $validId->valid();// waliduj id
    $validVerificationCode->valid();// waliduj kod weryfikacyjny
    if($validError->checkFeedback()){
        // wykonaj jeżeli zmienne z $GET przeszły walidację
        require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');// nawiąż połączenie z bazą danych
        if($connection){
            $dbError = new DataBaseError();// obiekt błędów bazy danych
            $dbSelect = new DataBaseSelect($connection,$dbError);// obiekt łączący się z bazą danych
            $user = NewUser::createUser($dbSelect,"id,resetPass,resetPassTime","id=".$id->getValue());// pobierz dane użytkownika
            $form = Form::createForm([$id,$verificationCode],"SetResetPass");
            $save = new SaveResetPass($user,$form,$dbError);
            $save->resetPassVerification();
            if($dbError->checkFeedback()){
                echo "kod się zgadza, zapisujemy!";
            }
            else{
                // wykryto błędy walidacji
                $_SESSION['feedback'] = $validError;// dodaj obiekt z komunikatem do sesji
                header("Location:reset_pass.php");// prekieruj spowrotem na stronę resetowania hasła
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
        header("Location:reset_pass.php");// prekieruj spowrotem na stronę resetowania hasła
    }
}
catch(Exception $e){
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
    if($_SESSION["id"]==1){
        echo "priv info:</br></br>".$e;
    }
}
 ?>