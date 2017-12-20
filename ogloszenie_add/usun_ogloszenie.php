
<!-- ta strona wyświetla się w panelu użytkownika! -->

<?php 
	@session_start();
	@$usun_id=$_SESSION['usun'];

	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
	include ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/polacz_z_baza.php');//nawiązywanie polaczenia z bazą danych
	include ($DOCUMENT_ROOT.'/../ini/FunkcjePHP/connect.php');//ładowanie funkcji łączących się z bazą danych

	if(isset($polaczenie))
	{
		$dane=pobierz_dane($polaczenie,"tytul,uzytkownik_id", "ogloszenia","id",$usun_id);

		if((!isset($_SESSION['id']))||($dane['uzytkownik_id']!=$_SESSION['id'])) header ("Location:../index.php");
		$polaczenie->close();
	}
	else exit;
?>
<div class="usun_ogl">
	<p>Czy jesteś pewien że chcesz usunać ogłoszenie <b><?php echo $dane['tytul'];?></b> ??</p>
	<form method="post" action="../ogloszenie_add/usun_ogloszenie_skrypt.php">
		<input type="hidden" value="<?php echo $usun_id;?>" name="usun_id"/>
		<div class="button-div">
			<button type="button" onClick='loadContent("ogloszenia");'class="button-green">Wróć</button>
			<input type="submit" value="Usuń" class="button-red"/>
		</div>
	</form>
</div>