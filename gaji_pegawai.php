<!DOCTYPE html>
<html>
<head>

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
    background-color: #f2f2f2;
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

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
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

<!-- SOAL -->
<h1>GAJI PEGAWAI</h1>
<p>Diketahui sebuah perusahaan ingin memasukan rincian gaji ke pegawai dengan menggunakan form proses PHP, dengan rincian sebagai berikut :</p>

<p>1. Tentukan gaji pokok (switch case) Jika Manager = 20jt, Asisten = 15jt, Kabag = 10jt, Staff = 4jt</p>

<p>2. Tentukan tunjangan jabatan = 20% dari gaji pokok</p>

<p>3. Tentukan tunjangan keluarga (if multi kondisi): Jika sudah menikah dan anak maksimal 2 = 5% dari gapok
      Jika sudah menikah dan anak antara 3 - 5 = 10% dari gapok
      Selain itu belum dapat tunjangan keluarga
</p>

<p>4. Tentukan gaji kotor</p>

<p>5. Tentukan zakat_profesi (ternary)
Jika ia muslim dan gaji kotor minimal 6 juta, ada zakat = 2.5% dari gaji kotor. Selain itu tidak ada zakat
</p>

<p>6. Tentukan take home pay</p>


<!-- Form -->
<div class="container">
<form method="post">
  <div class="row">
    <div class="col-25">
      <label for="jabatan">Jabatan</label>
    </div>
    <div class="col-75">
            <select name="jabatan">
                        <option value: disabled Value: selected>--Pilih--</option>
                        <option value="Manager">Manager</option>
                        <option value="Asisten">Asisten</option>
                        <option value="Kepala_Bagian">Kepala Bagian</option>
                        <option value="Staff">Staff</option>
             </select>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="agama">Agama</label>
    </div>
    <div class="col-75">
            <select name="agama">
                        <option value: disabled Value: selected>--Pilih--</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">KongHuCu</option>
            </select>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="status">Status</label>
    </div>
    <div class="col-75">
    <select name="status">
                    <option value: disabled Value: selected>--Pilih--</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                    </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="jmlh">Jumlah Anak</label>
    </div>

    <div class="col-75">
    <input type="number" name="anak" placeholder="Masukkan Jumlah Anak">
    </div>
  </div>
  
  <br>
  <div class="row">
  <right><button name="proses" type="submit">Simpan</button></right>
  </div>
  </form>
</div>


<?php 

//Gaji sesuai Jabatan
    error_reporting(0);
    $manager = 20000000;
    $asisten = 15000000;
    $kebag = 10000000;
    $staff = 4000000;

    $jabatan = $_POST ['jabatan'];
    $agama = $_POST ['agama'];
    $status = $_POST ['status'];
    $anak = $_POST ['anak'];
    $tombol = $_POST ['proses'];

    switch ($jabatan){
        case "Manager" : 
            $gaji = $manager; 
            break;
        case "Asisten" : 
            $gaji = $asisten; 
            break;
        case "Kepala_Bagian" : 
            $gaji = $kebag; 
            break;
        case "Staff" : 
            $gaji = $staff; 
            break;
        default: $gaji ="";
    }


// Tunjangan setiap masing-masing Jabatan
    switch ($jabatan){
        case "Manager" : 
            $tunjangan = $manager * 0.2; 
            break;
        case "Asisten" : 
            $tunjangan = $asisten * 0.2; 
            break;
        case "Kepala_Bagian" : 
            $tunjangan = $kebag * 0.2; 
            break;
        case "Staff" : 
            $tunjangan = $staff * 0.2; 
            break;
        default: $tunjangan ="";
    }

// Perhitungan Tunjangan Anak
    if($anak >= 1 && $anak <= 2 && $status == "Sudah Menikah") $tunjangan_keluarga = $gaji * 0.05;
    else if ($anak >= 3 && $anak  <= 5 && $status == "Sudah Menikah") $tunjangan_keluarga = $gaji * 0.1 ;
    else $tunjangan_keluarga = "0";


// Perhitungan Gaji Kotor
    $gajiKotor = $gaji + $tunjangan + $tunjangan_keluarga;

// Perhitungan Zakat
     $zakat = ($agama == 'Islam' && $gajiKotor >= 6000000 ) ? $gajiKotor * 0.025 : 0 ;

// Perhitungan Take Home Pay
    $take_home = ($gaji + $tunjangan + $tunjangan_keluarga) - $zakat;

    if(isset($tombol)){
    ?>

<br>
<div class="container">
    <h1>Rincian gaji <?php echo $jabatan ?>:</h1>
<table>
    <tr>
        <td><label>Jabatan</label></td>
        <td><span> = <?= $jabatan ?></span></td>
    </tr>
    <tr>
        <td><label>Agama</label></td>
        <td><span> = <?= $agama ?></span></td>
    </tr>
    <tr>
        <td><label>Gaji</label></td>
        <td><span> = Rp. <?= number_format($gaji, 0, '', '.') ?></span></td>
    </tr>
    <tr>
        <td><label>Tunjangan Jabatan (20%)</label></td>
        <td><span> = Rp. <?= number_format($tunjangan, 0, '', '.') ?></span></td>
    </tr>
    <tr>
        <td><label>Status</label></td>
        <td><span> = <?= $status ?></span></td>
    </tr>
    <tr>
        <td><label>Jumlah Anak</label></td>
        <td><span> = <?= $anak ?></span></td>
    </tr>
    <tr>
        <td><label>Tunjangan Keluarga</label></td>
        <td><span> = Rp. <?= number_format($tunjangan_keluarga, 0, '', '.') ?></span></td>
    </tr>
    <tr>
        <td><label>Gaji Kotor</label></td>
        <td><span> = Rp. <?= number_format($gajiKotor, 0, '', '.') ?></span></td>
    </tr>
    <tr>
        <td><label>Bayar Zakat (2,5%)</label></td>
        <td><span> = Rp. <?= number_format($zakat, 0, '', '.') ?></span></td>
    </tr>
    <tr>
        <td><label>Uang Bawa Pulang</label></td>
        <td><span><b> = Rp. <?= number_format($take_home, 0, '', '.') ?> <b></span></td>
    </tr>
</table>
<?php } ?>

</body>
</html>

