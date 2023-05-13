<?php
//memanggil dan memproses file bagian atas

session_start();
include_once 'koneksi.php';
include_once 'models/Produk.php';
include_once 'models/Jenis_Produk.php';
include_once 'models/Pelanggan.php';
include_once 'models/Pesanan.php';
include_once 'models/Kartu.php';
include_once 'models/Member.php';

$sesi = $_SESSION['MEMBER'];
if(isset($sesi)){

include_once 'top.php';

include_once 'menu.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1></h1>

            <?php
            //algoritma menangkap url agar masuk kedalam index
            $url = $_GET['url'];
            if($url == 'dashboard') {
                include_once 'dashboard.php';
            }else if(!empty($url)){
                include_once ''.$url.'.php';
            }else {'dashboard.php';
            }

            ?>
        </div>
    </main>
</div>


<?php
//memanggil file bagian bawah
include_once 'buttom.php';

} else {
    echo '<script> alert("anda tidak boleh masuk");history.back();</script>';
}
?>

