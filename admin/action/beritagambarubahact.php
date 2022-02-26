<?php
include('../includes/config.php');
if (isset($_POST['bubah'])) {
  $id_berita = $_POST['id_berita'];

  $gambar_beritaa = $_FILES["gambar_berita"]["name"];
  $newgambar_berita = date('dmYHis') . $gambar_beritaa;
  $tmpgambar_berita = $_FILES["gambar_berita"]["tmp_name"];
  $lastupdate =date('y-m-d');

  move_uploaded_file($tmpgambar_berita, "../image/berita/" . $newgambar_berita);

  $sql   = "UPDATE tbl_berita SET gambar_berita='$newgambar_berita', lastupdate='$lastupdate' WHERE id_berita='$id_berita'";
  $query     = mysqli_query($koneksidb, $sql);
  if ($query) {
    echo "<script type='text/javascript'>
			alert('Berhasil ubah gambar.'); 
			document.location = '../beritadata'; 
		</script>";
  } else {
    echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = '../beritadata'; 
		</script>";
  }
}
