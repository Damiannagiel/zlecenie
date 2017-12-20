<html lang="pl">
	<body>
		<div class="user_firma">
		
			<div class="user_user">
				<h3><?php echo $_SESSION['user']?></h3>
				<p>Jest z nami od: <?php echo $_SESSION['dolaczyl'] ?></p>
			</div>
			
			<?php
			if(isset($_SESSION['zapisano']))
			{
				echo '<div class="zapisano"><p>Zmiany zostały zapisane pomyślnie!</p></div>';
				unset($_SESSION['zapisano']);
			}
			if(isset($_SESSION['usunieto']))
			{
				echo '<div class="zapisano"><p>'.$_SESSION['usunieto'].'</p></div>';
				unset($_SESSION['usunieto']);
			}
			if(isset($_SESSION['autoryzuj']))
			{
				echo '<div class="blad_div">
				<p>Adres e-mail <b>'.$_SESSION['email'].'</b> nie został zweryfikowany!<br/> Aby w pełni cieszyć się możliwościami serwisu wpisz kod weryfikacyjny w poniższe pole bądź kliknij link aktywacyjny dołączony do wiadomości powitalnej.</p>
				<form action="../rejestracja/potwierdz_email.php" method="get">
					<input type="hidden" name="login" value="'.$_SESSION['user'].'"/>
					Twój kod weryfikacyjny: <input type="text" name="potwierdz"/> <input type="submit"/>
					
				</form>
				
			</div>';
				unset($_SESSION['autoryzuj']);
			}
			?>

			<div class='box user_info'>
				<h4>Podstawowe informacje</h4>
				<div><span class="info">Osobowość prawna:</span> <span class="value">Firma</span></div>
				<div><span class="info">Nazwa firmy:</span> <span class="value"><?php echo $_SESSION['imie']?></span></div>
				<div><span class="info">Lokalizacja:</span> <span class="value"><?php echo $_SESSION['miejscowosc']?> (woj.<?php echo $_SESSION['wojewodztwo']?>)</span></div>
				<div><span class="info">Na rynku od:</span> <span class="value"><?php echo $_SESSION['na_rynku'] ?></span></div>
				<div><span class="info">Ostatnie logowanie:</span> <span class="value"><?php echo $_SESSION['ostatnio'] ?></span></div>
			</div>
			
			<div class="box user_contact">
				<h4>Kontkt</h4>
				<div><span class="info">E-mail:</span> <span class="value"><?php echo $_SESSION['email']?></span></div>
			</div>
			
			<div style="clear:both;"></div>
			
			<div class="box user_opis">
				<h4>Opis działalności</h4>
				<p><?php echo $_SESSION['opis']?></p>
			</div>
			
		</div>
		
	</body>
</html>








