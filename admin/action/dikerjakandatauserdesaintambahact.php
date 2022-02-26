<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $id_user = $_POST['id_user'];
  $nama_desain = $_POST['nama_desain'];
  $nama_produk = $_POST['nama_produk'];
  $ukuran_s = $_POST['ukuran_s'];
  $ukuran_m = $_POST['ukuran_m'];
  $ukuran_l = $_POST['ukuran_l'];
  $ukuran_xl = $_POST['ukuran_xl'];
  $NULL = "NULL";
  $gambar_depann = $_FILES["gambar_depan"]["name"];
  $newgambar_depan = date('dmYHis') . $nama_desain . $gambar_depann;
  $tmpgambar_depan = $_FILES["gambar_depan"]["tmp_name"];
  $totalharga = $_POST['totalharga'];
  $create = date('y-m-d');
  move_uploaded_file($tmpgambar_depan, "../../imagedesainuser/" . $newgambar_depan);
  $gambar_belakangg = $_FILES["gambar_belakang"]["name"];
  $newgambar_belakang = date('dmYHis') . $nama_desain . $gambar_belakangg;
  $tmpgambar_belakang = $_FILES["gambar_belakang"]["tmp_name"];
  $create = date('y-m-d');
  move_uploaded_file($tmpgambar_belakang, "../../imagedesainuser/" . $newgambar_belakang);
  $sqli = "SELECT * FROM tbl_produk WHERE nama_produk='$nama_produk'";
  $queryy = mysqli_query($koneksidb, $sqli);
  $resultt = mysqli_fetch_array($queryy);
  $id_produk = $resultt['id_produk'];
  $sql     = "INSERT INTO tbl_desain_produk_user VALUES ('','$id_user','$id_produk','$NULL','$nama_desain','$newgambar_depan','$newgambar_belakang','$ukuran_s','$ukuran_m','$ukuran_l','$ukuran_xl','$totalharga')";
  $query     = mysqli_query($koneksidb, $sql);
  if ($query) {
    echo "<script type='text/javascript'>
    		alert('Berhasil tambah data.'); 
    		document.location = '../dikerjakandatauserdetail?id=$id_user'; 
    	</script>";
  } else {
    echo "<script type='text/javascript'>
    		alert('Terjadi kesalahan, silahkan coba lagi!.'); 
    		document.location = '../dikerjakandesaintambah?id=$id_user'; 
    	</script>";
  }
}
