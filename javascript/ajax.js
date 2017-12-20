function loadContent(content, url, co)
	{
		$.ajax
				({
					url: url,
					type: 'post',
					data: {Content : content},
						success: function(response)
						{
							$(co).html(response);
							info.content = content;
						}
				});
	}
	//ładowanie kolejnego kroku
	
	function przetowrz(id1,id2)
		{
			with(document.getElementById(id1))if(checked)return(value)
			with(document.getElementById(id2))if(checked)return(value)
		}
	//sprawdzanie zaznaczenia radio i zwracanie jego wartości
	
	function wyslij(url,gdzie,id1,id2)
	{ 
		var sprawdz = przetowrz(id1,id2);
		
		$.ajax
		({  
			type: 'POST',  
			url: url,
			data: {gdzie: sprawdz}
		}).always(function()
			{
			});
	}
	//wysyłanie danych do formulaża
	
	
	