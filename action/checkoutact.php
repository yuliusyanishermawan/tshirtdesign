<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
    header('location:../login.php');
} else {
    include('../includes/config.php');
    if (empty($_POST["provinsi"])) {
        $provinsi = "Pickup";
        $distrik = "Pickup";
        $kodepos = "Pickup";
        $nama_ekspedisi = "Pickup";
        $estimasi = "Pickup";
        $paket = "Pickup";
        $NULL = "Pickup";
    } else {
        $provinsi = $_POST['provinsi'];
        $distrik = $_POST['distrik'];
        $kodepos = $_POST['kodepos'];
        $nama_ekspedisi = $_POST['nama_ekspedisi'];
        $estimasi = $_POST['estimasi'];
        $paket = $_POST['paket'];
        $NULL = "NULL";
    }

    $kode_order = $_POST['kode_order'];
    $id_user = $_POST['id_user'];
    $ongkir = $_POST['ongkir'];
    $alamat = $_POST['alamat'];
    $total_berat = $_POST['total_berat'];
    $totalhargaaa = $_POST['totalhargaaa'];
    $status = "Menunggu Pembayaran";
    $create = date('y-m-d');
    $sqlinsert     = "INSERT INTO tbl_order  VALUES ('$kode_order','$id_user','$create','$alamat','$status','$NULL','$provinsi','$distrik','$kodepos','$nama_ekspedisi','$paket','$estimasi','$total_berat','$ongkir','$totalhargaaa','')";
    $queryinsert     = mysqli_query($koneksidb, $sqlinsert);
    if ($queryinsert) {
        $array = $_POST['id_desain_produk_user'];
        $arrayharga = $_POST['harga'];
        $jumlaharray = count($array);
        for ($i = 0; $i < $jumlaharray; $i++) {
            $sqlupdate = "UPDATE tbl_desain_produk_user  SET no_invoice='$kode_order', total_harga_desain_produk_user='$arrayharga[$i]' WHERE id_desain_produk_user=$array[$i]";
            $queryupdate     = mysqli_query($koneksidb, $sqlupdate);
            if ($queryupdate) {
                echo "<script type='text/javascript'>
                alert('Berhasil tambah order.'); 
                document.location = '../invoice?id=$kode_order'; 
            </script>";
            } else {
                echo "<script type='text/javascript'>
          alert('Terjadi kesalahan, silahkan coba lagi!.'); 
          document.location = '../checkout'; 
      </script>";
            }
        }
    } else {
        echo "<script type='text/javascript'>
          alert('Terjadi kesalahan, silahkan coba lagi!.'); 
    document.location = '../checkout'; 
      </script>";
    }
}
