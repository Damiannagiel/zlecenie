<?php
session_start();
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
require_once ($DOCUMENT_ROOT.'/../ini/funkcjePHP/formatuj_ciag.php');

$CONTENT=przetwoz_kat($_POST['Content']);



if($CONTENT == "Budowlanka")
{
	include_once ('kategorie/kat1/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "AGD RTV i komputery")
{
	include_once ('kategorie/kat1/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "Dom i ogrod")
{
	include_once ('kategorie/kat1/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "Edukacja i finanse")
{
	include_once ('kategorie/kat1/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "Gastronomia i przyjecia")
{
	include_once ('kategorie/kat1/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "Moda zdrowie i uroda")
{
	include_once ('kategorie/kat1/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "Motoryzacja")
{
	include_once ('kategorie/kat1/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "inne")
{
	include_once ('kategorie/'.$CONTENT.'.html');
	exit;
}

else echo"Przykro nam, coś poszło nie tak.";
?>