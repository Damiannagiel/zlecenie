<?php
class ResetPassText
{
    private $value;//string odebrany z formularza


    
    //konstruktor obiektu klasy ResetPass
    //przyjmuje zmienną string z formulaża login/email, string zwrócony przez recaptcha
    //sprawda czy formularz login/email nie jest pusty
    //definiuje składowe value i recaptcha
    public function __construct(
        string $value
    ) {

        if(!preg_match('/^[ ]+$/D',$value)&&$value!=""){
        $value = trim($value);
        $this->value = $value;
        }
        else{
            //procedura błędu
        }
    }// end __construct()

    
    //funkcja tworząca obiekt klasy EmailResetPass lub LoginResetPass
    //decyduje na podstawie obecności znaku "@" w składowej value
    //zwraca nowy obiekt
    public function NewType()
    {
        if(strstr($this->value,"@")){
            $ret = new EmailResetPass($this->value);
            return $ret;
        }
        else{
            $ret = new LoginResetPass($this->value);
            return $ret;
        }
    }// end NewType()
    
    
    public function view2(
        string $type
    ){
        print $type." ".$this->value;
    }//end viev()

}//end class ResetPassText




    
//klasa obsługująca dres e-mali
//powinna być tworzona wyłącznie motodą NewType() klasy ResetPassText
class EmailResetPass extends ResetPassText
{
    private $value;
    private $view = "adres e-mail:";
    

    
    //konstruktor klasy EmailResetPass
    //jeżeli walidcja przebiegnie po myślnie zapisuje wartość w value
    public function __construct(string $value) 
     {
        $pattern='/^[a-zA-Z0-9\.\-_]+\@[a-zA-Z0-9\.\-_]+\.[a-z]{2,4}$/D';
        if(preg_match($pattern, $value)){
            parent::__construct($value);
        }  
    }// end __construct()
    
    
    public function view(){
        parent::view2($this->view);
    }
}//end class EmailResetPass





//klasa obsługująca dres login
//powinna być tworzona wyłącznie motodą NewType() klasy ResetPassText
class LoginResetPass extends ResetPassText
{
    private $value;
    private $view = "login:";
    
    
    
    //konstruktor klasy LoginResetPass
    //jeżeli walidcja przebiegnie po myślnie zapisuje wartość w value
    public function __construct(string $value) 
    {
        $pattern='/^[a-zA-Z0-9\_\-]+$/D';
        if(preg_match($pattern,$value)){
            parent::__construct($value);
        }
    }
    
    
    public function view(){
        parent::view2($this->view);
    }
}//end class EmailResetPass

$usun= new ResetPassText($_POST['user']);
$new=$usun->NewType();
$new->view();
//    $falsz = new LoginResetPass($usun);
//    $falsz->wyswietl();

 ?>