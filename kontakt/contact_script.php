<?php
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
session_start();
if(isset($_POST['contact'])){
    if($_POST['contact']=="index" || $_POST['contact']=="pomoc" || $_POST['contact']=="reklama"){
        try{
            require ($DOCUMENT_ROOT.'/../ini/class/classInput.php');
            require ($DOCUMENT_ROOT.'/../ini/class/classValidInput.php');
            require ($DOCUMENT_ROOT.'/../ini/class/classMyError.php');
            require ($DOCUMENT_ROOT.'/../ini/class/classForm.php');
            require ($DOCUMENT_ROOT.'/../ini/class/classSendEmail.php');
            
            $contact = Input::CreateInput($_POST['contact'],"contact");// obiekt zawierający nazwę formularza
            $title = Input::CreateInput($_POST['topic'],"messageTopic");// obiekt zawierający tytuł
            $messge = Input::CreateInput($_POST['content'],"contentContactMessage");// obiekt zawierający treść wiadomości
            $email = Input::CreateInput($_POST['email'],"email");// obiekt zawierający adres e-mail
            
            $validError = new ValidError();// obiekt obsługi błędów
            
            $validTitle = ValidInput::createValidInput($title,$validError);// obiekt przeprowadzający walidację tytułu
            $validMessage = ValidInput::createValidInput($messge,$validError);// obiekt przeprowadzający walidację treści
            $validEmail = ValidInput::createValidInput($email,$validError);// obiekt przeprowadzający walidację adresu e-mail
            
            $validTitle->valid();// wykonaj walidację
            $validMessage->valid();// wykonaj walidację
            $validEmail->valid();// wykonaj walidację
            
            if($validError->checkFeedback()){
                $form = Form::createForm([$contact,$title,$messge,$email],"ContactEmail");// utwórz obiekt odwzorowujący formularz
                $send = SendFormEmail::createFormEmail($form);
                $send->sendEmail();
                $positiveFeedback = new positiveFeedback(3); // utwórz obiekt z komunikatem o udanej prubie wysłania linka resetującego hasło
                $_SESSION['feedback'] = $positiveFeedback; // dodaj obiekt z komunikatem do sesji
                header('Location:'.$_POST['contact'].'.php'); // prekieruj spowrotem na stronę
            } else{
                $_SESSION['feedback'] = $validError;
                header('Location:'.$_POST['contact'].'.php');
            }
        }   
        catch(Exception $e){
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
        }
    } else header("Location:../index.php");
} else header("Location:../index.php");
?>