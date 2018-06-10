<html lang="pl">
	<body>
		<div class="user_firma">
		
			<div class="user_user">
				<h3><?php echo $_SESSION['user']?></h3>
				<p>Jesteś z nami od: <?php echo $_SESSION['dolaczyl'] ?></p>
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
                         if(isset($_SESSION['max_ogloszen'])){
                            echo '<div class="blad_div" style="margin-bottom:5px;"><p>'.$_SESSION['max_ogloszen'].'</p></div>';
                            unset($_SESSION['max_ogloszen']);
                        }
			if(isset($_SESSION['autoryzuj']))
			{
                            if(isset($_SESSION['weryfikacja_ogloszenie'])){
                                    echo '<div class="blad_div" style="margin-bottom:5px;"><p>'.$_SESSION['weryfikacja_ogloszenie'].'</p></div>';
                                    unset($_SESSION['weryfikacja_ogloszenie']);
                            }
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
				<div><span class="info">Osobowość prawna:</span> <span class="value"><?php if(($_SESSION['osobowosc']==1))echo "Osoba fizyczna";else echo"";?></span></div>
				<div><span class="info">Nazywam się:</span> <span class="value"><?php echo $_SESSION['imie'].' '.$_SESSION['nazwisko'] ?></span></div>
				<div><span class="info">Lokalizacja:</span> <span class="value"><?php echo $_SESSION['miejscowosc']?> (woj.<?php echo $_SESSION['wojewodztwo']?>)</span></div>
				<div><span class="info">Wiek:</span> <span class="value"><?php echo $_SESSION['wiek'] ?></span></div>
				<div><span class="info">Ostatnie logowanie:</span> <span class="value"><?php echo $_SESSION['ostatnio'] ?></span></div>
			</div>
			
			<div class="box user_contact">
				<h4>Kontkt</h4>
				<p>E-mail: <?php echo $_SESSION['email']?></p>
			</div>
			
			<div style="clear:both;"></div>
			
			<div class="box user_opis">
				<h4>Opis działalności</h4>
				<p><?php echo nl2br($_SESSION['opis']);?></p>
			</div>
			
		</div>
		
	</body>
</html>




