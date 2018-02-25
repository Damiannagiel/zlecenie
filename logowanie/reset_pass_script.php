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

    $input = Input::CreateInput($_POST['identity'],"identity");
    $validError = new ValidError();
    $validInput = ValidInput::createValidInput($input,$validError);
    $validInput->valid();
    if($validError->checkErrors()){
        // dalsza część skryptu
        echo "walidacja przebiegła pomyslnie";
    }
    else{
        $_SESSION['validError'] = $validError;
        header("Location:reset_pass.php");
    }
 ?>