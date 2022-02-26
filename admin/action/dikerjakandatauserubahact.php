<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $id = $_POST['id'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $nomor = $_POST['nomor'];
  $alamat = $_POST['alamat'];
  $sql     = "UPDATE tbl_user SET nama_lengkap='$nama_lengkap', nomor='$nomor', alamat='$alamat' WHERE id_user='$id'";
  $query     = mysqli_query($koneksidb, $sql);
  if ($query) {
    echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = '../dikerjakandatauserdetail?id=$id'; 
		</script>";
  } else {
    echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
      document.location = '../dikerjakandatauserdetail?id=$id';
		</script>";
  }
}
