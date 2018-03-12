<?php
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
require ($DOCUMENT_ROOT.'/../ini/class/classInput.php');
require ($DOCUMENT_ROOT.'/../ini/class/classValidInput.php');
require ($DOCUMENT_ROOT.'/../ini/class/classMyError.php');

// załącz klasy

session_start();

try{
    $id = Input::CreateInput($_GET['id'],"Id");// utwórz obiekt przechowujący id
    $verificationCode = Input::CreateInput($_GET['resetPass'],"VerificationCode");// utwórz obiekt przechowujący kod weryfikacyjny
    $validError = new ValidError();// utwórz obiekt przechowujący błędy walidacji
    $validId = ValidInput::createValidInput($id,$validError);// utwórz obiekt walidujący Id
    $validVerificationCode = ValidInput::createValidInput($verificationCode,$validError);// utwórz obiekt walidujący kod weryfikujący
    $validId->valid();// waliduj id
    $validVerificationCode->valid();// waliduj kod weryfikacyjny
    if($validError->checkFeedback()){
        // wykonaj jeżeli zmienne z $GET przeszły walidację
        
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