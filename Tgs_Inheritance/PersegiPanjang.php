<!-- 
/**
 * Menghitung bangun datar Persegi Panjang
 *
 * @param $panjang
 * @param $lebar
 *
 */ -->

 <?php 
require_once 'abstrack.php';

class PersegiPanjang extends BD_2D {
    
    private float $panjang;
    private float $lebar;
    
    function __construct($panjang,$lebar){
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }
    function luas(){
        echo "<br>Luas ".get_class(). " = ".($this->panjang*$this->lebar). "\n";
    }
    function keliling(){
        echo "<br>Keliling ". get_class(). " = ". ((2*$this->panjang) + (2*$this->lebar)). "\n";
    }
}
