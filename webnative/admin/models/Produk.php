<?php
class Produk {
    private $koneksi;
    public function __construct()
    {
      global $dbh; //instance object koneksi.php
      $this->koneksi = $dbh;  
    }
    public function dataProduk(){
        $sql = "SELECT produk.*, jenis_produk.nama as Kategori FROM produk INNER JOIN
        jenis_produk ON jenis_produk.id = produk.jenis_produk_id ";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }


}
?>