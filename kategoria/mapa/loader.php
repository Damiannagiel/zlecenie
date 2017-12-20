<?php

$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];	
require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/formatuj_ciag.php');

$woj=usun_ogonki($_POST['woj']);

if($woj=="dolnoslaskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="kujawsko-pomorskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="lubelskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="lubuskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="lodzkie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="malopolskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="mazowieckie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="opolskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="podkarpackie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="podlaskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="pomorskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="slaskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="swietokrzyskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="warminsko-mazurskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="wielkopolskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="zachodniopomorskie")
{
	header('Location: powiaty/'.$woj.'.php');
}
else if($woj=="all")
{
	header('Location: powiaty/'.$woj.'.php');
}
else echo"Przykro nam, coś poszło nie tak.";

?>