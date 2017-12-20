<?php 
	session_start();
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
	$user=$_POST['user'];
	if($_SESSION['id']==$user){
		$ok=true;
		$adresat=$_POST['adresat'];
		$ogloszenie=$_POST['ogloszenie'];
		$ogl_tytul=$_POST['ogl_tytul'];
		$adresat_name=$_POST['adresat_name'];
			
		try{
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/connect.php');
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_wiadomosci.php');
					
			if(isset($polaczenie)){
				
				$wyswietl=pobierz_wiadomosci($polaczenie,$ogloszenie,$adresat,$user);

				$polaczenie->close();
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
<script>
		var ok=<?php echo $ok; ?>;
		var user=<?php echo $user; ?>;
		var adresat=<?php echo $adresat; ?>;
		var ogloszenie=<?php echo $ogloszenie ?>;
		
		var ogl_tytul=<?php echo '"'.$ogl_tytul.'"'; ?>;
		var adresat_name=<?php echo '"'.$adresat_name.'"'; ?>;
		
		var json='<?php echo json_encode($wyswietl);?>';
		var wiadomosci=eval(json);
		if(ok==true){
			wyswietl_wiadomosci(wiadomosci,user,adresat_name,ogl_tytul);
		}
</script>