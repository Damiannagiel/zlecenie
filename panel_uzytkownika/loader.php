<?php
session_start();

$CONTENT = $_POST['Content'];
@$_SESSION['usun']= $_POST['Usun'];

if($CONTENT == "kontakty")
{
	include_once ('kontakty/'.$CONTENT.'.php');
	exit;
}

else if($CONTENT == "ogloszenia")
{
	include_once ('ogloszenia/'.$CONTENT.'.php');
	exit;
}
 
else if($CONTENT == "profil")
{
	include_once ('profil/'.$CONTENT.'.php');
	exit;
} 

else if($CONTENT == "premium")
{
	include_once($CONTENT.'.php');
	exit;
} 
else if($CONTENT == "edycja")
{
	include_once('edycja/'.$CONTENT.'.php');
	exit;
} 
if($CONTENT == "krok1")
{
	include_once ('edycja/'.$CONTENT.'.php');
	exit;
}

else if($CONTENT == "krok2")
{ 
	if(@$_SESSION['osobowosc1'] == 1)
	{
		session_write_close();
		include_once ('edycja/'.$CONTENT.'_osoba.php');
		exit;
	}
	else if(@$_SESSION['osobowosc1'] == 2)
	{
		session_write_close();
		include_once ('edycja/'.$CONTENT.'_firma.php');
		exit;
	}
	else echo "błąd";
}
 
else if($CONTENT == "krok3")
{
	include_once ('edycja/'.$CONTENT.'.php');
	exit;
} 

else if($CONTENT == "zapisane")
{
	include_once ('edycja/'.$CONTENT.'.php');
	exit;
}

else if($CONTENT == "usun_ogloszenie")
{
	include_once ('../ogloszenie_add/'.$CONTENT.'.php');
	exit;
}
else echo"Przykro nam, coś poszło nie tak.";
?>