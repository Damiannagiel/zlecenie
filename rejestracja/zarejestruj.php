<!DOCTYPE HTML>
<html lang="pl">
<head>
        <title>Rejestracja w igu.com.pl</title>
	
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<meta name="description" content="igu.com.pl - to platforma ogłoszeniowa dla usługodawców i zleceniodawców. Tutaj znajdziesz wykonawcę swojej usługi w każdej branży, a także klientów szukających kogoś takiego jak ty!" />
	<link href="rejestracja.css" type="text/css" rel="stylesheet"/>
        
	<?php 
            session_start();
            include_once '../szablon/nav_head.php';
	?>
</head>

			    <?php
				include_once '../szablon/nav_body.php';
				?>
	
			<!--Panel rejestracji-->
			<article>
					
					<aside>
						<img class="low" src="../img/320x100.jpeg"/>
						<img class="medium"src="../img/728x90.jpg"/>
						<div>
							<img class="large" src="../img/320x250.jpg"/>
						</div>
					</aside>
				
					<form class="register" action="skrypt_rejestracja.php" method="post">
					
					<header>
						<h2 class="rej">Załóż konto w IGU za darmo!!</h2>
					</header>
					
						<!--Podaj e-mail-->
							<div class="rejdiv_inp">
								<label for="email">E-mail:</label>
								<div class="imput-text">
									<input type="email" name="email" placeholder="Podaj adres e-mail" style="background-color:<?php echo $_SESSION['color_email']; ?>"value=" <?php
											if(isset($_SESSION['fr_email']))
											{
												do{echo $_SESSION['fr_email'];unset($_SESSION['fr_email']);}while (isset($_SESSION['fr_email']));
											} 
										?>" class="inp inp_rej">
										<?php
										if(isset($_SESSION['e_email']))
											{
												do{echo  '<div class="error">'.$_SESSION['e_email'].'</div>';$_SESSION['color_email']="white";unset($_SESSION['e_email']);}while (isset($_SESSION['e_email']));
											} ?>
								</div>
							</div>
								
						<!--Podaj login-->		
							<div class="rejdiv_inp">
								<label for="login">Login:</label>
								<div class="imput-text">
									<input type="text" name="login" placeholder="Podaj login" style="background-color:<?php echo $_SESSION['color_nick']; ?>" value="<?php
											if(isset($_SESSION['fr_login']))
											{
												do{echo $_SESSION['fr_login'];unset($_SESSION['fr_login']);}while (isset($_SESSION['fr_login']));
											} 
										?>" class="inp inp_rej">
										<?php
										if(isset($_SESSION['e_login']))
											{
												do{echo  '<div class="error">'.$_SESSION['e_login'].'</div>'; $_SESSION['color_nick']="white"; unset($_SESSION['e_login']);}while (isset($_SESSION['e_login']));
											} ?>
								</div>
							</div>
							
						<!--Podaj hasło-->
							<div class="rejdiv_inp">
								<label for="hslo1">Hasło:</label>
								<div class="imput-text">
									<input type="password" name="haslo1" placeholder="Podaj hasło" style="background-color:<?php echo $_SESSION['color_pass']; ?>" value="<?php
											if(isset($_SESSION['fr_haslo1']))
											{
												do{echo $_SESSION['fr_haslo1'];unset($_SESSION['fr_haslo1']);}while (isset($_SESSION['fr_haslo1']));
											} 
										?>" class="inp inp_rej">
								</div>
							</div>
								
							
						<!--Potwierdź hasło-->	
							<div class="rejdiv_inp">
								<label for="haslo2">Potwierdź hasło:</label>
								<div class="imput-text">
									<input type="password" name="haslo2" placeholder="Powtórz hasło" style="background-color:<?php echo $_SESSION['color_pass']; ?>" value="<?php
											if(isset($_SESSION['fr_haslo2']))
											{
												do{echo $_SESSION['fr_haslo2'];unset($_SESSION['fr_haslo2']);}while (isset($_SESSION['fr_haslo2']));
											} 
										?>" class="inp inp_rej">
										<?php
										if(isset($_SESSION['e_haslo']))
											{
												do{echo  '<div class="error">'.$_SESSION['e_haslo'].'</div>';$_SESSION['color_pass']="white";unset($_SESSION['e_haslo']);}while (isset($_SESSION['e_haslo']));
											} ?>
								</div>
							</div>

						<!--Skąd się o nas dowiedziałeś-->		
							<div class="rejdiv_inp">
								<label for="skad">Jak się o nas dowiedziałeś?</label>
								<div class="imput-text">
									<select name="skad" class="inp inp_sb">
										<option value="x">Jak się o nas dowiedziałeś?</option>
										<option value="fb"<?php if (isset($_SESSION['fr_skad'])) {if($_SESSION['fr_skad'] == "fb") {echo 'selected="selected"';unset($_SESSION['fr_skad']);}}  ?>>Reklama w Facebook</option>
										<option value="yt"<?php if (isset($_SESSION['fr_skad'])) {if($_SESSION['fr_skad'] == "yt") {echo 'selected="selected"';unset($_SESSION['fr_skad']);}}  ?> >Reklama w You Tube</option>
										<option value="radio"<?php if (isset($_SESSION['fr_skad'])) {if($_SESSION['fr_skad'] == "radio") {echo 'selected="selected"';unset($_SESSION['fr_skad']);}}  ?>>Reklama w Radiu</option>
										<option value="polecenie"<?php if (isset($_SESSION['fr_skad'])) {if($_SESSION['fr_skad'] == "polecenie") {echo 'selected="selected"';unset($_SESSION['fr_skad']);}}  ?>>Z polecenia znajomych</option>
										<option value="inne"<?php if (isset($_SESSION['fr_skad'])) {if($_SESSION['fr_skad'] == "inne") {echo 'selected="selected"';unset($_SESSION['fr_skad']);}}  ?>>Inne...</option>
									</select>
								</div>
							</div>

					<!--Regulamin-->	
						<div class="rejdiv_inp">
							<div class="regulations">
								<label for="regulamin" class="title">Zaakceptuj <a href="../regulamin/" class="reg">regulamin</a> </label>
									<input type="checkbox" class="inp rej_cbx" name="regulamin" <?php
											if(isset($_SESSION['fr_regulamin']))
											{
												do{echo "checked" ;unset($_SESSION['fr_regulamin']);}while (isset($_SESSION['fr_regulamin']));
											} 
										?>/>
										<?php
											if(isset($_SESSION['e_regulamin']))
												{
													do{echo  '<div class="error">'.$_SESSION['e_regulamin'].'</div>';unset($_SESSION['e_regulamin']);}while (isset($_SESSION['e_regulamin']));
												} ?>
							</div>
						</div>
								
					<!--Recaptcha-->		
						<div class="rejdiv_inp">
							<div class="g-recaptcha" data-sitekey="6LdGKCIUAAAAAPkJ9mZG5OBWabq_OVfuyWzYIiWN"></div>
						</div>
						<?php
									if(isset($_SESSION['e_bot']))
										{
											do{echo  '<div class="error">'.$_SESSION['e_bot'].'</div>';unset($_SESSION['e_bot']);}while (isset($_SESSION['e_bot']));
										}?>
							
						<div class="button-div">
							<input class="button-green" type="submit" value="Zarejestruj się" class="sub rej_sub"/>
						</div>
					</form>
					
					<div class="account">			
						<h5>Masz już konto w IGU ?</h5>
						<div class="button-div"><a href="../logowanie/zaloguj.php">
							<button class="button-red">Zaloguj się</button>
						</a></div>
					</div>
					
					<div style="clear:both"></div>
					
					<!--nie wszystkie pola wypełnione-->
					<?php 
						if(isset($_SESSION['sprawdz']))
							{
								do{echo $_SESSION['sprawdz'];unset($_SESSION['sprawdz']);}while (isset($_SESSION['sprawdz']));
							} 
					?>
					
			</article>
			<!--Panel rejestracji-->
		
		<?php
	include_once '../szablon/stopka.php';
	?>