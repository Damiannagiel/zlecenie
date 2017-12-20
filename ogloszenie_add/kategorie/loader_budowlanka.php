<?php
session_start();
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/formatuj_ciag.php');

$CONTENT=przetwoz_kat($_POST['Content']);

if($CONTENT == "Budowa")
{
	include_once ('budowlanka/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "Instalacje")
{
	include_once ('budowlanka/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "Posesja")
{
	include_once ('budowlanka/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "Wykonczenie")
{
	include_once ('budowlanka/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "inne")
{
	include_once ($CONTENT.'.html');
	exit;
}

else echo"Przykro nam, coś poszło nie tak.";
?>