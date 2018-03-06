<?php
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];

require ($DOCUMENT_ROOT.'/../ini/trait/String.php');
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
    if($validError->checkErrors()){
        //wykonaj jeżeli nie wykryto błędów walidacji
        require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');// nawiąż połączenie z bazą danych
        if($connection){
            $dbError = new DataBaseError();// obiekt błędów bazy danych
            $dbSelect = new DataBaseSelect($connection,$dbError);// obiekt łączący się z bazą danych
            $requirement = $input->getName().' = "'.$input->getValue().'"';// warunek dla bazy danych
            $user = NewUser::createUser($dbSelect,"id,login,email",$requirement);// pobierz dane użytkownika
            if($dbError->checkErrors()){
                // wykonaj jeżeli udało się pobrać użytkownika
                $date = date('Y-m-d');// ustal datę 
                $keys = ["resetPass","resetPassTime"];
                $value = [$code,$date]; 
                $dbEdit = new DataBaseEdit($connection,$dbError);
                $dbEdit->editUser($keys,$value,$user->getId());
                
                $sendEmail = new SendResetPassEmail;
                $sendEmail->addAddress($user->getEmail(),$user->getLogin());
                $sendEmail->setContents($user,$code);
                if($sendEmail->sendEmail()){
                    echo "wszystko ok";
                }
                else echo "dupa";
                
            }
            else{
                // wykryto błędy bazy danych
                $_SESSION['error'] = [$dbError];
                header("Location:reset_pass.php");
            }
        }
    }
    else{
        // wykryto błędy walidacji
        $_SESSION['error'] = [$validError];
        header("Location:reset_pass.php");
    }
}
catch(Exception $e){
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
    echo "priv info/n".$e;
}
 ?>