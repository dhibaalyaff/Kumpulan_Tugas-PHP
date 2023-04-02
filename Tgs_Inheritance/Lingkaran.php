<!-- /**
 * Menghitung bangun datar Lingkaran
 *
 * @param $jari2
 *
 */ -->

 <?php 
require_once 'abstrack.php';

class Lingkaran extends BD_2D {
    
    private float $jari2;
    function __construct($jari2){
        $this->jari2 = $jari2;
    }
    function luas(){
        echo "<br> Luas ". get_class(). " = ". (pi() * pow($this->jari2,2)). "\n";
    }
    function keliling(){
        echo "<br>Keliling ". get_class(). " = ". (2 * pi() * $this->jari2). "\n";
    }
}