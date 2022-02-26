<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $title = "Selesai Dikerjakan";
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
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Invoice</th>
                    <th>Nama User</th>
                    <th>Total Biaya</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nomor = 0;
                  $sql = "SELECT * FROM tbl_order INNER JOIN  tbl_user ON tbl_order.id_user=tbl_user.id_user WHERE tbl_order.status='Selesai Dikerjakan'";
                  $query = @mysqli_query($koneksidb, $sql);
                  while ($result = @mysqli_fetch_array($query)) {
                    $nomor++;
                  ?>
                    <tr>
                      <td><?php echo htmlentities($nomor); ?></td>
                      <td style="text-transform: uppercase;"><a href="selesaidikerjakandetail?id=<?php echo $result['no_invoice']; ?>" class="link-primary"><?php echo htmlentities($result['no_invoice']); ?></td>
                      <td style="text-transform: uppercase;"><a href="userdetail?id=<?php echo $result['id_user']; ?>" class="link-primary"><?php echo htmlentities($result['nama_lengkap']); ?></td>
                      <td><?php echo "Rp " . number_format($result['total_biaya'], 2, ",", "."); ?></td>
                      <td><?php echo htmlentities($result['status']); ?></td>
                      <td><?php echo date('d F Y', strtotime($result['tanggal_order'])); ?></td>
                      <td class="text-center">
                        <a class="btn btn-info btn-sm" href="selesaidikerjakanedit?id=<?php echo $result['no_invoice']; ?>"><i class="fas fa-pencil-alt"></i>Edit</a>
                      </td>
                    </tr>
                  <?php } ?>
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