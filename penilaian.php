<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Mahasiswa</title>
</head>
<body>


<!-- 
    Tugas : 
    1. Buat grade 
    2. Buat Keterangan jumlah mahasiswa, nilai tertinggi, nilai terendah, rata rata Masukan kedalam tfoot
    3. Buat predikat dari nilai menggunakan switch case
-->


<?php 
$m1 = ['NIM'=>'01111021', 'Nama'=>'Andi', 'Nilai'=>80];
$m2 = ['NIM'=>'01111022', 'Nama'=>'Ani', 'Nilai'=>70];
$m3 = ['NIM'=>'01111023', 'Nama'=>'Ari', 'Nilai'=>50];
$m4 = ['NIM'=>'01111024', 'Nama'=>'Aji', 'Nilai'=>40];
$m5 = ['NIM'=>'01111025', 'Nama'=>'Ali', 'Nilai'=>90];
$m6 = ['NIM'=>'01111026', 'Nama'=>'Ai', 'Nilai'=>75];
$m7 = ['NIM'=>'01111027', 'Nama'=>'Budi', 'Nilai'=>30];
$m8 = ['NIM'=>'01111028', 'Nama'=>'Bani', 'Nilai'=>85];

$mahasiswa = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8];
$ar_judul = ['No','NIM','Nama','Nilai','Keterangan','Grade','Predikat'];

$jumlah_data = count($mahasiswa);
$jmlh_nilai = array_column($mahasiswa,'Nilai');
$rata_nilai = array_sum($jmlh_nilai);

$max_nilai = max ($jmlh_nilai);
$min_nilai = min ($jmlh_nilai);
$rata_nilai = $rata_nilai / $jumlah_data;

$nilai = [
    '<br> <br> <b> Jumlah Mahasiswa </b>'=>$jumlah_data,
    '<br> <br> <b> Nilai Tertinggi </b>'=>$max_nilai,
    '<br> <br> <b> Nilai Terendah </b>'=>$min_nilai,
    '<br> <br> <b> Nilai Rata-rata </b>'=>$rata_nilai
]

?>

<table align="center" border="4px" width="100%" bgcolor="#F0E68C">
    <thead>

    <tr>
    <?php 
    foreach($ar_judul as $judul){
    ?>

        <th>
            <?= $judul ?>
        </th>

    <?php }?>
    </tr>
    
    </thead>
    <tbody>

    <?php
    $no = 1;
    foreach($mahasiswa as $mhs){

        $ket = ($mhs['Nilai']>= 60) ? 'Lulus' : 'Tidak Lulus';

        // grade
        if($mhs['Nilai'] >= 85 && $mhs['Nilai'] <= 100) $grade ='A';
        else if($mhs['Nilai'] >= 75 && $mhs['Nilai'] <= 80) $grade ='B';
        else if($mhs['Nilai'] >= 60 && $mhs['Nilai'] <= 74) $grade ='C';
        else if($mhs['Nilai'] >= 30 && $mhs['Nilai'] <= 59) $grade ='D';
        else if($mhs['Nilai'] >= 0 && $mhs['Nilai'] <= 29) $grade ='E';
        else $grade = '';

        // Predikat Nilai
        switch ($grade){
            case "A" : $predikat = "Memuaskan"; 
            break;
            case "B" : $predikat = "Bagus"; 
            break;
            case "C" : $predikat = "Cukup"; 
            break;
            case "D" : $predikat = "Kurang"; 
            break;
            case "E" : $predikat = "Buruk"; 
            break;
            default: $predikat ="";
        }
    ?>

        <tr>
            <td><?= $no ?></td>
            <td><?= $mhs ['NIM'] ?></td>
            <td><?= $mhs ['Nama'] ?></td>
            <td><?= $mhs ['Nilai'] ?></td>
            <td><?= $ket ?></td>
            <td><?= $grade ?></td>
            <td><?= $predikat ?></td>
        </tr>

    <?php $no++; } ?>
    </tbody>

    <tfoot>
        <?php
        foreach($nilai as $ni_lai => $hasil){
        ?>

        <tr>
            <td colspan="6"><?= $ni_lai ?></td>
            <td colspan="1"><?= $hasil ?></td>
        </tr>
    </tfoot>
    
    <?php 
}?>
</table>
</body>
</html>

