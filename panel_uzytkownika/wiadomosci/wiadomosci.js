	function wyswietl_wiadomosci(wiadomosci,user,adresat_name,ogl_tytul,avatar,ile,wiecej){
		//sprawdź kto jest adresatem wiadomości
		if(wiadomosci[0]['id_nadawcy']==user){
			var adresat = wiadomosci[0]['id_adresata'];
		}
		else{
			var adresat = wiadomosci[0]['id_nadawcy'];
		}
		//wyświetl nagłówek
		var naglowek=wyswietl_naglowek(ogl_tytul,adresat_name,wiadomosci[0]['id_ogloszenia'],adresat);
		var message=document.querySelector("#message");
                //sprawdź czy jest więcej wiadomości niż pobrano
                if(wiecej==true){
                    var wyswietl_wiecej=add_wiecej(user,adresat,wiadomosci[0]['id_ogloszenia'],1);
                    message.appendChild(wyswietl_wiecej);
                }
		document.querySelector(".message_info").appendChild(naglowek);
		for(i=ile-1;i>=0;i--){
			var wyswietl=wyswietl_wiadomosc(wiadomosci[i],user,avatar);
			message.appendChild(wyswietl);
		}
		wyswietl_wyslij(user,adresat,wiadomosci[0]['id_ogloszenia']);
	}
        	
	function wyswietl_wyslij(user,adresat,ogloszenie){
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
	
	function wyswietl_wiadomosc(wiadomosc,user,avatar_exist){
		if(wiadomosc['id_nadawcy']==user){
			var clas="right";
			var avatar='';
		}
		else{
                    var clas="left";
                    if(avatar_exist==1){
                        var avatar='../../public_profile/avatar/'+wiadomosc['id_nadawcy']+'.jpg';
                    }
                    else{
                        var avatar='../../public_profile/avatar/avatar.png';
                    }
		}
		
		var element = document.createElement('div');
		element.setAttribute("class", clas);
		
		var span_p = document.createElement('span');
                span_p.setAttribute("class","text_ms");
		var span = document.createElement('span');
                span.setAttribute("class","date");
		
		span_p.appendChild(document.createTextNode(wiadomosc['tresc']));
		span.appendChild(document.createTextNode(wiadomosc['data']));
		
		if((wiadomosc['odczytana']==0)&&(clas=="right")){
			span_p.classList.add("unread");
		}

		if(wiadomosc['id_nadawcy']!=user){
			var img = document.createElement('img');
			img.src=avatar;
			element.appendChild(img);
		}
		element.appendChild(span_p);
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
                var ms_info=document.querySelector('.message_info');
		ms_info.innerHTML='';
                
		var href=ogloszenie_link(ogloszenie,id_ogloszenia);
		
		var div=document.createElement('div');
		
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

function wyswietl_bez_wiadomosci(ogl_tytul,adresat_name,ogloszenie,adresat,user){
    var naglowek=wyswietl_naglowek(ogl_tytul,adresat_name,ogloszenie,adresat);
    var message=document.querySelector("#message");
    document.querySelector(".message_info").appendChild(naglowek);
    wyswietl_wyslij(user,adresat,ogloszenie);
}

function add_wiecej(user,adresat,ogloszenie,petla){
    var div=document.createElement('div');
    div.setAttribute("id","more"+petla);
    div.setAttribute("class","more");
    
    var icon=document.createElement('i');
    icon.setAttribute("class","icon-plus-squared-alt");
    icon.setAttribute("onclick",'wyswietl_starsze('+user+','+adresat+','+ogloszenie+','+petla+');');
    div.appendChild(icon);
    return div;
}

function wyswietl_starsze(user,adresat,ogloszenie,petla){
  var limit_calc=25*petla;
  
  var limit=limit_calc+','+limit_calc;
  
  $.ajax({
    url: 'pobierz_wiecej.php',
    type: 'post',
    data: {ogloszenie:ogloszenie , adresat:adresat , user:user , limit:limit , petla:petla},
    success: function(response){
      $("#more"+petla).html(response);
    }
  });
}

function wyswietl_wiecej_wiadomosci(wiadomosci,user,adresat,avatar,ile,wiecej,petla){
    var selector ="#more"+petla;
    var message=document.querySelector(selector);
    //sprawdź czy jest więcej wiadomości niż pobrano
    if(wiecej==true){
        var wyswietl_wiecej=add_wiecej(user,adresat,wiadomosci[0]['id_ogloszenia'],petla+1);
        message.appendChild(wyswietl_wiecej);
    }
    for(i=ile-1;i>=0;i--){
        var wyswietl=wyswietl_wiadomosc(wiadomosci[i],user,avatar);
        message.appendChild(wyswietl);
    }
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