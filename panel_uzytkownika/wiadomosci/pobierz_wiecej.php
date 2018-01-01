<?php 
	session_start();
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
	$user=$_POST['user'];
	if($_SESSION['id']==$user){
		$ok=true;
		$adresat=$_POST['adresat'];
		$ogloszenie=$_POST['ogloszenie'];
                $limit=$_POST['limit'];
			
		try{
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/connect.php');
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_wiadomosci.php');
					
			if(isset($polaczenie)){
                            echo"gitara";
			}
			else exit;
		}
		catch(Exception $e){
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
		}
	}
	else{
		$ok=false;
		$wyswietl="drogi użytkowniku coś tu kręcisz";
		echo $wyswietl;
	}
?>
