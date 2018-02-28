<?php 
	session_start();
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
	$user=$_POST['user'];
	if($_SESSION['id']==$user){
		try{
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/connect.php');
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_wiadomosci.php');
					
			if(isset($polaczenie)){
                                $zapytanie='SELECT id FROM messages WHERE sender = '.$user.' AND displayed = 0 LIMIT 1';
                                //sprawdź czy istnieją nieprzeczytane wiadomości dla tego użytkownika
                                $nieprzeczytane=pobierz_zapytanie($polaczenie,$zapytanie);
                                if($nieprzeczytane) $istnieja=1;
                                else $istnieja=0;
                                
				$polaczenie->close();
			}
			else exit;
		}
		catch(Exception $e){
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy sprubować ponownie za chwilę.</span>';
		}
	}
	else{
		echo "drogi użytkowniku coś tu kręcisz";
	}
?>
<script>
  var istnieja=<?php echo $istnieja;?>;
		
  if(istnieja==1){
      document.getElementById("message").classList.add("new");
  }
</script>
