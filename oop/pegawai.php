<!DOCTYPE html>
<html>
<head>
<title>FORM</title>

<?php

echo "<h1><center> GAJI PEGAWAI </center></h1>";
echo "<hr>";


class pegawai{
    protected $nip;
    public $nama;
    private $jabatan;
    private $agama;
    private $status;
    private $tunjangan = 0;
    static $jml = 0;
    const PT = 'PT HTP Indonesia';

    public function __construct($nip, $nama, $jabatan, $agama, $status){
        $this-> nip = $nip;
        $this-> nama = $nama;
        $this-> jabatan = $jabatan;
        $this-> agama = $agama;
        $this-> status = $status;
        self::$jml++;
    }

    // Gaji Pokok setiap Pegawai sesuai Jabatan
    public function setGajiPokok($jabatan){
        switch($jabatan){
            case 'Manager' : 
                $gapok = 15000000; 
                break;
            case 'Asisten Manager' : 
                $gapok = 10000000; 
                break;
            case 'Kepala Bagian' : 
                $gapok = 6000000; 
                break;
            case 'Staff' : 
                $gapok = 4000000; 
                break;
            default: $gapok = 0;
        }
        return $gapok;
    }

    // Untuk Menghitung Tunjangan Jabatan sesuai jabatan beserta gapok nya
    public function setTun_Jabatan($jabatan){
        switch($jabatan){
            case 'Manager' || 'Asisten Manager' || 'Kepala Bagian' || 'Staff' : $tunjangan = 
            $this->setGajiPokok($this->jabatan) * 0.2; break;
            default: $tunjangan = 0;
        }
        return $tunjangan;
    }
    
    // Untuk Menghitung Tunjangan Keluarga sesuai status
    public function setTun_Keluarga($status){
        $tunKel = ($status == 'Menikah') ? $this->setGajiPokok($this->jabatan) * 0.1 : 0;
        return $tunKel;
    }

    // Untuk Menghitung Zakat Profesi Pegawai sesuai Agama yang dianut
    public function setZakatProfesi($agama){
        $zakat = ($agama == 'Islam' &&  $this->setGajiPokok($this->jabatan) + 
        $this->setTun_Jabatan($this->jabatan) + 
        $this->setTun_Keluarga($this->status) >= 6000000) ? $this->setGajiPokok($this->jabatan) * 0.025 : 0;
        return $zakat;
    }
    
    // Untuk Menghitung Gaji Bersih setiap Pegawai
    public function gaji_bersih($gaji){
        $gajiBersih = $this->setGajiPokok($this->jabatan) + 
        $this->setTun_Jabatan($this->jabatan) + 
        $this->setTun_Keluarga($this->status) - $this->setZakatProfesi($this->agama);
        return $gajiBersih;
    }


    //Untuk mencetak hasil
    public function cetak(){
        echo 'NIP Pegawai = ' .$this-> nip;
        echo '<br> Nama Pegawai = ' .$this-> nama;
        echo '<br> Jabatan = ' .$this-> jabatan;
        echo '<br> Agama = ' .$this-> agama;
        echo '<br> Status = ' .$this-> status;
        echo '<br> Gaji Pokok = Rp. '.number_format($this->setGajiPokok($this->jabatan),0,',','.');
        echo '<br> Tunjangan Jabatan = Rp. '.number_format($this->setTun_Jabatan($this->jabatan),0,',','.');
        echo '<br> Tunjangan Keluarga = Rp. '.number_format($this->setTun_Keluarga($this->status),0,',','.');
        echo '<br> Zakat = Rp. '.number_format($this->setZakatProfesi($this->agama),0,',','.');
        echo '<br> Gaji Bersih = Rp. '.number_format($this->gaji_bersih($this->agama),0,',','.');
        echo '<hr>';
    }

}

?>