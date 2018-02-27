<?php
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];

require ($DOCUMENT_ROOT.'/../ini/klasyPHP/trait/String.php');
require ($DOCUMENT_ROOT.'/../ini/klasyPHP/class/Input.php');
require ($DOCUMENT_ROOT.'/../ini/klasyPHP/class/ValidInput.php');
require ($DOCUMENT_ROOT.'/../ini/klasyPHP/class/MyError.php');
require ($DOCUMENT_ROOT.'/../ini/klasyPHP/class/ResetPass.php');
require ($DOCUMENT_ROOT.'/../ini/klasyPHP/class/Login.php');
require ($DOCUMENT_ROOT.'/../ini/klasyPHP/class/Email.php');

session_start();

    $input = Input::CreateInput($_POST['identity'],"identity");// obiekt z danymi z input
    $validError = new ValidError();// obiekt obsługi błędów
    $validInput = ValidInput::createValidInput($input,$validError);// obiekt przeprowadzający walidację
    $validInput->valid();// wykonaj walidację
    if($validError->checkErrors()){
        require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');// nawiąż połączenie z bazą danych
    }
    else{
        $_SESSION['validError'] = $validError;
        header("Location:reset_pass.php");
    }
 ?>