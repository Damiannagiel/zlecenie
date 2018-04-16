var hamburger = document.querySelector(".hamburger");
hamburger.addEventListener("click",function(){
	$(".user-nav").slideToggle("high");
	var opened=document.querySelector(".site-header.nav-opened");
	if(opened){
		setTimeout(function(){document.querySelector(".site-header").classList.toggle("nav-opened")},375);
	}
	else{
		document.querySelector(".site-header").classList.toggle("nav-opened");
	}
},false);

function szukaj(value)
{
		$(".active").removeClass("active");
		$(".h5-active").removeClass("h5-active");
		if(value==0)
		{
			document.getElementsByTagName("label")[1].classList.add("active");
			document.getElementsByTagName("h5")[1].classList.add("h5-active");
		}
		if(value==1)
		{
			document.getElementsByTagName("label")[2].classList.add("active");
			document.getElementsByTagName("h5")[2].classList.add("h5-active");
		}
		if(value==2)
		{
			document.getElementsByTagName("label")[0].classList.add("active");
			document.getElementsByTagName("h5")[0].classList.add("h5-active");
		}
}


var typ = document.getElementsByTagName("label");