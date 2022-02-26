<?php
if (isset($_POST['btambah'])) {
  $nama_berita = $_POST['nama_berita'];
  $isi_berita = $_POST['isi_berita'];

  $gambar_beritaa = $_FILES["gambar_berita"]["name"];
  $newgambar_berita = date('dmYHis') . $gambar_beritaa;
  $tmpgambar_berita = $_FILES["gambar_berita"]["tmp_name"];
  $create = date('y-m-d');

  move_uploaded_file($tmpgambar_berita, "image/berita/" . $newgambar_berita);

  $sql     = "INSERT INTO tbl_berita  VALUES ('','$nama_berita','$isi_berita','$newgambar_berita','$create','$create')";
  $query     = mysqli_query($koneksidb, $sql);
  if ($query) {
    echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'beritadata'; 
		</script>";
  } else {
    echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'beritatambah'; 
		</script>";
  }
}
