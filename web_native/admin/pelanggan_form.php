<br>

<?php
error_reporting(0);
$obj_pelanggan = new Pelanggan();
$data_pelanggan = $obj_pelanggan->dataPelanggan();
$idedit = $_REQUEST['idedit'];
$pel = !empty($idedit) ? $obj_pelanggan->getPelanggan($idedit) : array();
?>


<form action="produk_controller.php" method="POST">
      <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Kode</label> 
        <div class="col-8">
          <input id="kode" name="kode" type="text" class="form-control" value="<?= $pel['kode']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text2" class="col-4 col-form-label">Nama</label> 
        <div class="col-8">
          <input id="nama" name="nama" type="text" class="form-control" value="<?= $pel['nama']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text3" class="col-4 col-form-label">Jenis Kelamin</label> 
        <div class="col-8">
          <input id="harga_jual" name="harga_jual" type="text" class="form-control" value="<?= $pel['jk']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text4" class="col-4 col-form-label">Tempat Lahir</label> 
        <div class="col-8">
          <input id="harga_beli" name="harga_beli" type="text" class="form-control" value="<?= $pel['tmp_lahir']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text5" class="col-4 col-form-label">Tanggal Lahir</label> 
        <div class="col-8">
          <input id="stok" name="stok" type="text" class="form-control" value="<?= $pel['tgl_lahir']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text6" class="col-4 col-form-label">Email</label> 
        <div class="col-8">
          <input id="min_stok" name="min_stok" type="text" class="form-control" value="<?= $pel['email']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Kartu Id</label> 
        <div class="col-8">
          <input id="jenis_produk_id" name="jenis_produk_id" type="text" class="form-control" value="<?= $pel['kartu_id']?>">
        </div>
      </div>
      <div class="form-group row">

      
        <div class="offset-4 col-8">
        <?php

if(empty($idedit)){

?>
          <button name="proses" type="submit" value="simpan" class="btn btn-primary">Submit</button>
          <?php
          }
          else {
            ?>
            <button name="proses" type="submit" value="ubah" class="btn btn-primary">Update</button>
            <input type="hidden" name="idx" value="<?= $idedit ?>">
            <?php
          }
          ?>
          <button name="proses" type="submit" value="batal" class="btn btn-primary">Cancel</button>

        </div>
      </div>
    </form>