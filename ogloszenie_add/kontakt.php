<?php
	session_start(); 
?>
<div class="kontakt">
	<p class="nr"><b>Telefon: </b><?php echo $_SESSION['tmp_telefon'];?></p>
	<p class="nr"><b>E-mail: </b><?php echo $_SESSION['tmp_email'];?></p>
	<p class="nr"><b>WWW: </b><a class="link" href="<?php echo $_SESSION['tmp_www'];?>"><?php echo $_SESSION['tmp_www'];?></a></p>
</div>