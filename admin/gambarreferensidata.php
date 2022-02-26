<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data Gambar Referensi";
  include('includes/header.php');
  include('includes/sidebar.php');
  include('includes/config.php');
  include('action/gambarreferensiact.php');
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
                  <li class="page-item"><a class="page-link" href="gambarreferensitambah"><i class="fas fa-plus"></i> Tambah Gambar Referensi</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Gambar</th>
                    <th>Gambar</th>
                    <th>Dibuat</th>
                    <th>Diubah</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nomor = 0;
                  $sqltblgambarreferensi = "SELECT * FROM tbl_gambar_referensi";
                  $querytblgambarreferensi = @mysqli_query($koneksidb, $sqltblgambarreferensi);
                  while ($result = @mysqli_fetch_array($querytblgambarreferensi)) {
                    $nomor++;
                  ?>
                    <tr>
                      <td><?php echo htmlentities($nomor); ?></td>
                      <td><a href="gambarreferensidetail?id=<?php echo $result['id_gambar_referensi']; ?>" class="link-primary"><?php echo htmlentities($result['nama_gambar']); ?></a></td>
                      <td align="center"><a href="image/referensi/<?php echo htmlentities($result['gambar']); ?>" target="blank"><img src="image/referensi/<?php echo htmlentities($result['gambar']); ?>" width="50" height="50"></a></td>
                      <td><?php echo date('d F Y', strtotime($result['create'])); ?></td>
                      <td><?php echo date('d F Y', strtotime($result['lastupdate'])); ?></td>
                      <td class="text-center">
                        <a class="btn btn-info btn-sm" href="gambarreferensiubah?id=<?php echo $result['id_gambar_referensi']; ?>"><i class="fas fa-pencil-alt"></i>Edit</a>
                        <a class="btn btn-danger btn-sm" href="action/gambarreferensihapusact?id=<?php echo $result['id_gambar_referensi']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus gambar referensi nama <?php echo $result['nama_gambar']; ?>?');"><i class="fas fa-trash"></i>Delete</a>
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
}
?>