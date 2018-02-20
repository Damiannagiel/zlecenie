<?php
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
include ($DOCUMENT_ROOT.'/../ini/klasyPHP/classResetPass.php');
include ($DOCUMENT_ROOT.'/../ini/klasyPHP/classResetPassException.php');
session_start();

try{
    $_SESSION['error'] = new ValidException();
    $ResetPass = new ResetPassText($_POST['user'],$_SESSION['error']);

    if($ResetPass->error->CheckErrors()){
        $ResetPass=$ResetPass->NewType();
        if($ResetPass->error->CheckErrors()){
            require ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');
            $ResetPass->CheckDatabase($polaczenie);
            if($ResetPass->error->CheckErrors()){
                
            }
            else{
                header("Location:reset_pass.php");
            }
        }
        else{
            header("Location:reset_pass.php");
        }
    }
    else{
        header("Location:reset_pass.php");
    }
}
catch(Exception $e){
    echo $e->getMessage();
}

 ?>