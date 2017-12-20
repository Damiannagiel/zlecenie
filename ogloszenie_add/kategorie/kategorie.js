function load_kat3(value,kat2)
{
	$.ajax
				({
					url: 'kategorie/loader_'+kat2+'.php',
					type: 'post',
					data: {Content : value},
						success: function(response)
						{
							$('#kat3_div').html(response);
						}
				});
}

function load_inne(value)
{
	$.ajax
				({
					url: 'kategorie/loader_inne.php',
					type: 'post',
					data: {Content : value},
						success: function(response)
						{
							$('#kat3_div').html(response);
						}
				});
}