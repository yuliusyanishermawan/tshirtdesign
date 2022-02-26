<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data Frequently Asked Questions";
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
                  <li class="page-item"><a class="page-link" href="faqtambah"><i class="fas fa-plus"></i> Tambah FAQ</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                    <th>Diubah</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nomor = 0;
                  $sqltblfaq = "SELECT * FROM tbl_faq";
                  $querytblfaq = @mysqli_query($koneksidb, $sqltblfaq);
                  while ($result = @mysqli_fetch_array($querytblfaq)) {
                    $nomor++;
                  ?>
                    <tr>
                      <td><?php echo htmlentities($nomor); ?></td>
                      <td><a href="faqdetail?id=<?php echo $result['id_faq']; ?>" class="link-primary"><?php echo htmlentities($result['isi_faq']); ?></a></td>
                      <td><?php echo htmlentities($result['tanggapan']); ?></td>
                      <td><?php echo htmlentities($result['status']); ?></td>
                      <td><?php echo date('d F Y', strtotime($result['create'])); ?></td>
                      <td><?php echo date('d F Y', strtotime($result['lastupdate'])); ?></td>
                      <td class="text-center">
                        <a class="btn btn-info btn-sm" href="faqubah?id=<?php echo $result['id_faq']; ?>"><i class="fas fa-pencil-alt"></i>Edit</a>
                        <a class="btn btn-danger btn-sm" href="action/faqhapusact?id=<?php echo $result['id_faq']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus id FAQ <?php echo $result['id_faq']; ?>?');"><i class="fas fa-trash"></i>Delete</a>
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