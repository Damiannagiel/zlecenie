<html lang="pl">
	<head>
	</head>
	<body>
		<div class="edit_container2">
		
			<h4>Edycja profilu krok 2 z 3</h4>
			
			<form>
				<fieldset>
					<legend>Podstawowe informacje o tobie</legend>
					<div class="edit_input">
							<label for="imie" class="edit_tytul">Imię: </label>
							<input type="text" name="imie" id="imie" style="background-color:<?php echo $_SESSION['color_imie']; unset($_SESSION['color_imie']);?>" value="<?php echo $_SESSION['imie'];?>"/>
						</div>
						<div class="edit_input">
							<label for="nazwisko" class="edit_tytul">Nazwisko: </label>
							<input type="text" name="nazwisko" id="nazwisko" style="background-color:<?php echo $_SESSION['color_nazwisko'];unset($_SESSION['color_nazwisko']);?>" value="<?php echo $_SESSION['nazwisko'];?>"/>
						</div>
						<div class="edit_input">
							<label for="miejscowosc" class="edit_tytul">Miejscowość: </label>
							<input type="text" name="miejscowosc" id="miejscowosc" style="background-color:<?php echo $_SESSION['color_miejscowosc'];unset($_SESSION['color_miejscowosc']);?>" value="<?php echo $_SESSION['miejscowosc'];?>"/>
						</div>
						<div class="edit_input">
							<label for="telefon" class="edit_tytul">Województwo: </label>
							<select name="wojewodztwo" id="wojewodztwo" style="background-color:<?php echo $_SESSION['color_woj'];unset($_SESSION['color_woj']);?>">
								<option value=""></option>
								<option id="dolnośląskie" value="dolnośląskie">dolnośląskie</option>
								<option id="kujawsko-pomorskie" value="kujawsko-pomorskie">kujawsko-pomorskie</option>
								<option id="lubelskie" value="lubelskie">lubelskie</option>
								<option id="lubuskie" value="lubuskie">lubuskie</option>
								<option id="łódzkie" value="łódzkie">łódzkie</option>
								<option id="małopolskie" value="małopolskie">małopolskie</option>
								<option id="mazowieckie" value="mazowieckie">mazowieckie</option>
								<option id="opolskie" value="opolskie">opolskie</option>
								<option id="podkarpackie" value="podkarpackie">podkarpackie</option>
								<option id="podlaskie" value="podlaskie">podlaskie</option>
								<option id="pomorskie" value="pomorskie">pomorskie</option>
								<option id="śląskie" value="śląskie">śląskie</option>
								<option id="świętokrzyskie" value="świętokrzyskie">świętokrzyskie</option>
								<option id="warmińsko-mazurskie" value="warmińsko-mazurskie">warmińsko-mazurskie</option>
								<option id="wielkopolskie" value="wielkopolskie">wielkopolskie</option>
								<option id="zachodniopomorskie" value="zachodniopomorskie">zachodniopomorskie</option>
							</select>
						</div>
						<div class="edit_input">
							<label for="wiek" class="edit_tytul">Rok urodzenia: </label>
							<input type="text" name="wiek" id="wiek" style="background-color:<?php echo $_SESSION['color_wiek'];unset($_SESSION['color_wiek']);?>" value="<?php echo $_SESSION['na_rynku'];?>"/>
						</div>
						<div class="edit_input">
							<label for="email" class="edit_tytul">E-mail kontaktowy: </label>
							<input type="text" name="email" id="email" style="background-color:<?php echo $_SESSION['color_email'];unset($_SESSION['color_email']);?>" value="<?php echo $_SESSION['email'];?>"/>
						</div>
						<div class="button-div">
							<input class="next button-green" data-content="krok1" value="<<  Wróć"/>
							<input class="next button-green" data-content="krok3" value="Dalej  >>"/>
						</div>
				</fieldset>
			</form>	
		</div>
			
		</div>
		
	</body>
		<script type="text/javascript">
		
	var woj="<?php echo @$_SESSION['wojewodztwo'] ?>";
	zaznacz_woj(woj);
	
	var info = 
	{
		content: "krok2",
	}
		$(".pu_content .edit_container2 .next").click(function(e)
		{
			var content = $(this).data("content");
			
			if(info.content != content)
			{	
				wyslij();
				loadContent(content);
			}
		});
		
	function loadContent(content)
	{
		$.ajax
				({
					url: 'loader.php',
					type: 'post',
					data: {Content : content},
						success: function(response)
						{
							$(".pu_content").html(response);
							info.content = content;
						}
				});
	}
	
	function wyslij()
	{ 
		var imie = document.getElementById('imie').value
		var nazwisko = document.getElementById('nazwisko').value
		var miejscowosc = document.getElementById('miejscowosc').value
		var wiek = document.getElementById('wiek').value
		var email = document.getElementById('email').value
		var wojewodztwo = document.getElementById('wojewodztwo').value
		$.ajax
		({  
			type: 'POST',  
			url: 'edycja/edycja_skrypt2.php',
			data: {imie: imie, nazwisko: nazwisko, miejscowosc: miejscowosc, wiek: wiek, email: email, wojewodztwo: wojewodztwo}
		}).always(function()
			{
				
			});
	}
	//wysyłanie danych do formulaża
	
	function zaznacz_woj(woj){
		if(woj!=""){
			document.getElementById(woj).selected=true;
		}
	}
	
	
	
	</script>
	
	
	
</html>








