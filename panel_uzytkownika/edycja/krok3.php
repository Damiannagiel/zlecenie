<html lang="pl">
	<head>
	</head>
	<body>
		<div class="edit_container2">

		
			<h4>Edycja profilu krok 3 z 3</h4>
		
			<form>
				<fieldset>
					<legend>opisz siebie bądź swoją działalność:</legend>
					<textarea name="opis" id="opis" style="background-color:<?php echo $_SESSION['color_opis'];unset($_SESSION['color_opis']);?>"><?php echo $_SESSION['opis'];?></textarea>
					<div class="button-div">
						<input class="next button-green" data-content="krok2" value="<<  Wróć"/>
						<input class="next button-red" data-content="zapisane" value="Zapisz"/>
					</div>
				</fieldset>
			</form>

		</div>
			
		
	</body>
	<script type="text/javascript">
	
	var info = 
	{
		content: "krok3",
	}
		$(".pu_content .edit_container2 .next").click(function(e)
		{
			var content = $(this).data("content");
			
			if(info.content != content)
			{	
				wyslij();
				setTimeout(function(){loadContent(content);},100)
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
		var opis = document.getElementById('opis').value
		
		$.ajax
		({  
			type: 'POST',  
			url: 'edycja/edycja_skrypt.php',
			data: {opis: opis}
		}).always(function()
			{
				
			});
	}
	//wysyłanie danych do formulaża
</script>
</html>








