var ile_powiatow = 0; // zmienna przechowująca liczbę ogólną zaznaczonych powiatów
var ile_pow = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1]; //zmienna przechowująca liczbę zaznaczonych powiatów w danym województwie, ostatnia liczba to dodatkowa jedynka na potrzeby skryptu odswiez_powiaty
var wojewodztwa = ["dolnośląskie","kujawsko-pomorskie","lubelskie","lubuskie","łódzkie","małopolskie","mazowieckie","opolskie","podkarpackie","podlaskie","pomorskie","śląskie","świętokrzyskie","warmińsko-mazurskie","wielkopolskie","zachodniopomorskie"]; //tablica z nazwami województw
var img = 0; //zmienna przecowująca ilość dodanych zdjęć
var inp_img = 1; //zmienna przechowująca ilość widocznych formulaży na zdjęcia
var fig=0; //zmienna przechowująca ilość wcześniej wybranych zdjęć, wykorzystywana podczas edycji ogłoszenia
var wywolany=0;

function ile(ile,el) //funkcja wyświetlająca zliczone powiaty
{
    document.getElementById('ile').innerHTML='<div id="ile">Ogólnie: '+ile+'<br/>Z tego woj: '+ile_pow[el]+'</div>';
}

function usun_miejscowosc() //funkcja usuwająca miejscowosc po odznaczeniu powiatu
{
    if(document.getElementById('miasto_div'))
    document.getElementById('miasto_div').innerHTML='';
}

function dodaj_miejscowosc2(powiat) //funkcja dodająca ukrytą nazwę miejscowosci w przypadku gdy wybrano jedno miasto NPP
{
    if(ile_powiatow==1)
    {
        document.getElementById('miasto_div').innerHTML='<input type="hidden" id="miejscowosc_inp" name="miasto" value="'+powiat+'"/>';
    }
    else
    {
        document.getElementById('miasto_div').innerHTML='';
    }
}

function dodaj_miejscowosc() //funkcja dodająca formularz miejscowości w przypadku gdy wybrano jeden powiat ziemski
{
    if(ile_powiatow==1)
    {
        document.getElementById('miasto_div').innerHTML='<label  class="description">Miejscowość:</label><div class="prawa"><input class="inp" id="miejscowosc_inp" type="text" name="miasto"/></div><div style="clear:both"></div>';
    }
    else
    {
        document.getElementById('miasto_div').innerHTML='';
    }
}

function dodaj_div_hidden(woj,el) //funkcja dodająca lub usuwająca diva na inputy zaznaczonych powiatów z danego województwa
{ 
    if(ile_pow[el]>=1)
    {
        if(!document.getElementById(woj+'_inp'))
        {
            var hidden = document.createElement('div');
            hidden.setAttribute('id',woj+'_inp');
            var kontener = document.getElementById('powiat');
            kontener.appendChild(hidden);
        }
    }
    else 
    {
        if(document.getElementById(woj+'_inp'))
        {
            x=document.getElementById(woj+'_inp');
            x.remove();
        }
    }
}

function dodaj_div(woj) //funkcja dodająca diva na opis i herby z danego województwa w przypadku gdy jeszcze nie istnieją 
{
    if(!document.getElementById(woj+'_opis'))
    {
        var opis = document.createElement('div');
        opis.setAttribute('id',woj+'_opis');
        var kontener = document.getElementById('miejscowosc');
        kontener.appendChild(opis);
    }
    if(!document.getElementById(woj+'_herb'))
    {
        var herb = document.createElement('div');
        herb.setAttribute('id',woj+'_herb');
        var kontener = document.getElementById('miejscowosc');
        kontener.appendChild(herb);
    }
}

function usun_opis_woj(woj) //funkcja usuwająca opis wojweództwa w przypadku gdy został odznaczony element "całe województwo"
{
    if(document.getElementById(woj).checked==false)
    {
        document.getElementById(woj+'_opis').remove();
    }
}

function usun_opis(woj,el) //funkcja usuwająca opis województwa w przypadku gdy w danym województwie liczba zaznaczonych powiatów wynosi "0"
{
    if(ile_pow[el]==0)
    {
        document.getElementById(woj+'_opis').remove();
        document.getElementById(woj+'_herb').remove();
    }
}

function zmien_opis(woj,powiat,jednostka) //funkcja zmieniająca opis województwa w zależności czy wybrane zostało "całe województwo"  lub liczba zaznaczonych powiatów wynosi "0" badź "1"
{
    var zmien;
    if(woj==powiat)
    {
        zmien = '<p>województwo '+woj+' (całe)</p>';
    }
    else if(ile_powiatow==0)
    {
        zmien = '';
    }
    else if(ile_powiatow==1)
    {
        zmien = '<p>'+jednostka+' '+powiat+'</p>';
    }
    else
    {
        zmien = '<p>województwo '+woj+'</p>';
    }

    document.getElementById(woj+'_opis').innerHTML=zmien;
}

function zmien_wielkosc() //funkcja zmieniająca klasę herbów w zależności ile powiatów zostało zaznaczonych
{ 
    if(ile_powiatow < 2)
    {
        $(".male").removeClass("male").addClass("duze");
        $(".srednie").removeClass("srednie").addClass("duze");
    }

    if(ile_powiatow == 2)
    {
        $(".male").removeClass("male").addClass("srednie");
        $(".duze").removeClass("duze").addClass("srednie");
    }
    if(ile_powiatow >2)
    {
        $(".srednie").removeClass("srednie").addClass("male");
        $(".duze").removeClass("duze").addClass("male");
    }
}

function dodaj_obrazek(woj,id) //funkcja dodająca herb wybranego powiatu
{
    var herb = document.createElement('img');
    herb.setAttribute('id','herb_'+id);
    herb.setAttribute('name','herby');
    herb.setAttribute('class','duze');
    herb.setAttribute('alt',id);
    herb.setAttribute('title',id);
    id = usun_polskie_znaki_i_spacje(id);
    herb.setAttribute('src', '../img/powiaty/'+id+'.png');
    var kontener = document.getElementById(woj+'_herb');
    kontener.appendChild(herb);
}

function za_duzo() //funkcja wyśiwtlająca napis o zaznaczeniu maksymalnej ilości powiatów i blokująca możliwość wybierania kolejnych (a także odblokowująca po odznaczeniu powiatu)
{
    if(ile_powiatow>=6)
    {
        var blad = document.createElement('div');
        blad.setAttribute('id','blad');
        var kontener = document.getElementById('miejscowosc');
        kontener.appendChild(blad);
        document.getElementById('blad').innerHTML='<p class="blad_woj">Wybrałeś maksymalną liczbę powiatów(6). Jeżeli potrzebujesz wybrać więcej skorzystaj z usług premium</p>';
        var dlugosc = document.getElementsByName("powiat[]").length;
        for(i=0;i<dlugosc;i++)
        {
            if(document.getElementsByName('powiat[]')[i].checked==false)
            document.getElementsByName('powiat[]')[i].disabled=true;
        }
    }
    else if(ile_powiatow<=6)
    {
        if(document.getElementById('blad'))
        {
            var usun_blad=document.getElementById('blad');
            usun_blad.remove();
        }
        var dlugosc = document.getElementsByName("powiat[]").length;
        for(i=0;i<dlugosc;i++)
        {
            if(document.getElementsByName('powiat[]')[i].disabled==true)
            document.getElementsByName('powiat[]')[i].disabled=false;
        }
    }
}

//funkcja zaznaczająca i odznaczająca wszystkie powiaty
function selectAll(x,b) 
{
    x=(typeof(x)=='string')?document.getElementById(x):x.parentNode;
    for(j=0;j<x.getElementsByTagName("input").length;j++) 
    {
        if(x.getElementsByTagName("input")[j].type=="checkbox") 
        {
            x.getElementsByTagName("input")[j].checked=b;
        }
    }
}

//funkcja sprawdzająca czy wybrano opcję całe województwo	
function zaznacz(woj)
{
    if(document.getElementById(woj).checked==true)
    {
        selectAll('powiaty',true);
    }
    else
    {
        selectAll('powiaty',false);
    }
}

// funkcja odznaczająca wyszstkie powiaty 
function odznacz(woj,el)
{			
    ile_pow[el] = 0;
    policz_ile();
    selectAll('powiaty',false);
    var el=document.getElementById(woj+'_'+woj);
    el.remove();
    var ob=document.getElementById('herb_'+woj+'_'+woj);
    ob.remove();
}

//funkcja czyszcząca diva z herbami powiatów
function czysc_div(id,woj)
{
    if(document.getElementById(id))
    {
        document.getElementById(id).innerHTML='';
    }
    if(document.getElementById(woj+'_herb'))
    {
        document.getElementById(woj+'_herb').innerHTML='';
    }
}

//funkcja dodająca ukryte inputy zaznaczonych powiatów	
function dodaj_input(kontener,powiat,nazwa,typ,id)
{
    var znacznik = document.createElement('input');
    znacznik.setAttribute('type', typ);
    znacznik.setAttribute('name', nazwa);
    znacznik.setAttribute('value', powiat);
    znacznik.setAttribute('id',id);
    var kontener = document.getElementById(kontener);
    kontener.appendChild(znacznik);
}

// funkcja zmieniająca ops po odznaczeniu wszystkich powiatów w dnym województwie w przypadku gdy w innym zostanie jeden zaznaczony
function ostatni_ogol(wyjatki_ogol,el)
{
    var ktory = document.getElementsByName('powiaty[]')[0].value;
    var tablica = ktory.split('_');
    var woj = tablica[0];
    var pow = tablica[1];
    for (var i=0; i<wyjatki_ogol.length; i++)
    {
        var tab = wyjatki_ogol[i].split('_');
        var woj1 = tab[0];
        var pow1 = tab[1];
        if(pow==pow1)
        {
            document.getElementById(woj+'_opis').innerHTML='<p>miasto '+pow+'</p>';
            dodaj_miejscowosc2(pow);
            return;
        }
    }
    document.getElementById(woj+'_opis').innerHTML='<p>powiat '+pow+'</p>';
    document.getElementById('miasto_div').innerHTML='<p>Miejscowość:</p><input type="text" name="miasto"/>';
}

// funkcja zmieniająca opis po odznaczeniu powiatku w przypadku gdy zostanie jeden zaznaczony	
function ostatni()
{
    if(ile_powiatow==1)
    {
        var wyjatki_ogol=['dolnośląskie_Wrocław','dolnośląskie_Jelenia Góra','dolnośląskie_Legnica','kujawsko-pomorskie_Bydgoszcz','kujawsko-pomorskie_Toruń','kujawsko-pomorskie_Włocławek','kujawsko-pomorskie_Grudziądz','lubuskie_Zielona Góra','lubuskie_Gorzów Wielkopolski','łódzkie_łódź','łódzkie_Piotrków Trybunalski','łódzkie_Skierniewice','małopolskie_Kraków','małopolskie_Tarnów','małopolskie_Nowy Targ',"mazowieckie_Warszawa","mazowieckie_Radom","mazowieckie_Płock","mazowieckie_Siedlce","mazowieckie_Ostrołęka","opolskie_Opole","podkarpackie_Rzeszów","podkarpackie_Przemyśl","podkarpackie_Tarnobrzeg","podkarpackie_Krosno","podlaskie_Białystok","podlaskie_Suwałki","podlaskie_Łomża","pomorskie_Gdańsk","pomorskie_Gdynia","pomorskie_Słupsk","pomorskie_Sopot","śląskie_Katowice","śląskie_Częstochowa","śląskie_Sosnowiec","śląskie_Gliwice","śląskie_Zabrze","śląskie_Bielsko-Biała","śląskie_Bytom","śląskie_Ruda Śląska","śląskie_Rybnik","śląskie_Tychy","śląskie_Dąbrowa Górnicza","śląskie_Chorzów","śląskie_Jaworzno","śląskie_Jastrzębie-Zdrój","śląskie_Mysłowice","śląskie_Siemianowice Śląskie","śląskie_Żory","śląskie_Piekary Śląskie","śląskie_Świętochłowice","świętokrzyskie_Kielce","warmińsko-mazurskie_Olsztyn","warmińsko-mazurskie_Elbląg","wielkopolskie_Poznań","wielkopolskie_Kalisz","wielkopolskie_konin","wielkopolskie_Leszno","zachodniopomorskie_Szczecin","zachodniopomorskie_Koszalin","zachodniopomorskie_Świnoujście"];
        var ktory = document.getElementsByName('powiaty[]')[0].value;
        var tablica = ktory.split('_');
        var woj = tablica[0];
        var pow = tablica[1];
        for (var i=0; i<wyjatki_ogol.length; i++)
        {
            var tab = wyjatki_ogol[i].split('_');
            var woj1 = tab[0];
            var pow1 = tab[1];
            if(pow==pow1)
            {
                    document.getElementById(woj+'_opis').innerHTML='<p>miasto '+pow+'</p>';
                    dodaj_miejscowosc2(pow);
                    return;
            }
        }
        document.getElementById(woj+'_opis').innerHTML='<p>powiat '+pow+'</p>';
        document.getElementById('miasto_div').innerHTML='<label  class="description">Miejscowość:</label><div class="prawa"><input class="inp" id="miejscowosc_inp" type="text" name="miasto"/></div><div style="clear:both"></div>';

    }
}

//funkcja sprawdzająca czy kliknięty powiat został wybrany
function powiat_klik(powiat,woj,wyjatki,el)
{
    var zaznaczone = el;
    var div = woj+'_inp';
    var id = woj+'_'+powiat;
    if(document.getElementById(powiat).checked==true) //sprawdź czy kliknięty element jest zaznaczony

    //został zaznaczony
    {		
        var value = document.getElementById(powiat).value;
        if(document.getElementById(woj).checked==true) //sprawdź czy zaznaczono opcję całe województwo
        {
            ile_pow[el] = 1;
            policz_ile();
            czysc_div(div,woj);
            dodaj_div_hidden(woj,zaznaczone);
            dodaj_input(div,value,'powiaty[]','hidden',id);
            dodaj_div(woj);
            zmien_opis(woj,powiat);
            dodaj_obrazek(woj,id);
            zmien_wielkosc();
            zmien_inne();
            return;
        }
        for (var i=0; i<wyjatki.length; i++) //pętla sprawdzająca czy zaznaczone zostało jedno z miast NPP
        {	
            var wyjatek = woj+'_'+wyjatki[i];
            if(document.getElementById(powiat).value==wyjatek) //porównanie klikniętego elementu z listą miast NPP
            {
                ile_pow[el] = ile_pow[el] +1;
                policz_ile();
                if(ile_powiatow<7)
                {
                    dodaj_div_hidden(woj,zaznaczone);
                    dodaj_input(div,value,'powiaty[]','hidden',id);
                    dodaj_div(woj);
                    zmien_opis(woj,powiat,'miasto');
                    dodaj_obrazek(woj,id);
                    zmien_wielkosc();
                    dodaj_miejscowosc2(powiat);
                    zmien_inne();
                }
                return;
            }
        }
        // zaznaczony został zwykły powiat
        ile_pow[el] = ile_pow[el] +1;
        policz_ile();
        if(ile_powiatow<7)
        {
            dodaj_div_hidden(woj,zaznaczone);
            dodaj_input(div,value,'powiaty[]','hidden',id);
            dodaj_div(woj);
            zmien_opis(woj,powiat,'powiat');
            dodaj_obrazek(woj,id);
            zmien_wielkosc();
            dodaj_miejscowosc();
            zmien_inne();
        }
    }

    //został odznaczony
    else
    {		
        if(document.getElementById(woj).checked==true) //sprawdź czy "całe województwo" jest dalej zaznaczony
        {	
            odznacz(woj,el);
            usun_opis_woj(woj);
            dodaj_div_hidden(woj,zaznaczone);
            return;
        }
        for (var i=0; i<wyjatki.length; i++) //pętla sprawdzająca czy odzaznaczone zostało jedno z miast NPP
        {	
            var wyjatek = woj+'_'+wyjatki[i];
            if(document.getElementById(powiat).value==wyjatek) //porównanie klikniętego elementu z listą miast NPP
            {
                ile_pow[el] = ile_pow[el] -1;
                policz_ile();
                if(document.getElementById(id))
                {
                    var el=document.getElementById(id);
                    el.remove();
                    var ob=document.getElementById('herb_'+id);
                    ob.remove();
                    usun_miejscowosc();
                    zmien_wielkosc();
                    usun_opis(woj,zaznaczone);
                    ostatni();
                    dodaj_div_hidden(woj,zaznaczone);
                }
                return;
            }
        }
        //odznaczony został zwykły powiat
        ile_pow[el] = ile_pow[el] -1;
        policz_ile();
        if(document.getElementById(id))
        {
            var el=document.getElementById(id);
            el.remove();
            var ob=document.getElementById('herb_'+id);
            ob.remove();
            usun_miejscowosc();
            zmien_wielkosc();
            usun_opis(woj,zaznaczone);
            ostatni();
            dodaj_div_hidden(woj,zaznaczone);
        }
    }
}

// funkcja zaznaczająca zaznaczone wcześniej powiaty
function policz()
{ 	
    var ile=document.getElementsByName('powiaty[]').length;
    for(i=0;i<ile;i++)
    {
        var value = document.getElementsByName('powiaty[]')[i].value;
        var tablica = value.split('_');
        var wartosc=tablica[1];
        if(document.getElementById(wartosc))
        {
            document.getElementById(wartosc).checked=true;
        }
        if(document.getElementsByName('powiat[]')[0].checked==true)
        {
            selectAll('powiaty',true);
        }

    }
}

//funkcja licząca ogólną liczbę zaznaczonych powiatów
function policz_ile()
{
    ile_powiatow = ile_pow[1]+ile_pow[2]+ile_pow[3]+ile_pow[4]+ile_pow[5]+ile_pow[6]+ile_pow[7]+ile_pow[8]+ile_pow[9]+ile_pow[10]+ile_pow[11]+ile_pow[12]+ile_pow[13]+ile_pow[14]+ile_pow[15]+ile_pow[16];
}

// funkcja zmieniająca opis innego województwa w przypadku gdy został zaznaczony kolejny powiat w innym województwie
function zmien_inne()
{
    if(ile_powiatow>1)
    var ile = wojewodztwa.length;

    for(i=0;i<ile;i++)
    {
        if(document.getElementById(wojewodztwa[i]+"_inp"))
        {
            document.getElementById(wojewodztwa[i]+"_opis").innerHTML='<p>województwo '+wojewodztwa[i]+'</p>';
        }
    }
}

// funkcja zmieniająca klasę województwa na mapie w zależności czy w danym województwie zostały zaznaczone jakieś powiaty
function ustal_kolor()
{
    var ile = wojewodztwa.length;
    for(i=0;i<ile;i++)
    {
        if(document.getElementById(wojewodztwa[i]+"_inp"))
        {
            var woj = document.getElementById(wojewodztwa[i]+"_map");
            woj.classList.add('zaznaczony');
        }
        else
        {
            var woj = document.getElementById(wojewodztwa[i]+"_map");
            woj.classList.remove('zaznaczony');
        }
    }
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//funkcja ustalająca które województwo aktualnie jest przetważane
//pobiera nazwę województwa, zwraca jego numer
function ktore_woj(woj)
{
    var woj_tab=["dolnośląskie","kujawsko-pomorskie","lubelskie","lubuskie","łódzkie","małopolskie","mazowieckie","opolskie","podkarpackie","podlaskie","pomorskie","śląskie","świętokrzyskie","warmińsko-mazurskie","wielkopolskie","zachodniopomorskie"];
    for(i=0;i<woj_tab.length;i++)
    {
        if(woj==woj_tab[i])
        {
                return i+1;
        }
    }
}


//funkja wyświetlająca i zaznaczająca wybrane powiaty po wyrzuceniu błędu przez serwer
function odswiez_powiaty(powiaty_ciag,miasto,ile_img)
{
    if(powiaty_ciag !="") 
    {
        var pojedyncze = powiaty_ciag.split('&');
        var ile_powiatow = pojedyncze.length;//"ile piwiatow2" ponieważ "ile_powiatow" to zmienna globalna
        var i=0;
        while(i<ile_powiatow)
        {
            var value=pojedyncze[i];
            var woj_pow=pojedyncze[i].split('_');
            var woj=woj_pow[0];
            var pow=woj_pow[1];
            var el=ktore_woj(woj);
            ile_pow[el] = ile_pow[el] +1;
            policz_ile();
            dodaj_div_hidden(woj,el);
            dodaj_input(woj+'_inp',value,'powiaty[]','hidden',value);
            dodaj_div(woj);
            if((i==0)&&(ile_powiatow>1)){
                zmien_opis(woj,"województwo "+woj,"");
            }
            else zmien_opis(woj,pow);
            dodaj_obrazek(woj,value);
            i++;
        }
        zmien_wielkosc();
        ustal_kolor();
        if(ile_img!="")
        {
            img=ile_img;
            if(img<5)inp_img=inp_img+img;
            else inp_img=5;
        }
        if(ile_powiatow==1)
        {
            var typ=sprawdz_czy_powiat(pow);
            if(typ=="miasto")
            {
                    dodaj_miejscowosc2(pow);
                    zmien_opis(woj,pow,"miasto");
                    return;
            }
            if(pow!=woj){
                dodaj_miejscowosc();
            }
            zmien_opis(woj,pow,"powiat");
            if(miasto!="")
            {
                    document.getElementById('miejscowosc_inp').value=miasto;
            }
        }
    }
}


function sprawdz_czy_powiat(pow)
{
    var miasta = ["Wrocław","Wałbrzych","Legnica","Bydgoszcz","Toruń","Włocławek","Grudziądz","Lublin","Zamość","Chełm","Biała Podlaska","Zielona Góra","Gorzów Wielkopolski","Łódź","Piotrków Trybunalski","Skierniewice","Kraków","Tarnów","Nowy Sącz","Warszawa","Radom","Płock","Siedlce","Ostrołęka","Opole","Rzeszów","Przemyśl","Tarnobrzeg","Krosno","Białystok","Suwałki","Łomża","Gdańsk","Gdynia","Słupsk","Sopot","Katowice","Częstochowa","Sosnowiec","Gliwice","Zabrze","Bielsko-Biała","Bytom","Ruda Śląska","Rybnik","Tychy","Dąbrowa Górnicza","Chorzów","Jaworzno","Jastrzębie-Zdrój","Mysłowice","Siemianowice Śląskie","Żory","Piekary Śląskie","Świętochłowice","Kielce","Olsztyn","Elbląg","Poznań","Kalisz","Konin","Leszno","Szczecin","Koszalin","Świnoujście"];
    for(i=0;i<miasta.length;i++)
    {
        if(pow==miasta[i])
        {
            return "miasto";
        }
    }
    return "powiat";
}

function usun_polskie_znaki_i_spacje(adres)
	{
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
		return adres;
	}

//funkcja zaznaczająca typ ogłoszenia po wyrzuceniu błędu przez serwer
function zaznacz_typ(typ)
{
    if(typ!="")
    {
        if(typ=="klient")
        {
            document.getElementById("klient_inp").setAttribute("checked","checked");
            document.getElementById("klient_lb").setAttribute("class","active_type");
        }
        else if(typ=="wykonawca")
        {
            document.getElementById("wykonawca_inp").setAttribute("checked","checked");
            document.getElementById("wykonawca_lb").setAttribute("class","active_type");
        }
    }
}

//funkcja wczytująca wybraną kategorię po wyrzuceniu błędu przez serwer
function wyczytaj_kategorie(kat)
{
    if((kat!="")&&(kat!="@"))
    {
        var podkat=kat.split('>');
        var kat1 = podkat[0].replace(/^\s+|\s+$/g,'');
        document.getElementById(kat1).setAttribute("selected","selected");
        $.ajax
        ({
            url: 'loader_kat2.php',
            type: 'post',
            data: {Content : kat1},
                success: function(response)
                {
                    $('#kat2_div').html(response);
                    if(podkat[1])
                    {
                        var kat2 = podkat[1].replace(/^\s+|\s+$/g,'');
                        if(kat2=="inne")
                        {
                                $('#kat2_div #inne').attr({selected: "selected"});
                        }
                        else
                        {
                            if((kat1=="Budowlanka")||(kat1=="Dom i ogród")||(kat1=="Motoryzacja"))
                            {
                                if(kat1=="Budowlanka") var loader="budowlanka";
                                else if(kat1=="Dom i ogród") var loader="dom_ogrod";
                                else if(kat1=="Motoryzacja") var loader="motoryzacja";
                                $.ajax
                                ({
                                    url: 'kategorie/loader_'+loader+'.php',
                                    type: 'post',
                                    data: {Content : kat2},
                                        success: function(response)
                                        {
                                            $('#kat3_div').html(response);
                                            if(podkat[2])
                                            {
                                                var kat3 = podkat[2].replace(/^\s+|\s+$/g,'');
                                                if(kat3=="inne")
                                                {
                                                    $('#kat3_div #inne').attr({selected: "selected"});
                                                }
                                                else
                                                {
                                                    document.getElementById(kat3).setAttribute("selected","selected");
                                                }
                                            }
                                        }
                                });
                            }
                            document.getElementById(kat2).setAttribute("selected","selected");


                        }
                    }
                }
        });

    }
}

function cena_za(cena_za)
{
    if(cena_za!="")
    {
        document.getElementById(cena_za).setAttribute("selected","selected");
    }
}

function dodaj_inp_img()
{
    var div=document.createElement('div');
    div.setAttribute('id','img_div'+img);
    var kontener1 = document.getElementById('img_add');
    kontener1.appendChild(div);

    var input = document.createElement('input');
    input.setAttribute('type','file');
    input.setAttribute('onChange','dodaj_img();');
    input.setAttribute('name','img'+img);
    var kontener2 = document.getElementById('img_div'+img);
    kontener2.appendChild(input);
    inp_img=inp_img+1;
}

function create_icon(del,min)
{
    var icon = document.createElement('i');
    icon.setAttribute('class','icon-cancel');
    icon.setAttribute('id','icon'+(del-min));
    icon.setAttribute('onClick','usun_img('+(del-min)+');');
    var kontener3 = document.getElementById('img_div'+(del-min));
    kontener3.appendChild(icon);
}

function dodaj_img()
{
    img=img+1;
    document.getElementById("ile_zdjec").innerHTML='<input type="hidden" name="ile_zdjec" value="'+img+'"/>';
    if(img>0)
    {
        create_icon(img,1,1);
    }
    if(img<5)
    {
        dodaj_inp_img();
    }
    else
    {
        document.getElementById("max_img").innerHTML="<p>Jeżeli potrzebujesz dodać więcej zdjęć, skorzystaj z Konta Premium <br/>img="+img+"<br/>inp_img="+inp_img+"<br/>fig="+fig+"</p>";
    }
}

function usun_img(usun)
{
    document.getElementById('img_div'+usun).remove();
    if(img==5)
    {
        dodaj_inp_img();
    }
    img=img-1;
    inp_img=inp_img-1;
    for(i=usun;i<inp_img;i++)
    {
        document.getElementById('img_div'+(i+1)).id='img_div'+i;
        document.getElementsByName('img'+(i+1))[0].name='img'+i;
        if(i<(img))
        {
            document.getElementById('icon'+(i+1)).remove();
            create_icon(i,0)
        }
    }
    if(inp_img<1)
    {
        dodaj_inp_img();
    }
    document.getElementById("ile_zdjec").innerHTML='<input type="hidden" name="ile_zdjec" value="'+img+'"/>';
}

function usun_next(ile_fig,nr_img)
{
    if(wywolany==0)
    {
        fig=ile_fig;
        wywolany=1;
    }
    else
    {
        fig=fig-1;
    }
    document.getElementById('fig_'+nr_img).remove();
    if(img==5)
    {
        dodaj_inp_img();
    }
    img=img-1;
    inp_img=inp_img-1;
    for(i=fig;i<=inp_img;i++)
    {
        document.getElementById('img_div'+i).id='img_div'+(i-1);
        document.getElementsByName('img'+i)[0].name='img'+(i-1);
        if(i<=img)
        {
                document.getElementById('icon'+i).remove();
                create_icon(i,1)
        }
    }
    if(inp_img<1)
    {
        dodaj_inp_img();
    }
    document.getElementById("ile_zdjec").innerHTML='<input type="hidden" name="ile_zdjec" value="'+img+'"/>';
}

function dostepnosc(accessibility){
    if(accessibility==1){
        document.getElementById("accessibility_1").setAttribute("checked","true");
    }
}