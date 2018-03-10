<?php
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];

require ($DOCUMENT_ROOT.'/../ini/trait/String.php');
require ($DOCUMENT_ROOT.'/../ini/trait/Integer.php');
require ($DOCUMENT_ROOT.'/../ini/class/classInput.php');
require ($DOCUMENT_ROOT.'/../ini/class/classValidInput.php');
require ($DOCUMENT_ROOT.'/../ini/class/classMyError.php');
require ($DOCUMENT_ROOT.'/../ini/class/classResetPass.php');
require ($DOCUMENT_ROOT.'/../ini/class/classUser.php');
require ($DOCUMENT_ROOT.'/../ini/class/classDBConnect.php');
require ($DOCUMENT_ROOT.'/../ini/class/classSendEmail.php');

session_start();

try{
    $input = Input::CreateInput($_POST['identity'],"identity");// obiekt z danymi z input
    $validError = new ValidError();// obiekt obsługi błędów
    $validInput = ValidInput::createValidInput($input,$validError);// obiekt przeprowadzający walidację
    $validInput->valid();// wykonaj walidację
    ValidInput::validRecaptcha($_POST['g-recaptcha-response'],$validError);
    if($validError->checkFeedback()){
        //wykonaj jeżeli nie wykryto błędów walidacji
        require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');// nawiąż połączenie z bazą danych
        if($connection){
            $dbError = new DataBaseError();// obiekt błędów bazy danych
            $dbSelect = new DataBaseSelect($connection,$dbError);// obiekt łączący się z bazą danych
            $requirement = $input->getName().' = "'.$input->getValue().'"';// warunek dla bazy danych
            $user = NewUser::createUser($dbSelect,"id,login,email",$requirement);// pobierz dane użytkownika
            if($dbError->checkFeedback()){
                // wykonaj jeżeli udało się pobrać użytkownika
                $saveResetCode = new ResetPass($user); // obiekt edytujący dane w bazie danych
                $saveResetCode->saveResetPassCode(new DataBaseEdit($connection,$dbError)); // edytuj dane usera
                $saveResetCode->sendResetPassEmail(new SendResetPassEmail); // wyślij email z linkiem resetującym
                $positiveFeedback = new positiveFeedback(1); // utwórz obiekt z komunikatem o udanej prubie wysłania linka resetującego hasło
                $_SESSION['feedback'] = $positiveFeedback; // dodaj obiekt z komunikatem do sesji
                header("Location:reset_pass.php"); // prekieruj spowrotem na stronę
            }
            else{
                // wykryto błędy bazy danych
                $_SESSION['feedback'] = $dbError;// dodaj obiekt z komunikatem do sesji
                header("Location:reset_pass.php");// prekieruj spowrotem na stronę
            }
        }
    }
    else{
        // wykryto błędy walidacji
        $_SESSION['feedback'] = $validError;// dodaj obiekt z komunikatem do sesji
        header("Location:reset_pass.php");// prekieruj spowrotem na stronę
    }
}
catch(Exception $e){
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
    if($_SESSION["id"]==1){
        echo "priv info:</br></br>".$e;
    }
}
 ?>