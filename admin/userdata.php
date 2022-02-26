<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data User";
  include('includes/header.php');
  include('includes/sidebar.php');
  include('includes/config.php');
?>

  <section class="content">
    <!-- /.card -->
    <!-- Main content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?= $title ?></h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Nama Lengkap</th>
                    <th>Nomor</th>
                    <th>Alamat</th>
                    <th>Mendaftar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nomor = 0;
                  $sqltblberita = "SELECT * FROM tbl_user";
                  $querytblberita = @mysqli_query($koneksidb, $sqltblberita);
                  while ($result = @mysqli_fetch_array($querytblberita)) {
                    $nomor++;
                  ?>
                    <tr>
                      <td><?php echo htmlentities($nomor); ?></td>
                      <td><a href="userdetail?id=<?php echo $result['id_user']; ?>" class="link-primary"><?php echo htmlentities($result['email']); ?></a></td>
                      <td><?php echo htmlentities($result['nama_lengkap']); ?></td>
                      <td><?php echo htmlentities($result['nomor']); ?></td>
                      <td><?php echo htmlentities($result['alamat']); ?></td>
                      <td><?php echo date('d F Y', strtotime($result['created'])); ?></td>
                      <td class="text-center">
                        <a class="btn btn-danger btn-sm" href="action/userhapusact?id=<?php echo $result['id_user']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus nama <?php echo $result['nama_lengkap']; ?>?');"><i class="fas fa-trash"></i>Delete</a>
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

  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->


  <!-- Page specific script -->


<?php
  include('includes/footer.php');
}
?>