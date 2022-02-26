<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $id_faq = $_POST['id_faq'];
  $isi_faq = addslashes($_POST['isi_faq']);
  $tanggapan = addslashes($_POST['tanggapan']);
  $status = $_POST['status'];
  $update = date('y-m-d');
  $sql     = "UPDATE tbl_faq SET isi_faq='$isi_faq', tanggapan='$tanggapan', status='$status', lastupdate='$update' WHERE id_faq='$id_faq'";
  $query     = mysqli_query($koneksidb, $sql);
  if ($query) {
    echo "<script type='text/javascript'>
			alert('Berhasil ubah data.'); 
			document.location = '../faqdata'; 
		</script>";
  } else {
    echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
      document.location = '../faqdata';
		</script>";
  }
}
