<?php
include('../includes/config.php');
if (isset($_POST['bubah'])) {
  $id_gambar_referensi = $_POST['id_gambar_referensi'];

  $gambar_referensia = $_FILES["gambar_referensi"]["name"];
  $newgambar_referensi = date('dmYHis') . $gambar_referensia;
  $tmpgambar_referensi = $_FILES["gambar_referensi"]["tmp_name"];
  $lastupdate = date('y-m-d');

  move_uploaded_file($tmpgambar_referensi, "../image/referensi/" . $newgambar_referensi);

  $sql   = "UPDATE tbl_gambar_referensi SET gambar='$newgambar_referensi', lastupdate='$lastupdate' WHERE id_gambar_referensi='$id_gambar_referensi'";
  $query     = mysqli_query($koneksidb, $sql);
  if ($query) {
    echo "<script type='text/javascript'>
    	alert('Berhasil ubah gambar.'); 
    	document.location = '../gambarreferensidata'; 
    </script>";
  } else {
    echo "<script type='text/javascript'>
    	alert('Terjadi kesalahan, silahkan coba lagi!.'); 
    	document.location = '../gambarreferensidata'; 
    </script>";
  }
}
