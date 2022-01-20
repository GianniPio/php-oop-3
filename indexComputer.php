<!-- Definire classe Computer:

    ATTRIBUTI:
        - codice univoco
        - modello
        - prezzo
        - marca

    METODI:
        - costruttore che accetta codice univoco e prezzo
        - proprieta' getter/setter per tutte le variabili d'istanza
        - printMe: che stampa se stesso (come quella vista a lezione)
        - toString: "marca modello: prezzo [codice univoco]"

    ECCEZIONI:
        - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
        - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
        - prezzo: deve essere un valore intero compreso tra 0 e 2000

Testare la classe appena definita con tutte le casistiche interessanti per verificare
il corretto funzionamento dell'algoritmo -->

<?php

    class Computer {
        private $codiceUnivoco;
        private $modello;
        private $prezzo;
        private $marca;

        public function __construct($codiceUnivoco, $prezzo){
            
            $this -> setCodiceUnivoco($codiceUnivoco);
            $this -> setPrezzo($prezzo);
        }

        public function getCodiceUnivoco(){
            return $this -> codiceUnivoco;
        }
        public function setCodiceUnivoco($codiceUnivoco){
            if(strlen($codiceUnivoco) != 6 || !is_numeric($codiceUnivoco))
            throw new Exception("Il codice deve essere composto da esattamente 6 cifre");

            $this -> codiceUnivoco = $codiceUnivoco;
        }

        public function getModello(){
            return $this -> modello;
        }
        public function setModello($modello){

            $lstrinModel = strlen($modello);

            if(($lstrinModel <3 || $lstrinModel >20) || !is_string($modello))
            throw new Exception("Il modello deve avere minimo 3 o massimo 20 caratteri");

            $this -> modello = $modello; 
        }

        public function getPrezzo(){
            return $this -> prezzo;
        }
        public function setPrezzo($prezzo){

            if(!is_int($prezzo) || $prezzo <0 || $prezzo >2000 )
            throw new Exception("Il prezzo deve essere compreso tra 0€ e 2000€");

            $this -> prezzo = $prezzo;
        }

        public function getMarca(){
            return $this -> marca;
        }
        public function setMarca($marca){

            $lstringMarc = strlen($marca);

            if(($lstringMarc <3 || $lstringMarc >20) || !is_string($marca))
            throw new Exception("La marca deve avere minimo 3 o massimo 20 caratteri");

            $this -> marca = $marca;
        }

        public function __toString(){
            return $this -> getMarca() . " " . $this -> getModello() . ": " . $this -> getPrezzo() . "€ [ " . $this -> getCodiceUnivoco() . " ] <br>";
        }

        public function printMe(){
            echo $this;
        }
    }


    try{

    $c1 = new Computer("123456", 1099);
    $c2 = new Computer("654321", 399);

    $c1 -> setMarca("Microsoft");
    $c2 -> setMarca("Acer");


    $c1 -> setModello("Surface Pro 7");
    $c2 -> setModello("Chromebook 514");


    $c1 -> printMe();
    $c2 -> printMe();
    } catch (Exception $m) {
        echo "<h1>" . $m -> getMessage() . "</h1>";
    }


?>