<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $pertanyaan = $_POST['pertanyaan'];
  $jawaban = $_POST['jawaban'];
  $status = $_POST['status'];
  $create = date('y-m-d');

  $sql     = "INSERT INTO tbl_faq  VALUES ('','$pertanyaan','$jawaban','$status','$create','$create')";
  $query     = mysqli_query($koneksidb, $sql);
  if ($query) {
    echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = '../faqdata'; 
		</script>";
  } else {
    echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
      document.location = '../faqdata';
		</script>";
  }
}
