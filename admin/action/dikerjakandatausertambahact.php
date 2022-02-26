<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $email = "-";
  $jenis_kelamin = "-";
  $nama_user = $_POST['nama_user'];
  $nomor_telfon = $_POST['nomor_telfon'];
  $alamat = $_POST['alamat'];
  $create = date('y-m-d');

  $sql     = "INSERT INTO tbl_user  VALUES ('','$email','','$nama_user','$nomor_telfon','$jenis_kelamin','$alamat','$create')";
  $query     = mysqli_query($koneksidb, $sql);
  if ($query) {
    echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = '../dikerjakandatauser'; 
		</script>";
  } else {
    echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
      document.location = '../dikerjakandatauser';
		</script>";
  }
}
