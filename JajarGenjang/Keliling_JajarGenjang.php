
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jajar Genjang</title>
</head>
<body>
    
    <h1> Menghitung Keliling Bangun Datar Jajar Genjang </h1>

    <form method="POST">
        <table>
        <tr>
            <td>Alas</td>
            <td>
                <input type="text" name="alas1" require>
            </td>
        </tr>
        <tr>
            <td>Sisi Miring</td>
            <td>
                <input type="text" name="sm" require>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Hitung">
        </td>
        </tr>
</table>
</form>
<?php 
    if(isset($_POST['submit'])){
        $alas1 = $_POST['alas1'];
        $sm = $_POST['sm'];

        $kelilingjajargenjang =  2 * ($alas1 + $sm);
        echo 'Hasil perhitungan Luas Jajar Genjang';
        echo '<br> Diketahui :';
        echo '<br> Alas = '.$alas1;
        echo '<br> Sisi Miring = '.$sm;

        echo '<br> Maka Kelilingnya =  ' .$kelilingjajargenjang;
    }
?>
</body>
</html>