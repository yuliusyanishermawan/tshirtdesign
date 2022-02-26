<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
  header('location:../login.php');
} else {
  include('../includes/config.php');

  $no_invoice = $_POST['no_invoice'];

  $status = "Menunggu Konfirmasi";

  $buktii = $_FILES["bukti"]["name"];

  $newbukti = date('dmYHis') . $buktii;

  $tmpbukti = $_FILES["bukti"]["tmp_name"];


  move_uploaded_file($tmpbukti, "../bukti/" . $newbukti);

  $sql   = "UPDATE tbl_order SET bukti='$newbukti', status='$status' WHERE no_invoice='$no_invoice'";
  $query     = mysqli_query($koneksidb, $sql);
  if ($query) {
    echo "<script type='text/javascript'>
  		alert('Berhasil upload bukti transfer. Silahkan tunggu 1 x 24 untuk konfirmasi bukti transfer dari admin'); 
  		document.location = '../riwayatpesanan'; 
  	</script>";
  } else {
    echo "<script type='text/javascript'>
          alert('Terjadi kesalahan, silahkan coba lagi!.'); 
    document.location = '../riwayatpesanan'; 
      </script>";
  }
}
