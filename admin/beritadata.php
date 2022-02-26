<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data Berita";
  include('includes/header.php');
  include('includes/sidebar.php');
  include('includes/config.php');
?>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?= $title ?></h3>
              <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link" href="beritatambah"><i class="fas fa-plus"></i> Tambah Berita</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul Berita</th>
                    <th>Isi Berita</th>
                    <th>Gambar Berita</th>
                    <th>Dibuat</th>
                    <th>Diubah</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nomor = 0;
                  $sqltblberita = "SELECT * FROM tbl_berita";
                  $querytblberita = @mysqli_query($koneksidb, $sqltblberita);
                  while ($result = @mysqli_fetch_array($querytblberita)) {
                    $nomor++;
                  ?>
                    <tr>
                      <td><?php echo htmlentities($nomor); ?></td>
                      <td><a href="beritadetail?id=<?php echo $result['id_berita']; ?>" class="link-primary"><?php echo htmlentities($result['nama_berita']); ?></a></td>
                      <td class="text-break"><?php echo htmlentities($result['isi_text']); ?></td>
                      <td><a href="image/berita/<?php echo htmlentities($result['gambar_berita']); ?>" target="blank"><img src="image/berita/<?php echo htmlentities($result['gambar_berita']); ?>" width="50" height="50"></a></td>
                      <td><?php echo date('d F Y', strtotime($result['create'])); ?></td>
                      <td><?php echo date('d F Y', strtotime($result['lastupdate'])); ?></td>
                      <td class="text-center">
                        <a class="btn btn-info btn-sm" href="beritaubah?id=<?php echo $result['id_berita']; ?>"><i class="fas fa-pencil-alt"></i>Edit</a>
                        <a class="btn btn-danger btn-sm" href="action/beritahapusact?id=<?php echo $result['id_berita']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus berita judul <?php echo $result['nama_berita']; ?>?');"><i class="fas fa-trash"></i>Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
<?php
  include('includes/footer.php');
} ?>