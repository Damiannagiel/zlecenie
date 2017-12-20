<?php
session_start();

$CONTENT = $_POST['Content'];

if($CONTENT == "dolnoslaskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "kujawsko-pomorskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "lubelskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}

else if($CONTENT == "lubuskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}
else if($CONTENT == "lodzkie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}
else if($CONTENT == "malopolskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}
else if($CONTENT == "mazowieckie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}
else if($CONTENT == "opolskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}
else if($CONTENT == "podkarpackie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}
else if($CONTENT == "podlaskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}
else if($CONTENT == "pomorskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}
else if($CONTENT == "slaskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}
else if($CONTENT == "swietokrzyskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}
else if($CONTENT == "warminsko-mazurskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}
else if($CONTENT == "wielkopolskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}
else if($CONTENT == "zachodniopomorskie")
{
	include_once ('powiaty/'.$CONTENT.'.html');
	exit;
}

else echo"Przykro nam, coś poszło nie tak.";
?>