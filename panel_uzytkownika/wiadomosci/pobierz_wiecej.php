<?php 
	session_start();
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
	$user=$_POST['user'];
	if($_SESSION['id']==$user){
                require_once ($DOCUMENT_ROOT.'/../ini/funkcjePHP/funkcje_wiadomosci.php');
		$ok=true;
                if(is_numeric($_POST['adresat'])&&$_POST['adresat']>0){
                    $adresat=$_POST['adresat'];
                }
                else $ok=false;
                if(is_numeric($_POST['ogloszenie'])&&$_POST['ogloszenie']>0){
                   $ogloszenie=$_POST['ogloszenie'];
                }
                else $ok=false;
                if(sprawdz_limit($_POST['limit'])){
                    $limit=$_POST['limit'];
                }
                else $ok=false;
                if(is_numeric($_POST['petla'])&&$_POST['petla']>0){
                    $petla=$_POST['petla'];
                }
                else $ok=false;
			
		if($ok){try{
			require_once ($DOCUMENT_ROOT.'/../ini/funkcjePHP/polacz_z_baza.php');
			require_once ($DOCUMENT_ROOT.'/../ini/funkcjePHP/connect.php');
					
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
                }}
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
