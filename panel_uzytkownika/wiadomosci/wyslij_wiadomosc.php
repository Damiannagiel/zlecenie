<?php 
try{
	//uruchamiam sesje i załączam funkcje
	session_start();
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
	require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');
	require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/connect.php');
	require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_wiadomosci.php');
	require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_walidacja.php');
	//pobietam dane z POST
	$user=$_POST['user'];
	$adresat=$_POST['adresat'];
	$ogloszenie=$_POST['ogloszenie'];
	$tresc=$_POST['tresc'];
	$ok=true;
	if(isset($polaczenie)){
		//wykonuję walidacje
		if(!walidacja($polaczenie,$_SESSION['id'],$user,$adresat,$ogloszenie)){
			$ok=false;
		}
		if(!walidacja_tresc($tresc)){
			$ok=false;
		}
		if($ok){
			$data=date('Y-m-d H:i:s');
			$kolumny='announcement,sender,recipient,contents,date,displayed';
			$wartosci='"'.$ogloszenie.'","'.$user.'","'.$adresat.'","'.$tresc.'","'.$data.'","0"';
			$dodaj=dodaj_do_bazy($polaczenie,'messages',$kolumny,$wartosci);
			
			$polaczenie->close();
		}
		else exit;
	}
}
catch(Exception $e){
	echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
}
?>