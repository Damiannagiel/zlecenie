<!DOCTYPE HTML>
<html lang="pl">
<head>
        <title>Logowanie - igu.com.pl</title>
	
	<meta name="description" content="igu.com.pl - to platforma ogłoszeniowa dla usługodawców i zleceniodawców. Tutaj znajdziesz wykonawcę swojej usługi w każdej branży, a także klientów szukających kogoś takiego jak ty!"/>
	<link href="logowanie.css" type="text/css" rel="stylesheet"/>
	<?php 
            $DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
            include ($DOCUMENT_ROOT.'/../ini/class/classFeedback.php');
            include ($DOCUMENT_ROOT.'/../ini/class/classMyError.php');
            session_start();
            include_once '../szablon/nav_head.php'; 
        ?>
</head>

    <?php
	include_once '../szablon/nav_body.php';
	?>
	
	<!--Panel logowania-->
	<aside>
		<img class="low" src="../img/320x100.jpeg"/>
		<img class="medium"src="../img/728x90.jpg"/>
		<div>
			<img class="large" src="../img/320x250.jpg"/>
		</div>
	</aside>
            <article>
		<form class="login" action="skrypt_logowanie.php" method="post">
			<h2>Logowanie</h2>
			<?php if(isset($_SESSION['juz_zweryfikowany'])){echo $_SESSION['juz_zweryfikowany']; unset($_SESSION['juz_zweryfikowany']);}
						if(isset($_SESSION['zweryfikowano'])){echo $_SESSION['zweryfikowano']; unset($_SESSION['zweryfikowano']);}
						if(isset($_SESSION['udanarejestracja'])&&($_SESSION['udanarejestracja']==true)){echo '<div class="zapisano"><p>Rejestracja przebiegła pomyślnie!<br/>Teraz możesz się zalogować.</p></div>';}?>
                        <div class="feedback"><?php
                // jeżeli obiekt przechowujący błedy istnieje w sesji
                // wyświetl błędy
                if(isset($_SESSION['feedback'])){
                    FeedbackPresent::viewFeedback($_SESSION['feedback']);
                    unset($_SESSION['feedback']);
                }
            ?></div>
								
			<div class="form-user">
				<label for="login">Login: </label>
				<div class="imput-text">
					<input type="text" name="login" placeholder="Login"/>
					<p class="log_blad"><?php
					if(isset($_SESSION['blad'])) 
					{
						echo $_SESSION['blad']; 
						unset ($_SESSION['blad']);
					}
				?></p>
				</div>
			</div>
			<div class="form-user">
				<label  for="haslo">Hasło: </label>
				<div class="imput-text">
					<input type="password" name="haslo" placeholder="Hasło"/>
					<div>
						<a href="reset_pass.php"><p>Zapomniałem hasła</p></a>
					</div>
				</div>
			</div>
						
			<div>
				<div class="button-div">
					<input class="button-green" type="submit" value="Zaloguj się" class="button">
				</div>
				<div class="no-account">
					<p>Nie posiadasz jeszcze konta na igu?</p>
					<p><a href="../rejestracja/zarejestruj.php">Zarejestruj się</a></p>
				</div>
			</div>
					
		</form>
            </article>
            
            <article>
		<div class="reg">
			<h5>Jeszcze nie posiadasz konta w IGU ?</h5>
			<div class="button-div"><a href="../rejestracja/zarejestruj.php">
				<button class="button-red">Zarejestruj się</button>
			</a></div>
		</div>
		
		<div style="clear:both"></div>
            </article>
	
            <article class="news">
		<header><h4>Aktualności</h4></header>
		<ul>
			<li><span>2017-10-07:</span> <a href="#">Zmiana w kilku podpunktach regulaminu!! prosimy  zapoznanie się!</a></li>
			<li><span>2017-10-06:</span> <a href="#">Druki Artykuł również przykładowy</a></li>
			<li><span>2017-10-04:</span> <a href="#">Pierszy przykładowy artykuł</a></li>
		</ul>
            </article>
			<!--Panel logowania-->
		
	<?php
	include_once '../szablon/stopka.php';
	?>