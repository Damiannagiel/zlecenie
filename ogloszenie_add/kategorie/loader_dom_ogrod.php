<?php
session_start();
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
require_once ($DOCUMENT_ROOT.'/../ini/funkcjePHP/formatuj_ciag.php');

$CONTENT=przetwoz_kat($_POST['Content']);

if($CONTENT == "Opieka")
{
	include_once ('dom_ogrod/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "Ogrod i posesja")
{
	$CONTENT = "puste";
	include_once ($CONTENT.'.html');
	exit;
}

else if($CONTENT == "Sprzatanie")
{
	$CONTENT = "puste";
	include_once ($CONTENT.'.html');
	exit;
}

else if($CONTENT == "Zlota raczka")
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