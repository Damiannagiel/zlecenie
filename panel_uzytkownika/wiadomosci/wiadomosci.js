        function wyswietl_wiadomosci(wiadomosci,user,adresat_name,ogl_tytul,avatar,ile,wiecej){
		//sprawdź kto jest adresatem wiadomości
		if(wiadomosci[0]['sender']==user){
			var adresat = wiadomosci[0]['recipient'];
		}
		else{
			var adresat = wiadomosci[0]['sender'];
		}
		//wyświetl nagłówek
		var naglowek=wyswietl_naglowek(ogl_tytul,adresat_name,wiadomosci[0]['announcement'],adresat);
		var message=document.querySelector("#message");
                //sprawdź czy jest więcej wiadomości niż pobrano
                if(wiecej==true){
                    var wyswietl_wiecej=add_wiecej(user,adresat,wiadomosci[0]['announcement'],1);
                    message.appendChild(wyswietl_wiecej);
                }
		document.querySelector(".message_info").appendChild(naglowek);
                $(".options__ul").hide();//ukryj listę opcji
		for(i=ile-1;i>=0;i--){
			var wyswietl=wyswietl_wiadomosc(wiadomosci[i],user,avatar);
			message.appendChild(wyswietl);
		}
		wyswietl_wyslij(user,adresat,wiadomosci[0]['announcement']);
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
		if(wiadomosc['sender']==user){
			var clas="right";
			var avatar='';
		}
		else{
                    var clas="left";
                    if(avatar_exist==".png"){
                        var avatar='../../public_profile/avatar/'+wiadomosc['sender']+'.png';
                    }
                    else if(avatar_exist==".jpg"){
                        var avatar='../../public_profile/avatar/'+wiadomosc['sender']+'.jpg';
                    }
                    else {
                        var avatar='../../public_profile/avatar/avatar.png';
                    }
		}
		
		var element = document.createElement('div');
                element.classList.add("message");
                element.classList.add(clas);
		
		var span_p = document.createElement('span');
                span_p.setAttribute("class","text_ms");
                var span_dots = document.createElement('button');
                span_dots.setAttribute("class","options");
                var  span_del = document.createElement('span');
                span_del.setAttribute("class","delete");
                span_del.setAttribute("data-content",wiadomosc['id']);
		var span = document.createElement('span');
                span.setAttribute("class","date");
		
		span_p.appendChild(document.createTextNode(wiadomosc['contents']));
                span_dots.appendChild(document.createTextNode("..."));
                span_del.appendChild(document.createTextNode("Usuń"));
		span.appendChild(document.createTextNode(wiadomosc['date']));
		
		if((wiadomosc['displayed']==0)&&(clas=="right")){
			span_p.classList.add("unread");
		}

		if(wiadomosc['sender']!=user){
			var img = document.createElement('img');
			img.src=avatar;
			element.appendChild(img);
		}
                if(clas=="right"){
                    element.appendChild(span_del);
                    element.appendChild(span_dots);
                    element.appendChild(span_p);
                    element.appendChild(span);
                }
                else{
                    element.appendChild(span_p);
                    element.appendChild(span_dots);
                    element.appendChild(span_del);
                    element.appendChild(span);
                }
		
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
                
                var i=document.createElement('i');
                i.setAttribute("class","icon-cog");
                
                var options=document.createElement('ul');
                options.setAttribute("class","options__ul");
                options.setAttribute("data-content",id_ogloszenia+'/'+id_adresata);
                var li1=document.createElement('li');
                li1.appendChild(document.createTextNode("usuń wątek"));
                li1.setAttribute("class","deleted__ul");
//                var li2=document.createElement('li');
//                li2.appendChild(document.createTextNode("opcja2"));
                options.appendChild(li1);
//                options.appendChild(li2);
                
                
		
                ms_info.appendChild(i);
                ms_info.appendChild(options);
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
      $(".options").hide();
      $(".delete").hide();
      
      $("#message .message").hover(
            function(){//funkcja do wykonania po najechaniu myszą na element
                $(this).children(".options").show();//pokaż element opcje
                $(this).children(".options").click(function(){//jeżeli zostanie kliknięty element options
                    $(this).siblings(".delete").show();//pokż element delete
                });
            },
            function(){//funkcja do wykonania po opuszczeniu myszą elementu
                $(this).children(".options").hide();//ukryj element options
                $(this).children(".delete").hide();//ukryj element delete
            }
        );//koniec funkcji hover

        $(".delete").click(function(){
            var obiect=$(this);//pobierz obiekt wywołujący zdarzenie
            var id = obiect.attr("data-content");//pobieramy id ogłoszenia
            var _class = obiect.parent().attr("class");//pobieramy klasę ogłoszenia
            var reversal = _class.split(" ");//rozdziel klasę
            reversal = reversal_valid(reversal[1]);//ustal czy użytkownik jest nadawcą czy odbiorcą
            if(reversal!==false){
                deleted_valid(id, reversal, obiect);//jeżelu udało się ustalić stronę użytkownika przekż dane do PHP
            }
        });
    }
  });
}

function wyswietl_wiecej_wiadomosci(wiadomosci,user,adresat,avatar,ile,wiecej,petla){
    var selector ="#more"+petla;
    var message=document.querySelector(selector);
    //sprawdź czy jest więcej wiadomości niż pobrano
    if(wiecej==true){
        var wyswietl_wiecej=add_wiecej(user,adresat,wiadomosci[0]['announcement'],petla+1);
        message.appendChild(wyswietl_wiecej);
    }
    for(i=ile-1;i>=0;i--){
        var wyswietl=wyswietl_wiadomosc(wiadomosci[i],user,avatar);
        message.appendChild(wyswietl);
    }
}

function add_archives(){
    var message_info=document.querySelector(".message_info");
    var p=message_info.querySelector("p");
    var span=document.createElement("span");
    span.setAttribute("class","nawias");
    span.appendChild(document.createTextNode(' (zakończone)'));
    p.appendChild(span);
}

function deleted_account(){
    $("#message").append('<div class="blad_user"><p>Konto tego użytkownika zostało usunięte</p></div>');
//    $("#send").html('');
}

function window_height(){
    var height=$("#message_header .message_info").height();
    if(height>36){
        $("#content").addClass("max-height");
    }
    else{
        $("#content").removeClass("max-height");
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