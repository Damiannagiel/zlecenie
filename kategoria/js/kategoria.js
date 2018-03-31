function load_pow(content)
	{
		$.ajax
				({
					url: 'mapa/loader.php',
					type: 'post',
					data: {woj : content},
						success: function(response)
						{
							$('#pow').html(response);
							document.getElementById("city").innerHTML="";
						}
				});
	}
	
	function load_pow2(content,place)
	{
		var zasieg=content.split("_");
		if (typeof zasieg[1] != "undefined") 
		{
			$.ajax
				({
					url: 'mapa/loader.php',
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
					url: 'mapa/loader.php',
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
	
	function odczytaj_adres(adres)
	{
		adres = adres.replace(/%C4%85/ig,'ą');
		adres = adres.replace(/%C4%87/ig,'ć');
		adres = adres.replace(/%C4%99/ig,'ę');
		adres = adres.replace(/%C5%82/ig,'ł');
		adres = adres.replace(/%C5%84/ig,'ń');
		adres = adres.replace(/%C3%B3/ig,'ó');
		adres = adres.replace(/%C5%9B/ig,'ś');
		adres = adres.replace(/%C5%BA/ig,'ź');
		adres = adres.replace(/%C5%BC/ig,'ż');
		adres = adres.replace(/%C4%84/ig,'Ą');
		adres = adres.replace(/%C4%86/ig,'Ć');
		adres = adres.replace(/%C4%98/ig,'Ę');
		adres = adres.replace(/%C5%81/ig,'Ł');
		adres = adres.replace(/%C5%83/ig,'Ń');
		adres = adres.replace(/%C3%B2/ig,'Ó');
		adres = adres.replace(/%C5%9A/ig,'Ś');
		adres = adres.replace(/%C5%B9/ig,'Ź');
		adres = adres.replace(/%C5%BB/ig,'Ż');
		adres = adres.replace(/%20/ig,' ');
		return adres;
	}
        
        function usun_spacje(value)
        {
            value = value.replace(/%20/ig,'');
            return value;
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
	
	function onload_filter()
	{
		var mozliwe=["typ","woj","pow","miasto"]
		var location=window.location.href; //sprawdź aktualny adres
		var podziel=location.split("?"); //rozdziel adres na domenę i parametry
		if(podziel.length>1) //sprawdź czy są parametry
		{
			var get=podziel[1].split("&"); //rozdziel parametry
			var parametr=new Array(); //tablica nazw parametrów
			var wartosc=new Array(); //tablica wartości parametrów
			for(i=0;i<get.length;i++) //wykonaj pentlę x ilość parametrów
			{
				var pm=get[i].split("="); //rozdziel parametr na nazwę i wartość
				parametr[i]=pm[0]; //zapisz nazwę w tablicy parametr
				wartosc[i]=pm[1]; //zapisz wartość w tablicy wartość
			}
			for(i=0;i<get.length;i++) //wykonaj pentlę x ilość parametrów
			{
				if(parametr[i]=="typ") //jeżeli nazwa parametru to typ
				{
					document.getElementById("type_"+wartosc[i]).checked=true; //zaznacz odpowiedniego inputa jako checked
					$(".label_active").removeClass("label_active").addClass("label_no_active"); //wystylizyj
					$(".type_"+wartosc[i]).removeClass("label_no_active").addClass("label_active"); //wystylizuj
					active=wartosc[i]; //zapisz aktulnie wyświetlany typ jako zmienną "active"
				}
				else if(parametr[i]=="zasieg") //jeżeli parametr to zasięg
				{
					var content=odczytaj_adres(wartosc[i]); //odkoduj polskie znaki
					if(wartosc[i+1]) //jeżeli wybrano miasto
					{
						place=odczytaj_adres(wartosc[i+1]); //odkoduj polskie znaki
						load_pow2(content,place);
					}
					else
					load_pow2(content);
				}
                                else if (parametr[i]=="sort")
                                {
                                        var content=usun_spacje(wartosc[i]); //usuń spacje
                                        $("#"+content).attr('selected', true);
                                }
			}
			var activ_zero=0;
			for(i=0;i<get.length;i++)
			{
				if(parametr[i] =="typ")
				{
					activ_zero=activ_zero+1;
				}
			}
			if(activ_zero==0)
			{
				active=0;
			}
		}
		else
		{
			active=0;
		}
	}
	
	function search(wartosc,kategoria)
	{
		if(wartosc!=active)
		{
			var woj_div=document.getElementById("woj");
			var woj=woj_div.getElementsByTagName("select")[0].value;
			if(woj!="all")
			{
				var pow_div=document.getElementById("pow");
				var pow=pow_div.getElementsByTagName("select")[0].value;
				if(woj!=pow)
				{
					var place_div=document.getElementById("city");
					var place=place_div.getElementsByTagName("input")[0].value;
					if(place)
					{
						if(wartosc!=0)
						{
							window.location.href = kategoria+'.php?typ='+wartosc+'&zasieg='+woj+'_'+pow+'&place='+place;
						}
						else
						{
							window.location.href = kategoria+'.php?zasieg='+woj+'_'+pow+'&place='+place;
						}
					}
					else
					{
						if(wartosc!=0)
						{
							window.location.href = kategoria+'.php?typ='+wartosc+'&zasieg='+woj+'_'+pow;
						}
						else
						{
							window.location.href = kategoria+'.php?zasieg='+woj+'_'+pow;
						}
					}
				}
				else
				{
					if(wartosc!=0)
					{
						window.location.href = kategoria+'.php?typ='+wartosc+'&zasieg='+woj;
					}
					else
					{
						window.location.href = kategoria+'.php?zasieg='+woj;
					}
				}
			}
			else
			{
				if(wartosc!=0)
				{
					window.location.href = kategoria+'.php?typ='+wartosc;
				}
				else
				{
					window.location.href = kategoria+'.php';
				}
			}
		}
	}
	
	function search_location(type,val,category)
	{

		var type_nr=active;

		if(type=="woj")
		{
			if(val != "all")
			{
				if(type_nr!=0)
				{
					window.location.href = category+'.php?typ='+type_nr+'&zasieg='+val;
				}
				else
				{
					window.location.href = category+'.php?zasieg='+val;
				}
			}
			else
			{
				if(type_nr!=0)
				{
					window.location.href = category+'.php?typ='+type_nr;
				}
				else
				{
					window.location.href = category+'.php';
				}
			}
		}
		else if(type=="pow")
		{
			var woj_div=document.getElementById("woj");
			var woj=woj_div.getElementsByTagName("select")[0].value;
			var woj_pow=woj+'_'+val;
			if(val != woj)
			{
				if(type_nr!=0)
				{
					window.location.href = category+'.php?typ='+type_nr+'&zasieg='+woj_pow;
				}
				else
				{
					window.location.href = category+'.php?zasieg='+woj_pow;
				}	
			}
			else
			{
				if(type_nr!=0)
				{
					window.location.href = category+'.php?typ='+type_nr+'&zasieg='+woj;
				}
				else
				{
					window.location.href = category+'.php?zasieg='+woj;
				}	
			}
		}
		else if(type=="place")
		{
			var woj_div=document.getElementById("woj");
			var woj=woj_div.getElementsByTagName("select")[0].value;
			var pow_div=document.getElementById("pow");
			var pow=pow_div.getElementsByTagName("select")[0].value;
			var woj_pow=woj+'_'+pow;
			
			if(val)
			{
				if(type_nr!=0)
				{
					window.location.href = category+'.php?typ='+type_nr+'&zasieg='+woj_pow+'&place='+val;
				}
				else
				{
					window.location.href = category+'.php?zasieg='+woj_pow+'&place='+val;
				}	
			}
			else
			{
				if(type_nr!=0)
				{
					window.location.href = category+'.php?typ='+type_nr+'&zasieg='+woj_pow;
				}
				else
				{
					window.location.href = category+'.php?zasieg='+woj_pow;
				}	
			}
		}
	}
        
        function sort(value)
        {
            var loc=window.location.href;
//            if(loc.indexOf('sort')){
//                var new_loc = loc.split("&");
//                new_loc.splice(new_loc.length-1,1);
//                loc="";
//                for(i=0;i<new_loc.length;i++){
//                    loc+=new_loc[i];
//                }
//                alert(loc);
//                var filter = loc.split("?");
//                if(filter[1].indexOf('&')){
//                    var arg = filter[1].split("&");
//                    alert(arg.length);
//                    arg.splice(arg.length-1,1);
//                    alert(arg.length);
//                    loc="";
//                    for(var i=0;i<arg.length;i++){
//                        loc+=arg[i];
//                    }
//                } else {
//                    loc=filter[0];
//                }
//            }
//            if (loc.indexOf('?') > 0) {
//                loc+="&sort="+value;
//            } else {
//                loc+="?sort="+value;
//            }
//            if(loc.indexOf('&') < 0){
//                var new_loc = loc.split("?");
//                loc = new_loc[0]+"?sort="+value;
//                alert(0);
//            } else {
//                var new_loc = loc.split("&");
//                new_loc.splice(new_loc.length-1,1);
//                loc = new_loc[0];
//                for(var  i=1;i<new_loc.length;i++){
//                    loc+="&"+new_loc[i];
//                }
//                loc+="?sort="+value;
//            }
            
            if(loc.indexOf('?') >= 0){
                if(loc.indexOf('&') >= 0){
                    var new_loc = loc.split("&");
                    if(loc.indexOf('sort') >= 0){
                        new_loc.splice(new_loc.length-1,1);
                    }
                    loc = new_loc[0];
                    for(var  i=1;i<new_loc.length;i++){
                        loc+="&"+new_loc[i];
                    }
                    loc+="?sort="+value;
                } else {
                    if(loc.indexOf('sort') >= 0){
                        var new_loc = loc.split("?");
                        loc = new_loc[0]+"?sort="+value;
                    } else {
                        loc+="&sort="+value;
                    }
                }
            } else {
                loc+="?sort="+value;
            }
            location.href=loc;
        }