<?php
if (isset($_POST['btambah'])) {
  $nama_gambar = $_POST['nama_gambar'];
  $gambarr = $_FILES["gambar"]["name"];
  $newgambar = date('dmYHis') . $gambarr;
  $tmpgambar = $_FILES["gambar"]["tmp_name"];
  $create = date('y-m-d');

  move_uploaded_file($tmpgambar, "image/referensi/" . $newgambar);

  $sql     = "INSERT INTO tbl_gambar_referensi  VALUES ('','$nama_gambar','$newgambar','$create','$create')";
  $query     = mysqli_query($koneksidb, $sql);
  if ($query) {
    echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'gambarreferensidata'; 
		</script>";
  } else {
    echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'gambarreferensidatatambah'; 
		</script>";
  }
}
