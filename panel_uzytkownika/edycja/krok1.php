<html lang="pl">
	<head>
	<script src="../jquery-3.2.1.min.js"></script>
	</head>
	<body>
		<div class="edit_container">
		
		<h4>Edycja profilu krok 1 z 3</h4>
		
		<form>
			<fieldset>
				<legend>Wskarz swoją osobowość prawną</legend>
				<div class="edit_label">
					<label for="osoba" id="osoba_lb" class="type">Osoba<input type="radio" name="osobowosc" id="osoba" value="1"/></label>
					<label for="firma" id="firma_lb" class="type">Firma<input type="radio" name="osobowosc" id="firma" value="2"/></label>
				</div>
				<div class="blad">
				</div>
				<div class="button-div">
					<input class="next button-green" data-content="krok2" value="Dalej  >>"/>
				</div>
			</fieldset>
		</form>
		
		</div>
		
	</body>
	<script type="text/javascript">
	
	$(".pu_content .edit_container #osoba_lb").click(function(e)
	{
		document.getElementById('osoba_lb').classList.add('activetype');
		document.getElementById('firma_lb').classList.remove('activetype');
	});
	
	$(".pu_content .edit_container #firma_lb").click(function(e)
	{
		document.getElementById('firma_lb').classList.add('activetype');
		document.getElementById('osoba_lb').classList.remove('activetype');
	});
	
	var osobowosc="<?php echo @$_SESSION['osobowosc']; ?>";
	zaznacz_osobowosc(osobowosc);
	
		var osoba=false;
	
		var info = 
	{
		content: "krok1",
	}
		$(".pu_content .edit_container .next").click(function(e)
		{
			var content = $(this).data("content");

			if(info.content != content)
			{
				wyslij();
				if(osoba!=false){
					setTimeout(function(){loadContent(content);},100);
				}
			}
		});
		//po kliknięciu submit wyślij dane do walidacji i przejdź do następnego kroku
		
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
	//ładowanie kolejnego kroku
	
	function przetowrz()
		{
			with(document.getElementById('osoba'))if(checked)return(value)
			with(document.getElementById('firma'))if(checked)return(value)
				else return(false);
		}
	//sprawdzanie zaznaczenia radio i zwracanie jego wartości
	
	function wyslij()
	{ 
		osoba = przetowrz();
		if(osoba!=false){
			$.ajax
			({  
				type: 'POST',  
				url: 'edycja/edycja_skrypt1.php',
				data: {osobowosc1: osoba}
			}).always(function()
				{
				});
		}
		else{
			document.querySelector(".blad").innerHTML="<p>Proszę wybrać osobowość!</p>"
		}
	}
	//wysyłanie danych do formulaża
	function zaznacz_osobowosc(osobowosc){
		if(osobowosc!=""){
			if(osobowosc==1){
				document.getElementById('osoba_lb').classList.add('activetype');
				document.getElementById('osoba').checked=true;
			}
			else if(osobowosc==2){
				document.getElementById('firma_lb').classList.add('activetype');
				document.getElementById('firma').checked=true;
			}
		}
	}
	</script>
</html>








