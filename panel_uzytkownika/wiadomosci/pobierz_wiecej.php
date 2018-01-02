<?php 
	session_start();
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
	$user=$_POST['user'];
	if($_SESSION['id']==$user){
		$ok=true;
		$adresat=$_POST['adresat'];
		$ogloszenie=$_POST['ogloszenie'];
                $limit=$_POST['limit'];
                $petla=$_POST['petla'];
			
		try{
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/connect.php');
			require_once ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/funkcje_wiadomosci.php');
					
			if(isset($polaczenie)){
                            $wiadomosci= pobierz_wiadomosci($polaczenie,$ogloszenie,$adresat,$user,$limit);
                            
                            if($wiadomosci){
                                    $ile_wiadomosci=sizeof($wiadomosci);
                                    if($ile_wiadomosci==25){
                                        $wiecej=1;
                                    }
                                    else{
                                        $wiecej=0;
                                    }
                                }
                                else{
                                    $ile_wiadomosci=0;
                                    $wiecej=0;
                                }

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
		$wiadomosci="drogi użytkowniku coś tu kręcisz";
		echo $wiadomosci;
	}
?>
<script>
  var ile=<?php echo $ile_wiadomosci;?>;
  var ok=<?php echo $ok; ?>;
  var wiecej=<?php echo $wiecej; ?>;
  var user=<?php echo $user; ?>;
  var adresat=<?php echo $adresat; ?>;
  var ogloszenie=<?php echo $ogloszenie ?>;
  var petla=<?php echo $petla ?>;
		
  if(ile>0){
    var json='<?php echo json_encode($wiadomosci);?>';
    var wiadomosci=eval(json);
  }
  if(ok==true){
      wyswietl_wiecej_wiadomosci(wiadomosci,user,adresat,avatar,ile,wiecej,petla);
  }
</script>
