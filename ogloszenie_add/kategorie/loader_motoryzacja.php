<?php
session_start();
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/formatuj_ciag.php');

$CONTENT=przetwoz_kat($_POST['Content']);

if($CONTENT == "Naprawy")
{
	include_once ('motoryzacja/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "Transport osobowy")
{
	$CONTENT = "puste";
	include_once ($CONTENT.'.html');
	exit;
}

else if($CONTENT == "Transport towarowy")
{
	$CONTENT = "puste";
	include_once ($CONTENT.'.html');
	exit;
}

else if($CONTENT == "Wynajem sprzetu")
{
	$CONTENT = "puste";
	include_once ($CONTENT.'.html');
	exit;
}

else if($CONTENT == "inne")
{
	include_once ($CONTENT.'.html');
	exit;
}

else echo"Przykro nam, coś poszło nie tak.";
?>