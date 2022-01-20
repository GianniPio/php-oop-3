<!-- /**
     * 
     *      Definire classe User:
     *          ATTRIBUTI (private):
     *          - username 
     *          - password
     *          - age
     *          
     *          METODI:
     *          - costruttore che accetta username, e password
     *          - proprieta' getter/setter
     *          - printMe: che stampa se stesso
     *          - toString: "username: age [password]"
     * 
     *          ECCEZIONI:
     *          - scatenare eccezione quando username e' minore di 3 caratteri o maggiore di 16
     *          - scatenare eccezione se password non contiene un carattere speciale (non alpha-numerico)
     *          - scatenare eccezione se age non e' un numero
     * 
     *          NOTE:
     *          - per testare il singolo carattere di una stringa
     * 
     *      Testare la classe appena definita con dati corretti e NON corretti all'interno di un
     *      try-catch e eventualmente informare l'utente del problema
     *  
     */ -->

<?php

    class User {

        private $username;
        private $password;
        private $age;

        public function __construct($username, $password) {

            $this -> setUsername($username);
            $this -> setPassword($password);
        }

        public function getUsername() {
            return $this -> username;
        }
        public function setUsername($username) {
            
            $lstring = strlen($username);
            
            if($lstring < 3 || $lstring > 16)
            throw new Exception("Scrivi un username compreso tra i 3 e i 16 caratteri");

            $this -> username = $username;
        }

        public function getPassword() {
            return $this -> password;
        }
        public function setPassword($password){
            if(ctype_alnum($password))
            throw new Exception("La password ha bisogno di un carattere speciale");

            $this -> password = $password;
        }

        public function getAge() {
            return $this -> age;
        }
        public function setAge($age){
            if(!is_numeric($age))
            throw new Exception("Inserire un numero");
            $this -> age = $age;
        }

        public function printMe(){
            echo $this;
        }

        public function __toString(){
            return $this -> getUsername() . ": " . $this -> getAge() . " [ " . $this -> getPassword() . " ]";
        }
        
        
    }

    try {

    $u1 = new User("Gianni", "ciao21?");
    $u1 -> setAge(21);
    $u1 -> printMe();
    } catch (Exception $e) {
        echo "<span>" . $e -> getMessage() . "</span>";
    }
   
?>