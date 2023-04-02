<!-- /**
 * Menghitung bangun datar segitiga
 *
 * @param $alas
 * @param $tinggi
 *
 */ -->

<?php 
require_once 'abstrack.php';

class Segitiga extends BD_2D {
    
    private float $tinggi;
    private float $alas;
    function __construct($alas,$tinggi){
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }
    function luas(){
        echo "<br>Luas ". get_class(). " = ". (($this->alas * $this->tinggi) * .5). "\n";
    }
    function keliling(){
        echo "<br>Keliling ". get_class(). " = ". (sqrt(
            pow($this->alas,2) + pow($this->tinggi,2)
        ) + $this->alas + $this->tinggi). "\n";
    }
}