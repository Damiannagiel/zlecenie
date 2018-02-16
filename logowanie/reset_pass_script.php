<?php
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
include ($DOCUMENT_ROOT.'/../ini/klasyPHP/classResetPass.php');
include ($DOCUMENT_ROOT.'/../ini/klasyPHP/classResetPassException.php');

try{
    $usun= new ResetPassText($_POST['user']);
    if($usun){
        echo "ok";
        $new=$usun->NewType();
    }
//    $new->View();
    ResetPassException::CheckErrors();
}
catch(Exception $e){
    echo $e->getMessage();
}

 ?>