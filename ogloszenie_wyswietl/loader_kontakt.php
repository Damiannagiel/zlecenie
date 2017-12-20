<?php

$CONTENT=$_POST['Content'];

if($CONTENT == "kontakt")
{
	include_once ($CONTENT.'.php');
	exit;
}

else echo"Przykro nam, coś poszło nie tak.";
?>