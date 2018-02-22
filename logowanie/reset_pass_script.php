<?php
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
//include ($DOCUMENT_ROOT.'/../ini/klasyPHP/classResetPass.php');
//include ($DOCUMENT_ROOT.'/../ini/klasyPHP/classResetPassException.php');

include ($DOCUMENT_ROOT.'/../ini/klasyPHP/classInput.php');
include ($DOCUMENT_ROOT.'/../ini/klasyPHP/classValidInput.php');
include ($DOCUMENT_ROOT.'/../ini/klasyPHP/classMyError.php');
session_start();

//try{
//    $_SESSION['error'] = new ValidException();
//    $ResetPass = new ResetPassText($_POST['user'],$_SESSION['error']);
//
//    if($ResetPass->error->CheckErrors()){
//        $ResetPass=$ResetPass->NewType();
//        if($ResetPass->error->CheckErrors()){
//            require ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');
//            $ResetPass->CheckDatabase($polaczenie);
//            if($ResetPass->error->CheckErrors()){
//                $SetResetCode = $ResetPass->SetResetCode($polaczenie);
//                if($SetResetCode){
//                    $ResetPass->SetResetEmail();
//                    $ResetPass->SendResetEmail();
//                    //wyślij e-mail
//                    //wyświetl informacje zwrotną
//                }
//                else{
//                    //nie udało się zapisać kodu w bazie danych
//                }
//            }
//            else{
//                header("Location:reset_pass.php");
//            }
//            $polaczenie->close();
//        }
//        else{
//            header("Location:reset_pass.php");
//        }
//    }
//    else{
//        header("Location:reset_pass.php");
//    }
//}
//catch(Exception $e){
//    echo $e->getMessage();
//}


    $input = Input::CreateInput($_POST['user']);
    ValidInput::checkBlank($input);
    if($input->error->checkErrors()){
        
    }
    else{
        $_SESSION['validError'] = $input->error;
        header("Location:reset_pass.php");
    }
 ?>