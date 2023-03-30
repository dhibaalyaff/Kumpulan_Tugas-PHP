<?php
require 'pegawai.php';

$pegawai1 = new Pegawai('01111', 'Alya', 'Manager', 'Islam', 'Belum Menikah');
$pegawai2 = new Pegawai('02222', 'Rafy', 'Asisten Manager', 'Katolik', 'Belum Menikah');
$pegawai3 = new Pegawai('03333', 'Cintya', 'Kepala Bagian', 'Kristen', 'Menikah');
$pegawai4 = new Pegawai('04444', 'Vero', 'Staff', 'Hindu', 'Belum Menikah');
$pegawai5 = new Pegawai('05555', 'Shofia', 'Staff', 'Budha', 'Menikah');
$pegawai6 = new Pegawai('06666', 'Difta', 'Staff', 'KongHuCU', 'Menikah');

$ar_pegawai = [$pegawai1, $pegawai2, $pegawai3, $pegawai4, $pegawai5, $pegawai6];

foreach ($ar_pegawai as $pegawai) {
    $pegawai->cetak();
}

?>


