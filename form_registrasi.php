<?php 
$ar_prodi = ["SI"=>"Sistem Informasi", "TI"=>"Teknik Informatika", "ILKOM"=>"Ilmu Komputer","TE"=>"Teknik Elektro"];
$ar_skill = ["HTML"=>10, "CSS"=>10, "Javascript"=>20, "RWD Bootstrap"=>20, "PHP"=>30, "MySQL"=>30, "Laravel"=>40];
$domisili = ["Aceh","Jakarta","Bandung","Bekasi","Malang","Surabaya","Lainnya"];

?>

<!DOCTYPE html>
<html>
<head>
<title>FORM</title>
    <!-- CSS -->
    <style>
    * {
    box-sizing: border-box;
    }

    input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    }

    label {
    padding: 12px 12px 12px 0;
    display: inline-block;
    }

    input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    .container {
    border-radius: 5px;
    background-color: #FFFF00;
    padding: 20px;
    }

    .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
    }

    .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row::after {
    content: "";
    display: table;
    clear: both;
    }

    @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
    }

    button {
        float: right;
    }
</style>
</head>
<body>


<!-- Form -->
<h1 align="center">Form Registrasi</h1>
    <div class="container">
    <form method="post">
    <div class="row">
        <div class="col-25">
        <label for="nim">NIM</label>
        </div>
        <div class="col-75">
                <input type="text" name="nim">               
        </div>
    </div>

    <div class="row">
        <div class="col-25">
        <label for="nama">Nama</label>
        </div>
        <div class="col-75">
                <input type="text" name="nama">             
        </div>
    </div>

    <div class="row">
        <div class="col-25">
        <label for="email">Email</label>
        </div>
        <div class="col-75">
                <input type="text" name="email">              
        </div>
    </div>

    <div class="row">
        <div class="col-25">
        <label for="jk">Jenis Kelamin</label>
        </div>
        <div class="col-75">
                <input type="radio" name="jk" value="L" >Laki-Laki &nbsp;
                <input type="radio" name="jk" value="P" >Perempuan
        </div>
    </div>

    <div class="row">
        <div class="col-25">
        <label for="prodi">Program Studi</label>
        </div>
        <div class="col-75">
        <select name="prodi">
                <?php
                foreach($ar_prodi as $prodi => $v){
                ?>
                    <option value="<?= $prodi?>"><?= $v?></option>
                <?php } ?>
        </select>
    </div>
    </div>

    <div class="row">
        <div class="col-25">
        <label for="sp">Skill Programming</label>
        </div>
        <div class="col-75">
                <?php
                foreach ($ar_skill as $skill => $s){
                ?>
                <input type="checkbox" name="skill[]" value="<?= $s." / " .$skill ?>"><?= $skill ?>
                <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-25">
        <label for="domisili">Domisili</label>
        </div>
        <div class="col-75">
        <select name="domisili">
                <?php
                foreach($domisili as $d){
                ?>
                <option value="<?= $d?>"><?= $d?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <br>
    <div class="row">
    <right><button name="proses" type="submit">Simpan</button></right>
    </div>
    </form>
    </div>


<?php
error_reporting(0);

    function rangeSkill($jml){
        if($jml <= 0) $range = "Tidak Memadai";
        else if ($jml <= 40) $range = "Kurang";
        else if ($jml <= 60) $range = "Cukup";
        else if ($jml <= 100) $range = "Baik";
        else if ($jml <= 160) $range = "Sangat Baik";
        else $range = "";
        return $range;
    }

    // Proses Tombol Submit
    if(isset($_POST['proses'])){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $prodi2 = $_POST['prodi'];
        $skill2 = $_POST['skill'];
        $domisili = $_POST['domisili'];
        $email = $_POST['email'];

    // hitung nilai Skill
        $jumlah = array_sum($skill2);

    // fungsi Kategory skill
        $range = rangeSkill($jumlah);

    
?>
<br>
<div class="container">
    <h2>Hasil Inputan</h2>

<table>
    <tr>
        <td><label>NIM</label></td>
        <td><span> = <?= $nim ?></span></td>
    </tr>

    <tr>
        <td><label>Nama</label></td>
        <td><span> = <?= $nama ?> </span></td>
    </tr>

    <tr>
        <td><label>Jenis Kelamin</label></td>
        <td><span> = <?= $jk ?></span></td>
    </tr>

    <tr>
        <td><label>Prodi</label></td>
        <td><span> = <?= $prodi2 ?></span></td>
    </tr>

    <tr>
        <td><label>Point/Skill</label></td>
        <td><span> = <?php
                foreach($skill2 as $s)
                { ?>|
                <?= $s ?> |
                <?php } ?>
        </span></td>
    </tr>

    <tr>
        <td><label>Skor Skill</label></td>
        <td><span> = <?= $jumlah ?></span></td>
    </tr>

    <tr>
        <td><label>Kategori Skill</label></td>
        <td><span> = <?= $range ?></span></td>
    </tr>

    <tr>
        <td><label>Domisili</label></td>
        <td><span> = <?= $domisili ?></span></td>
    </tr>

    <tr>
        <td><label>Email</label></td>
        <td><span> = <?= $email ?></span></td>
    </tr>
    
<?php } ?>

</body>
</html>





