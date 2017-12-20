//pusta zmienna zapobiegająca powstawaniu błędów podczas wyboru lokalizacji
var kat_js="";
		
//funkcja ładująca drugi poziom kategorii
//przyjmuje nazwę wybranej kaegorii
function load_kat2(content,kat2,kat3)//budowlanka instalacje elektryczne
{
	$.ajax
			({
				url: '../ogloszenie_add/loader_kat2.php',
				type: 'post',
				data: {Content : content},
					success: function(response)
					{
						$('#kat2_div').html(response);
						document.getElementById('kat3_div').innerHTML="";
						if(kat2){
							if(kat2=="inne"){
								$('#kat2_div #inne').attr({selected: "selected"});
							}
							else{
								document.getElementById(kat2).selected=true;
							}
							if(kat3){
								load_kat3(kat2,content,kat3)
							}
						}
					}
			});
}
		
//funkcja ładująca trzeci poziom kategorii
//przyjmuje nazwę wybranej kaegorii(value) nazwę kategori drugiej(kat2)
function load_kat3(value,kat2,kat3)
{
	$.ajax
				({
					url: '../ogloszenie_add/kategorie/loader_'+kat2+'.php',
					type: 'post',
					data: {Content : value},
						success: function(response)
						{
							$('#kat3_div').html(response);
							if(kat3){
								if(kat3=="inne"){
									$('#kat3_div #inne').attr({selected: "selected"});
								}
								else{
									document.getElementById(kat3).selected=true;
								}
							}
						}
				});
}
		
//funkcja ładująca puste pole w miejsce 3 poziomu kategorii jeżeli kategoria go nie posiada
//
function load_inne(value)
{
	$.ajax
				({
					url: '../ogloszenie_add/kategorie/loader_inne.php',
					type: 'post',
					data: {Content : value},
						success: function(response)
						{
							$('#kat3_div').html(response);
						}
				});
}
		
//funkcja otwierająca i zamykająca zakładkę z inputami do filtracji ogłoszeń
//przyjmuje id klikniętej zakładki
function expand(id)
{
	var div=document.getElementById(id);
	div.classList.toggle("active");
			
	var icon=document.getElementById("icon_"+id);
	icon.classList.toggle("icon-minus-squared-alt");
	icon.classList.toggle("icon-plus-squared-alt");	
}
		
//funkcja zmieniająca wygląd przycisków "typ ogłoszenia"
$("#type .label").click(function(e)
{
	$(".label_active").removeClass("label_active").addClass("label_no_active");
	$(this).removeClass("label_no_active").addClass("label_active");
});
		
//funkcja zmieniająca wygląd przycisków "rodzaj działalności"
$("#personality .person").click(function(e)
{
	$(".person_active").removeClass("person_active").addClass("person_no_active");
	$(this).removeClass("person_no_active").addClass("person_active");
});
		
//funkcja ładująca listę powiatów wybranego województwa
//przyjmuje nazwę wybranego województwa
function load_pow(content)
{
	$.ajax
			({
				url: '../kategoria/mapa/loader.php',
				type: 'post',
				data: {woj : content},
					success: function(response)
					{
						$('#pow').html(response);
						document.getElementById("city").innerHTML="";
					}
			});
}
	
//funkcja tworząca inputa na nazwę miejcowości w wybranym powiecie
//przyjmuje nazwę klikniętego powiatu
function load_city(content)
{
	if(content=="all")
	{
		document.getElementById("pow").innerHTML="";
		document.getElementById("city").innerHTML="";
		return;
	}
	var miasta = ["Wrocław","Wałbrzych","Legnica","Bydgoszcz","Toruń","Włocławek","Grudziądz","Lublin","Zamość","Chełm","Biała Podlaska","Zielona Góra","Gorzów Wielkopolski","Łódź","Piotrków Trybunalski","Skierniewice","Kraków","Tarnów","Nowy Sącz","Warszawa","Radom","Płock","Siedlce","Ostrołęka","Opole","Rzeszów","Przemyśl","Tarnobrzeg","Krosno","Białystok","Suwałki","Łomża","Gdańsk","Gdynia","Słupsk","Sopot","Katowice","Częstochowa","Sosnowiec","Gliwice","Zabrze","Bielsko-Biała","Bytom","Ruda Śląska","Rybnik","Tychy","Dąbrowa Górnicza","Chorzów","Jaworzno","Jastrzębie-Zdrój","Mysłowice","Siemianowice Śląskie","Żory","Piekary Śląskie","Świętochłowice","Kielce","Olsztyn","Elbląg","Poznań","Kalisz","Konin","Leszno","Szczecin","Koszalin","Świnoujście","dolnośląskie","kujawsko-pomorskie","lubelskie","lubuskie","łódzkie","małopolskie","mazowieckie","opolskie","podkarpackie","podlaskie","pomorskie","śląskie","świętokrzyskie","warmińsko-mazurskie","wielkopolskie","zachodniopomorskie"];
	var ile = miasta.length;
	for(i=0;i<ile;i++)
	{
		if(content==miasta[i])
		{
			document.getElementById("city").innerHTML='<input type="hidden" name="place" value="'+miasta[i]+'"/>';
			return;
		}
	}
	document.getElementById("city").innerHTML='<input type="text" placeholder="miejscowość" name="place" class="inp" value="" onChange=\'search_location("place",this.value,"'+kat_js+'")\'/>';
}
	
//pusta funkcja zapobiegająca powstawaniu błędów podczas wyboru lokalizacji
function search_location(type,val,category){}
	
function only_img()
{
	document.getElementById("only_img").classList.toggle("active");
}

function contact(id)
{
	document.getElementById(id).classList.toggle("contact_active");
}

function load_pow2(content,place)
{
	var zasieg=content.split("_");
	if (typeof zasieg[1] != "undefined") 
	{
		$.ajax
			({
				url: '../kategoria/mapa/loader.php',
				type: 'post',
				data: {woj : zasieg[0]},
					success: function(response)
					{
						$('#pow').html(response);
						document.getElementById("city").innerHTML="";
						var woj=document.getElementById("woj");
						wybrane_selected(woj,zasieg[0],17);
						var pow=document.getElementById("pow");
						var ile= pow.getElementsByTagName("option").length;
						wybrane_selected(pow,zasieg[1],ile);
						load_city(zasieg[1]);
						if(place)
						{
							document.getElementsByName("place")[0].value=place;
						}
					}
			});
	}
	else
	{
		$.ajax
			({
				url: '../kategoria/mapa/loader.php',
				type: 'post',
				data: {woj : content},
					success: function(response)
					{
						$('#pow').html(response);
						document.getElementById("city").innerHTML="";
						var woj=document.getElementById("woj");
						wybrane_selected(woj,content,17);
					}
			});
	}
}

function wybrane_selected(gdzie,content,ile)
	{
		for(i=0;i<ile;i++)
		{
			var option=gdzie.getElementsByTagName("option")[i].value;
			if(option==content)
			{
				gdzie.getElementsByTagName("option")[i].selected=true;
			}
		}
	}

function onload_filter(categories)
{
	if(categories!=""){
		var filtry=categories.split("#");//rozdziel ciąg z filtrami na pojedyńcze filtry
		var ile=filtry.length;//policz ile wybrano kategorii
		for(i=1;i<ile;i++)
		{
			var filter=filtry[i].split("=");//rozdzielam filtr na kategorię i wartość
			var kategoria=filter[0];//kategoria
			var wartosc=filter[1];//wartość
			if(kategoria=="key"){
				document.getElementsByName("key")[0].value=wartosc;//wczytuję zawartość do klucza
			}
			else if(kategoria=="img"){
				only_img();//wciskam guzik "tylko ze zdjęciami"
				document.getElementsByName("img")[0].checked=true;//zaznaczam checkboxa
			}
			else if(kategoria=="kategoria"){
				var kategorie=wartosc.split(" > ");//rozdzielam kategorie na pojedyńcze
				if(kategorie[0]=="inne"){
					$('#kat1_div #inne').attr({selected: "selected"});//zaznaczam inne 1 kategorii
				}
				else{
					document.getElementById(kategorie[0]).selected=true;//zaznaczam wybraną kategorię
					if(kategorie.length==3){//jeżeli wybrano 3 kategorie 
						load_kat2(kategorie[0],kategorie[1],kategorie[2]);//ładuję 2 i 3
					}
					else if(kategorie.length==2){//jeżeli wybrano 3 kategorie 
						load_kat2(kategorie[0],kategorie[1]);//ładuję drugą kategorię
					}
				}
			}
			else if(kategoria=="type"){
				var element0=document.querySelector(".type_0");//dostaje się do label typu wszystko
				element0.classList.remove("label_active");//zabieram klasę active
				element0.classList.add("label_no_active");//dodaję klasę no_active
				var element=document.querySelector(".type_"+wartosc);//dostaje się do label zaznaczonego typu
				element.classList.remove("label_no_active");//zabieram klasę no_active
				element.classList.add("label_active");//dodaję klasę active
				document.getElementById("type_"+wartosc).checked=true;//zaznaczam ukrytego checkboxa
			}
			else if(kategoria=="lokalizacja"){
				if(filtry[i+1]){//jeżeli istnieje następny filtr
					var miasto=filtry[i+1].split("=");//podziel go na kategorie i wartość 
					if(miasto[0]=="place"){//jeżeli wartość to miasto
						place=miasto[1];
						load_pow2(wartosc,place);//załatuj powiat i inputa na miejcowość
					}
					else load_pow2(wartosc);
				}
				else load_pow2(wartosc);
			}
			else if(kategoria=="cena_od"){
				document.getElementsByName("cena_od")[0].value=wartosc;
			}
			else if(kategoria=="cena_do"){
				document.getElementsByName("cena_do")[0].value=wartosc;
			}
			else if(kategoria=="cena_za"){
				document.getElementById(wartosc).selected=true;
			}
			else if(kategoria=="person"){
				var element0=document.querySelector(".person_0");//dostaje się do label osobowosc wszystko
				element0.classList.remove("person_active");//zabieram klasę active
				element0.classList.add("person_no_active");//dodaję klasę no_active
				var element=document.querySelector(".person_"+wartosc);//dostaje się do label zaznaczonej osobowości
				element.classList.remove("person_no_active");//zabieram klasę no_active
				element.classList.add("person_active");//dodaję klasę active
				document.getElementById("pers_"+wartosc).checked=true;//zaznaczam ukrytego checkboxa
			}
			else if(kategoria=="phone"){
				document.getElementById("telefon").classList.add("contact_active");
				document.getElementsByName(kategoria)[0].checked=true;
			}
			else if(kategoria=="email"){
				document.getElementById("email").classList.add("contact_active");
				document.getElementsByName(kategoria)[0].checked=true;
			}
			else if(kategoria=="www"){
				document.getElementById("www").classList.add("contact_active");
				document.getElementsByName(kategoria)[0].checked=true;
			}
		}
	}
}
