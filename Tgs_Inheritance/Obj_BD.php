
<!-- BD = Bangun Datar -->

<!DOCTYPE html>
<html>
<head>
    <title>OOP Inheritance</title>

<div class="container">
		<center style="padding: 70px;"><img src="bangundatar.png" alt="bangundatar"></center>
		<h1 align="center" style="padding: 20px;"><b>Menghitung Luas & Keliling Bangun Datar</b></h1>


    <?php 

    require_once 'Lingkaran.php';
    require_once 'PersegiPanjang.php';
    require_once 'Segitiga.php';

    // alas = 4
    // tinggi = 7 
    $segitiga = new Segitiga(4,7);

    // jari jari = 12
    $lingkaran = new Lingkaran(12);

    /// panjang = 10
    // lebar = 5
    $persegi_panjang = new PersegiPanjang(10,5);

    $segitiga->luas();
    $segitiga->keliling();

    $lingkaran->luas();
    $lingkaran->keliling();

    $persegi_panjang->luas();
    $persegi_panjang->keliling();

    ?>

</div>
</html>
