	function wyswietl_wiadomosci(wiadomosci,user,adresat_name,ogl_tytul){
		//sprawdź kto jest adresatem wiadomości
		if(wiadomosci[0]['id_nadawcy']==user){
			var adresat = wiadomosci[0]['id_adresata'];
		}
		else{
			var adresat = wiadomosci[0]['id_nadawcy'];
		}
		//zaznacz wybraną konwersację
		//wyświetl nagłówek
		var naglowek=wyswietl_naglowek(ogl_tytul,adresat_name,wiadomosci[0]['id_ogloszenia'],adresat);
		var message=document.querySelector("#message");
		document.querySelector("#inbox").appendChild(naglowek);
		for(i=0;i<wiadomosci.length;i++){
			var wyswietl=wyswietl_wiadomosc(wiadomosci[i],user);
			message.appendChild(wyswietl);
		}
		wyswietl_wyslij(user,adresat,wiadomosci[0]['id_ogloszenia'],naglowek);
	}
	
	function wyswietl_wyslij(user,adresat,ogloszenie,naglowek){
		//dostań sie do formularza
		var send=document.getElementById('send_message');
		send.innerHTML='';
		//utwórz input
		var input=document.createElement('input');
		input.setAttribute("class","send");
		input.setAttribute("type","text");
		input.setAttribute("name","send");
		//utwórz button
		var button=document.createElement('button');
		button.setAttribute("id","send_button");
		button.setAttribute("class","button-green");
		button.setAttribute("onclick",'wyslij_wiadomosc('+user+','+adresat+','+ogloszenie+');');
		button.appendChild(document.createTextNode("Wślij"));
		//dodaj input i button
		send.appendChild(input);
		send.appendChild(button);
	}
	
	function wyswietl_wiadomosc(wiadomosc,user){
		if(wiadomosc['id_nadawcy']==user){
			var clas="right";
			var avatar='';
		}
		else{
			var clas="left";
			var avatar='../../public_profile/avatar/'+wiadomosc['id_nadawcy']+'.jpg';
		}
		
		var element = document.createElement('div');
		element.setAttribute("class", clas);
		
		var p = document.createElement('p');
		var span = document.createElement('span');
		
		p.appendChild(document.createTextNode(wiadomosc['tresc']));
		span.appendChild(document.createTextNode(wiadomosc['data']));
		
		if((wiadomosc['odczytana']==0)&&(clas=="right")){
			p.setAttribute("class", "unread");
		}

		element.appendChild(p);
		if(wiadomosc['id_nadawcy']!=user){
			var img = document.createElement('img');
			img.src='../../public_profile/avatar/'+wiadomosc['id_nadawcy']+'.jpg';
			element.appendChild(img);
		}
		element.appendChild(span);
		
		return element;
	}
	
	function wyslij_wiadomosc(user,adresat,ogloszenie){
		var tresc=document.getElementsByName('send')[0].value;
		$.ajax
				({
					url: 'wyslij_wiadomosc.php',
					type: 'post',
					data: {ogloszenie:ogloszenie , adresat:adresat , user:user , tresc:tresc},
					success: function(response)
						{
							
						}
				});
	}
	
	function wyswietl_naglowek(ogloszenie,adresat,id_ogloszenia,id_adresata){
		var href=ogloszenie_link(ogloszenie,id_ogloszenia);
		
		var div=document.createElement('div');
		div.setAttribute("class","header_message");
		
		var h5=document.createElement('h5');
		h5.appendChild(document.createTextNode('Korespondencja z '));
		var a_user=document.createElement('a');
		a_user.setAttribute("href",'../../public_profile/user.php?id='+id_adresata);
		a_user.appendChild(document.createTextNode(adresat));
		h5.appendChild(a_user);
		
		
		var p = document.createElement('p');
		p.appendChild(document.createTextNode('dotycząca ogłoszenia '));
		var a_ogl=document.createElement('a');
		a_ogl.setAttribute("href",href);
		a_ogl.appendChild(document.createTextNode(ogloszenie));
		p.appendChild(a_ogl);
		
		div.appendChild(h5);
		div.appendChild(p);
		
		
		return div;
	}
	
	//??
	//usuń polskie ogonki i zastąp spacje _
	function ogloszenie_link(adres,id){
		adres = adres.replace(/ą/ig,'a');
		adres = adres.replace(/ć/ig,'c');
		adres = adres.replace(/ę/ig,'e');
		adres = adres.replace(/ł/ig,'l');
		adres = adres.replace(/ń/ig,'n');
		adres = adres.replace(/ó/ig,'o');
		adres = adres.replace(/ś/ig,'s');
		adres = adres.replace(/ź/ig,'z');
		adres = adres.replace(/ż/ig,'z');
		adres = adres.replace(/Ą/ig,'A');
		adres = adres.replace(/Ć/ig,'C');
		adres = adres.replace(/Ę/ig,'E');
		adres = adres.replace(/Ł/ig,'L');
		adres = adres.replace(/Ń/ig,'N');
		adres = adres.replace(/Ó/ig,'O');
		adres = adres.replace(/Ś/ig,'S');
		adres = adres.replace(/Ź/ig,'Z');
		adres = adres.replace(/Ż/ig,'Z');
		adres = adres.replace(/ /ig,'_');
		
		var zwroc='../../ogloszenie/'+adres+'_'+id+'.php';
		return zwroc;
	}
	
	
/*
	function odejmij_dni(ile){
		var cd = new Date();
		var rok=cd.getFullYear();
		var miesiac=(cd.getMonth()+1);
		var dzien=(cd.getDate()-ile);
		if(dzien<=0){
			miesiac-=1;
		}
	}
	
	function sprawdz_date(data){
		var kiedy=data.substring(0,9);
		var godzina=data.substring(10);
		var cd = new Date();
		var rok=cd.getFullYear();
		var miesiac=(cd.getMonth()+1);
		var dzien=cd.getDate();
		
		if(dzisiaj==kiedy){
			var nowa_data='Dzisiaj '+godzina;
		}
	}
*/