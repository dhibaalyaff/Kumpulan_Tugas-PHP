<?php
class JenisProduk {
    private $koneksi;
    public function __construct() {
        global $dbh;
        $this ->koneksi = $dbh;
    }

    public function JenisProduk(){
        $sql = "SELECT * FROM jenis_produk";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
}
?>